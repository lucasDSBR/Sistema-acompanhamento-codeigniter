<?php

namespace App\Controllers;
use App\Models\AcompanhamentoModel;
use \DateTime;

class Upload extends BaseController
{
    private $maxFileUpload = 2048;
    private $extensionsPermited = ['pdf'];
    public function __construct()
    {
        $this->model = new AcompanhamentoModel();
    }
    public function uploadResult($id = null)
    {
        $data['idAcompanhamento'] = $id;
        return view('uploadResultado/uploadResult', $data);
    }
    public function to_uploadResult()
    {
        $acompanhamento = new AcompanhamentoModel();
        //Validando arquivo enviado
        $file = $this->request->getFile('file');

        $fileError = $file->getError();

        if($fileError <> 0 )
            return redirect()->back()
                ->withInput()
                ->with('errors', ['file' => 'errro']);

        $fileExtensionClient = $file->guessExtension();
        if(!in_array($fileExtensionClient, $this->extensionsPermited ))
            return redirect()->back()
                ->withInput()
                ->with('errors', ['file' => 'Extensão não permitida para o arquivo']);

        if((int)$file->getSizeByUnit('kb') > $this->maxFileUpload)
            return redirect()->back()
                ->withInput()
                ->with('errors', ['file' => 'Arquivo maior do que o permitido']);


        $session = session();
        $userSession = $session->get('user');
        $file = $this->request->getFile('file');
        $data = new DateTime();
        $fields = $this->request->getPost();
        //Tentando gravar arquivo na pasta
        if (!$file->hasMoved()) {
            $filepath = 'resultados/';
            $fields['pathResultado'] = $filepath.$userSession['id'].'/'.$file->getName();
            $file->move($filepath.$userSession['id'].'/');
            
            $dataAcompanhamento = [
                'data_analise' => $data->format('Y-m-d H:i:s'),
                'status' => 3,
                'pendente' => "0",
                'id_usuario_analise' => intval($userSession['id']),
                'pathResultado' => $filepath.$userSession['id'].'/'.$file->getName(),
            ];
            if($acompanhamento->update($fields['idAcompanhamento'], $dataAcompanhamento))
                return redirect()->to('dashboard');
        }

        $errors = $this->model->validation->getErrors();
        return redirect()->to('submissoes/new')->with('erros', $errors)->withInput();

        var_dump($this->request);
    }

    public function cancelUploadResult($id = null)
    {
        $acompanhamento = new AcompanhamentoModel();

        $d = $acompanhamento->where('id', $id)->first();
        if(unlink($d['pathResultado'])){
            $dataAcompanhamento = [
                'data_analise' => "0000-00-00 00:00:00",
                'status' => 0,
                'pendente' => "1",
                'id_usuario_analise' => null,
                'pathResultado' => null,
            ];
            if($acompanhamento->update($id, $dataAcompanhamento))
                return redirect()->to('dashboard');
        }
        
    }

    public function cancelUploadArquive($id = null)
    {
        $acompanhamento = new AcompanhamentoModel();

        $d = $acompanhamento->where('id', $id)->first();
        if(unlink($d['pathArquivo'])){
            if($acompanhamento->delete($id))
                return redirect()->to('dashboard');
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

            header("Location: /success");
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
