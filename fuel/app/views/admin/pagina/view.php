<h2>Visualizando "<?php echo $pagina->titulo; ?>"</h2>

<hr>

<div class="row">
	<div class="span4 pull-right controles-indicadores">
		<?php echo ( $pagina->e_home )?'<i class="icon-ok-sign sim tip icon-large" title="É home? Sim"></i>':'<i class="icon-remove-sign nao tip icon-large" title="É home? Não"></i>'; ?>
		<?php echo ( $pagina->no_menu )?'<i class="icon-ok-sign sim tip icon-large" title="Está no menu? Sim"></i>':'<i class="icon-remove-sign nao tip icon-large" title="Está no menu? Não"></i>'; ?>
		<?php echo Html::anchor('admin/pagina', '<i class="icon-chevron-left"></i> Back', array('class' => 'btn')); ?>
		<?php echo Html::anchor('admin/pagina/edit/'.$pagina->id, '<i class="icon-pencil"></i> Edit', array('class' => 'btn')); ?>
	</div>
</div>
<p>
	<strong>Título:</strong>
</p>
<h3><?php echo $pagina->titulo; ?></h3>

<br>

<p>
	<strong>Texto:</strong>
</p>
<div class="row">
	<?php echo Model_Foto::buscaTagGaleria($pagina->texto); ?>
</div>