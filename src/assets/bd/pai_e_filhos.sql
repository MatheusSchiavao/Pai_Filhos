-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 01:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pai_e_filhos`
--

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `cod_prod` int(11) NOT NULL,
  `nome_prod` varchar(120) NOT NULL,
  `desc_prod` varchar(450) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `path_img` varchar(120) NOT NULL,
  `categoria` varchar(16) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`cod_prod`, `nome_prod`, `desc_prod`, `marca`, `path_img`, `categoria`, `preco`) VALUES
(77, 'Panela de Pressão 4,5L', 'Panela de pressão 4,5 litros polida com fechamento externo', 'Marcolar', '../assets/img_prod/6376ce4e561a3.png', 'aluminios', 183.99),
(78, 'Pano 2 em 1', 'Pano 2 em 1 com esfrega e seca. Contém 2 panos de 29x29cm. Indicado para pias, fogões, louças, vidros ou azulejos.', 'powermaid', '../assets/img_prod/6376c823244e7.png', 'panos', 9.97),
(79, 'Esponja mágica', 'Elimina manchas! Indicado para paredes, vidros, espelhos e superfícies de inox. Contém 1 esponja de 7,5x11x2,6cm.', 'powermaid', '../assets/img_prod/6376c8ac72914.png', 'panos', 2.99),
(80, 'Colcha de casal Kit Marina', 'Colcha de 220x250cm com babados. Possui 4 peças:\r\n1 lençol\r\n1 colcha\r\n2 fronhas', 'Originals', '../assets/img_prod/6376c93569fe2.png', 'edredons', 146.97),
(81, 'Fronha de travesseiro', '1pç de 70x50cm. 82% Algodão 18% Poliéster.', 'Originals', '../assets/img_prod/6376c9cd7dd1b.png', 'travesseiros', 6.97),
(82, 'Tapete Sisal 80x200cm', 'Passadeira de sisal. Diversas cores, consultar disponibilidade.', 'Lancer', '../assets/img_prod/6376ca7c9e0e1.png', 'tapetes', 29.99),
(83, 'Cesto de roupa 60L', 'Cesto de roupa redondo 60L. Diversas cores.', 'AJA', '../assets/img_prod/6376cbd6ec2c1.png', 'plasticos', 28.97),
(84, 'Lixeira 7L', 'Lixeira Retangular Com pedal retrátil 7 litros. Diversas cores', 'AJA', '../assets/img_prod/6376d30612d1c.png', 'plasticos', 17.97),
(85, 'Cadeira trançada', 'Cadeira adulta fixa de junco. Diversas cores.', 'Originals', '../assets/img_prod/6376cc59459a9.png', 'cadeiras', 229),
(86, 'Escada 5 degraus', 'Escada de ferro 5 degraus. Para até 120kg', 'Originals', '../assets/img_prod/6376cd1ca4c8c.png', 'escadas', 297.99),
(87, 'Fogão 4 bocas', 'Fogão 4 bocas preto com mesa de vidro. Diversas cores.', 'Consul', '../assets/img_prod/6376cdac8dc82.png', 'Selecione...', 449.99),
(88, 'Lençol casal', 'Lençol com Elástico e Fronha malha 100% Algodão.', 'Originals', '../assets/img_prod/6376ce7258317.png', 'lencois', 78.99),
(89, 'Colçhão casal', 'Colchão casal D23 1,38m X 18 de altura X 1,88m', 'Umaflex', '../assets/img_prod/6376cf6cc8edc.png', 'colchoes', 693.99);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `tel` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_user`, `cpf`, `admin`, `email`, `nome`, `senha`, `tel`) VALUES
(1, '123.456.789-21', 1, 'davi21@email.com', 'Davi Soares', '24a33963e322e89d7dbc4ad6011769adbcfe43a7', '(12) 99857-3352'),
(10, '123.567.899-75', 1, 'matheus08@email.com', 'Matheus Schiavão', '9aa99616b975bd1cfa0cbd143739db0d270eed9f', '(12) 98465-3894'),
(11, '789.456.235-95', 1, 'gustavo10@email.com', 'Gustavo Varella', '7c96b41274561b0e627ca1eac9f31d3bdf13445f', '(12) 74446-8494');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`cod_prod`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `cod_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
