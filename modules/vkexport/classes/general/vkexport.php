<?php

class CAllVkexport {

	public static $OPTIONS;
	public static $DB;

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
		global $DB;
		self::$DB = $DB;
	}
	
	private function FetchAll($DBResult, $key = 'ID') {
		$arResult = array();
		while ($element = $DBResult->GetNext(false, false)) {
			$arResult[$element[$key]] = $element;
		}
		return $arResult;
	}

	public static function Syns() {
		self::Init();
		
		$my_sections = self::FetchAll(self::$DB->Query('SELECT * FROM b_vkexport_section'));
		$db_sections = self::FetchAll(CIBlockSection::GetList(array(), array(
			'IBLOCK_ID' => self::$OPTIONS['iblock_id'],
			'ACTIVE' => 'Y',
		), false, array(	'ID')));
		foreach ($db_sections as $id => $section) {
			if (empty($my_sections[$id])) {
				self::$DB->Query("INSERT INTO b_vkexport_section (ID) VALUES ('{$id}')");
			}
		}
		
		$my_photos = self::FetchAll(self::$DB->Query('SELECT * FROM b_vkexport_photo'));
		
		$my_elements = self::FetchAll(self::$DB->Query('SELECT * FROM b_vkexport_element'));
		$db_elements = self::FetchAll(CIBlockElement::GetList(array(), array(
			'IBLOCK_ID' => self::$OPTIONS['iblock_id'],
			'ACTIVE' => 'Y',
		), false, false, array('ID', 'IBLOCK_SECTION_ID', 'PROPERTY_MORE_PHOTO', '*')));
		foreach ($db_elements as $id => $element) {
			if (empty($my_elements[$id])) {
				self::$DB->Query("INSERT INTO b_vkexport_element (ID, SECTION) VALUES ('{$element['ID']}', '{$element['IBLOCK_SECTION_ID']}')");
			} else {
				self::$DB->Query("UPDATE b_vkexport_element SET SECTION='{$element['IBLOCK_SECTION_ID']}' WHERE ID='{$element['ID']}'");
			}
			
			$db_photos = array();
			if (!empty($element['PROPERTY_MORE_PHOTO_VALUE'])) {
				$db_photos = $element['PROPERTY_MORE_PHOTO_VALUE'];
			}
			if (!empty($element['DETAIL_PICTURE'])) {
				$db_photos[] = $element['DETAIL_PICTURE'];
			}
			if (!empty($db_photos)) {
				foreach ($db_photos as $photo_id) {
					if (empty($my_photos[$photo_id])) {
						self::$DB->Query("INSERT INTO b_vkexport_photo (ID, ELEMENT) VALUES ('{$photo_id}', '{$element['ID']}')");
					} else {
						self::$DB->Query("UPDATE b_vkexport_photo SET ELEMENT='{$element['ID']}' WHERE ID='{$photo_id}'");
					}
				}
			}
		}
	}

	public static function Run() {
		self::Init();
	}

	private static function Cooldown() {
		sleep(0.33);
	}

}
