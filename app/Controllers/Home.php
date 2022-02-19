<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function dashboard()
    {
        // Se a sessão não existir, inicia uma
        if (!isset($_SESSION)) session_start();
        // Tenta se conectar ao servidor MySQL
        $conexao = mysqli_connect("localhost", "root", "", "dbtradunilab") or trigger_error(mysqli_error($conexao));
        // Tenta se conectar a um banco de dados MySQL
        mysqli_select_db($conexao, 'dbtradunilab') or trigger_error(mysqli_error($conexao));

        $sql_acompanhamento = $_SESSION['UsuarioNivel'] == 1? "SELECT * FROM `acompanhamentos`;" : "SELECT * FROM `acompanhamentos` WHERE (`id_usuario_envio` = '".$_SESSION['UsuarioMatricula']."')";

        $query_acompanhamento = mysqli_query($conexao, $sql_acompanhamento);

        if (!$query_acompanhamento) {
            $mensagem_erro  = 'Erro de sintaxe na query: '.mysqli_error($conexao)."<br>";

            $destino = '/?msg='.$mensagem_erro;

            header("Location: $destino");
            exit;
        }

        $arr = array();
        while($row = mysqli_fetch_assoc($query_acompanhamento)){
            $obj = array(
                'id' => $row['id'], 
                'id_usuario_envio' => $row['id_usuario_envio'], 
                'id_usuario_analise' => $row['id_usuario_analise'], 
                'data_envio' => $row['data_envio'], 
                'data_analise' => $row['data_analise'], 
                'status' => $row['status'],
                'tipo_servico' => $row['tipoServico'],
                'tipo_revisao' => $row['tipoRevisao'], 
                'tipo_traducao' => $row['tipoTraducao'],
                'arquivo' => $row['pathArquivo'],
                'resultado' => $row['pathResultado']
            );
            $arr[] = $obj;
        }
        $_SESSION['Acompanhamentos'] = $arr;
        return view('dashboard');
    }
    public function logout()
    {
        return view('logout');
    }

    public function success()
    {
        return view('success/success');
    }
}
