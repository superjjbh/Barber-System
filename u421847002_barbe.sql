-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/11/2018 às 22:48
-- Versão do servidor: 10.2.17-MariaDB
-- Versão do PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u421847002_barbe`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `area_nome` varchar(200) DEFAULT NULL,
  `area_pos` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `area`
--

INSERT INTO `area` (`area_id`, `area_nome`, `area_pos`) VALUES
(7, 'Cortes', 1),
(8, 'Barba', 0),
(9, 'Hidratação', 0),
(12, 'Pigmentação', 0),
(13, 'Quimica Tópicos', 0),
(14, 'Sobrancelha', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `area1`
--

CREATE TABLE `area1` (
  `area1_id` int(11) NOT NULL,
  `area1_nome` varchar(200) DEFAULT NULL,
  `area1_pos` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `area1`
--

INSERT INTO `area1` (`area1_id`, `area1_nome`, `area1_pos`) VALUES
(12, 'Clientes', 0),
(13, 'Cortes', 0),
(14, 'Barbas', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nome` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_nome`) VALUES
(11, 'Shampoo'),
(12, 'Loção');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `cliente_id` int(11) NOT NULL,
  `cliente_nome` varchar(200) DEFAULT NULL,
  `cliente_subtitulo` varchar(200) DEFAULT NULL,
  `cliente_descricao` text NOT NULL,
  `cliente_imagem` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `cliente`
--

INSERT INTO `cliente` (`cliente_id`, `cliente_nome`, `cliente_subtitulo`, `cliente_descricao`, `cliente_imagem`) VALUES
(15, 'Corte + Barba Simples', 'Promoção do combo Corte + Barba Simples ', '', '1540869112.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `comentario_id` int(11) NOT NULL,
  `comentario_nome` varchar(200) DEFAULT NULL,
  `comentario_email` varchar(200) DEFAULT NULL,
  `comentario_mensagem` text DEFAULT NULL,
  `comentario_data` varchar(200) DEFAULT NULL,
  `comentario_status` int(11) DEFAULT 0,
  `comentario_pagina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato`
--

CREATE TABLE `contato` (
  `contato_id` int(11) NOT NULL,
  `contato_email` varchar(200) DEFAULT NULL,
  `contato_telefone1` varchar(200) DEFAULT NULL,
  `contato_endereco` varchar(200) DEFAULT NULL,
  `contato_long_lat` varchar(200) DEFAULT NULL,
  `contato_telefone2` varchar(200) DEFAULT NULL,
  `contato_telefone3` varchar(200) DEFAULT NULL,
  `contato_telefone4` varchar(200) DEFAULT NULL,
  `contato_telefone5` varchar(200) DEFAULT NULL,
  `contato_telefone6` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `contato`
--

INSERT INTO `contato` (`contato_id`, `contato_email`, `contato_telefone1`, `contato_endereco`, `contato_long_lat`, `contato_telefone2`, `contato_telefone3`, `contato_telefone4`, `contato_telefone5`, `contato_telefone6`) VALUES
(1, 'superjjbh@gmail.com', '(31) 3403-2826', 'Rua Ernesto Tognolo - Belo Horizonte/MG', '', '(31) 98640-7398', '31986407398', '-19.8582247', '-43.8904626', 'Contagem');

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `curso_id` int(11) NOT NULL,
  `curso_nome` varchar(200) DEFAULT NULL,
  `curso_data_inicio` varchar(200) DEFAULT NULL,
  `curso_data_fim` varchar(200) DEFAULT NULL,
  `curso_horario` varchar(200) DEFAULT NULL,
  `curso_valor` varchar(200) DEFAULT NULL,
  `curso_descricao` varchar(1000) DEFAULT NULL,
  `curso_imagem` varchar(200) DEFAULT NULL,
  `curso_profissional` varchar(200) DEFAULT NULL,
  `curso_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `curso`
--

INSERT INTO `curso` (`curso_id`, `curso_nome`, `curso_data_inicio`, `curso_data_fim`, `curso_horario`, `curso_valor`, `curso_descricao`, `curso_imagem`, `curso_profissional`, `curso_status`) VALUES
(13, 'Curso Corte com Tesoura', '24/11/2018', '28/11/2018', 'De 9:00 as 12:00 ( 1 hora de Intervalo)', '200,00', 'Descrição completa do curso! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', '1540868170.jpg', 'Professor José', 'SIM');

-- --------------------------------------------------------

--
-- Estrutura para tabela `depoimento`
--

