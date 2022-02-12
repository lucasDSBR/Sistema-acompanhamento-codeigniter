<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index()
    {
        return view('register');
    }

    public function registerUser()
    {

        $targetfolder = "./comprovantes/";

        $targetfolder = $targetfolder.$_POST['matricula']."-".date("Y-m-d").".pdf" ;
        
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)){
            $path = basename($_POST['matricula']."-".date("Y-m-d"));
            // Tenta se conectar ao servidor MySQL
            $conexao = mysqli_connect("localhost", "root", "", "dbtradunilab") or trigger_error(mysqli_error($conexao));
            // Tenta se conectar a um banco de dados MySQL
            mysqli_select_db($conexao, 'dbtradunilab') or trigger_error(mysqli_error($conexao));


            $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
            $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
            $email = mysqli_real_escape_string($conexao, $_POST['email']);
            $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
            $finalidade = mysqli_real_escape_string($conexao, $_POST['finali']);
            $ics = mysqli_real_escape_string($conexao, $_POST['ics']);
            $nivel = mysqli_real_escape_string($conexao, $_POST['nivel']);
            $matricula = mysqli_real_escape_string($conexao, $_POST['matricula']);
            $comprovante = mysqli_real_escape_string($conexao, $path);

            
            // Validação do usuário/senha digitados
            $comandoSql = "INSERT INTO usuarios VALUES (NULL, '".$nome."', SHA1('".$senha."'), '".$email."', '".$nivel."', 0, NOW( ), '".$cpf."', '".$ics."', '".$matricula."', '".$comprovante."', '".$finalidade."');";
            $query = mysqli_query($conexao, $comandoSql);
            return view('index');
        }else {
            return "Erro ao realizar o envio do comprovante.";
        }
    }

}
