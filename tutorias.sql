-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: tutoriasittg
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
-- DATABASE CREATION
-- NOTE: CHANGE THE NAME OF THE DB IF IS REQUIRED

-- CREATE DATABASE tutoriasittg;
-- USE tutoriasittg;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'student',NULL,NULL),(2,'tutor',NULL,NULL),(3,'department_manager',NULL,NULL),(4,'coordinator',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `second_lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_nc_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'X0HgrHluP4','2TeRmHrBRc','hzRde0jA51','vdeqihhRBR','BX4DjTjlXR@gmail.com','myVJ5yqGoq','/img/avatars/default.png','bp51pmEp8I',NULL,NULL,NULL),(2,'MKfG3mZ9lk','lMSYqtwTat','II9xpRb3EI','4iRFtbD5sH','ZlP3nqn7uJ@gmail.com','smsCC39keT','/img/avatars/default.png','SBFFyWG3ac',NULL,NULL,NULL),(3,'lsFnhoXkLB','tP7h7kZVYR','6Nhd5RIt9j','HwAlFmy4mS','Wnsz9Hlhox@gmail.com','nOSyaBy1ML','/img/avatars/default.png','Mbo9mZpa5X',NULL,NULL,NULL),(4,'13270550','IJGOVvoSwt','ORZsWtQAjl','FvGxRMQold','jefe1@gmail.com','U1lUEg1jVm','/img/avatars/default.png','$2y$10$.bdtCgjlKnF4H2QfOg5gA.Hsch7bCGC4mix1VjDKt1D1dUZ.revyu',NULL,NULL,NULL),(5,'13270551','g56cgaGcN9','3t0gkyFAMC','O0Z3uRFwZc','coord1@gmail.com','wbKMD9bjah','/img/avatars/default.png','$2y$10$7n8Ek3IIcuPzwXvxYjRUG.cuhbWfhBK02SWyNxX5gL8eac2AGEnaS',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
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
  `created_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `semesters`
--

DROP TABLE IF EXISTS `semesters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semesters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semesters`
--

LOCK TABLES `semesters` WRITE;
/*!40000 ALTER TABLE `semesters` DISABLE KEYS */;
INSERT INTO `semesters` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL),(3,3,NULL,NULL),(4,4,NULL,NULL),(5,5,NULL,NULL),(6,6,NULL,NULL),(7,7,NULL,NULL),(8,8,NULL,NULL),(9,9,NULL,NULL);
/*!40000 ALTER TABLE `semesters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `careers`
--

DROP TABLE IF EXISTS `careers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `careers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `careers`
--

LOCK TABLES `careers` WRITE;
/*!40000 ALTER TABLE `careers` DISABLE KEYS */;
INSERT INTO `careers` VALUES (1,'AsOckXNM5Y',NULL,NULL),(2,'Sistemas Computacionales',NULL,NULL),(3,'Electrica',NULL,NULL),(4,'Electronica',NULL,NULL),(5,'Quimica',NULL,NULL),(6,'Mecanica',NULL,NULL),(7,'Industrial',NULL,NULL),(8,'Gestion Empresarial',NULL,NULL);
/*!40000 ALTER TABLE `careers` ENABLE KEYS */;
UNLOCK TABLES;



--
-- Table structure for table `coordinators`
--

DROP TABLE IF EXISTS `coordinators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coordinators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `coordinators_user_id_foreign` (`user_id`),
  CONSTRAINT `coordinators_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coordinators`
--

LOCK TABLES `coordinators` WRITE;
/*!40000 ALTER TABLE `coordinators` DISABLE KEYS */;
INSERT INTO `coordinators` VALUES (1,2,NULL,NULL),(2,5,NULL,NULL);
/*!40000 ALTER TABLE `coordinators` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `department_managers`
--

DROP TABLE IF EXISTS `department_managers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department_managers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `department_managers_user_id_foreign` (`user_id`),
  CONSTRAINT `department_managers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department_managers`
--

