-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 28/11/2024 às 20:19
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
-- Estrutura para tabela `Notas2024`
--

CREATE TABLE `Notas2024` (
  `Nome` text NOT NULL,
  `Matricula` text NOT NULL,
  `Turma` text NOT NULL,
  `MatematicaT` int NOT NULL,
  `Matematica1b` int NOT NULL,
  `Matematica2b` int NOT NULL,
  `Matematica3b` int NOT NULL,
  `Matematica4b` int NOT NULL,
  `PortuguesT` int NOT NULL,
  `Portugues1b` int NOT NULL,
  `Portugues2b` int NOT NULL,
  `Portugues3b` int NOT NULL,
  `Portugues4b` int NOT NULL,
  `HistoriaT` int NOT NULL,
  `Historia1b` int NOT NULL,
  `Historia2b` int NOT NULL,
  `Historia3b` int NOT NULL,
  `Historia4b` int NOT NULL,
  `GeografiaT` int NOT NULL,
  `Geografia1b` int NOT NULL,
  `Geografia2b` int NOT NULL,
  `Geografia3b` int NOT NULL,
  `Geografia4b` int NOT NULL,
  `QuimicaT` int NOT NULL,
  `Quimica1b` int NOT NULL,
  `Quimica2b` int NOT NULL,
  `Quimica3b` int NOT NULL,
  `Quimica4b` int NOT NULL,
  `FisicaT` int NOT NULL,
  `Fisica1b` int NOT NULL,
  `Fisica2b` int NOT NULL,
  `Fisica3b` int NOT NULL,
  `Fisica4b` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `Notas2024`
--

INSERT INTO `Notas2024` (`Nome`, `Matricula`, `Turma`, `MatematicaT`, `Matematica1b`, `Matematica2b`, `Matematica3b`, `Matematica4b`, `PortuguesT`, `Portugues1b`, `Portugues2b`, `Portugues3b`, `Portugues4b`, `HistoriaT`, `Historia1b`, `Historia2b`, `Historia3b`, `Historia4b`, `GeografiaT`, `Geografia1b`, `Geografia2b`, `Geografia3b`, `Geografia4b`, `QuimicaT`, `Quimica1b`, `Quimica2b`, `Quimica3b`, `Quimica4b`, `FisicaT`, `Fisica1b`, `Fisica2b`, `Fisica3b`, `Fisica4b`) VALUES
('Lucas Almeida', '20240001', '201', 74, 17, 24, 19, 14, 75, 22, 16, 21, 16, 77, 14, 18, 20, 25, 78, 20, 24, 16, 18, 79, 14, 19, 25, 21, 68, 14, 14, 21, 19),
('Beatriz Santos', '20240002', '101', 77, 23, 16, 14, 24, 76, 15, 22, 16, 23, 69, 20, 14, 17, 18, 72, 16, 15, 22, 19, 69, 14, 18, 17, 20, 73, 23, 14, 14, 22),
('Joana Pereira', '20240003', '101', 87, 20, 23, 21, 23, 76, 18, 24, 15, 19, 81, 21, 18, 20, 22, 75, 16, 15, 24, 20, 69, 19, 17, 15, 18, 72, 16, 15, 17, 24),
('Tiago Fernandes', '20240004', '201', 76, 24, 19, 15, 18, 77, 23, 16, 16, 22, 69, 14, 18, 21, 16, 77, 18, 17, 21, 21, 87, 21, 25, 19, 22, 81, 23, 19, 25, 14),
('Rafael Oliveira', '20240005', '201', 76, 14, 25, 20, 17, 81, 15, 23, 21, 22, 79, 22, 24, 19, 14, 71, 16, 22, 19, 14, 74, 18, 20, 20, 16, 77, 19, 15, 22, 21),
('Mariana Lopes', '20240006', '101', 87, 17, 25, 23, 22, 74, 18, 16, 16, 24, 68, 16, 20, 16, 16, 76, 19, 17, 16, 24, 79, 21, 17, 23, 18, 76, 14, 21, 16, 25),
('Carla Nunes', '20240007', '102', 75, 17, 25, 18, 15, 87, 25, 18, 25, 19, 89, 19, 23, 24, 23, 82, 17, 25, 24, 16, 78, 16, 18, 23, 21, 85, 24, 23, 15, 23),
('Eduardo Silva', '20240008', '301', 74, 17, 18, 21, 18, 75, 22, 17, 16, 20, 72, 19, 17, 18, 18, 73, 18, 16, 16, 23, 90, 24, 23, 19, 24, 66, 14, 16, 22, 14),
('Larissa Monteiro', '20240009', '103', 89, 23, 25, 17, 24, 82, 14, 25, 24, 19, 78, 21, 19, 14, 24, 70, 19, 17, 18, 16, 78, 18, 14, 24, 22, 62, 15, 14, 17, 16),
('Vinicius Costa', '20240010', '302', 71, 23, 15, 19, 14, 88, 25, 19, 25, 19, 75, 22, 17, 20, 16, 70, 18, 19, 15, 18, 73, 22, 16, 19, 16, 71, 16, 15, 22, 18),
('Ana Clara', '20240011', '302', 82, 23, 15, 25, 19, 86, 20, 25, 22, 19, 87, 22, 17, 25, 23, 84, 20, 23, 21, 20, 86, 25, 20, 18, 23, 76, 18, 14, 19, 25),
('Gabriel Souza', '20240012', '102', 77, 23, 15, 19, 20, 79, 25, 18, 22, 14, 84, 18, 25, 16, 25, 77, 17, 22, 19, 19, 85, 17, 22, 22, 24, 73, 21, 18, 17, 17),
('Juliana Martins', '20240013', '302', 72, 14, 15, 24, 19, 79, 18, 16, 22, 23, 75, 15, 20, 16, 24, 86, 24, 14, 23, 25, 66, 22, 14, 15, 15, 80, 20, 18, 19, 23),
('Pedro Henrique', '20240014', '103', 68, 17, 22, 14, 15, 83, 17, 24, 19, 23, 87, 16, 24, 24, 23, 82, 16, 19, 23, 24, 80, 22, 19, 21, 18, 83, 21, 24, 23, 15),
('Isabela Moreira', '20240015', '302', 78, 17, 20, 23, 18, 77, 14, 24, 17, 22, 79, 19, 16, 24, 20, 82, 19, 21, 20, 22, 79, 21, 14, 24, 20, 79, 22, 19, 15, 23),
('Sophia Ferreira', '20240016', '303', 76, 17, 20, 22, 17, 79, 22, 17, 20, 20, 74, 21, 14, 14, 25, 76, 14, 21, 24, 17, 63, 18, 14, 15, 16, 80, 23, 16, 17, 24),
('Felipe Rodrigues', '20240017', '102', 78, 23, 23, 17, 15, 81, 17, 25, 23, 16, 71, 24, 17, 14, 16, 85, 18, 18, 24, 25, 95, 24, 23, 24, 24, 75, 17, 20, 15, 23),
('Lara Barros', '20240018', '202', 87, 21, 25, 19, 22, 80, 16, 22, 21, 21, 79, 20, 14, 25, 20, 79, 24, 20, 14, 21, 69, 14, 18, 18, 19, 91, 25, 21, 25, 20),
('Miguel Alves', '20240019', '202', 77, 24, 19, 18, 16, 84, 23, 17, 25, 19, 83, 23, 24, 16, 20, 76, 20, 19, 15, 22, 77, 19, 24, 19, 15, 88, 23, 18, 24, 23),
('Camila Cardoso', '20240020', '201', 72, 15, 14, 20, 23, 75, 19, 17, 14, 25, 73, 22, 16, 16, 19, 88, 23, 22, 19, 24, 67, 14, 19, 20, 14, 76, 19, 18, 22, 17),
('Henrique Ribeiro', '20240021', '101', 66, 19, 16, 16, 15, 75, 16, 14, 24, 21, 76, 17, 18, 16, 25, 81, 22, 24, 19, 16, 79, 17, 22, 20, 20, 80, 24, 24, 15, 17),
('Marcela Vasconcelos', '20240022', '203', 83, 24, 20, 25, 14, 82, 24, 22, 16, 20, 77, 16, 21, 25, 15, 90, 20, 22, 25, 23, 74, 19, 21, 18, 16, 71, 19, 17, 18, 17),
('Arthur Lima', '20240023', '101', 82, 19, 19, 23, 21, 84, 17, 24, 25, 18, 85, 21, 17, 23, 24, 95, 25, 22, 23, 25, 72, 15, 22, 15, 20, 66, 16, 14, 22, 14),
('Nicole Batista', '20240024', '302', 77, 23, 14, 20, 20, 79, 17, 23, 17, 22, 63, 18, 15, 16, 14, 73, 24, 14, 15, 20, 75, 18, 14, 18, 25, 80, 14, 22, 19, 25),
('Davi Cunha', '20240025', '303', 76, 19, 19, 21, 17, 65, 15, 14, 21, 15, 75, 18, 15, 18, 24, 76, 20, 19, 18, 19, 71, 19, 17, 17, 18, 73, 17, 20, 18, 18),
('Melissa Moura', '20240026', '103', 83, 20, 21, 24, 18, 85, 21, 17, 24, 23, 67, 19, 14, 16, 18, 71, 18, 19, 20, 14, 65, 16, 14, 19, 16, 83, 25, 14, 24, 20),
('Matheus Gomes', '20240027', '203', 74, 20, 15, 14, 25, 73, 15, 16, 19, 23, 80, 21, 25, 15, 19, 63, 15, 17, 15, 16, 84, 20, 18, 24, 22, 71, 18, 17, 21, 15);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
