/* 
Author: Silas Ribas Martins
*/
$(document).ready(function(){
	$('.use-popover').popover();
	$('.tip').tooltip();

	$(document).on('click', '#form_e_home', function(e){
		if( $(this).is(':checked') )
		{
			$('#form_no_menu').attr('checked', 'checked');
		}
		else
		{
			$('#form_no_menu').removeAttr('checked');
		}
	});
	
	if( $('#form_texto').length > 0 )
	{
		var editor = CKEDITOR.replace( 'texto' );
		CKFinder.setupCKEditor( 
			editor, 
			{ 
				basePath : BASEURL + 'ckeditor/kcfinder/', 
				rememberLastFolder : false,
				uploadURL: BASEURL + 'assets/',
				uploadDir: BASEURL + 'assets/'
			} 
		);
	}

	galeriaFotos();
});