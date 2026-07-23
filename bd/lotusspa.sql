-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2026 at 11:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lotusspa`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `descricao`) VALUES
(1, 'Massagem relaxante', 'Focada no bem-estar geral, utiliza movimentos suaves e fluidos para liberar o estresse do dia a dia e melhorar a qualidade do sono.'),
(2, 'Massagem terapêutica', 'Voltada para tratar dores específicas e tensões musculares crônicas, atuando na liberação de pontos de gatilho.'),
(3, 'Massagem esportiva', 'Mais intensa e com foco na prevenção de lesões, recuperação muscular e melhora da flexibilidade para praticantes de atividades físicas.'),
(4, 'Massagem estética', 'Como a drenagem linfática ou modeladora, foca em reduzir a retenção de líquidos, melhorar o aspecto da celulite e modelar o contorno corporal.'),
(5, 'Ventossaterapia', 'Utiliza a sucção de copos na pele para criar pressão negativa, melhorando a circulação sanguínea, oxigenando os tecidos e liberando toxinas. Ela é aplicada tanto para o alívio de dores musculares e contraturas quanto para fins estéticos, como redução de celulite e gordura localizada.');

-- --------------------------------------------------------

--
-- Table structure for table `procedimento`
--

CREATE TABLE `procedimento` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `duracaoMinutos` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `procedimento`
--

INSERT INTO `procedimento` (`id`, `nome`, `descricao`, `duracaoMinutos`, `preco`, `id_categoria`) VALUES
(1, 'Quick Massage', 'A dose certa de relaxamento para a sua rotina. Sessões rápidas e focadas para aliviar a tensão das costas, ombros e pescoço.', 30, 50.00, 1),
(2, 'Reflexologia Podal', 'Relaxamento profundo e estímulo da saúde integral através de massagem nos pontos reflexos dos pés.', 30, 70.00, 2),
(3, 'Massagem Clássica', 'O toque perfeito para desacelerar a mente, aliviar o estresse e renovar as energias.', 60, 100.00, 1),
(4, 'Massagem Shiatsu', 'Equilíbrio energético e alívio de dores por meio da pressão em pontos estratégicos do corpo.', 60, 100.00, 2),
(5, 'Ventosaterapia Localizada', 'Liberação da musculatura rígida, melhora da circulação e alívio de dores focadas.', 30, 50.00, 5),
(6, 'Ventosaterapia Geral', 'Ideal para relaxamento de grupos musculares, alívio de dores (como tensões nas costas) e redução do estresse, promovendo bem-estar geral.', 90, 160.00, 5),
(7, 'Massagem Linfática', 'Estimula o sistema linfático, reduz o inchaço, elimina toxinas e melhora a circulação.', 60, 100.00, 2),
(8, 'Massagem Modeladora', 'Aplica movimentos suaves e lentos focados em estimular o sistema linfático, o que reduz a retenção de líquidos e o inchaço.', 60, 100.00, 4);

-- --------------------------------------------------------

--
-- Table structure for table `procedimento_profissional`
--

CREATE TABLE `procedimento_profissional` (
  `id_procedimento` int(11) NOT NULL,
  `id_profissional` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `procedimento_profissional`
--

INSERT INTO `procedimento_profissional` (`id_procedimento`, `id_profissional`) VALUES
(1, 2),
(1, 3),
(2, 2),
(3, 2),
(3, 3),
(4, 2),
(5, 2),
(6, 2),
(7, 3),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `profissional`
--

CREATE TABLE `profissional` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `contato` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profissional`
--

INSERT INTO `profissional` (`id`, `nome`, `contato`) VALUES
(2, 'Doraci Miranda Lima', '44 99969-2116'),
(3, 'Dejanira Miranda', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procedimento`
--
ALTER TABLE `procedimento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `procedimento_profissional`
--
ALTER TABLE `procedimento_profissional`
  ADD PRIMARY KEY (`id_procedimento`,`id_profissional`),
  ADD KEY `id_profissional` (`id_profissional`);

--
-- Indexes for table `profissional`
--
ALTER TABLE `profissional`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `procedimento`
--
ALTER TABLE `procedimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profissional`
--
ALTER TABLE `profissional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `procedimento`
--
ALTER TABLE `procedimento`
  ADD CONSTRAINT `procedimento_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);

--
-- Constraints for table `procedimento_profissional`
--
ALTER TABLE `procedimento_profissional`
  ADD CONSTRAINT `procedimento_profissional_ibfk_1` FOREIGN KEY (`id_procedimento`) REFERENCES `procedimento` (`id`),
  ADD CONSTRAINT `procedimento_profissional_ibfk_2` FOREIGN KEY (`id_profissional`) REFERENCES `profissional` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
