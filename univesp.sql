-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 07-Abr-2023 às 19:36
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `univesp`
--
CREATE DATABASE IF NOT EXISTS `univesp` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `univesp`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_user`
--

CREATE TABLE IF NOT EXISTS `tab_user` (
  `code` int(11) NOT NULL AUTO_INCREMENT COMMENT 'chave pk',
  `nome` varchar(100) COLLATE utf8_bin NOT NULL COMMENT 'Nome do usuario',
  `ende` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'endereço do usuario',
  `fone` varchar(50) COLLATE utf8_bin NOT NULL COMMENT 'telefone(s) do usuario',
  `priv` int(1) NOT NULL DEFAULT '0' COMMENT 'privilegio sendo 0-cliente usuario, 1-administrador',
  `usua` varchar(30) COLLATE utf8_bin NOT NULL COMMENT 'usuario do sistema',
  `emai` varchar(50) COLLATE utf8_bin NOT NULL COMMENT 'email do usuario',
  `pass` varchar(50) COLLATE utf8_bin NOT NULL,
  `stat` int(1) NOT NULL DEFAULT '0' COMMENT 'status 0-ativo, 1-inativo',
  PRIMARY KEY (`code`),
  UNIQUE KEY `nome` (`nome`),
  UNIQUE KEY `usua` (`usua`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabela de usuario da empresa ecoroad' AUTO_INCREMENT=5 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
