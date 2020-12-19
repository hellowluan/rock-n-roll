-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Set-2020 às 20:58
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_modelo`
--
CREATE DATABASE IF NOT EXISTS `sistema_modelo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sistema_modelo`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `amplificadores`
--

CREATE TABLE `amplificadores` (
  `COD_AMP` int(11) NOT NULL,
  `TIPO_AMP` varchar(45) NOT NULL,
  `MARCA_AMP` varchar(45) NOT NULL,
  `MODELO_AMP` varchar(45) NOT NULL,
  `PRECO_AMP` decimal(10,2) NOT NULL,
  `FOTO_AMP` varchar(100) NOT NULL,
  `FILA_COMPRA_AMP` char(1) NOT NULL DEFAULT 'N',
  `VENDAS_COD_VEN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `amplificadores`
--

INSERT INTO `amplificadores` (`COD_AMP`, `TIPO_AMP`, `MARCA_AMP`, `MODELO_AMP`, `PRECO_AMP`, `FOTO_AMP`, `FILA_COMPRA_AMP`, `VENDAS_COD_VEN`) VALUES
(5, 'guitarra', 'Boss', 'Katana 100', '1500.00', 'img/guitarra_boss_katana100_transistorizado.jpg', 'N', NULL),
(7, 'baixo', 'Staner', 'BX 200', '999.99', 'img/baixo_staner_bx200a.jpg', 'N', NULL),
(8, 'guitarra', 'Marshall', 'Cube 50', '1900.00', 'img/guitarra_marshall_code50_transistorizado.jpg', 'N', NULL),
(9, 'baixo', 'AMPEG', 'BA108', '980.00', 'img/baixo_ampeg_ba108.jpg', 'V', 7),
(10, 'guitarra', 'VOX', 'AC 15', '2300.00', 'img/guitarra_vox_ac15_valvulado.jpg', 'V', 7),
(11, 'guitarra', 'BLACKSTAR', 'HT 5R', '3000.00', 'img/guitarra_blackstar_ht5r_valvulado.jpg', 'V', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `COD_FUN` int(11) NOT NULL,
  `NOME_FUN` varchar(45) NOT NULL,
  `LOGIN_FUN` varchar(45) NOT NULL,
  `SENHA_FUN` varchar(45) NOT NULL,
  `STATUS_FUN` varchar(45) NOT NULL DEFAULT 'ativo',
  `FUNCAO_FUN` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`COD_FUN`, `NOME_FUN`, `LOGIN_FUN`, `SENHA_FUN`, `STATUS_FUN`, `FUNCAO_FUN`) VALUES
(1, 'Administrador do Sistema', 'admin', '2', 'ativo', 'administrador'),
(2, 'Carlos Vendedor da Silva', 'carlim', '1', 'ativo', 'vendedor'),
(3, 'JoÃ£o Estoquista de Almeida', 'jao', '1', 'ativo', 'estoquista');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `COD_VEN` int(11) NOT NULL,
  `DATA_VEN` varchar(45) NOT NULL,
  `FUNCIONARIOS_COD_FUN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`COD_VEN`, `DATA_VEN`, `FUNCIONARIOS_COD_FUN`) VALUES
(7, '02/09/2020', 1),
(8, '02/09/2020', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `amplificadores`
--
ALTER TABLE `amplificadores`
  ADD PRIMARY KEY (`COD_AMP`),
  ADD KEY `fk_IMPRESSORAS_VENDAS1_idx` (`VENDAS_COD_VEN`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`COD_FUN`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`COD_VEN`),
  ADD KEY `fk_VENDAS_FUNCIONARIOS_idx` (`FUNCIONARIOS_COD_FUN`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `amplificadores`
--
ALTER TABLE `amplificadores`
  MODIFY `COD_AMP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `COD_FUN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `COD_VEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `amplificadores`
--
ALTER TABLE `amplificadores`
  ADD CONSTRAINT `fk_IMPRESSORAS_VENDAS1` FOREIGN KEY (`VENDAS_COD_VEN`) REFERENCES `vendas` (`COD_VEN`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_VENDAS_FUNCIONARIOS` FOREIGN KEY (`FUNCIONARIOS_COD_FUN`) REFERENCES `funcionarios` (`COD_FUN`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
