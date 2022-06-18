<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Files\File;
use DateTime;
use DateTimeImmutable;

class Register extends BaseController
{
    private $maxFileUpload = 2048;
    private $extensionsPermited = ['pdf'];

    public function __construct()
    {
        $this->model = new UsuarioModel();
    }
    public function index()
    {
        return view('register/index');
    }

    public function create()
    {
        
        //Validando dados enviados
        $fields = $this->request->getPost();
        $validation = $this->model->validate($fields);
        if(!$validation){
            $errors = $this->model->validation->getErrors();
            return redirect()->back()
                ->withInput()
                ->with('errors', $errors);
        }

        //Validando a senha enviada
        if($fields['senha'] != $fields['repetirsenha'])
            return redirect()->back()
                ->withInput()
                ->with('errors', ['repetirsenha' => 'As senhas informadas não são iguais']);

        //Validando arquivo enviado
        $file = $this->request->getFile('file');

        $fileError = $file->getError();

        if($fileError <> 0 )
            return redirect()->back()
                ->withInput()
                ->with('errors', ['file' => $this->getFileErrorMessage($fileError)]);

        $fileExtensionClient = $file->guessExtension();
        if(!in_array($fileExtensionClient, $this->extensionsPermited ))
            return redirect()->back()
                ->withInput()
                ->with('errors', ['file' => 'Extensão não permitida para o arquivo']);

        if((int)$file->getSizeByUnit('kb') > $this->maxFileUpload)
            return redirect()->back()
                ->withInput()
                ->with('errors', ['file' => 'Arquivo maior do que o permitido']);

        //Tentando gravar arquivo na pasta
        if (!$file->hasMoved()) {
            $filepath = 'comprovantes/';
            $fields['comprovante'] = $filepath.$fields['matricula'].'/'.$file->getName();
            $file->move($filepath.$fields['matricula'].'/');
        }

        if(!$this->model->insert($fields)){
            unlink(WRITEPATH . 'uploads/' . $filepath); //excluir arquivo recém enviado

            return redirect()->back()
                ->withInput()
                ->with('alert', ['danger' => 'Enfrentamos algum problema ao tentar inserir os dados no banco']);
        }
        
        return redirect()->to('register/success');
        
        
                    
        var_dump($this->model->validation->getErrors());
        exit();
        //             $targetfolder = "./comprovantes/";
        // $targetfolder = $targetfolder.$_POST['matricula']."-".date("Y-m-d").".pdf" ;
        
        // if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)){
        //     $path = basename($_POST['matricula']."-".date("Y-m-d"));
        //     // Tenta se conectar ao servidor MySQL
        //     $conexao = mysqli_connect("localhost", "root", "", "dbtradunilab") or trigger_error(mysqli_error($conexao));
        //     // Tenta se conectar a um banco de dados MySQL
        //     mysqli_select_db($conexao, 'dbtradunilab') or trigger_error(mysqli_error($conexao));


        //     $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        //     $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
        //     $email = mysqli_real_escape_string($conexao, $_POST['email']);
        //     $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
        //     $finalidade = mysqli_real_escape_string($conexao, $_POST['finali']);
        //     $ics = mysqli_real_escape_string($conexao, $_POST['ics']);
        //     $nivel = mysqli_real_escape_string($conexao, $_POST['nivel']);
        //     $matricula = mysqli_real_escape_string($conexao, $_POST['matricula']);
        //     $comprovante = mysqli_real_escape_string($conexao, $path);

            
        //     // Validação do usuário/senha digitados
        //     $comandoSql = "INSERT INTO usuarios VALUES (NULL, '".$nome."', SHA1('".$senha."'), '".$email."', '".$nivel."', 0, NOW( ), '".$cpf."', '".$ics."', '".$matricula."', '".$comprovante."', '".$finalidade."');";
        //     $query = mysqli_query($conexao, $comandoSql);
        //     return view('index');
        // }else {
        //     return "Erro ao realizar o envio do comprovante.";
        // }
    }

    public function success()
    {
        return view('register/success');
    }
    private function getFileErrorMessage($fileError)
    {
        switch($fileError){
            case 0: return "Nenhum erro no arquivo"; break;
            case 1: return "Arquivo maior que o permitido no servidor"; break;
            case 2: return "Arquivo maior que o permitido no formulário"; break;
            case 3: return "Erro de integridade no arquivo"; break;
            case 4: return "Você precisa enviar um arquivo"; break;
            case 6: return "Erro de pasta temporária"; break;
            case 7: return "Falha ao tentar gravar o arquivo"; break;
            case 8: return "Extensão não permitida pelo servidor"; break;
        }
    }

    public function download()
    {
        
    }

}
