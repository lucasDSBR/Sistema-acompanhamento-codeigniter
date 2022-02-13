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
    <title>Dashboard</title>
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
            <p><a href="/aprovar" class="header-sair">Voltar</a></p>
        </div>
        <div class="acompanhamento-corpo-corpo">
        <?php

            foreach ($_SESSION['DetalheUser'] as $item) {
                echo '<div calss="card">
                    <div class="card-header">
                        <h4>Informações do Usuário:</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            <label>Nome:</label><br/>
                            <span>'.$item['nome'].'</span>
                        </p>
                        <p>
                            <label>E-mail:</label><br/>
                            <span>'.$item['email'].'</span>
                        </p>
                        <p>
                            <label>Matricula:</label><br/>
                            <span>'.$item['matricula'].'</span>
                        </p>
                        <p>
                            <label>CPF:</label><br/>
                            <span>'.$item['cpf'].'</span>
                        </p>
                        <p>
                            <label>Nivel de acesso:</label><br/>
                            <span>'.($item['nivel'] == 0? "Administrador" : "Usuario padrão").'</span>
                        </p>
                        <p>
                            <label>Situação:</label><br/>
                            <span>'.($item['ativo'] == 0? "Aguardando Aprovação" : "Ativo").'</span>
                        </p>
                        <p>
                            <label>Data de Cadastro:</label><br/>
                            <span>'.$item['data_cadastro'].'</span>
                        </p>
                        <p>
                            <label>Instituto/Curso/Setor na Unilab:</label><br/>
                            <span>'.$item['ics'].'</span>
                        </p>
                        <p>
                            <label>Comprovante:</label><br/>
                            <span><a href="/comprovantes/'.$item['comprovante'].'.pdf">Baixar</a></span>
                        </p>
                        <p>
                            <label>Finalidade de uso da plataforma TradUnilab:</label><br/>
                            <span>'.$item['finalidade'].'</span>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="aprovarUser/'.$item['matricula'].'">Aprovar</a>
                    </div>
                </div>';
            }
            ?>   
        </div>
    </div>
</body>
</html>
  