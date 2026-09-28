-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/09/2026 às 00:12
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dragon_ball`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `personagens`
--

CREATE TABLE `personagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `raca` varchar(50) NOT NULL,
  `planeta_origem` varchar(100) NOT NULL,
  `tecnica_principal` varchar(100) NOT NULL,
  `transformacao` varchar(100) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `personagens`
--

INSERT INTO `personagens` (`id`, `nome`, `raca`, `planeta_origem`, `tecnica_principal`, `transformacao`, `imagem`) VALUES
(1, 'Goku', 'Saiyajin', 'Planeta Vegeta', 'Kamehameha', 'Super Saiyajin', 'https://i.pinimg.com/736x/18/ff/19/18ff19e5b4729201c7772513f190eb43.jpg'),
(2, 'Vegeta', 'Saiyajin', 'Planeta Vegeta', 'Galick Ho', 'Super Saiyajin Blue', 'https://i.pinimg.com/736x/01/36/e4/0136e4da5be832c0680bef40e1801423.jpg'),
(3, 'Gohan', 'Saiyajin', 'Terra', 'Masenko', 'Super Saiyajin 2', 'https://i.pinimg.com/736x/10/a3/af/10a3afb7c678d12f1161a96e10da8190.jpg'),
(4, 'Piccolo', 'Namekuseijin', 'Planeta Namekusei', 'Makankosappo', 'Orange Piccolo', 'https://i.pinimg.com/736x/b5/a2/dc/b5a2dce19d83809760f7c1be02e7ec05.jpg'),
(5, 'Kuririn', 'Humano', 'Terra', 'Kienzan', 'Sem transformação', 'https://i.pinimg.com/736x/25/90/25/2590257f1b3b173504fb935a130bbb2b.jpg'),
(6, 'Trunks', 'Saiyajin', 'Terra', 'Final Flash', 'Super Saiyajin', 'https://i.pinimg.com/736x/c3/c0/bd/c3c0bda5955542b8a7caaa454f012e22.jpg'),
(7, 'Freeza', 'Raça de Freeza', 'Planeta Freeza 79', 'Death Ball', 'Golden Freeza', 'https://i.pinimg.com/736x/e2/35/6e/e2356e4702d6bcab8a53df5886337e5b.jpg'),
(8, 'Cell', 'Bio-Android', 'Terra', 'Kamehameha', 'Super Perfect Cell', 'https://i.pinimg.com/736x/64/e7/51/64e751f876e1075a02405377eecc276e.jpg'),
(9, 'Majin Boo', 'Majin', 'Desconhecido', 'Majin Kamehameha', 'Super Boo', 'https://i.pinimg.com/736x/7a/38/2a/7a382ad30af0999ea098796f0189aacd.jpg'),
(10, 'Beerus', 'Deus da Destruição', 'Planeta Beerus', 'Hakai', 'Sem transformação', 'https://i.pinimg.com/736x/64/d8/27/64d827f7a8130b52920b6c9e121316ef.jpg'),
(11, 'Yamcha', 'Humano', 'Terra', 'Sokidan', 'Sem transformação', 'https://i.pinimg.com/736x/45/80/5a/45805a127875b28ea87b847b584e1d67.jpg'),
(12, 'Tenshinhan', 'Humano', 'Terra', 'Kikoho', 'Sem transformação', 'https://i.pinimg.com/736x/50/2f/53/502f53dacbc1cd61478ec42f85c74eed.jpg'),
(13, 'Mestre Kame', 'Humano', 'Terra', 'Kamehameha', 'Sem transformação', 'https://i.pinimg.com/736x/aa/3c/da/aa3cda5bb902c5d3b9f9cd39ea27c433.jpg'),
(14, 'Goten', 'Saiyajin', 'Terra', 'Kamehameha', 'Super Saiyajin', 'https://i.pinimg.com/736x/12/57/ca/1257ca6e04a81beb397359d38412fe03.jpg'),
(15, 'Android 18', 'Android', 'Terra', 'Destructo Disc', 'Sem transformação', 'https://i.pinimg.com/736x/2b/47/2a/2b472a95043b3b0dc8290d4ca9d9af52.jpg'),
(16, 'Android 17', 'Android', 'Terra', 'Power Blitz', 'Sem transformação', 'https://i.pinimg.com/736x/da/29/71/da2971bd5dd4af2094e90ed26538eec5.jpg'),
(17, 'Raditz', 'Saiyajin', 'Planeta Vegeta', 'Double Sunday', 'Sem transformação', 'https://i.pinimg.com/736x/cd/a5/3d/cda53ddf5f333fb0fd6740a4f4e71c4c.jpg'),
(18, 'Nappa', 'Saiyajin', 'Planeta Vegeta', 'Break Cannon', 'Sem transformação', 'https://i.pinimg.com/736x/2a/6d/d2/2a6dd2dbda942958fec9becccd08bf04.jpg'),
(20, 'Jiren', 'Humanoide', 'Universo 11', 'Power Impact', 'Full Power', 'https://i.pinimg.com/736x/63/0d/f9/630df9601b708a7093f41af3e33a1985.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sagas`
--

CREATE TABLE `sagas` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `serie` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sagas`
--

INSERT INTO `sagas` (`id`, `nome`, `serie`, `descricao`, `imagem`) VALUES
(1, 'SAGA DO IMPÉRIO PILAF', 'DRAGON BALL', 'Goku conhece Bulma e começa sua jornada em busca das Esferas do Dragão. Durante a aventura, o grupo enfrenta o Imperador Pilaf.', 'https://i.pinimg.com/736x/93/37/03/933703363e101291865cee5eee63863a.jpg'),
(2, '21º TORNEIO DE ARTES MARCIAIS', 'DRAGON BALL', 'Goku e seus amigos participam de um grande torneio de artes marciais e enfrentam novos adversários.', 'https://i.pinimg.com/1200x/e3/1f/9e/e31f9ed7bd58e2d687c913bc80e8442c.jpg\r\n'),
(3, 'EXÉRCITO DA FITA VERMELHA', 'DRAGON BALL', 'Goku enfrenta o poderoso Exército da Fita Vermelha durante sua busca pelas Esferas do Dragão.', 'https://i.pinimg.com/736x/14/90/5e/14905e635c0c11d4fe2b35fb91b9ce1d.jpg'),
(4, 'PICCOLO DAIMAOH', 'DRAGON BALL', 'Goku enfrenta Piccolo Daimaoh em uma das batalhas mais importantes da fase original de Dragon Ball.', 'https://i.pinimg.com/736x/9e/77/91/9e7791a4040b6374d578aefd8f72208e.jpg'),
(5, 'SAGA DOS SAIYAJINS', 'DRAGON BALL Z', 'A chegada de Raditz revela a verdadeira origem de Goku e anuncia a chegada de Vegeta e Nappa à Terra.', 'https://i.pinimg.com/1200x/47/9f/ea/479fead1123ab4e3a57571fec1df311a.jpg'),
(6, 'SAGA DE FREEZA', 'DRAGON BALL Z', 'Goku e seus aliados enfrentam Freeza e seus exércitos no planeta Namekusei.', 'https://i.pinimg.com/736x/45/da/9c/45da9cfc2d21875d8c465e738f497570.jpg'),
(7, 'SAGA DOS ANDROIDES', 'DRAGON BALL Z', 'Guerreiros do futuro alertam sobre a ameaça dos Androides e de um novo inimigo chamado Cell.', 'https://i.pinimg.com/1200x/26/cc/bf/26ccbf3faa607ae6f701e34c71703897.jpg'),
(8, 'SAGA DE CELL', 'DRAGON BALL Z', 'Cell busca atingir sua forma perfeita enquanto os Guerreiros Z tentam impedir sua evolução.', 'https://i.pinimg.com/1200x/97/81/47/978147cd3ec93fb115abb446feb9eaba.jpg'),
(9, 'SAGA DE MAJIN BOO', 'DRAGON BALL Z', 'Uma antiga ameaça é despertada e os Guerreiros Z enfrentam Majin Boo em uma batalha decisiva.', 'https://i.pinimg.com/1200x/40/36/11/403611886bc13e770904d6831e8377b8.jpg\r\n'),
(10, 'SAGA DO DEUS DA DESTRUIÇÃO', 'DRAGON BALL SUPER', 'Goku conhece Beerus e descobre um novo nível de poder relacionado aos deuses.', 'https://i.pinimg.com/1200x/64/d8/27/64d827f7a8130b52920b6c9e121316ef.jpg'),
(11, 'SAGA DO FUTURO DE TRUNKS', 'DRAGON BALL SUPER', 'Trunks retorna ao passado para pedir ajuda contra uma ameaça que está destruindo seu futuro.', 'https://i.pinimg.com/1200x/c3/c0/bd/c3c0bda5955542b8a7caaa454f012e22.jpg'),
(12, 'TORNEIO DO PODER', 'DRAGON BALL SUPER', 'Guerreiros de diferentes universos participam de um grande torneio pela sobrevivência.', 'https://i.pinimg.com/736x/2f/7b/fa/2f7bfa784115ef4143e973c583ce5a52.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tecnicas`
--

CREATE TABLE `tecnicas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `usuarios` varchar(255) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `imagem` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tecnicas`
--

INSERT INTO `tecnicas` (`id`, `nome`, `descricao`, `usuarios`, `tipo`, `imagem`) VALUES
(1, 'Kamehameha', 'Uma poderosa técnica de energia criada pelo Mestre Kame. O usuário concentra seu Ki e dispara uma grande onda de energia pelas mãos.', 'Goku, Mestre Kame, Gohan e outros', 'Energia', 'https://i.pinimg.com/736x/85/81/cf/8581cf108182e56a5ce67d7fee98a114.jpg'),
(2, 'Final Flash', 'Uma poderosa técnica de energia utilizada por Vegeta. O usuário concentra uma grande quantidade de Ki entre as mãos e dispara um enorme feixe de energia.', 'Vegeta', 'Energia', 'https://i.pinimg.com/736x/7f/81/a7/7f81a71e845101fb5a377c624db5858a.jpg'),
(4, 'Genki-Dama', 'Uma técnica que reúne energia vital de seres vivos e do ambiente para formar uma enorme esfera de energia.', 'Goku', 'Energia', 'https://i.pinimg.com/originals/69/63/1f/69631fc95d601ea1539d73fc2eae6695.png'),
(5, 'Masenko', 'Uma técnica de energia originalmente ensinada por Piccolo. O usuário concentra o Ki nas mãos e dispara um poderoso feixe de energia.', 'Gohan, Piccolo', 'Energia', 'https://i.pinimg.com/1200x/b5/00/d1/b500d137669704dcadd810ae8d49533c.jpg'),
(6, 'Kaioken', 'Uma técnica ensinada pelo Senhor Kaio que aumenta temporariamente o poder, a velocidade e a força do usuário.', 'Goku', 'Amplificação', 'https://i.pinimg.com/736x/5f/93/04/5f930481117c839b0710f9c158447f60.jpg'),
(7, 'Special Beam Cannon', 'Uma técnica extremamente concentrada que dispara um poderoso feixe de energia capaz de atravessar o alvo.', 'Piccolo', 'Energia', 'https://i.pinimg.com/736x/55/e9/41/55e9412fa67d69567139f99d8069b00b.jpg'),
(8, 'Destructo Disc', 'Um disco de energia extremamente afiado criado por Kuririn. A técnica pode ser lançada contra o adversário a grande velocidade.', 'Kuririn', 'Energia', 'https://i.pinimg.com/736x/fe/ed/79/feed79469debd66c38ea0571fd53ecc9.jpg'),
(9, 'Big Bang Attack', 'Uma técnica de energia utilizada por Vegeta que concentra uma grande quantidade de Ki em uma esfera lançada contra o adversário.', 'Vegeta', 'Energia', 'https://i.pinimg.com/736x/bd/a3/cc/bda3cc697acde59cb8b6229544d090f1.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `email`, `senha`, `data_cadastro`) VALUES
(14, 'kessily', 'kessily', 'kessily@gmail.com', '$2y$10$.QjmE15bcCmmFUqPcG9q8uGk9EgFUQYKW449XuUvmgCp8IhuNWXCi', '2026-09-17 23:09:45'),
(15, 'thais', 'thaisquiabo', 'thaisquetinha123@gmail.com', '$2y$10$P3lv9Jh9kqwbAvGUmBC1heFAsAJDSut6Qf/K4L547Cd4Umj/oeOxy', '2026-09-21 01:21:32');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `personagens`
--
ALTER TABLE `personagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sagas`
--
ALTER TABLE `sagas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tecnicas`
--
ALTER TABLE `tecnicas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `personagens`
--
ALTER TABLE `personagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `sagas`
--
ALTER TABLE `sagas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tecnicas`
--
ALTER TABLE `tecnicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
