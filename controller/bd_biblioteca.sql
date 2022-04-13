/*drop database biblioteca;*/
CREATE DATABASE  IF NOT EXISTS `biblioteca` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `biblioteca`;
-- MySQL dump 10.13  Distrib 8.0.24, for Win64 (x86_64)
--
-- Host: localhost    Database: biblioteca
-- ------------------------------------------------------
-- Server version	8.0.24

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
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autor` (
  `id_autor` int NOT NULL AUTO_INCREMENT,
  `nome_autor` varchar(35) NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor`
--

LOCK TABLES `autor` WRITE;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cadast_taxa`
--

DROP TABLE IF EXISTS `cadast_taxa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cadast_taxa` (
  `id_taxa` int NOT NULL AUTO_INCREMENT,
  `data_ins` date NOT NULL,
  `valor` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id_taxa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cadast_taxa`
--

LOCK TABLES `cadast_taxa` WRITE;
/*!40000 ALTER TABLE `cadast_taxa` DISABLE KEYS */;
/*!40000 ALTER TABLE `cadast_taxa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cobranca`
--

DROP TABLE IF EXISTS `cobranca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cobranca` (
  `id_cobr` int NOT NULL AUTO_INCREMENT,
  `valor_total` decimal(3,2) NOT NULL,
  `num_dia` int NOT NULL,
  `valor_dia` decimal(12,2) NOT NULL,
  `qtd_livro` int NOT NULL,
  `id_taxa` int NOT NULL,
  `cod_user` int NOT NULL,
  PRIMARY KEY (`id_cobr`),
  KEY `cod_taxa_idx` (`id_taxa`),
  KEY `taxa_user_idx` (`cod_user`),
  CONSTRAINT `cod_taxa` FOREIGN KEY (`id_taxa`) REFERENCES `cadast_taxa` (`id_taxa`),
  CONSTRAINT `taxa_user` FOREIGN KEY (`cod_user`) REFERENCES `usuario` (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cobranca`
--

LOCK TABLES `cobranca` WRITE;
/*!40000 ALTER TABLE `cobranca` DISABLE KEYS */;
/*!40000 ALTER TABLE `cobranca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livro` (
  `id_livro` int NOT NULL AUTO_INCREMENT,
  `nome_livro` varchar(30) NOT NULL,
  `num_pag` int NOT NULL,
  `ano_lanc` date NOT NULL,
  `editora` varchar(45) NOT NULL,
  `resumo` varchar(100) NOT NULL,
  `idioma` varchar(25) NOT NULL,
  `capa` varchar(300) NULL,
  `qtd_livro` int default 0,
  PRIMARY KEY (`id_livro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Dumping data for table `livro`
--

LOCK TABLES `livro` WRITE;
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro_autor`
--

DROP TABLE IF EXISTS `livro_autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livro_autor` (
  `id_livro` int NOT NULL,
  `id_autor` int NOT NULL,
  PRIMARY KEY (`id_livro`),
  KEY `fk_id_autor` (`id_autor`),
  CONSTRAINT `fk_id_autor` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`),
  CONSTRAINT `rl_livro_autor` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro_autor`
--

LOCK TABLES `livro_autor` WRITE;
/*!40000 ALTER TABLE `livro_autor` DISABLE KEYS */;
/*!40000 ALTER TABLE `livro_autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserv_liv`
--

DROP TABLE IF EXISTS `reserv_liv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reserv_liv` (
  `cpf_user` int NOT NULL,
  `id_reserva` int NOT NULL,
  `id_livro` int DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `fk_reserv_idlivro` (`id_livro`),
  KEY `reserv_user_idx` (`cod_user`),
  CONSTRAINT `fk_reserv_idlivro` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`),
  CONSTRAINT `fk_reserva` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`),
  CONSTRAINT `reserv_user` FOREIGN KEY (`cod_user`) REFERENCES `usuario` (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `reserv_liv`
--

LOCK TABLES `reserv_liv` WRITE;
/*!40000 ALTER TABLE `reserv_liv` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserv_liv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reserva` (
  `id_reserva` int NOT NULL AUTO_INCREMENT,
  `cpf_user` int NOT NULL,
  `nome_livro` varchar(45) NOT NULL,
  data_reserva date NOT NULL,
  PRIMARY KEY (`id_reserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `cpf` int(11) NOT NULL,
  `user_nome` varchar(50) NOT NULL,
  `senha_user` varchar(100) NOT NULL,
  `tipo_user` int NOT NULL,
  `dataNasc` date NOT NULL,
  `email` varchar(35) NOT NULL,
  `rua` varchar(25) NOT NULL,
  `num` int NOT NULL,
  `cep` int NOT NULL,
  `cidade` varchar(35) NOT NULL,
  `bairro` varchar(35) NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS emprestimo;
CREATE TABLE emprestimo (
  id_emp int NOT NULL AUTO_INCREMENT,
  retirada date NOT NULL,
  devolucao date NOT NULL,
  max_livro int NOT NULL,
  PRIMARY KEY (id_emp)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS emp_liv;
CREATE TABLE emp_liv (
  id_emp int NOT NULL,
  id_livro int NOT NULL,
  cod_user int NOT NULL,
  PRIMARY KEY (id_emp),
  KEY livr (id_livro),
  KEY emp_user_idx (cod_user),
  CONSTRAINT emp_user FOREIGN KEY (cod_user) REFERENCES usuario (cpf),
  CONSTRAINT emprest FOREIGN KEY (id_emp) REFERENCES emprestimo (id_emp),
  CONSTRAINT livr FOREIGN KEY (id_livro) REFERENCES livro (id_livro)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'biblioteca'
--

--
-- Dumping routines for database 'biblioteca'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-05 21:54:26


select * from livro_autor;
select * from livro order by id_livro;
select * from reserva;
select * from livro;
select * from usuario;

INSERT INTO  livro_autor (id_livro, id_autor) values (1, 1);

delete from usuario where cpf=8228;


INSERT INTO `biblioteca`.`livro_autor` (`id_livro`, `id_autor`) VALUES ('7', '1');
INSERT INTO `biblioteca`.`livro_autor` (`id_livro`, `id_autor`) VALUES ('8', '1');
INSERT INTO `biblioteca`.`livro_autor` (`id_livro`, `id_autor`) VALUES ('9', '1');

SELECT * from livro inner join livro_autor on livro.id_livro = livro_autor.id_livro inner join autor on livro_autor.id_autor = autor.id_autor;

SELECT * from livro inner join livro_autor on livro.id_livro = livro_autor.id_livro inner join autor on livro_autor.id_autor = autor.id_autor where livro.id_livro = 1 order by livro.nome_livro;

INSERT INTO reserva(id_reserva, cpf_user, nome_livro, data_reserva) values (null, 123, 'te darei a lua', CURDATE());
INSERT INTO reserv_liv(cpf_user, id_reserva, id_livro) values (123, 1, 1);

SELECT * from reserva inner join reserv_liv on reserva.id_reserva =  reserv_liv.id_reserva inner join livro on reserv_liv.id_livro = livro.id_livro 
inner join usuario on usuario.cpf = reserv_liv.cpf_user;

SELECT qtd_livro from livro where id_livro = 1;
SELECT count(*) as total from reserva where nome_livro = 'te darei a lua';