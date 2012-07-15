<h2>Lista de Fotos</h2>

<br>

<a href="#" class="use-popover" title="Como usar?" data-content="Cole o código <code>[fotos]</code> em qualquer página, no local em que deseja que seja inserida a galeria de fotos.">
	<i class="icon-info-sign"></i> 
	Como usar?
</a>

<?php if(!empty($mensagem)): ?>
	<p class="alert alert-success">
		<?php echo $mensagem; ?>
	</p>
<?php endif; ?>

<p class="clearfix">
	<?php echo Html::anchor('admin/foto/create', 'Adicionar novas fotos', array('class' => 'btn btn-success pull-right')); ?>
</p>

<?php if ($fotos): ?>

<table class="table table-striped" id="grid-fotos">
	<thead>
		<tr>
			<th>Titulo</th>
			<th width="150"></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($fotos as $foto): ?>
		<tr>
			<td>
				<a href="#" title="Pré-visualização" data-content='<img src="<?php echo Uri::base(false) . 'files/thumb/' . $foto->arquivo; ?>" alt="<?php echo $foto->titulo; ?>" />' class="use-popover">
					<i class="icon-eye-open"></i>
					<?php echo $foto->titulo; ?>
				</a>
			</td>
			<td>
				<?php echo Html::anchor('admin/foto/view/'.$foto->id, 'View'); ?> |
				<?php echo Html::anchor('admin/foto/edit/'.$foto->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/foto/delete/'.$foto->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
			</td>
		</tr>
<?php endforeach; ?>
</tbody>
</table>

<?php else: ?>
<p>Sem Fotos.</p>

<?php endif; ?>

<div class="pagination">
	<?php echo Pagination::create_links(); ?>
</div>