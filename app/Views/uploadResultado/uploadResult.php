
<?php $this->extend('template');?>

<?php $this->section('content'); ?>
<body>

    <div class="acompanhamento-corpo">
		<div class="acompanhamento-corpo-corpo">
            <p><a href="/dashboard" class="header-sair">Voltar</a></p>
        </div>
        <div class="acompanhamento-corpo-header">
        </div>
        <div class="acompanhamento-corpo-corpo">
            <form enctype="multipart/form-data" action="/uploadResult" class="formulario"  method='POST'>
                
                <div class="formulario-corpo">
                    <h1>Enviar Resultado</h1>
					<div class="formulario-input">
                        <input type="text" name="idAcompanhamento" id="idAcompanhamento" class="idAcompanhamento" value="<?php echo $idAcompanhamento ?>" />
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
  
<?php $this->endSection(); ?>