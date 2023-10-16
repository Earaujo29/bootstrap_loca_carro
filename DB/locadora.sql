-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Nov-2017 às 05:55
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.8

create database locadora;
use locadora;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `locadora`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carro`
--

CREATE TABLE `carro` (
  `idCarro` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `sinopse` varchar(300) NOT NULL,
  `diretor` varchar(150) NOT NULL,
  `ano` int(11) NOT NULL,
  `produtora` varchar(150) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `trailer` varchar(150) NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `valor_locacao` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carro`
--

INSERT INTO `carro` (`idCarro`, `nome`, `sinopse`, `diretor`, `ano`, `produtora`, `quantidade`, `trailer`, `imagem`, `status`, `idUsuario`, `idCategoria`, `valor_locacao`) VALUES
(11, 'Siena', 'A maior variedade de carros Fiat Siena 1.6 Essence 4 Portas Completo Prata - Fiat estÃ£o no Mercado Livre. Encontre seu modelo: Grand Siena, Siena, Doblo.', 'FIAT', 2017, 'Prata', 200, 'E-rpHD9Pkvk', 'fiatsiena2010prata568d4512ba599jpg_500089989.jpg', 1, 2, 9, 100),
(13, 'GT-R', 'Car Commercial. Spot. Pub. Tv Ad. Advert.', 'Nissan', 2013, 'Laranja', 120, 'QmwIjn6rwQA', '2017nissangtrhdjpg_287040358.jpg', 1, 2, 14, 500),
(22, 'Ferrari 812 Superfast', 'Ferrari 812 Superfast', 'Ferrari', 2017, 'Vermelho', 3, 'b1YcwlmFEy8', '152mfeature1440jpg_1573762055.jpg', 1, 1, 14, 1200);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `categoria`, `status`) VALUES
(9, 'Sedan', 1),
(10, 'Hatch', 1),
(13, 'SW', 1),
(14, 'SPORTS', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf` varchar(17) NOT NULL,
  `dataNascimento` date NOT NULL,
  `sexo` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(18) NOT NULL,
  `status` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nome`, `cpf`, `dataNascimento`, `sexo`, `email`, `telefone`, `status`, `idUsuario`) VALUES
(8, 'Pedro', '504056406540 ', '1990-11-17', 1, 'pedro@gmail.com', '322234234', 1, 2),
(9, 'Marcos', '00.111.222-33 ', '1991-11-17', 1, 'marcos@gmail.com', '9888112', 1, 1),
(10, 'Cliente 2', ' 1111233', '1991-03-11', 1, 'wallisondbo@hotmail.com', '66121', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacao`
--

CREATE TABLE `locacao` (
  `idLocacao` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `dataEntrega` date NOT NULL,
  `dataDevolucao` date DEFAULT NULL,
  `valor` double NOT NULL,
  `status` int(11) NOT NULL,
  `dataCadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `locacao`
--

INSERT INTO `locacao` (`idLocacao`, `idUsuario`, `idCliente`, `dataEntrega`, `dataDevolucao`, `valor`, `status`, `dataCadastro`) VALUES
(39, 1, 8, '2017-11-20', '2017-11-17', 0, 2, '2017-11-17'),
(40, 1, 8, '2017-11-29', NULL, 0, 1, '2017-11-18'),
(41, 1, 10, '2017-11-21', NULL, 0, 1, '2017-11-18'),
(42, 1, 9, '2017-11-18', NULL, 0, 1, '2017-11-18'),
(43, 1, 9, '2017-11-22', NULL, 0, 1, '2017-11-18'),
(44, 1, 9, '2017-11-22', '2017-11-20', 1500, 2, '2017-11-18'),
(45, 1, 9, '2017-11-18', '2017-11-20', 3600, 2, '2017-11-18'),
(46, 1, 8, '2017-11-22', '2017-11-21', 4800, 2, '2017-11-18'),
(47, 1, 10, '2017-11-19', '0000-00-00', 2400, 0, '2017-11-18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacaocarro`
--

CREATE TABLE `locacaocarro` (
  `idLocacaoCarro` int(11) NOT NULL,
  `idCarro` int(11) NOT NULL,
  `idLocacao` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `locacaocarro`
--

INSERT INTO `locacaocarro` (`idLocacaoCarro`, `idCarro`, `idLocacao`, `status`) VALUES
(93, 11, 39, 1),
(98, 13, 44, 2),
(99, 22, 45, 2),
(101, 22, 46, 2),
(103, 22, 47, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `login` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `nivelAcesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `login`, `senha`, `nome`, `status`, `nivelAcesso`) VALUES
(1, 'adm@suport.com', '202cb962ac59075b964b07152d234b70', 'Administrador', 1, 2),
(2, 'talis@teste.com', '8e7e61449bdd699f2ddb740890e294fe', 'talis', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`idCarro`),
  ADD KEY `fk_filme_usuario_idx` (`idUsuario`),
  ADD KEY `fk_filme_categoria1_idx` (`idCategoria`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `fk_cliente_usuario1_idx` (`idUsuario`);

--
-- Indexes for table `locacao`
--
ALTER TABLE `locacao`
  ADD PRIMARY KEY (`idLocacao`),
  ADD KEY `fk_table1_usuario1_idx` (`idUsuario`),
  ADD KEY `fk_table1_cliente1_idx` (`idCliente`);

--
-- Indexes for table `locacaocarro`
--
ALTER TABLE `locacaocarro`
  ADD PRIMARY KEY (`idLocacaoCarro`),
  ADD KEY `fk_locacaoFilme_filme1_idx` (`idCarro`),
  ADD KEY `fk_locacaoFilme_locacao1_idx` (`idLocacao`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carro`
--
ALTER TABLE `carro`
  MODIFY `idCarro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `locacao`
--
ALTER TABLE `locacao`
  MODIFY `idLocacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `locacaocarro`
--
ALTER TABLE `locacaocarro`
  MODIFY `idLocacaoCarro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `carro`
--
ALTER TABLE `carro`
  ADD CONSTRAINT `fk_carro_categoria1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carro_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `locacao`
--
ALTER TABLE `locacao`
  ADD CONSTRAINT `fk_table1_cliente1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_table1_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `locacaocarro`
--
ALTER TABLE `locacaocarro`
  ADD CONSTRAINT `fk_locacaoFilme_filme1` FOREIGN KEY (`idCarro`) REFERENCES `carro` (`idCarro`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_locacaoFilme_locacao1` FOREIGN KEY (`idLocacao`) REFERENCES `locacao` (`idLocacao`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
