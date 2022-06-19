<?php $this->extend('template');?>

<?php $this->section('content'); ?>
<div class="acompanhamento-corpo">
    <div class="acompanhamento-header-submeter">
        <div>
            <h4>Tabela de Usuários aguardando aprovação:</h4>
            <span>Ao aprovar um usuário, você dá a permissão a ele para submeter projetos para tradução e/ou revisão.</span>
        </div>
    </div>
    <div class="acompanhamento-corpo-corpo">

        <table>
                <tr>
                    <th>Usuario</th>
                    <th>Matricula</th>
                    <th>Comprovante</th>
                    <th>Opções</th>
                </tr>

                <?php

                    foreach ($usuariosInativos as $item) {
                        echo '<tr>
                        <td>'.$item['nome'].'</td>
                        <td>'.$item['matricula'].'</td>
                        <td>'.($item['comprovante'] != ""? '<a href="'.$item['comprovante'].'" download><img src="/imgs/download.svg"/></a>' : "Não informado").'</td>
                        <td><a href="/detalhesUserId/'.$item['matricula'].'"><img src="/imgs/visibility.svg"/></a> | <a href="aprovarUser/'.$item['matricula'].'"><img src="/imgs/aprove.svg"/></a> | <a href="reprovarUser/'.$item['matricula'].'"><img src="/imgs/cancel.svg"/></a></td>
                        </tr>';
                    }
                ?>
        </table>    
    </div>
</div>

<?php $this->endSection(); ?>