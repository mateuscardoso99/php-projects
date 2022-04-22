-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Nov-2019 às 02:10
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trabalho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `situacao` varchar(20) NOT NULL DEFAULT 'ativado',
  `idprofessor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `curso`, `situacao`, `idprofessor`) VALUES
(9, 'carlos', 'eeee', 'ativado', 5),
(12, 'mateus', 'rrertrfre', 'ativado', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aula`
--

CREATE TABLE `aula` (
  `id` int(11) NOT NULL,
  `idchave` int(11) NOT NULL,
  `idprofessor` int(11) DEFAULT NULL,
  `idaluno` int(11) DEFAULT NULL,
  `datainicio` varchar(12) NOT NULL,
  `idporteiro` int(11) NOT NULL,
  `datafim` varchar(12) NOT NULL DEFAULT 'em andamento',
  `status` varchar(20) NOT NULL DEFAULT 'em andamento'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aula`
--

INSERT INTO `aula` (`id`, `idchave`, `idprofessor`, `idaluno`, `datainicio`, `idporteiro`, `datafim`, `status`) VALUES
(58, 10, 5, 9, '2019-11-12', 15, '2019-12-02', 'encerrada'),
(59, 11, 5, NULL, '2019-07-01', 15, '2019-03-14', 'encerrada'),
(60, 10, 5, 9, '2020-06-12', 15, 'em andamento', 'em andamento'),
(61, 14, 5, 12, '2019-08-06', 15, '2018-10-24', 'encerrada'),
(62, 13, NULL, 12, '2019-10-14', 15, '2020-09-20', 'encerrada'),
(63, 15, 7, 12, '2020-05-09', 16, '2019-12-13', 'encerrada'),
(64, 11, NULL, 9, '2019-11-28', 14, '2019-03-14', 'encerrada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chave`
--

CREATE TABLE `chave` (
  `id` int(11) NOT NULL,
  `sala` varchar(20) NOT NULL,
  `situacao` varchar(20) NOT NULL DEFAULT 'liberada',
  `idporteiro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `chave`
--

INSERT INTO `chave` (`id`, `sala`, `situacao`, `idporteiro`) VALUES
(10, 'f311', 'ocupada', 14),
(11, 'c4', 'liberada', 15),
(12, 'c12', 'liberada', 14),
(13, 'b32', 'liberada', 14),
(14, 'f208', 'liberada', 15),
(15, 'f111', 'liberada', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `porteiro`
--

CREATE TABLE `porteiro` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `situacao` varchar(20) NOT NULL DEFAULT 'ativado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `porteiro`
--

INSERT INTO `porteiro` (`id`, `nome`, `situacao`) VALUES
(14, 'rrrr', 'ativado'),
(15, 'felix', 'ativado'),
(16, 'marcao', 'ativado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `graduacao` varchar(30) NOT NULL,
  `situacao` varchar(20) NOT NULL DEFAULT 'ativado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id`, `nome`, `graduacao`, `situacao`) VALUES
(5, 'joana', 'rtttt', 'ativado'),
(6, 'maria', '33wwq', 'desativado'),
(7, 'jorge silva', 'erffe', 'ativado');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idprofessor` (`idprofessor`);

--
-- Índices para tabela `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idchave` (`idchave`),
  ADD KEY `idporteiro` (`idporteiro`),
  ADD KEY `idprofessor` (`idprofessor`),
  ADD KEY `idaluno` (`idaluno`);

--
-- Índices para tabela `chave`
--
ALTER TABLE `chave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idporteiro` (`idporteiro`);

--
-- Índices para tabela `porteiro`
--
ALTER TABLE `porteiro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `aula`
--
ALTER TABLE `aula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de tabela `chave`
--
ALTER TABLE `chave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `porteiro`
--
ALTER TABLE `porteiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`idprofessor`) REFERENCES `professor` (`id`);

--
-- Limitadores para a tabela `aula`
--
ALTER TABLE `aula`
  ADD CONSTRAINT `aula_ibfk_1` FOREIGN KEY (`idchave`) REFERENCES `chave` (`id`),
  ADD CONSTRAINT `aula_ibfk_4` FOREIGN KEY (`idporteiro`) REFERENCES `porteiro` (`id`),
  ADD CONSTRAINT `aula_ibfk_5` FOREIGN KEY (`idprofessor`) REFERENCES `professor` (`id`),
  ADD CONSTRAINT `aula_ibfk_6` FOREIGN KEY (`idaluno`) REFERENCES `aluno` (`id`);

--
-- Limitadores para a tabela `chave`
--
ALTER TABLE `chave`
  ADD CONSTRAINT `chave_ibfk_1` FOREIGN KEY (`idporteiro`) REFERENCES `porteiro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
