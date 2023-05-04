<?php

require_once ('../../../../../../../#directconfig/config.php');
require_once ('../../../../../../define.php');

// The URL that points to the upload folder on your site. 
// Can be a relative or full URL (include the protocol and domain)
// $domain = 'https://'.$_SERVER['SERVER_NAME'].'';
// $imageURL = $domain.'/uploads/images/';
$imageURL = $link.'/uploads/'.$db_pos.'/images/';

// Full upload system path. Make sure you have write permissions to this folder
// $uploadPath = '../../../../../../../uploads/images/';
$uploadPath = '../../../../../../../uploads/'.$db_pos.'/images/';

//We create the directory if it does not exist - you can remove this if you consider it a security risk
if(!is_dir($uploadPath)) {
	mkdir($uploadPath,0755,true);
}

//Create thumb directory if doesn't exist
if(!is_dir($uploadPath . 'thumbnail')) {
	mkdir($uploadPath . 'thumbnail',0755,true);
}

//Allowed extenstions
$allowedExtensions = array('jpg','gif','jpeg','bmp','tif','png'); 
//Maximum upload limit
$sizeLimit = 2 * 1024 * 1024;

function isAuth() {
	//Perform your own authorization to make sure user is allowed to upload
	return true;
}