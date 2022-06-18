<?php $this->extend('template');?>
<link rel='stylesheet' type='text/css' href='<?=base_url() . '/css/login.css' ?>'>

<?php $this->section('content'); ?>
    <div class="acompanhamento-corpo">
        <div class="acompanhamento-corpo-corpo">
            <p><a href="/aprovar" class="header-sair">Voltar</a></p>
        </div>
        <div class="acompanhamento-corpo-corpo">
        <?php
            echo '<div calss="card">
                    <div class="card-header">
                        <h4>Informações do Usuário:</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            <label>Nome:</label><br/>
                            <span>'.$usuario['nome'].'</span>
                        </p>
                        <p>
                            <label>E-mail:</label><br/>
                            <span>'.$usuario['email'].'</span>
                        </p>
                        <p>
                            <label>Matricula:</label><br/>
                            <span>'.$usuario['matricula'].'</span>
                        </p>
                        <p>
                            <label>CPF:</label><br/>
                            <span>'.$usuario['cpf'].'</span>
                        </p>
                        <p>
                            <label>Nivel de acesso:</label><br/>
                            <span>'.($usuario['nivel'] == 0? "Administrador" : "Usuario padrão").'</span>
                        </p>
                        <p>
                            <label>Situação:</label><br/>
                            <span>'.($usuario['ativo'] == 0? "Aguardando Aprovação" : "Ativo").'</span>
                        </p>
                        <p>
                            <label>Data de Cadastro:</label><br/>
                            <span>'.$usuario['data_cadastro'].'</span>
                        </p>
                        <p>
                            <label>Instituto/Curso/Setor na Unilab:</label><br/>
                            <span>'.$usuario['ics'].'</span>
                        </p>
                        <p>
                            <label>Comprovante:</label><br/>
                            <span><a href="/comprovantes/'.$usuario['comprovante'].'.pdf" download>Baixar</a></span>
                        </p>
                        <p>
                            <label>Finalidade de uso da plataforma TradUnilab:</label><br/>
                            <span>'.$usuario['finalidade'].'</span>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="aprovarUser/'.$usuario['matricula'].'">Aprovar</a>
                    </div>
                </div>';
            ?>   
        </div>
    </div>
<?php $this->endSection(); ?>