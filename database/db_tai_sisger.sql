-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para db_tai_sisger
CREATE DATABASE IF NOT EXISTS `db_tai_sisger` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */;
USE `db_tai_sisger`;

-- Copiando estrutura para tabela db_tai_sisger.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `cpf` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `municipio_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK1_cliente_municipio` (`municipio_id`),
  CONSTRAINT `FK1_cliente_municipio` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela db_tai_sisger.locacao
CREATE TABLE IF NOT EXISTS `locacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) DEFAULT NULL,
  `veiculo_id` int(11) DEFAULT NULL,
  `data_retirada` date DEFAULT NULL,
  `hora_retirada` time DEFAULT NULL,
  `data_devolucao` date DEFAULT NULL,
  `hora_devolucao` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK1_locacao_cliente_id` (`cliente_id`),
  KEY `FK2_locacao_veiculo_id` (`veiculo_id`),
  CONSTRAINT `FK1_locacao_cliente_id` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  CONSTRAINT `FK2_locacao_veiculo_id` FOREIGN KEY (`veiculo_id`) REFERENCES `veiculo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela db_tai_sisger.multa
CREATE TABLE IF NOT EXISTS `multa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) DEFAULT NULL,
  `veiculo_id` int(11) DEFAULT NULL,
  `locacao_id` int(11) DEFAULT NULL,
  `custo` double DEFAULT NULL,
  `data_multa` date DEFAULT NULL,
  `hora_multa` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK1_multa_cliente_id` (`cliente_id`),
  KEY `FK2_multa_veiculo_id` (`veiculo_id`),
  KEY `FK3_multa_locacao_id` (`locacao_id`),
  CONSTRAINT `FK1_multa_cliente_id` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  CONSTRAINT `FK2_multa_veiculo_id` FOREIGN KEY (`veiculo_id`) REFERENCES `veiculo` (`id`),
  CONSTRAINT `FK3_multa_locacao_id` FOREIGN KEY (`locacao_id`) REFERENCES `locacao` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela db_tai_sisger.municipio
CREATE TABLE IF NOT EXISTS `municipio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `uf` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `estado` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela db_tai_sisger.veiculo
CREATE TABLE IF NOT EXISTS `veiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) DEFAULT NULL,
  `placa` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `tipo_veiculo` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `fabricante` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `modelo` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK1_veiculo_cliente_id` (`cliente_id`),
  CONSTRAINT `FK1_veiculo_cliente_id` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Exportação de dados foi desmarcado.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
