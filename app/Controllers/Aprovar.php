<?php

namespace App\Controllers;

class Aprovar extends BaseController
{
    public function aprovar()
    {
        // Tenta se conectar ao servidor MySQL
        $conexao = mysqli_connect("localhost", "root", "", "dbtradunilab") or trigger_error(mysqli_error($conexao));
        // Tenta se conectar a um banco de dados MySQL
        mysqli_select_db($conexao, 'dbtradunilab') or trigger_error(mysqli_error($conexao));

        $sql_usuariosInativos = "SELECT * FROM `usuarios`WHERE (`ativo` = 0)";
        $query_usuariosInativos = mysqli_query($conexao, $sql_usuariosInativos);

        $arr = array();
        if (!$query_usuariosInativos) {
            $mensagem_erro  = 'Erro de sintaxe na query: '.mysqli_error($conexao)."<br>";
            $destino = 'index.php?msg='.$mensagem_erro;
            header("Location: $destino");
            exit;
        }

        while($row = mysqli_fetch_assoc($query_usuariosInativos)){
            $obj = array(
                'id' => $row['id'], 
                'nome' => $row['nome'], 
                'email' => $row['email'], 
                'nivel' => $row['nivel'], 
                'ativo' => $row['ativo'], 
                'data_cadastro' => $row['data_cadastro'],
                'cpf' => $row['cpf'],
                'ics' => $row['ics'], 
                'matricula' => $row['matricula'],
                'comprovante' => $row['comprovante'],
                'finalidade' => $row['finalidade']
            );
            $arr[] = $obj;
        }


        // Se a sessão não existir, inicia uma
        if (!isset($_SESSION)) session_start();

        // Salva os dados encontrados na sessão
        $_SESSION['UsuariosInativos'] = $arr;

        // Redireciona o visitante para dash board
        return view('aprovar');
    }

    public function detalhesUser($matricula = null)
    {
        // Tenta se conectar ao servidor MySQL
        $conexao = mysqli_connect("localhost", "root", "", "dbtradunilab") or trigger_error(mysqli_error($conexao));
        // Tenta se conectar a um banco de dados MySQL
        mysqli_select_db($conexao, 'dbtradunilab') or trigger_error(mysqli_error($conexao));

        $sql_usuariosInativos = "SELECT * FROM `usuarios`WHERE (`matricula` = $matricula)";
        $query_usuariosInativos = mysqli_query($conexao, $sql_usuariosInativos);

        $arr = array();
        if (!$query_usuariosInativos) {
            $mensagem_erro  = 'Erro de sintaxe na query: '.mysqli_error($conexao)."<br>";
            $destino = 'index.php?msg='.$mensagem_erro;
            header("Location: $destino");
            exit;
        }

        while($row = mysqli_fetch_assoc($query_usuariosInativos)){
            $obj = array(
                'id' => $row['id'], 
                'nome' => $row['nome'], 
                'email' => $row['email'], 
                'nivel' => $row['nivel'], 
                'ativo' => $row['ativo'], 
                'data_cadastro' => $row['data_cadastro'],
                'cpf' => $row['cpf'],
                'ics' => $row['ics'], 
                'matricula' => $row['matricula'],
                'comprovante' => $row['comprovante'],
                'finalidade' => $row['finalidade']
            );
            $arr[] = $obj;
        }


        // Se a sessão não existir, inicia uma
        if (!isset($_SESSION)) session_start();

        // Salva os dados encontrados na sessão
        $_SESSION['DetalheUser'] = $arr;

        // Redireciona o visitante para dash board
        return view('detalhesUserId');
    }

    function aprovarUser($matriculaUser = null)
    {
        //Iniciando conexao e enviadno atualização
        // Tenta se conectar ao servidor MySQL
        $conexao = mysqli_connect("localhost", "root", "", "dbtradunilab") or trigger_error(mysqli_error($conexao));
        // Tenta se conectar a um banco de dados MySQL
        mysqli_select_db($conexao, 'dbtradunilab') or trigger_error(mysqli_error($conexao));

        $matricula = mysqli_real_escape_string($conexao, $matriculaUser);
        // Validação do usuário/senha digitados
        $sql = "SELECT * FROM `usuarios` WHERE (`matricula` = '".$matricula."');";
        $query = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($query);
        $sqlUpdate = "UPDATE `usuarios` SET `ativo` = 1 WHERE (`matricula` = $matricula);";
        mysqli_query($conexao, $sqlUpdate);
        header("Location: /aprovar"); exit;
    }
}
