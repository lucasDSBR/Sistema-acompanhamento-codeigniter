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
    <link rel='stylesheet' type='text/css' href='../css/style.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

</head>
<body>
	<div class="header">
        <h2>Acompanhamento TradUnilab</h2>
        <div class="menu">
            <p><?php echo $_SESSION['UsuarioNome']; ?></p>
			<p><a href="/dashboard" class="header-sair">Inicio</a></p>
			<p><?php if($_SESSION['UsuarioNivel'] == 1) echo "<a href='/aprovar' class='header-sair'>Aprovar Usuarios</a>"; ?></p>
            <p><a href="/logout" class="header-sair">Sair</a></p>
        </div>
    </div>
    <div class="acompanhamento-corpo">
		<div class="acompanhamento-corpo-corpo">
            <p><a href="/dashboard" class="header-sair">Voltar</a></p>
        </div>
        <div class="acompanhamento-corpo-header">
			<?php
				$url_components = parse_url($_SERVER['HTTP_REFERER']);
				parse_str($url_components['query'], $params);
				$url = $_SERVER['REQUEST_URI'];
				$idAcompanhamento = end(explode("/",$url));
			?>
        </div>
        <div class="acompanhamento-corpo-corpo">
            <form enctype="multipart/form-data" action="/uploadResult" class="formulario"  method='POST'>
                
                <div class="formulario-corpo">
                    <h1>Enviar Resultado</h1>
					<div class="formulario-input">
                        <input type="text" name="idAcompanhamento" id="idAcompanhamento" class="idAcompanhamento" value="<?php echo $idAcompanhamento ?>" />
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
  