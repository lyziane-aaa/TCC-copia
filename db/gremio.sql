-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Fev-2021 às 15:38
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

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
(1, 'Objeto', 'SDFDSF', 'AA', '2021-01-01', 'CC', '', 'DDD', 'DDD', 'NÃ£o', 'Aguardando', 'img_achados/qrcode.png');

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
(2, 'Ata nÂº 1/2021', 'Ata de Assembleia OrdinÃ¡ria', '', '', 'Assembleia', 'MossorÃ³, 13 de maio de 2021', '', 'Deliberativa', '1\r\n2\r\n3', 'etrthtrytry\r\nye\r\nyer\r\ny\r\ne\r\nyer', 'tye\r\nty\r\ner\r\nye\r\ny\r\ne\r\ntyer\r\nye\r\ntr', '<p>uuuuuuuuuuuuuuuuuuuuuuuuuuuu</p>\r\n', 'Lucas Felipe Carlos do Nascimento', '', '20171024010009', 'SecretÃ¡rio-geral', '0000-00-00 00:00:00', 'lucas', 'assinaturas_doc_ata/Lista Ata de Assembleia OrdinÃ¡ria-Ata nÂº 1_2021.png'),
(3, 'Ata nº 1/2021', 'Ata de Assembleia Ordinária', '', '', 'Assembleia', 'Mossoró, 13 de maio de 2021', '', 'Deliberativa', 'dsdsad', 'dsdsd\r\nsd\r\ns\r\nd\r\nsd\r\nsd\r\n', 'fs\r\nf\r\ns\r\nfs\r\nf\r\ns\r\nfs', '<p>fssffdsfddasgfadsfasdf</p>\r\n', 'Lucas Felipe Carlos do Nascimento', '', '20171024010009', 'Secretário-geral', '0000-00-00 00:00:00', 'lucas', 'assinaturas_doc_ata/Lista Ata de Assembleia Ordinária-Ata nº 1_2021.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos_ata_ass`
--

CREATE TABLE `documentos_ata_ass` (
  `id_doc_ata` int(6) NOT NULL,
  `num_doc_ata_ass` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL COMMENT 'Número da ata',
  `titulo_doc_ata` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL COMMENT 'Título da Reunião (ex.? Reunião Ordinária, Reunião Extraordinária)',
  `convoc_doc_ata` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Quem convocou a reunião, seguido do cargo',
  `sec_doc_ata` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Quem secretariou a reunião, seguido do cargo',
  `tipo_doc_ata` varchar(100) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Se é deliberativa ou informativa',
  `data_reuniao_doc_ata` varchar(100) COLLATE utf8_swedish_ci DEFAULT 'NULL' COMMENT 'Data em que a reunião aconteceu',
  `horario_doc_ata` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Horário de início e de término',
  `local_doc_ata` varchar(200) COLLATE utf8_swedish_ci DEFAULT 'NULL' COMMENT 'Local onde foi realizada a reunião',
  `pautas_doc_ata` text COLLATE utf8_swedish_ci DEFAULT '\'NULL\'' COMMENT 'Pautas da reunião',
  `enc_doc_ata` text COLLATE utf8_swedish_ci DEFAULT '\'NULL\'' COMMENT 'Encaminhamentos tomados',
  `presentes_doc_ata` text COLLATE utf8_swedish_ci DEFAULT '\'NULL\'' COMMENT 'Lista de presentes na reunião',
  `corpo_doc_ata` mediumtext COLLATE utf8_swedish_ci DEFAULT '\'NULL\'' COMMENT 'Corpo da ata',
  `autor_doc_ata` varchar(200) COLLATE utf8_swedish_ci DEFAULT 'NULL' COMMENT 'Quem lavrou a ata',
  `matricula_doc_ata` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL COMMENT 'Matrícula de quem fez',
  `cargo_doc_ata` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `data_registro_ata` datetime DEFAULT NULL COMMENT 'Data em que o documento foi gerado.',
  `gremista_registro_ata` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL COMMENT 'Usuário do gremista que fez a ata',
  `assinaturas_doc_ata` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Lista de assinaturas, se houver'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `documentos_ata_ass`
--

INSERT INTO `documentos_ata_ass` (`id_doc_ata`, `num_doc_ata_ass`, `titulo_doc_ata`, `convoc_doc_ata`, `sec_doc_ata`, `tipo_doc_ata`, `data_reuniao_doc_ata`, `horario_doc_ata`, `local_doc_ata`, `pautas_doc_ata`, `enc_doc_ata`, `presentes_doc_ata`, `corpo_doc_ata`, `autor_doc_ata`, `matricula_doc_ata`, `cargo_doc_ata`, `data_registro_ata`, `gremista_registro_ata`, `assinaturas_doc_ata`) VALUES
(2, '2/2021', 'Ata de Assembleia OrdinÃ¡ria', '', '', 'Assembleia', 'MossorÃ³, 13 de maio de 2021', '', 'Deliberativa', '1\r\n2\r\n3', 'etrthtrytry\r\nye\r\nyer\r\ny\r\ne\r\nyer', 'tye\r\nty\r\ner\r\nye\r\ny\r\ne\r\ntyer\r\nye\r\ntr', '<p>uuuuuuuuuuuuuuuuuuuuuuuuuuuu</p>\r\n', 'Lucas Felipe Carlos do Nascimento', '20171024010009', 'SecretÃ¡rio-geral', '0000-00-00 00:00:00', 'lucas', 'assinaturas_doc_ata/Lista Ata de Assembleia OrdinÃ¡ria-Ata nÂº 1_2021.png'),
(3, '3/2021', 'Ata de Assembleia Ordinária', '', '', 'Assembleia', 'Mossoró, 13 de maio de 2021', '', 'Deliberativa', 'dsdsad', 'dsdsd\r\nsd\r\ns\r\nd\r\nsd\r\nsd\r\n', 'fs\r\nf\r\ns\r\nfs\r\nf\r\ns\r\nfs', '<p>fssffdsfddasgfadsfasdf</p>\r\n', 'Lucas Felipe Carlos do Nascimento', '20171024010009', 'Secretário-geral', '0000-00-00 00:00:00', 'lucas', 'assinaturas_doc_ata/Lista Ata de Assembleia Ordinária-Ata nº 1_2021.png');

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
(2, 'Ofício 20201.0202 - Não dá c', '2/2021', 'aaaaaa', 'aaaaaaaa', 'aaaaaaaaaaa', '<p>aaaaaaa</p>\r\n', 'Atenciosamente,', 'LUCAS FELIPE CARLOS DO NASCIMENTO', '', 'Secretário-geral', '2021-02-14 21:08:42', 'lucas'),
(7, 'OFÍCIO Nº 3/2021/DIEXE/GEVP', '3/2021', 'Mossoró, 15 de fevereiro de 2021.', 'Ao Senhor\r\nEduardo\r\nda Morte', 'Teste', '<p>dgsfds</p>\r\n\r\n<p>f</p>\r\n\r\n<p>dsf</p>\r\n\r\n<p>dsf</p>\r\n\r\n<p>sd</p>\r\n', 'Atenciosamente,', 'LUCAS FELIPE CARLOS DO NASCIMENTO', '20171024010009', 'Secretário-geral', '2021-02-15 18:39:16', 'lucas');

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
  `autor_doc_port` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Assinatura de quem criou a portaria. Não é chave estrangeira porque a Portaria continuará a existir depois que a tabela usuarios for truncada em razão da troca de gestão',
  `cargo_doc_port` varchar(200) COLLATE utf8_swedish_ci NOT NULL COMMENT 'Não é chave estrangeira porque a Portaria continuará a existir depois que a tabela usuarios for truncada em razão da troca de gestão',
  `data_registro_port` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Data de geração do documento',
  `gremista_registro_port` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `assinada_doc_port` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `documentos_port`
--

INSERT INTO `documentos_port` (`id_doc_port`, `num_doc_port`, `titulo_doc_port`, `resumo_doc_port`, `texto_doc_port`, `autor_doc_port`, `cargo_doc_port`, `data_registro_port`, `gremista_registro_port`, `assinada_doc_port`) VALUES
(1, '1/2021', 'PORTARIA Nº 01/2021, de 14 de março de 2021', 'Lucas\r\nfelipe\r\n', '<p>&nbsp;</p>\r\n\r\n<p>Lucas</p>\r\n\r\n<p>Felipe</p>\r\n', 'Lucas Felipe Carlos do Nascimento', 'Secretário-geral', '2021-02-14 18:29:17', 'lucas', 0),
(3, '2/2021', 'PORTARIA Nº 2/2021, DE 15 DE FEVEREIRO DE 2021.', 'e\r\ne\r\ne\r\ne\r\n', '<p>ss</p>\r\n\r\n<p>s</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>s</p>\r\n\r\n<p>s</p>\r\n\r\n<p>s</p>\r\n', 'Lucas Felipe Carlos do Nascimento', 'Secretário-geral', '2021-02-15 15:48:48', 'lucas', 0),
(4, '3/2021', 'PORTARIA Nº 3/2021, DE 15 DE FEVEREIRO DE 2021.', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaa', '<p>aa</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>a</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>a</p>\r\n', 'Lucas Felipe Carlos do Nascimento', 'Secretário-geral', '2021-02-15 16:28:02', 'lucas', 0);

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

--
-- Extraindo dados da tabela `emprestimos`
--

INSERT INTO `emprestimos` (`id_emp`, `obj_emp`, `nome_emp`, `matricula_emp`, `condicao_emp`, `gremista_emp`, `data_emp`, `data_dev`, `gremista_dev`, `concluido_emp`) VALUES
(1, 51, 'Lucas Felipe Carlos do Nascimento', '20171024010009', '', 'Lyziane Nogueira', '2021-02-08 17:05:00', NULL, NULL, 0);

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
(1, 'Lucas Felipe', '2020', '888', 'PP', 2, '2021-02-19 17:24:42'),
(2, 'Lucas Felipe', '222222222222222', '123', 'PP', 3, '2021-02-19 17:38:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fardas_lote`
--

CREATE TABLE `fardas_lote` (
  `id_fardas_lote` int(6) NOT NULL,
  `fornecedor_lote` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `qnt_p_lote` int(3) NOT NULL,
  `qnt_m_lote` int(3) NOT NULL,
  `qnt_pp_lote` int(3) NOT NULL,
  `qnt_g_lote` int(3) NOT NULL,
  `qnt_gg_lote` int(3) NOT NULL,
  `data_receb_lote` datetime NOT NULL,
  `gremista_cadastro_lote` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `preco_farda_lote` int(6) NOT NULL,
  `fornecedor_numero_lote` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `lucro_gremio` float NOT NULL,
  `prestou_contas` tinyint(4) DEFAULT 0,
  `data_prestou_contas` datetime DEFAULT NULL,
  `repasse_previsto_fornecedor` int(6) DEFAULT NULL,
  `lucro_gremio_previsto_lote` int(6) DEFAULT NULL,
  `lucro_gremio_total_lote` int(6) DEFAULT NULL,
  `qnt_p_vend_lote` int(11) DEFAULT NULL,
  `qnt_pp_vend_lote` int(3) DEFAULT NULL,
  `qnt_m_vend_lote` varchar(45) COLLATE utf8_swedish_ci DEFAULT NULL,
  `qnt_g_vend_lote` int(3) DEFAULT NULL,
  `qnt_gg_vend_lote` int(3) DEFAULT NULL,
  `encerramento_lote` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `fardas_lote`
--

INSERT INTO `fardas_lote` (`id_fardas_lote`, `fornecedor_lote`, `qnt_p_lote`, `qnt_m_lote`, `qnt_pp_lote`, `qnt_g_lote`, `qnt_gg_lote`, `data_receb_lote`, `gremista_cadastro_lote`, `preco_farda_lote`, `fornecedor_numero_lote`, `lucro_gremio`, `prestou_contas`, `data_prestou_contas`, `repasse_previsto_fornecedor`, `lucro_gremio_previsto_lote`, `lucro_gremio_total_lote`, `qnt_p_vend_lote`, `qnt_pp_vend_lote`, `qnt_m_vend_lote`, `qnt_g_vend_lote`, `qnt_gg_vend_lote`, `encerramento_lote`) VALUES
(0, 'Lucas', 20, 20, 20, 20, 20, '2021-02-24 00:00:00', 'Lucas', 35, '99', 5, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fardas_vendidas`
--

CREATE TABLE `fardas_vendidas` (
  `id_fardas` int(6) NOT NULL,
  `tamanho_fardas` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `preco_farda` int(6) NOT NULL,
  `fornecedor_fardas` int(6) NOT NULL,
  `recibo_farda` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `gremista_vendeu` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `data_vendeu` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `lote_fardas` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `fardas_vendidas`
--

INSERT INTO `fardas_vendidas` (`id_fardas`, `tamanho_fardas`, `preco_farda`, `fornecedor_fardas`, `recibo_farda`, `gremista_vendeu`, `data_vendeu`, `lote_fardas`) VALUES
(2, 'PP', 0, 0, '0', '0', '0', 0);

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
(51, 'carro', '123', 'Aguardando', 0, 'fsdfsdsdf', '', 1, '', '2020-12-17 15:51:41', 1),
(52, 'â', '24236', 'Aguardando', 24235435, '34534', '', 0, '', '2020-12-17 15:51:54', 0),
(53, 'carro', '2423644444', 'Doação', 0, '325342523452345', '', 0, '', '2021-01-30 17:26:52', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `patrimoniobaixa`
--

CREATE TABLE `patrimoniobaixa` (
  `id_pat` int(5) NOT NULL,
  `nome_pat` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `cod_barras_pat` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `obtencao_pat` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `custo_obt` int(10) NOT NULL,
  `obs_pat` text COLLATE utf8_swedish_ci DEFAULT NULL,
  `data_baixa` datetime NOT NULL DEFAULT current_timestamp(),
  `motivo_baixa` varchar(255) COLLATE utf8_swedish_ci NOT NULL
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
  `gremista_update` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `data_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `usuarios_cargos`
--

INSERT INTO `usuarios_cargos` (`id_cargo`, `nome_cargo`, `cargo_diretoria`, `gremista_update`, `data_update`) VALUES
(1, 'Presidente', 0, 'Lyziane Nogueira', '2021-02-07 18:54:35'),
(2, 'Vice-presidente', 0, 'Lucas Felipe Carlos do Nascimento', '0000-00-00 00:00:00'),
(3, 'Secretária-geral', 0, 'Eduardo Marinho de Paiva', '2021-02-06 17:26:26'),
(4, 'Secretário-geral', 0, '', '0000-00-00 00:00:00'),
(5, 'Diretora de Assistência Estudantil', 1, '', '2021-02-06 00:44:36'),
(6, 'Diretor de Assistência Estudantil', 1, '', '2021-02-06 00:45:00'),
(7, 'Diretor de Lavagem de Dinheiro', 0, '', '2021-02-06 17:27:09');

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
  ADD PRIMARY KEY (`id_doc_ata`);

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
  ADD KEY `fk_preco_farda` (`preco_farda`),
  ADD KEY `fk_lote` (`lote_fardas`);

--
-- Índices para tabela `patrimonioativo`
--
ALTER TABLE `patrimonioativo`
  ADD PRIMARY KEY (`id_pat`);

--
-- Índices para tabela `patrimoniobaixa`
--
ALTER TABLE `patrimoniobaixa`
  ADD PRIMARY KEY (`id_pat`);

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
  ADD UNIQUE KEY `cargo_diretoria` (`nome_cargo`),
  ADD KEY `fk_cargo_diretoria` (`cargo_diretoria`);

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
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `achados`
--
ALTER TABLE `achados`
  MODIFY `id_achados` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `bimestrebc`
--
ALTER TABLE `bimestrebc`
  MODIFY `id_bim_bc` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `bolsacopia`
--
ALTER TABLE `bolsacopia`
  MODIFY `id_bc` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `documentos_ata`
--
ALTER TABLE `documentos_ata`
  MODIFY `id_doc_ata` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `documentos_ata_ass`
--
ALTER TABLE `documentos_ata_ass`
  MODIFY `id_doc_ata` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `documentos_ofc`
--
ALTER TABLE `documentos_ofc`
  MODIFY `id_doc_ofc` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `documentos_port`
--
ALTER TABLE `documentos_port`
  MODIFY `id_doc_port` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `id_emp` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `fardas_encomendas`
--
ALTER TABLE `fardas_encomendas`
  MODIFY `id_fardas_enc` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `fardas_vendidas`
--
ALTER TABLE `fardas_vendidas`
  MODIFY `id_fardas` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `patrimonioativo`
--
ALTER TABLE `patrimonioativo`
  MODIFY `id_pat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `patrimoniobaixa`
--
ALTER TABLE `patrimoniobaixa`
  MODIFY `id_pat` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios_cargos`
--
ALTER TABLE `usuarios_cargos`
  MODIFY `id_cargo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `fk_fornecedor_nome` FOREIGN KEY (`fornecedor_fardas`) REFERENCES `fardas_lote` (`id_fardas_lote`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_lote` FOREIGN KEY (`lote_fardas`) REFERENCES `fardas_lote` (`id_fardas_lote`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_preco_farda` FOREIGN KEY (`preco_farda`) REFERENCES `fardas_lote` (`id_fardas_lote`) ON DELETE NO ACTION;

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
