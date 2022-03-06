<?php $this->extend('template');?>

<?php $this->section('content'); ?>

<form action="<?= base_url() . 'register/create'?>" method='POST' class="formulario" enctype="multipart/form-data">
    <div class="formulario-corpo">
        <h1>Cadastro</h1>
        <div class="formulario-input">
            <label for="usuario">Nome</label>
            <input type="text" name="nome" id="usuario" class="usuario" value="<?=old('nome')?>"/>
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


<?php $this->endSection(); ?>