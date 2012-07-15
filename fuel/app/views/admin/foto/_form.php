<?php echo Form::open(array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')); ?>

	<fieldset>
		<div class="control-group">
			<div class="control-label">
				<?php echo Form::label('Titulo', 'titulo'); ?>
			</div>

			<div class="controls">
				<?php echo Form::input('titulo', Input::post('titulo', isset($foto) ? $foto->titulo : ''), array('class' => 'span6')); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<?php echo Form::label('Arquivo', 'arquivo'); ?>
			</div>

			<div class="controls">
				<?php echo Form::file('arquivo', array('class' => 'span6')); ?>
			</div>
		</div>
		<div class="form-actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary btn-large')); ?>

			<?php echo isset($foto)?Html::anchor('admin/foto/view/'.$foto->id, 'View', array('class' => 'btn btn-large btn-info')):null; ?>

			<?php echo Html::anchor('admin/foto', 'Back', array('class' => 'btn btn-large')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>