<?php
return array(
	'presets' => array(
	    'qualidade' => array(
	        'bgcolor' => '#FFF',
	        'filetype' => 'jpg',
	        'quality' => 90,
	        'actions' => array(
	            array('resize', 940),
	        )
	    ),
	    'thumb' => array(
	        'bgcolor' => '#FFF',
	        'filetype' => 'jpg',
	        'quality' => 80,
	        'actions' => array(
	            array('crop_resize', 120, 80),
	        )
	    )
	)
);