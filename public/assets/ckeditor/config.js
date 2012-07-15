/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	config.language = 'pt-br';
	// config.uiColor = '#AADC6E';
	config.height = 400;
	config.filebrowserBrowseUrl = BASEURL + 'assets/ckeditor/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl = BASEURL + 'assets/ckeditor/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl = BASEURL + 'assets/ckeditor/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl = BASEURL + 'assets/ckeditor/kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl = BASEURL + 'assets/ckeditor/kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl = BASEURL + 'assets/ckeditor/kcfinder/upload.php?type=flash';
};
