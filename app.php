<?php


class app {

	private static $snippetsDir = './snippets/';
	private static $snippetsList = false;
	private static $currentSnippet = false;

	public static function urlBase() {
		$url = $_SERVER['REQUEST_SCHEME'];
		$url .= '://';
		$url .= $_SERVER['SERVER_NAME'];
		if($_SERVER['SERVER_PORT'] != 80) {
			$url .= ':'.$_SERVER['SERVER_PORT'];
		}
		$path = '';
		if(!empty($_SERVER['SCRIPT_NAME'])) {
			$path = preg_replace('#index\.php$#', '', $_SERVER['SCRIPT_NAME']);
		}
		$url .= $path;
		$url = rtrim($url, '/').'/';
		return $url;
	}

	private static function rglob($pattern, $flags = 0) {
		$files = glob($pattern, $flags);
		foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR) as $dir) {
			$files = array_merge($files,  self::rglob($dir.'/'.basename($pattern), $flags));
		}
		return $files;
	}

	public static function getSnippetsList() {

		if(self::$snippetsList === false) {
			self::$snippetsList = [];
			$files = self::rglob(self::$snippetsDir . '*/body.html');
			foreach ($files as $file) {
				if (preg_match('#\/([0-9\/]+)\/body.html#', $file, $match)) {
					$snippetName = str_replace('/', '.', $match[1]);
					self::$snippetsList[$snippetName] = $snippetName;
				}
			}
		}

		return self::$snippetsList;
	}

	private static function getDefaultSnippet() {
		foreach(self::getSnippetsList() as $file=>$snippet) {
			return $snippet;
		}
	}

	private static function getHtmlFile($snippet) {
		$snippet = str_replace('.', '/', $snippet);

		return self::$snippetsDir.$snippet.'/body.html';
	}

	private static function getCssFile($snippet) {
		$snippet = str_replace('.', '/', $snippet);

		return self::$snippetsDir.$snippet.'/style.css';
	}


	public static function getCurrentSnippet() {

		if(self::$currentSnippet === false) {
			if (isset($_GET['file']) && file_exists(self::getHtmlFile($_GET['file']))) {
				self::$currentSnippet = $_GET['file'];
			} else {
				self::$currentSnippet = self::getDefaultSnippet();
			}
		}

		return self::$currentSnippet;
	}

	public static function getSnippetHtml() {
		$snippetName = self::getCurrentSnippet();
		$snippetData = trim(file_get_contents(self::getHtmlFile($snippetName)));

		$snippetData = preg_replace("#\n#s", "\n\t\t", $snippetData);
		$snippetData = preg_replace_callback("#(<pre.*>)(.*?)(<\/pre>)#si", function($m){
			return $m[1].preg_replace("#\n\t\t#s", "\n", $m[2]).$m[3];
		}, $snippetData);

		$snippet = "<!DOCTYPE html>\n<html>\n\t<head>\n\t\t<meta charset=\"utf-8\" />\n\t\t<title>Przykład ".$snippetName."</title>";

		$snippet .= "\n\n\t\t<link rel=\"stylesheet\" href=\"style.css\" />";

		$snippet .= "\n\t</head>\n\t<body>\n\t\t".$snippetData."\n\t</body>\n</html>";

		return htmlspecialchars($snippet);
	}

	public static function hasSnippetCss($snippet) {
		return file_exists(self::getCssFile($snippet));
	}

	public static function getSnippetCss() {
		$snippet = self::getCurrentSnippet();

		if(!self::hasSnippetCss($snippet)) {
			return '';
		}

		return htmlspecialchars(file_get_contents(self::getCssFile($snippet)));
	}
}
