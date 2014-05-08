<?php

session_start();
$client_id = 4340002;
$client_secret = 'QT59WUSQykxxaUhRMl8W';
$group_id = 70848722;
$redirect_uri = 'http://tests.dev/';
$api = 'https://api.vk.com/method/';

function uri($uri) {
	echo "<br/><a href='{$uri}'>{$uri}</a>";
}
?>
<pre>

	<?php

	$uri = array(
		'client_id'		 => $client_id,
		'scope'			 => 'photos,offline',
		'redirect_uri'	 => $redirect_uri,
		'display'		 => 'page',
		'v'				 => '5.21',
		'response_type'	 => 'code',
		'revoke'		 => '1',
	);
	$uri = 'https://oauth.vk.com/authorize?' . http_build_query($uri);
	uri($uri);


	if (!empty($_REQUEST['code'])) {
		$_SESSION['code'] = $_REQUEST['code'];
		$uri = array(
			'client_id'		 => $client_id,
			'client_secret'	 => $client_secret,
			'redirect_uri'	 => $redirect_uri,
			'code'			 => $_SESSION['code'],
		);
		$request = "https://oauth.vk.com/access_token?" . http_build_query($uri);
		//uri($request);
		$result = file_get_contents($request);
		$result = json_decode($result, true);
		$_SESSION['access_token'] = $result['access_token'];
		print_r($result);
	}

	if (!empty($_SESSION['code'])) {
		echo '<br/>CODE=' . $_SESSION['code'];

		$request = "{$api}photos.createAlbum?title=test8473&group_id={$group_id}&description=test74563475673&access_token={$_SESSION['access_token']}";
		echo '<br/>';
		$result = file_get_contents($request);
		$result = json_decode($result);
		print_r($result);
	}
	?>