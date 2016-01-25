-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25-Jan-2016 às 22:59
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `teste`
--


Create Schema IF NOT EXISTS `teste`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_teste`
--

use teste;

CREATE TABLE IF NOT EXISTS `tabela_teste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telefone` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `tabela_teste`
--

INSERT INTO `tabela_teste` (`id`, `nome`, `email`, `telefone`) VALUES
(13, 'diego h', 'diego@diego.com.br', '(66)6666-66666'),
(14, 'eder monte', 'teste2@teste2.com.br', '(54)5345-34534'),
(16, 'Diego teste2', 'erert@dfgdfgdg.com', '(45)7777-77777'),
(17, 'hdskhfksfhds', 'diego@uol.com.br', '(34)4444-44444');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
