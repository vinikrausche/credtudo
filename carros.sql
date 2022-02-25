-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Fev-2022 às 18:29
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `credtudo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

CREATE TABLE `carros` (
  `id` int(11) NOT NULL,
  `proprietario` varchar(255) DEFAULT NULL,
  `id_proprietario` varchar(255) DEFAULT NULL,
  `placa` varchar(50) DEFAULT NULL,
  `chassi` varchar(50) DEFAULT NULL,
  `renavam` varchar(50) DEFAULT NULL,
  `ipva` int(50) DEFAULT NULL,
  `licenciamento` varchar(50) DEFAULT NULL,
  `multas` int(255) DEFAULT NULL,
  `foto_carro` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`id`, `proprietario`, `id_proprietario`, `placa`, `chassi`, `renavam`, `ipva`, `licenciamento`, `multas`, `foto_carro`) VALUES
(10, 'Gilberto', '463.257.618-20', 'ABH-7D89', 'AHSNDUFDOLK089IUIJEKJKK', '11NJNSDH-JJ', 3, 'nao', 3, 'a686dee65b7d751cd748066d9c0eab1c.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carros`
--
ALTER TABLE `carros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