LOCK TABLES `department_managers` WRITE;
/*!40000 ALTER TABLE `department_managers` DISABLE KEYS */;
INSERT INTO `department_managers` VALUES (1,1,NULL,NULL),(2,4,NULL,NULL);
/*!40000 ALTER TABLE `department_managers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periods`
--

DROP TABLE IF EXISTS `periods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `period` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periods`
--

LOCK TABLES `periods` WRITE;
/*!40000 ALTER TABLE `periods` DISABLE KEYS */;
INSERT INTO `periods` VALUES (1,'ENE-JUN','2017',NULL,NULL),(2,'AGO-DIC','2017',NULL,NULL);
/*!40000 ALTER TABLE `periods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutors`
--

DROP TABLE IF EXISTS `tutors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `department_manager_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tutors_user_id_foreign` (`user_id`),
  KEY `tutors_department_manager_id_foreign` (`department_manager_id`),
  CONSTRAINT `tutors_department_manager_id_foreign` FOREIGN KEY (`department_manager_id`) REFERENCES `department_managers` (`id`),
  CONSTRAINT `tutors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutors`
--

LOCK TABLES `tutors` WRITE;
/*!40000 ALTER TABLE `tutors` DISABLE KEYS */;
INSERT INTO `tutors` VALUES (1,3,1,NULL,NULL);
/*!40000 ALTER TABLE `tutors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tutor_id` int(10) unsigned NOT NULL,
  `period_id` int(10) unsigned NOT NULL,
  `coordinator_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `groups_tutor_id_foreign` (`tutor_id`),
  KEY `groups_period_id_foreign` (`period_id`),
  KEY `groups_coordinator_id_foreign` (`coordinator_id`),
  CONSTRAINT `groups_coordinator_id_foreign` FOREIGN KEY (`coordinator_id`) REFERENCES `coordinators` (`id`),
  CONSTRAINT `groups_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`),
  CONSTRAINT `groups_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'RfCUx0C0pw',1,1,1,NULL,NULL);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `semester_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activities_semester_id_foreign` (`semester_id`),
  CONSTRAINT `activities_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES (1,'Actividad 1 - LLenado de ficha de indentificación del tutorado.','/pdf/semestre_1/actividad_1.docx','LLenar todos los campos.',1,NULL,NULL),(2,'Actividad 2 - La línea de la vida.','/pdf/semestre_1/actividad_2.pdf','OBJETIVO: Observar tu vida como si fueras una persona ajena a ella, con el fin de identificar patrones y etapas (capítulos) de tu vida hasta el día de hoy. Cada participante describa su desarrollo o su trayectoria personal en el tiempo; es decir, marcará los sucesos desde su nacimiento hasta el día de la aplicación y como estos eventos han sido representativos para el en su vida.',1,NULL,NULL),(3,'Actividad 3 - Análisis FODA.','/pdf/semestre_1/actividad_3.pdf','OBJETIVO:\n                Identifica lo que tiene que construir en el siguiente capítulo de tu vida. Toma conciencia de qué recursos, capacidades y cualidades conforman tus fortalezas principales.',1,NULL,NULL),(4,'Actividad 4 - Administración de tiempo.','/pdf/semestre_1/actividad_4.pdf','Es una herramienta para conocer la situación real y actual en que se encuentra una persona, organización, empresa o proyecto analizando sus características internas (Debilidades y Fortalezas) y su situación externa (Amenazas y Oportunidades) y planificar una estrategia de mejora a futuro.',1,NULL,NULL),(5,'Actividad 5 - Desarrollo humano integral (Dimensión física).','/pdf/semestre_1/actividad_5.pdf','Realizar las actividades del documento.',1,NULL,NULL),(6,'Actividad 6 - Desarrollo humano integral (Dimensión cognitiva).','/pdf/semestre_1/actividad_6.pdf','Realizar las actividades del documento.',1,NULL,NULL),(7,'Actividad 7 - Habilidades de estudio efectivo.','/pdf/semestre_1/actividad_7.pdf','Realizar las actividades del documento.',1,NULL,NULL),(8,'Actividad 8 - La memoria.','/pdf/semestre_1/actividad_8.pdf','Realizar las actividades del documento.',1,NULL,NULL),(9,'Actividad 9 - Habilidades básicas de pensamiento.','/pdf/semestre_1/actividad_9.pdf','Realizar las actividades del documento.',1,NULL,NULL),(10,'Actividad 10 - Actividad Integradora.','/pdf/semestre_1/actividad_10.pdf','Realizar las actividades del documento.',1,NULL,NULL);
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `period_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `career_id` int(10) unsigned NOT NULL,
  `semester_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `students_period_id_foreign` (`period_id`),
  KEY `students_group_id_foreign` (`group_id`),
  KEY `students_user_id_foreign` (`user_id`),
  KEY `students_career_id_foreign` (`career_id`),
  KEY `students_semester_id_foreign` (`semester_id`),
  CONSTRAINT `students_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`),
  CONSTRAINT `students_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE SET NULL,
  CONSTRAINT `students_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`),
  CONSTRAINT `students_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`),
  CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `observations`
--

DROP TABLE IF EXISTS `observations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `observations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_date` datetime DEFAULT NULL,
  `homework_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `observations_homework_id_foreign` (`homework_id`),
  CONSTRAINT `observations_homework_id_foreign` FOREIGN KEY (`homework_id`) REFERENCES `activity_student_teacher` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `observations`
--

LOCK TABLES `observations` WRITE;
/*!40000 ALTER TABLE `observations` DISABLE KEYS */;
/*!40000 ALTER TABLE `observations` ENABLE KEYS */;
UNLOCK TABLES;


