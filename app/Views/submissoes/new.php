<?php $this->extend('template');?>

<?php $this->section('content'); ?>

<div class="acompanhamento-corpo">
        <div class="acompanhamento-corpo-corpo">
            <p><a href="/dashboard" class="header-sair">Voltar</a></p>
        </div>

        <div class="acompanhamento-corpo-corpo">
            <form enctype="multipart/form-data" action="<?=base_url().'/submissoes' ?>" class="formulario"  method='POST'>
                
                <div class="formulario-corpo">
                    <h1>Enviar Arquivo</h1>
                    <div class="formulario-input">
                        <label for="titulo">Titulo do Artigo</label>
                        <input type="text" name="titulo" id="titulo" class="usuario"/>
                    </div>
                    <div class="formulario-input">
                        <label for="tipoServico">Tipo de Serviço</label>
                        <select id="tipoServico" class="usuario" name="tipoServico" onChange="tipoServ()">
                            <option value="0">Selecione uma opção </option>
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
                        <input type="file" name="file" id="file" />
                    </div>
                    <div class="formulario-input">
                        <input type="submit" value="Enviar" class="btnEntrar" />
                    </div>
                </div>
            </form>
        </div>
    </div>
<script src="<?=base_url() . '/js/jsUploadArquive.js' ?>"></script>
<?php $this->endSection(); ?>