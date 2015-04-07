<?php


class app {

	private static $snippetsDir = './snippets/';
	private static $snippetsList = false;
	private static $currentSnippet = false;

	private static function rglob($pattern, $flags = 0) {
		$files = glob($pattern, $flags);
		foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
			$files = array_merge($files,  self::rglob($dir.'/'.basename($pattern), $flags));
		}
		return $files;
	}

	public static function getSnippetsList() {

		if(self::$snippetsList === false) {
			self::$snippetsList = [];
			$files = self::rglob(self::$snippetsDir . '*/index.html');
			foreach ($files as $file) {
				if (preg_match('#\/([0-9\/]+)\/index.html#', $file, $match)) {
					self::$snippetsList[$match[1]] = str_replace('/', '.', $match[1]);
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

	private function getHtmlFile($snippet) {
		$snippet = str_replace('.', '/', $snippet);

		return self::$snippetsDir.$snippet.'/index.html';
	}

	private function getCssFile($snippet) {
		$snippet = str_replace('.', '/', $snippet);

		return self::$snippetsDir.$snippet.'/style.css';
	}


	private static function getCurrentSnippet() {

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
		$snippet = self::getCurrentSnippet();
		return htmlspecialchars(file_get_contents(self::getHtmlFile($snippet)));
	}

	public static function hasSnippetCss() {
		return file_exists(self::getCssFile(self::getCurrentSnippet()));
	}

	public static function getSnippetCss() {
		$snippet = self::getCurrentSnippet();
		return htmlspecialchars(file_get_contents(self::getCssFile($snippet)));
	}
}
