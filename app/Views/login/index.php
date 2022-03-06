<?php $this->extend('template');?>

<?php $this->section('content'); ?>


<form action='validLogin' method='POST' class="formulario">
    <div class="formulario-corpo">
        <h1>Entrar</h1>
        <div class="formulario-input">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" class="usuario"/>
        </div>
        <div class="formulario-input">
            <label for="password">Senha</label>
            <input type="password" name="password" class="password" id="password"/>
        </div>
        <div class="formulario-input">
            <input type="submit" value="Entrar" class="btnEntrar" />
        </div>
        <div class="center">
            <a href="<?=base_url(). '/register'?>">Não tenho cadastro</a>
        </div>
    </div>
</form>   


<?php $this->endSection(); ?>