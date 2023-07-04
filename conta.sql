-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Nov-2019 às 21:47
-- Versão do servidor: 10.3.15-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `conta`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `con_id` int(5) UNSIGNED NOT NULL,
  `usuario_usu_id` int(5) NOT NULL,
  `endereco_end_id` int(5) UNSIGNED NOT NULL,
  `con_valor` float(5,2) DEFAULT NULL,
  `con_consumo` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `con_bandeira` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `con_mes` date DEFAULT NULL,
  `con_vencimento` date DEFAULT NULL,
  `con_qtd` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `con_intalacao` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `con_debito` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `con_classe` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `con_dnf` date DEFAULT NULL,
  `con_pre` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`con_id`, `usuario_usu_id`, `endereco_end_id`, `con_valor`, `con_consumo`, `con_bandeira`, `con_mes`, `con_vencimento`, `con_qtd`, `con_intalacao`, `con_debito`, `con_classe`, `con_dnf`, `con_pre`) VALUES
(1, 1, 1, 999.99, '200', 'vermelha', '2019-10-21', '2019-11-30', '122', '7234598760', '7778999899', 'residencial', '2019-11-01', '0,89');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `end_id` int(5) UNSIGNED NOT NULL,
  `end_cep` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `end_numero` varchar(8) COLLATE utf8_bin DEFAULT NULL,
  `end_rua` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `end_bairro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `end_referencia` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`end_id`, `end_cep`, `end_numero`, `end_rua`, `end_bairro`, `end_referencia`) VALUES
(1, '62700', '565', 'ercilo martins', 'campinas', 'proximo a enel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usu_id` int(5) NOT NULL,
  `usu_nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `usu_senha` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `usu_cpf` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nome`, `usu_senha`, `usu_cpf`) VALUES
(1, 'MARCOS ANTONIO PEREIRA JORGE JUNIOR', '192242', '192.242.242-01');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`con_id`),
  ADD KEY `conta_FKIndex2` (`endereco_end_id`),
  ADD KEY `conta_FKIndex3` (`usuario_usu_id`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`end_id`),
  ADD UNIQUE KEY `end_id` (`end_id`,`end_cep`,`end_numero`,`end_rua`,`end_bairro`,`end_referencia`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `conta`
--
ALTER TABLE `conta`
  MODIFY `con_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `end_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `conta`
--
ALTER TABLE `conta`
  ADD CONSTRAINT `conta_ibfk_1` FOREIGN KEY (`usuario_usu_id`) REFERENCES `usuario` (`usu_id`),
  ADD CONSTRAINT `conta_ibfk_2` FOREIGN KEY (`endereco_end_id`) REFERENCES `endereco` (`end_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
