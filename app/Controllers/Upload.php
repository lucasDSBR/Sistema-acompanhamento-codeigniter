<?php

namespace App\Controllers;

class Upload extends BaseController
{
    public function uploadResult($id = null)
    {
        return view('uploadResult');
    }
    public function to_uploadResult()
    {
        $targetfolder = "./resultados/";
        $targetfolder = $targetfolder.$_POST['idAcompanhamento']."_".date("Y-m-d")."_".date("H-i-s").".pdf" ;
       
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)){
            $path = basename($_POST['idAcompanhamento']."_".date("Y-m-d")."_".date("H-i-s"));


            //Iniciando conexao e enviadno atualização
            // Tenta se conectar ao servidor MySQL
            $conexao = mysqli_connect("localhost", "root", "", "dbtradunilab") or trigger_error(mysqli_error($conexao));
            // Tenta se conectar a um banco de dados MySQL
            mysqli_select_db($conexao, 'dbtradunilab') or trigger_error(mysqli_error($conexao));

            $id_acompanhamento = mysqli_real_escape_string($conexao, $_POST['idAcompanhamento']);
            // Validação do usuário/senha digitados
            $sql = "UPDATE `acompanhamentos` SET `pathResultado`='$path', `data_analise`= NOW(), `status`= 3  WHERE (`id` = '".$id_acompanhamento ."');";

            mysqli_query($conexao, $sql);
            header("Location: /dashboard"); exit;

        }
        else {
            echo "Erro ao enviar o resultado";
        }
    }

    public function cancelUploadResult($id = null)
    {
        //Iniciando conexao e enviadno atualização
        // Tenta se conectar ao servidor MySQL
        $conexao = mysqli_connect("localhost", "root", "", "dbtradunilab") or trigger_error(mysqli_error($conexao));
        // Tenta se conectar a um banco de dados MySQL
        mysqli_select_db($conexao, 'dbtradunilab') or trigger_error(mysqli_error($conexao));

        $id_acompanhamento = mysqli_real_escape_string($conexao, $id);
        // Validação do usuário/senha digitados
        $sql = "SELECT * FROM `acompanhamentos` WHERE (`id` = '".$id_acompanhamento."');";
        $query = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($query);
        if(file_exists("./resultados/".$row['pathResultado'].".pdf")){
            $sqlUpdate = "UPDATE `acompanhamentos` SET `pathResultado` = NULL, `data_analise` = NULL, `status` = 4 WHERE (`id` = $id);";
            unlink("./resultados/".$row['pathResultado'].".pdf");
            mysqli_query($conexao, $sqlUpdate);
            header("Location: /dashboard"); header('Refresh:0'); exit;
        }else{
            return "Não foi possível encontrar o arquivo do resultado no servidor.";
        }
    }

    public function uploadArquive()
    {
        return view('uploadArquive');
    }
    public function to_uploadArquive()
    {
        date_default_timezone_set('UTC');
        $targetfolder = "./arquivoParaAnalise/";

        $targetfolder = $targetfolder.$_POST['matricula']."_".date("Y-m-d")."_".date("H-i-s").".pdf" ;
        
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)){
            $path = basename($_POST['matricula']."_".date("Y-m-d")."_".date("H-i-s"));
            // Tenta se conectar ao servidor MySQL
            $conexao = mysqli_connect("localhost", "root", "", "dbtradunilab") or trigger_error(mysqli_error($conexao));
            // Tenta se conectar a um banco de dados MySQL
            mysqli_select_db($conexao, 'dbtradunilab') or trigger_error(mysqli_error($conexao));

            $iduser = mysqli_real_escape_string($conexao, $_POST['matricula']);
            $titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
            $tipoServico = mysqli_real_escape_string($conexao, $_POST['tipoServico']);
            $nomeColabs = mysqli_real_escape_string($conexao, $_POST['NomeColabs']);
            $periodicoOrEvento = mysqli_real_escape_string($conexao, $_POST['periodicoOrEvento']);
            $nomePeriodicoOrEvento = mysqli_real_escape_string($conexao, $_POST['nomePeriodicoOrEvento']);
            $justificativaPedido = mysqli_real_escape_string($conexao, $_POST['justificativaPedido']);
            $paginas = mysqli_real_escape_string($conexao, $_POST['paginas']);
            $tipoTraducao = mysqli_real_escape_string($conexao, $_POST['tipoTraducao']);
            $tipoRevisao = mysqli_real_escape_string($conexao, $_POST['tipoRevisao']);
            $arquivo = mysqli_real_escape_string($conexao, $path);

            // Validação do usuário/senha digitados
            $comandoSql = "INSERT INTO acompanhamentos VALUES (NULL, '".$iduser."', NULL, NOW(), NULL, 1, '".$tipoServico."', '".$tipoRevisao."', '".$tipoTraducao."', '".$nomeColabs."', '".$periodicoOrEvento."', '".$nomePeriodicoOrEvento."', '".$justificativaPedido."', '".$paginas."', 0,'".$arquivo."', NULL);";
            $query = mysqli_query($conexao, $comandoSql);
            if($this->isOnline()){
                $to = 'trad@unilab.edu.br';
                $subject = 'Nova submissão ao tradUnilab - '.$iduser." - ".date("H-i-s");
                $message = '<body><center>
                <div style="display: inline-block; border: 1px solid #ccc; border-radius: 10px; width: 90%;">
                    <center>
                        <div style="display: inline-block; align-items: center;">
                            
                            <h2>Bot TradUnilab</h2>
                            <span>Notificações</span>
                            
                        </div>
                    </center>
                    <center>
                        <div style="display: inline-block; justify-content: center; align-items: center;">
                                <h4>Informações do usuário que realizou a submissão</h4>
                                <div style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; display: grid; grid-template-columns: 1fr 1fr; width: 900px;">
                                    <p style="display: grid; grid-template-columns: 2fr 1fr;">
                                        <label style="font-weight: bold;">Matricula:</label>
                                        <span>'.$iduser.'</span>
                                    </p>
                                    <p style="display: grid; grid-template-columns: 2fr 1fr;">
                                        <label style="font-weight: bold;">Data Submissão:</label>
                                        <span>'.date("Y-m-d")."_".date("H-i-s").'</span>
                                    </p>
                                </div>
                            
                        </div>
                    </center>
                    <center>
                        <div style="display: inline-block; justify-content: center; align-items: center;">
                            <p>Para mais informações acesse <a href="https://trad.unilab.edu.br/submissao-e-acompanhamento/">Submissão e acompanhamento</a>.
                        </div>
                    </center>
                </div></center></body>';
    
                $email = \Config\Services::email();
    
                $email->setTo($to);
                $email->setFrom('bottradunilab@gmail.com', 'Bot');
                $email->setSubject($subject);
                $email->setMessage($message);
    
                if($email->send()){
                    header("Location: dashboard");
                }else {
                    return "Erro ao enviar email";
                }
    
            }else {
                return "Não está online";
            }

            header("Location: dashboard");
            exit;
        }else {
            return "Erro ao realizar o envio do comprovante.";
        }
    }
    public function isOnline($site = "https://google.com"){
        if(@fopen($site, "r")){
            return true;
        }else {
            return false;
        }

    }
}
