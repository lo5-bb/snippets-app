<?php

$file = $_GET['file'];
$type = $_GET['type'];

$size = (isset($_GET['size']) && preg_match('#^[0-9]+x[0-9]+$#', $_GET['size'])) ? $_GET['size'] : '0x0';

list($width, $height) = explode('x', $size);

switch($type) {
	case 'avatar':
		$dirName = './images/avatars/';
		$minSizes = [24, 24];
		$maxSizes = [128, 128];
		break;
	case 'photo':
		$dirName = './images/photos/';
		$minSizes = [40, 40];
		$maxSizes = [800, 800];
		break;
	default:
		die;
}

$fileName = $dirName.$file;

if($width == 0 || $height == 0) {
	list($width, $height) = getimagesize($fileName);
}

$width = min(max($width, $minSizes[0]), $maxSizes[0]);
$height = min(max($width, $minSizes[1]), $maxSizes[1]);

$cacheFile = 'cache/'.$width.'x'.$height.'-'.$type.'-'.$file;
$filename = $dirName.$file;

if(! file_exists($filename)) {
	die;
}

if(file_exists($cacheFile)) {
	header('Content-type: image/jpeg');
	echo file_get_contents($cacheFile);
	die;
}





$sourceImg = imagecreatefromjpeg($filename);
list($sourceWidth, $sourceHeight) = getimagesize($filename);

$img = imagecreatetruecolor($width, $height);


imagecopyresampled($img, $sourceImg, 0, 0, 0, 0, $width, $height, $sourceWidth, $sourceHeight);


header('Content-type: image/jpeg');
//imagejpeg($img, $cacheFile);
imagejpeg($img, null, 90);