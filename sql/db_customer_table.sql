select id,name from customer;CREATE DATABASE `adstracker` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;
CREATE TABLE `customers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `TRANDATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `FIELD1` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `FIELD2` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `FIELD3` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `FIELD4` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `FIELD5` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  UNIQUE KEY `NAME` (`NAME`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


