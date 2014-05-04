<?
global $DB, $MESS, $APPLICATION, $voteCache;

CModule::AddAutoloadClasses("vkexport", array(
	"CVkexport" => "classes/" . strtolower($DB->type) . "/vkexport.php",
));