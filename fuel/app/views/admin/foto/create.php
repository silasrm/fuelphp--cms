<h2>Nova Foto</h2>
<br>

<?php if( Session::get_flash('error') ): ?>
	<p class="alert alert-error">
		<?php echo Session::get_flash('error'); ?>
	</p>
<?php endif; ?>

<?php echo render('admin/foto/_form'); ?>