<?php $this->extend('template');?>
<link rel='stylesheet' type='text/css' href='<?=base_url() . '/css/login.css' ?>'>

<?php $this->section('content'); ?>
<script type="module" src='<?=base_url() . '/js/textoTraduzido.js' ?>'></script>
<div class="container">
    <div class="traducaoRevisao-dados-texto">
        <p>Dados do texto aqui</p>
    </div>
    <div class="traducaoRevisao-textos">
        <div class="traducaoRevisao-textos-campo">
            <h2>Texto Original</h2>
            <div class="traducaoRevisao-texto">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p> 
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
            </div>
        </div>
        <div class="traducaoRevisao-textos-campo">
            <h2>Texto Traduzido</h2>
            <div class="traducaoRevisao-texto">
                
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p> 
                <p>Lorem ipsum dolor, <span class="trecho-percorrido">sit amet consectetur adipisicing elit.</span> Rem inventore maiores quae id suscipit voluptates. Odio provident aliquid temporibus corporis explicabo libero esse?</p>
                
            </div>
            <div class="caixa-text-edicao">
                    <input type="text" class="caixa-text-edicao-input-input"/>
                    <div class="caixa-text-edicao-botoes">
                        <img src='<?=base_url() . '/imgs/keyboard_double_arrow_left_FILL0_wght400_GRAD0_opsz48.svg' ?>' width="25" class="caixa-text-edicao-botoes-btn"/>
                        <img src='<?=base_url() . '/imgs/keyboard_double_arrow_right_FILL0_wght400_GRAD0_opsz48.svg' ?>' width="25" class="caixa-text-edicao-botoes-btn"/>
                    </div>
                </div>
        </div>
    </div>
    <div class="traducaoRevisao-botoes">
        <button type="button" class="btn-default">Salvar</button>
        <button type="button" class="btn-cancelar">Cancelar</button>
    </div>
    
</div>

<?php $this->endSection(); ?>