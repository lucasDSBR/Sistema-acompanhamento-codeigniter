<?php $this->extend('template');?>

<?php $this->section('content'); ?>
	<?php $errors = session()->getFlashdata('errors') ?? session()->getFlashdata(); ?>

    <form action='<?=base_url() . '/register' ?>' method='POST' class="formulario" enctype="multipart/form-data">
        <div class="formulario-corpo">
            <h1>Cadastro</h1>
            <div class="formulario-input">
                <label for="usuario">Nome</label>
                <input type="text" name="nome" id="usuario" class="usuario" value="<?=old('nome')?>"/>
				<p class="validation-message"><?=$errors['nome'] ?? ''?></p>
            </div>
            <div class="formulario-input">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="usuario" value="<?=old('email')?>"/>
				<p class="validation-message"><?=$errors['email'] ?? ''?></p>
            </div>
            <div class="formulario-input">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" class="usuario" value="<?=old('cpf')?>"/>
				<p class="validation-message"><?=$errors['cpf'] ?? ''?></p>
            </div>
            <div class="formulario-input">
                <label for="nivel">Vinculo</label>
                <select id="nivel" class="tipoVinculo" name="nivel">
                    <option value="2" <?=old('nivel') == "2" ? 'selected' : ''?>>Aluno</option>
                    <option value="3" <?=old('nivel') == "3" ? 'selected' : ''?>>Professor</option>
                    <option value="4" <?=old('nivel') == "4" ? 'selected' : ''?>>Técnico Administrativo</option>
                </select>
            </div>
            <div class="formulario-input">
                <label for="matricula">Matrícula(Sigaa ou Siape)</label>
                <input type="text" name="matricula" id="matricula" class="matricula" value="<?=old('matricula')?>"/>
				<p class="validation-message"><?=$errors['matricula'] ?? ''?></p>
            </div>
            <div class="formulario-input">
                <label for="ics">Instituto/Curso ou Setor na Unilab</label>
                <input type="text" name="ics" id="ics" class="ics"  value="<?=old('ics')?>"/>
				<p class="validation-message"><?=$errors['ics'] ?? ''?></p>
            </div>
            <div class="formulario-input">
                <label for="finalidade">Qual sua finalidade de uso da plataforma TradUnilab?</label>
                <input type="text" name="finalidade" id="finalidade" class="finalidade" value="<?=old('finalidade')?>"/>
				<p class="validation-message"><?=$errors['finalidade'] ?? ''?></p>
            </div>
            <div class="formulario-input">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" class="password" value="<?=old('senha')?>"/>
				<p class="validation-message"><?=$errors['senha'] ?? ''?></p>
            </div>
            <div class="formulario-input">
                <label for="repetirsenha">Repetir senha</label>
                <input type="password" name="repetirsenha" id="repetirsenha" class="password"  value="<?=old('repetirsenha')?>"/>
				<p class="validation-message"><?=$errors['repetirsenha'] ?? ''?></p>
            </div>
            <div class="formulario-input">
                <label for="file">Comprovante de vínculo com a Unilab (ex. comprovante de matrícula, carteira funcional, termo de posse)</label>
                <input type="file" name="file" id="file" />
				<p class="validation-message"><?=$errors['file'] ?? ''?></p>
            </div>
            
            <div class="formulario-input">
                <input type="submit" value="Cadastrar" class="btnEntrar" />
            </div>
        </div>
    </form>    

	<?php $this->endSection(); ?>