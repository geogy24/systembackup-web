-- MySQL dump 10.16  Distrib 10.1.23-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: backup
-- ------------------------------------------------------
-- Server version	10.1.23-MariaDB

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
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_log` enum('information','error','warning') COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`log_id`),
  KEY `logs_user_id_foreign` (`user_id`),
  CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2119 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1946,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-06-24 04:02:29','2018-06-24 04:02:29'),(1947,'information','Crear directorios','Se crean los directorios de copia',3,'2018-06-24 04:02:29','2018-06-24 04:02:29'),(1948,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-06-24 04:02:29','2018-06-24 04:02:29'),(1949,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-06-24 04:06:48','2018-06-24 04:06:48'),(1950,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-06-24 04:16:54','2018-06-24 04:16:54'),(1951,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-06-24 05:58:43','2018-06-24 05:58:43'),(1952,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-06-25 04:02:32','2018-06-25 04:02:32'),(1953,'information','Crear directorios','Se crean los directorios de copia',3,'2018-06-25 04:02:32','2018-06-25 04:02:32'),(1954,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-06-25 04:02:33','2018-06-25 04:02:33'),(1955,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-06-25 04:08:18','2018-06-25 04:08:18'),(1956,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-06-25 04:18:32','2018-06-25 04:18:32'),(1957,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-06-25 06:15:06','2018-06-25 06:15:06'),(1958,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-06-26 04:02:34','2018-06-26 04:02:34'),(1959,'information','Crear directorios','Se crean los directorios de copia',3,'2018-06-26 04:02:34','2018-06-26 04:02:34'),(1960,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-06-26 04:02:34','2018-06-26 04:02:34'),(1961,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-06-26 04:06:45','2018-06-26 04:06:45'),(1962,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-06-26 04:17:14','2018-06-26 04:17:14'),(1963,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-06-26 06:00:40','2018-06-26 06:00:40'),(1964,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-06-27 04:02:35','2018-06-27 04:02:35'),(1965,'information','Crear directorios','Se crean los directorios de copia',3,'2018-06-27 04:02:35','2018-06-27 04:02:35'),(1966,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-06-27 04:02:36','2018-06-27 04:02:36'),(1967,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-06-27 04:07:52','2018-06-27 04:07:52'),(1968,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-06-27 04:18:24','2018-06-27 04:18:24'),(1969,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-06-27 06:02:31','2018-06-27 06:02:31'),(1970,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-06-28 04:02:37','2018-06-28 04:02:37'),(1971,'information','Crear directorios','Se crean los directorios de copia',3,'2018-06-28 04:02:38','2018-06-28 04:02:38'),(1972,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-06-28 04:02:38','2018-06-28 04:02:38'),(1973,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-06-28 04:07:41','2018-06-28 04:07:41'),(1974,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-06-29 04:02:39','2018-06-29 04:02:39'),(1975,'information','Crear directorios','Se crean los directorios de copia',3,'2018-06-29 04:02:40','2018-06-29 04:02:40'),(1976,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-06-29 04:02:40','2018-06-29 04:02:40'),(1977,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-06-29 04:07:48','2018-06-29 04:07:48'),(1978,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-06-29 04:18:25','2018-06-29 04:18:25'),(1979,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-06-29 06:07:58','2018-06-29 06:07:58'),(1980,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-06-30 04:02:23','2018-06-30 04:02:23'),(1981,'information','Crear directorios','Se crean los directorios de copia',3,'2018-06-30 04:02:24','2018-06-30 04:02:24'),(1982,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-06-30 04:02:24','2018-06-30 04:02:24'),(1983,'information','Configuracion erronea','No existen los directorios configurados',3,'2018-07-03 12:51:35','2018-07-03 12:51:35'),(1984,'information','Configuracion erronea','No existen los directorios configurados',3,'2018-07-03 12:53:49','2018-07-03 12:53:49'),(1985,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-07-03 15:35:01','2018-07-03 15:35:01'),(1986,'information','Crear directorios','Se crean los directorios de copia',3,'2018-07-03 15:35:01','2018-07-03 15:35:01'),(1987,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-07-03 15:35:01','2018-07-03 15:35:01'),(1988,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-07-03 15:40:03','2018-07-03 15:40:03'),(1989,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-07-03 15:50:38','2018-07-03 15:50:38'),(1990,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-07-07 17:39:14','2018-07-07 17:39:14'),(1991,'information','Crear directorios','Se crean los directorios de copia',3,'2018-07-07 17:39:14','2018-07-07 17:39:14'),(1992,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-07-07 17:39:14','2018-07-07 17:39:14'),(1993,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-07-07 17:44:00','2018-07-07 17:44:00'),(1994,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-07-07 17:51:28','2018-07-07 17:51:28'),(1995,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-07-07 21:02:37','2018-07-07 21:02:37'),(1996,'information','Crear directorios','Se crean los directorios de copia',3,'2018-07-07 21:02:37','2018-07-07 21:02:37'),(1997,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-07-07 21:02:37','2018-07-07 21:02:37'),(1998,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-07-13 21:02:51','2018-07-13 21:02:51'),(1999,'information','Crear directorios','Se crean los directorios de copia',3,'2018-07-13 21:02:52','2018-07-13 21:02:52'),(2000,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-07-13 21:02:53','2018-07-13 21:02:53'),(2001,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-07-13 21:08:18','2018-07-13 21:08:18'),(2002,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-07-13 21:19:28','2018-07-13 21:19:28'),(2003,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-07-14 10:09:59','2018-07-14 10:09:59'),(2004,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-07-14 21:02:53','2018-07-14 21:02:53'),(2005,'information','Crear directorios','Se crean los directorios de copia',3,'2018-07-14 21:02:53','2018-07-14 21:02:53'),(2006,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-07-14 21:02:54','2018-07-14 21:02:54'),(2007,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-07-14 21:09:13','2018-07-14 21:09:13'),(2008,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-07-14 21:20:27','2018-07-14 21:20:27'),(2009,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-07-19 21:09:56','2018-07-19 21:09:56'),(2010,'information','Crear directorios','Se crean los directorios de copia',3,'2018-07-19 21:09:57','2018-07-19 21:09:57'),(2011,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-07-19 21:09:57','2018-07-19 21:09:57'),(2012,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-07-19 21:14:30','2018-07-19 21:14:30'),(2013,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-07-19 21:23:16','2018-07-19 21:23:16'),(2014,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-07-20 10:03:04','2018-07-20 10:03:04'),(2015,'information','Crear directorios','Se crean los directorios de copia',3,'2018-07-20 10:03:04','2018-07-20 10:03:04'),(2016,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-07-20 10:03:07','2018-07-20 10:03:07'),(2017,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-07-20 10:09:42','2018-07-20 10:09:42'),(2018,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-07-20 10:20:40','2018-07-20 10:20:40'),(2019,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-07-21 10:03:06','2018-07-21 10:03:06'),(2020,'information','Crear directorios','Se crean los directorios de copia',3,'2018-07-21 10:03:07','2018-07-21 10:03:07'),(2021,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-07-21 10:03:07','2018-07-21 10:03:07'),(2022,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-07-21 10:09:14','2018-07-21 10:09:14'),(2023,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-07-21 10:20:25','2018-07-21 10:20:25'),(2024,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-07-22 10:03:08','2018-07-22 10:03:08'),(2025,'information','Crear directorios','Se crean los directorios de copia',3,'2018-07-22 10:03:09','2018-07-22 10:03:09'),(2026,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-07-22 10:03:09','2018-07-22 10:03:09'),(2027,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-07-22 10:08:08','2018-07-22 10:08:08'),(2028,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-07-22 10:19:11','2018-07-22 10:19:11'),(2029,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-07-22 14:54:55','2018-07-22 14:54:55'),(2030,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-07-23 10:03:11','2018-07-23 10:03:11'),(2031,'information','Crear directorios','Se crean los directorios de copia',3,'2018-07-23 10:03:11','2018-07-23 10:03:11'),(2032,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-07-23 10:03:12','2018-07-23 10:03:12'),(2033,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-07-23 10:08:50','2018-07-23 10:08:50'),(2034,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-07-23 10:20:07','2018-07-23 10:20:07'),(2035,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-07-23 15:45:44','2018-07-23 15:45:44'),(2036,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-07-24 04:03:12','2018-07-24 04:03:12'),(2037,'information','Crear directorios','Se crean los directorios de copia',3,'2018-07-24 04:03:13','2018-07-24 04:03:13'),(2038,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-07-24 04:03:13','2018-07-24 04:03:13'),(2039,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-07-24 04:06:55','2018-07-24 04:06:55'),(2040,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-07-24 04:13:48','2018-07-24 04:13:48'),(2041,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-07-24 09:07:04','2018-07-24 09:07:04'),(2042,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-07-25 04:03:15','2018-07-25 04:03:15'),(2043,'information','Crear directorios','Se crean los directorios de copia',3,'2018-07-25 04:03:15','2018-07-25 04:03:15'),(2044,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-07-25 04:03:15','2018-07-25 04:03:15'),(2045,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-07-25 04:07:07','2018-07-25 04:07:07'),(2046,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-07-25 04:13:30','2018-07-25 04:13:30'),(2047,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-07-25 07:25:31','2018-07-25 07:25:31'),(2048,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-07-26 04:03:17','2018-07-26 04:03:17'),(2049,'information','Crear directorios','Se crean los directorios de copia',3,'2018-07-26 04:03:17','2018-07-26 04:03:17'),(2050,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-07-26 04:03:18','2018-07-26 04:03:18'),(2051,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-07-26 04:07:10','2018-07-26 04:07:10'),(2052,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-07-26 04:13:55','2018-07-26 04:13:55'),(2053,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-07-26 07:22:30','2018-07-26 07:22:30'),(2054,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-07-27 04:03:20','2018-07-27 04:03:20'),(2055,'information','Crear directorios','Se crean los directorios de copia',3,'2018-07-27 04:03:20','2018-07-27 04:03:20'),(2056,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-07-27 04:03:20','2018-07-27 04:03:20'),(2057,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-07-27 04:07:06','2018-07-27 04:07:06'),(2058,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-07-27 04:13:39','2018-07-27 04:13:39'),(2059,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-07-28 04:03:21','2018-07-28 04:03:21'),(2060,'information','Crear directorios','Se crean los directorios de copia',3,'2018-07-28 04:03:21','2018-07-28 04:03:21'),(2061,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-07-28 04:03:21','2018-07-28 04:03:21'),(2062,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-07-28 04:06:59','2018-07-28 04:06:59'),(2063,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-07-28 04:13:31','2018-07-28 04:13:31'),(2064,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-07-28 07:15:58','2018-07-28 07:15:58'),(2065,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-07-29 04:03:23','2018-07-29 04:03:23'),(2066,'information','Crear directorios','Se crean los directorios de copia',3,'2018-07-29 04:03:23','2018-07-29 04:03:23'),(2067,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-07-29 04:03:24','2018-07-29 04:03:24'),(2068,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-07-29 04:06:44','2018-07-29 04:06:44'),(2069,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-07-29 04:13:08','2018-07-29 04:13:08'),(2070,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-07-29 06:53:52','2018-07-29 06:53:52'),(2071,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-07-30 04:03:25','2018-07-30 04:03:25'),(2072,'information','Crear directorios','Se crean los directorios de copia',3,'2018-07-30 04:03:26','2018-07-30 04:03:26'),(2073,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-07-30 04:03:26','2018-07-30 04:03:26'),(2074,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-07-30 04:07:17','2018-07-30 04:07:17'),(2075,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-07-30 04:13:54','2018-07-30 04:13:54'),(2076,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-07-30 06:50:50','2018-07-30 06:50:50'),(2077,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-07-31 04:03:28','2018-07-31 04:03:28'),(2078,'information','Crear directorios','Se crean los directorios de copia',3,'2018-07-31 04:03:28','2018-07-31 04:03:28'),(2079,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-07-31 04:03:28','2018-07-31 04:03:28'),(2080,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-07-31 04:07:32','2018-07-31 04:07:32'),(2081,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-07-31 04:14:10','2018-07-31 04:14:10'),(2082,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-07-31 07:09:40','2018-07-31 07:09:40'),(2083,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-08-01 04:03:31','2018-08-01 04:03:31'),(2084,'information','Crear directorios','Se crean los directorios de copia',3,'2018-08-01 04:03:31','2018-08-01 04:03:31'),(2085,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-08-01 04:03:31','2018-08-01 04:03:31'),(2086,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-08-01 04:07:36','2018-08-01 04:07:36'),(2087,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-08-01 04:14:12','2018-08-01 04:14:12'),(2088,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-08-01 07:19:27','2018-08-01 07:19:27'),(2089,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-08-02 04:03:33','2018-08-02 04:03:33'),(2090,'information','Crear directorios','Se crean los directorios de copia',3,'2018-08-02 04:03:34','2018-08-02 04:03:34'),(2091,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-08-02 04:03:34','2018-08-02 04:03:34'),(2092,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-08-02 04:07:33','2018-08-02 04:07:33'),(2093,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-08-02 04:14:15','2018-08-02 04:14:15'),(2094,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-08-02 07:19:50','2018-08-02 07:19:50'),(2095,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-08-03 04:03:34','2018-08-03 04:03:34'),(2096,'information','Crear directorios','Se crean los directorios de copia',3,'2018-08-03 04:03:34','2018-08-03 04:03:34'),(2097,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-08-03 04:03:34','2018-08-03 04:03:34'),(2098,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-08-03 04:07:10','2018-08-03 04:07:10'),(2099,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-08-03 04:14:03','2018-08-03 04:14:03'),(2100,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-08-03 07:45:25','2018-08-03 07:45:25'),(2101,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-08-04 04:03:37','2018-08-04 04:03:37'),(2102,'information','Crear directorios','Se crean los directorios de copia',3,'2018-08-04 04:03:37','2018-08-04 04:03:37'),(2103,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-08-04 04:03:38','2018-08-04 04:03:38'),(2104,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-08-04 04:08:04','2018-08-04 04:08:04'),(2105,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-08-04 04:15:10','2018-08-04 04:15:10'),(2106,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-08-04 07:44:00','2018-08-04 07:44:00'),(2107,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-08-05 04:03:39','2018-08-05 04:03:39'),(2108,'information','Crear directorios','Se crean los directorios de copia',3,'2018-08-05 04:03:42','2018-08-05 04:03:42'),(2109,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-08-05 04:03:43','2018-08-05 04:03:43'),(2110,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-08-05 04:07:18','2018-08-05 04:07:18'),(2111,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-08-05 04:14:00','2018-08-05 04:14:00'),(2112,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-08-05 07:02:47','2018-08-05 07:02:47'),(2113,'information','Obtener elementos','Se obtienen los elementos a copiar',3,'2018-08-06 04:03:41','2018-08-06 04:03:41'),(2114,'information','Crear directorios','Se crean los directorios de copia',3,'2018-08-06 04:03:42','2018-08-06 04:03:42'),(2115,'information','Copiar elementos','Se copia los elementos en los directorios de copia',3,'2018-08-06 04:03:42','2018-08-06 04:03:42'),(2116,'information','Comprimir archivos','Se comprimen los elementos',3,'2018-08-06 04:08:12','2018-08-06 04:08:12'),(2117,'information','Cargar archivo de copia','Se carga el archivo de copia generado',3,'2018-08-06 04:15:14','2018-08-06 04:15:14'),(2118,'information','Eliminar copias locales','Se eliminan los directorios locales de copia',3,'2018-08-06 07:51:02','2018-08-06 07:51:02');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2013_05_12_035225_create_users_type_table',1),('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2017_06_19_182423_create_logs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `business` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_user_type_id_foreign` (`user_type_id`),
  CONSTRAINT `users_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `users_type` (`user_type_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'MXhmlGVZ1K','admin@admin.com','$2y$10$bdxet2rsT67Y6DrqS.olaOWMIud4E2rM0cS6KYIDXZC8CwES9ai6y','',1,'lNjCIoKOOwlyfyA1r8xSIp5KxTcY25BNszJrgJu4CMHGNEQhFXIBHD4VFPjs',NULL,'2017-12-11 14:41:28'),(2,'7oxGFOFN99','cliente@cliente.com','$2y$10$lc/gCXtiXj9YsACGPlexzOzgfKnUcbmqrq.Bd3X51JjmYbN249BIi','prueba',2,'K8PKYMIiWYnImbDpfoxMCin8LF9aaZgK0IGGduk8HIahhmN0K8PnLVqH100K',NULL,'2017-12-11 14:45:58'),(3,'Oscar Alejandro Betancourt','almapaisas@hotmail.com','$2y$10$eDeQMrHPJO8MHt4XJmFfkObHawduWvIZfyp24Yg6WrlkAUcgPpsCO','almapaisa',2,'zsP7dBPAPEWgrmJk0MjF60jXfFRDDLcba7X6GZf7mm1V1CThThYDf6wwJzEh','2017-06-28 16:39:23','2017-07-10 19:41:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_type`
--

DROP TABLE IF EXISTS `users_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_type` (
  `user_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_type`
--

LOCK TABLES `users_type` WRITE;
/*!40000 ALTER TABLE `users_type` DISABLE KEYS */;
INSERT INTO `users_type` VALUES (1,'admin',NULL,NULL),(2,'client',NULL,NULL);
/*!40000 ALTER TABLE `users_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-06 14:22:55
