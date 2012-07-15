<?php if( Session::get_flash('error') ): ?>
	<p class="alert alert-error">
		<?php echo Session::get_flash('error'); ?>
	</p>
<?php endif; ?>

<?php echo $form; ?>