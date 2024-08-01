-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Jun-2019 às 16:57
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hypersport`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

CREATE TABLE `carros` (
  `chassi` varchar(15) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `ano` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `cor` varchar(45) DEFAULT NULL,
  `quantidade` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `data_nasc` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `país` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `e-mail` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `numero_local` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `cliente_cpf` varchar(15) NOT NULL,
  `carros_chassi` varchar(15) NOT NULL,
  `codigo_compra` varchar(45) NOT NULL,
  `data` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `cnpj` varchar(20) NOT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `nome_completo` varchar(45) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `país` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `numero_local` varchar(45) DEFAULT NULL,
  `carros_chassi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `data_nasc` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `cod_pagamento` varchar(15) NOT NULL,
  `descrição` varchar(45) DEFAULT NULL,
  `compra_cliente_cpf` varchar(15) NOT NULL,
  `compra_carros_chassi` varchar(15) NOT NULL,
  `compra_codigo_compra` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`chassi`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`cliente_cpf`,`carros_chassi`,`codigo_compra`),
  ADD KEY `carros_chassi` (`carros_chassi`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`cnpj`,`carros_chassi`),
  ADD KEY `carros_chassi` (`carros_chassi`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`cod_pagamento`,`compra_cliente_cpf`,`compra_carros_chassi`,`compra_codigo_compra`),
  ADD KEY `compra_cliente_cpf` (`compra_cliente_cpf`,`compra_carros_chassi`,`compra_codigo_compra`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`cliente_cpf`) REFERENCES `cliente` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`carros_chassi`) REFERENCES `carros` (`chassi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD CONSTRAINT `fornecedor_ibfk_1` FOREIGN KEY (`carros_chassi`) REFERENCES `carros` (`chassi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`compra_cliente_cpf`,`compra_carros_chassi`,`compra_codigo_compra`) REFERENCES `compra` (`cliente_cpf`, `carros_chassi`, `codigo_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
