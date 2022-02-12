<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registro</title>
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
			margin-top: 80px;
			display: grid;
			flex-wrap: wrap;
			justify-items: center;
		}
		.formulario-corpo{
			background: #2342;
			padding: 20px;
            max-width: 980px;
		}
		.formulario-input {
            word-break: break-all;
			margin-bottom: 10px;
		}
        label{
            word-break: normal;
            width: 380px;
        }
		.formulario-input{
			display: grid;
			grid-template-rows: 1fr
		}
		.formulario-input .usuario {
			height: 40px;
			width: 400px;
            border: .5px solid #2342;
		}
        .formulario-input .tipoVinculo {
			height: 40px;
			width: 400px;
            border: .5px solid #2342;
		}
		.formulario-input .password {
			height: 40px;
			width: 400px;
            border: .5px solid #2342;
		}
        .formulario-input .ics {
			height: 40px;
			width: 400px;
            border: .5px solid #2342;
		}
        .formulario-input .matricula {
			height: 40px;
			width: 400px;
            border: .5px solid #2342;
		}
        .formulario-input .finalidade {
            word-break: break-all;
			height: 40px;
			width: 400px;
            border: .5px solid #2342;
		}

		.formulario-input .usuario:focus {
			outline-width: 0;
		}
		.formulario-input .password:focus {
			outline-width: 0;
		}
        .formulario-input .ics:focus {
			outline-width: 0;
		}
		.formulario-input .matricula:focus {
			outline-width: 0;
		}
        .formulario-input .finalidade:focus {
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
    <form action='register' method='POST' class="formulario" enctype="multipart/form-data">
        <div class="formulario-corpo">
            <h1>Cadastro</h1>
            <div class="formulario-input">
                <label for="usuario">Nome</label>
                <input type="text" name="nome" id="usuario" class="usuario"/>
            </div>
            <div class="formulario-input">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="usuario"/>
            </div>
            <div class="formulario-input">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" class="usuario"/>
            </div>
            <div class="formulario-input">
                <label for="nivel">Vinculo</label>
                <select id="nivel" class="tipoVinculo" name="nivel">
                    <option value="2">Aluno</option>
                    <option value="3">Professor</option>
                    <option value="4">Técnico Administrativo</option>
                </select>
            </div>
            <div class="formulario-input">
                <label for="matricula">Matrícula(Sigaa ou Siape)</label>
                <input type="text" name="matricula" id="matricula" class="matricula"/>
            </div>
            <div class="formulario-input">
                <label for="ics">Instituto/Curso ou Setor na Unilab</label>
                <input type="text" name="ics" id="ics" class="ics"/>
            </div>
            <div class="formulario-input">
                <label for="finali">Qual sua finalidade de uso da plataforma TradUnilab?</label>
                <input type="text" name="finali" id="finali" class="finalidade"/>
            </div>
            <div class="formulario-input">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" class="password"/>
            </div>
            <div class="formulario-input">
                <label for="repetirsenha">Repitir senha</label>
                <input type="password" name="repetirsenha" id="repetirsenha" class="password"/>
            </div>
            <div class="formulario-input">
                <label for="file">Comprovante de vínculo com a Unilab (ex. comprovante de matrícula, carteira funcional, termo de posse)</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000000" />
                <input type="file"  name="file" id="file" />
            </div>
            
            <div class="formulario-input">
                <input type="submit" value="Cadastrar" class="btnEntrar" disable/>
            </div>
        </div>
    </form>    
</body>
</html>