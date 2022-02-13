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
        <div class="acompanhamento-header-submeter">
			<h4><?php if($_SESSION['UsuarioNivel'] == 1) {echo "Submissões";}else{echo "Suas Submissões";}?></h4>
            <div>
                <a href="uploadArquive"  class="header-sair">Enviar arquivo para análise </a>
            </div> 
        </div>
        <div class="acompanhamento-corpo-corpo">
            <table>
                    <tr>
                        <th>Usuario envio</th>
						<th>Número da solicitação</th>
                        <th>Situação</th>
                        <th>Arquivo Enviado</th>
                        <th>Resultado</th>
                    </tr>
                    <?php
						
                        foreach ($_SESSION['Acompanhamentos'] as $item) {
                            echo '<tr>
                            <td>'.($item['id_usuario_envio'] == $_SESSION['UsuarioMatricula'] ? "Você" : $item['id_usuario_envio']).'</td>
							<td>'.$item['id'].'</td>
                            <td>'.($item['status'] == 0 ? "Submetido" : ($item['status'] == 1 ?  "Em análise pelos modelos de Inteligência Artificial": ($item['status'] == 2 ? "Em análise pelo(s) colaborador(es)" : ($item['status'] == 3 ? "Resultado Diponível" : " --- ")))).'</td>
                            <td><a href="/arquivoParaAnalise/'.$item['arquivo'].'.pdf"><img src="/imgs/download.svg"/></a></td>
                            <td>'.($item['resultado'] == "" ? ($_SESSION['UsuarioNivel'] == 1 ? '<a href="uploadResult/'.$item['id'].'"><img src="/imgs/upload.svg"/></a>' : "Sem resultado") : ($_SESSION['UsuarioNivel'] == 1 ? '<a href="./resultados/'.$item['resultado'].'.pdf"><img src="/imgs/download.svg"/></a> | <a href="/cancelUploadResult/'.$item['id'].'"><img src="/imgs/cancel.svg"/></a>' : '<a href="./resultados/'.$item['resultado'].'.pdf"><img src="/imgs/download.svg"/></a>')).'</td>
                            </tr>';
                        }
                    ?>
            </table>
			<div class="manual">
				<span class="item-manual">
					<div>Enviar</div>
					<img src="/imgs/upload.svg"/>
				</span>
				<span class="item-manual">
					<div>/ Baixar</div>
					<img src="/imgs/download.svg"/>
				</span>
                <span class="item-manual">
					<div>/ Detalhes</div>
					<img src="/imgs/visibility.svg"/>
				</span>
                <span class="item-manual">
					<div>/ Aprovar</div>
					<img src="/imgs/aprove.svg"/>
				</span>
				<span class="item-manual">
					<div>/ Cencelar ou Cencelar envio</div>
					<img src="/imgs/cancel.svg"/>
				</span>
			</div>
        </div>
    </div>
</body>
</html>
  