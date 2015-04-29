-- MySQL dump 10.13  Distrib 5.6.16, for Win32 (x86)
--
-- Host: localhost    Database: travel
-- ------------------------------------------------------
-- Server version	5.6.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agent`
--

DROP TABLE IF EXISTS `agent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agent` (
  `idagent` int(11) NOT NULL AUTO_INCREMENT,
  `namaagen` varchar(2000) NOT NULL,
  `alamat` varchar(2000) DEFAULT NULL,
  `telepon` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `gambar` varchar(200) NOT NULL DEFAULT 'default.jpg',
  `active` int(11) DEFAULT '1',
  `alamat2` varchar(200) DEFAULT NULL,
  `alamat3` varchar(200) DEFAULT NULL,
  `kota` varchar(200) DEFAULT 'Surabaya',
  PRIMARY KEY (`idagent`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `ref_idx` (`parent`),
  KEY `ref_user_idx` (`username`),
  CONSTRAINT `ref` FOREIGN KEY (`parent`) REFERENCES `agent` (`idagent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_user` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent`
--

LOCK TABLES `agent` WRITE;
/*!40000 ALTER TABLE `agent` DISABLE KEYS */;
INSERT INTO `agent` VALUES (1,'Master Agent','alamat master agent','031 21331992123','masteragent@mbsoft.co.id',NULL,'bigtyo','default.jpg',1,NULL,NULL,'Surabaya'),(5,'mentari travel','jl sutorejo selatan 2/14','085646162619','mochammad.raditya@gmail.com',1,'mentari1','default.jpg',1,NULL,NULL,'Surabaya');
/*!40000 ALTER TABLE `agent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agent_maskapai`
--

DROP TABLE IF EXISTS `agent_maskapai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agent_maskapai` (
  `idagent_maskapai` int(11) NOT NULL AUTO_INCREMENT,
  `agentid` int(11) NOT NULL,
  `idmaskapai` int(11) NOT NULL,
  `tipemarkup` int(11) DEFAULT '0',
  `persen_markup` decimal(15,2) DEFAULT '0.00',
  `fix_markup` decimal(15,2) DEFAULT '0.00',
  `plafon_markup` decimal(15,2) DEFAULT '0.00',
  PRIMARY KEY (`idagent_maskapai`),
  KEY `detail_agent_idx` (`agentid`),
  KEY `detail_agent_maskapai_idx` (`idmaskapai`),
  CONSTRAINT `detail_agent` FOREIGN KEY (`agentid`) REFERENCES `agent` (`idagent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `detail_agent_maskapai` FOREIGN KEY (`idmaskapai`) REFERENCES `mastermaskapai` (`idmastermaskapai`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent_maskapai`
--

LOCK TABLES `agent_maskapai` WRITE;
/*!40000 ALTER TABLE `agent_maskapai` DISABLE KEYS */;
INSERT INTO `agent_maskapai` VALUES (1,5,3,0,0.00,20000.00,300000.00),(2,5,2,0,0.00,0.00,0.00),(3,5,8,0,0.00,0.00,0.00),(4,5,1,0,0.00,0.00,0.00),(5,5,5,0,0.00,0.00,0.00),(6,5,6,0,0.00,0.00,0.00),(7,5,7,0,0.00,0.00,0.00),(8,5,9,0,0.00,0.00,0.00),(9,5,4,0,0.00,0.00,0.00),(10,1,3,1,2.00,0.00,500000.00),(11,1,2,0,0.00,0.00,0.00),(12,1,8,0,0.00,0.00,0.00),(13,1,1,0,0.00,0.00,0.00),(14,1,5,0,0.00,0.00,0.00),(15,1,6,0,0.00,0.00,0.00),(16,1,7,0,0.00,0.00,0.00),(17,1,9,0,0.00,0.00,0.00),(18,1,4,0,0.00,0.00,0.00);
/*!40000 ALTER TABLE `agent_maskapai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bandara`
--

DROP TABLE IF EXISTS `bandara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bandara` (
  `iata` varchar(10) NOT NULL,
  `namabandara` varchar(200) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  PRIMARY KEY (`iata`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bandara`
--

LOCK TABLES `bandara` WRITE;
/*!40000 ALTER TABLE `bandara` DISABLE KEYS */;
INSERT INTO `bandara` VALUES ('AAS','Apalapsili','Apalapsili, Yalimo, Papua'),('ABU','Haliwen','Atambua, Nusa Tenggara Timur'),('AEG','Aek Godang','Padang Sidempuan, Sumatera Utara'),('AGD','Anggi','Anggi, Manokwari, Papua'),('AHI','Amahai','Amahai, Papua'),('AKQ','Gunung Batin','Astraksetra, Tulang Bawang, Lampung'),('AMI','Selaparang','Mataram, Nusa Tenggara Barat'),('AMQ','Pattimura','Ambon, Maluku'),('ARD','Pulau Alor','Pulau Alor, Nusa Tenggara Timur'),('ARJ','Arso','Arso, Keerom, Papua'),('AYW','Ayawasi','Ayawasi, Maybrat, Papua'),('BDJ','Syamsudin Noor','Banjarmasin, Kalimantan Selatan'),('BDO','Husein Sastranegara','Bandung, Jawa Barat'),('BEJ','Berau (Kalimaru)','Tanjung Redeb, Berau, Kalimantan Timur'),('BIK','Frans Kaisiepo','Biak, Papua'),('BJG','Bolaang','Bolaang Mogondow, Sulawesi Utara'),('BJK','Nangasuri','Benjina, Maluku Tenggara'),('BJW','Padhameleda','Bajawa, Nusa Tenggara Timur'),('BKS','Padangkemiling (Fatmawati Soekarno)','Bengkulu'),('BMU','Muhammad Salahuddin','Bima, Sumbawa, Nusa Tenggara Barat'),('BPN','Sepinggan','Balikpapan, Kalimantan Timur'),('BTH','Hang Nadim','Batam, Riau'),('BTJ','Sultan Iskandarmuda (Blang Bintang)','Banda Aceh, Aceh'),('BTW','Batulicin','Batulicin, Kalimantan Selatan'),('BUI','Bokondini','Bokondini, Tolikara, Papua'),('BUW','Betoambari','Bau Bau, Pulau Buton, Sulawesi Tenggara'),('BXB','Babo','Babo, Teluk Bintuni, Papua'),('BXD','Bade','Bade, Merauke, Papua'),('BXM','Batom','Batom, Jayawijaya, Papua'),('BXT','Bontang','Bontang, Kalimantan Timur'),('BYQ','Bunyu','Pulau Bunyu, Kalimantan Timur'),('CBN','Cirebon','Cirebon, Jawa Barat'),('CGK','Soekarno-Hatta','Cengkareng, Banten'),('CPF','Ngloram','Cepu, Jawa Tengah'),('CXP','Tunggul Wulung','Cilacap, Jawa Tengah'),('DJB','Paalmerah','Jambi'),('DJJ','Sentani','Jayapura, Papua'),('DOB','Dobo','Dobo, Kepulauan Aru, Maluku'),('DPS','Ngurah Rai','Denpasar, Bali'),('DUM','Pinang Kampai','Dumai, Riau'),('ENE','Ipi','Ende, Nusa Tenggara Timur'),('EWI','Enarotali','Enarotali, Paniai, Papua'),('FKQ','Torea','Fak Fak, Papua'),('FOO','Jembruwo','Numfor, Biak, Papua'),('GLX','Gamarmalamo','Galela, Halmahera Utara'),('GNS','Binaka','Gunungsitoli, Sumatera Utara'),('HLP','Halim Perdanakusuma','Jakarta'),('ILA','Ilaga','Ilaga, Papua'),('INX','Inanwatan','Inanwatan, Sorong Selatan, Papua'),('JKT','Jakarta (city)','Jakarta'),('JOG','Adi Sutjipto','Yogyakarta, DI Yogyakarta'),('KBU','Setagen','Kotabaru, Kalimantan Selatan'),('KDI','Wolter Monginsidi','Kendari, Sulawesi Tenggara'),('KEI','Kepi','Kepi, Merauke, Papua'),('KEQ','Kebar','Kebar, Manokwari, Papua'),('KLQ','Keluang','Keluang, Sumatera Selatan'),('KNG','Kaimana','Kaimana, Papua'),('KOE','El Tari','Kupang, Nusa Tenggara Timur'),('KTG','Rahadi Usman','Ketapang, Kalimantan Barat'),('LBJ','Komodo','Labuhan Bajo, Flores'),('LBW','Juvai Semaring','Long Bawan, Kalimantan Timur'),('LHI','Lereh','Lereh, Jayapura, Papua'),('LII','Mulia','Mulia, Papua'),('LKA','Gewayentana','Larantuka, Flores Timur'),('LLG','Silampari','Lubuk Linggau, Musi Rawas, Sumatera Selatan'),('LPU','Long Apung','Long Apung, Malinau, Kalimantan Timur'),('LSX','Lhok Sukon','Lhok Sukon (Lhoksukon), Aceh'),('LUV','Dumatubin','Langgur, Tual, Maluku Tenggara'),('LUW','Bubung','Luwuk, Sulawesi Tengah'),('MAL','Mangole','Mangole, Maluku Utara'),('MDC','Sam Ratulangi','Manado, Sulawesi Utara'),('MDP','Mindiptana','Mindiptana, Boven Digoel, Papua'),('MEQ','Cut Nyak Dien','Meulaboh, Aceh'),('MES','Polonia','Medan, Sumatera Utara'),('MJU','Tampa Padang','Mamuju, Sulawesi Barat'),('MKQ','Mopah','Merauke, Papua'),('MKW','Rendani','Manokwari, Papua'),('MLG','Abdul Rachman Saleh','Malang, Jawa Timur'),('MNA','Melangguane','Melangguane, Talaut, Sulawesi Utara'),('MOF','Wai Oti','Maumere, Nusa Tenggara Timur'),('MPC','Muko Muko','Bengkulu'),('MXB','Andi Jemma','Masamba, Sulawesi Selatan'),('NAH','Naha','Naha, Sangihe, Sulawesi Utara'),('NAM','Namlea','Namlea, Buru, Maluku'),('NBX','Nabire','Nabire, Papua'),('NNX','Nunukan','Nunukan, Kalimantan Timur'),('NPO','Nangapinoh','Melawi, Kalimantan Barat'),('NTX','Ranai','Natuna, Kepulauan Riau'),('OKL','Oksibil','Oksibil, Pegunungan Bintang Papua'),('OKQ','Okaba','Okaba, Merauke, Papua'),('ONI','Moanamani','Moanamani, Dogiyal, Papua'),('OTI','Pitu','Morotai, Maluku'),('PCB','Pondok Cabe','Jakarta'),('PDG','Minangkabau','Ketaping / Padang, Sumatera Barat'),('PDO','Pendopo','Pendopo, Sumatera Selatan'),('PGK','Pangkalpinang','Pangkal Pinang, Bangka-Belitung'),('PKN','Iskandar Muda','Pangkalan Bun, Aceh'),('PKU','Sultan Syarif Kasim II (Simpang Tiga)','Pekanbaru, Riau'),('PKY','Tjilik Riwut (Panarung)','Palangkaraya, Kalimantan Tengah'),('PLM','Sultan Mahmud Badaruddin II','Palembang, Sumatera Selatan'),('PLW','Mutiara','Palu, Sulawesi Tengah'),('PNK','Supadio','Pontianak, Kalimantan Barat'),('PSJ','Kasiguncu','Poso, Sulawesi Tengah'),('PSU','Pangsuma','Putusibau, Kalimantan Barat'),('RDE','Merdei','Merdei, Teluk Bintuni, Papua'),('RGT','Japura','Rengat, Riau'),('RKO','Rokot','Sipora, Sumatera Barat'),('RSK','Abresso','Ransiki, Manokwari, Papua'),('RTG','Satartacik','Ruteng, Nusa Tenggara Timur'),('SAE','Sangir','Sangir, Sulawesi Utara'),('SBG','Maimun Saleh','Sabang, Aceh'),('SEH','Senggeh','Senggeh, Papua'),('SIQ','Dabo','Singkep, Riau'),('SMQ','Haji Asan','Sampit, Kalimantan Tengah'),('SOC','Adi Sumarmo','Solo, Jawa Tengah'),('SOQ','Jefman','Sorong, Papua'),('SQG','Susilo','Sintang, Kalimantan Barat'),('SQN','Sanana','Sanana, Maluku Utara'),('SQR','Soroako','Soroako, Sulawesi Selatan'),('SQT','Silangit','Siborong-borong, Sumatera Utara'),('SRG','Achmad Yani','Semarang, Jawa Tengah'),('SRI','Temindung','Samarinda, Kalimantan Timur'),('SUB','Juanda','Surabaya, Jawa Timur'),('SUP','Trunojoyo','Sumenep, Madura'),('SWQ','Sumbawa Besar','Sumbawa, Nusa Tenggara Barat'),('SXK','Saumlaki','Saumlaki, Maluku'),('TAX','Taliabu','Taliabu, Maluku Utara'),('TIM','Timika','Tembagapura, Papua'),('TJB','Sunjai Bati','Tanjung Balai, Sumatera Utara'),('TJQ','Bulutumbang','Tanjung Pandan, Kepulauan Bangka Belitung'),('TJS','Warukin','Tanjung Selor, Kalimantan Timur'),('TKG','Radin Inten II (Branti)','Bandar Lampung, Lampung'),('TLI','Lalos','Toli Toli, Sulawesi Tengah'),('TMC','Tambolaka','Waikabubak, Nusa Tenggara Timur'),('TMH','Tanah Merah','Tanah Merah, Boven Digoel, Papua'),('TNB','Tanah Grogot','Tanah Grogot, Kalimantan Timur'),('TNJ','Kijang','Tanjung Pinang, Kepulauan Riau'),('TPK','Teuku Cut Ali','Tapak Tuan, Aceh'),('TRK','Juwata','Tarakan, Kalimantan Timur'),('TSX','Santan','Tanjung Santan, Kalimantan Timur'),('TSY','Cibeureum','Tasikmalaya, Jawa Barat'),('TTE','Sultan Babullah','Ternate, Maluku'),('TXM','Teminabuan','Teminabuan, Sorong, Papua'),('UPG','Hasanuddin','Makassar, Sulawesi Selatan'),('WAR','Waris','Waris, Papua'),('WET','Wagethe','Wagethe, Papua'),('WGP','Waingapu','Waingapu, Nusa Tenggara Timur'),('WMX','Wamena','Wamena, Papua'),('WSR','Wasior','Wasior, Teluk Wondama, Papua');
/*!40000 ALTER TABLE `bandara` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deposit`
--

DROP TABLE IF EXISTS `deposit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deposit` (
  `iddeposit` bigint(20) NOT NULL AUTO_INCREMENT,
  `tanggalcreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idagent` int(11) NOT NULL,
  `nilai` decimal(15,2) NOT NULL DEFAULT '0.00',
  `statusdeposit` varchar(200) NOT NULL DEFAULT 'unverified',
  `createdby` varchar(20) NOT NULL,
  `verifiedby` varchar(20) DEFAULT NULL,
  `tanggalverified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iddeposit`),
  KEY `status_deposit_idx` (`statusdeposit`),
  KEY `deposit_created_idx` (`createdby`),
  KEY `deposit_verified_idx` (`verifiedby`),
  CONSTRAINT `deposit_created` FOREIGN KEY (`createdby`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `deposit_verified` FOREIGN KEY (`verifiedby`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deposit`
--

LOCK TABLES `deposit` WRITE;
/*!40000 ALTER TABLE `deposit` DISABLE KEYS */;
INSERT INTO `deposit` VALUES (1,'2014-10-28 06:14:48',5,50000000.00,'VERIFIED','mentari1','bigtyo','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `deposit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `masterakun`
--

DROP TABLE IF EXISTS `masterakun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `masterakun` (
  `kodeakun` varchar(200) NOT NULL,
  `namaakun` varchar(2000) NOT NULL,
  `parent` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`kodeakun`),
  KEY `ref_parent_idx` (`parent`),
  CONSTRAINT `ref_parent` FOREIGN KEY (`parent`) REFERENCES `masterakun` (`kodeakun`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `masterakun`
--

LOCK TABLES `masterakun` WRITE;
/*!40000 ALTER TABLE `masterakun` DISABLE KEYS */;
INSERT INTO `masterakun` VALUES ('100','kas',NULL),('100.01','kas kecil','100'),('100.02','kas besar','100'),('200','Pendapatan',NULL),('200.01','Pendapatan Ticket','200'),('200.02','Pendapatan Refund','200'),('200.05','Refund dari Airline','200'),('300','pengeluaran',NULL),('300.01','potongan deposit','300'),('300.02','potongan ticket','300'),('300.04','Refund Agent','300'),('400','Deposit',NULL),('400.01','Stok Deposit Agent','400'),('500','Modal',NULL),('500.01','Modal Deposit','500');
/*!40000 ALTER TABLE `masterakun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `masterloginmaskapai`
--

DROP TABLE IF EXISTS `masterloginmaskapai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `masterloginmaskapai` (
  `idmasterloginmaskapai` int(11) NOT NULL AUTO_INCREMENT,
  `idmastermaskapai` int(11) NOT NULL,
  `login` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `filescrap` varchar(200) NOT NULL,
  PRIMARY KEY (`idmasterloginmaskapai`),
  KEY `login_maskapai_idx` (`idmastermaskapai`),
  CONSTRAINT `login_maskapai` FOREIGN KEY (`idmastermaskapai`) REFERENCES `mastermaskapai` (`idmastermaskapai`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `masterloginmaskapai`
--

LOCK TABLES `masterloginmaskapai` WRITE;
/*!40000 ALTER TABLE `masterloginmaskapai` DISABLE KEYS */;
INSERT INTO `masterloginmaskapai` VALUES (1,1,'INTITOURSBY','1NT1T0URSBY','lion'),(3,3,'0038000423','LiNeLuCNCt!1','citilink'),(4,4,'subilr@104094','222222','trigana'),(6,6,'SUBAG0169','1nt1cito','sriwijaya'),(7,9,'g321as01','g321as01','transnusa'),(8,10,'IDTINTISUB_ADMIN','TRAVEL100','airasia'),(9,11,'190065','mandala','xpressair');
/*!40000 ALTER TABLE `masterloginmaskapai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mastermaskapai`
--

DROP TABLE IF EXISTS `mastermaskapai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mastermaskapai` (
  `idmastermaskapai` int(11) NOT NULL AUTO_INCREMENT,
  `namamaskapai` varchar(200) NOT NULL,
  `alamat` varchar(2000) DEFAULT NULL,
  `telepon` varchar(200) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idmastermaskapai`),
  UNIQUE KEY `namamaskapai_UNIQUE` (`namamaskapai`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mastermaskapai`
--

LOCK TABLES `mastermaskapai` WRITE;
/*!40000 ALTER TABLE `mastermaskapai` DISABLE KEYS */;
INSERT INTO `mastermaskapai` VALUES (1,'Lion Air',NULL,NULL,NULL),(2,'Garuda Air',NULL,NULL,NULL),(3,'Citilink',NULL,NULL,NULL),(4,'Trigana',NULL,NULL,NULL),(5,'Merpati',NULL,NULL,NULL),(6,'Sriwijaya',NULL,NULL,NULL),(7,'Tiger Air',NULL,NULL,NULL),(8,'Jet Star',NULL,NULL,NULL),(9,'Trans Nusa',NULL,NULL,NULL),(10,'Air Asia',NULL,NULL,NULL),(11,'Xpress Air',NULL,NULL,NULL);
/*!40000 ALTER TABLE `mastermaskapai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mastertransaksi`
--

DROP TABLE IF EXISTS `mastertransaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mastertransaksi` (
  `idmastertransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `namatransaksi` varchar(200) NOT NULL,
  `persenmod` int(11) DEFAULT NULL,
  PRIMARY KEY (`idmastertransaksi`),
  UNIQUE KEY `namatransaksi_UNIQUE` (`namatransaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mastertransaksi`
--

LOCK TABLES `mastertransaksi` WRITE;
/*!40000 ALTER TABLE `mastertransaksi` DISABLE KEYS */;
INSERT INTO `mastertransaksi` VALUES (1,'Kartu kredit2',2);
/*!40000 ALTER TABLE `mastertransaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(45) NOT NULL,
  `route` varchar(200) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`idmenu`),
  KEY `parent_menu_idx` (`parent`),
  CONSTRAINT `parent_menu` FOREIGN KEY (`parent`) REFERENCES `menu` (`idmenu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refund`
--

DROP TABLE IF EXISTS `refund`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `refund` (
  `idrefund` int(11) NOT NULL AUTO_INCREMENT,
  `agentid` int(11) NOT NULL,
  `tanggalrequest` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(45) NOT NULL DEFAULT 'Request',
  `idticketing_detail` varchar(200) DEFAULT NULL,
  `createdby` varchar(20) NOT NULL,
  `submitby` varchar(20) DEFAULT NULL,
  `approvedby` varchar(20) DEFAULT NULL,
  `tanggalsubmit` timestamp NULL DEFAULT NULL,
  `tanggalapprove` timestamp NULL DEFAULT NULL,
  `nilairefund` decimal(15,2) DEFAULT '0.00',
  `idmaskapai` int(11) DEFAULT NULL,
  `kodebooking` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idrefund`),
  KEY `refund_agent_idx` (`agentid`),
  KEY `refund_ticketing_idx` (`idticketing_detail`),
  KEY `refund_requestuser_idx` (`createdby`),
  KEY `refund_submituser_idx` (`submitby`),
  KEY `refund_approveuser_idx` (`approvedby`),
  KEY `refund_maskapai_idx` (`idmaskapai`),
  CONSTRAINT `refund_agent` FOREIGN KEY (`agentid`) REFERENCES `agent` (`idagent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `refund_approveuser` FOREIGN KEY (`approvedby`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `refund_maskapai` FOREIGN KEY (`idmaskapai`) REFERENCES `mastermaskapai` (`idmastermaskapai`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `refund_requestuser` FOREIGN KEY (`createdby`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `refund_submituser` FOREIGN KEY (`submitby`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refund`
--

LOCK TABLES `refund` WRITE;
/*!40000 ALTER TABLE `refund` DISABLE KEYS */;
INSERT INTO `refund` VALUES (3,1,'2014-12-02 01:52:20','Request','1','bigtyo',NULL,NULL,NULL,NULL,300000.00,3,'BCDA21');
/*!40000 ALTER TABLE `refund` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `idrole` int(11) NOT NULL AUTO_INCREMENT,
  `namarole` varchar(200) NOT NULL,
  `idagent` int(11) NOT NULL,
  PRIMARY KEY (`idrole`),
  KEY `ref_idagen_idx` (`idagent`),
  CONSTRAINT `ref_idagen` FOREIGN KEY (`idagent`) REFERENCES `agent` (`idagent`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'SuperAdmin',1),(2,'Owner',1);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_akses`
--

DROP TABLE IF EXISTS `role_akses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_akses` (
  `idrole_akses` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  PRIMARY KEY (`idrole_akses`),
  KEY `role_akses_role_idx` (`roleid`),
  KEY `role_akses_menu_idx` (`menuid`),
  CONSTRAINT `role_akses_menu` FOREIGN KEY (`menuid`) REFERENCES `menu` (`idmenu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `role_akses_role` FOREIGN KEY (`roleid`) REFERENCES `role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_akses`
--

LOCK TABLES `role_akses` WRITE;
/*!40000 ALTER TABLE `role_akses` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_akses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roleusers`
--

DROP TABLE IF EXISTS `roleusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roleusers` (
  `roleid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`roleid`,`username`),
  KEY `user_roleuser_idx` (`username`),
  CONSTRAINT `role_roleuser` FOREIGN KEY (`roleid`) REFERENCES `role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_roleuser` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roleusers`
--

LOCK TABLES `roleusers` WRITE;
/*!40000 ALTER TABLE `roleusers` DISABLE KEYS */;
INSERT INTO `roleusers` VALUES (1,'bigtyo'),(2,'michael');
/*!40000 ALTER TABLE `roleusers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statusdeposit`
--

DROP TABLE IF EXISTS `statusdeposit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statusdeposit` (
  `idstatusdeposit` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`idstatusdeposit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statusdeposit`
--

LOCK TABLES `statusdeposit` WRITE;
/*!40000 ALTER TABLE `statusdeposit` DISABLE KEYS */;
/*!40000 ALTER TABLE `statusdeposit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticketing`
--

DROP TABLE IF EXISTS `ticketing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticketing` (
  `idticketing` bigint(20) NOT NULL AUTO_INCREMENT,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idagent` int(11) NOT NULL,
  `createdby` varchar(20) NOT NULL,
  `teleponpelanggan` varchar(45) NOT NULL,
  PRIMARY KEY (`idticketing`),
  KEY `agent_idx` (`idagent`),
  KEY `ticket_created_idx` (`createdby`),
  CONSTRAINT `ticket_agent` FOREIGN KEY (`idagent`) REFERENCES `agent` (`idagent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ticket_created` FOREIGN KEY (`createdby`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticketing`
--

LOCK TABLES `ticketing` WRITE;
/*!40000 ALTER TABLE `ticketing` DISABLE KEYS */;
INSERT INTO `ticketing` VALUES (1,'2014-11-18 03:21:01',5,'mentari1',''),(2,'2014-11-18 03:21:11',1,'bigtyo',''),(3,'2014-11-18 03:21:19',5,'mentari1',''),(4,'2014-11-23 08:12:47',1,'bigtyo',''),(5,'2014-11-23 08:29:16',1,'bigtyo',''),(6,'2014-11-23 08:35:10',1,'bigtyo',''),(7,'2014-11-23 08:36:43',1,'bigtyo',''),(8,'2014-11-23 08:38:09',1,'bigtyo',''),(9,'2014-11-23 12:55:17',1,'bigtyo',''),(10,'2014-11-24 06:34:17',1,'bigtyo',''),(11,'2014-11-24 12:15:39',5,'mentari1',''),(12,'2014-11-24 12:32:50',5,'mentari1',''),(13,'2014-11-29 09:08:54',1,'bigtyo',''),(14,'2014-12-01 12:21:04',1,'bigtyo',''),(15,'2014-12-01 12:53:07',1,'bigtyo',''),(16,'2014-12-02 04:38:57',1,'bigtyo',''),(17,'2014-12-22 03:48:43',1,'bigtyo',''),(18,'2014-12-22 06:24:40',1,'bigtyo',''),(19,'2014-12-22 07:32:02',1,'bigtyo',''),(20,'2014-12-22 07:33:23',1,'bigtyo',''),(21,'2014-12-22 08:47:27',1,'bigtyo',''),(22,'2014-12-22 08:48:39',1,'bigtyo',''),(23,'2014-12-22 09:03:10',1,'bigtyo',''),(24,'2014-12-23 06:44:13',1,'bigtyo',''),(25,'2014-12-23 07:02:23',1,'bigtyo',''),(26,'2014-12-23 07:04:55',1,'bigtyo',''),(27,'2014-12-23 08:05:33',1,'bigtyo',''),(28,'2015-01-24 10:52:56',1,'bigtyo',''),(29,'2015-01-24 10:56:49',1,'bigtyo',''),(30,'2015-01-24 11:10:19',1,'bigtyo',''),(31,'2015-01-24 11:10:37',1,'bigtyo',''),(32,'2015-01-24 11:23:41',1,'bigtyo',''),(33,'2015-01-24 14:08:30',1,'bigtyo',''),(34,'2015-01-26 07:57:54',1,'bigtyo',''),(35,'2015-01-30 10:17:01',1,'bigtyo','0'),(36,'2015-02-01 07:12:36',1,'bigtyo','0'),(37,'2015-02-02 11:30:08',1,'bigtyo','085646162619'),(38,'2015-02-03 10:21:41',1,'bigtyo','0'),(39,'2015-02-03 10:26:06',1,'bigtyo','0'),(40,'2015-02-04 09:04:15',1,'bigtyo','0'),(41,'2015-02-05 09:48:20',1,'bigtyo','0');
/*!40000 ALTER TABLE `ticketing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticketing_detail`
--

DROP TABLE IF EXISTS `ticketing_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticketing_detail` (
  `idticketing_detail` bigint(20) NOT NULL AUTO_INCREMENT,
  `idticketing` bigint(20) NOT NULL,
  `idmaskapaipergi` int(11) DEFAULT NULL,
  `namapenumpang` varchar(200) DEFAULT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `salutation` varchar(45) NOT NULL,
  `kodebooking` varchar(200) DEFAULT NULL,
  `nomortiket` varchar(45) DEFAULT NULL,
  `kelas` varchar(45) DEFAULT NULL,
  `keterangan` varchar(2000) DEFAULT NULL,
  `nta` decimal(15,2) NOT NULL DEFAULT '0.00',
  `komisi` decimal(15,2) NOT NULL DEFAULT '0.00',
  `insentif` decimal(15,2) NOT NULL DEFAULT '0.00',
  `markup` decimal(15,2) NOT NULL DEFAULT '0.00',
  `mod` decimal(15,2) NOT NULL DEFAULT '0.00',
  `rute` varchar(45) NOT NULL,
  `tanggalbooking` timestamp NULL DEFAULT NULL,
  `tanggalissued` timestamp NULL DEFAULT NULL,
  `createdby` varchar(20) NOT NULL,
  `statusmaskapai` varchar(45) NOT NULL DEFAULT 'CREATED',
  `issuedby` varchar(20) DEFAULT NULL,
  `infant` int(11) NOT NULL DEFAULT '0',
  `tanggallahir` datetime NOT NULL,
  `tanggalcreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `jenispenumpang` int(11) NOT NULL DEFAULT '1',
  `idmaskapaipulang` int(11) DEFAULT NULL,
  `tanggalpergi` timestamp NULL DEFAULT NULL,
  `tanggalpulang` timestamp NULL DEFAULT NULL,
  `kodeterbangpergi` varchar(45) DEFAULT NULL,
  `kodeterbangpulang` varchar(45) DEFAULT NULL,
  `kodebookingpulang` varchar(200) DEFAULT NULL,
  `subtotal` decimal(15,2) DEFAULT '0.00',
  PRIMARY KEY (`idticketing_detail`),
  KEY `ticketing_idx` (`idticketing`),
  KEY `ticket_maskapai_idx` (`idmaskapaipergi`),
  KEY `ticket_creator_idx` (`createdby`),
  KEY `ticket_issuer_idx` (`issuedby`),
  KEY `ticket_maskapai_pulang_idx` (`idmaskapaipulang`),
  CONSTRAINT `ticketing` FOREIGN KEY (`idticketing`) REFERENCES `ticketing` (`idticketing`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ticket_creator` FOREIGN KEY (`createdby`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ticket_issuer` FOREIGN KEY (`issuedby`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ticket_maskapai` FOREIGN KEY (`idmaskapaipergi`) REFERENCES `mastermaskapai` (`idmastermaskapai`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ticket_maskapai_pulang` FOREIGN KEY (`idmaskapaipulang`) REFERENCES `mastermaskapai` (`idmastermaskapai`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticketing_detail`
--

LOCK TABLES `ticketing_detail` WRITE;
/*!40000 ALTER TABLE `ticketing_detail` DISABLE KEYS */;
INSERT INTO `ticketing_detail` VALUES (2,1,3,'M Raditya','M','Tyo','Raditya','Mr','B34513','878312938798','c',NULL,250000.00,10000.00,5000.00,20000.00,0.00,'BPN-SUB','2014-11-18 03:25:08',NULL,'mentari1','BOOKED',NULL,0,'1985-06-17 00:00:00','2014-11-22 07:19:31',1,NULL,NULL,NULL,NULL,NULL,NULL,0.00),(3,1,3,'M Raditya jr','M','Jr','Raditya','Mr','B34513','878312938798','c',NULL,250000.00,10000.00,5000.00,20000.00,0.00,'BPN-SUB','2014-11-18 03:25:08',NULL,'mentari1','BOOKED',NULL,0,'2011-04-21 00:00:00','2014-11-22 07:19:31',1,NULL,NULL,NULL,NULL,NULL,NULL,0.00),(4,1,3,'Aluna Aisyah','Aluna','','Aisyah','Mrs','B34513','878312938798','c',NULL,125000.00,10000.00,5000.00,20000.00,0.00,'BPN-SUB','2014-11-18 03:25:08',NULL,'mentari1','BOOKED',NULL,1,'2014-01-01 00:00:00','2014-11-22 07:19:31',1,NULL,NULL,NULL,NULL,NULL,NULL,0.00),(7,10,NULL,NULL,'Raditya','Bagus','Pratama','',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'',NULL,NULL,'bigtyo','CREATED',NULL,0,'1985-06-17 00:00:00','2014-11-24 06:37:47',1,NULL,NULL,NULL,NULL,NULL,NULL,0.00),(13,11,3,NULL,'raditya','bagus','pratama','','BY5BHA',NULL,'c',NULL,0.00,0.00,0.00,0.00,0.00,'',NULL,NULL,'mentari1','CREATED',NULL,0,'1985-06-17 00:00:00','2014-11-24 12:20:11',1,NULL,NULL,NULL,NULL,NULL,NULL,0.00),(17,10,NULL,NULL,'raditya','bagus','pratama','MR',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'',NULL,NULL,'bigtyo','CREATED',NULL,0,'1985-06-17 00:00:00','2014-12-02 04:43:30',1,NULL,NULL,NULL,NULL,NULL,NULL,0.00),(18,23,NULL,NULL,'raditya','bagus','pratama','Mr',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'',NULL,NULL,'bigtyo','CREATED',NULL,0,'1985-06-17 00:00:00','2014-12-22 09:03:11',1,NULL,NULL,NULL,NULL,NULL,NULL,0.00),(19,24,NULL,NULL,'mochammad','raditya','bagus','Mr',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'',NULL,NULL,'bigtyo','CREATED',NULL,0,'1985-06-17 00:00:00','2014-12-23 06:44:13',1,NULL,NULL,NULL,NULL,NULL,NULL,0.00),(20,25,NULL,NULL,'mochammad','raditya','bagus','Mr',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'',NULL,NULL,'bigtyo','CREATED',NULL,0,'1985-06-17 00:00:00','2014-12-23 07:02:23',1,NULL,NULL,NULL,NULL,NULL,NULL,0.00),(21,26,NULL,NULL,'mochammad','raditya','pratama','Mr',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'',NULL,NULL,'bigtyo','CREATED',NULL,0,'1985-06-17 00:00:00','2014-12-23 07:04:56',1,NULL,NULL,NULL,NULL,NULL,NULL,0.00),(22,27,NULL,NULL,'mochammad','raditya','bagus','Mr',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'',NULL,NULL,'bigtyo','CREATED',NULL,0,'1985-06-17 00:00:00','2014-12-23 08:05:33',1,NULL,NULL,NULL,NULL,NULL,NULL,0.00),(23,32,NULL,NULL,'raditya','bagus','pratama','Mr',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'',NULL,NULL,'bigtyo','CREATED',NULL,0,'1985-06-17 00:00:00','2015-01-24 11:23:41',1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00','QG-635','GA-319|0GA-576',NULL,0.00),(24,33,NULL,NULL,'mochammad','raditya','bagus','Mr',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'',NULL,NULL,'bigtyo','CREATED',NULL,0,'1985-06-17 00:00:00','2015-01-24 14:08:30',1,NULL,'2015-01-26 02:15:00','2015-01-27 10:45:00','SJ-233','JT-368',NULL,0.00),(25,34,6,NULL,'raditya','bagus','pratama','Mr',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'BPN-SUB',NULL,NULL,'bigtyo','CREATED',NULL,0,'1985-06-17 00:00:00','2015-01-26 07:57:54',1,6,'2015-01-27 09:20:00','2015-01-27 08:00:00','SJ-253','SJ-232',NULL,0.00),(26,35,3,NULL,'raditya','bagus','pratama','Mr',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'',NULL,NULL,'bigtyo','CREATED',NULL,0,'1985-06-17 00:00:00','2015-01-30 10:17:02',1,3,'2015-01-31 02:30:00','2015-02-02 08:10:00','QG-631','QG-634',NULL,0.00),(27,36,3,NULL,'raditya','bagus','pratama','Mr',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'',NULL,NULL,'bigtyo','CREATED',NULL,0,'1985-06-17 00:00:00','2015-02-01 07:12:36',1,3,'2015-02-06 02:30:00','2015-02-10 23:20:00','QG-631','QG-630',NULL,0.00),(28,36,3,NULL,'rasya','atsaqoff','-','Mrs',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'',NULL,NULL,'bigtyo','CREATED',NULL,0,'2011-04-21 00:00:00','2015-02-01 07:12:36',2,3,'2015-02-06 02:30:00','2015-02-10 23:20:00','QG-631','QG-630',NULL,0.00),(29,37,3,NULL,'raditya','bagus','pratama','Mr',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'BPN-SUB',NULL,NULL,'bigtyo','CREATED',NULL,0,'1985-06-17 00:00:00','2015-02-01 10:50:14',1,3,'2015-02-04 02:30:00','2015-02-05 23:20:00','QG-631','QG-630',NULL,0.00),(30,37,3,NULL,'rasya','atsaqoff','-','Mr',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'BPN-SUB',NULL,NULL,'bigtyo','CREATED',NULL,0,'2011-04-21 00:00:00','2015-02-01 10:50:14',1,3,'2015-02-04 02:30:00','2015-02-05 23:20:00','QG-631','QG-630',NULL,0.00),(31,38,NULL,NULL,'raditya','bagus','pratama','Mr',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'SUB-DPS',NULL,NULL,'bigtyo','CREATED',NULL,0,'1985-06-17 00:00:00','2015-02-03 10:21:42',1,NULL,'2015-02-06 10:20:00','2015-02-09 01:15:00','QZ-7620','QZ-7629',NULL,0.00),(32,39,10,NULL,'raditya','bagus','pratama','Mr',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'SUB-DPS',NULL,NULL,'bigtyo','CREATED',NULL,0,'1985-06-17 00:00:00','2015-02-03 10:26:06',1,10,'2015-02-06 10:20:00','2015-02-09 01:15:00','QZ-7620','QZ-7629',NULL,0.00),(33,40,10,NULL,'raditya','bagus','pratama','Mr',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'SUB-DPS',NULL,NULL,'bigtyo','CREATED',NULL,0,'1985-06-17 00:00:00','2015-02-04 09:04:15',1,10,'2015-02-06 10:20:00','2015-02-09 12:45:00','QZ-7620','QZ-7621',NULL,0.00),(34,41,10,NULL,'raditya','bagus','pratama','Mr',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'SUB-DPS',NULL,NULL,'bigtyo','CREATED',NULL,0,'1985-06-17 00:00:00','2015-02-05 09:48:20',1,10,'2015-02-07 10:20:00','2015-02-10 12:45:00','QZ-7620','QZ-7621',NULL,0.00),(35,41,10,NULL,'rasya','m','atsaqof','Mr',NULL,NULL,NULL,NULL,0.00,0.00,0.00,0.00,0.00,'SUB-DPS',NULL,NULL,'bigtyo','CREATED',NULL,0,'2011-04-21 00:00:00','2015-02-05 09:48:20',2,10,'2015-02-07 10:20:00','2015-02-10 12:45:00','QZ-7620','QZ-7621',NULL,0.00);
/*!40000 ALTER TABLE `ticketing_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `idtransaksi` bigint(20) NOT NULL AUTO_INCREMENT,
  `kodeakun` varchar(200) NOT NULL,
  `debet` decimal(15,2) NOT NULL DEFAULT '0.00',
  `kredit` decimal(15,2) NOT NULL DEFAULT '0.00',
  `idagent` int(11) NOT NULL,
  `keterangan` varchar(2000) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ref` varchar(200) DEFAULT NULL,
  `createdby` varchar(20) NOT NULL,
  PRIMARY KEY (`idtransaksi`),
  KEY `agent_idx` (`idagent`),
  KEY `akun_idx` (`kodeakun`),
  KEY `transaksi_createdby_idx` (`createdby`),
  CONSTRAINT `agent` FOREIGN KEY (`idagent`) REFERENCES `agent` (`idagent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `akun` FOREIGN KEY (`kodeakun`) REFERENCES `masterakun` (`kodeakun`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `transaksi_createdby` FOREIGN KEY (`createdby`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES (16,'100.02',0.00,50000000.00,5,'deposit','0000-00-00 00:00:00','1','bigtyo'),(17,'200.01',50000000.00,0.00,5,'deposit','0000-00-00 00:00:00','1','bigtyo'),(18,'100.02',50000000.00,0.00,1,'deposit','0000-00-00 00:00:00','1','bigtyo');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(2000) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `alamat` varchar(2000) DEFAULT NULL,
  `telepon` varchar(200) DEFAULT NULL,
  `agent` int(11) DEFAULT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `parent_login_idx` (`agent`),
  CONSTRAINT `parent_login` FOREIGN KEY (`agent`) REFERENCES `agent` (`idagent`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('bigtyo','Raditya Pratama','dd8160ad63c98b9f61d3b3f714f03ee2','raditya@mbsoft.co.id','jl sutorejo selatan 2/14','085646162619',1),('mentari1','Bob Kusumo','dd8160ad63c98b9f61d3b3f714f03ee2','bob@gmail.com','jl mentari 29a ','085646162619',5),('michael','Michael','dd8160ad63c98b9f61d3b3f714f03ee2','michael@mbsoft.co.id','xxxxxx','083123123',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-05 17:29:38