-- aqui
-- Table structure for table `activity_student_teacher`
--

DROP TABLE IF EXISTS `activity_student_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_student_teacher` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned NOT NULL,
  `activity_id` int(10) unsigned NOT NULL,
  `tutor_id` int(10) unsigned NOT NULL,
  `group_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `activity_student_teacher_student_id_foreign` (`student_id`),
  KEY `activity_student_teacher_activity_id_foreign` (`activity_id`),
  KEY `activity_student_teacher_tutor_id_foreign` (`tutor_id`),
  CONSTRAINT `activity_student_teacher_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`),
  CONSTRAINT `activity_student_teacher_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  CONSTRAINT `activity_student_teacher_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_student_teacher`
--

LOCK TABLES `activity_student_teacher` WRITE;
/*!40000 ALTER TABLE `activity_student_teacher` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity_student_teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activity_tutor`
--

DROP TABLE IF EXISTS `activity_tutor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_tutor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `activity_id` int(10) unsigned NOT NULL,
  `tutor_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `finish_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_tutor_activity_id_foreign` (`activity_id`),
  KEY `activity_tutor_tutor_id_foreign` (`tutor_id`),
  KEY `activity_tutor_group_id_foreign` (`group_id`),
  CONSTRAINT `activity_tutor_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`),
  CONSTRAINT `activity_tutor_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  CONSTRAINT `activity_tutor_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_tutor`
--

LOCK TABLES `activity_tutor` WRITE;
/*!40000 ALTER TABLE `activity_tutor` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity_tutor` ENABLE KEYS */;
UNLOCK TABLES;




--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_01_09_190108_create_roles_table',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2017_01_10_180633_create_semesters_table',1),(5,'2017_01_10_183300_create_careers_table',1),(6,'2017_01_10_191005_create_coordinators_table',1),(7,'2017_01_10_191751_create_department_managers_table',1),(8,'2017_01_10_191842_create_periods_table',1),(9,'2017_01_10_191937_create_tutors_table',1),(10,'2017_01_10_191938_create_groups_table',1),(11,'2017_01_10_192020_create_activities_table',1),(12,'2017_01_10_192635_create_students_table',1),(13,'2017_01_16_205259_rename_nc_column_to_username_on_users',1),(14,'2017_01_17_012038_create_observations_table',1),(15,'2017_01_17_015653_add_status_column_to_homework',1),(16,'2017_01_20_215949_create_role_user_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;



--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,3,NULL,NULL),(2,2,4,NULL,NULL),(3,3,2,NULL,NULL),(4,4,3,NULL,NULL),(5,5,4,NULL,NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;





-- Dump completed on 2017-08-29 13:47:38
