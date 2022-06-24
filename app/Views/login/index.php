<?php $this->extend('template');?>

<?php $this->section('content'); ?>


<div >
    <div class="container-login">
        <div class="container-login-sobre">
            <h1>Sobre o TradUnilab</h1>
            <span>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur perferendis natus ipsum obcaecati repudiandae hic minima tempore enim ea a, sunt aliquid tempora perspiciatis? Dicta asperiores autem exercitationem quos distinctio!
            </span>
        </div>
        <div class="container-login-form">
            <form action='validLogin' method='POST' class="formulario">
                <div class="formulario-corpo-login">
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
                        <input type="submit" value="Entrar" class="btnEntrar-login" />
                    </div>
                    <div class="center">
                        <a href="<?=base_url(). '/register'?>">Não tenho cadastro</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $this->endSection(); ?>