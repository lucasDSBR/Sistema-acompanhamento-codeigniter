
<?php $this->extend('template');?>

<?php $this->section('content'); ?>
<body>

    <div class="acompanhamento-corpo">
        <div>
            <h4>Selecione o arquivo com o resultado da análise para enviar:</h4>
            <span>Os resultados são enviados e disponibilizados ao usuário que requisitou a análise.</span>
        </div>
        <div class="acompanhamento-corpo-corpo">
            <form enctype="multipart/form-data" action="<?=base_url().'/uploadResult' ?>" class="formulario"  method='POST'>
                
                <div class="formulario-corpo">
                    <h1>Enviar Resultado</h1>
					<div class="formulario-input">
                        <input type="text" name="idAcompanhamento" id="idAcompanhamento" class="idAcompanhamento" value="<?php echo $idAcompanhamento ?>" />
                    </div>
                    <div class="formulario-input">
                        <label for="file">Escolha um arquivo</label>
                        <input type="hidden" value="3000000000" />
                        <input type="file" name="file" id="file" />
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