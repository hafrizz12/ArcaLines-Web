-- -------------------------------------------------------------
-- TablePlus 5.5.2(512)
--
-- https://tableplus.com/
--
-- Database: arcalines
-- Generation Time: 2023-12-05 23:47:31.6290
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `Aircrafts` (
  `AircraftID` int NOT NULL AUTO_INCREMENT,
  `AircraftName` varchar(255) NOT NULL,
  `AircraftType` varchar(255) NOT NULL,
  `Capacity` int NOT NULL,
  PRIMARY KEY (`AircraftID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;;

CREATE TABLE `bookings` (
  `BookingID` int NOT NULL AUTO_INCREMENT,
  `UserID` int DEFAULT NULL,
  `RouteID` int DEFAULT NULL,
  `AircraftID` int DEFAULT NULL,
  `BookingDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `SeatCount` int NOT NULL,
  `PricePerSeat` int NOT NULL,
  `TotalPrice` int NOT NULL,
  PRIMARY KEY (`BookingID`),
  KEY `UserID` (`UserID`),
  KEY `RouteID` (`RouteID`),
  KEY `AircraftID` (`AircraftID`),
  CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`),
  CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`RouteID`) REFERENCES `Routes` (`RoutesID`),
  CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`AircraftID`) REFERENCES `Aircrafts` (`AircraftID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;;

CREATE TABLE `routes` (
  `RoutesID` int NOT NULL AUTO_INCREMENT,
  `OriginCity` varchar(255) NOT NULL,
  `DestinationCity` varchar(255) NOT NULL,
  `Distance` float NOT NULL,
  `AirCraftID` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  PRIMARY KEY (`RoutesID`),
  KEY `AirCraftID` (`AirCraftID`),
  CONSTRAINT `routes_ibfk_1` FOREIGN KEY (`AirCraftID`) REFERENCES `Aircrafts` (`AircraftID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;;

CREATE TABLE `users` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `access_status` int NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;;

INSERT INTO `Aircrafts` (`AircraftID`, `AircraftName`, `AircraftType`, `Capacity`) VALUES
(1, 'Embraer E1700', 'Economy', 73),
(2, 'Airbus A320', 'Business', 120),
(3, 'Bombardier Challenger 3', 'First Class', 13),
(4, 'Boeing 757', 'Economy', 180),
(5, 'Airbus A330', 'Business', 220),
(6, 'Cessna Citation CJ3', 'First Class', 6),
(7, 'Boeing 737 MAX', 'Economy', 160),
(8, 'Gulfstream G550', 'Business', 16),
(9, 'Bombardier CRJ900', 'First Class', 88),
(10, 'Airbus A321', 'Economy', 200),
(11, 'Boeing 777X', 'Business', 351),
(12, 'Embraer Phenom 300', 'First Class', 7),
(13, 'Airbus A380', 'Economy', 853),
(14, 'Boeing 767 Freighter', 'Business', 0),
(18, 'CIrrus', 'Commerical', 13),
(19, 'sd', 'Private', 6),
(20, 'Airbus XZ', 'Commerical', 1);

INSERT INTO `bookings` (`BookingID`, `UserID`, `RouteID`, `AircraftID`, `BookingDate`, `SeatCount`, `PricePerSeat`, `TotalPrice`) VALUES
(1, 1, 7, 1, '2023-12-05 07:50:03', 1, 1, 1),
(2, 1, 7, 1, '2023-12-05 07:50:22', 1, 1, 1),
(3, 1, 7, 1, '2023-12-05 07:51:19', 1, 1000, 1000),
(4, 1, 7, 1, '2023-12-05 08:28:44', 1, 1000, 1000),
(5, 2, 7, 1, '2023-12-05 08:28:51', 1, 1000, 1000),
(6, 7, 7, 1, '2023-12-05 19:03:26', 1, 5000, 5000),
(7, 7, NULL, 1, '2023-12-05 20:31:29', 3, 5000, 15000),
(8, 7, NULL, 2, '2023-12-05 20:31:40', 2, 3000, 6000),
(9, 8, NULL, 1, '2023-12-05 20:33:44', 2, 5000, 10000),
(10, 8, 7, 1, '2023-12-05 20:36:26', 2, 5000, 10000),
(11, 8, 7, 1, '2023-12-05 20:36:33', 1, 5000, 5000),
(12, 8, 9, 3, '2023-12-05 20:36:38', 2, 2000, 4000),
(13, 8, 8, 2, '2023-12-05 20:36:43', 4, 3000, 12000),
(14, 8, 8, 2, '2023-12-05 20:38:58', 2, 3000, 6000);

INSERT INTO `routes` (`RoutesID`, `OriginCity`, `DestinationCity`, `Distance`, `AirCraftID`, `price`) VALUES
(7, 'Jakarta', 'Bangkok', 1200, 1, 500000),
(8, 'Bangkok', 'Jakarta', 1200, 2, 3000),
(9, 'Jakarta', 'Manila', 1600, 3, 2000),
(13, 'Jakarta', 'Singapore', 709, 5, 150000);

INSERT INTO `users` (`UserID`, `Username`, `email`, `password`, `name`, `phoneNumber`, `access_status`) VALUES
(1, 'spicy', 'spicy.burgers.0u@icloud.com', '892a9944cf14665375630c06a1902152', 'wawa', '123213', 1),
(2, 'wawan', 'wanderer@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'wanderer', '12332123', 0),
(3, 'hafidzmrizky', 'hafidzmrizky@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Hafidz Muhammad Rizky', '082310835022', 1),
(5, 'catscara', 'testscara@gmail.cm', 'c20ad4d76fe97759aa27a0c99bff6710', 'Kunikuzushi Scaramouche', '0823108311111', 0),
(7, 'testx', 'test@test.com', '4a2028eceac5e1f4d252ea13c71ecec6', 'Rizky M', '0921121332', 0),
(8, 'karni', 'teasrt@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'karni test', '123', 0);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;