/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

var c_domain = window.location.origin;

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'others' },
		{ name: 'youtube' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	//my config
	config.language = 'vi';
	// config.extraPlugins = 'autosave';
	config.extraPlugins = 'autogrow';
	config.extraPlugins = 'youtube';
	config.autoGrow_minHeight = 300;
	config.autoGrow_maxHeight = 600;
	// config.height = 300;

	// config.filebrowserBrowseUrl = 'http://fundstart.clg:8080/js/plugin/ckeditor/ckfinder/ckfinder.html';
    // config.filebrowserImageBrowseUrl = 'http://fundstart.clg:8080/js/plugin/ckeditor/ckfinder/ckfinder.html?type=Images';
    // config.filebrowserFlashBrowseUrl = 'http://fundstart.clg:8080/js/plugin/ckeditor/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = c_domain + '/js/plugin/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = c_domain + '/js/plugin/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = c_domain + '/js/plugin/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
