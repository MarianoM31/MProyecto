CREATE DATABASE  IF NOT EXISTS `smellelegance_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `smellelegance_db`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: smellelegance_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `ID_Cliente` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Completo` varchar(150) NOT NULL,
  `Correo_Electronico` varchar(100) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Fecha_Registro` datetime DEFAULT current_timestamp(),
  `Activo` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`ID_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Cliente de Prueba','cliente.prueba@email.com','8888-8888','San José, Costa Rica','2024-11-18 01:28:35',1);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_pedidos`
--

DROP TABLE IF EXISTS `detalle_pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_pedidos` (
  `ID_Detalle_Pedido` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Pedido` int(11) DEFAULT NULL,
  `ID_Producto` int(11) DEFAULT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio_Unitario` decimal(10,2) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID_Detalle_Pedido`),
  KEY `ID_Pedido` (`ID_Pedido`),
  KEY `ID_Producto` (`ID_Producto`),
  CONSTRAINT `detalle_pedidos_ibfk_1` FOREIGN KEY (`ID_Pedido`) REFERENCES `pedidos` (`ID_Pedido`),
  CONSTRAINT `detalle_pedidos_ibfk_2` FOREIGN KEY (`ID_Producto`) REFERENCES `productos` (`ID_Producto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_pedidos`
--

LOCK TABLES `detalle_pedidos` WRITE;
/*!40000 ALTER TABLE `detalle_pedidos` DISABLE KEYS */;
INSERT INTO `detalle_pedidos` VALUES (1,2,1,2,100.00,200.00),(2,2,2,1,150.00,150.00),(3,2,3,3,50.00,150.00);
/*!40000 ALTER TABLE `detalle_pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entregas`
--

DROP TABLE IF EXISTS `entregas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entregas` (
  `ID_Entrega` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Pedido` int(11) DEFAULT NULL,
  `Fecha_Entrega` datetime DEFAULT NULL,
  `Estado_Entrega` varchar(50) DEFAULT 'pendiente',
  `Direccion_Entrega` varchar(255) DEFAULT NULL,
  `ID_Responsable_Entrega` int(11) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`ID_Entrega`),
  KEY `ID_Pedido` (`ID_Pedido`),
  KEY `ID_Responsable_Entrega` (`ID_Responsable_Entrega`),
  CONSTRAINT `entregas_ibfk_1` FOREIGN KEY (`ID_Pedido`) REFERENCES `pedidos` (`ID_Pedido`),
  CONSTRAINT `entregas_ibfk_2` FOREIGN KEY (`ID_Responsable_Entrega`) REFERENCES `usuarios` (`ID_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entregas`
--

LOCK TABLES `entregas` WRITE;
/*!40000 ALTER TABLE `entregas` DISABLE KEYS */;
INSERT INTO `entregas` VALUES (1,4,'2024-11-08 18:17:00','en camino','Casa de la madre',1,0),(2,4,'2024-11-03 18:23:00','en camino','San José, ',NULL,0),(3,4,'2024-11-18 18:35:00','pendiente','Aun en cola',2,0);
/*!40000 ALTER TABLE `entregas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagos` (
  `ID_Pago` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Pedido` int(11) DEFAULT NULL,
  `Monto_Pagado` decimal(10,2) NOT NULL,
  `Metodo_Pago` varchar(50) NOT NULL,
  `Fecha_Pago` datetime DEFAULT current_timestamp(),
  `Estado_Pago` varchar(50) DEFAULT 'pendiente',
  `Activo` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`ID_Pago`),
  KEY `ID_Pedido` (`ID_Pedido`),
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`ID_Pedido`) REFERENCES `pedidos` (`ID_Pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` VALUES (1,4,135.00,'SINPE','2024-11-18 18:46:25','ANULADO',0),(2,5,5009.00,'SINPE','2024-11-18 18:54:28','PAGADO',0),(3,7,350.00,'TARJETA','2024-11-18 19:02:02','pendiente',0),(4,7,350.00,'TARJETA','2024-11-18 19:11:20','pendiente',1),(5,9,100.00,'SINPE','2024-11-18 19:12:34','pendiente',1);
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `ID_Pedido` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Cliente` int(11) DEFAULT NULL,
  `Fecha_Pedido` datetime DEFAULT current_timestamp(),
  `Estado_Pedido` varchar(50) DEFAULT 'pendiente',
  `Total_Pedido` decimal(10,2) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`ID_Pedido`),
  KEY `ID_Cliente` (`ID_Cliente`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `clientes` (`ID_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,1,'2024-11-18 01:28:56','pendiente',50000.00,0),(2,1,'2024-11-18 01:29:28','completado',1000.00,0),(3,1,'2024-11-18 01:31:17','pendiente',300.00,0),(4,1,'2024-11-18 14:16:07','completado',135.00,0),(5,1,'2024-11-18 18:54:17','completado',5009.00,0),(6,1,'2024-11-18 19:00:14','completado',789.00,0),(7,1,'2024-11-18 19:01:37','pendiente',345.00,0),(8,1,'2024-11-18 19:11:37','completado',8.00,0),(9,1,'2024-11-18 19:12:23','pendiente',100.00,1);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `ID_Producto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Marca` varchar(100) DEFAULT NULL,
  `Stock_Disponible` int(11) NOT NULL,
  `Fecha_Creacion` datetime DEFAULT current_timestamp(),
  `Fecha_Ultima_Actualizacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Activo` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`ID_Producto`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Perfume Floral Intenso','Perfume con fragancia más intensa y duradera',49.99,'Dior',120,'2024-11-14 12:49:35','2024-11-14 12:52:18',0),(2,'one','One',100.00,'CH',1,'2024-11-14 14:10:08','2024-11-14 14:10:08',1),(3,'one','One',100.00,'CH',1,'2024-11-14 14:12:41','2024-11-17 23:50:20',0),(4,'one','CV ',1.00,'CH ',1,'2024-11-14 14:13:26','2024-11-17 23:52:24',0),(5,'One','One',100.00,'CH',4,'2024-11-14 14:18:52','2024-11-17 23:52:21',0),(6,'1','1',1.00,'1',1,'2024-11-14 14:21:15','2024-11-17 23:52:19',0),(7,'1','1',1.00,'1',1,'2024-11-14 14:28:45','2024-11-17 23:52:17',0),(8,'1','1',1.00,'1',1,'2024-11-14 14:29:21','2024-11-17 23:52:15',0),(9,'CH ','Perf',100.00,'CH ',2,'2024-11-14 14:34:33','2024-11-17 23:52:12',0),(10,'2','2',2.00,'2',2,'2024-11-14 14:35:26','2024-11-17 23:52:10',0),(11,'One','One es un per.....',100.00,'CH ',10,'2024-11-17 14:45:02','2024-11-17 23:52:07',0),(12,'9','9',9.00,'9',9,'2024-11-17 15:35:10','2024-11-17 23:52:04',0),(13,'Toy','desc',100.00,'Toy ',10,'2024-11-17 15:52:12','2024-11-17 23:52:00',0),(14,'23','23',23.00,'23',23,'2024-11-17 16:40:08','2024-11-17 23:51:57',0),(15,'23','23',23.00,'23',23,'2024-11-17 16:40:15','2024-11-17 23:51:54',0),(16,'231','12',12.00,'12',12,'2024-11-17 16:41:27','2024-11-17 23:51:51',0),(17,'qw','qw',1.00,'qw',1,'2024-11-17 16:41:54','2024-11-17 23:51:48',0),(18,'x','x',1.00,'x',1,'2024-11-17 16:45:30','2024-11-17 23:51:45',0),(19,'x','x',1.00,'x',1,'2024-11-17 16:46:16','2024-11-17 23:51:42',0),(20,'12','12',12.00,'12',12,'2024-11-17 16:50:51','2024-11-17 23:51:40',0),(21,'v','v',1.00,'v',1,'2024-11-17 16:51:46','2024-11-17 23:51:37',0),(22,'v','v',1.00,'v',1,'2024-11-17 16:51:52','2024-11-17 23:51:31',0),(23,'dwed','edwe',1.00,'sad',1,'2024-11-17 16:52:02','2024-11-17 23:51:28',0),(24,'dwed','edwe',1.00,'sad',1,'2024-11-17 16:52:05','2024-11-17 23:51:14',0),(25,'dwed','edwe',1.00,'sad',1,'2024-11-17 16:52:13','2024-11-17 23:51:11',0),(26,'dwedqqqqq','edweqqqqq',1.00,'sadqqqq',1,'2024-11-17 16:52:20','2024-11-17 23:51:08',0),(27,'dwedqqqqqeeee','edweqqqqqee',1.00,'sadqqqqeeee',1,'2024-11-17 16:52:57','2024-11-17 23:51:05',0),(28,'233333333333333','233333333333333',99999999.99,'2333333333333333',2147483647,'2024-11-17 16:56:25','2024-11-17 23:51:02',0),(29,'dddddddddd','dddddddddd',1.00,'dddddddddddd',1,'2024-11-17 16:58:42','2024-11-17 23:50:34',0),(30,'test','test ',1.00,'test ',1,'2024-11-17 23:16:40','2024-11-17 23:50:30',0),(31,'test 2','3',3.00,'test 2',3,'2024-11-17 23:24:50','2024-11-17 23:50:26',0),(32,'Naut','ad',1.00,'Naut ',1,'2024-11-17 23:52:59','2024-11-17 23:54:32',0),(33,'Test3','Test numero 3',150.00,'Test3',10,'2024-11-17 23:55:03','2024-11-18 00:01:53',0),(34,'NuevoNombre 1','NuevaDescripcion 1',121.00,'NuevaMarca 1',10,'2024-11-18 00:02:11','2024-11-18 00:53:04',1);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Usuario` varchar(100) NOT NULL,
  `Correo_Electronico` varchar(100) NOT NULL,
  `Contrasena` varchar(255) NOT NULL,
  `Rol` varchar(50) NOT NULL,
  `Fecha_Creacion` datetime DEFAULT current_timestamp(),
  `Activo` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`ID_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Eduin','eduin@mensajeria.com','password123','mensajero','2024-11-18 15:14:19',1),(2,'Eduin','eduin@cliente.com','password123','cliente','2024-11-18 18:14:27',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'smellelegance_db'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_actualizarEntrega` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizarEntrega`(
    IN p_ID_Entrega INT,
    IN p_ID_Pedido INT,
    IN p_Fecha_Entrega DATETIME,
    IN p_Estado_Entrega VARCHAR(50),
    IN p_Direccion_Entrega VARCHAR(255),
    IN p_ID_Responsable_Entrega INT
)
BEGIN
    UPDATE entregas 
    SET ID_Pedido = p_ID_Pedido,
        Fecha_Entrega = p_Fecha_Entrega,
        Estado_Entrega = p_Estado_Entrega,
        Direccion_Entrega = p_Direccion_Entrega,
        ID_Responsable_Entrega = p_ID_Responsable_Entrega
    WHERE ID_Entrega = p_ID_Entrega AND Activo = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_actualizarPago` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizarPago`(
    IN p_ID_Pago INT,
    IN p_Monto_Pagado DECIMAL(10,2),
    IN p_Metodo_Pago VARCHAR(50),
    IN p_Estado_Pago VARCHAR(50)
)
BEGIN
    UPDATE pagos 
    SET Monto_Pagado = p_Monto_Pagado,
        Metodo_Pago = p_Metodo_Pago,
        Estado_Pago = p_Estado_Pago
    WHERE ID_Pago = p_ID_Pago 
    AND Activo = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_actualizarPedido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizarPedido`(
    p_ID_Pedido INT,
    p_Estado_Pedido VARCHAR(50),
    p_Total_Pedido DECIMAL(10,2)
)
UPDATE pedidos 
SET 
    Estado_Pedido = p_Estado_Pedido,
    Total_Pedido = p_Total_Pedido
WHERE ID_Pedido = p_ID_Pedido AND Activo = 1 ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_actualizarProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizarProducto`(
    p_ID_Producto INT,
    p_Nombre VARCHAR(100),
    p_Descripcion TEXT,
    p_Precio DECIMAL(10,2),
    p_Marca VARCHAR(50),
    p_Stock INT
)
UPDATE Productos 
SET 
    Nombre = p_Nombre,
    Descripcion = p_Descripcion,
    Precio = p_Precio,
    Marca = p_Marca,
    Stock_Disponible = p_Stock
WHERE ID_Producto = p_ID_Producto AND Activo = 1 ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_desactivarEntrega` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_desactivarEntrega`(
    IN p_ID_Entrega INT
)
BEGIN
    UPDATE entregas 
    SET Activo = 0
    WHERE ID_Entrega = p_ID_Entrega;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_desactivarPago` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_desactivarPago`(
    IN p_ID_Pago INT
)
BEGIN
    UPDATE pagos 
    SET Activo = 0 
    WHERE ID_Pago = p_ID_Pago;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_desactivarPedido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_desactivarPedido`(
    p_ID_Pedido INT
)
UPDATE pedidos 
SET Activo = 0 
WHERE ID_Pedido = p_ID_Pedido ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_desactivarProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_desactivarProducto`(IN productoID INT)
BEGIN
    UPDATE productos
    SET Activo = 0
    WHERE ID_Producto = productoID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_insertarDetallePedido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarDetallePedido`(
    p_ID_Pedido INT,
    p_ID_Producto INT,
    p_Cantidad INT,
    p_Precio_Unitario DECIMAL(10,2)
)
INSERT INTO detalle_pedidos (
    ID_Pedido,
    ID_Producto,
    Cantidad,
    Precio_Unitario,
    Subtotal
) VALUES (
    p_ID_Pedido,
    p_ID_Producto,
    p_Cantidad,
    p_Precio_Unitario,
    p_Cantidad * p_Precio_Unitario
) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_insertarEntrega` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarEntrega`(
    IN p_ID_Pedido INT,
    IN p_Fecha_Entrega DATETIME,
    IN p_Estado_Entrega VARCHAR(50),
    IN p_Direccion_Entrega VARCHAR(255),
    IN p_ID_Responsable_Entrega INT
)
BEGIN
    INSERT INTO entregas (
        ID_Pedido,
        Fecha_Entrega,
        Estado_Entrega,
        Direccion_Entrega,
        ID_Responsable_Entrega
    ) VALUES (
        p_ID_Pedido,
        p_Fecha_Entrega,
        p_Estado_Entrega,
        p_Direccion_Entrega,
        p_ID_Responsable_Entrega
    );
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_insertarPago` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarPago`(
    IN p_ID_Pedido INT,
    IN p_Monto_Pagado DECIMAL(10,2),
    IN p_Metodo_Pago VARCHAR(50)
)
BEGIN
    INSERT INTO pagos (
        ID_Pedido, 
        Monto_Pagado, 
        Metodo_Pago, 
        Estado_Pago, 
        Activo
    ) VALUES (
        p_ID_Pedido,
        p_Monto_Pagado,
        p_Metodo_Pago,
        'pendiente',
        1
    );
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_insertarPedido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarPedido`(
    p_ID_Cliente INT,
    p_Estado_Pedido VARCHAR(50),
    p_Total_Pedido DECIMAL(10,2)
)
INSERT INTO pedidos (
    ID_Cliente,
    Estado_Pedido,
    Total_Pedido,
    Fecha_Pedido,
    Activo
) VALUES (
    p_ID_Cliente,
    p_Estado_Pedido,
    p_Total_Pedido,
    CURRENT_TIMESTAMP,
    1
) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_insertarProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarProducto`(
    IN p_Nombre VARCHAR(100),
    IN p_Descripcion TEXT,
    IN p_Precio DECIMAL(10, 2),
    IN p_Marca VARCHAR(100),
    IN p_Stock_Disponible INT
)
BEGIN
    INSERT INTO Productos (Nombre, Descripcion, Precio, Marca, Stock_Disponible)
    VALUES (p_Nombre, p_Descripcion, p_Precio, p_Marca, p_Stock_Disponible);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerDetallesPedido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_obtenerDetallesPedido`(
    p_ID_Pedido INT
)
SELECT 
    dp.ID_Detalle_Pedido,
    dp.ID_Producto,
    p.Nombre AS NombreProducto,
    dp.Cantidad,
    dp.Precio_Unitario,
    dp.Subtotal
FROM detalle_pedidos dp
LEFT JOIN productos p ON dp.ID_Producto = p.ID_Producto
WHERE dp.ID_Pedido = p_ID_Pedido ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerEntregaPorID` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_obtenerEntregaPorID`(
    IN p_ID_Entrega INT
)
BEGIN
    SELECT 
        e.*,
        p.Estado_Pedido,
        p.Total_Pedido,
        u.Nombre_Usuario as Responsable_Nombre
    FROM entregas e
    LEFT JOIN pedidos p ON e.ID_Pedido = p.ID_Pedido
    LEFT JOIN usuarios u ON e.ID_Responsable_Entrega = u.ID_Usuario
    WHERE e.ID_Entrega = p_ID_Entrega AND e.Activo = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerPagoPorID` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_obtenerPagoPorID`(
    IN p_ID_Pago INT
)
BEGIN
    SELECT p.*, 
           c.Nombre_Completo as Cliente,
           c.Direccion,
           c.Correo_Electronico,
           pd.Total_Pedido
    FROM pagos p
    LEFT JOIN pedidos pd ON p.ID_Pedido = pd.ID_Pedido
    LEFT JOIN clientes c ON pd.ID_Cliente = c.ID_Cliente
    WHERE p.ID_Pago = p_ID_Pago 
    AND p.Activo = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerPedidoPorID` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_obtenerPedidoPorID`(
    p_ID_Pedido INT
)
SELECT 
    p.ID_Pedido,
    p.ID_Cliente,
    c.Nombre_Completo AS NombreCliente,
    p.Fecha_Pedido,
    p.Estado_Pedido,
    p.Total_Pedido
FROM pedidos p
LEFT JOIN clientes c ON p.ID_Cliente = c.ID_Cliente
WHERE p.ID_Pedido = p_ID_Pedido AND p.Activo = 1 ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerPedidos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_obtenerPedidos`()
SELECT 
    p.ID_Pedido,
    p.ID_Cliente,
    c.Nombre_Completo AS NombreCliente,
    p.Fecha_Pedido,
    p.Estado_Pedido,
    p.Total_Pedido
FROM pedidos p
LEFT JOIN clientes c ON p.ID_Cliente = c.ID_Cliente
WHERE p.Activo = 1
ORDER BY p.Fecha_Pedido DESC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerProductoPorID` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_obtenerProductoPorID`(
    IN p_ID_Producto INT
)
BEGIN
    SELECT * FROM Productos
    WHERE ID_Producto = p_ID_Producto AND Activo = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerTodasLasEntregas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_obtenerTodasLasEntregas`()
BEGIN
    SELECT 
        e.*,
        p.Estado_Pedido,
        p.Total_Pedido,
        u.Nombre_Usuario as Responsable_Nombre
    FROM entregas e
    LEFT JOIN pedidos p ON e.ID_Pedido = p.ID_Pedido
    LEFT JOIN usuarios u ON e.ID_Responsable_Entrega = u.ID_Usuario
    WHERE e.Activo = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerTodosLosPagos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_obtenerTodosLosPagos`()
BEGIN
    SELECT p.*, 
           c.Nombre_Completo as Cliente,
           pd.Total_Pedido
    FROM pagos p
    LEFT JOIN pedidos pd ON p.ID_Pedido = pd.ID_Pedido
    LEFT JOIN clientes c ON pd.ID_Cliente = c.ID_Cliente
    WHERE p.Activo = 1
    ORDER BY p.Fecha_Pago DESC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerTodosLosProductos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_obtenerTodosLosProductos`()
BEGIN
    SELECT Nombre, Descripcion, Precio, Marca, Stock_Disponible
    FROM productos;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-18 19:27:23
