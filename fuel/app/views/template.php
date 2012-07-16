<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-br"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-br"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-br"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-br"> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<title><?php echo $title; ?> Site de Exemplo</title>

    	<!-- 
    		Força o navegador a renderizar com o mecanismo mais atual do IE (também em Intranet) 
    		e no Chrome Frame Remova isso se você utiliza o arquivo .htaccess 
		-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="author" content="Silas Ribas <silasrm@gmail.com>" />
		<meta name="description" content="Loteamento de casas no Balneário Arroio do Silva em Santa Catarina no Brasil." /> 
		<meta name="keywords" content="santa helena balneario arrio silva santa catarina sul brasil brazil casas lotes lote casa compra terreno" /> 
		<meta name="copyright" content="&copy; Copyright Silas Ribas <silasrm@gmail.com>" />
		<meta name="google-site-verification" content="" />
		<meta name="viewport" content="width=device-width">

		<?php echo Asset::css('bootstrap.min.css'); ?>
		<?php echo Asset::css('font-awesome.css'); ?>
		<?php echo Asset::css('fonts.css'); ?>
		<?php echo Asset::css('style.css'); ?>
		<?php echo Asset::css('galeria_fotos.css'); ?>
		<?php echo Asset::js('head.min.js'); ?>
		<script>
			var BASEURL = "<?php echo Uri::base(false); ?>";
			
			head.js(
			   {salve_web: "http://sawpf.com/1.0.js"},
			   {jquery: BASEURL+"assets/js/jquery-1.7.2.min.js"},
			   {browser: BASEURL+"assets/js/browser.js"},
			   {selectivizr: BASEURL+"assets/js/selectivizr-min.js"},
			   BASEURL+"assets/js/galeria_fotos.js",
			   BASEURL+"assets/js/script.js",
			   BASEURL+"assets/js/google-analytics.js"
			);
		</script>

		<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo Uri::base(false); ?>assets/css/font-awesome-ie7.css">
		<script>
			head.js(
			   {html5: "<?php echo Uri::base(false); ?>assets/js/html5-3.4-respond-1.1.0.min.js"}
			);
		</script>
		<![endif]-->
	</head>
	<body>
		<!--[if lt IE 7]>
		<p class="chromeframe">
			Seu navegador é <em>antigo!</em> <a href="http://browsehappy.com/">Migre para um navegador mais atual</a> ou <a href="http://www.google.com/chromeframe/?redirect=true">instale o Google Chrome Frame</a> para utilizar esse site sem problemas.
		</p>
		<![endif]-->

		<div class="geral">
			<header class="container" id="header">
				<div class="row-fluid">
					<h1 class="pull-left">
						<a href="<?php echo Uri::base(false); ?>" title="Ir para Início">
							Site de Exemplo
						</a>
					</h1>

					<menu class="pull-right">
						<?php foreach( $menu as $item ): ?>
							<li class="<?php echo ( $item->id == $paginaAtiva )?'active':null; ?>">
								<?php if($item->e_home): ?>
									<a href="<?php echo Uri::base(false); ?>">
										<?php echo $item->titulo; ?>
									</a>
								<?php else: ?>
									<a href="<?php echo Uri::base(false) . 'p/' . $item->id; ?>">
										<?php echo $item->titulo; ?>
									</a>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</menu>
				</div>
			</header>

			<div class="container">
				<div class="conteudo" id="conteudo">
					<?php echo $content; ?>
				</div>
			</div>

			<footer>
	        	<div class="container">
	        		<p>
						&copy;-left FuelPHP::CMS - <span>Site de Exemplo</span>
					</p>
	        	</div>
	      	</footer>
		</div>
	</body>
</html>