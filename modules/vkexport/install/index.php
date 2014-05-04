<?

Class vkexport extends CModule {
	var $MODULE_ID = "vkexport";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $MODULE_GROUP_RIGHTS = "Y";

	public function __construct() {
		include(sprintf('%s/version.php', dirname(__FILE__)));
		$this->MODULE_VERSION = $arModuleVersion['VERSION'];
		$this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];

		$this->MODULE_NAME = 'Экспорт товаров во ВКонтакте';
		$this->MODULE_DESCRIPTION = 'Модуль для автоматического экспорта позиций из Интернет-Магазина в группу
		ВКонтакте';
	}

	function DoInstall() {
		RegisterModule($this->MODULE_ID);
		CModule::IncludeModule($this->MODULE_ID);
		// ...
	}

	function DoUninstall() {
		CModule::IncludeModule($this->MODULE_ID);
		// ...
		UnRegisterModule($this->MODULE_ID);
	}
}

?>