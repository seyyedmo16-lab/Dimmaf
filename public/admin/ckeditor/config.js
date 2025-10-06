/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */


CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.extraPlugins = 'font';
	config.contentsCss = [
		'/Fonts/fonts.css', // any other file to encapsulate custom styles
	  ];
	config.font_names = "Open Sans;IRANSansWeb(FaNum)" + CKEDITOR.config.font_names;
};
