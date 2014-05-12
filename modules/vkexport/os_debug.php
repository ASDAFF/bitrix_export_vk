<?php
function os_debug($array, $name = "") {
	echo "<!--noindex--><textarea class='os_debug'>{$name}=";
	print_r($array);
	echo "</textarea><!--/noindex-->";
}

function os_log($array, $name = "") {
	file_put_contents(
		$_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "log.txt",
		date("Y-m-d H:i:s", time()) . "\r\n{$name}=" . print_r($array, true) . "\r\n\r\n",
		FILE_APPEND
	);
}