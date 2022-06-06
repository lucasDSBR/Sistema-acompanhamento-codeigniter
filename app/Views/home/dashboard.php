
<?php $this->extend('template');?>

<?php $this->section('content'); ?>

    <div class="acompanhamento-corpo">
        <div class="acompanhamento-header-submeter">
			<h4><?= $titulo; ?></h4>
            <div>
                <a href="<?=base_url(). '/submissoes/new'?>"  class="header-sair">Enviar arquivo para análise </a>
            </div> 
        </div>
        <div class="acompanhamento-corpo-corpo">
            <table>
                    <tr>
                        <th>Usuario envio</th>
						<th>Número da solicitação</th>
                        <th>Situação</th>
                        <th>Arquivo Enviado</th>
                        <th>Resultado</th>
                    </tr>
                    <?php
						
                        foreach ($submissoes as $item) {
                            echo '<tr>
                            <td>'.($item['id_usuario_envio'] == $_SESSION['UsuarioMatricula'] ? "Você" : $item['id_usuario_envio']).'</td>
							<td>'.$item['id'].'</td>
                            <td>'.($item['status'] == 0 ? "Submetido" : ($item['status'] == 1 ?  "Em análise pelos modelos de Inteligência Artificial": ($item['status'] == 2 ? "Em análise pelo(s) colaborador(es)" : ($item['status'] == 3 ? "Resultado Diponível" : " --- ")))).'</td>
                            <td><a href="/arquivoParaAnalise/'.$item['arquivo'].'.pdf"  download><img src="/imgs/download.svg"/></a>'.($item['id_usuario_envio'] == $_SESSION['UsuarioMatricula'] ? '<a href="/cancelUploadArquive/'.$item['id'].'"><img src="/imgs/cancel.svg"/></a>' : "").'</td>
                            <td>'.($item['resultado'] == "" ? ($_SESSION['UsuarioNivel'] == 1 ? '<a href="uploadResult/'.$item['id'].'"><img src="/imgs/upload.svg"/></a>' : "Sem resultado") : ($_SESSION['UsuarioNivel'] == 1 ? '<a href="./resultados/'.$item['resultado'].'.pdf" download="./resultados/'.$item['resultado'].'"><img src="/imgs/download.svg"/></a> <a href="/cancelUploadResult/'.$item['id'].'"><img src="/imgs/cancel.svg"/></a>' : '<a href="./resultados/'.$item['resultado'].'.pdf" download="./resultados/'.$item['resultado'].'"><img src="/imgs/download.svg"/></a>')).'</td>
                            </tr>';
                        }
                    ?>
            </table>
			<div class="manual">
				<span class="item-manual">
					<div>Enviar</div>
					<img src='<?=base_url() . '/imgs/upload.svg' ?>'/>
				</span>
				<span class="item-manual">
					<div>/ Baixar</div>
					<img src='<?=base_url() . '/imgs/download.svg' ?>'/>
				</span>
                <span class="item-manual">
					<div>/ Detalhes</div>
					<img src='<?=base_url() . '/imgs/visibility.svg' ?>'/>
				</span>
                <span class="item-manual">
					<div>/ Aprovar</div>
					<img src='<?=base_url() . '/imgs/aprove.svg' ?>'/>
				</span>
				<span class="item-manual">
					<div>/ Cancelar ou Cancelar envio</div>
					<img src='<?=base_url() . '/imgs/cancel.svg' ?>'/>
				</span>
                
			</div>
        </div>
    </div>

<?php $this->endSection(); ?>