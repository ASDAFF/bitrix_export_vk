-- ----------------------------
-- Table structure for `b_vkexport_element`
-- ----------------------------
DROP TABLE IF EXISTS `b_vkexport_element`;
CREATE TABLE `b_vkexport_element` (
  `ID` int(10) unsigned NOT NULL,
  `SECTION` int(11) unsigned DEFAULT NULL,
  `EXTERNAL` int(11) unsigned DEFAULT NULL,
  `SYNCHRONIZED` bit(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of b_vkexport_element
-- ----------------------------

-- ----------------------------
-- Table structure for `b_vkexport_photo`
-- ----------------------------
DROP TABLE IF EXISTS `b_vkexport_photo`;
CREATE TABLE `b_vkexport_photo` (
  `ID` int(10) unsigned NOT NULL,
  `ELEMENT` int(10) unsigned NOT NULL,
  `EXTERNAL` int(11) unsigned DEFAULT NULL,
  `SYNCHRONIZED` bit(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of b_vkexport_photo
-- ----------------------------

-- ----------------------------
-- Table structure for `b_vkexport_section`
-- ----------------------------
DROP TABLE IF EXISTS `b_vkexport_section`;
CREATE TABLE `b_vkexport_section` (
  `ID` int(10) unsigned NOT NULL,
  `EXTERNAL` int(10) unsigned DEFAULT NULL,
  `SYNCHRONIZED` bit(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of b_vkexport_section
-- ----------------------------
