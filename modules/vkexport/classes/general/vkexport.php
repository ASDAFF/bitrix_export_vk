<?php

class CAllVkexport {

	public static $OPTIONS;

	const module = 'vkexport';

	public static function Init() {
		if (!CModule::IncludeModule('iblock')) {
			throw new Exception('Модуль iblock не установлен');
		}
		$options = array(
			'client_id',
			'client_secret',
			'group_id',
			'access_token',
			'iblock_id',
		);
		foreach ($options as $option_name) {
			self::$OPTIONS[$option_name] = COption::GetOptionString('vkexport', $option_name);
		}
	}

	public static function Syns() {
		self::Init();
	}

	public static function Run() {
		self::Init();
	}

	private static function Cooldown() {
		sleep(0.33);
	}

}
