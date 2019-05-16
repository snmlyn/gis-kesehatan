/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 100109
Source Host           : localhost:3306
Source Database       : mygis

Target Server Type    : MYSQL
Target Server Version : 100109
File Encoding         : 65001

Date: 2017-09-03 13:11:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('2', 'eyyi', '21232f297a57a5a743894a0e4a801fc3', 'LiyanEyyi');
INSERT INTO `admin` VALUES ('3', 'meli', '81dc9bdb52d04dc20036dbd8313ed055', 'Nur Sadilah');
INSERT INTO `admin` VALUES ('4', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', 'Halo test test', 'dita', '2017-09-03 09:51:44');
INSERT INTO `comment` VALUES ('2', 'Bagus programnya beguna sekaliiiii', 'Lina', '2017-09-03 09:54:29');
INSERT INTO `comment` VALUES ('3', 'test', 'user', '2017-09-03 12:00:37');
INSERT INTO `comment` VALUES ('4', 'test aja', 'iya', '2017-09-03 12:09:45');
INSERT INTO `comment` VALUES ('5', 'test aja', 'iya', '2017-09-03 12:09:56');
INSERT INTO `comment` VALUES ('6', 'test buu tamu', 'rusidi', '2017-09-03 12:10:16');
INSERT INTO `comment` VALUES ('7', 'tets aja lah', 'bambang', '2017-09-03 12:12:21');
INSERT INTO `comment` VALUES ('8', 'tes tes ', 'hikal', '2017-09-03 12:12:53');

-- ----------------------------
-- Table structure for distribusi_pelayanan
-- ----------------------------
DROP TABLE IF EXISTS `distribusi_pelayanan`;
CREATE TABLE `distribusi_pelayanan` (
  `distribusi_pelayanan_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pelayanan_id` int(11) NOT NULL,
  `kelurahan_id` int(11) NOT NULL,
  `koordinat_x` varchar(20) DEFAULT NULL,
  `koordinat_y` varchar(20) DEFAULT NULL,
  `sarana_pelayanan` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`distribusi_pelayanan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of distribusi_pelayanan
-- ----------------------------
INSERT INTO `distribusi_pelayanan` VALUES ('1', '2', '7', '-6.861159756539099', '115.28652650701906', 'Puskemas ARJASA', 'Selatan Alun-Alun Arjasa', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('2', '1', '7', '-6.873169737328773', '115.29079658377077', '(Mekar) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Kettep,\nTimur Sawah,\nNyangkreng', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('11', '1', '7', '-6.868568166328778', '115.28684837210085', '(Kuncup) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Mangong-mangong\nKamp. Wakaf\nTimur Alun-alun', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('12', '1', '7', '-6.8655004275953715', '115.29440147268679', '(Teratai) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Aeng Parao', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('13', '1', '7', '-6.8649891358835', '115.28358680593874', '(Kartika) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Arjasa Laok', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('14', '1', '15', '-6.8567018728090385', '115.28596860754396', '(Melati) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Pacinan\nPoran Lanjeng', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('15', '7', '7', '-6.859482063257357', '115.2850566564789', 'Tempat Praktek & Apotek Harapan Baru', 'Harapan Baru', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('16', '7', '7', '-6.860004012911687', '115.2870200334778', 'Toko Obat Arjasa Timur Alun-alun', 'Toko Obat Arjasa Timur Alun-alun\nFirman Hidayat', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('17', '7', '7', '-6.859631191788386', '115.28328639852907', 'Kangean Farma - Apotek Duko', 'Kangean Farma - Apotek Duko (Moh. Hosni)\n', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('18', '7', '7', '-6.859535323452373', '115.28382284033205', 'Klinik  Umum Laok Jang-jang', 'Klinik	-	Praktek Umum	Laok Jang-jang', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('19', '7', '12', '', '', 'Melati	- Apotek Laok Jang-jang', 'Melati	-	Apotek	Laok Jang-jang', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('20', '7', '7', '-6.8595246714138405', '115.28426272261049', 'Tempat Praktek', 'Wahyu Abadi	-	Tempat Praktek	Arjasa\n(dr. Winda)', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('21', '1', '15', '-6.85801207952451', '115.2864084898224', '(Kerapan) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Lambeng, Daya, Nyamplong, Ondung', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('22', '7', '15', '-6.859002721234212', '115.28654796469118', 'Toko Obat Kalikatak', 'Toko Obat	-	Obat obat	Kalikatak \n(Irham Fariansa)', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('23', '1', '8', '-6.83120005961635', '115.26837331640627', '(Pandhi) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Duko Laok', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('24', '4', '15', '-6.855167967686273', '115.28493863928225', 'Ponkesdes Nyaplong Ondung', 'Kalikatak Nyaplong Ondung', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('25', '4', '11', '', '', 'Ponkesdes', 'Kalisangka', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('27', '4', '13', '-6.852931013866384', '115.26288015234377', 'Ponkesdes Bilis-bilis', 'Bilis-bilis', '');
INSERT INTO `distribusi_pelayanan` VALUES ('28', '4', '10', '-6.8962621332780465', '115.23157340872194', 'Ponkesdes Angkatan', 'Angkatan', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('29', '4', '14', '', '', 'Ponkesdes Sumber Nangka', 'Sumber Nangka', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('30', '4', '5', '', '', 'Ponkesdes Paseraman', 'Paseraman', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('31', '4', '4', '', '', 'Ponkesdes Sawa Sumur', 'Sawa Sumur', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('32', '4', '18', '', '', 'Ponkesdes Pandeman', 'Pandeman', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('33', '4', '19', '', '', 'Ponkesdes Pabian', 'Pabian', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('34', '4', '1', '-6.865670858043917', '115.27026159155275', 'Ponkesdes Buddhi', 'Buddhi', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('35', '4', '16', '', '', 'Ponkesdes Angon-angon', 'Angon-angon', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('36', '4', '6', '-6.859151849915336', '115.28738481390383', 'Ponkesdes Kalinganyar', 'Kalinganyar', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('37', '4', '2', '-6.893088060625966', '115.31422836172487', 'Ponkesdes Gelaman', 'Gelaman', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('38', '4', '9', '-6.850596386076983', '115.29631646304324', 'Ponkesdes Kolo-kolo', 'Kolo-kolo', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('39', '4', '8', '-6.831114838242232', '115.28236371862795', 'Ponkesdes Duko ', 'Duko', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('40', '1', '14', '', '', '(Bungur) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Kamp. Barat', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('41', '1', '14', '', '', '(Anggrek) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Kamp. Barat', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('42', '2', '15', '-6.855402314621784', '115.2865694223633', 'Polindes KALIKATAK', 'KALIKATAK', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('43', '2', '8', '-6.870400278636331', '115.34630758154299', 'Polindes DUKO I', 'DUKO I', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('44', '2', '8', '-6.858755930704859', '115.28270157008365', 'Polindes DUKO II', 'DUKO II', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('45', '2', '8', '-6.865216358746004', '115.28597922949984', 'Polindes DUKO III', 'DUKO III', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('46', '2', '14', '', '', 'Polindes SUMBER NANGKA', 'SUMBER NANGKA', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('47', '2', '13', '-6.852504926234375', '115.26129228460695', 'Polindes BILIS – BILIS I', 'BILIS – BILIS I', '');
INSERT INTO `distribusi_pelayanan` VALUES ('48', '2', '12', '', '', 'Polindes BILIS – BILIS II', 'BILIS – BILIS II', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('49', '2', '9', '-6.8529185683492235', '115.29142411380008', 'Polindes PUSTU KOLO - KOLO', 'PUSTU KOLO - KOLO', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('50', '2', '10', '-6.894728355859335', '115.235006636261', 'Polindes ANGKATAN I', 'ANGKATAN I', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('51', '2', '10', '-6.902823236164819', '115.22874099600222', 'Polindes ANGKATAN II', 'ANGKATAN II', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('52', '2', '12', '', '', 'Polindes PUSTU LAOK JANG – JANG', 'PUSTU LAOK JANG – JANG ', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('53', '2', '11', '', '', 'Polindes KALISANGKA I', 'KALISANGKA I', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('54', '2', '11', '', '', 'Polindes KALISANGKA II', 'KALISANGKA II', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('55', '2', '16', '-6.858779028125009', '115.28738481390383', 'Polindes ANGON – ANGON I', 'ANGON – ANGON I', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('56', '2', '16', '-6.858182512653553', '115.28711659300234', 'Polindes ANGON – ANGON II', 'ANGON – ANGON II', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('57', '2', '6', '-6.860344877683293', '115.28759939062502', 'Polindes KALINGANYAR', 'KALINGANYAR', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('58', '2', '17', '', '', 'Polindes SAMBAKATI I', 'SAMBAKATI I', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('59', '2', '17', '', '', 'Polindes SAMBAKATI II', 'SAMBAKATI II', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('60', '2', '5', '', '', 'Polindes PASERAMAN I', 'PASERAMAN I', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('61', '2', '5', '', '', 'Polindes PASERAMAN II', 'PASERAMAN II', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('62', '2', '18', '-6.855174163465734', '115.31418265729144', 'Polindes PANDEMAN', 'PANDEMAN', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('63', '2', '4', '', '', 'Polindes SAWAH SUMUR I', 'SAWAH SUMUR I', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('64', '2', '4', '', '', 'Polindes SAWAH SUMUR II', 'SAWAH SUMUR II', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('65', '2', '19', '', '', 'Polindes PABIAN I', 'PABIAN I', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('66', '2', '19', '', '', 'Polindes PABIAN II', 'PABIAN II', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('67', '2', '2', '-6.890105691112828', '115.32130939352419', 'Polindes GELAMAN', 'GELAMAN', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('68', '2', '1', '-6.863923943052893', '115.26399595129396', 'Polindes BUDDI', 'BUDDI', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('69', '2', '3', '', '', 'Polindes PUSTU PAJENANGGER', 'PUSTU PAJENANGGER', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('70', '2', '3', '', '', 'Polindes POLINDES PAJENANGGER', 'POLINDES PAJENANGGER', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('71', '3', '7', '-6.858001427451922', '115.29405814993288', 'Rawat Inap, Apotek, Ruang Periksa', 'Yayasan Pondok Pesantren Salafiyah Syafi’iyah Al Hidayah', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('72', '3', '7', '-6.85731969431079', '115.2921698747864', 'Rawat Inap, Apotek, Ruang Periksa', 'Yayasan Pondok Pesantren Mambaul Ulum', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('73', '3', '15', '-6.855785791176786', '115.28412324774172', 'Rawat Inap, Apotek, Ruang Periksa', 'Yayasan Pondok Pesantren Muhamadiyah Islam', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('74', '3', '8', '-6.831242670297722', '115.27699930059816', 'Rawat Inap, Apotek, Ruang Periksa', 'Yayasan Pondok Pesantren Zainul Huda\nArjasa Laok', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('75', '3', '16', '-6.854273187418058', '115.28801781523134', 'Poskestren Pondok Pesantren Muhibbin', 'Yayasan Pondok Pesantren Muhibbin', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('76', '1', '15', '', '', '(Tanjung) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Utara Pasar', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('77', '1', '13', '-6.852707317907061', '115.26350242483522', '(Durian) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Kamp. Tengah', 'peta.PNG');
INSERT INTO `distribusi_pelayanan` VALUES ('78', '1', '15', '-6.8582783812618455', '115.28528196203615', '(Kalowang) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Kalowang', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('79', '1', '15', '-6.856147963195375', '115.28551799642946', '(Nyangkreng) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Nyangkreng-Kalikatak', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('80', '1', '8', '-6.834182798142683', '115.27498227941896', '(Teratai) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Nyaplong Ondung-Duko II', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('81', '1', '8', '-6.829666072559085', '115.26073438513185', '(Melati) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Tengah Parse Duko I', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('82', '1', '8', '-6.828600800875265', '115.25848132955934', '(Bunut) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Bunut-Duko III', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('83', '1', '13', '-6.8364837551481505', '115.25446874487307', '(Manggis) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Talage Lalang-Bilis Bilis I', '');
INSERT INTO `distribusi_pelayanan` VALUES ('84', '1', '13', '', '', '(Durian) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Durian-Bilis Bilis I', '');
INSERT INTO `distribusi_pelayanan` VALUES ('85', '1', '13', '-6.834097577300138', '115.23721677648928', '(Rambutan) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Ujung Baru-Bilis Bilis II', '');
INSERT INTO `distribusi_pelayanan` VALUES ('86', '1', '13', '-6.85114144325317', '115.2614639459839', '(Langsep) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Karang Lombi Bilis II', '');
INSERT INTO `distribusi_pelayanan` VALUES ('87', '1', '9', '-6.851832044106709', '115.29459984927371', '(Parse) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Parse-Kolo Kolo', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('88', '1', '9', '-6.854069003083498', '115.29236825137332', '(Sokon) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Sokon-Kolo Kolo', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('89', '1', '9', '-6.854069003083498', '115.29211075930789', '(Jambu) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Jambu-Kolo Kolo', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('91', '1', '9', '-6.860162', '115.28565200000003', '(Ketapang) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Ketapang-Kolo Kolo', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('92', '1', '9', '-6.853387264316844', '115.29228242068484', '(Aeng Bero) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Aeng Bero', '');
INSERT INTO `distribusi_pelayanan` VALUES ('93', '1', '10', '-6.887655873550571', '115.2207587419739', '(Sawo) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Temor Lorong - Angkatan I', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('94', '1', '10', '-6.890808679902384', '115.21844131338503', '(Nangka) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Laok Lorong - Angkatan I', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('95', '1', '10', '-6.895410035325095', '115.21629554617311', '(Manggis)KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Reng - Angkatan I', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('96', '1', '10', '-6.898903627191202', '115.2167246996155', '(Durian) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Durian- Angkatan I', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('97', '1', '10', '-6.89745506783724', '115.21105987417604', '(Mangga)KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Rabe-Angkatan II', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('98', '1', '10', '-6.890979101270153', '115.2141497789612', '(Nanas) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Apal-Angkatan II', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('99', '1', '10', '-6.88825235203556', '115.2254794298401', '(Sungai) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Laok Sungai-Angkatan II', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('100', '1', '10', '-6.902311984660984', '115.20917159902956', 'KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Angakatan II', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('101', '1', '10', '-6.905038652965727', '115.21346313345339', '(Air) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Air Betang Angkatan II', '');
INSERT INTO `distribusi_pelayanan` VALUES ('102', '1', '12', '', '', '(Nangka) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Nangka-Laok Jang Jang', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('103', '1', '12', '', '', '(Belimbing) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Belimbing-Laok Jang Jang', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('104', '1', '12', '', '', '(Ngomber) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Ngomber-Laok Jang Jang', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('105', '1', '11', '-6.854294491729683', '115.25293452131655', '(Kelapa) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Kelapa -Kalisangka I', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('110', '1', '3', '', '', '(Banjar) KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Banjar-Pajenangger', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('113', '6', '9', '-6.855432477691614', '115.29082329898074', 'KIA, KB, Pengobatan', 'Jhembhu', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('114', '6', '12', '', '', 'KIA, KB, Pengobatan', 'Barat Pasar', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('115', '6', '3', '', '', 'KIA, KB, Pengobatan', 'Telaga Kolpo', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('116', '5', '7', '-6.859288533198965', '115.2866015019913', 'Pel. Gawat Darurat, Poli Umum, Poli Anak, Poli Ibu/KB, Poli Gigi, Kebidanan, Rawat Inap, Radiologi, USG, Kes. Jiwa, Rekam Medik, Lab, Pusling, Ambulance', 'Selatan Alun alun Arjasa', 'default.jpg');
INSERT INTO `distribusi_pelayanan` VALUES ('117', '1', '34', '-6.890668419307357', '115.44804366259768', '(Kenanga)  KIA, Pel. Kesehatan, KB, Imunisasi dan Pojok Oralit', 'Batu Putih Atas', 'halo.jpg');

-- ----------------------------
-- Table structure for kecamatan
-- ----------------------------
DROP TABLE IF EXISTS `kecamatan`;
CREATE TABLE `kecamatan` (
  `kecamatan_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(255) NOT NULL,
  `kode_kecamatan` varchar(255) NOT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`kecamatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kecamatan
-- ----------------------------
INSERT INTO `kecamatan` VALUES ('1', 'ARJASA', '69491', null);
INSERT INTO `kecamatan` VALUES ('2', '	KANGAYAN', '69492', null);
INSERT INTO `kecamatan` VALUES ('3', '	SAPEKEN', '69493', null);

-- ----------------------------
-- Table structure for kelurahan
-- ----------------------------
DROP TABLE IF EXISTS `kelurahan`;
CREATE TABLE `kelurahan` (
  `kelurahan_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kecamatan_id` int(11) NOT NULL,
  `nama_kelurahan` varchar(255) NOT NULL,
  `kode_kelurahan` varchar(255) NOT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `koordinat_x` varchar(20) DEFAULT NULL,
  `koordinat_y` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kelurahan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kelurahan
-- ----------------------------
INSERT INTO `kelurahan` VALUES ('1', '1', 'BUDDI', '35.29.24.0001', null, '-6,94508', '115,283');
INSERT INTO `kelurahan` VALUES ('2', '1', 'GELAMAN', '35.29.24.0002', null, '-6,92068', '115,323');
INSERT INTO `kelurahan` VALUES ('3', '1', 'PAJANANGGER', '35.29.24.0003', null, '-6,96648', '115,36');
INSERT INTO `kelurahan` VALUES ('4', '1', 'SAWAHSUMUR', '35.29.24.0010', null, '-6,90046', '115,36');
INSERT INTO `kelurahan` VALUES ('5', '1', 'PASERAMAN', '35.29.24.0011', null, '-6,89013', '115,328');
INSERT INTO `kelurahan` VALUES ('6', '1', 'KALINGANYAR', '35.29.24.0012', null, '-6,86841', '115,299');
INSERT INTO `kelurahan` VALUES ('7', '1', 'ARJASA', '35.29.24.0013', null, '-6,86657', '115,288');
INSERT INTO `kelurahan` VALUES ('8', '1', 'DUKO', '35.29.24.0014', null, '-6,86273', '115,277');
INSERT INTO `kelurahan` VALUES ('9', '1', 'KOLO KOLO', '35.29.24.0015', null, '-6,90314', '115,24');
INSERT INTO `kelurahan` VALUES ('10', '1', 'ANGKATAN', '35.29.24.0016', null, '-6,89337', '115,234');
INSERT INTO `kelurahan` VALUES ('11', '1', 'KALISANGKA', '35.29.24.0017', null, '-6,85565', '115,254');
INSERT INTO `kelurahan` VALUES ('12', '1', 'LAOK JANGJANG', '35.29.24.0018', null, '-6,85725', '115,265');
INSERT INTO `kelurahan` VALUES ('13', '1', 'BILIS BILIS', '35.29.24.0019', null, '-6,84123', '115,249');
INSERT INTO `kelurahan` VALUES ('14', '1', 'SUMBERNANGKA', '35.29.24.0020', null, '-6,85662', '115,271');
INSERT INTO `kelurahan` VALUES ('15', '1', 'KALIKATAK', '35.29.24.0021', null, '-6,84413', '115,287');
INSERT INTO `kelurahan` VALUES ('16', '1', 'ANGON ANGON', '35.29.24.0022', null, '-6,84401', '115,301');
INSERT INTO `kelurahan` VALUES ('17', '1', 'SAMBAKATI', '35.29.24.0023', null, '-6,84757', '115,311');
INSERT INTO `kelurahan` VALUES ('18', '1', 'PANDEMAN', '35.29.24.0024', null, '-6,85206', '115,328');
INSERT INTO `kelurahan` VALUES ('19', '1', 'PABIAN', '35.29.24.0025', null, '-6,83751', '115,331');
INSERT INTO `kelurahan` VALUES ('29', '3', 'PAGERUNGAN BESAR', '35.29.25.0001', null, '-5,55407', '114,413');
INSERT INTO `kelurahan` VALUES ('30', '3', 'PAGERUNGAN KECIL', '35.29.25.0002', null, '-5,56787', '114,436');
INSERT INTO `kelurahan` VALUES ('31', '3', 'PALIAT', '35.29.25.0003', null, '-5,07578', '114,6');
INSERT INTO `kelurahan` VALUES ('34', '2', 'BATU PUTIH', '', null, null, null);
INSERT INTO `kelurahan` VALUES ('35', '2', 'CANGKARAMAAN', '', null, null, null);
INSERT INTO `kelurahan` VALUES ('36', '2', 'DAANDUNG', '', null, null, null);
INSERT INTO `kelurahan` VALUES ('37', '2', 'JUKONG JUKONG', '', null, null, null);
INSERT INTO `kelurahan` VALUES ('38', '2', 'KANGAYAN', '', null, null, null);
INSERT INTO `kelurahan` VALUES ('39', '2', 'SAOBI', '', null, null, null);
INSERT INTO `kelurahan` VALUES ('40', '2', 'TEMBAYANGAN', '', null, null, null);
INSERT INTO `kelurahan` VALUES ('41', '2', 'TIMUR JANG JANG', '', null, null, null);
INSERT INTO `kelurahan` VALUES ('42', '2', 'TORJEK', '', null, null, null);
INSERT INTO `kelurahan` VALUES ('43', '3', 'SABUNTAN', '', null, null, null);
INSERT INTO `kelurahan` VALUES ('44', '3', 'SAKALA', '', null, null, null);
INSERT INTO `kelurahan` VALUES ('45', '3', 'SAPEKEN', '', null, null, null);
INSERT INTO `kelurahan` VALUES ('46', '3', 'SASIIL', '', null, null, null);
INSERT INTO `kelurahan` VALUES ('47', '3', 'SEPANJANG', '', null, null, null);
INSERT INTO `kelurahan` VALUES ('48', '3', 'TANJUNGKIAOK', '', null, null, null);

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `log_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `logtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log
-- ----------------------------

-- ----------------------------
-- Table structure for pelayanan
-- ----------------------------
DROP TABLE IF EXISTS `pelayanan`;
CREATE TABLE `pelayanan` (
  `pelayanan_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nama_layanan` char(50) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `icon` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pelayanan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pelayanan
-- ----------------------------
INSERT INTO `pelayanan` VALUES ('1', 'Posyandu', 'Layanan untuk memonitor kesehatan ibu dan balita', '1');
INSERT INTO `pelayanan` VALUES ('2', 'Polindes', 'Poliklinik desa yang digunakan melayani periksa dan membeli obat masyarakat setempat', '2');
INSERT INTO `pelayanan` VALUES ('3', 'Poskentren', 'Pos kesehatan yang terletak di pesantren. Melayani penghuni pesantren', '3');
INSERT INTO `pelayanan` VALUES ('4', 'Ponkesdes', 'Posko kesehatan untuk desa', '4');
INSERT INTO `pelayanan` VALUES ('5', 'Puskesmas Induk', 'Puskesmas Kecamatan', '5');
INSERT INTO `pelayanan` VALUES ('6', 'Puskesmas Pembantu', 'Puskesmas penunjang kerja Puskesmas Induk', '6');
INSERT INTO `pelayanan` VALUES ('7', 'Layanan Luar', 'Tempat jual obat & Praktek Umum', '7');

-- ----------------------------
-- Table structure for photo
-- ----------------------------
DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo` (
  `photo_id` int(11) NOT NULL,
  `distribusi_pelayanan_id` int(11) NOT NULL,
  `namafile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of photo
-- ----------------------------
