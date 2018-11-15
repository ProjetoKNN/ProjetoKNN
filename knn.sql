-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Nov-2018 às 22:46
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knn`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `cod` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `datanascimento` date NOT NULL,
  `telefonealuno` varchar(15) NOT NULL,
  `nomeresponsavel` varchar(150) DEFAULT NULL,
  `telefoneresponsavel` varchar(15) DEFAULT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) CHARACTER SET big5 NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alergiaalimentar` varchar(250) DEFAULT NULL,
  `remedio` varchar(250) DEFAULT NULL,
  `alergia` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`cod`, `nome`, `cpf`, `rg`, `datanascimento`, `telefonealuno`, `nomeresponsavel`, `telefoneresponsavel`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `email`, `alergiaalimentar`, `remedio`, `alergia`) VALUES
(16, 'Wellington Augusto Morais Santos', '122.800.826-40', '21.445.856', '1999-01-19', '35-98403-6830', 'Tereza Soares de Morais', '35-98436-3704', 'Rua JosÃ© Lopes Palma', 221, 'Residencial ParaÃ­so', 'Parais??polis', 'MG', '37660-000', 'wellingtonmoraisrx@gmail.com', '', '', ''),
(17, 'Rhuan Lucas Carvalho Almeida Silva', '122.715.756-80', '21.674.254', '2000-05-02', '35-99812-4311', 'Rosemara Aparecida Carvalho', '35-98419-3599', 'Adelino Dias de Carvalho', 146, 'Boa Vista 2', 'Parais??po', 'MG', '37660-000', 'rhuanlucas2011@gmail.com', 'Frango', 'Gardenal', 'Rinite');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE `aulas` (
  `cod` int(11) NOT NULL,
  `conteudo` varchar(150) NOT NULL,
  `dataaula` date NOT NULL,
  `turma_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`cod`, `conteudo`, `dataaula`, `turma_cod`) VALUES
(1, 'assaad', '2018-11-07', 27),
(2, 'assaad', '2018-11-07', 27),
(3, 'asdasdsa', '2018-11-15', 27),
(4, 'asdasdsa', '2018-11-15', 27),
(5, 'asdasdsa', '2018-11-15', 27),
(6, 'adasdadad', '2018-11-15', 28),
(7, 'adasdadad', '2018-11-15', 28),
(8, 'asdasd', '2018-11-15', 28),
(9, '11241', '2018-10-30', 28),
(10, '11241', '2018-10-30', 28),
(11, 'sadasasda', '2018-11-15', 28),
(12, 'DDASDAD', '2018-11-15', 28),
(13, 'xdxdxdxdxd', '2018-11-07', 28),
(14, 'asdsada', '2018-11-15', 28),
(15, 'asdsad', '2018-11-15', 28),
(16, 'wqwqewqe', '2018-11-15', 28);

-- --------------------------------------------------------

--
-- Estrutura da tabela `boletim`
--

CREATE TABLE `boletim` (
  `cod` int(11) NOT NULL,
  `falta` int(11) DEFAULT NULL,
  `nota1` float DEFAULT NULL,
  `nota2` float DEFAULT NULL,
  `nota3` float DEFAULT NULL,
  `nota4` float DEFAULT NULL,
  `nota5` float DEFAULT NULL,
  `nota6` float DEFAULT NULL,
  `media` float DEFAULT NULL,
  `reposicao` int(11) DEFAULT NULL,
  `aluno_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `boletim`
--

INSERT INTO `boletim` (`cod`, `falta`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nota6`, `media`, `reposicao`, `aluno_cod`) VALUES
(0, 3, 55, 5, 5, 5, 5, 55, 21.6667, 5, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `nome` varchar(45) NOT NULL,
  `duracao` int(11) NOT NULL,
  `cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`nome`, `duracao`, `cod`) VALUES
('Ingles', 0, 16),
('Espanhol', 0, 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `frequencia`
--

CREATE TABLE `frequencia` (
  `aluno_cod` int(11) NOT NULL,
  `aulas_cod` int(11) NOT NULL,
  `falta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `frequencia`
--

INSERT INTO `frequencia` (`aluno_cod`, `aulas_cod`, `falta`) VALUES
(16, 13, 1),
(16, 14, 1),
(16, 16, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `interessados`
--

CREATE TABLE `interessados` (
  `cod` int(11) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `privilegio` int(11) DEFAULT NULL,
  `datav` date DEFAULT NULL,
  `horario` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `usuario` varchar(16) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `privilegio` varchar(3) NOT NULL,
  `al` varchar(15) DEFAULT NULL,
  `pr` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`usuario`, `senha`, `privilegio`, `al`, `pr`) VALUES
('adm', 'adm', 'adm', NULL, NULL),
('Ana', 'Ana', 'prf', NULL, '125.558.484-84'),
('Rhuan', 'Rhuan', 'usr', '122.715.756-80', NULL),
('robson', 'robson', 'prf', NULL, '122.854.584-58'),
('Well', 'Well', 'usr', '122.800.826-40', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE `matricula` (
  `datamatricula` date NOT NULL,
  `aluno_cod` int(11) NOT NULL,
  `turma_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `matricula`
--

INSERT INTO `matricula` (`datamatricula`, `aluno_cod`, `turma_cod`) VALUES
('2018-11-15', 16, 28);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `cod` int(11) NOT NULL,
  `codAluno` int(11) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `datamat` date NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagamentos`
--

INSERT INTO `pagamentos` (`cod`, `codAluno`, `valor`, `datamat`, `descricao`) VALUES
(2, 16, '250,50', '2018-11-15', 'Mensalidade'),
(3, 16, '20, 50', '2018-11-15', 'VAN'),
(4, 16, '4142124', '2018-11-15', 'Material'),
(9, 16, '1231231', '2018-11-15', 'Mensalidade'),
(10, 16, '2141214', '2018-11-15', 'Mensalidade'),
(11, 16, '414214141', '2018-11-15', 'Mensalidade'),
(12, 16, '14212421', '2018-11-15', 'Mensalidade');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `cod` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`cod`, `nome`, `cpf`, `rg`, `rua`, `email`, `telefone`, `numero`, `bairro`, `cidade`, `estado`) VALUES
(9, 'Robson Silva', '122.854.584-58', '21.544.564', 'Rua Do Robinho', 'robinho@gmail.com', '35-98425-4454', 154, 'Bairro do Robinho', 'BrazÃ³polis', 'MG'),
(10, 'Ana Paula', '125.558.484-84', '21.848.484', 'Rua da NaPaula', 'napaula@gmail.com', '35-98454-6546', 24, 'Xesquedele', 'ParaisÃ³polis', 'MG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recado`
--

CREATE TABLE `recado` (
  `cod` int(11) NOT NULL,
  `recado` varchar(500) NOT NULL,
  `turma_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `cod` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `codProf` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `curso_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`cod`, `nome`, `codProf`, `qtd`, `curso_cod`) VALUES
(27, 'English 1', 9, 10, 16),
(28, 'English 2', 9, 10, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`cod`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD UNIQUE KEY `rg_UNIQUE` (`rg`);

--
-- Indexes for table `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_aulas_turma1_idx` (`turma_cod`);

--
-- Indexes for table `boletim`
--
ALTER TABLE `boletim`
  ADD PRIMARY KEY (`aluno_cod`,`cod`),
  ADD KEY `fk_boletim_aluno1_idx` (`aluno_cod`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `frequencia`
--
ALTER TABLE `frequencia`
  ADD PRIMARY KEY (`aulas_cod`,`aluno_cod`),
  ADD KEY `fk_frequencia_aluno1_idx` (`aluno_cod`);

--
-- Indexes for table `interessados`
--
ALTER TABLE `interessados`
  ADD PRIMARY KEY (`cod`),
  ADD UNIQUE KEY `horario_UNIQUE` (`horario`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`usuario`),
  ADD KEY `fk_login_aluno1_idx` (`al`),
  ADD KEY `fk_login_professor1_idx` (`pr`);

--
-- Indexes for table `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`aluno_cod`,`turma_cod`),
  ADD KEY `fk_matricula_turma1_idx` (`turma_cod`);

--
-- Indexes for table `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_pagamentos_aluno1_idx` (`codAluno`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`cod`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD UNIQUE KEY `rg_UNIQUE` (`rg`);

--
-- Indexes for table `recado`
--
ALTER TABLE `recado`
  ADD PRIMARY KEY (`cod`,`turma_cod`),
  ADD KEY `fk_recado_turma1_idx` (`turma_cod`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`cod`,`curso_cod`),
  ADD KEY `fk_turma_professor1_idx` (`codProf`),
  ADD KEY `curso_cod` (`curso_cod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `interessados`
--
ALTER TABLE `interessados`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `fk_aulas_turma1` FOREIGN KEY (`turma_cod`) REFERENCES `turma` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `boletim`
--
ALTER TABLE `boletim`
  ADD CONSTRAINT `fk_boletim_aluno1` FOREIGN KEY (`aluno_cod`) REFERENCES `aluno` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `frequencia`
--
ALTER TABLE `frequencia`
  ADD CONSTRAINT `fk_frequencia_aluno1` FOREIGN KEY (`aluno_cod`) REFERENCES `aluno` (`cod`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `frequencia_ibfk_1` FOREIGN KEY (`aulas_cod`) REFERENCES `aulas` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_login_aluno1` FOREIGN KEY (`al`) REFERENCES `aluno` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_login_professor1` FOREIGN KEY (`pr`) REFERENCES `professor` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `fk_matricula_aluno1` FOREIGN KEY (`aluno_cod`) REFERENCES `aluno` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_matricula_turma1` FOREIGN KEY (`turma_cod`) REFERENCES `turma` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `fk_pagamentos_aluno1` FOREIGN KEY (`codAluno`) REFERENCES `aluno` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `recado`
--
ALTER TABLE `recado`
  ADD CONSTRAINT `fk_recado_turma1` FOREIGN KEY (`turma_cod`) REFERENCES `turma` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fk_turma_professor1` FOREIGN KEY (`codProf`) REFERENCES `professor` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`curso_cod`) REFERENCES `curso` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
