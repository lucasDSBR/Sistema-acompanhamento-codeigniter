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
    <title>Enviar para análise</title>
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
        <div class="acompanhamento-corpo-corpo">
            <a href="dashboard">Retornar</a>
        </div>
        
        <div class="acompanhamento-corpo-corpo">
            <form enctype="multipart/form-data" action="uploadArquive" class="formulario"  method='POST'>
                
                <div class="formulario-corpo">
                    <h1>Enviar Arquivo</h1>
                    <div class="formulario-input" style="display: none;">
                        <label for="matricula">Sua Matricula</label>
                        <input type="text" name="matricula" id="matricula" class="usuario" value="<?php echo $_SESSION['UsuarioMatricula']; ?>" />
                    </div>
                    <div class="formulario-input">
                        <label for="titulo">Titulo do Artigo</label>
                        <input type="text" name="titulo" id="titulo" class="usuario"/>
                    </div>
                    <div class="formulario-input">
                        <label for="tipoServico">Tipo de Serviço</label>
                        <select id="tipoServico" class="usuario" name="tipoServico">
                            <option value="0"> Selecione uma opção </option>
                            <option value="1">Tradução</option>
                            <option value="2">Revisão</option>
                        </select>
                    </div>
                    <div class="formulario-input">
                        <label for="tipoTraducao">Selecione um tipo de Tradução</label>
                        <select id="tipoTraducao" class="usuario" name="tipoTraducao">
                            <option value="0"> Selecione uma opção </option>
                            <option value="1">Português -> Inglês</option>
                            <option value="2">Inglês -> Português</option>
                        </select>
                    </div>
                    <div class="formulario-input">
                        <label for="tipoRevisao">Selecione um tipo de Revisao</label>
                        <select id="tipoRevisao" class="usuario" name="tipoRevisao">
                            <option value="0"> Selecione uma opção </option>
                            <option value="1">Inglês</option>
                            <option value="2">Português</option>
                        </select>
                    </div>
                    <div class="formulario-input">
                        <label for="NomeColabs">Nome dos demais colaboradores do artigo</label>
                        <input type="text" name="NomeColabs" id="NomeColabs" class="usuario"/>
                    </div>
                    <div class="formulario-input">
                        <label for="periodicoOrEvento">Enviar para periódico ou evento?</label>
                        <select id="periodicoOrEvento" class="usuario" name="periodicoOrEvento">
                            <option value="0"> Selecione uma opção </option>
                            <option value="1">Periódico</option>
                            <option value="2">Evento</option>
                        </select>
                    </div>
                    <div class="formulario-input">
                        <label for="nomePeriodicoOrEvento">Nome do periódico ou evento</label>
                        <input type="text" name="nomePeriodicoOrEvento" id="nomePeriodicoOrEvento" class="usuario"/>
                    </div>
                    <div class="formulario-input">
                        <label for="justificativaPedido">Justificativa para o pedido</label>
                        <input type="text" name="justificativaPedido" id="justificativaPedido" class="usuario"/>
                    </div>
                    <div class="formulario-input">
                        <label for="paginas">efetuar tradução/revisão de quais páginas?</label>
                        <input type="text" name="paginas" id="paginas" class="usuario" placeholder="ex. 1, 3, 4, 5-9"/>
                    </div>
                    <div class="formulario-input">
                        <label for="file">Escolha um arquivo</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="3000000000" />
                        <input type="file"  name="file" id="file" />
                    </div>
                    <div class="formulario-input">
                        <input type="submit" value="Enviar" class="btnEntrar" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
  