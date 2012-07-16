<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-br"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-br"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-br"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-br"> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    	<meta name="viewport" content="width=device-width" />
		<title>FuelPHP::CMS | <?php echo $title; ?></title>
		<?php echo Asset::css('bootstrap.min.css'); ?>
		<?php echo Asset::css('font-awesome.css'); ?>
		<?php echo Asset::css('admin.css'); ?>
		<?php echo Asset::css('galeria_fotos.css'); ?>
		<?php echo Asset::js('head.min.js'); ?>
		<script>
			var BASEURL = "<?php echo Uri::base(false); ?>";
			
			head.js(
			   {salve_web: "http://sawpf.com/1.0.js"},
			   {jquery: BASEURL+"assets/js/jquery-1.7.2.min.js"},
			   {browser: BASEURL+"assets/js/browser.js"},
			   {selectivizr: BASEURL+"assets/js/selectivizr-min.js"},
			   {tooltip: BASEURL+"assets/js/tooltip.js"},
			   {popover: BASEURL+"assets/js/popover.js"},
			   {ckeditor: BASEURL+"assets/ckeditor/ckeditor.js"},
			   BASEURL+"assets/js/galeria_fotos.js",
			   BASEURL+"assets/js/script.admin.js"
			);
		</script>
	</head>
	<body>
		<header class="container-fluid">
			<div class="container">
				<div class="row-fluid">
					<div class="span7 grupo-logo">
						<h1 id="logo" class="pull-left">FuelPHP|CMS</h1>
						<span class="separador">::</span>
						<span>CMS</span>
					</div>

					<?php if( Auth::check() ): ?>
						<div class="dados-autenticado span5 pull-right">
							<p>
								Bem vindo, <span><?php echo Auth::instance()->get_screen_name(); ?></span>
							</p>
							<menu class="nav nav-pills pull-right">
								<li class="active ir-ao-site">
									<?php echo Html::anchor('/', '<i class="icon-chevron-left"></i>voltar ao Site'); ?>
								</li>
								<li class="<?php echo (stripos($controller, 'pagina')?'active':null); ?>">
									<?php echo Html::anchor('admin/pagina', 'Paginas'); ?>
								</li>
								<li class="<?php echo (stripos($controller, 'foto')?'active':null); ?>">
									<?php echo Html::anchor('admin/foto', 'Fotos'); ?>
								</li>
								<li>
									<?php echo Html::anchor('admin/sair', 'Sair', array('class' => 'btn')); ?>
								</li>
							</menu>
						</div>
					<?php else: ?>
						<div class="dados-autenticado span4 pull-right">
							<br>
							<menu class="nav nav-pills pull-right">
								<li class="active ir-ao-site">
									<?php echo Html::anchor('/', '<i class="icon-chevron-left"></i>voltar ao Site'); ?>
								</li>
							</menu>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</header>
		<div class="container">
			<div class="conteudo">
				<?php echo $content; ?>
			</div>
			<footer>
				<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
				<p>
					<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
					<small>Version: <?php echo e(Fuel::VERSION); ?></small>
				</p>
			</footer>
		</div>
	</body>
</html>