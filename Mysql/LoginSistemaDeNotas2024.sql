-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 03/12/2024 às 00:57
-- Versão do servidor: 8.0.40-0ubuntu0.22.04.1
-- Versão do PHP: 8.1.2-1ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `a2022951047@teiacoltec.org`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `LoginSistemaDeNotas2024`
--

CREATE TABLE `LoginSistemaDeNotas2024` (
  `nome` text NOT NULL,
  `senha` text NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `LoginSistemaDeNotas2024`
--

INSERT INTO `LoginSistemaDeNotas2024` (`nome`, `senha`, `admin`) VALUES
('Professor', '123', 1),
('Lucas Almeida', '123', 0),
('Beatriz Santos', '123', 0),
('Joana Pereira', '123', 0),
('Tiago Fernandes', '123', 0),
('Rafael Oliveira', '123', 0),
('Mariana Lopes', '123', 0),
('Carla Nunes', '123', 0),
('Eduardo Silva', '123', 0),
('Larissa Monteiro', '123', 0),
('Vinicius Costa', '123', 0),
('Ana Clara', '123', 0),
('Gabriel Souza', '123', 0),
('Juliana Martins', '123', 0),
('Pedro Henrique', '123', 0),
('Isabela Moreira', '123', 0),
('Sophia Ferreira', '123', 0),
('Felipe Rodrigues', '123', 0),
('Lara Barros', '123', 0),
('Miguel Alves', '123', 0),
('Camila Cardoso', '123', 0),
('Henrique Ribeiro', '123', 0),
('Marcela Vasconcelos', '123', 0),
('Arthur Lima', '123', 0),
('Nicole Batista', '123', 0),
('Davi Cunha', '123', 0),
('Melissa Moura', '123', 0),
('Matheus Gomes', '123', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
