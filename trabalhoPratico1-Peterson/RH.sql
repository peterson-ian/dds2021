-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Jul-2021 às 20:11
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rh`
--
CREATE DATABASE IF NOT EXISTS `rh` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `rh`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE `departamento` (
  `ID_DEPARTAMENTO` int(11) NOT NULL,
  `NOME_DEPARTAMENTO` varchar(30) DEFAULT NULL,
  `ID_GERENTE` int(11) DEFAULT NULL,
  `ID_LOCALIZACAO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `departamento`:
--   `ID_LOCALIZACAO`
--       `localizacao` -> `ID_LOCALIZACAO`
--   `ID_GERENTE`
--       `funcionario` -> `ID_FUNCIONARIO`
--

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`ID_DEPARTAMENTO`, `NOME_DEPARTAMENTO`, `ID_GERENTE`, `ID_LOCALIZACAO`) VALUES
(8, 'Administração', 7, 10),
(9, 'TI', NULL, 19),
(11, 'Estoque', 6, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcao`
--

CREATE TABLE `funcao` (
  `ID_FUNCAO` varchar(10) NOT NULL,
  `TITULO_FUNCAO` varchar(35) DEFAULT NULL,
  `SALARIO_MINIMO` float(22,2) DEFAULT NULL,
  `SALARIO_MAXIMO` float(22,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `funcao`:
--

--
-- Extraindo dados da tabela `funcao`
--

INSERT INTO `funcao` (`ID_FUNCAO`, `TITULO_FUNCAO`, `SALARIO_MINIMO`, `SALARIO_MAXIMO`) VALUES
('AD_SS', 'Supervisor Administrador', 5000.00, 8800.00),
('TT_AA', 'Administrador', 78000.00, 5000.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `ID_FUNCIONARIO` int(11) NOT NULL,
  `NOME` varchar(20) DEFAULT NULL,
  `SOBRENOME` varchar(25) DEFAULT NULL,
  `EMAIL` varchar(25) DEFAULT NULL,
  `TELEFONE` varchar(20) DEFAULT NULL,
  `DATA_CONTRATACAO` date DEFAULT NULL,
  `ID_FUNCAO` varchar(10) DEFAULT NULL,
  `SALARIO` float(22,2) DEFAULT NULL,
  `COMISSAO` int(11) DEFAULT NULL,
  `ID_GERENTE` int(11) DEFAULT NULL,
  `ID_DEPARTAMENTO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `funcionario`:
--   `ID_GERENTE`
--       `funcionario` -> `ID_FUNCIONARIO`
--   `ID_DEPARTAMENTO`
--       `departamento` -> `ID_DEPARTAMENTO`
--   `ID_FUNCAO`
--       `funcao` -> `ID_FUNCAO`
--

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`ID_FUNCIONARIO`, `NOME`, `SOBRENOME`, `EMAIL`, `TELEFONE`, `DATA_CONTRATACAO`, `ID_FUNCAO`, `SALARIO`, `COMISSAO`, `ID_GERENTE`, `ID_DEPARTAMENTO`) VALUES
(6, 'Peterson', 'Ian', 'peterson@gmail.com', '(16) 90000-8000', '2021-07-10', 'TT_AA', 8000.00, 5, NULL, 9),
(7, 'Sr. Teste', 'Sem Ideia', 'teste01@gmail.com', '(00)10010-1000', '2021-07-05', 'AD_SS', 9000.00, 8, NULL, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_funcoes`
--

CREATE TABLE `historico_funcoes` (
  `ID_FUNCIONARIO` int(11) NOT NULL,
  `DATA_INICIAL` date NOT NULL,
  `DATA_FINAL` date DEFAULT NULL,
  `ID_FUNCAO` varchar(10) DEFAULT NULL,
  `ID_DEPARTAMENTO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `historico_funcoes`:
--   `ID_FUNCIONARIO`
--       `funcionario` -> `ID_FUNCIONARIO`
--   `ID_FUNCAO`
--       `funcao` -> `ID_FUNCAO`
--   `ID_DEPARTAMENTO`
--       `departamento` -> `ID_DEPARTAMENTO`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao`
--

CREATE TABLE `localizacao` (
  `ID_LOCALIZACAO` int(11) NOT NULL,
  `ENDERECO` varchar(40) DEFAULT NULL,
  `CEP` varchar(12) DEFAULT NULL,
  `CIDADE` varchar(30) DEFAULT NULL,
  `ESTADO` varchar(25) DEFAULT NULL,
  `ID_PAIS` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `localizacao`:
--   `ID_PAIS`
--       `pais` -> `ID_PAIS`
--

--
-- Extraindo dados da tabela `localizacao`
--

INSERT INTO `localizacao` (`ID_LOCALIZACAO`, `ENDERECO`, `CEP`, `CIDADE`, `ESTADO`, `ID_PAIS`) VALUES
(9, 'Rua. Teste, 808', '5450207', 'New York', 'New York', 'EU'),
(10, 'Av. Teste, 002', '8000', 'Cidade-TESTE', 'Estado-TESTE', 'JP'),
(19, 'Rua. Teste, 001', '9854512', 'Araraquara', 'São Paulo', 'BR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE `pais` (
  `ID_PAIS` char(2) NOT NULL,
  `NOME_PAIS` varchar(40) DEFAULT NULL,
  `ID_REGIAO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `pais`:
--   `ID_REGIAO`
--       `regiao` -> `ID_REGIAO`
--

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`ID_PAIS`, `NOME_PAIS`, `ID_REGIAO`) VALUES
('BR', 'Brasil', 45),
('EG', 'Egito', 50),
('EU', 'Estados Unidos', 45),
('JP', 'Japão', 52),
('PT', 'Portugual', 49);

