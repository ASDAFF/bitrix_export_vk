<?php
$aTabs = array(
	array(
		'DIV'	 => 'connection',
		'TAB'	 => 'Подключение',
		'TITLE'	 => 'Настройки подключения к ВКонтакте',
	),
	array(
		'DIV'	 => 'iblock',
		'TAB'	 => 'Торговый каталог',
		'TITLE'	 => 'Настройка выгрузки торгового каталога',
	),
);
$tabControl = new CAdminTabControl("tabControl", $aTabs);
$tabControl->Begin();
?>
<form method="post"
      action="<? echo $APPLICATION->GetCurPage() ?>?mid=<?= htmlspecialcharsbx($mid) ?>&lang=<?= LANGUAGE_ID ?>">
		  <?= bitrix_sessid_post() ?>
		  <? $tabControl->BeginNextTab(); ?>
	<tr class="heading">
		<td colspan="2">Создайте приложение</td>
	</tr>
	<tr>
		<td width="40%">Создать приложение:</td>
		<td><a href="https://vk.com/editapp?act=create" target="_blank">https://vk.com/editapp?act=create</a></td>
	</tr>
	<tr>
		<td width="40%" title="client_id">ID приложения:</td>
		<td><input type="text" name="options[client_id]" value="<?= $arResult['OPTIONS']['client_id'] ?>" size="40"/></td>
	</tr>
	<tr>
		<td width="40%" title="client_secret">Защищенный ключ:</td>
		<td><input type="text" name="options[client_secret]" value="<?= $arResult['OPTIONS']['client_secret'] ?>" size="40"/></td>
	</tr>
	<tr>
		<td width="40%" title="group_id">Идентификатор группы:</td>
		<td><input type="text" name="options[group_id]" value="<?= $arResult['OPTIONS']['group_id'] ?>" size="40"/></td>
	</tr>
	<?
	if (!empty($arResult['OPTIONS']['client_id'])) :
		$uri = array(
			'client_id'		 => $arResult['OPTIONS']['client_id'],
			'scope'			 => 'photos,offline',
			'redirect_uri'	 => $arResult['REDIRECT_URL'],
			'display'		 => 'page',
			'v'				 => '5.21',
			'response_type'	 => 'code',
			'revoke'		 => '1',
		);
		$uri = 'https://oauth.vk.com/authorize?' . http_build_query($uri);
		?>
		<tr class="heading">
			<td colspan="2">Авторизуйтесь</td>
		</tr>
		<tr>
			<td width="40%">Получить токен доступа:</td>
			<td><a href="<?= $uri ?>"><?= $uri ?></a></td>
		</tr>
		<tr>
			<td width="40%" title="access_token">Токен доступа:</td>
			<td><input type="text" name="options[access_token]" value="<?= $arResult['OPTIONS']['access_token'] ?>" size="40"/></td>
		</tr>
	<? endif; ?>
	<? $tabControl->BeginNextTab(); ?>
		<tr>
			<td width="40%" title="iblock_id">Инфоблок торгового каталога:</td>
			<td><?echo GetIBlockDropDownList($arResult['OPTIONS']['iblock_id'], 'options[iblock_type_id]', 'options[iblock_id]', false, 'class="adm-detail-iblock-types"', 'class="adm-detail-iblock-list"');?></td>
		</tr>
	<? $tabControl->Buttons(); ?>
	<input type="submit" name="save" value="Сохранить" title="Сохранить и вернуться" class="adm-btn-save">
	<? $tabControl->End(); ?>

</form>