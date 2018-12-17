-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Dez-2018 às 12:58
-- Versão do servidor: 5.6.15-log

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `descricao`) VALUES
(1, 'Top.'),
(2, 'Legging'),
(3, 'Macacão'),
(4, 'Corsário'),
(5, 'Cropped'),
(7, 'Conjunto'),
(8, 'Biquini'),
(9, 'Body'),
(11, 'Short'),
(12, 'Short Saia'),
(13, 'Calça'),
(14, 'Camiseta'),
(15, 'Macaquinho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL DEFAULT '',
  `celular` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tamanho` char(1) NOT NULL DEFAULT 'P',
  `cep` varchar(9) NOT NULL DEFAULT '',
  `rua` varchar(100) NOT NULL DEFAULT '',
  `numero` varchar(20) DEFAULT NULL,
  `uf` varchar(2) NOT NULL DEFAULT '',
  `cidade` varchar(100) NOT NULL DEFAULT '',
  `bairro` varchar(100) NOT NULL DEFAULT '',
  `complemento` varchar(200) DEFAULT NULL,
  `situacao` varchar(20) NOT NULL DEFAULT '',
  `login` varchar(20) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `celular`, `email`, `tamanho`, `cep`, `rua`, `numero`, `uf`, `cidade`, `bairro`, `complemento`, `situacao`, `login`, `senha`) VALUES
(1, 'Vanessa Silva', '(92)99544992', 'silvanessa@hotmail.com', 'P', '69059260', '17 de março', '44', 'AM', 'Manaus', 'Sta Etelvina', 'apartamento', 'normal', 'nessa', '12345'),
(4, 'Santana Melo', '(98) 97867-7878', 'santana@gmail.com', 'P', '690.591-6', '17 de marco', '44', 'AM', 'Manaus', 'Sta Etelvina', 'casa', 'ativo', 'santana', '12345'),
(5, 'Laurilene GuimarÃ£es da Silva', '(92) 99331-0836', 'lenesilva_guimaraes@hotmail.com', 'P', '69.057-17', 'Rua Feliciana Costa', '45', 'AM', 'Manaus', 'Vila', 'apartamento 07', 'ativo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesa`
--

CREATE TABLE IF NOT EXISTS `despesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(250) NOT NULL DEFAULT '',
  `data` date NOT NULL DEFAULT '0000-00-00',
  `valor` double(8,2) NOT NULL DEFAULT '0.00',
  `observacao` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `despesa`
--

INSERT INTO `despesa` (`id`, `descricao`, `data`, `valor`, `observacao`) VALUES
(1, 'Pagamento do frete', '2018-12-05', 40.00, 'pagamento efetuado'),
(2, 'Mudanca', '2018-12-20', 120.00, 'Pago');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL DEFAULT '',
  `login` varchar(20) NOT NULL DEFAULT '',
  `senha` varchar(20) NOT NULL DEFAULT '',
  `tipo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `login`, `senha`, `tipo`) VALUES
