<?

if (!CModule::IncludeModule('iblock')) {
	die('Модуль iblock не установлен');
}
if (!CModule::IncludeModule('vkexport')) {
	die('Модуль vkexport не установлен');
}

$arResult['REDIRECT_URL'] = 'http://'.$_SERVER['SERVER_NAME'].'/bitrix/admin/settings.php?mid=vkexport&lang=ru';

$options = array(
	'client_id',
	'client_secret',
	'group_id',
	'access_token',
);

foreach ($options as $option_name) {
	$arResult['OPTIONS'][$option_name] = COption::GetOptionString('vkexport', $option_name);
}

if (!empty($_REQUEST['code'])) {
	$uri = array(
		'client_id'		 => $arResult['OPTIONS']['client_id'],
		'client_secret'	 => $arResult['OPTIONS']['client_secret'],
		'redirect_uri'	 => $arResult['REDIRECT_URL'],
		'code'			 => $_REQUEST['code'],
	);
	$request = "https://oauth.vk.com/access_token?" . http_build_query($uri);
	$result = file_get_contents($request);
	$result = json_decode($result, true);
	$_POST['options']['access_token'] = $result['access_token'];
}

if (!empty($_POST['options'])) {
	foreach ($_POST['options'] as $option_name => $option_value) {
		COption::SetOptionString('vkexport', $option_name, $option_value);
		$arResult['OPTIONS'][$option_name] = $option_value;
	}
}



require 'options_form.php';
