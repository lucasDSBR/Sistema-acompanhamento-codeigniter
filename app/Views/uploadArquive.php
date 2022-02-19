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
    <script src="./js/jsUploadArquive.js"></script>
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
                        <select id="tipoServico" class="usuario" name="tipoServico" onChange="tipoServ()">
                            <option value="0"> Selecione uma opção </option>
                            <option value="1">Tradução</option>
                            <option value="2">Revisão</option>
                        </select>
                    </div>
                    <div class="formulario-input" id="tipoTraducao">
                        <label for="tipoTraducao">Selecione um tipo de Tradução</label><br/>
                        <select class="usuario" name="tipoTraducao">
                            <option value="0"> Selecione uma opção </option>
                            <option value="1">Português -> Inglês</option>
                            <option value="2">Inglês -> Português</option>
                        </select>
                    </div>
                    <div class="formulario-input"  id="tipoRevisao" >
                        <label for="tipoRevisao">Selecione um tipo de Revisao</label><br/>
                        <select class="usuario" name="tipoRevisao">
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
                        <select id="periodicoOrEvento" class="usuario" name="periodicoOrEvento" onChange="nomePeriodicoEvento()">
                            <option value="0"> Selecione uma opção </option>
                            <option value="1">Periódico</option>
                            <option value="2">Evento</option>
                        </select>
                    </div>
                    <div class="formulario-input" id="nomePeriodicoEvento">
                        <label for="nomePeriodicoOrEvento">Nome do <span id="periOrEvent"></span>:</label><br/>
                        <input type="text" name="nomePeriodicoOrEvento" id="nomePeriodicoOrEvento" class="usuario"/>
                    </div>
                    <div class="formulario-input">
                        <label for="justificativaPedido">Justificativa para o pedido</label>
                        <input type="text" name="justificativaPedido" id="justificativaPedido" class="usuario" maxlength="500" minlength="10"/>
                    </div>
                    <div class="formulario-input">
                        <label for="paginas">Efetuar tradução/revisão de quais páginas?</label>
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
  