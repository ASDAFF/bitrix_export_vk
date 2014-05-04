<?
if (!CModule::IncludeModule('vkexport')) {
	die('Модуль vkexport не установлен');
}

$aTabs = array(
	array(
		"DIV"   => "tab1",
		"TAB"   => 'Настройки',
		"TITLE" => 'Экспорт товаров',
	),
);
$tabControl = new CAdminTabControl("tabControl", $aTabs);
$tabControl->Begin();
?>
<form method="post"
      action="<? echo $APPLICATION->GetCurPage() ?>?mid=<?= htmlspecialcharsbx($mid) ?>&lang=<?= LANGUAGE_ID ?>">
	<?= bitrix_sessid_post() ?>
	<? $tabControl->BeginNextTab(); ?>
	222
	<? $tabControl->Buttons(); ?>
	<input type="submit" name="save" value="Сохранить" title="Сохранить и вернуться" class="adm-btn-save">
	<? $tabControl->End(); ?>

</form>
