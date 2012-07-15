<h2>Visualizando "<?php echo $foto->titulo; ?>"</h2>

<hr>

<p>
	<strong>Titulo:</strong>
	<?php echo $foto->titulo; ?></p>
<p>
	<strong>Arquivo:</strong>
	<img src="<?php echo Uri::base(false) . 'files/' . $foto->arquivo; ?>" alt="<?php echo $foto->titulo; ?>" />
</p>

<hr>

<?php echo Html::anchor('admin/foto/edit/'.$foto->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/foto', 'Back'); ?>

<hr>