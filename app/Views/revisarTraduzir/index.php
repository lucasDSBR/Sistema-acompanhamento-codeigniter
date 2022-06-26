<?php $this->extend('template');?>
<link rel='stylesheet' type='text/css' href='<?=base_url() . '/css/login.css' ?>'>

<?php $this->section('content'); ?>
<div class="container">
    <input type="file" onchange="carregarArquivoUsuario(this.files[0])">
    <div class="traducaoRevisao-dados-texto">
        <p>Dados do texto aqui</p>
    </div>
    <h3 class="alerta" id="alerta"></h3>
    <div class="traducaoRevisao-textos">
        <div class="traducaoRevisao-textos-campo">
            <h2>Texto Original</h2>
            <div class="traducaoRevisao-texto" id="textoOriginal">
                <p id="output-user"></p>
            </div>
        </div>
        
        <div class="traducaoRevisao-textos-campo">
            <h2>Texto Traduzido</h2>
            <div class="traducaoRevisao-texto" id="textoTraduzido">
                <p id="output-system"></p>
            </div>
            <!-- <div class="caixa-text-edicao">
                <input type="text" class="caixa-text-edicao-input-input"/>
                <div class="caixa-text-edicao-botoes">
                    <img src='<?=base_url() . '/imgs/keyboard_double_arrow_left_FILL0_wght400_GRAD0_opsz48.svg' ?>' width="25" class="caixa-text-edicao-botoes-btn"/>
                    <img src='<?=base_url() . '/imgs/keyboard_double_arrow_right_FILL0_wght400_GRAD0_opsz48.svg' ?>' width="25" class="caixa-text-edicao-botoes-btn"/>
                </div>
            </div> -->
        </div>
    </div>
    <div class="traducaoRevisao-botoes">
        <button type="button" class="btn-default">Salvar</button>
        <button type="button" class="btn-cancelar">Cancelar</button>
    </div>
    
</div>
<script>
    var dataText = "";
    if(dataText == ""){
        document.getElementById("textoTraduzido").classList.add("inativo");
        document.getElementById("textoOriginal").classList.add("inativo");
        document.getElementById("alerta").textContent = "Nenhum arquivo submetido ainda.";
    } 
    async function carregarArquivoUsuario(file){
        dataText = await file.text();
        if(dataText !== ""){
            document.getElementById("textoOriginal").classList.remove("inativo");
            document.getElementById('output-user').textContent = dataText;
            enviarArquivosApiTraducao(file);
        }
    }

    async function enviarArquivosApiTraducao(file){
        document.getElementById("alerta").textContent = "Enviando arquivo para o servidor... Aguarde...";
        var formD = new FormData();
        formD.append('file', file);
        const response = await fetch('http://127.0.0.1:8000/translate/upload', { method: 'POST', body: formD });
        const data = await response.json();
        if(data){
            textoTraduzido = ""
            data.forEach(element => {
                textoTraduzido += element+" "
            });
            document.getElementById("textoTraduzido").classList.remove("inativo");
            document.getElementById("alerta").classList.add("inativo");
            document.getElementById("output-system").textContent = textoTraduzido
        }
    }
</script>
<?php $this->endSection(); ?>