CREATE TABLE `depoimento` (
  `depoimento_id` int(11) NOT NULL,
  `depoimento_nome` varchar(200) DEFAULT NULL,
  `depoimento_cargo` varchar(200) DEFAULT NULL,
  `depoimento_sobre` text DEFAULT NULL,
  `depoimento_data` varchar(200) DEFAULT NULL,
  `depoimento_imagem` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `depoimento`
--

INSERT INTO `depoimento` (`depoimento_id`, `depoimento_nome`, `depoimento_cargo`, `depoimento_sobre`, `depoimento_data`, `depoimento_imagem`) VALUES
(7, 'Nome do Cliente 1', 'SIM', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', '27/10/2018', ''),
(8, 'Nome do Cliente 2', 'SIM', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', '27/10/2018', ''),
(9, 'Nome do Cliente 3', 'SIM', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', '27/10/2018', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `foto`
--

CREATE TABLE `foto` (
  `foto_id` int(11) NOT NULL,
  `foto_url` varchar(200) DEFAULT NULL,
  `foto_pos` int(11) DEFAULT 0,
  `foto_portfolio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `foto`
--

INSERT INTO `foto` (`foto_id`, `foto_url`, `foto_pos`, `foto_portfolio`) VALUES
(15, '5a1ba318885f3c4a0b89a857f975bf9a.jpg', 0, 4),
(24, '869af905d7ea98285bc175fae41cc991.jpg', 0, 4),
(26, '4e049de74b230318e1aa04213f57ba39.jpg', 0, 4),
(30, '2fe90a2f2bc77d61150bc4db148c529e.jpg', 0, 4),
(31, '3ddd510a983ffe2b82c457be264786ea.jpg', 0, 5),
(32, 'b900387ae6bc2a2f8f1a64d6168dc473.jpg', 0, 5),
(33, 'f39e3139327291b71d206f4035e4f988.jpg', 0, 5),
(34, '7c809c15171d6a4123ce5cee9e46b6c1.jpg', 0, 5),
(35, '881c9e46d972c75247ffef4ee44c1e31.jpg', 0, 5),
(36, 'f6e58b3b5bc402b7e4ebe04f324e516e.jpg', 0, 5),
(37, '618d1af280d43c64a6e74b91adc90094.jpg', 0, 5),
(38, 'f4f69fc06b0ff7e20ebe1f9a0d50b315.jpg', 0, 5),
(39, '34bd8af36329d720540faa30b210293e.jpg', 0, 5),
(40, '69c12b5e8071beaa3f023f2fc930305c.jpg', 0, 6),
(41, '8eb0f4936165edddea249269e8f69e01.jpg', 0, 6),
(42, '4691750a53bcf3176fa316b607a729cc.jpg', 0, 6),
(43, '8b980edfac550d5d7bba6363359b4dd9.jpg', 0, 6),
(44, '0487aa4b5f301a00be5f50ff9cbad9be.jpg', 0, 6),
(45, '69bc8c32e89e9f10dbbd6cb2476b710c.jpg', 0, 6),
(46, 'edeb7eed1eedd9b3075076d921f2d756.jpg', 0, 6),
(47, '4357ccdfcd651c7176dc04d4c7a85645.jpg', 0, 6),
(48, '9ca997d0f3cc5b1be76baf9be04addd2.jpg', 0, 6),
(49, 'e7bf72675bbb442519e2d558a7a1e40e.jpg', 0, 6),
(50, '11808c9b6044ace5e34b449e351fee75.jpg', 0, 6),
(51, 'ac1e23f2ad0c358cd3f81ced7315e7fb.jpg', 0, 6),
(52, '6d99dabe16b8f11b09af3d1809e18606.jpg', 0, 6),
(53, '1f8a3c2aab0b23e177e01fca1c92c06e.jpg', 0, 6),
(70, 'd7e2ac626f90e2cbd93b5d3f0dc0a528.jpg', 0, 60),
(71, '7b245df1b87ab5cef33a59f47a825486.jpg', 0, 60),
(72, 'fd6bd578c810d76b4df27a854cc0e96a.jpg', 0, 60),
(73, 'f148624a30caf6c8d093319615de0b29.jpg', 0, 60),
(74, 'a3b9f678ec010fb3b11dd1767ecfd3f1.jpg', 0, 60),
(75, '5caaf9c8195736e9243967bf9d3cfa9b.jpg', 0, 60),
(76, 'a0dec3f34eca30eea3cccba170c0b22c.jpg', 0, 60),
(98, 'baea02e11c568b7ee30f7483e5c75f88.jpg', 0, 62),
(99, '515df712fd8259f3a7f133d68c8f73a8.jpg', 0, 62),
(100, '9e61d433fb9ae8b17c2a5404cb57f0e6.jpg', 0, 62),
(103, 'ce72a30fb21a6522fb9fc4efbee8fc8a.jpg', 0, 62),
(104, '40bf7c0d2761579b2a15eb1d8e5d207e.jpg', 0, 62),
(105, '36527bfd21600a8ea24aa90c4fcc03dc.jpg', 0, 7),
(106, '3bea748fbfd50de3f8abecb9c7f6c528.jpg', 0, 7),
(107, 'dd8c568be49e5a99a6f28edc191db6eb.jpg', 0, 7),
(108, '1b73d77903f1292b320dd9c2fcefffb4.jpg', 0, 7),
(109, '1f6b234506143b9776b41eacb3a462e8.jpg', 0, 7),
(110, '666f02d4ddea418aec689f24ffa962d7.jpg', 0, 7),
(111, 'ae262fbe65bc9da3c86cfb5f05160c59.jpg', 0, 7),
(112, '9a351722f22d57b5f90365a32489be66.jpg', 0, 61),
(113, '4913e1e2b3a6a05dc5584cf8010da458.jpg', 0, 61),
(114, '58e382d85037a2890d9f5035894349a1.jpg', 0, 61),
(115, 'f1a6abeb72e676c4e4961220de05ed7a.jpg', 0, 61),
(116, '8f387207cd08b00072bbc9f7eb8da542.jpg', 0, 61),
(117, 'f8ed03ac641d394a65c950e89c75c55a.jpg', 0, 61),
(118, 'a676e58bf2630c2b01eeb99ddcbd70a6.jpg', 0, 61),
(119, '01f6d701adbd435be4fc8e3ae86912ce.jpg', 0, 61),
(120, 'ef528c2fe72483775f14f400474a3257.jpg', 0, 63),
(121, 'ae7b08520def467e83fc945d164d7b83.jpg', 0, 63),
(122, '002e3c02b5952ed5b4301573448a7280.jpg', 0, 63),
(123, '20eba184e32b9df9e12186c1c3e0d03e.jpg', 0, 63),
(124, '8521fc063cd5795a11832735de5665c9.jpg', 0, 63),
(125, '494981894c9b91ea3d16dfdfc1c3ceac.jpg', 0, 63),
(126, 'ffae97f5dc4647a8c1048c4d03159e33.jpg', 0, 63),
(127, '43769ce46233ea58e1be0a3c573a068c.jpg', 0, 63),
(128, 'f86ec03a361e34d16f547583ded3c592.jpg', 0, 64),
(129, 'f86ec03a361e34d16f547583ded3c592.jpg', 0, 64),
(130, '119e29c801ef60f7c5b7d00701c99080.jpg', 0, 64),
(131, '5775f66289ca77ac4e430382d0636bcc.jpg', 0, 64),
(132, '3ea4072988c7a67a686de6a2b87ccb49.jpg', 0, 64),
(133, '19beb981ed4c5d5d94c52410caa23f61.jpg', 0, 64),
(134, '0219ab0a202ccc971b7924c52256fb07.jpg', 0, 64),
(135, 'f754ec2abe32d62bd7ff1da18dddcec1.jpg', 0, 65),
(136, 'abcb2ea4bf6dabdeb0fa327a2d9f138b.jpg', 0, 65),
(137, '9fec242ba8b43d1649bfc603543898bf.jpg', 0, 65),
(138, '84937d46f34c4eff1941910a9d29cbf5.jpg', 0, 65),
(139, '70e7f11f1a10343ec71ea7bbcb689c19.jpg', 0, 65),
(140, 'e1e4d3840e37d4b33a4c843449dd67a4.jpg', 0, 65),
(141, '42a8e29605ff6cb8ec90061c659d5f74.jpg', 0, 65),
(142, 'ebeec2266b5aef7cfa5354c95ebe00c2.jpg', 0, 65),
(143, 'a737444c3b17c98d4cd8210215048968.jpg', 0, 65),
(144, '03ad7aec1e31d895bad1c0f192e32d79.jpg', 0, 66),
(145, 'eb498d8b2968d12e38b17df9612be7f5.jpg', 0, 66),
(146, '3febb699859584f4ca80e1a2ce22e88a.jpg', 0, 66),
(147, 'e69acaf8c4519a18a49d6fde650fe8c6.jpg', 0, 66),
(148, 'b3ccb10eaf86ba16638445997676669a.jpg', 0, 66),
(149, 'aaa95a7f08faa6102d5f014b3a66995c.jpg', 0, 66),
(150, 'af0f57a104579fabd7a004244581a4c6.jpg', 0, 66),
(151, 'b444b529333444dfd3d97b6e3a22c69b.jpg', 0, 66),
(152, 'bb2ad157a90b4b2dc125d91eb5e153ec.jpg', 0, 67),
(153, 'fad7af4fb28ff7a54a2e60416f4a554a.jpg', 0, 67),
(154, 'e877a1907377479d9d6ad9f71db2ddb5.jpg', 0, 67),
(155, '1ee5d4823eb80b2dbcbc9d5326025154.jpg', 0, 67),
(156, 'bd6d32d3de88746ec4489bd577cfabc1.jpg', 0, 67),
(157, '9b937b54773cb5deea5c06cf25a75c9a.jpg', 0, 67),
(158, '6ff81fe459285cd62ab4b915e247299d.jpg', 0, 67),
(159, 'b418859aa1c51071b738eddb77998ffb.jpg', 0, 67),
(160, 'd5542a281c7bb7276e485c1361cff7bc.jpg', 0, 67),
(161, 'd3a293405f31304b517a1f1f95e00f17.jpg', 0, 67),
(162, '9c03b1874bebabc759cbe1aa51806b4c.jpg', 0, 67),
(163, '83d9393b16f6a88ad77ef87409cc960d.jpg', 0, 67),
(164, '8fec0a88ebec0e23a2e934fe41eb72da.jpg', 0, 68),
(165, 'e61da95f3e68262a025229eaac34bb7f.jpg', 0, 68),
(166, '796dfa65a8aebd219702115c996eb8d9.jpg', 0, 68),
(167, '9fa713804bd23fb53b859d9af186cb0e.jpg', 0, 68),
(168, '54a3aed7020c40ec37dd23cdb10563f7.jpg', 0, 68),
(169, 'b9ded90f2ca75f515eb4b1806ea88ed1.jpg', 0, 68),
(170, 'c9d85bfc7696164a5d9790701fcb0fb0.jpg', 0, 68),
(171, '028d3c182d7b864b060c9dd2ef76ada7.jpg', 0, 68),
(172, '8dbc46f70c63cb4ecf63886e87da5b13.jpg', 0, 69),
(173, '46d3a5a155fa339a1aacc211fc665cbd.jpg', 0, 69),
(174, 'd5fd300c7ae6c1e9c5d31af5f188d09c.jpg', 0, 69),
(175, 'c88b5dd4451644c96f25c7612462eaff.jpg', 0, 69),
(176, '45373b04690026ae41708f600549c489.jpg', 0, 69),
(177, 'c3683f9b3883db06156a9a4f4ee16353.jpg', 0, 69),
(178, '4776247002a17ab5f2a55021c7da4ebd.jpg', 0, 69),
(179, 'aa3ce981b83b65d56636dd0140a1df3f.jpg', 0, 69),
(180, 'ae42104a98d7098d4ceac4a0ccae5701.jpg', 0, 69),
(181, '9a0e546953d4ddf44baec0b345a6b0c1.jpg', 0, 69),
(182, '2ef4b6ab3f56eacd05698f62c0e932cd.jpg', 0, 69),
(183, 'a513fade4ed6cf1ed2305757956c00ab.jpg', 0, 69),
(184, 'dbb1e0f7670ae6953bfbf849e93bf916.jpg', 0, 69),
(199, '10996db5cbe7e6046231566d7fb0441e.jpg', 0, 72),
(200, '510fc87e5096683569cdf8f269e637d6.jpg', 0, 72),
(204, 'c61ce04a2cdf29fbf6d45f728a53244f.jpg', 0, 72),
(217, 'cc97002cf03d4d933e65bac4069c61c0.jpg', 0, 73),
(218, 'b0d7f2643d838c513cda6d1cba94cbe1.jpg', 0, 74),
(219, '1d29a56ba05219c6029926aeffe490d9.jpg', 0, 70),
(220, '554030a29a87e6536d0d5791990910ce.jpg', 0, 71),
(221, 'c878148624c082f66ab3b4335d89908d.jpg', 0, 75),
(222, '0affc27620f07845d618316b3633ce6b.jpg', 0, 77),
(223, '9d2c7b56e7a517967f81afbc0c0825ef.jpg', 0, 76),
(227, '40e9c0502d41c9fe19ca11844a24662e.jpg', 0, 83),
(228, '3dff425a1f21964a8fc82edb76db3b43.jpg', 0, 87),
(229, 'ab0507438ce5257603c79418ce6d33c0.jpg', 0, 87),
(230, 'bce32cb225c35a72bcfff328e4b21039.jpg', 0, 90),
(231, '65ed2cda54f56b6e2772c1bceec5202a.jpg', 0, 90),
(232, 'cb7a2f47a775ddc5cf587d80e79c70d7.jpg', 0, 2),
(233, '02f4e3affd1162fc6f15f25dc112a05c.jpg', 0, 2),
(234, 'd2e815ce1fffaedc157d0ed980aa83e2.jpg', 0, 1),
(235, 'f51d647b1c04f83c611df402c1b93f1d.jpg', 0, 1),
(236, '55751801d50c4693ad09b8293f6d11af.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `horario`
--

CREATE TABLE `horario` (
  `horario_id` int(11) NOT NULL,
  `horario_nome` varchar(200) DEFAULT NULL,
  `horario_pos` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `horario`
--

INSERT INTO `horario` (`horario_id`, `horario_nome`, `horario_pos`) VALUES
(9, '10:00', 2),
(10, '10:30', 3),
(11, '11:00', 4),
(12, '11:30', 5),
(13, '12:00', 6),
(14, '12:30', 7),
(15, '13:00', 8),
(16, '13:30', 9),
(17, '14:00', 10),
(18, '14:30', 11),
(19, '15:00', 12),
(20, '15:30', 13),
(21, '16:00', 14),
(22, '16:30', 15),
(23, '17:00', 16),
(24, '17:30', 17),
(25, '18:00', 18),
(26, '19:00', 0),
(27, '09:00', 0),
(28, '09:30', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `icones`
--

CREATE TABLE `icones` (
  `icones_id` int(11) NOT NULL,
  `icones_nome` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `icones`
--

INSERT INTO `icones` (`icones_id`, `icones_nome`) VALUES
(1, 'fa fa-bed'),
(2, 'fa fa-buysellads'),
(3, 'fa fa-cart-arrow-down'),
(4, 'fa fa-cart-arrow-down'),
(5, 'fa fa-connectdevelop'),
(6, 'fa fa-diamond'),
(7, 'fa fa-facebook-official'),
(8, 'fa fa-forumbee'),
(9, 'fa fa-hotel'),
(10, 'fa fa-leanpub'),
(11, 'fa fa-mars'),
(12, 'fa fa-mars-double'),
(13, 'fa fa-mars-stroke'),
(14, 'fa fa-mars-stroke-h'),
(15, 'fa fa-mars-stroke-v'),
(16, 'fa fa-medium'),
(17, 'fa fa-mercury'),
(18, 'fa fa-motorcycle'),
(19, 'fa fa-neuter'),
(20, 'fa fa-pinterest-p'),
(21, 'fa fa-sellsy'),
(22, 'fa fa-server'),
(23, 'fa fa-ship'),
(24, 'fa fa-shirtsinbulk'),
(25, 'fa fa-simplybuilt'),
(26, 'fa fa-skyatlas'),
(27, 'fa fa-street-view'),
(28, 'fa fa-subway'),
(29, 'fa fa-train'),
(30, 'fa fa-transgender'),
(31, 'fa fa-transgender-alt'),
(32, 'fa fa-user-plus'),
(33, 'fa fa-user-secret'),
(34, 'fa fa-user-times'),
(35, 'fa fa-venus'),
(36, 'fa fa-venus-double'),
(37, 'fa fa-venus-mars'),
(38, 'fa fa-viacoin'),
(39, 'fa fa-whatsapp'),
(40, 'fa fa-adjust'),
(41, 'fa fa-anchor'),
(42, 'fa fa-archive'),
(43, 'fa fa-area-chart'),
(44, 'fa fa-arrows'),
(45, 'fa fa-arrows-h'),
(46, 'fa fa-arrows-v'),
(47, 'fa fa-asterisk'),
(48, 'fa fa-at'),
(49, 'fa fa-automobile'),
(50, 'fa fa-ban'),
(51, 'fa fa-bank'),
(52, 'fa fa-bar-chart'),
(53, 'fa fa-bar-chart-o'),
(54, 'fa fa-barcode'),
(55, 'fa fa-bars'),
(56, 'fa fa-bed'),
(57, 'fa fa-beer'),
(58, 'fa fa-bell'),
(59, 'fa fa-bell-o'),
(60, 'fa fa-bell-slash'),
(61, 'fa fa-bell-slash-o'),
(62, 'fa fa-bicycle'),
(63, 'fa fa-binoculars'),
(64, 'fa fa-birthday-cake'),
(65, 'fa fa-bolt'),
(66, 'fa fa-bomb'),
(67, 'fa fa-book'),
(68, 'fa fa-bookmark'),
(69, 'fa fa-bookmark-o'),
(70, 'fa fa-briefcase'),
(71, 'fa fa-bug'),
(72, 'fa fa-building'),
(73, 'fa fa-building-o'),
(74, 'fa fa-bullhorn'),
(75, 'fa fa-bullseye'),
(76, 'fa fa-bus'),
(77, 'fa fa-cab'),
(78, 'fa fa-calculator'),
(79, 'fa fa-calendar'),
(80, 'fa fa-calendar-o'),
(81, 'fa fa-camera'),
(82, 'fa fa-camera-retro'),
(83, 'fa fa-car'),
(84, 'fa fa-caret-square-o-down'),
(85, 'fa fa-caret-square-o-left'),
(86, 'fa fa-caret-square-o-right'),
(87, 'fa fa-caret-square-o-up'),
(88, 'fa fa-cart-arrow-down'),
(89, 'fa fa-cart-plus'),
(90, 'fa fa-cc'),
(91, 'fa fa-certificate'),
(92, 'fa fa-check'),
(93, 'fa fa-check-circle'),
(94, 'fa fa-check-circle-o'),
(95, 'fa fa-check-square'),
(96, 'fa fa-check-square-o'),
(97, 'fa fa-child'),
(98, 'fa fa-circle'),
(99, 'fa fa-circle-o'),
(100, 'fa fa-circle-o-notch'),
(101, 'fa fa-circle-thin'),
(102, 'fa fa-clock-o'),
(103, 'fa fa-close'),
(104, 'fa fa-cloud'),
(105, 'fa fa-cloud-download'),
(106, 'fa fa-cloud-upload'),
(107, 'fa fa-code'),
(108, 'fa fa-code-fork'),
(109, 'fa fa-coffee'),
(110, 'fa fa-cog'),
(111, 'fa fa-cogs'),
(112, 'fa fa-comment'),
(113, 'fa fa-comment-o'),
(114, 'fa fa-comments'),
(115, 'fa fa-comments-o'),
(116, 'fa fa-compass'),
(117, 'fa fa-copyright'),
(118, 'fa fa-credit-card'),
(119, 'fa fa-crop'),
(120, 'fa fa-crosshairs'),
(121, 'fa fa-cube'),
(122, 'fa fa-cubes'),
(123, 'fa fa-cutlery'),
(124, 'fa fa-dashboard'),
(125, 'fa fa-database'),
(126, 'fa fa-desktop'),
(127, 'fa fa-diamond'),
(128, 'fa fa-dot-circle-o'),
(129, 'fa fa-download'),
(130, 'fa fa-edit'),
(131, 'fa fa-ellipsis-h'),
(132, 'fa fa-ellipsis-v'),
(133, 'fa fa-envelope'),
(134, 'fa fa-envelope-o'),
(135, 'fa fa-envelope-square'),
(136, 'fa fa-eraser'),
(137, 'fa fa-exchange'),
(138, 'fa fa-exclamation'),
(139, 'fa fa-exclamation-circle'),
(140, 'fa fa-exclamation-triangle'),
(141, 'fa fa-external-link'),
(142, 'fa fa-external-link-square'),
(143, 'fa fa-eye'),
(144, 'fa fa-eye-slash'),
(145, 'fa fa-eyedropper'),
(146, 'fa fa-fax'),
(147, 'fa fa-female'),
(148, 'fa fa-fighter-jet'),
(149, 'fa fa-file-archive-o'),
(150, 'fa fa-file-audio-o'),
(151, 'fa fa-file-code-o'),
(152, 'fa fa-file-excel-o'),
(153, 'fa fa-file-image-o'),
(154, 'fa fa-file-movie-o'),
(155, 'fa fa-file-pdf-o'),
(156, 'fa fa-file-photo-o'),
(157, 'fa fa-file-picture-o'),
(158, 'fa fa-file-powerpoint-o'),
(159, 'fa fa-file-sound-o'),
(160, 'fa fa-file-video-o'),
(161, 'fa fa-file-word-o'),
(162, 'fa fa-file-zip-o'),
(163, 'fa fa-film'),
(164, 'fa fa-filter'),
(165, 'fa fa-fire'),
(166, 'fa fa-fire-extinguisher'),
(167, 'fa fa-flag'),
(168, 'fa fa-flag-checkered'),
(169, 'fa fa-flag-o'),
(170, 'fa fa-flash'),
(171, 'fa fa-flask'),
(172, 'fa fa-folder'),
(173, 'fa fa-folder-o'),
(174, 'fa fa-folder-open'),
(175, 'fa fa-folder-open-o'),
(176, 'fa fa-frown-o'),
(177, 'fa fa-futbol-o'),
(178, 'fa fa-gamepad'),
(179, 'fa fa-gavel'),
(180, 'fa fa-gear'),
(181, 'fa fa-gears'),
(182, 'fa fa-genderless'),
(183, 'fa fa-gift'),
(184, 'fa fa-glass'),
(185, 'fa fa-globe'),
(186, 'fa fa-graduation-cap'),
(187, 'fa fa-group'),
(188, 'fa fa-hdd-o'),
(189, 'fa fa-headphones'),
(190, 'fa fa-heart'),
(191, 'fa fa-heart-o'),
(192, 'fa fa-heartbeat'),
(193, 'fa fa-history'),
(194, 'fa fa-home'),
(195, 'fa fa-hotel'),
(196, 'fa fa-image'),
(197, 'fa fa-inbox'),
(198, 'fa fa-info'),
(199, 'fa fa-info-circle'),
(200, 'fa fa-institution'),
(201, 'fa fa-key'),
(202, 'fa fa-keyboard-o'),
(203, 'fa fa-language'),
(204, 'fa fa-laptop'),
(205, 'fa fa-leaf'),
(206, 'fa fa-legal'),
(207, 'fa fa-lemon-o'),
(208, 'fa fa-level-down'),
(209, 'fa fa-level-up'),
(210, 'fa fa-life-bouy'),
(211, 'fa fa-life-buoy'),
(212, 'fa fa-life-ring'),
(213, 'fa fa-life-saver'),
(214, 'fa fa-lightbulb-o'),
(215, 'fa fa-line-chart'),
(216, 'fa fa-location-arrow'),
(217, 'fa fa-lock'),
(218, 'fa fa-magic'),
(219, 'fa fa-magnet'),
(220, 'fa fa-mail-forward'),
(221, 'fa fa-mail-reply'),
(222, 'fa fa-mail-reply-all'),
(223, 'fa fa-male'),
(224, 'fa fa-map-marker'),
(225, 'fa fa-meh-o'),
(226, 'fa fa-microphone'),
(227, 'fa fa-microphone-slash'),
(228, 'fa fa-minus'),
(229, 'fa fa-minus-circle'),
(230, 'fa fa-minus-square'),
(231, 'fa fa-minus-square-o'),
(232, 'fa fa-mobile'),
(233, 'fa fa-mobile-phone'),
(234, 'fa fa-money'),
(235, 'fa fa-moon-o'),
(236, 'fa fa-mortar-board'),
(237, 'fa fa-motorcycle'),
(238, 'fa fa-music'),
(239, 'fa fa-navicon'),
(240, 'fa fa-newspaper-o'),
(241, 'fa fa-paint-brush'),
(242, 'fa fa-paper-plane'),
(243, 'fa fa-paper-plane-o'),
(244, 'fa fa-paw'),
(245, 'fa fa-pencil'),
(246, 'fa fa-pencil-square'),
(247, 'fa fa-pencil-square-o'),
(248, 'fa fa-phone'),
(249, 'fa fa-phone-square'),
(250, 'fa fa-photo'),
(251, 'fa fa-picture-o'),
(252, 'fa fa-pie-chart'),
(253, 'fa fa-plane'),
(254, 'fa fa-plug'),
(255, 'fa fa-plus'),
(256, 'fa fa-plus-circle'),
(257, 'fa fa-plus-square'),
(258, 'fa fa-plus-square-o'),
(259, 'fa fa-power-off'),
(260, 'fa fa-print'),
(261, 'fa fa-puzzle-piece'),
(262, 'fa fa-qrcode'),
(263, 'fa fa-question'),
(264, 'fa fa-question-circle'),
(265, 'fa fa-quote-left'),
(266, 'fa fa-quote-right'),
(267, 'fa fa-random'),
(268, 'fa fa-recycle'),
(269, 'fa fa-refresh'),
(270, 'fa fa-remove'),
(271, 'fa fa-reorder'),
(272, 'fa fa-reply'),
(273, 'fa fa-reply-all'),
(274, 'fa fa-retweet'),
(275, 'fa fa-road'),
(276, 'fa fa-rocket'),
(277, 'fa fa-rss'),
(278, 'fa fa-rss-square'),
(279, 'fa fa-search'),
(280, 'fa fa-search-minus'),
(281, 'fa fa-search-plus'),
(282, 'fa fa-send'),
(283, 'fa fa-send-o'),
(284, 'fa fa-server'),
(285, 'fa fa-share'),
(286, 'fa fa-share-alt'),
(287, 'fa fa-share-alt-square'),
(288, 'fa fa-share-square'),
(289, 'fa fa-share-square-o'),
(290, 'fa fa-shield'),
(291, 'fa fa-ship'),
(292, 'fa fa-shopping-cart'),
(293, 'fa fa-sign-in'),
(294, 'fa fa-sign-out'),
(295, 'fa fa-signal'),
(296, 'fa fa-sitemap'),
(297, 'fa fa-sliders'),
(298, 'fa fa-smile-o'),
(299, 'fa fa-soccer-ball-o'),
(300, 'fa fa-sort'),
(301, 'fa fa-sort-alpha-asc'),
(302, 'fa fa-sort-alpha-desc'),
(303, 'fa fa-sort-amount-asc'),
(304, 'fa fa-sort-amount-desc'),
(305, 'fa fa-sort-asc'),
(306, 'fa fa-sort-desc'),
(307, 'fa fa-sort-down'),
(308, 'fa fa-sort-numeric-asc'),
(309, 'fa fa-sort-numeric-desc'),
(310, 'fa fa-sort-up'),
(311, 'fa fa-space-shuttle'),
(312, 'fa fa-spinner'),
(313, 'fa fa-spoon'),
(314, 'fa fa-square'),
(315, 'fa fa-square-o'),
(316, 'fa fa-star'),
(317, 'fa fa-star-half'),
(318, 'fa fa-star-half-empty'),
(319, 'fa fa-star-half-full'),
(320, 'fa fa-star-half-o'),
(321, 'fa fa-star-o'),
(322, 'fa fa-street-view'),
(323, 'fa fa-suitcase'),
(324, 'fa fa-sun-o'),
(325, 'fa fa-support'),
(326, 'fa fa-tablet'),
(327, 'fa fa-tachometer'),
(328, 'fa fa-tag'),
(329, 'fa fa-tags'),
(330, 'fa fa-tasks'),
(331, 'fa fa-taxi'),
(332, 'fa fa-terminal'),
(333, 'fa fa-thumb-tack'),
(334, 'fa fa-thumbs-down'),
(335, 'fa fa-thumbs-o-down'),
(336, 'fa fa-thumbs-o-up'),
(337, 'fa fa-thumbs-up'),
(338, 'fa fa-ticket'),
(339, 'fa fa-times'),
(340, 'fa fa-times-circle'),
(341, 'fa fa-times-circle-o'),
(342, 'fa fa-tint'),
(343, 'fa fa-toggle-down'),
(344, 'fa fa-toggle-left'),
(345, 'fa fa-toggle-off'),
(346, 'fa fa-toggle-on'),
(347, 'fa fa-toggle-right'),
(348, 'fa fa-toggle-up'),
(349, 'fa fa-trash'),
(350, 'fa fa-trash-o'),
(351, 'fa fa-tree'),
(352, 'fa fa-trophy'),
(353, 'fa fa-truck'),
(354, 'fa fa-tty'),
(355, 'fa fa-umbrella'),
(356, 'fa fa-university'),
(357, 'fa fa-unlock'),
(358, 'fa fa-unlock-alt'),
(359, 'fa fa-unsorted'),
(360, 'fa fa-upload'),
(361, 'fa fa-user'),
(362, 'fa fa-user-plus'),
(363, 'fa fa-user-secret'),
(364, 'fa fa-user-times'),
(365, 'fa fa-users'),
(366, 'fa fa-video-camera'),
(367, 'fa fa-volume-down'),
(368, 'fa fa-volume-off'),
(369, 'fa fa-volume-up'),
(370, 'fa fa-warning'),
(371, 'fa fa-wheelchair'),
(372, 'fa fa-wifi'),
(373, 'fa fa-wrench'),
(374, 'fa fa-ambulance'),
(375, 'fa fa-automobile'),
(376, 'fa fa-bicycle'),
(377, 'fa fa-bus'),
(378, 'fa fa-cab'),
(379, 'fa fa-car'),
(380, 'fa fa-fighter-jet'),
(381, 'fa fa-motorcycle'),
(382, 'fa fa-plane'),
(383, 'fa fa-rocket'),
(384, 'fa fa-ship'),
(385, 'fa fa-space-shuttle'),
(386, 'fa fa-subway'),
(387, 'fa fa-taxi'),
(388, 'fa fa-train'),
(389, 'fa fa-truck'),
(390, 'fa fa-wheelchair'),
(391, 'fa fa-circle-thin'),
(392, 'fa fa-genderless'),
(393, 'fa fa-mars'),
(394, 'fa fa-mars-double'),
(395, 'fa fa-mars-stroke'),
(396, 'fa fa-mars-stroke-h'),
(397, 'fa fa-mars-stroke-v'),
(398, 'fa fa-mercury'),
(399, 'fa fa-neuter'),
(400, 'fa fa-transgender'),
(401, 'fa fa-transgender-alt'),
(402, 'fa fa-venus'),
(403, 'fa fa-venus-double'),
(404, 'fa fa-venus-mars'),
(405, 'fa fa-file'),
(406, 'fa fa-file-archive-o'),
(407, 'fa fa-file-audio-o'),
(408, 'fa fa-file-code-o'),
(409, 'fa fa-file-excel-o'),
(410, 'fa fa-file-image-o'),
(411, 'fa fa-file-movie-o'),
(412, 'fa fa-file-o'),
(413, 'fa fa-file-pdf-o'),
(414, 'fa fa-file-photo-o'),
(415, 'fa fa-file-picture-o'),
(416, 'fa fa-file-powerpoint-o'),
(417, 'fa fa-file-sound-o'),
(418, 'fa fa-file-text'),
(419, 'fa fa-file-text-o'),
(420, 'fa fa-file-video-o'),
(421, 'fa fa-file-word-o'),
(422, 'fa fa-file-zip-o'),
(423, 'fa fa-cog fa-spin'),
(424, 'fa fa-gear fa-spin'),
(425, 'fa fa-refresh fa-spin'),
(426, 'fa fa-spinner fa-spin'),
(427, 'fa fa-check-square'),
(428, 'fa fa-check-square-o'),
(429, 'fa fa-circle'),
(430, 'fa fa-circle-o'),
(431, 'fa fafa fa-dot-circle-o'),
(432, 'fa fa-minus-square'),
(433, 'fa fa-minus-square-o'),
(434, 'fa fa-plus-square'),
(435, 'fa fa-plus-square-o'),
(436, 'fa fa-square'),
(437, 'fa fa-square-o'),
(438, 'fa fa-cc-amex'),
(439, 'fa fa-cc-discover'),
(440, 'fa fa-cc-mastercard'),
(441, 'fa fa-cc-paypal'),
(442, 'fa fa-cc-stripe'),
(443, 'fa fa-cc-visa'),
(444, 'fa fa-credit-card'),
(445, 'fa fa-google-wallet'),
(446, 'fa fa-paypal'),
(447, 'fa fa-area-chart'),
(448, 'fa fa-bar-chart'),
(449, 'fa fa-bar-chart-o'),
(450, 'fa fa-line-chart'),
(451, 'fa fa-pie-chart'),
(452, 'fa fa-bitcoin'),
(453, 'fa fa-btc'),
(454, 'fa fa-cny'),
(455, 'fa fa-dollar'),
(456, 'fa fa-eur'),
(457, 'fa fa-euro'),
(458, 'fa fa-gbp'),
(459, 'fa fa-ils'),
(460, 'fa fa-inr'),
(461, 'fa fa-jpy'),
(462, 'fa fa-krw'),
(463, 'fa fa-money'),
(464, 'fa fa-rmb'),
(465, 'fa fa-rouble'),
(466, 'fa fa-rub'),
(467, 'fa fa-ruble'),
(468, 'fa fa-rupee'),
(469, 'fa fa-shekel'),
(470, 'fa fa-sheqel'),
(471, 'fa fa-try'),
(472, 'fa fa-turkish-lira'),
(473, 'fa fa-usd'),
(474, 'fa fa-won'),
(475, 'fa fa-yen'),
(476, 'fa fa-align-center'),
(477, 'fa fa-align-justify'),
(478, 'fa fa-align-left'),
(479, 'fa fa-align-right'),
(480, 'fa fa-bold'),
(481, 'fa fa-chain'),
(482, 'fa fa-chain-broken'),
(483, 'fa fa-clipboard'),
(484, 'fa fa-columns'),
(485, 'fa fa-copy'),
(486, 'fa fa-cut'),
(487, 'fa fa-dedent'),
(488, 'fa fa-eraser'),
(489, 'fa fa-file'),
(490, 'fa fa-file-o'),
(491, 'fa fa-file-text'),
(492, 'fa fa-file-text-o'),
(493, 'fa fa-files-o'),
(494, 'fa fa-floppy-o'),
(495, 'fa fa-font'),
(496, 'fa fa-header'),
(497, 'fa fa-indent'),
(498, 'fa fa-italic'),
(499, 'fa fa-link'),
(500, 'fa fa-list'),
(501, 'fa fa-list-alt'),
(502, 'fa fa-list-ol'),
(503, 'fa fa-list-ul'),
(504, 'fa fa-outdent'),
(505, 'fa fa-paperclip'),
(506, 'fa fa-paragraph'),
(507, 'fa fa-paste'),
(508, 'fa fa-repeat'),
(509, 'fa fa-rotate-left'),
(510, 'fa fa-rotate-right'),
(511, 'fa fa-save'),
(512, 'fa fa-scissors'),
(513, 'fa fa-strikethrough'),
(514, 'fa fa-subscript'),
(515, 'fa fa-superscript'),
(516, 'fa fa-table'),
(517, 'fa fa-text-height'),
(518, 'fa fa-text-width'),
(519, 'fa fa-th'),
(520, 'fa fa-th-large'),
(521, 'fa fa-th-list'),
(522, 'fa fa-underline'),
(523, 'fa fa-undo'),
(524, 'fa fa-unlink'),
(525, 'fa fa-angle-double-down'),
(526, 'fa fa-angle-double-left'),
(527, 'fa fa-angle-double-right'),
(528, 'fa fa-angle-double-up'),
(529, 'fa fa-angle-down'),
(530, 'fa fa-angle-left'),
(531, 'fa fa-angle-right'),
(532, 'fa fa-angle-up'),
(533, 'fa fa-arrow-circle-down'),
(534, 'fa fa-arrow-circle-left'),
(535, 'fa fa-arrow-circle-o-down'),
(536, 'fa fa-arrow-circle-o-left'),
(537, 'fa fa-arrow-circle-o-right'),
(538, 'fa fa-arrow-circle-o-up'),
(539, 'fa fa-arrow-circle-right'),
(540, 'fa fa-arrow-circle-up'),
(541, 'fa fa-arrow-down'),
(542, 'fa fa-arrow-left'),
(543, 'fa fa-arrow-right'),
(544, 'fa fa-arrow-up'),
(545, 'fa fa-arrows'),
(546, 'fa fa-arrows-alt'),
(547, 'fa fa-arrows-h'),
(548, 'fa fa-arrows-v'),
(549, 'fa fa-caret-down'),
(550, 'fa fa-caret-left'),
(551, 'fa fa-caret-right'),
(552, 'fa fa-caret-square-o-down'),
(553, 'fa fa-caret-square-o-left'),
(554, 'fa fa-caret-square-o-right'),
(555, 'fa fa-caret-square-o-up'),
(556, 'fa fa-caret-up'),
(557, 'fa fa-chevron-circle-down'),
(558, 'fa fa-chevron-circle-left'),
(559, 'fa fa-chevron-circle-right'),
(560, 'fa fa-chevron-circle-up'),
(561, 'fa fa-chevron-down'),
(562, 'fa fa-chevron-left'),
(563, 'fa fa-chevron-right'),
(564, 'fa fa-chevron-up'),
(565, 'fa fa-hand-o-down'),
(566, 'fa fa-hand-o-left'),
(567, 'fa fa-hand-o-right'),
(568, 'fa fa-hand-o-up'),
(569, 'fa fa-long-arrow-down'),
(570, 'fa fa-long-arrow-left'),
(571, 'fa fa-long-arrow-right'),
(572, 'fa fa-long-arrow-up'),
(573, 'fa fa-toggle-down'),
(574, 'fa fa-toggle-left'),
(575, 'fa fa-toggle-right'),
(576, 'fa fa-toggle-up'),
(577, 'fa fa-arrows-alt'),
(578, 'fa fa-backward'),
(579, 'fa fa-compress'),
(580, 'fa fa-eject'),
(581, 'fa fa-expand'),
(582, 'fa fa-fast-backward'),
(583, 'fa fa-fast-forward'),
(584, 'fa fa-forward'),
(585, 'fa fa-pause'),
(586, 'fa fa-play'),
(587, 'fa fa-play-circle'),
(588, 'fa fa-play-circle-o'),
(589, 'fa fa-step-backward'),
(590, 'fa fa-step-forward'),
(591, 'fa fa-stop'),
(592, 'fa fa-youtube-play'),
(593, 'fa fa-adn'),
(594, 'fa fa-android'),
(595, 'fa fa-angellist'),
(596, 'fa fa-apple'),
(597, 'fa fa-behance'),
(598, 'fa fa-behance-square'),
(599, 'fa fa-bitbucket'),
(600, 'fa fa-bitbucket-square'),
(601, 'fa fa-bitcoin'),
(602, 'fa fa-btc'),
(603, 'fa fa-buysellads'),
(604, 'fa fa-cc-amex'),
(605, 'fa fa-cc-discover'),
(606, 'fa fa-cc-mastercard'),
(607, 'fa fa-cc-paypal'),
(608, 'fa fa-cc-stripe'),
(609, 'fa fa-cc-visa'),
(610, 'fa fa-codepen'),
(611, 'fa fa-connectdevelop'),
(612, 'fa fa-css3'),
(613, 'fa fa-dashcube'),
(614, 'fa fa-delicious'),
(615, 'fa fa-deviantart'),
(616, 'fa fa-digg'),
(617, 'fa fa-dribbble'),
(618, 'fa fa-dropbox'),
(619, 'fa fa-drupal'),
(620, 'fa fa-empire'),
(621, 'fa fa-facebook'),
(622, 'fa fa-facebook-f'),
(623, 'fa fa-facebook-square'),
(624, 'fa fa-flickr'),
(625, 'fa fa-forumbee'),
(626, 'fa fa-foursquare'),
(627, 'fa fa-ge'),
(628, 'fa fa-git'),
(629, 'fa fa-git-square'),
(630, 'fa fa-github'),
(631, 'fa fa-github-alt'),
(632, 'fa fa-github-square'),
(633, 'fa fa-gittip'),
(634, 'fa fa-google'),
(635, 'fa fa-google-plus'),
(636, 'fa fa-google-plus-square'),
(637, 'fa fa-google-wallet'),
(638, 'fa fa-gratipay'),
(639, 'fa fa-hacker-news'),
(640, 'fa fa-html5'),
(641, 'fa fa-instagram'),
(642, 'fa fa-ioxhost'),
(643, 'fa fa-joomla'),
(644, 'fa fa-jsfiddle'),
(645, 'fa fa-lastfm'),
(646, 'fa fa-lastfm-square'),
(647, 'fa fa-leanpub'),
(648, 'fa fa-linkedin'),
(649, 'fa fa-linkedin-square'),
(650, 'fa fa-linux'),
(651, 'fa fa-maxcdn'),
(652, 'fa fa-meanpath'),
(653, 'fa fa-medium'),
(654, 'fa fa-openid'),
(655, 'fa fa-pagelines'),
(656, 'fa fa-paypal'),
(657, 'fa fa-pied-piper'),
(658, 'fa fa-pied-piper-alt'),
(659, 'fa fa-pinterest'),
(660, 'fa fa-pinterest-p'),
(661, 'fa fa-pinterest-square'),
(662, 'fa fa-qq'),
(663, 'fa fa-ra'),
(664, 'fa fa-rebel'),
(665, 'fa fa-reddit'),
(666, 'fa fa-reddit-square'),
(667, 'fa fa-renren'),
(668, 'fa fa-sellsy'),
(669, 'fa fa-share-alt'),
(670, 'fa fa-share-alt-square'),
(671, 'fa fa-shirtsinbulk'),
(672, 'fa fa-simplybuilt'),
(673, 'fa fa-skyatlas'),
(674, 'fa fa-skype'),
(675, 'fa fa-slack'),
(676, 'fa fa-slideshare'),
(677, 'fa fa-soundcloud'),
(678, 'fa fa-spotify'),
(679, 'fa fa-stack-exchange'),
(680, 'fa fa-stack-overflow'),
(681, 'fa fa-steam'),
(682, 'fa fa-steam-square'),
(683, 'fa fa-stumbleupon'),
(684, 'fa fa-stumbleupon-circle'),
(685, 'fa fa-tencent-weibo'),
(686, 'fa fa-trello'),
(687, 'fa fa-tumblr'),
(688, 'fa fa-tumblr-square'),
(689, 'fa fa-twitch'),
(690, 'fa fa-twitter'),
(691, 'fa fa-twitter-square'),
(692, 'fa fa-viacoin'),
(693, 'fa fa-vimeo-square'),
(694, 'fa fa-vine'),
(695, 'fa fa-vk'),
(696, 'fa fa-wechat'),
(697, 'fa fa-weibo'),
(698, 'fa fa-weixin'),
(699, 'fa fa-whatsapp'),
(700, 'fa fa-windows'),
(701, 'fa fa-wordpress'),
(702, 'fa fa-xing'),
(703, 'fa fa-xing-square'),
(704, 'fa fa-yahoo'),
(705, 'fa fa-yelp'),
(706, 'fa fa-youtube'),
(707, 'fa fa-youtube-square'),
(708, 'fa fa-ambulance'),
(709, 'fa fa-h-square'),
(710, 'fa fa-heart'),
(711, 'fa fa-heart-o'),
(712, 'fa fa-heartbeat'),
(713, 'fa fa-hospital-o'),
(714, 'fa fa-medkit'),
(715, 'fa fa-plus-square'),
(716, 'fa fa-stethoscope'),
(717, 'fa fa-user-md'),
(718, 'fa fa-wheelchair');

-- --------------------------------------------------------

--
-- Estrutura para tabela `inscricao`
--

CREATE TABLE `inscricao` (
  `inscricao_id` int(11) NOT NULL,
  `inscricao_nome` varchar(200) DEFAULT NULL,
  `inscricao_email` varchar(200) DEFAULT NULL,
  `inscricao_telefone` varchar(200) DEFAULT NULL,
  `inscricao_curso` varchar(200) DEFAULT NULL,
  `inscricao_data` varchar(200) DEFAULT NULL,
  `inscricao_resumo` varchar(1000) DEFAULT NULL,
  `inscricao_observacao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulo1`
--

CREATE TABLE `modulo1` (
  `modulo1_id` int(11) NOT NULL,
  `modulo1_nome` varchar(200) DEFAULT NULL,
  `modulo1_subtitulo1` text DEFAULT NULL,
  `modulo1_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `modulo1`
--

INSERT INTO `modulo1` (`modulo1_id`, `modulo1_nome`, `modulo1_subtitulo1`, `modulo1_status`) VALUES
(1, 'Seja bem-vindo ao Barber System', 'SEGURANÃ‡A ELETRÃ”NICA', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulo2`
--

CREATE TABLE `modulo2` (
  `modulo2_id` int(11) NOT NULL,
  `modulo2_nome` text NOT NULL,
  `modulo2_nome1` text NOT NULL,
  `modulo2_nome2` varchar(200) DEFAULT NULL,
  `modulo2_nome3` varchar(200) DEFAULT NULL,
  `modulo2_nome4` varchar(200) DEFAULT NULL,
  `modulo2_nome5` varchar(200) DEFAULT NULL,
  `modulo2_nome6` varchar(200) DEFAULT NULL,
  `modulo2_nome7` varchar(200) DEFAULT NULL,
  `modulo2_nome8` varchar(200) DEFAULT NULL,
  `modulo2_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `modulo2`
--

INSERT INTO `modulo2` (`modulo2_id`, `modulo2_nome`, `modulo2_nome1`, `modulo2_nome2`, `modulo2_nome3`, `modulo2_nome4`, `modulo2_nome5`, `modulo2_nome6`, `modulo2_nome7`, `modulo2_nome8`, `modulo2_status`) VALUES
(1, 'Unidade Centro', 'Rua Teste, 123', '31 99999-0000', 'Unidade Contagem', 'Rua Teste, 123', '31 99999-0000', 'Unidade Barreiro', 'Rua Teste, 123', '31 99999-0000', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulo3`
--

CREATE TABLE `modulo3` (
  `modulo3_id` int(11) NOT NULL,
  `modulo3_nome` text DEFAULT NULL,
  `modulo3_descricao` longtext DEFAULT NULL,
  `modulo3_status` int(11) DEFAULT 0,
  `modulo3_imagem` varchar(200) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `modulo3`
--

INSERT INTO `modulo3` (`modulo3_id`, `modulo3_nome`, `modulo3_descricao`, `modulo3_status`, `modulo3_imagem`) VALUES
(1, 'Sobre a Barbearia', '<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h4>', 1, '1540867481.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulo4`
--

CREATE TABLE `modulo4` (
  `modulo4_id` int(11) NOT NULL,
  `modulo4_descricao` text DEFAULT NULL,
  `modulo4_imagem` varchar(200) NOT NULL,
  `modulo4_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `modulo4`
--

INSERT INTO `modulo4` (`modulo4_id`, `modulo4_descricao`, `modulo4_imagem`, `modulo4_status`) VALUES
(1, '<strong>BARBER SYSTEM.</strong> Entre em contato conosco! <a href=\"contato/\"><button type=\"button\" class=\"btn btn-default btn-lg\">Clique aqui!</button></a>', 'parallax-3.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulo5`
--

CREATE TABLE `modulo5` (
  `modulo5_id` int(11) NOT NULL,
  `modulo5_nome` varchar(200) DEFAULT NULL,
  `modulo5_descricao` text DEFAULT NULL,
  `modulo5_status` int(11) DEFAULT NULL,
  `modulo5_imagem` varchar(200) DEFAULT NULL,
  `modulo5_limite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `modulo5`
--

INSERT INTO `modulo5` (`modulo5_id`, `modulo5_nome`, `modulo5_descricao`, `modulo5_status`, `modulo5_imagem`, `modulo5_limite`) VALUES
(1, '<span class=\"condiment\"> Depoimentos</span>', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and by the <span class=\"dark bold\">charms</span> of pleasure of the moment, so blinded by desire, that they cannot foresee the pain ', 1, 'i3.jpg', 12);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulo6`
--

CREATE TABLE `modulo6` (
  `modulo6_id` int(11) NOT NULL,
  `modulo6_nome` varchar(200) DEFAULT NULL,
  `modulo6_descricao` text NOT NULL,
  `modulo6_nome1` text NOT NULL,
  `modulo6_descricao1` text NOT NULL,
  `modulo6_imagem` varchar(200) DEFAULT NULL,
  `modulo6_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `modulo6`
--

INSERT INTO `modulo6` (`modulo6_id`, `modulo6_nome`, `modulo6_descricao`, `modulo6_nome1`, `modulo6_descricao1`, `modulo6_imagem`, `modulo6_status`) VALUES
(1, 'serviÃ§os', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain  teste', '<span class=\"condiment\">Porque escolher  Oxygen ?</span>', '                            <ul>   \r\n  <li class=\"h-item uppercase \">100% Responsive Design</li>\r\n                                <li class=\"h-item uppercase \">html5 & css3</li>\r\n                                <li class=\"h-item uppercase \">Clean coding</li>\r\n                                <li class=\"h-item uppercase \">Easy customizable</li>\r\n                                <li class=\"h-item uppercase \">Retina ready </li>\r\n                                <li class=\"h-item uppercase \">7X24 support</li>\r\n</ul>      ', 'i1.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulo7`
--

CREATE TABLE `modulo7` (
  `modulo7_id` int(11) NOT NULL,
  `modulo7_nome` varchar(200) DEFAULT NULL,
  `modulo7_descricao` text DEFAULT NULL,
  `modulo7_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `modulo7`
--

INSERT INTO `modulo7` (`modulo7_id`, `modulo7_nome`, `modulo7_descricao`, `modulo7_status`) VALUES
(1, 'Seja bem-vindo ao Barber System', 'SISTEMA IDEAL PARA SUA BARBEARIA', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulo8`
--

CREATE TABLE `modulo8` (
  `modulo8_id` int(11) NOT NULL,
  `modulo8_nome` varchar(200) DEFAULT NULL,
  `modulo8_descricao` text DEFAULT NULL,
  `modulo8_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `modulo8`
--

INSERT INTO `modulo8` (`modulo8_id`, `modulo8_nome`, `modulo8_descricao`, `modulo8_status`) VALUES
(1, 'Equipe Especializada', 'NÃ³s somos especialistas em assessoria automotiva! ', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulo9`
--

CREATE TABLE `modulo9` (
  `modulo9_id` int(11) NOT NULL,
  `modulo9_nome` varchar(200) DEFAULT NULL,
  `modulo9_subtitulo` text DEFAULT NULL,
  `modulo9_button` varchar(200) DEFAULT NULL,
  `modulo9_imagem` varchar(200) NOT NULL,
  `modulo9_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `modulo9`
--

INSERT INTO `modulo9` (`modulo9_id`, `modulo9_nome`, `modulo9_subtitulo`, `modulo9_button`, `modulo9_imagem`, `modulo9_status`) VALUES
(1, 'Entre em <span class=\"extrabold\">Contato</span>', 'Estamos Ã  sua inteira disposiÃ§Ã£o, ligue pra nÃ³s ou preencha o formulÃ¡rio abaixo:', 'Enviar Mensagem', '', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulo10`
--

CREATE TABLE `modulo10` (
  `modulo10_id` int(11) NOT NULL,
  `modulo10_nome` varchar(200) DEFAULT NULL,
  `modulo10_subtitulo` varchar(200) DEFAULT NULL,
  `modulo10_icon` varchar(200) DEFAULT NULL,
  `modulo10_button` varchar(200) DEFAULT NULL,
  `modulo10_button1` varchar(200) DEFAULT NULL,
  `modulo10_status` varchar(200) DEFAULT NULL,
  `modulo10_imagem` varchar(200) DEFAULT NULL,
  `modulo10_paginacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `modulo10`
--

INSERT INTO `modulo10` (`modulo10_id`, `modulo10_nome`, `modulo10_subtitulo`, `modulo10_icon`, `modulo10_button`, `modulo10_button1`, `modulo10_status`, `modulo10_imagem`, `modulo10_paginacao`) VALUES
(1, 'CARRO FÃCIL', 'ASSESSORIA EM NEGÃ“CIOS AUTOMOTIVOS!', '', 'ComentÃ¡rios', 'leia mais', '1', NULL, 12);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulo11`
--

CREATE TABLE `modulo11` (
  `modulo11_id` int(11) NOT NULL,
  `modulo11_nome` varchar(200) DEFAULT NULL,
  `modulo11_button` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `modulo11`
--

INSERT INTO `modulo11` (`modulo11_id`, `modulo11_nome`, `modulo11_button`) VALUES
(1, 'Onde estamos? clique no mapa', 'Â© 2018. Todos os direitos reservados. ');

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulo_aparencia`
--

CREATE TABLE `modulo_aparencia` (
  `modulo_aparencia_id` int(11) NOT NULL,
  `modulo_aparencia_cor` varchar(200) DEFAULT NULL,
  `modulo_aparencia_favicon` varchar(200) DEFAULT NULL,
  `modulo_aparencia_logo` varchar(200) DEFAULT NULL,
  `modulo_aparencia_wide` varchar(20) NOT NULL DEFAULT 'bwide'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `modulo_aparencia`
--

INSERT INTO `modulo_aparencia` (`modulo_aparencia_id`, `modulo_aparencia_cor`, `modulo_aparencia_favicon`, `modulo_aparencia_logo`, `modulo_aparencia_wide`) VALUES
(1, 'coffee', 'favicon.ico', '1529028458.png', 'bwide');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagina`
--

CREATE TABLE `pagina` (
  `pagina_id` int(11) NOT NULL,
  `pagina_nome` varchar(200) DEFAULT NULL,
  `pagina_imagem` varchar(200) DEFAULT NULL,
  `pagina_descricao` longtext DEFAULT NULL,
  `pagina_pos` int(11) DEFAULT 0,
  `pagina_area` int(11) DEFAULT NULL,
  `pagina_data` varchar(200) DEFAULT NULL,
  `pagina_autor` varchar(200) DEFAULT NULL,
  `pagina_description` varchar(200) DEFAULT NULL,
  `pagina_keywords` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `pagina`
--

INSERT INTO `pagina` (`pagina_id`, `pagina_nome`, `pagina_imagem`, `pagina_descricao`, `pagina_pos`, `pagina_area`, `pagina_data`, `pagina_autor`, `pagina_description`, `pagina_keywords`) VALUES
(55, 'Corte Simples', '1540652920.png', '<p>Corte Simples</p>', 0, 7, 'SIM', '20,00', '', ''),
(56, 'Corte Tesoura', '1540652864.jpg', '<p>Corte Tesoura<br></p>', 0, 7, 'SIM', '30,00', '', ''),
(57, 'Barba Simples', '1540653043.jpg', '<p>Barba Simples<br></p>', 0, 8, 'SIM', '15,00', '', ''),
(58, 'Barboterapia', '1540653086.jpg', '<p>Barboterapia<br></p>', 0, 8, 'SIM', '20,00', '', ''),
(60, 'Hidratação Simples', '1540658043.jpg', '<p>Hidratação Simples<br></p>', 0, 9, 'SIM', '10,00', '', ''),
(62, 'Relaxamento de Cabelos', '1540655465.jpg', '<p>Relaxamento de Cabelos<br></p>', 0, 13, 'SIM', '40,00 (A partir)', '', ''),
(63, 'Botox em Cabelos', '1540658319.jpg', '<p>Botox em Cabelos<br></p>', 0, 13, 'SIM', '40,00 (A partir)', '', ''),
(64, 'Selagem para Cabelos', '1540655625.jpg', '<p>Selagem para Cabelos<br></p>', 0, 13, 'SIM', '40,00 (A partir)', '', ''),
(65, 'Sombrancelha', '1540658449.jpg', '<p>Sombrancelha<br></p>', 0, 14, 'SIM', '10,00', '', ''),
(66, 'Acabamento de Pezinho', '1540655918.png', '<p>Acabamento de Pezinho<br></p>', 0, 7, 'SIM', '10,00', '', ''),
(67, 'Pigmentação de Barba', '1540656101.jpg', '<p>Pigmentação de Barba<br></p>', 0, 12, 'SIM', '10,00', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolio_id` int(11) NOT NULL,
  `portfolio_nome` varchar(200) DEFAULT NULL,
  `portfolio_cliente` varchar(200) NOT NULL,
  `portfolio_data` varchar(200) DEFAULT NULL,
  `portfolio_imagem` varchar(200) DEFAULT NULL,
  `portfolio_descricao` longtext DEFAULT NULL,
  `portfolio_area1` int(11) DEFAULT NULL,
  `portfolio_url` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `portfolio_nome`, `portfolio_cliente`, `portfolio_data`, `portfolio_imagem`, `portfolio_descricao`, `portfolio_area1`, `portfolio_url`) VALUES
(2, 'Estrutura', '', '', '1530330664.jpg', 'Foto', 12, ''),
(4, 'Cortes', '', '', '1530408046.png', 'Foto', 13, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `produto_id` int(11) NOT NULL,
  `produto_categoria` varchar(200) DEFAULT NULL,
  `produto_nome` varchar(200) DEFAULT NULL,
  `produto_preco` varchar(200) DEFAULT NULL,
  `produto_descricao` varchar(200) DEFAULT NULL,
  `produto_imagem` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `produto`
--

INSERT INTO `produto` (`produto_id`, `produto_categoria`, `produto_nome`, `produto_preco`, `produto_descricao`, `produto_imagem`) VALUES
(12, 'Shampoo', 'Kit Barber Club', '30,00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', '1540868417.jpg'),
(13, 'Loção', 'Kit QOD Barber Shop', '30,00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', '1540868500.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `profissional`
--

CREATE TABLE `profissional` (
  `profissional_id` int(11) NOT NULL,
  `profissional_nome` varchar(200) DEFAULT NULL,
  `profissional_pos` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `profissional`
--

INSERT INTO `profissional` (`profissional_id`, `profissional_nome`, `profissional_pos`) VALUES
(8, 'Profissional Disponível', 0),
(9, 'Professor José', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico`
--

CREATE TABLE `servico` (
  `servico_id` int(11) NOT NULL,
  `servico_nome` varchar(200) DEFAULT NULL,
  `servico_icon` varchar(200) DEFAULT NULL,
  `servico_descricao` text DEFAULT NULL,
  `servico_data` varchar(200) DEFAULT NULL,
  `servico_horario` varchar(200) DEFAULT NULL,
  `servico_email` varchar(300) DEFAULT NULL,
  `servico_status` int(11) DEFAULT NULL,
  `servico_profissional` varchar(200) DEFAULT NULL,
  `servico_unidade` varchar(200) DEFAULT NULL,
  `servico_promocao` varchar(300) DEFAULT NULL,
  `servico_adicional` varchar(1000) DEFAULT NULL,
  `servico_adicional2` varchar(200) DEFAULT NULL,
  `servico_adicional3` varchar(200) DEFAULT NULL,
  `servico_adicional4` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `servico`
--

INSERT INTO `servico` (`servico_id`, `servico_nome`, `servico_icon`, `servico_descricao`, `servico_data`, `servico_horario`, `servico_email`, `servico_status`, `servico_profissional`, `servico_unidade`, `servico_promocao`, `servico_adicional`, `servico_adicional2`, `servico_adicional3`, `servico_adicional4`) VALUES
(68, 'José', '31986407398', 'Corte Tesoura', '31/10/2018', '18:00', 'jose.joaquim@ideagri.com.br', 0, 'A confirmar ou o Profissional que estiver disponível', 'Venda Nova', '', 'Botox em Cabelos', 'Corte Simples', 'Acabamento de Pezinho', 'Pigmentação de Barba'),
(69, 'Jose', '31986407398', 'Corte Simples', '03/11/2018', '10:30', 'superjjbh@gmail.com', 0, 'A confirmar ou o Profissional que estiver disponível', 'Cidade Nova', '', 'Barboterapia', 'Hidratação Simples', 'Acabamento de Pezinho', 'Pigmentação de Barba'),
(70, '', '31986407398', 'Barba Simples', '31/12/1969', '', 'superjjbh@gmail.com', 0, 'A confirmar ou o Profissional que estiver disponível', '', '', '', '', '', ''),
(71, '', '31986407398', 'Corte Tesoura', '31/12/1969', '', 'superjjbh@gmail.com', 0, 'A confirmar ou o Profissional que estiver disponível', '', '', '', '', '', ''),
(72, 'LUIZ fernando', '11950587231', 'Corte Simples', '07/11/2018', '10:30', 'luiz.souzadias98@gmail.com', 0, 'A confirmar ou o Profissional que estiver disponível', 'Centro', '', '', '', '', ''),
(73, 'Michael alves', '31987975417', 'Corte Simples', '08/11/2018', '11:30', 'michaelalves901@gmail.com', 0, 'A confirmar ou o Profissional que estiver disponível', 'Centro', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `site`
--

CREATE TABLE `site` (
  `site_id` int(11) NOT NULL,
  `site_meta_desc` text DEFAULT NULL,
  `site_meta_palavra` varchar(200) DEFAULT NULL,
  `site_meta_titulo` varchar(200) DEFAULT NULL,
  `site_sobre_titulo` varchar(200) DEFAULT NULL,
  `site_sobre` varchar(200) DEFAULT NULL,
  `site_logo` varchar(200) DEFAULT NULL,
  `site_meta_autor` varchar(200) DEFAULT NULL,
  `site_imagem` varchar(200) DEFAULT NULL,
  `site_analytics` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `site`
--

INSERT INTO `site` (`site_id`, `site_meta_desc`, `site_meta_palavra`, `site_meta_titulo`, `site_sobre_titulo`, `site_sobre`, `site_logo`, `site_meta_autor`, `site_imagem`, `site_analytics`) VALUES
(1, '(31) 98640-7398', 'contato@jmtecnologiabh.com.br', 'BARBER SYSTEM', NULL, 'sobre', 'logo-small.png', '31986407398', 'parallax_bg11.jpg', 'Atendimento de Segunda a Sábado de 9:00 às 19:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `slide`
--

CREATE TABLE `slide` (
  `slide_id` int(11) NOT NULL,
  `slide_imagem` varchar(200) DEFAULT NULL,
  `slide_nome` varchar(200) DEFAULT NULL,
  `slide_subtitulo` varchar(200) DEFAULT NULL,
  `slide_subtitulo1` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `slide`
--

INSERT INTO `slide` (`slide_id`, `slide_imagem`, `slide_nome`, `slide_subtitulo`, `slide_subtitulo1`) VALUES
(20, '1529029515.jpg', 'BARBER SYSTEM ', 'Sistema Ideal para Sua Barbearia', ''),
(23, '1529029035.jpg', 'BARBER SYSTEM', 'Sistema Ideal para Sua Barbearia', ''),
(24, '1529028893.jpg', 'BARBER SYSTEM', 'Sistema Ideal para Sua Barbearia', ''),
(25, '1529028960.jpg', 'BARBER SYSTEM', 'Sistema Ideal para Sua Barbearia', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `smtp`
--

CREATE TABLE `smtp` (
  `smtp_id` int(11) NOT NULL,
  `smtp_host` varchar(200) DEFAULT NULL,
  `smtp_username` varchar(100) DEFAULT NULL,
  `smtp_password` varchar(100) DEFAULT NULL,
  `smtp_fromname` varchar(200) DEFAULT NULL,
  `smtp_bcc` varchar(100) DEFAULT NULL,
  `smtp_replyto` varchar(100) DEFAULT NULL,
  `smtp_port` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `smtp`
--

INSERT INTO `smtp` (`smtp_id`, `smtp_host`, `smtp_username`, `smtp_password`, `smtp_fromname`, `smtp_bcc`, `smtp_replyto`, `smtp_port`) VALUES
(1, ' mx1.hostinger.com.br', 'jj@jmtecnologiabh.com.br', '090979', 'BARBER SYSTEM', 'superjjbh@gmail.com', 'rafadinix@gmail.com', 587);

-- --------------------------------------------------------

--
-- Estrutura para tabela `social`
--

CREATE TABLE `social` (
  `social_id` int(11) NOT NULL,
  `social_url` varchar(200) DEFAULT NULL,
  `social_nome` varchar(200) DEFAULT NULL,
  `social_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `social`
--

INSERT INTO `social` (`social_id`, `social_url`, `social_nome`, `social_status`) VALUES
(9, 'https://www.facebook.com/jemtecnologia/', 'fa fa-facebook', 1),
(10, 'https://br.linkedin.com/', 'fa fa-flickr', 0),
(15, 'https://www.instagram.com/jmtecnologiabh', 'fa fa-instagram', 1),
(16, 'https://br.linkedin.com/', 'fa fa-linkedin', 0),
(20, 'https://br.pinterest.com/', 'fa fa-pinterest', 0),
(22, 'https://br.linkedin.com/', 'fa fa-skype', 1),
(26, 'https://twitter.com/juninhoeafran', 'fa fa-twitter', 0),
(29, 'www.youtube.com', 'fa fa-youtube', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidade`
--

CREATE TABLE `unidade` (
  `unidade_id` int(11) NOT NULL,
  `unidade_nome` varchar(200) DEFAULT NULL,
  `unidade_endereco` varchar(200) DEFAULT NULL,
  `unidade_telefone` varchar(200) DEFAULT NULL,
  `unidade_celular` varchar(200) DEFAULT NULL,
  `unidade_email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `unidade`
--

INSERT INTO `unidade` (`unidade_id`, `unidade_nome`, `unidade_endereco`, `unidade_telefone`, `unidade_celular`, `unidade_email`) VALUES
(9, 'Centro', 'Rua Rio de Janeiro, Belo Horizonte', '(31) 3403-2826', '(31) 98640-7398', 'contato@jmtecnologiabh.com.br'),
(10, 'Venda Nova', 'Avenida Vilarinho, Belo Horizonte', '(31) 3403-2826', '(31) 98640-7398', 'contato@jmtecnologiabh.com.br'),
(11, 'Cidade Nova', 'Avenida Cristiano Machado, Belo Horizonte', '(31) 3403-2826', '(31) 98640-7398', 'contato@jmtecnologiabh.com.br');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nome` varchar(200) DEFAULT NULL,
  `usuario_login` varchar(200) DEFAULT NULL,
  `usuario_email` varchar(200) DEFAULT NULL,
  `usuario_senha` varchar(200) DEFAULT NULL,
  `usuario_data` varchar(200) DEFAULT NULL,
  `usuario_imagem` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_nome`, `usuario_login`, `usuario_email`, `usuario_senha`, `usuario_data`, `usuario_imagem`) VALUES
(13, 'Webmaster', 'admin', 'superjjbh@gmail.com', '3f6a3db74286a6483d3db571b7e742b5', '08/04/2015', '1510792786.jpg');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Índices de tabela `area1`
--
ALTER TABLE `area1`
  ADD PRIMARY KEY (`area1_id`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`comentario_id`),
  ADD KEY `fk_comentario_pagina1_idx` (`comentario_pagina`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`curso_id`);

--
-- Índices de tabela `depoimento`
--
ALTER TABLE `depoimento`
  ADD PRIMARY KEY (`depoimento_id`);

--
-- Índices de tabela `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`foto_id`),
  ADD KEY `fk_foto_portfolio_idx` (`foto_portfolio`);

--
-- Índices de tabela `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`horario_id`);

--
-- Índices de tabela `icones`
--
ALTER TABLE `icones`
  ADD PRIMARY KEY (`icones_id`);

--
-- Índices de tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`inscricao_id`);

--
-- Índices de tabela `modulo1`
--
ALTER TABLE `modulo1`
  ADD PRIMARY KEY (`modulo1_id`);

--
-- Índices de tabela `modulo2`
--
ALTER TABLE `modulo2`
  ADD PRIMARY KEY (`modulo2_id`);

--
-- Índices de tabela `modulo3`
--
ALTER TABLE `modulo3`
  ADD PRIMARY KEY (`modulo3_id`);

--
-- Índices de tabela `modulo4`
--
ALTER TABLE `modulo4`
  ADD PRIMARY KEY (`modulo4_id`);

--
-- Índices de tabela `modulo5`
--
ALTER TABLE `modulo5`
  ADD PRIMARY KEY (`modulo5_id`);

--
-- Índices de tabela `modulo6`
--
ALTER TABLE `modulo6`
  ADD PRIMARY KEY (`modulo6_id`);

--
-- Índices de tabela `modulo7`
--
ALTER TABLE `modulo7`
  ADD PRIMARY KEY (`modulo7_id`);

--
-- Índices de tabela `modulo8`
--
ALTER TABLE `modulo8`
  ADD PRIMARY KEY (`modulo8_id`);

--
-- Índices de tabela `modulo9`
--
ALTER TABLE `modulo9`
  ADD PRIMARY KEY (`modulo9_id`);

--
-- Índices de tabela `modulo10`
--
ALTER TABLE `modulo10`
  ADD PRIMARY KEY (`modulo10_id`);

--
-- Índices de tabela `modulo11`
--
ALTER TABLE `modulo11`
  ADD PRIMARY KEY (`modulo11_id`);

--
-- Índices de tabela `modulo_aparencia`
--
ALTER TABLE `modulo_aparencia`
  ADD PRIMARY KEY (`modulo_aparencia_id`);

--
-- Índices de tabela `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`pagina_id`),
  ADD KEY `fk_pagina_area_idx` (`pagina_area`);

--
-- Índices de tabela `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolio_id`),
  ADD KEY `fk_portfolio_area1_idx` (`portfolio_area1`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`produto_id`);

--
-- Índices de tabela `profissional`
--
ALTER TABLE `profissional`
  ADD PRIMARY KEY (`profissional_id`);

--
-- Índices de tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`servico_id`);

--
-- Índices de tabela `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`slide_id`);

--
-- Índices de tabela `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`social_id`);

--
-- Índices de tabela `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`unidade_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `area1`
--
ALTER TABLE `area1`
  MODIFY `area1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `comentario_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `curso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `depoimento`
--
ALTER TABLE `depoimento`
  MODIFY `depoimento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `foto`
--
ALTER TABLE `foto`
  MODIFY `foto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT de tabela `horario`
--
ALTER TABLE `horario`
  MODIFY `horario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `icones`
--
ALTER TABLE `icones`
  MODIFY `icones_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=719;

--
-- AUTO_INCREMENT de tabela `inscricao`
--
ALTER TABLE `inscricao`
  MODIFY `inscricao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `modulo1`
--
ALTER TABLE `modulo1`
  MODIFY `modulo1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `modulo2`
--
ALTER TABLE `modulo2`
  MODIFY `modulo2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `modulo3`
--
ALTER TABLE `modulo3`
  MODIFY `modulo3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `modulo4`
--
ALTER TABLE `modulo4`
  MODIFY `modulo4_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `modulo5`
--
ALTER TABLE `modulo5`
  MODIFY `modulo5_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `modulo6`
--
ALTER TABLE `modulo6`
  MODIFY `modulo6_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `modulo7`
--
ALTER TABLE `modulo7`
  MODIFY `modulo7_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `modulo8`
--
ALTER TABLE `modulo8`
  MODIFY `modulo8_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `modulo9`
--
ALTER TABLE `modulo9`
  MODIFY `modulo9_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `modulo10`
--
ALTER TABLE `modulo10`
  MODIFY `modulo10_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `modulo11`
--
ALTER TABLE `modulo11`
  MODIFY `modulo11_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `modulo_aparencia`
--
ALTER TABLE `modulo_aparencia`
  MODIFY `modulo_aparencia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pagina`
--
ALTER TABLE `pagina`
  MODIFY `pagina_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de tabela `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `produto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `profissional`
--
ALTER TABLE `profissional`
  MODIFY `profissional_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `servico_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de tabela `slide`
--
ALTER TABLE `slide`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `social`
--
ALTER TABLE `social`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `unidade`
--
ALTER TABLE `unidade`
  MODIFY `unidade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_pagina` FOREIGN KEY (`comentario_pagina`) REFERENCES `pagina` (`pagina_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `pagina`
--
ALTER TABLE `pagina`
  ADD CONSTRAINT `fk_pagina_area` FOREIGN KEY (`pagina_area`) REFERENCES `area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `fk_portfolio_area1` FOREIGN KEY (`portfolio_area1`) REFERENCES `area1` (`area1_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
