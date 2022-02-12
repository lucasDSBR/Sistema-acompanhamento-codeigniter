<?php

    // A sessão precisa ser iniciada em cada página diferente
    if (!isset($_SESSION)) session_start();

    $nivel_necessario = 1;

    // Verifica se não há a variável da sessão que identifica o usuário
    if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < 1)) {
        // Destrói a sessão por segurança
        session_destroy();
        // Redireciona o visitante de volta pro login
        header("Location: /"); 
        exit;
    }

?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='./css/style.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
	<style type="text/css">
		body {
			font-family: "Nunito", Helvetica, Arial, sans-serif;
			margin: 0;
		}
		.formulario{
			margin-top: 4px;
			display: grid;
			flex-wrap: wrap;
			justify-items: center;
		}
        .menu{
            display: flex;
			flex-wrap: wrap;
			justify-items: center;
        }
		.formulario-corpo{
			background: #2342;
			padding: 20px;
		}
		.formulario-input {
			margin-bottom: 10px;
		}
		.formulario-input{
			display: grid;
			grid-template-rows: 1fr
		}
		.formulario-input .usuario {
			height: 40px;
			width: 300px;
		}
		.formulario-input .password {
			height: 40px;
			width: 300px;
		}

		.formulario-input .usuario:focus {
			outline-width: 0;
		}
		.formulario-input .password:focus {
			outline-width: 0;
		}
		.formulario-input .btnEntrar {
			height: 40px;
			width: auto;
			background: #009E98DB;
			border: none;
			color: #ffff;
			font-weight: bold;
			cursor: pointer;
		}
		.formulario-corpo h1 {
			text-align: center;
		}

		/* Restrido */

		.header h2 {
			margin: 0;
			padding: 0;
		}
		.header {
			color:#fff;
			padding: 20px;
			background-color: #009E98DB;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		.header-sair {
			text-decoration: none;
			color: #fff;
			padding: 20px;
		}

		.acompanhamento-corpo {
			max-width: 960px;
			margin: 0 auto;
			display: grid;
			grid-template-rows: 1fr
		}
		.acompanhamento-header-submeter {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		.btnEnviarFile{
			height: 30px;
			width: 100px;
			width: auto;
			background: #009E98DB;
			border: none;
			color: #ffff;
			cursor: pointer;
			border-radius: 4px;
		}

		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}
		
		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}
		
		tr:nth-child(even) {
			background-color: #efefef;
		}
	</style>
</head>
<body>
    <div class="header">
        <h2>Acompanhamento TradUnilab</h2>
        <div class="menu">
            <p>Olá, <?php echo $_SESSION['UsuarioNome']; ?>!</p>
            <p><a href="./logout" class="header-sair">Sair</a></p>
        </div>
        
    </div>
    <div class="acompanhamento-corpo">
        <div class="acompanhamento-header-submeter">
            <h4>Arquivos enviados:</h4>
            <div>
                <span>Deseja enviar um arquivo para análise ?</span>
                <a href="uploadArquive">Enviar</a>
            </div> 
        </div>
        <div class="acompanhamento-corpo-corpo">
            <table>
                    <tr>
                        <th>Usuario envio</th>
						<th>Número da solicitação</th>
                        <th>Situação</th>
                        <th>Arquivo</th>
                        <th>Resultado</th>
                    </tr>
                    <?php
                        foreach ($_SESSION['Acompanhamentos'] as $item) {
                            echo '<tr>
                            <td>'.($item['id_usuario_envio'] == $_SESSION['UsuarioMatricula'] ? "Você" : "Indefinido").'</td>
							<td>'.$item['id'].'</td>
                            <td>'.($item['status'] == 0 ? "Submetido" : ($item['status'] == 1 ?  "Em análise pelos modelos de Inteligência Artificial": ($item['status'] == 2 ? "Em análise pelo(s) colaborador(es)" : ($item['status'] == 3 ? "Concluido" : " ---")))).'</td>
                            <td><a href="/arquivoParaAnalise/'.$item['arquivo'].'.pdf">Baixar</a></td>
                            <td>'.($item['resultado'] == "" ? ($_SESSION['UsuarioNivel'] == 1 ? '<a href="uploadResult/'.$item['id'].'">Enviar Resultado</a>' : "Sem resultado") : ($_SESSION['UsuarioNivel'] == 1 ? '<a href="./resultados/'.$item['resultado'].'.pdf">Baixar</a> | <a href="'.$item['resultado'].'">Cancelar</a>' : '<a href="./resultados/'.$item['resultado'].'.pdf">Baixar</a>')).'</td>
                            </tr>';
                        }
                    ?>
            </table>    
        </div>
    </div>
</body>
</html>
  