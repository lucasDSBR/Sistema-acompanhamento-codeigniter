<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function validLogin()
    {
        if (!empty($_POST) AND (empty($_POST['cpf']) OR empty($_POST['password']))) {
            return view('index');
        }else {
            // Tenta se conectar ao servidor MySQL
            $conexao = mysqli_connect("localhost", "root", "", "dbtradunilab") or trigger_error(mysqli_error($conexao));
            // Tenta se conectar a um banco de dados MySQL
            mysqli_select_db($conexao, 'dbtradunilab') or trigger_error(mysqli_error($conexao));

            $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
            $senha = mysqli_real_escape_string($conexao, $_POST['password']);
            
            // Validação do usuário/senha digitados
            $sql = "SELECT `id`, `nome`, `nivel`, `matricula` FROM `usuarios` WHERE (`cpf` = '".$cpf."') AND (`senha` = '".sha1($senha)."') AND (`ativo` = 1) LIMIT 1";
            $query = mysqli_query($conexao, $sql);
            
            if (mysqli_num_rows($query) != 1) {
                // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
                header("Location: index.php?erro='Dados incorretos.'"); exit;
            } else {
                // Salva os dados encontrados na variável $resultado
                $resultado_data_user = mysqli_fetch_assoc($query);
                


                $sql_acompanhamento = "SELECT * FROM `acompanhamentos`WHERE (`id_usuario_envio` = '".$resultado_data_user['matricula']."')";
                $query_acompanhamento = mysqli_query($conexao, $sql_acompanhamento);

                $arr = array();
                if (!$query_acompanhamento) {
                    $mensagem_erro  = 'Erro de sintaxe na query: '.mysqli_error($conexao)."<br>";
                    $destino = 'index.php?msg='.$mensagem_erro;
                    header("Location: $destino");
                    exit;
                }

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


                // Se a sessão não existir, inicia uma
                if (!isset($_SESSION)) session_start();

                // Salva os dados encontrados na sessão
                $_SESSION['UsuarioID'] = $resultado_data_user['id'];
                $_SESSION['UsuarioNome'] = $resultado_data_user['nome'];
                $_SESSION['UsuarioNivel'] = $resultado_data_user['nivel'];
                $_SESSION['UsuarioMatricula'] = $resultado_data_user['matricula'];
                $_SESSION['Acompanhamentos'] = $arr;

                // Redireciona o visitante para dash board
                header("Location: dashboard");
                exit;
            }
        }
    }
}
