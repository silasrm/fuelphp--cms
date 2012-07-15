<h2>Lista de Páginas</h2>
<br>
<?php if(!empty($mensagem)): ?>
	<p class="alert alert-success">
		<?php echo $mensagem; ?>
	</p>
<?php endif; ?>

<p class="clearfix">
	<?php echo Html::anchor('admin/pagina/create', 'Adicionar nova página', array('class' => 'btn btn-success pull-right')); ?>
</p>

<?php if ($paginas): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th width="30">#</th>
			<th>Titulo</th>
			<th width="230">URL</th>
			<th width="50">Menu?</th>
			<th width="50">Home?</th>
			<th width="150"></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($paginas as $pagina): ?>		<tr>

			<td><?php echo $pagina->id; ?></td>
			<td><?php echo $pagina->titulo; ?></td>
			<td><?php echo Uri::base(false) . 'p/' . $pagina->id; ?></td>
			<td><?php echo ( $pagina->no_menu )?'<i class="icon-ok-sign sim tip" title="Sim"></i>':'<i class="icon-remove-sign nao tip" title="Não"></i>'; ?></td>
			<td><?php echo ( $pagina->e_home )?'<i class="icon-ok-sign sim tip" title="Sim"></i>':'<i class="icon-remove-sign nao tip" title="Não"></i>'; ?></td>
			<td>
				<?php echo Html::anchor('admin/pagina/view/'.$pagina->id, 'View'); ?> |
				<?php echo Html::anchor('admin/pagina/edit/'.$pagina->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/pagina/delete/'.$pagina->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>
<p>Sem Páginas.</p>

<?php endif; ?>

<div class="pagination">
	<?php echo Pagination::create_links(); ?>
</div>