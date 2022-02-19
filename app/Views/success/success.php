<?php

    // A sessão precisa ser iniciada em cada página diferente
    if (!isset($_SESSION)) session_start();

    $nivel_necessario = 1;

    // Verifica se não há a variável da sessão que identifica o usuário
    if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] != $nivel_necessario)) {
        // Redireciona o visitante de volta pro login
        header("Location: /dashboard"); 
        exit;
    }

?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sucesso !</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='./css/style.css'>
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
    <div class="card-success">
        <div class="cad-success-item">
            <div class="cad-success-item-header">
                <p><img src="./imgs/aprove.svg"></p>
                <p>Ação realizada com sucesso !</p>
            </div>
            <div class="cad-success-item-body">
                <p>Aguarde. Você será redirecionado para a página princial. Ou <a href="/dashboard">Clique aqui</a> para ir.</p>
            </div>
            <p><div id="time"></p>
        </div>
    </card>
</body>
<script>
    var counter = 5;
    var timer = setInterval(function() {
    if( counter <= 0 ) {
        clearInterval( timer );
        window.location.href = "/dashboard";
    }
    document.getElementById('time').innerText=counter--
    }, 1000);
</script>
</html>
  