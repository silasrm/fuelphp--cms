<?php 
	if( count($fotos) > 0 ): 
		$primeira = reset($fotos);
?>
	<div class="row-fluid" id="galeria-fotos">
		<div class="span12 foto-principal" id="foto-principal">
			<img src="<?php echo Uri::base(false) . 'files/' . $primeira->arquivo; ?>" alt="<?php echo $primeira->titulo; ?>" title="<?php echo $primeira->titulo; ?>" />
		</div>		

		<div class="lista-fotos">
			<?php 
				$first = 1;
				$count = 0;
				foreach($fotos as $foto): 
			?>
				<div class="span2">
					<a href="<?php echo Uri::base(false) . 'files/' . $foto->arquivo; ?>" class="<?php echo ( $first )?'active':null; ?>" target="_blank" title="<?php echo $foto->titulo; ?>">
						<img src="<?php echo Uri::base(false) . 'files/thumb/' . $foto->arquivo; ?>" alt="<?php echo $foto->titulo; ?>" />
					</a>
				</div>

				<?php 
					$first = 0;
					$count++;

					if( $count == 6 ): 
						$count = 0;
				?>
					</div><div class="lista-fotos">
				<?php endif; ?>
			<?php 
				endforeach; 
			?>
		</div>
	</div>

<?php endif; ?>