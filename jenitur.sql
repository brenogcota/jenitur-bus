-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Abr-2020 às 06:43
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jenitur`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `motorista`
--

CREATE TABLE `motorista` (
  `id` int(11) NOT NULL,
  `NOME` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TELEFONE` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WHATSAPP` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CPF` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RG` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `motorista`
--

INSERT INTO `motorista` (`id`, `NOME`, `TELEFONE`, `WHATSAPP`, `CPF`, `RG`) VALUES
(1, 'Huenderson Aliandro', '33988177774', '11980106363', '', ''),
(3, 'Antonio Divino', '33999675320', '33999675320', '', ''),
(4, 'José Carlos', '33987195868', '33987195868', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `onibus`
--

CREATE TABLE `onibus` (
  `id` int(11) NOT NULL,
  `PLACA` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MODELO` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `APOLICE` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OBSERVACAO` text COLLATE utf8mb4_unicode_ci,
  `NUMERO` int(5) NOT NULL,
  `POLTRONAS` int(2) NOT NULL DEFAULT '46'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `onibus`
--

INSERT INTO `onibus` (`id`, `PLACA`, `MODELO`, `APOLICE`, `OBSERVACAO`, `NUMERO`, `POLTRONAS`) VALUES
(1, 'DTA-6706', 'Volvo/Mpol', '1002306060097', '', 6706, 46),
(2, 'ASZ-5147', 'Volvo/Mpol', '1002306050914', NULL, 5147, 46);

-- --------------------------------------------------------

--
-- Estrutura da tabela `passageiro`
--

CREATE TABLE `passageiro` (
  `id` int(11) NOT NULL,
  `CPF` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NOME` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RG` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DATANASC` date NOT NULL,
  `TELEFONE1` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TELEFONE2` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `POSSCRIANCA` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NAO',
  `NOMECRIANCA` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `DOCCRIANCA` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `POLTRONA_ACOMPANHANTE` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'criança de colo',
  `CODVIAGEM` int(20) DEFAULT NULL,
  `POLTRONA` int(11) NOT NULL,
  `USUARIO` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT 'MOD',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `remember_token` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `permission`, `created_at`, `updated_at`, `remember_token`) VALUES
(4, 'Huenderson', '$2y$10$OHtNuLBkC18HfQEdhpKzoeToChBi2HHZwLzUaIMu8us6k94FyEsy2', 'huenderson@jenitur.com', 'ADM', '2020-04-11', '2020-04-11', 'rb4T43kekWQeY13G90WxK8WY0VQnrU6Dr6C3gmxbDMaza2zAWFSKZvGbeqPj');

-- --------------------------------------------------------

--
-- Estrutura da tabela `viagem`
--

CREATE TABLE `viagem` (
  `id` int(11) NOT NULL,
  `ORIGEM` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DESTINO` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DATA` date NOT NULL,
  `HORARIO` time NOT NULL,
  `STATUS` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aberto',
  `PLACAVEICULO` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VAGAS` int(11) NOT NULL DEFAULT '46',
  `MOTORISTA` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MOTORISTA2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OBSERVACAO` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `motorista`
--
ALTER TABLE `motorista`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onibus`
--
ALTER TABLE `onibus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passageiro`
--
ALTER TABLE `passageiro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_VIAPASS` (`CODVIAGEM`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `viagem`
--
ALTER TABLE `viagem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `motorista`
--
ALTER TABLE `motorista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `onibus`
--
ALTER TABLE `onibus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `passageiro`
--
ALTER TABLE `passageiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `viagem`
--
ALTER TABLE `viagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `passageiro`
--
ALTER TABLE `passageiro`
  ADD CONSTRAINT `FK_VIAPASS` FOREIGN KEY (`CODVIAGEM`) REFERENCES `viagem` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
