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
    <div class="acompanhamento-corpo">
        <div class="acompanhamento-corpo-corpo">
            <p><a href="/dashboard" class="header-sair">Voltar</a></p>
        </div>
        <div class="acompanhamento-header-submeter">
            <div>
                <h4>Tabela de Usuários aguardando aprovação:</h4>
                <span>Ao aprovar um usuário, você dá a permissão a ele para submeter projetos para tradução e/ou revisão.</span>
            </div>
        </div>
        <div class="acompanhamento-corpo-corpo">

            <table>
                    <tr>
                        <th>Usuario</th>
						<th>Matricula</th>
                        <th>Comprovante</th>
                        <th>Opções</th>
                    </tr>
                    <?php

                        foreach ($_SESSION['UsuariosInativos'] as $item) {
                            echo '<tr>
                            <td>'.$item['nome'].'</td>
                            <td>'.$item['matricula'].'</td>
                            <td>'.($item['comprovante'] != ""? '<a href="comprovantes/'.$item['comprovante'].'.pdf"><img src="/imgs/download.svg"/></a>' : "Não informado").'</td>
                            <td><a href="/detalhesUserId/'.$item['matricula'].'"><img src="/imgs/visibility.svg"/></a> | <a href="aprovarUser/'.$item['matricula'].'"><img src="/imgs/aprove.svg"/></a></td>
                            </tr>';
                        }
                    ?>
            </table>    
        </div>
    </div>
</body>
</html>
  