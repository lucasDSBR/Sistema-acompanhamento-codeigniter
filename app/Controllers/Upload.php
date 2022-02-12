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
            $query = mysqli_query($conexao, $sql);
            if($query == 1){
                header("Location: dashboard");
            }

        }
        else {
            echo "Erro ao enviar o resultado";
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
            header("Location: dashboard");
            exit;
        }else {
            return "Erro ao realizar o envio do comprovante.";
        }
    }
}
