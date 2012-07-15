/* 
Author: Silas Ribas Martins
*/
$(document).ready(function(){
	$('#galeria-fotos').on('click', '.lista-fotos a', function(e){
		var foto = $('#foto-principal');
		var img = foto.find('img');
		var $this = $(this);

		img.fadeOut(500)
			.attr('src', $this.attr('href'))
			.attr('title', $this.attr('title'))
			.fadeIn(1000);

		$('#galeria-fotos .lista-fotos a.active').removeClass('active');
		$this.addClass('active');

		$('html, body').animate({
		    scrollTop: foto.offset().top
		}, 1000);

		e.preventDefault();
	});
});