-- --------------------------------------------------------

--
-- Estrutura da tabela `regiao`
--

CREATE TABLE `regiao` (
  `ID_REGIAO` int(11) NOT NULL,
  `NOME_REGIAO` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `regiao`:
--

--
-- Extraindo dados da tabela `regiao`
--

INSERT INTO `regiao` (`ID_REGIAO`, `NOME_REGIAO`) VALUES
(45, 'Americas'),
(49, 'Europa'),
(50, 'Oriente Medio and Africa'),
(51, 'Antarctica'),
(52, 'Asia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `usuarios`:
--

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `senha`, `perfil`) VALUES
(1, 'admin@gmail.com', '1234', 1),
(2, 'gerente@gmail.com', 'qwert', 2),
(3, 'gestorRH@gmail.com', 'gestor123', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`ID_DEPARTAMENTO`),
  ADD KEY `departamento_ibfk_1` (`ID_LOCALIZACAO`),
  ADD KEY `departamento_ibfk_2` (`ID_GERENTE`);

--
-- Índices para tabela `funcao`
--
ALTER TABLE `funcao`
  ADD PRIMARY KEY (`ID_FUNCAO`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`ID_FUNCIONARIO`),
  ADD KEY `funcionario_ibfk_1` (`ID_GERENTE`),
  ADD KEY `funcionario_ibfk_2` (`ID_DEPARTAMENTO`),
  ADD KEY `funcionario_ibfk_3` (`ID_FUNCAO`);

--
-- Índices para tabela `historico_funcoes`
--
ALTER TABLE `historico_funcoes`
  ADD PRIMARY KEY (`ID_FUNCIONARIO`,`DATA_INICIAL`),
  ADD KEY `ID_FUNCAO` (`ID_FUNCAO`),
  ADD KEY `ID_DEPARTAMENTO` (`ID_DEPARTAMENTO`);

--
-- Índices para tabela `localizacao`
--
ALTER TABLE `localizacao`
  ADD PRIMARY KEY (`ID_LOCALIZACAO`),
  ADD KEY `localizacao_ibfk_1` (`ID_PAIS`);

--
-- Índices para tabela `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`ID_PAIS`),
  ADD KEY `pais_ibfk_1` (`ID_REGIAO`);

--
-- Índices para tabela `regiao`
--
ALTER TABLE `regiao`
  ADD PRIMARY KEY (`ID_REGIAO`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `departamento`
--
ALTER TABLE `departamento`
  MODIFY `ID_DEPARTAMENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `ID_FUNCIONARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `localizacao`
--
ALTER TABLE `localizacao`
  MODIFY `ID_LOCALIZACAO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `regiao`
--
ALTER TABLE `regiao`
  MODIFY `ID_REGIAO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_ibfk_1` FOREIGN KEY (`ID_LOCALIZACAO`) REFERENCES `localizacao` (`ID_LOCALIZACAO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `departamento_ibfk_2` FOREIGN KEY (`ID_GERENTE`) REFERENCES `funcionario` (`ID_FUNCIONARIO`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`ID_GERENTE`) REFERENCES `funcionario` (`ID_FUNCIONARIO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `funcionario_ibfk_2` FOREIGN KEY (`ID_DEPARTAMENTO`) REFERENCES `departamento` (`ID_DEPARTAMENTO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `funcionario_ibfk_3` FOREIGN KEY (`ID_FUNCAO`) REFERENCES `funcao` (`ID_FUNCAO`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `historico_funcoes`
--
ALTER TABLE `historico_funcoes`
  ADD CONSTRAINT `historico_funcoes_ibfk_1` FOREIGN KEY (`ID_FUNCIONARIO`) REFERENCES `funcionario` (`ID_FUNCIONARIO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historico_funcoes_ibfk_2` FOREIGN KEY (`ID_FUNCAO`) REFERENCES `funcao` (`ID_FUNCAO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historico_funcoes_ibfk_3` FOREIGN KEY (`ID_DEPARTAMENTO`) REFERENCES `departamento` (`ID_DEPARTAMENTO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `localizacao`
--
ALTER TABLE `localizacao`
  ADD CONSTRAINT `localizacao_ibfk_1` FOREIGN KEY (`ID_PAIS`) REFERENCES `pais` (`ID_PAIS`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pais`
--
ALTER TABLE `pais`
  ADD CONSTRAINT `pais_ibfk_1` FOREIGN KEY (`ID_REGIAO`) REFERENCES `regiao` (`ID_REGIAO`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
