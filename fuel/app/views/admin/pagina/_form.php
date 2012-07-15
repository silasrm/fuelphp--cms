<?php echo Form::open(array('class' => 'form-horizontal')); ?>

	<fieldset>
		<div class="control-group">
			<div class="control-label">
				<?php echo Form::label('Titulo', 'titulo'); ?>
			</div>

			<div class="controls">
				<?php echo Form::input('titulo', Input::post('titulo', isset($pagina) ? $pagina->titulo : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<?php echo Form::label('Texto', 'texto'); ?>
			</div>

			<div class="controls">
				<?php echo Form::textarea('texto', Input::post('texto', isset($pagina) ? $pagina->texto : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix control-group">
			<div class="controls">
				<?php echo Form::hidden('e_home', 0, array('id' => 'e_home_escondido')); ?>

				<?php echo Form::label( Form::checkbox('e_home', 1, ( isset($pagina) && $pagina->e_home ) ? true:false, array('class' => 'checkbox')) . 'Marque para essa página ser a Home (página inicial)', 'e_home', array('class' => 'checkbox')); ?>
			</div>
		</div>
		<div class="clearfix control-group">
			<div class="controls">
				<?php echo Form::hidden('no_menu', 0, array('id' => 'no_menu_escondido')); ?>

				<?php echo Form::label( Form::checkbox('no_menu', 1, ( isset($pagina) && $pagina->no_menu ) ? true:false, array('class' => 'checkbox')) . 'Marque para essa página aparecer no menu', 'no_menu', array('class' => 'checkbox')); ?>
			</div>
		</div>
		<div class="form-actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary btn-large')); ?>

			<?php echo isset($pagina)?Html::anchor('admin/pagina/view/'.$pagina->id, 'View', array('class' => 'btn btn-large btn-info')):null; ?>

			<?php echo Html::anchor('admin/pagina', 'Back', array('class' => 'btn btn-large')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>