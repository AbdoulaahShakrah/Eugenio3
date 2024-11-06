-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Jan-2024 às 18:23
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `eugenio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacao`
--

CREATE TABLE `classificacao` (
  `PK_Classificacao` int(11) NOT NULL,
  `WPM` float DEFAULT NULL,
  `QTD_Erros` int(11) DEFAULT NULL,
  `QTD_Certas` int(11) DEFAULT NULL,
  `Tempo` time DEFAULT NULL,
  `Pontuacao_Final` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `classificacao`
--

INSERT INTO `classificacao` (`PK_Classificacao`, `WPM`, `QTD_Erros`, `QTD_Certas`, `Tempo`, `Pontuacao_Final`) VALUES
(1, 13, 0, 3, '00:00:14', 43),
(2, 26, 0, 3, '00:00:07', 56),
(3, 0, 0, 0, '00:01:59', 0),
(4, 0, 0, 0, '00:11:00', 0),
(5, 60, 7, 0, '00:01:00', 25),
(6, 0, 0, 0, '00:00:00', 0),
(7, 0, 0, 0, '00:00:00', 0),
(8, 6, 0, 1, '00:10:00', 16),
(9, 20, 1, 0, '00:03:00', 15),
(10, 12, 1, 0, '00:05:00', 7),
(11, 12, 1, 0, '00:05:00', 7),
(12, 30, 1, 0, '00:02:00', 25),
(13, 7, 1, 0, '00:09:00', 2),
(14, 30, 1, 0, '00:02:00', 25),
(15, 20, 1, 0, '00:03:00', 15),
(16, 20, 1, 0, '00:03:00', 15),
(17, 30, 1, 0, '00:02:00', 25),
(18, 10, 1, 0, '00:06:00', 5),
(19, 30, 1, 0, '00:02:00', 25),
(20, 30, 1, 0, '00:02:00', 25),
(21, 30, 1, 0, '00:02:00', 25),
(22, 20, 1, 0, '00:03:00', 15),
(23, 0, 0, 0, '00:01:00', 0),
(24, 60, 1, 0, '00:01:00', 55),
(25, 20, 1, 0, '00:03:00', 15),
(26, 20, 1, 0, '00:03:00', 15),
(27, 60, 1, 0, '00:01:00', 55),
(28, 30, 1, 0, '00:02:00', 25),
(29, 20, 3, 0, '00:03:00', 5),
(30, 60, 3, 0, '00:01:00', 45),
(31, 60, 3, 0, '00:01:00', 45);

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracao`
--

CREATE TABLE `configuracao` (
  `PK_Configuracao` int(11) NOT NULL,
  `Titulo` varchar(255) DEFAULT NULL,
  `Tempo_Configuracao` time DEFAULT NULL,
  `Texto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `configuracao`
--

INSERT INTO `configuracao` (`PK_Configuracao`, `Titulo`, `Tempo_Configuracao`, `Texto`) VALUES
(1, 'Configuração 1', '00:02:00', 'Frase de teste para a aplicação eugénio'),
(2, 'Configuracao 2', '00:02:00', 'Frase de teste para a aplicação eugénio'),
(3, 'Configuracao 3', '00:02:00', 'Texto Config 3'),
(4, 'Configuracao 4', '00:02:00', 'Texto Config 4'),
(5, 'Configuracao 5', '00:02:00', 'Texto Config 5'),
(6, 'Configuracao 6', '00:02:00', 'Texto Config 6'),
(7, 'confi 88', '11:27:00', 'asasasdasdfasdfsdfsdfsd'),
(8, 'configuraçao33', '00:01:00', 'asdkjasdkjfkasjfkaskfjasdkfjasdkfsdkfjksdjfksdjkfksjfksjksfjksf'),
(9, 'fghhj', '00:02:00', 'ghjjg'),
(10, 'fghhj', '00:02:00', 'ghjjg'),
(11, 'fghhj', '00:02:00', 'ghjjg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

CREATE TABLE `jogador` (
  `PK_Jogador` int(11) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Idade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `jogador`
--

INSERT INTO `jogador` (`PK_Jogador`, `Nome`, `Idade`) VALUES
(1, NULL, 0),
(2, 'aaaa', 0),
(3, 'asasa', 0),
(4, 'aas', 0),
(5, 'asdas', 0),
(6, 'fghfg', 0),
(7, 'miguel', 0),
(8, 'joao', 0),
(9, 'manel', 0),
(10, 'joki', 0),
(11, 'hhhh', 0),
(12, NULL, 0),
(13, 'fghfg', 0),
(14, 'miguel', 0),
(15, 'kkkkkkk', 0),
(16, 'sdsffsf', 0),
(17, 'miguel', 0),
(18, 'joao', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessao`
--

CREATE TABLE `sessao` (
  `PK_Sessao` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Data_sessao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `sessao`
--

INSERT INTO `sessao` (`PK_Sessao`, `Name`, `Data_sessao`) VALUES
(1, '', '2023-10-24'),
(2, '', '2023-12-12'),
(3, '', '2024-01-05'),
(4, '', '2024-01-23'),
(5, 'TesteSessao', '2024-01-23'),
(6, 'ffff', '2024-01-23'),
(7, 'hhhh', '2024-01-23'),
(8, 'hhhhhhh', '2024-01-23'),
(9, 'asasasadsd', '2024-01-23'),
(10, 'fgfdgfhg', '2024-01-23'),
(11, 'fgfdgfhg', '2024-01-23'),
(12, 'tgfhfhg', '2024-01-23'),
(13, 'tgfhfhg', '2024-01-23'),
(14, 'assdasdas', '2024-01-23'),
(15, 'adminasasd', '2024-01-24'),
(16, 'adminasasd', '2024-01-24'),
(17, 'aasdu8ysad', '2024-01-24'),
(18, 'esdf', '2024-01-24'),
(19, 'assda', '2024-01-25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

CREATE TABLE `teste` (
  `PK_Teste` int(11) NOT NULL,
  `FK_Sessao` int(11) DEFAULT NULL,
  `FK_Configuracao` int(11) DEFAULT NULL,
  `FK_Jogador` int(11) DEFAULT NULL,
  `FK_Classificacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `teste`
--

INSERT INTO `teste` (`PK_Teste`, `FK_Sessao`, `FK_Configuracao`, `FK_Jogador`, `FK_Classificacao`) VALUES
(1, 1, 1, 1, NULL),
(2, 1, 2, 1, NULL),
(3, 1, 3, 1, NULL),
(4, 1, 4, 1, NULL),
(5, 1, 5, 1, NULL),
(6, 1, 6, 1, NULL),
(7, 1, 1, 2, 1),
(8, 1, 2, 2, NULL),
(9, 1, 3, 2, 2),
(10, 1, 4, 2, NULL),
(11, 1, 5, 2, NULL),
(12, 1, 6, 2, NULL),
(13, 2, 1, 3, 4),
(14, 2, 2, 3, NULL),
(15, 2, 3, 3, NULL),
(16, 2, 4, 3, NULL),
(17, 2, 5, 3, NULL),
(18, 2, 6, 3, NULL),
(19, 3, 1, 4, 5),
(20, 3, 2, 4, NULL),
(21, 3, 3, 4, NULL),
(22, 3, 4, 4, NULL),
(23, 3, 5, 4, NULL),
(24, 3, 6, 4, NULL),
(25, 5, 1, 5, NULL),
(26, 5, 2, 5, NULL),
(27, 5, 3, 5, NULL),
(28, 5, 4, 5, NULL),
(29, 5, 5, 5, NULL),
(30, 5, 6, 5, NULL),
(31, 19, 1, 6, NULL),
(32, 19, 2, 6, NULL),
(33, 19, 3, 6, NULL),
(34, 19, 4, 6, NULL),
(35, 19, 5, 6, NULL),
(36, 19, 6, 6, NULL),
(37, 19, 1, 7, NULL),
(38, 19, 2, 7, NULL),
(39, 19, 3, 7, NULL),
(40, 19, 4, 7, NULL),
(41, 19, 5, 7, NULL),
(42, 19, 6, 7, NULL),
(43, 11, 1, 8, NULL),
(44, 11, 2, 8, NULL),
(45, 11, 3, 8, NULL),
(46, 11, 4, 8, NULL),
(47, 11, 5, 8, NULL),
(48, 11, 6, 8, NULL),
(49, 12, 1, 9, NULL),
(50, 12, 2, 9, NULL),
(51, 12, 3, 9, NULL),
(52, 12, 4, 9, NULL),
(53, 12, 5, 9, NULL),
(54, 12, 6, 9, NULL),
(55, 11, 1, 10, NULL),
(56, 11, 2, 10, NULL),
(57, 11, 3, 10, NULL),
(58, 11, 4, 10, NULL),
(59, 11, 5, 10, NULL),
(60, 11, 6, 10, NULL),
(61, 16, 1, 11, NULL),
(62, 16, 2, 11, NULL),
(63, 16, 3, 11, NULL),
(64, 16, 4, 11, NULL),
(65, 16, 5, 11, NULL),
(66, 16, 6, 11, NULL),
(67, 9, 1, 12, NULL),
(68, 9, 2, 12, NULL),
(69, 9, 3, 12, NULL),
(70, 9, 4, 12, NULL),
(71, 9, 5, 12, NULL),
(72, 9, 6, 12, NULL),
(73, 9, 1, 13, NULL),
(74, 9, 2, 13, NULL),
(75, 9, 3, 13, NULL),
(76, 9, 4, 13, NULL),
(77, 9, 5, 13, NULL),
(78, 9, 6, 13, NULL),
(79, 12, 1, 14, NULL),
(80, 12, 2, 14, NULL),
(81, 12, 3, 14, NULL),
(82, 12, 4, 14, NULL),
(83, 12, 5, 14, NULL),
(84, 12, 6, 14, NULL),
(85, 12, 7, 14, NULL),
(86, 12, 8, 14, NULL),
(87, 12, 9, 14, NULL),
(88, 12, 10, 14, NULL),
(89, 12, 11, 14, 17),
(90, 10, 1, 15, NULL),
(91, 10, 2, 15, NULL),
(92, 10, 3, 15, NULL),
(93, 10, 4, 15, NULL),
(94, 10, 5, 15, NULL),
(95, 10, 6, 15, NULL),
(96, 10, 7, 15, 21),
(97, 10, 8, 15, NULL),
(98, 10, 9, 15, NULL),
(99, 10, 10, 15, NULL),
(100, 10, 11, 15, NULL),
(101, 14, 1, 16, NULL),
(102, 14, 2, 16, NULL),
(103, 14, 3, 16, NULL),
(104, 14, 4, 16, NULL),
(105, 14, 5, 16, NULL),
(106, 14, 6, 16, NULL),
(107, 14, 7, 16, NULL),
(108, 14, 8, 16, 27),
(109, 14, 9, 16, NULL),
(110, 14, 10, 16, NULL),
(111, 14, 11, 16, 28),
(112, 13, 1, 17, NULL),
(113, 13, 2, 17, NULL),
(114, 13, 3, 17, NULL),
(115, 13, 4, 17, NULL),
(116, 13, 5, 17, NULL),
(117, 13, 6, 17, NULL),
(118, 13, 7, 17, NULL),
(119, 13, 8, 17, NULL),
(120, 13, 9, 17, NULL),
(121, 13, 10, 17, NULL),
(122, 13, 11, 17, NULL),
(123, 13, 1, 18, NULL),
(124, 13, 2, 18, NULL),
(125, 13, 3, 18, NULL),
(126, 13, 4, 18, NULL),
(127, 13, 5, 18, NULL),
(128, 13, 6, 18, NULL),
(129, 13, 7, 18, NULL),
(130, 13, 8, 18, NULL),
(131, 13, 9, 18, NULL),
(132, 13, 10, 18, NULL),
(133, 13, 11, 18, NULL),
(134, 13, 6, 17, 29),
(135, 13, 6, 17, 30),
(136, 13, 6, 17, 31);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `classificacao`
--
ALTER TABLE `classificacao`
  ADD PRIMARY KEY (`PK_Classificacao`);

--
-- Índices para tabela `configuracao`
--
ALTER TABLE `configuracao`
  ADD PRIMARY KEY (`PK_Configuracao`);

--
-- Índices para tabela `jogador`
--
ALTER TABLE `jogador`
  ADD PRIMARY KEY (`PK_Jogador`);

--
-- Índices para tabela `sessao`
--
ALTER TABLE `sessao`
  ADD PRIMARY KEY (`PK_Sessao`);

--
-- Índices para tabela `teste`
--
ALTER TABLE `teste`
  ADD PRIMARY KEY (`PK_Teste`),
  ADD KEY `FK_Sessao` (`FK_Sessao`),
  ADD KEY `FK_Configuracao` (`FK_Configuracao`),
  ADD KEY `FK_Jogador` (`FK_Jogador`),
  ADD KEY `FK_Classificacao` (`FK_Classificacao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `classificacao`
--
ALTER TABLE `classificacao`
  MODIFY `PK_Classificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `configuracao`
--
ALTER TABLE `configuracao`
  MODIFY `PK_Configuracao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `jogador`
--
ALTER TABLE `jogador`
  MODIFY `PK_Jogador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `sessao`
--
ALTER TABLE `sessao`
  MODIFY `PK_Sessao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `teste`
--
ALTER TABLE `teste`
  MODIFY `PK_Teste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `teste`
--
ALTER TABLE `teste`
  ADD CONSTRAINT `teste_ibfk_1` FOREIGN KEY (`FK_Sessao`) REFERENCES `sessao` (`PK_Sessao`),
  ADD CONSTRAINT `teste_ibfk_2` FOREIGN KEY (`FK_Configuracao`) REFERENCES `configuracao` (`PK_Configuracao`),
  ADD CONSTRAINT `teste_ibfk_3` FOREIGN KEY (`FK_Jogador`) REFERENCES `jogador` (`PK_Jogador`),
  ADD CONSTRAINT `teste_ibfk_4` FOREIGN KEY (`FK_Classificacao`) REFERENCES `classificacao` (`PK_Classificacao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
