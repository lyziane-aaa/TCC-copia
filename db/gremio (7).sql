-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Mar-2021 às 13:04
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gremio`
--
CREATE DATABASE IF NOT EXISTS `gremio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gremio`;

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_fardas_enc` ()  BEGIN
       DELETE FROM fardas_encomendas WHERE data_encomenda < CURRENT_DATE()-3;
     END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `achados`
--

CREATE TABLE `achados` (
  `id_achados` int(6) NOT NULL,
  `nome_achados` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `descricao_achados` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `gremista_recebeu_achados` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `quando_achados` date NOT NULL,
  `onde_achados` varchar(55) COLLATE utf8_swedish_ci DEFAULT NULL,
  `quem_reivindicou_achados` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `cpf_matricula_achados` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `gremista_devolveu_achados` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `postado_achados` varchar(4) COLLATE utf8_swedish_ci DEFAULT NULL,
  `status_achados` varchar(30) COLLATE utf8_swedish_ci DEFAULT NULL,
  `img_achados` varchar(240) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `achados`
--

INSERT INTO `achados` (`id_achados`, `nome_achados`, `descricao_achados`, `gremista_recebeu_achados`, `quando_achados`, `onde_achados`, `quem_reivindicou_achados`, `cpf_matricula_achados`, `gremista_devolveu_achados`, `postado_achados`, `status_achados`, `img_achados`) VALUES
(1, 'Objeto', 'SDFDSF', 'AA', '2021-01-01', 'CC', '', 'DDD', 'DDD', 'NÃ£o', 'Aguardando', 'img_achados/qrcode.png'),
(3, 'Dignidade deaaaaa - 0', '0 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '0 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(4, 'Dignidade deaaaaa - 1', '1 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '1 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(5, 'Dignidade deaaaaa - 2', '2 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '2 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(6, 'Dignidade deaaaaa - 3', '3 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '3 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(7, 'Dignidade deaaaaa - 4', '4 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '4 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(8, 'Dignidade deaaaaa - 5', '5 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '5 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(9, 'Dignidade deaaaaa - 6', '6 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '6 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(10, 'Dignidade deaaaaa - 7', '7 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '7 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(11, 'Dignidade deaaaaa - 8', '8 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '8 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(12, 'Dignidade deaaaaa - 9', '9 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '9 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(13, 'Dignidade deaaaaa - 10', '10 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '10 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(14, 'Dignidade deaaaaa - 11', '11 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '11 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(15, 'Dignidade deaaaaa - 12', '12 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '12 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(16, 'Dignidade deaaaaa - 13', '13 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '13 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(17, 'Dignidade deaaaaa - 14', '14 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '14 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(18, 'Dignidade deaaaaa - 15', '15 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '15 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(19, 'Dignidade deaaaaa - 16', '16 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '16 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(20, 'Dignidade deaaaaa - 17', '17 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '17 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(21, 'Dignidade deaaaaa - 18', '18 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '18 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(22, 'Dignidade deaaaaa - 19', '19 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '19 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(23, 'Dignidade deaaaaa - 20', '20 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '20 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(24, 'Dignidade deaaaaa - 21', '21 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '21 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(25, 'Dignidade deaaaaa - 22', '22 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '22 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(26, 'Dignidade deaaaaa - 23', '23 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '23 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(27, 'Dignidade deaaaaa - 24', '24 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '24 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(28, 'Dignidade deaaaaa - 25', '25 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '25 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(29, 'Dignidade deaaaaa - 26', '26 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '26 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(30, 'Dignidade deaaaaa - 27', '27 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '27 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(31, 'Dignidade deaaaaa - 28', '28 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '28 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf'),
(32, 'Dignidade deaaaaa - 29', '29 teste', 'Lucas Felipe', '2021-03-05', 'Gabinete da Diretoria', '', '29 - 123456', 'Toinha', 'Sim', 'Devolvido', 'img_achados/documento gilberto (1).pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bimestrebc`
--

CREATE TABLE `bimestrebc` (
  `id_bim_bc` int(9) NOT NULL,
  `nome_bim_bc` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `bimestreinicio_bim_bc` timestamp NULL DEFAULT NULL,
  `bimestrefim_bim_bc` timestamp NULL DEFAULT NULL,
  `registro_bimestre_bim_bc` timestamp NOT NULL DEFAULT current_timestamp(),
  `gremista_registrou_bim_bc` varchar(120) COLLATE utf8_swedish_ci NOT NULL,
  `bimestre_vigor_bim_bc` tinyint(1) NOT NULL,
  `bimestre_vigor_data_bim_bc` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `bimestrebc`
--

INSERT INTO `bimestrebc` (`id_bim_bc`, `nome_bim_bc`, `bimestreinicio_bim_bc`, `bimestrefim_bim_bc`, `registro_bimestre_bim_bc`, `gremista_registrou_bim_bc`, `bimestre_vigor_bim_bc`, `bimestre_vigor_data_bim_bc`) VALUES
(1, '2017.2', '2020-09-16 03:00:00', '2020-09-18 03:00:00', '2020-09-27 16:16:05', 'Lucas', 0, '2020-09-26 19:48:44'),
(2, '2018.2', '2020-09-16 03:00:00', '2020-09-30 03:00:00', '2020-09-27 16:16:05', 'Lucas', 0, '2021-02-04 21:12:36'),
(3, 'lucas', '0000-00-00 00:00:00', NULL, '2020-09-27 17:07:16', 'Lucas', 0, '2020-09-27 17:05:34'),
(4, '2017', '2020-09-10 17:09:59', '2020-09-18 17:09:59', '2020-09-27 17:10:30', 'Lucas', 0, '2020-09-27 17:10:30'),
(9, '2019.2', '2020-09-26 03:00:00', '2020-11-07 03:00:00', '2020-09-27 17:49:42', 'Lyz', 0, '2020-09-27 17:49:42'),
(10, '2020.2', '2020-09-28 03:00:00', '2020-11-02 03:00:00', '2020-09-27 18:11:16', 'Lyz', 0, '2020-09-27 18:11:16'),
(11, '2020.2', '2021-02-01 03:00:00', '2021-02-28 03:00:00', '2021-02-04 18:54:58', 'Lucas Felipe Carlos ', 0, '2021-02-04 18:54:58'),
(12, '2020.3', '2021-02-01 03:00:00', '2021-02-28 03:00:00', '2021-02-04 18:55:13', 'Lucas Felipe Carlos ', 0, '2021-02-04 18:55:13'),
(13, '2021.25', '2021-02-11 03:00:00', '2021-02-19 03:00:00', '2021-02-04 18:58:27', 'Lucas Felipe Carlos ', 0, '2021-02-04 18:58:27'),
(14, '2028.80', '2021-02-02 03:00:00', '2021-02-25 03:00:00', '2021-02-04 19:00:51', 'Lucas Felipe Carlos do Nascimento', 0, '2021-02-07 21:47:38'),
(15, '1917.5', '2019-01-01 03:00:00', '2019-02-04 03:00:00', '2021-02-04 21:22:00', 'Lucas Felipe Carlos do Nascimento', 0, '2021-02-04 21:22:06'),
(16, '2021.2', '2021-02-08 03:00:00', '2021-02-09 03:00:00', '2021-02-07 21:48:00', 'Lyziane Nogueira', 1, '2021-02-07 21:48:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bolsacopia`
--

CREATE TABLE `bolsacopia` (
  `id_bc` int(5) NOT NULL,
  `nome_bc` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `matricula_bc` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `laudas_bc` int(5) DEFAULT NULL,
  `ultima_data_bc` datetime(6) NOT NULL COMMENT 'Data da última impressão'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `bolsacopia`
--

INSERT INTO `bolsacopia` (`id_bc`, `nome_bc`, `matricula_bc`, `laudas_bc`, `ultima_data_bc`) VALUES
(1, 'Lucas Felipe', '20171024010009', 2, '2021-03-04 20:07:29.000000'),
(2, 'Lucas Felipe a', '222222', 6, '2021-03-04 20:07:41.000000'),
(3, 'Lucas Felipeaaaa', '2222222', 2, '2021-03-04 20:07:51.000000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos_ata`
--

CREATE TABLE `documentos_ata` (
  `id_doc_ata` int(6) NOT NULL,
  `num_doc_ata` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL COMMENT 'Número da ata',
  `titulo_doc_ata` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL COMMENT 'Título da Reunião (ex.? Reunião Ordinária, Reunião Extraordinária)',
  `convoc_doc_ata` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Quem convocou a reunião, seguido do cargo',
  `sec_doc_ata` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Quem secretariou a reunião, seguido do cargo',
  `tipo_doc_ata` varchar(100) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Se é deliberativa ou informativa',
  `data_reuniao_doc_ata` varchar(100) COLLATE utf8_swedish_ci DEFAULT 'NULL' COMMENT 'Data em que a reunião aconteceu',
  `horario_doc_ata` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Horário de início e de término',
  `local_doc_ata` varchar(200) COLLATE utf8_swedish_ci DEFAULT 'NULL' COMMENT 'Local onde foi realizada a reunião',
  `pautas_doc_ata` text COLLATE utf8_swedish_ci DEFAULT 'NULL' COMMENT 'Pautas da reunião',
  `enc_doc_ata` text COLLATE utf8_swedish_ci DEFAULT 'NULL' COMMENT 'Encaminhamentos tomados',
  `presentes_doc_ata` text COLLATE utf8_swedish_ci DEFAULT 'NULL' COMMENT 'Lista de presentes na reunião',
  `corpo_doc_ata` mediumtext COLLATE utf8_swedish_ci DEFAULT 'NULL' COMMENT 'Corpo da ata',
  `autor_doc_ata` varchar(200) COLLATE utf8_swedish_ci DEFAULT 'NULL' COMMENT 'Quem lavrou a ata',
  `orgao_doc_ata` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Se a ata é do CRC, CRT ou GEVP',
  `matricula_doc_ata` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL COMMENT 'Matrícula de quem fez',
  `cargo_doc_ata` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `data_registro_ata` datetime DEFAULT NULL COMMENT 'Data em que o documento foi gerado.',
  `gremista_registro_ata` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL COMMENT 'Usuário do gremista que fez a ata',
  `assinaturas_doc_ata` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Lista de assinaturas, se houver'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `documentos_ata`
--

INSERT INTO `documentos_ata` (`id_doc_ata`, `num_doc_ata`, `titulo_doc_ata`, `convoc_doc_ata`, `sec_doc_ata`, `tipo_doc_ata`, `data_reuniao_doc_ata`, `horario_doc_ata`, `local_doc_ata`, `pautas_doc_ata`, `enc_doc_ata`, `presentes_doc_ata`, `corpo_doc_ata`, `autor_doc_ata`, `orgao_doc_ata`, `matricula_doc_ata`, `cargo_doc_ata`, `data_registro_ata`, `gremista_registro_ata`, `assinaturas_doc_ata`) VALUES
(2, '1/2021', 'Ata 1/2021 -Assembleia Ordinária', '', '', 'Assembleia', 'MossorÃ³, 13 de maio de 2021', '', 'Deliberativa', '1\r\n2\r\n3', 'etrthtrytry\r\nye\r\nyer\r\ny\r\ne\r\nyer', 'tye\r\nty\r\ner\r\nye\r\ny\r\ne\r\ntyer\r\nye\r\ntr', '<p>uuuuuuuuuuuuuuuuuuuuuuuuuuuu</p>\r\n', 'Lucas Felipe Carlos do Nascimento', '', '20171024010009', 'SecretÃ¡rio-geral', '0000-00-00 00:00:00', 'lucas', 'assinaturas_doc_ata/Lista Ata de Assembleia OrdinÃ¡ria-Ata nÂº 1_2021.png'),
(3, '2/2021', 'Ata 2/2021 -Assembleia Ordinária', '', '', 'Assembleia', 'Mossoró, 13 de maio de 2021', '', 'Deliberativa', 'dsdsad', 'dsdsd\r\nsd\r\ns\r\nd\r\nsd\r\nsd\r\n', 'fs\r\nf\r\ns\r\nfs\r\nf\r\ns\r\nfs', '<p>fssffdsfddasgfadsfasdf</p>\r\n', 'Lucas Felipe Carlos do Nascimento', '', '20171024010009', 'Secretário-geral', '0000-00-00 00:00:00', 'lucas', 'assinaturas_doc_ata/Lista Ata de Assembleia Ordinária-Ata nº 1_2021.png'),
(4, '3/2021', 'Ata 3/2021 - Reunião CRT Ordinária', '213', 'Deliberativa', '', 'Mossoró, 08 de maio de 20212', '213213', 'Plataforma Virtual Google Meet', '123', '213213', '1231', '<p>213123213</p>\r\n', 'Lucas Felipe Carlos do Nascimento', 'CRT', '20171024010009', 'Secretário-geral', '0000-00-00 00:00:00', 'lucas', 'assinaturas_doc_ata/Lista Ata 3_2021 - Reunião CRT Ordinária-3_2021.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos_ata_ass`
--

CREATE TABLE `documentos_ata_ass` (
  `id_doc_ata_ass` int(6) NOT NULL,
  `num_doc_ata_ass` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL COMMENT 'Número da ata',
  `titulo_doc_ata_ass` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL COMMENT 'Título da Reunião (ex.? Reunião Ordinária, Reunião Extraordinária)',
  `convoc_doc_ata_ass` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Quem convocou a reunião, seguido do cargo',
  `sec_doc_ata_ass` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Quem secretariou a reunião, seguido do cargo',
  `tipo_doc_ata_ass` varchar(100) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Se é deliberativa ou informativa',
  `data_reuniao_doc_ata_ass` varchar(100) COLLATE utf8_swedish_ci DEFAULT 'NULL' COMMENT 'Data em que a reunião aconteceu',
  `horario_doc_ata_ass` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Horário de início e de término',
  `local_doc_ata_ass` varchar(200) COLLATE utf8_swedish_ci DEFAULT 'NULL' COMMENT 'Local onde foi realizada a reunião',
  `pautas_doc_ata_ass` text COLLATE utf8_swedish_ci DEFAULT '\'NULL\'' COMMENT 'Pautas da reunião',
  `enc_doc_ata_ass` text COLLATE utf8_swedish_ci DEFAULT '\'NULL\'' COMMENT 'Encaminhamentos tomados',
  `presentes_doc_ata_ass` text COLLATE utf8_swedish_ci DEFAULT '\'NULL\'' COMMENT 'Lista de presentes na reunião',
  `corpo_doc_ata_ass` mediumtext COLLATE utf8_swedish_ci DEFAULT '\'NULL\'' COMMENT 'Corpo da ata',
  `autor_doc_ata_ass` varchar(200) COLLATE utf8_swedish_ci DEFAULT 'NULL' COMMENT 'Quem lavrou a ata',
  `orgao_doc_ata_ass` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Se a ata é do CRC, CRT ou GEVP',
  `matricula_doc_ata_ass` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL COMMENT 'Matrícula de quem fez',
  `cargo_doc_ata_ass` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `data_registro_ata_ass` datetime DEFAULT NULL COMMENT 'Data em que o documento foi gerado.',
  `gremista_registro_ata_ass` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL COMMENT 'Usuário do gremista que fez a ata',
  `assinaturas_doc_ata_ass` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Lista de assinaturas, se houver'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos_ofc`
--

CREATE TABLE `documentos_ofc` (
  `id_doc_ofc` int(6) NOT NULL,
  `titulo_doc_ofc` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `num_doc_ofc` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `data_doc_ofc` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `endrc_doc_ofc` text COLLATE utf8_swedish_ci NOT NULL,
  `assunto_doc_ofc` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `corpo_doc_ofc` mediumtext COLLATE utf8_swedish_ci NOT NULL COMMENT 'Texto em si, pode conter mais de uma página',
  `fecho_doc_ofc` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `autor_doc_ofc` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `matricula_doc_ofc` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `cargo_doc_ofc` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `data_registro_ofc` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Data de registro do campo',
  `gremista_registro_ofc` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci COMMENT='Tabela para guardar documentos tipo ofício';

--
-- Extraindo dados da tabela `documentos_ofc`
--

INSERT INTO `documentos_ofc` (`id_doc_ofc`, `titulo_doc_ofc`, `num_doc_ofc`, `data_doc_ofc`, `endrc_doc_ofc`, `assunto_doc_ofc`, `corpo_doc_ofc`, `fecho_doc_ofc`, `autor_doc_ofc`, `matricula_doc_ofc`, `cargo_doc_ofc`, `data_registro_ofc`, `gremista_registro_ofc`) VALUES
(9, 'OFÍCIO Nº 2/2021/DIEXE/GEVP', '2/2021', 'Mossoró, 05 de março de 2021.', 'À\r\nCoordenação de Comunicação Social e Eventos\r\nInstituto Federal de Educação, Ciência e Tecnologia do \r\nRio Grande do Norte - Câmpus Mossoró', 'Solenidade de Formatura e a Nota 1/2021-Asce/IFRN', '<p style=\"text-align:justify; text-indent:50px\">Considerando o seguinte trecho da nota t&eacute;cnica publicada no Portal IFRN: &ldquo;As formaturas e certifica&ccedil;&otilde;es n&atilde;o ser&atilde;o realizadas de forma on-line em raz&atilde;o do n&uacute;mero de estudantes envolvidos e das limita&ccedil;&otilde;es t&eacute;cnicas das ferramentas dispon&iacute;veis.&rdquo;;</p>\r\n\r\n<p style=\"text-align:justify; text-indent:50px\">Considerando a legitimidade do Gr&ecirc;mio Estudantil Valdemar dos P&aacute;ssaros, enquanto entidade m&aacute;xima de representa&ccedil;&atilde;o dos estudantes secundaristas do Campus Mossor&oacute;;</p>\r\n\r\n<p style=\"text-align:justify; text-indent:50px\">gostar&iacute;amos de nos reunir virtualmente com o setor para discutir a quest&atilde;o da solenidade de formatura, a partir da nossa realidade local, &nbsp;junto com os estudantes concluintes.</p>\r\n\r\n<p style=\"text-align:justify; text-indent:50px\">Esperamos pela sugest&atilde;o de data e hor&aacute;rio o mais breve poss&iacute;vel e sugerimos o <em>Google Meet</em> como plataforma para a reuni&atilde;o por sua praticidade em rela&ccedil;&atilde;o ao <em>Microsoft Teams</em>.</p>\r\n', 'Atenciosamente,', 'LUCAS FELIPE CARLOS DO NASCIMENTO', '20171024010009', 'Secretário-geral', '2021-03-05 20:19:44', 'lucas'),
(10, 'OFÍCIO Nº 3/2021/DIEXE/GEVP', '3/2021', 'Mossoró, 09 de março de 2021.', 'Ao Magnífico Senhor\r\nJosé Arnóbio de Araújo Filho\r\nReitor\r\nIFRN', 'Reunião da REGIF', '<p style=\"text-indent:50px\">Senhor diretor,</p>\r\n\r\n<p style=\"text-indent:50px\">gostar&iacute;amos de solicitar uma reuni&atilde;o.</p>\r\n\r\n<p style=\"text-indent:50px\"><img alt=\"\" src=\"/TCC/documentos/img-oficios/files/WhatsApp%20Image%202021-03-09%20at%2017_48_28.jpeg\" style=\"height:281px; width:500px\" /></p>\r\n\r\n<p style=\"text-indent:50px\">pipdsfgkdsfngs</p>\r\n\r\n<p style=\"text-indent:50px\"><strong>aaaaa</strong></p>\r\n\r\n<p style=\"text-indent:50px\"><strong><em>aaaaaaaaaaaaa</em></strong></p>\r\n\r\n<ol>\r\n	<li style=\"text-indent: 50px;\">s</li>\r\n	<li style=\"text-indent: 50px;\">s</li>\r\n	<li style=\"text-indent: 50px;\">s</li>\r\n	<li style=\"text-indent: 50px;\">s</li>\r\n	<li style=\"text-indent: 50px;\">s</li>\r\n</ol>\r\n', 'Saudações estudantis,', 'LUCAS FELIPE CARLOS DO NASCIMENTO', '20171024010009', 'Secretário-geral', '2021-03-09 22:03:24', 'lucas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos_port`
--

CREATE TABLE `documentos_port` (
  `id_doc_port` int(6) NOT NULL,
  `num_doc_port` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `titulo_doc_port` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Título da Portaria',
  `resumo_doc_port` text COLLATE utf8_swedish_ci NOT NULL COMMENT 'Resumo da Portari',
  `texto_doc_port` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `autor_doc_port` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Nome de quem criou a portaria. Não é chave estrangeira porque a Portaria continuará a existir depois que a tabela usuarios for truncada em razão da troca de gestão',
  `cargo_doc_port` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Não é chave estrangeira porque a Portaria continuará a existir depois que a tabela usuarios for truncada em razão da troca de gestão',
  `data_registro_port` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Data de geração do documento',
  `gremista_registro_port` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `assinada_doc_port` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `documentos_port`
--

INSERT INTO `documentos_port` (`id_doc_port`, `num_doc_port`, `titulo_doc_port`, `resumo_doc_port`, `texto_doc_port`, `autor_doc_port`, `cargo_doc_port`, `data_registro_port`, `gremista_registro_port`, `assinada_doc_port`) VALUES
(3, '2/2021', 'PORTARIA Nº 2/2021, DE 15 DE FEVEREIRO DE 2021.', 'e\r\ne\r\ne\r\ne\r\n', '<p>ss</p>\r\n\r\n<p>s</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>s</p>\r\n\r\n<p>s</p>\r\n\r\n<p>s</p>\r\n', 'Lucas Felipe Carlos do Nascimento', 'Secretário-geral', '2021-02-15 15:48:48', 'lucas', 0),
(4, '3/2021', 'PORTARIA Nº 3/2021, DE 15 DE FEVEREIRO DE 2021.', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaa', '<p>aa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>a</p>\r\n', 'Lucas Felipe Carlos do Nascimento', 'Secretário-geral', '2021-02-15 16:28:02', 'lucas', 0),
(5, '4/2021', 'PORTARIA Nº 4/2021, DE 02 DE MARÇO DE 2021.', 'ewrwer', '<p>werwer</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-02 13:57:19', 'lucas', 0),
(6, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:13', 'lucas', 0),
(7, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:14', 'lucas', 0),
(8, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:37', 'lucas', 0),
(9, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:45', 'lucas', 0),
(10, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:48', 'lucas', 0),
(11, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:49', 'lucas', 0),
(12, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:49', 'lucas', 0),
(13, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:49', 'lucas', 0),
(14, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:49', 'lucas', 0),
(15, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:49', 'lucas', 0),
(16, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:49', 'lucas', 0),
(17, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:49', 'lucas', 0),
(18, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:49', 'lucas', 0),
(19, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:50', 'lucas', 0),
(20, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:50', 'lucas', 0),
(21, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:50', 'lucas', 0),
(22, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:50', 'lucas', 0),
(23, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:50', 'lucas', 0),
(24, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:50', 'lucas', 0),
(25, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:50', 'lucas', 0),
(26, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:50', 'lucas', 0),
(27, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:50', 'lucas', 0),
(28, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:50', 'lucas', 0),
(29, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:51', 'lucas', 0),
(30, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:51', 'lucas', 0),
(31, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:51', 'lucas', 0),
(32, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:51', 'lucas', 0),
(33, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:51', 'lucas', 0),
(34, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:51', 'lucas', 0),
(35, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:51', 'lucas', 0),
(36, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:52', 'lucas', 0),
(37, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:52', 'lucas', 0),
(38, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:52', 'lucas', 0),
(39, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:52', 'lucas', 0),
(40, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:52', 'lucas', 0),
(41, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:52', 'lucas', 0),
(42, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:52', 'lucas', 0),
(43, '5/2021', 'PORTARIA Nº 5/2021, DE 06 DE MARÇO DE 2021.', 'AAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'LUCAS FELIPE CARLOS DO NASCIMENTO', 'Secretário-geral', '2021-03-06 23:21:53', 'lucas', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `id_emp` int(6) NOT NULL,
  `obj_emp` int(6) NOT NULL COMMENT 'Nome do objeto emprestado',
  `nome_emp` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Quem pegou emprestado',
  `matricula_emp` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Matrícula de quem pegou emprestado',
  `condicao_emp` varchar(20) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Se foi emprestado novo, normal ou desgastado',
  `gremista_emp` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Que gremista emprestou',
  `data_emp` datetime NOT NULL COMMENT 'Data e hora de quando foi emprestado',
  `data_dev` datetime DEFAULT NULL COMMENT 'Data de devolução',
  `gremista_dev` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL COMMENT 'Gremista que pegou de volta',
  `concluido_emp` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Se o empréstimo foi concluído ou se ainda está em empréstimo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fardas_encomendas`
--

CREATE TABLE `fardas_encomendas` (
  `id_fardas_enc` int(6) NOT NULL,
  `nome_fardas_enc` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `matricula_fardas_enc` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `telefone_fardas_enc` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `tamanho_fardas_enc` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `qnt_fardas_enc` int(2) NOT NULL,
  `data_encomenda` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `fardas_encomendas`
--

INSERT INTO `fardas_encomendas` (`id_fardas_enc`, `nome_fardas_enc`, `matricula_fardas_enc`, `telefone_fardas_enc`, `tamanho_fardas_enc`, `qnt_fardas_enc`, `data_encomenda`) VALUES
(6, 'Luca', '134', '4', 'P-BL', 6, '2021-02-25 20:31:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fardas_lote`
--

CREATE TABLE `fardas_lote` (
  `id_fardas_lote` int(6) NOT NULL,
  `fornecedor_lote` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `data_receb_lote` date NOT NULL,
  `vigente_lote` tinyint(1) NOT NULL,
  `fornecedor_telefone_lote` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `preco_un_fornecedor` int(6) NOT NULL COMMENT 'Preço unitário da farda comparada ao fornecedor.',
  `lucro_gremio_un` float NOT NULL COMMENT 'Lucro do grêmio por unidade (Ex.: 35 a farda, 5 desses 35 é o lucro do grêmio',
  `preco_farda_lote` int(6) NOT NULL,
  `qnt_pp_lote` int(3) NOT NULL,
  `qnt_p_lote` int(3) NOT NULL,
  `qnt_m_lote` int(3) NOT NULL,
  `qnt_g_lote` int(3) NOT NULL,
  `qnt_gg_lote` int(3) NOT NULL,
  `qnt_pp_bl_lote` int(6) NOT NULL,
  `qnt_p_bl_lote` int(6) NOT NULL,
  `qnt_m_bl_lote` int(6) NOT NULL,
  `qnt_g_bl_lote` int(6) NOT NULL,
  `qnt_gg_bl_lote` int(6) NOT NULL,
  `gremista_cadastro_lote` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `data_cadastro_lote` datetime NOT NULL COMMENT 'Data em que o lote foi inserido no sistema',
  `data_prestou_contas` datetime DEFAULT NULL,
  `repasse_previsto_fornecedor` int(6) DEFAULT NULL,
  `lucro_gremio_previsto_lote` int(6) DEFAULT NULL,
  `montante_total_previsto` float NOT NULL COMMENT 'Soma do lucro previstro do grêmio com o repasse previsto para o fornecedor',
  `qnt_p_vend_lote` int(11) DEFAULT NULL,
  `qnt_pp_vend_lote` int(3) DEFAULT NULL,
  `qnt_m_vend_lote` varchar(45) COLLATE utf8_swedish_ci DEFAULT NULL,
  `qnt_g_vend_lote` int(3) DEFAULT NULL,
  `qnt_gg_vend_lote` int(3) DEFAULT NULL,
  `qnt_pp_bl_vend_lote` int(3) NOT NULL,
  `qnt_p_bl_vend_lote` int(3) NOT NULL,
  `qnt_m_bl_vend_lote` int(3) NOT NULL,
  `qnt_g_bl_vend_lote` int(3) NOT NULL,
  `qnt_gg_bl_vend_lote` int(3) NOT NULL,
  `lucro_gremio_efetivo_lote` int(6) DEFAULT NULL COMMENT 'Lucro que o grêmio efetivamente recebeu',
  `prestou_contas` tinyint(4) DEFAULT 0,
  `encerramento_lote` date DEFAULT NULL,
  `recibo_lote` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Recibo da prestação de contas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `fardas_lote`
--

INSERT INTO `fardas_lote` (`id_fardas_lote`, `fornecedor_lote`, `data_receb_lote`, `vigente_lote`, `fornecedor_telefone_lote`, `preco_un_fornecedor`, `lucro_gremio_un`, `preco_farda_lote`, `qnt_pp_lote`, `qnt_p_lote`, `qnt_m_lote`, `qnt_g_lote`, `qnt_gg_lote`, `qnt_pp_bl_lote`, `qnt_p_bl_lote`, `qnt_m_bl_lote`, `qnt_g_bl_lote`, `qnt_gg_bl_lote`, `gremista_cadastro_lote`, `data_cadastro_lote`, `data_prestou_contas`, `repasse_previsto_fornecedor`, `lucro_gremio_previsto_lote`, `montante_total_previsto`, `qnt_p_vend_lote`, `qnt_pp_vend_lote`, `qnt_m_vend_lote`, `qnt_g_vend_lote`, `qnt_gg_vend_lote`, `qnt_pp_bl_vend_lote`, `qnt_p_bl_vend_lote`, `qnt_m_bl_vend_lote`, `qnt_g_bl_vend_lote`, `qnt_gg_bl_vend_lote`, `lucro_gremio_efetivo_lote`, `prestou_contas`, `encerramento_lote`, `recibo_lote`) VALUES
(2, 'Maresia', '2020-12-23', 1, '84991466655', 35, 5, 0, 20, 20, 30, 10, 10, 10, 10, 5, 5, 0, 'Lucas Felipe Carlos do Nascimento', '2021-02-28 14:44:43', NULL, 4200, 600, 4800, 2, 3, '3', 0, 5, 0, 0, 0, 0, 0, NULL, 1, '2021-03-19', 'Recibo do Lote 2 encerrado em 2021-03-19.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fardas_vendidas`
--

CREATE TABLE `fardas_vendidas` (
  `id_fardas` int(6) NOT NULL,
  `nome_fardas` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Nome de quem comprou',
  `matricula_fardas` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `tamanho_fardas` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `preco_fardas` int(6) NOT NULL,
  `fornecedor_fardas` int(6) NOT NULL,
  `lote_fardas` int(6) NOT NULL,
  `recibo_fardas` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `gremista_vendeu` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `data_vendeu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `fardas_vendidas`
--

INSERT INTO `fardas_vendidas` (`id_fardas`, `nome_fardas`, `matricula_fardas`, `tamanho_fardas`, `preco_fardas`, `fornecedor_fardas`, `lote_fardas`, `recibo_fardas`, `gremista_vendeu`, `data_vendeu`) VALUES
(162, 'Eduardo Marinho', '20171024010009', 'G', 2, 2, 2, 'Recibo Farda G de 20171024010009 - 01_03_2021 às 21h10min45s.pdf', 'Lucas Felipe Carlos do Nascimento', '2021-03-01 21:10:45'),
(163, 'Eduardo Marinho', '20171024010009', 'G', 2, 2, 2, 'Recibo Farda G de 20171024010009 - 01_03_2021 às 21h10min45s.pdf', 'Lucas Felipe Carlos do Nascimento', '2021-03-01 21:10:45'),
(164, 'Eduardo Marinho', '20171024010009', 'G', 2, 2, 2, 'Recibo Farda G de 20171024010009 - 01_03_2021 às 21h10min45s.pdf', 'Lucas Felipe Carlos do Nascimento', '2021-03-01 21:10:46'),
(165, 'Eduardo Marinho', '20171024010009', 'G', 2, 2, 2, 'Recibo Farda G de 20171024010009 - 01_03_2021 às 21h10min45s.pdf', 'Lucas Felipe Carlos do Nascimento', '2021-03-01 21:10:46'),
(166, 'Eduardo Marinho', '20171024010009', 'GG', 2, 2, 2, 'Recibo Farda GG de 20171024010009 - 01_03_2021 às 22h01min14s.pdf', 'Lucas Felipe Carlos do Nascimento', '2021-03-01 22:01:14'),
(167, 'Eduardo Marinho', '20171024010009', 'GG', 2, 2, 2, 'Recibo Farda GG de 20171024010009 - 01_03_2021 às 22h01min14s.pdf', 'Lucas Felipe Carlos do Nascimento', '2021-03-01 22:01:14'),
(168, 'Eduardo Marinho', '20171024010009', 'GG', 2, 2, 2, 'Recibo Farda GG de 20171024010009 - 01_03_2021 às 22h01min14s.pdf', 'Lucas Felipe Carlos do Nascimento', '2021-03-01 22:01:14'),
(169, 'Eduardo Marinho', '20171024010009', 'GG', 2, 2, 2, 'Recibo Farda GG de 20171024010009 - 01_03_2021 às 22h01min14s.pdf', 'Lucas Felipe Carlos do Nascimento', '2021-03-01 22:01:14'),
(170, 'Eduardo Marinho', '20171024010009', 'GG', 2, 2, 2, 'Recibo Farda GG de 20171024010009 - 01_03_2021 às 22h01min14s.pdf', 'Lucas Felipe Carlos do Nascimento', '2021-03-01 22:01:14'),
(173, 'Luca', '134', 'PP', 2, 2, 2, 'Recibo Farda PP de 134 - 07_03_2021 às 12h20min36s.pdf', 'Lucas Felipe Carlos do Nascimento', '2021-03-07 12:20:36'),
(174, 'Luca', '134', 'PP', 2, 2, 2, 'Recibo Farda PP de 134 - 07_03_2021 às 12h20min36s.pdf', 'Lucas Felipe Carlos do Nascimento', '2021-03-07 12:20:36'),
(175, 'Luca', '134', 'PP', 2, 2, 2, 'Recibo Farda PP de 134 - 07_03_2021 às 12h20min36s.pdf', 'Lucas Felipe Carlos do Nascimento', '2021-03-07 12:20:36'),
(176, 'Lucas', '222222222222222', 'M', 2, 2, 2, 'Recibo Farda M de 222222222222222 - 07_03_2021 às 12h27min39s.pdf', 'Lucas Felipe Carlos do Nascimento', '2021-03-07 12:27:39'),
(177, 'Lucas', '222222222222222', 'M', 2, 2, 2, 'Recibo Farda M de 222222222222222 - 07_03_2021 às 12h27min39s.pdf', 'Lucas Felipe Carlos do Nascimento', '2021-03-07 12:27:39'),
(178, 'Lucas', '222222222222222', 'M', 2, 2, 2, 'Recibo Farda M de 222222222222222 - 07_03_2021 às 12h27min39s.pdf', 'Lucas Felipe Carlos do Nascimento', '2021-03-07 12:27:40'),
(179, 'Luca', '134', 'P', 2, 2, 2, 'Recibo Farda P de 134 - 09_03_2021 às 19h12min44s.jpeg', 'Lucas Felipe Carlos do Nascimento', '2021-03-09 19:12:44'),
(180, 'Luca', '134', 'P', 2, 2, 2, 'Recibo Farda P de 134 - 09_03_2021 às 19h12min44s.jpeg', 'Lucas Felipe Carlos do Nascimento', '2021-03-09 19:12:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `patrimonioativo`
--

CREATE TABLE `patrimonioativo` (
  `id_pat` int(5) NOT NULL,
  `nome_pat` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `cod_barras_pat` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `obtencao_pat` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `custo_obt` int(10) NOT NULL,
  `obs_pat` text COLLATE utf8_swedish_ci DEFAULT NULL,
  `status_pat` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `emprestado_pat` tinyint(1) NOT NULL,
  `gremista_cadastro_pat` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Gremista que cadastrou o patrimônio',
  `data_cad_pat` timestamp NULL DEFAULT current_timestamp(),
  `emprestavel` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Se o patrimônio é emprestável ou não.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `patrimonioativo`
--

INSERT INTO `patrimonioativo` (`id_pat`, `nome_pat`, `cod_barras_pat`, `obtencao_pat`, `custo_obt`, `obs_pat`, `status_pat`, `emprestado_pat`, `gremista_cadastro_pat`, `data_cad_pat`, `emprestavel`) VALUES
(52, 'â', '24236', 'Aguardando', 24235435, '34534', '', 0, '', '2020-12-17 15:51:54', 0),
(53, 'carro', '2423644444', 'Doação', 0, '325342523452345', '', 0, '', '2021-01-30 17:26:52', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `patrimoniobaixa`
--

CREATE TABLE `patrimoniobaixa` (
  `id_pat_baixa` int(6) NOT NULL,
  `nome_pat_baixa` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `cod_barras_pat_baixa` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `obtencao_pat_baixa` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `custo_obt_baixa` int(10) NOT NULL,
  `obs_pat_baixa` text COLLATE utf8_swedish_ci DEFAULT NULL,
  `gremista_cadastro_pat` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Quem cadastrou o patrimônio originalmente',
  `data_obt_baixa` date NOT NULL,
  `data_baixa` datetime NOT NULL DEFAULT current_timestamp(),
  `motivo_baixa` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `gremista_baixa` varchar(200) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tesouraria_balanco`
--

CREATE TABLE `tesouraria_balanco` (
  `id_caixa` int(10) NOT NULL,
  `total_caica` float NOT NULL,
  `data_caixa` datetime NOT NULL,
  `ultima_ent_caixa` int(10) NOT NULL,
  `ultima_out_caixa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tesouraria_entradas`
--

CREATE TABLE `tesouraria_entradas` (
  `id_tes_ent` int(10) NOT NULL,
  `origem_tes_ent` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `motivo_test_ent` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `qnt_tes_ent` float NOT NULL,
  `data_tes_ent` datetime NOT NULL,
  `gremista_registro_tes_ent` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `tipo_tes_ent` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `recibo_tes_ent` varchar(200) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tesouraria_saidas`
--

CREATE TABLE `tesouraria_saidas` (
  `id_tes_out` int(10) NOT NULL,
  `destino_tes_out` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `creditado_test_out` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `qnt_tes_out` float NOT NULL,
  `tipo_tes_out` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `data_tes_out` datetime NOT NULL,
  `gremista_registro_tes_out` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `recibo_test_out` varchar(200) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(6) NOT NULL,
  `login` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `senha` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `nome_usuarios` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `cargo` int(6) DEFAULT NULL,
  `gestao` int(6) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `matricula_usuarios` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `telefone` varchar(40) COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `nivel` int(1) DEFAULT NULL,
  `data_registro` datetime DEFAULT NULL,
  `gremista_registro` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `gremista_update` datetime DEFAULT NULL,
  `data_update` datetime DEFAULT NULL,
  `inicio_gestao_usu` int(6) DEFAULT NULL,
  `vencimento_gestao_usu` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `login`, `senha`, `nome_usuarios`, `cargo`, `gestao`, `data_nascimento`, `matricula_usuarios`, `telefone`, `email`, `nivel`, `data_registro`, `gremista_registro`, `gremista_update`, `data_update`, `inicio_gestao_usu`, `vencimento_gestao_usu`) VALUES
(1, 'eduardo', '202cb962ac59075b964b07152d234b70', 'Eduardo Marinho de Paiva', 6, 46, '0000-00-00', '20171024010025', '(84) 9146-6655', 'lucas.carlos@academico.ifrn.edu.br', 2, NULL, '\r\nNotice:  Undefined variable: gremista in C:xampphtdocsTCCusuariosgestaocadastrar_gestao.php on line 98\r\n', NULL, NULL, 46, 46),
(2, 'lucas', '202cb962ac59075b964b07152d234b70', 'Lucas Felipe Carlos do Nascimento', 4, 46, '0000-00-00', '20171024010009', '21432543', 'fletchacambios@hotmail.com', 2, NULL, '\r\nNotice:  Undefined variable: gremista in C:xampphtdocsTCCusuariosgestaocadastrar_gestao.php on line 98\r\n', NULL, NULL, 47, 47),
(4, 'felipe', '202cb962ac59075b964b07152d234b70', 'Felipe Carlos', 2, NULL, '0000-00-00', '20181024010001', '991466655', 'lucas.carlos@escolar.ifrn.edu.br', 1, '0000-00-00 00:00:00', 'Lyziane Nogueira', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_cargos`
--

CREATE TABLE `usuarios_cargos` (
  `id_cargo` int(6) NOT NULL,
  `nome_cargo` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Nome da diretoria',
  `cargo_diretoria` int(6) DEFAULT NULL COMMENT 'Tipo da diretoria: se é Executiva ou plena',
  `permissao_doc` int(1) NOT NULL DEFAULT 0 COMMENT 'Permissão para fazer documentos:\r\n0 - Atas e Atas de Assembleia\r\n1 - Ofícios \r\n2 - Portarias',
  `gremista_update` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `data_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `usuarios_cargos`
--

INSERT INTO `usuarios_cargos` (`id_cargo`, `nome_cargo`, `cargo_diretoria`, `permissao_doc`, `gremista_update`, `data_update`) VALUES
(1, 'Presidente', 0, 2, 'Lyziane Nogueira', '2021-02-07 18:54:35'),
(2, 'Vice-presidente', 0, 2, 'Lucas Felipe Carlos do Nascimento', '0000-00-00 00:00:00'),
(3, 'Secretária-geral', 0, 1, 'Eduardo Marinho de Paiva', '2021-02-06 17:26:26'),
(4, 'Secretário-geral', 0, 1, '', '0000-00-00 00:00:00'),
(5, 'Diretora de Assistência Estudantil', 1, 0, '', '2021-02-06 00:44:36'),
(6, 'Diretor de Assistência Estudantil', 1, 0, '', '2021-02-06 00:45:00'),
(7, 'Diretor de Lavagem de Dinheiro', 0, 0, '', '2021-02-06 17:27:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_cores`
--

CREATE TABLE `usuarios_cores` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `cor` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios_cores`
--

INSERT INTO `usuarios_cores` (`id`, `nome`, `cor`, `created`, `modified`) VALUES
(1, 'Vermelho', 'danger', '2018-05-23 00:00:00', NULL),
(2, 'Cinza', 'secondary', '2018-05-23 00:00:00', NULL),
(3, 'Verde', 'success', '2018-05-23 00:00:00', NULL),
(4, 'Azul', 'primary', '2018-05-23 00:00:00', NULL),
(5, 'Amarelo', 'warning', '2018-05-23 00:00:00', NULL),
(6, 'Azul claro', 'info', '2018-05-23 00:00:00', NULL),
(7, 'Claro', 'light', '2018-05-23 00:00:00', NULL),
(8, 'Cinza escuro', 'dark', '2018-05-23 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_desativados`
--

CREATE TABLE `usuarios_desativados` (
  `id_des` int(6) NOT NULL,
  `nome_des` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `matricula_des` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `email_des` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `cargo_des` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `gestao_des` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `inicio_gestao` datetime NOT NULL,
  `vencimento_gestao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci COMMENT='Tabela de gestões passadas';

--
-- Extraindo dados da tabela `usuarios_desativados`
--

INSERT INTO `usuarios_desativados` (`id_des`, `nome_des`, `matricula_des`, `email_des`, `cargo_des`, `gestao_des`, `inicio_gestao`, `vencimento_gestao`) VALUES
(1, 'Lucas Felipe Carlos do Nascimento', '20171024010009', 'lucasfelipecarlos@hotmail.com', 'Secretária-geral', 'IF Para Tempos de Guerra', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Lucas Felipe', '20171024010001', 'lucasfelipecarlos@hotmail.com', 'Presidente', 'Carcará', '2021-12-01 00:00:00', '2022-11-30 00:00:00'),
(3, 'Eduardo Marinho de Paiva', '20171024010025', 'lucas.carlos@academico.ifrn.edu.br', 'Diretor de Saúde e Meio Ambiente', 'Carcará: pega, mata e come', '2021-02-01 18:16:00', '2021-10-13 02:12:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_diretorias`
--

CREATE TABLE `usuarios_diretorias` (
  `id_diretoria` int(6) NOT NULL,
  `nome_diretoria` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `tipo_diretoria` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `sigla_diretoria` varchar(6) COLLATE utf8_swedish_ci NOT NULL,
  `gremista_registro_diretoria` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `data_registro` datetime NOT NULL,
  `data_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `usuarios_diretorias`
--

INSERT INTO `usuarios_diretorias` (`id_diretoria`, `nome_diretoria`, `tipo_diretoria`, `sigla_diretoria`, `gremista_registro_diretoria`, `data_registro`, `data_update`) VALUES
(0, 'Diretoria Executiva', 'Executiva', 'DIEXE', 'Lucas', '2021-02-16 00:00:00', '0000-00-00 00:00:00'),
(1, 'Diretoria de Assistência Estudantil', 'Plena', 'DIAES', 'Lucas', '2021-02-14 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_gestao`
--

CREATE TABLE `usuarios_gestao` (
  `id_gestao` int(6) NOT NULL,
  `nome_gestao` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'nome da chapa que se tornou gestão',
  `inicio_gestao` datetime NOT NULL COMMENT 'Data e hora da posse da gestão',
  `vencimento_gestao` datetime NOT NULL COMMENT 'Data limite da gestão (segundo o estatuto 1 ano)',
  `cadastro_gestao` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Data em que a gestão foi cadastrada no sistema',
  `cadastro_gremista_gestao` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Que usuário cadastrou a gestão',
  `ata_posse_gestao` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Ata de posse da gestão',
  `vigente_gestao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `usuarios_gestao`
--

INSERT INTO `usuarios_gestao` (`id_gestao`, `nome_gestao`, `inicio_gestao`, `vencimento_gestao`, `cadastro_gestao`, `cadastro_gremista_gestao`, `ata_posse_gestao`, `vigente_gestao`) VALUES
(46, 'Carcará: pega, mata e come', '2021-02-01 18:16:00', '2021-10-13 02:12:00', '2021-02-06 17:20:32', 'Lucas Felipe', '../gestao/ata_posse//2019.1  Regulamento de Estágio Supervisionado Obrigatório.pdf', 0),
(47, 'Mandacaruaaaaaaaaa', '2021-02-05 00:20:00', '2021-02-18 00:20:00', '2021-02-06 18:21:14', 'Eduardo Marinho de Paiva', '../gestao/ata_posse//2019.1  Regulamento de Estágio Supervisionado Obrigatório.pdf', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_niveis`
--

CREATE TABLE `usuarios_niveis` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cor` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios_niveis`
--

INSERT INTO `usuarios_niveis` (`id`, `nome`, `cor`, `created`, `modified`) VALUES
(1, 'Administrador', 5, '2018-05-23 00:00:00', NULL),
(2, 'Gremista', 1, '2018-05-23 00:00:00', NULL),
(3, 'Representante', 3, '2018-05-23 00:00:00', NULL),
(4, 'Visitante', 2, '2018-05-23 00:00:00', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `achados`
--
ALTER TABLE `achados`
  ADD PRIMARY KEY (`id_achados`);

--
-- Índices para tabela `bimestrebc`
--
ALTER TABLE `bimestrebc`
  ADD PRIMARY KEY (`id_bim_bc`);

--
-- Índices para tabela `bolsacopia`
--
ALTER TABLE `bolsacopia`
  ADD PRIMARY KEY (`id_bc`),
  ADD UNIQUE KEY `matriculaBC` (`matricula_bc`);

--
-- Índices para tabela `documentos_ata`
--
ALTER TABLE `documentos_ata`
  ADD PRIMARY KEY (`id_doc_ata`);

--
-- Índices para tabela `documentos_ata_ass`
--
ALTER TABLE `documentos_ata_ass`
  ADD PRIMARY KEY (`id_doc_ata_ass`);

--
-- Índices para tabela `documentos_ofc`
--
ALTER TABLE `documentos_ofc`
  ADD PRIMARY KEY (`id_doc_ofc`);

--
-- Índices para tabela `documentos_port`
--
ALTER TABLE `documentos_port`
  ADD PRIMARY KEY (`id_doc_port`);

--
-- Índices para tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD PRIMARY KEY (`id_emp`),
  ADD KEY `fk_obj_emp` (`obj_emp`);

--
-- Índices para tabela `fardas_encomendas`
--
ALTER TABLE `fardas_encomendas`
  ADD PRIMARY KEY (`id_fardas_enc`);

--
-- Índices para tabela `fardas_lote`
--
ALTER TABLE `fardas_lote`
  ADD PRIMARY KEY (`id_fardas_lote`);

--
-- Índices para tabela `fardas_vendidas`
--
ALTER TABLE `fardas_vendidas`
  ADD PRIMARY KEY (`id_fardas`),
  ADD KEY `fk_fornecedor_nome` (`fornecedor_fardas`),
  ADD KEY `fk_lote` (`lote_fardas`),
  ADD KEY `fk_preco_farda` (`preco_fardas`);

--
-- Índices para tabela `patrimonioativo`
--
ALTER TABLE `patrimonioativo`
  ADD PRIMARY KEY (`id_pat`);

--
-- Índices para tabela `patrimoniobaixa`
--
ALTER TABLE `patrimoniobaixa`
  ADD PRIMARY KEY (`id_pat_baixa`);

--
-- Índices para tabela `tesouraria_balanco`
--
ALTER TABLE `tesouraria_balanco`
  ADD PRIMARY KEY (`id_caixa`),
  ADD KEY `fk_ultima_ent_caixa` (`ultima_ent_caixa`),
  ADD KEY `fk_ultima_out_caixa` (`ultima_out_caixa`);

--
-- Índices para tabela `tesouraria_entradas`
--
ALTER TABLE `tesouraria_entradas`
  ADD PRIMARY KEY (`id_tes_ent`);

--
-- Índices para tabela `tesouraria_saidas`
--
ALTER TABLE `tesouraria_saidas`
  ADD PRIMARY KEY (`id_tes_out`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD KEY `fk_cargos` (`cargo`),
  ADD KEY `fk_gestao` (`gestao`),
  ADD KEY `fk_inicio_gestao` (`inicio_gestao_usu`),
  ADD KEY `fk_vencimento_gestao` (`vencimento_gestao_usu`);

--
-- Índices para tabela `usuarios_cargos`
--
ALTER TABLE `usuarios_cargos`
  ADD PRIMARY KEY (`id_cargo`),
  ADD KEY `fk_cargo_diretoria` (`cargo_diretoria`),
  ADD KEY `cargo_diretoria` (`nome_cargo`) USING BTREE;

--
-- Índices para tabela `usuarios_cores`
--
ALTER TABLE `usuarios_cores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios_desativados`
--
ALTER TABLE `usuarios_desativados`
  ADD PRIMARY KEY (`id_des`);

--
-- Índices para tabela `usuarios_diretorias`
--
ALTER TABLE `usuarios_diretorias`
  ADD PRIMARY KEY (`id_diretoria`);

--
-- Índices para tabela `usuarios_gestao`
--
ALTER TABLE `usuarios_gestao`
  ADD PRIMARY KEY (`id_gestao`);

--
-- Índices para tabela `usuarios_niveis`
--
ALTER TABLE `usuarios_niveis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_niveis_cores` (`cor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `achados`
--
ALTER TABLE `achados`
  MODIFY `id_achados` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `bimestrebc`
--
ALTER TABLE `bimestrebc`
  MODIFY `id_bim_bc` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `bolsacopia`
--
ALTER TABLE `bolsacopia`
  MODIFY `id_bc` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `documentos_ata`
--
ALTER TABLE `documentos_ata`
  MODIFY `id_doc_ata` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `documentos_ata_ass`
--
ALTER TABLE `documentos_ata_ass`
  MODIFY `id_doc_ata_ass` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `documentos_ofc`
--
ALTER TABLE `documentos_ofc`
  MODIFY `id_doc_ofc` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `documentos_port`
--
ALTER TABLE `documentos_port`
  MODIFY `id_doc_port` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `id_emp` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `fardas_encomendas`
--
ALTER TABLE `fardas_encomendas`
  MODIFY `id_fardas_enc` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `fardas_lote`
--
ALTER TABLE `fardas_lote`
  MODIFY `id_fardas_lote` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `fardas_vendidas`
--
ALTER TABLE `fardas_vendidas`
  MODIFY `id_fardas` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT de tabela `patrimonioativo`
--
ALTER TABLE `patrimonioativo`
  MODIFY `id_pat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `patrimoniobaixa`
--
ALTER TABLE `patrimoniobaixa`
  MODIFY `id_pat_baixa` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios_cargos`
--
ALTER TABLE `usuarios_cargos`
  MODIFY `id_cargo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios_desativados`
--
ALTER TABLE `usuarios_desativados`
  MODIFY `id_des` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios_gestao`
--
ALTER TABLE `usuarios_gestao`
  MODIFY `id_gestao` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `usuarios_niveis`
--
ALTER TABLE `usuarios_niveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD CONSTRAINT `fk_obj_emp` FOREIGN KEY (`obj_emp`) REFERENCES `patrimonioativo` (`id_pat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fardas_vendidas`
--
ALTER TABLE `fardas_vendidas`
  ADD CONSTRAINT `fk_fornecedor_nome` FOREIGN KEY (`fornecedor_fardas`) REFERENCES `fardas_lote` (`id_fardas_lote`),
  ADD CONSTRAINT `fk_lote` FOREIGN KEY (`lote_fardas`) REFERENCES `fardas_lote` (`id_fardas_lote`),
  ADD CONSTRAINT `fk_preco_farda` FOREIGN KEY (`preco_fardas`) REFERENCES `fardas_lote` (`id_fardas_lote`);

--
-- Limitadores para a tabela `tesouraria_balanco`
--
ALTER TABLE `tesouraria_balanco`
  ADD CONSTRAINT `fk_ultima_ent_caixa` FOREIGN KEY (`ultima_ent_caixa`) REFERENCES `tesouraria_entradas` (`id_tes_ent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ultima_out_caixa` FOREIGN KEY (`ultima_out_caixa`) REFERENCES `tesouraria_saidas` (`id_tes_out`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_cargos` FOREIGN KEY (`cargo`) REFERENCES `usuarios_cargos` (`id_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gestao` FOREIGN KEY (`gestao`) REFERENCES `usuarios_gestao` (`id_gestao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inicio_gestao` FOREIGN KEY (`inicio_gestao_usu`) REFERENCES `usuarios_gestao` (`id_gestao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vencimento_gestao` FOREIGN KEY (`vencimento_gestao_usu`) REFERENCES `usuarios_gestao` (`id_gestao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios_cargos`
--
ALTER TABLE `usuarios_cargos`
  ADD CONSTRAINT `fk_cargo_diretoria` FOREIGN KEY (`cargo_diretoria`) REFERENCES `usuarios_diretorias` (`id_diretoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios_niveis`
--
ALTER TABLE `usuarios_niveis`
  ADD CONSTRAINT `fk_niveis_cores` FOREIGN KEY (`cor`) REFERENCES `usuarios_cores` (`id`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `del_fardas_enc` ON SCHEDULE EVERY 5 SECOND STARTS '2021-02-17 00:13:37' ON COMPLETION NOT PRESERVE ENABLE DO CALL delete_fardas_enc()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