(1, 'Sammy da Silva Melo', 'samdasil', '12345', 1),
(2, 'Lene Guimarães', 'lene', '12345', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemvenda`
--

CREATE TABLE IF NOT EXISTS `itemvenda` (
  `venda` int(11) NOT NULL DEFAULT '0',
  `produto` int(11) NOT NULL DEFAULT '0',
  `quantidade` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`venda`,`produto`),
  KEY `Index_2` (`venda`),
  KEY `Index_3` (`produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `itemvenda`
--

INSERT INTO `itemvenda` (`venda`, `produto`, `quantidade`) VALUES
(12, 51, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(100) DEFAULT NULL,
  `descricao` varchar(200) NOT NULL DEFAULT '',
  `sku` varchar(40) NOT NULL DEFAULT '',
  `tamanho` char(1) NOT NULL DEFAULT '',
  `quantidade` int(11) NOT NULL DEFAULT '0',
  `valorcompra` double(8,2) NOT NULL DEFAULT '0.00',
  `valorvenda` double(8,2) NOT NULL DEFAULT '0.00',
  `observacao` varchar(250) DEFAULT NULL,
  `categoria` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `imagem`, `descricao`, `sku`, `tamanho`, `quantidade`, `valorcompra`, `valorvenda`, `observacao`, `categoria`) VALUES
(5, ' ', 'conjunto body chiquerrima e short saia estampado', 'KSF-F891-002', 'P', 1, 31.13, 60.00, ' ', 7),
(6, ' ', 'Calça legging lisa suplex', 'KSF-F23-007', 'M', 1, 18.81, 40.00, ' ', 2),
(7, '', 'Calça Legging com Babado Gisele | Ref: F198', 'F198-Ondas Coloridas 2-13025-P', 'P', 1, 25.83, 42.00, '0092 na planilha', 2),
(8, '', 'Top de Pescoço Estampado (Mosaico Azul Verde e Rosa) | Ref: KS-F21-022', 'KS-F21-022-15847-P', 'P', 1, 8.91, 15.00, '0164 na planilha', 1),
(9, ' ', 'Short Saia Carla (Tigre e Zebra com Flor) | Ref: KS-F108-002', 'F1550-16279-M', 'M', 1, 28.06, 45.00, '0078 na planilha, custava 56 reais', 12),
(10, '', 'Macacão fitness Carol Cores Lisas', 'KSF-F28-003', 'P', 1, 24.44, 50.00, '', 3),
(11, '', 'Legging Estampada (Branco com Corações e Bolinhas Pretas) | Ref: KS-F27-032', 'KS-F27-032-17224-M', 'M', 1, 17.91, 36.00, '0123 na planilha', 2),
(12, '', 'Legging Estampada (Branco com Corações e Bolinhas Pretas) | Ref: KS-F27-032', 'KS-F27-032-17224-P', 'P', 1, 17.91, 36.00, '0122 na planilha', 2),
(13, '', 'Cropped Talita Liso com Detalhe Tecido Bolha Fluor (Preto / Verde Limão Fluor) | Ref: KS-F641-002', 'KS-F641-002-13873-M', 'M', 1, 18.68, 25.00, '0056 na planilha', 5),
(14, '', 'Body Gota Estampado (Folhagem Verde e Preta) | Ref: KS-F61-001', 'KS-F61-001-12946-P', 'P', 1, 17.91, 35.00, '0144 na planilha', 9),
(15, ' ', 'Body Nadador Costas Abertas (Preto com Rosa e Verde) | Ref: KS-F11-002', 'KS-F11-002-13559-M', 'M', 1, 17.91, 35.00, '0144 na planilha', 9),
(16, '', 'Cropped Bia Liso (Rosa Pink) | Ref: KS-F258-002', 'KS-F258-002-7368-P', 'P', 1, 14.65, 25.00, '0047 na planilha', 5),
(17, '', 'Top Suplex com Bojo | Ref: F92', 'F92-14825-P', 'P', 1, 15.78, 25.00, '0087 na planilha', 1),
(18, '', 'Calça Legging Bailarina Cores Lisas (Laranja) | Ref: KS-F145-004', 'KS-F145-004-11302-M', 'M', 1, 20.61, 36.00, '0016 na planilha', 2),
(19, ' ', 'Legging Lisa Suplex Branco Gelo', 'KS-F23-020', 'M', 1, 17.96, 36.00, '0066 na planilha', 2),
(20, ' ', 'Body Nadador Costas Abertas (Preto com Rosa e Verde) | Ref: KS-F11-002', 'KS-F11-002-13559-P', 'P', 1, 17.91, 35.00, '0113 na planilha', 9),
(21, '', 'Cropped Estampado Maite | | Onda Verde água e Vermelha-11727-G', 'F344-108353 ', 'G', 1, 20.63, 30.00, '0051 na planilha', 5),
(22, '', 'Cropped Estampado Maite Tigre Caramelo com Laranja e Preto', 'F344', 'M', 1, 20.63, 30.00, '0050 na planilha', 5),
(23, ' ', 'Body Viviane Liso (Preto) | Ref: KS-F427-003', 'KS-F427-003-17166-P', 'P', 1, 24.21, 45.00, '0008 na planilha', 9),
(24, ' ', 'MacacÃ£o Fitness de Manga Dupla Fe', 'KSF-F127-011', 'P', 1, 31.41, 62.00, ' ', 3),
(25, ' ', 'Calça Estampada CÃ³s Alto', 'KSF-F27-049', 'P', 1, 23.90, 40.00, ' ', 13),
(26, '', 'Calça Legging Lisa Suplex', 'KSF-F23-001', 'P', 1, 18.81, 40.00, '', 2),
(27, ' ', 'Camiseta', 'KSF-F467-005', 'P', 1, 16.81, 30.00, ' ', 14),
(28, '', 'Top Tecido Bolha Preto', 'KSF-F237-002', 'M', 1, 17.91, 30.00, '', 1),
(29, ' ', 'Macaquinho fitness Leticia Verde', 'KSF-F74-002', 'P', 1, 28.90, 60.00, ' ', 15),
(30, '', 'Body Estampado Estela com Bojo verde-azul-preto', 'KSF-F214-003', 'M', 1, 24.75, 50.00, '', 9),
(31, '', 'Body com bojo branco folhagem', 'KSF-F13-003', 'P', 1, 17.91, 35.00, '', 9),
(32, '', 'Calça Legging Estampada Mescla laranja - rosa e preta', 'KSF-F27-115', 'P', 1, 23.90, 48.00, '', 2),
(33, '', 'Calça Legging Lisa Azul marinho', 'KSF-F23-007', 'P', 1, 18.81, 40.00, '', 2),
(34, '', 'Camiseta Estampada Caroline Ondulado-verde-roxo-amarelo', 'KSF-F256-001', 'P', 1, 16.20, 32.00, '', 14),
(35, '', 'Legging Estampada Rabiscos pretos e brancos', 'KSF-27-077', 'M', 1, 21.51, 40.00, '', 2),
(36, '', 'Conjunto Top + Corsario Estampada Abstrato branco com preto', 'KSF-F883-019', 'M', 1, 30.46, 60.00, '', 2),
(37, '', 'Calça Legging Lisa Suplex Preto', 'KSF-F23-001', 'P', 1, 18.81, 36.00, '', 2),
(38, '', 'Top Ellen | Ref: F209', 'F209', 'M', 1, 13.56, 25.00, '', 1),
(39, '', 'Top Lais com Bojo Azul marinho', 'KSF-542-002', 'P', 1, 22.50, 40.00, '', 1),
(40, '', 'Conjunto Biquini Borboleta com Renda 341 | Ref: B159', 'B159-7333', 'P', 1, 19.71, 36.00, '0028 na planilha', 8),
(41, '', 'Cropped Anamara Estampado Triangulos Coloridos', 'KSF-622-005', 'P', 1, 11.91, 22.00, '', 5),
(42, '', 'Corsario Barbara Tecido Bolha Cintura Alta Azul Celeste', 'KSF-F397-005', 'M', 1, 21.98, 42.00, '', 4),
(43, ' ', 'Conjunto Cropped e Legging Estampada Azul verde e preto', 'KSF-F816-004', 'M', 1, 32.72, 60.00, ' ', 7),
(44, '', 'Camiseta de Microlight com Detalhe Lateral (Rosa Pink) | Ref: KS-F1662-006', 'KS-F1662-006-7368-M', 'M', 1, 29.61, 36.00, '0117 na planilha', 14),
(45, '', 'Camiseta Fitness Júlia Suplex (Vermelho) ', 'KS-F39-002', 'M', 1, 13.41, 25.00, '', 14),
(46, '', 'Calça Daniele Lisa com Detalhe Estampado Mescla preto-salmÃ£o e Amarelo', 'KFS-F243-001', 'P', 1, 26.91, 48.00, '', 2),
(47, '', 'Calça Legging Estampada Triangulos coloridos', 'KSF-F27-024', 'P', 1, 23.90, 42.00, '', 2),
(48, '', 'Body com Bojo Branco com Folhagem', 'KSF-F13--003', 'M', 1, 17.91, 35.00, '', 9),
(49, '', 'Conjunto Cropped e Legging Estampada Branco com folhagem colorida', 'KSF-F816-006', 'P', 1, 32.72, 60.00, '', 7),
(50, '', 'Calça Legging Lisa Suplex Vinho', 'KSF-F23-002', 'P', 2, 18.81, 36.00, '', 2),
(51, '', 'Cropped Bia Liso (Azul Royal) ', 'KS-F258-003', 'M', 1, 14.65, 25.00, '', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipousuario`
--

CREATE TABLE IF NOT EXISTS `tipousuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `descricao`) VALUES
(1, 'administrador'),
(2, 'funcionario'),
(3, 'cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE IF NOT EXISTS `venda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` int(11) NOT NULL DEFAULT '0',
  `funcionario` int(11) NOT NULL DEFAULT '0',
  `valortotal` double(8,2) DEFAULT NULL,
  `valorpago` double(8,2) DEFAULT NULL,
  `parcela` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `situacao` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Index_1` (`cliente`),
  KEY `Index_2` (`funcionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id`, `cliente`, `funcionario`, `valortotal`, `valorpago`, `parcela`, `data`, `situacao`) VALUES
(12, 5, 1, 0.00, 0.00, 0, '2018-12-09', 'aberta');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `FK_funcionario_1` FOREIGN KEY (`tipo`) REFERENCES `tipousuario` (`id`);

--
-- Limitadores para a tabela `itemvenda`
--
ALTER TABLE `itemvenda`
  ADD CONSTRAINT `FK_itemvenda_1` FOREIGN KEY (`venda`) REFERENCES `venda` (`id`),
  ADD CONSTRAINT `FK_itemvenda_2` FOREIGN KEY (`produto`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `FK_produto_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `FK_venda_1` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `FK_venda_2` FOREIGN KEY (`funcionario`) REFERENCES `funcionario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
