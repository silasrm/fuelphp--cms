function galeriaFotos()
{
	$('#galeria-fotos').on('click', '.lista-fotos a', function(e){
		var foto = $('#foto-principal');
		var img = foto.find('img');
		var $this = $(this);

		foto.addClass('load-imagem');
		img.hide();

		$.get($this.attr('href'),{}, function(resultados){
			setTimeout(function(){
				img.fadeOut(500)
					.attr('src', $this.attr('href'))
					.attr('title', $this.attr('title'))
					.fadeIn(1000);

				$('#galeria-fotos .lista-fotos a.active').removeClass('active');
				$this.addClass('active');

				foto.removeClass('load-imagem');
				$('html, body').animate({
				    scrollTop: foto.offset().top
				}, 1000);
			}, 500);
		});

		e.preventDefault();
	});
}