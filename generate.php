<?php

require 'app.php';

$dirName = isset($argv[1]) ? $argv[1] : false;

if($dirName) {

	$fileName = app::$snippetsDir . $dirName .'/body.src.php';
	$fileDstName = app::$snippetsDir . $dirName .'/body.html';

	if(file_exists($fileName)) {

		ob_start();
		include $fileName;
		$fileData = ob_get_clean();

		file_put_contents($fileDstName, $fileData);

	} else {
		echo "> File $fileName does not exists.\n";
	}

} else {
	echo "> Enter snippet dir\n";

}