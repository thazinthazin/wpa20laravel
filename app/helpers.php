<?php 

function set_active($path, $active='active')
{
    // return Request::is($path) || Request::is($path . '/*') ? $active: '';
	return Request::is($path) || Request::is($path . '/*') ? $active: '';
}

function human_filesize($bytes, $decimals=2){
	$size=['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
	$factor=floor((strlen($bytes)-1)/3);
	return sprintf("%.{$decimals}f", $bytes/pow(1024, $factor)) . @$size[$factor];
}
// Is the mime type an image
function is_image($mimeType)
{
	return starts_with($mimeType,'image/');
}

?>
