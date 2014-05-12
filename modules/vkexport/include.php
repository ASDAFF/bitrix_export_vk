<?
global $DB, $MESS, $APPLICATION, $voteCache;

CModule::IncludeModule('iblock');

CModule::AddAutoloadClasses("vkexport", array(
	"CVkexport" => "classes/" . strtolower($DB->type) . "/vkexport.php",
	"CAllVkexport" => "classes/general/vkexport.php",
));

include_once dirname(__FILE__).'/os_debug.php';