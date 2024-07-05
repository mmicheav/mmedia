-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: megamedia
-- ------------------------------------------------------
-- Server version	8.0.23

DROP schema IF EXISTS `megamedia`;
CREATE schema megamedia;
USE megamedia;

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
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `creator_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_news_fk_idx` (`creator_id`),
  CONSTRAINT `user_news_fk` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Bus estuvo a punto de caer al mar en Puerto Montt: Conductor tuvo que ser rescatado en bote','La mala maniobra de un conductor de un bus pudo haber terminado en tragedia, ya que mientras intentaba subir a un transbordador perdió el control del vehículo y estuvo a punto de caer al mar.\nEl incidente ocurrió en la caleta La Arena de Puerto Montt, región de Los Lagos, cuando la máquina de la empresa Los Navegadores comenzó a deslizarse por la rampa hasta quedar con la parte delantera sumergida en el agua.','2024-07-05 02:07:17',1),(2,'Reajustes al Subsidio Único y Asignación Familiar avanzan en el Congreso','La Cámara de Diputados devolvió al Senado, para que curse su tercer trámite, un proyecto de ley que contempla un paquete de beneficios económicos para los sectores más vulnerables del país. \nLa iniciativa reajusta los valores del Subsidio Único Familiar (SUF) y la Asignación Familiar (AF); e inyecta recursos al Fondo de Estabilización de Precios del Petróleo (FEEP).\nAdemás, contemplaba la reactivación del aporte pagado a través del Bolsillo Familiar Electrónico por los meses de invierno de 2024, sin embargo, este no alcanzó el quórum requerido para su votación. \nComo consecuencia de ello, el Senado deberá evaluar ahora si respalda dicha decisión o si opta por enviar el tema a una comisión mixta.','2024-07-05 02:07:17',1);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `creator_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_notes_fk_idx` (`creator_id`),
  CONSTRAINT `user_notes_fk` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (1,'Lanzamiento de la Nueva Plataforma Web de Educación en Línea','En un esfuerzo por transformar la educación y hacerla accesible para todos, se ha lanzado una innovadora plataforma web de educación en línea. Esta plataforma, diseñada con tecnología de última generación, ofrece una amplia gama de cursos en diversas disciplinas, desde ciencias y tecnología hasta arte y humanidades.\n\nCon un enfoque en la flexibilidad y la calidad, la plataforma permite a los estudiantes aprender a su propio ritmo, en cualquier momento y desde cualquier lugar. Los cursos están diseñados por expertos en la materia y ofrecen recursos interactivos, como videos, cuestionarios y foros de discusión, para enriquecer la experiencia de aprendizaje.\n\n\"Estamos emocionados de presentar esta nueva herramienta educativa que tiene el potencial de cambiar la forma en que las personas acceden a la educación\", dijo el CEO de la empresa. \"Nuestro objetivo es proporcionar una educación de alta calidad que sea accesible para todos, sin importar su ubicación geográfica o situación económica\".\n\nLa plataforma también incluye características para apoyar a los educadores, como herramientas de seguimiento del progreso de los estudiantes y opciones para personalizar el contenido del curso. Con esta iniciativa, se espera llegar a miles de estudiantes en todo el mundo y ofrecerles las habilidades y el conocimiento que necesitan para tener éxito en sus carreras y en la vida.\n\nPara más información, visite el sitio web oficial de la plataforma.','2024-07-05 04:25:46',1),(4,'Avances en la Investigación de Energía Renovable','En un esfuerzo por abordar los desafíos del cambio climático y la sostenibilidad energética, se han logrado avances significativos en la investigación de energía renovable. Un equipo de científicos ha desarrollado una nueva tecnología que promete revolucionar la captura y almacenamiento de energía solar de manera más eficiente y económica que nunca antes.\r\n\r\nEsta innovadora tecnología utiliza materiales avanzados y técnicas de captura optimizadas para maximizar la conversión de la luz solar en energía utilizable. Los primeros resultados de los ensayos han demostrado un aumento significativo en la eficiencia energética, lo que podría tener un impacto positivo en la reducción de las emisiones de carbono y en la transición hacia una economía más limpia y sostenible.\r\n\r\n\"Estamos entusiasmados con el potencial de esta tecnología para transformar el panorama energético global\", dijo el líder del equipo de investigación. \"Nuestro objetivo es llevar esta tecnología al mercado lo antes posible para que pueda beneficiar a comunidades y empresas en todo el mundo\".\r\n\r\nAdemás de la captura de energía solar, el equipo está explorando nuevas fronteras en la energía eólica y la bioenergía, buscando soluciones innovadoras que puedan complementar y diversificar las fuentes de energía renovable disponibles.\r\n\r\nPara más detalles sobre estos avances y su impacto potencial, se invita a visitar el sitio web oficial del proyecto.','2024-07-05 05:20:15',1);
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'megamedia','$2y$10$pNsdAM.3I0uWWH3LQ2niyuLKkF/rX4zD.QDUnKoaTmLzUe6qUixdO','2024-07-05 02:05:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-05  1:46:19
