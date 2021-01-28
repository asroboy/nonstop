/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */


CKEDITOR.editorConfig = function(config) {
   config.filebrowserBrowseUrl = 'http://'+window.location.hostname+'/assets/backend/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = 'http://'+window.location.hostname+'/assets/backend/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = 'http://'+window.location.hostname+'/assets/backend/kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = 'http://'+window.location.hostname+'/assets/backend/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = 'http://'+window.location.hostname+'/assets/backend/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = 'http://'+window.location.hostname+'/assets/backend/kcfinder/upload.php?type=flash';
};