<?
global $DB, $MESS, $APPLICATION, $voteCache;

CModule::IncludeModule('iblock');

CModule::AddAutoloadClasses("vkexport", array(
	"CVkexport" => "classes/" . strtolower($DB->type) . "/vkexport.php",
));