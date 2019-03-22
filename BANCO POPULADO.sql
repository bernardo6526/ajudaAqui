-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2016 at 01:05 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ajudaaqui`
--

-- --------------------------------------------------------

--
-- Table structure for table `assistente`
--

CREATE TABLE IF NOT EXISTS `assistente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `cpf` char(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `nascimento` date NOT NULL,
  `rg` char(8) NOT NULL,
  `telefone` char(11) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `Bairro` varchar(60) NOT NULL,
  `Logradouro` varchar(60) NOT NULL,
  `complemento` varchar(30) NOT NULL,
  `numero` int(10) unsigned NOT NULL,
  `uf` char(2) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `certificado` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `Clinica_id` int(10) unsigned DEFAULT NULL,
  `nota` int(11) DEFAULT '6',
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `Clinica_id` (`Clinica_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `assistente`
--

INSERT INTO `assistente` (`id`, `nome`, `cpf`, `email`, `nascimento`, `rg`, `telefone`, `cidade`, `Bairro`, `Logradouro`, `complemento`, `numero`, `uf`, `cep`, `certificado`, `tipo`, `Clinica_id`, `nota`, `status`) VALUES
(1, 'Alberto Fonseca Araujo', '12345678', '1', '1996-05-05', '12345678', '3199434341', 'Belo Horizonte', 'Carlos Prates', 'Rua Corumb?', 'VAZIO', 224, 'MG', '30710280', 'ABCD12345678', 'A. Visual', 1, 10, 0),
(2, 'Juliana Campos', '12345678', 'jucampos@gmail.com', '1988-04-01', '12345678', '3199434341', 'Belo Horizonte', 'Rua Juramento', 'Rua Corumbá', 'VAZIO', 1464, 'MG', '30710280', 'CGYA1343678', 'A. Físico', 1, 8, 0),
(3, 'Mauro Fernandes Pinto', '12345678', 'mauro@gmail.com', '1985-11-15', '12345678', '3199434341', 'Belo Horizonte', 'Santa Efigênia', 'Avenida do Contorno', 'VAZIO', 2655, 'MG', '30710280', 'GRG16545678', 'A. Físico', 1, 9, 0),
(4, 'Fátima Veras de Souza', '12345678', 'neafatimabernardes@gmail.com', '1993-05-05', '12345678', '3199434341', 'Belo Horizonte', 'Barro Preto', 'Rua Guajajaras', 'VAZIO', 1607, 'MG', '30180101', 'J54451GF45678', 'A. Visual', 1, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `cpf` char(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `nascimento` date NOT NULL,
  `rg` char(8) NOT NULL,
  `telefone` char(11) NOT NULL,
  `tipo_deficiencia` varchar(45) DEFAULT NULL,
  `cidade` varchar(60) NOT NULL,
  `Bairro` varchar(60) NOT NULL,
  `Logradouro` varchar(60) NOT NULL,
  `complemento` varchar(30) NOT NULL,
  `numero` int(10) unsigned NOT NULL,
  `uf` char(2) NOT NULL,
  `cep` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cpf`, `email`, `nascimento`, `rg`, `telefone`, `tipo_deficiencia`, `cidade`, `Bairro`, `Logradouro`, `complemento`, `numero`, `uf`, `cep`) VALUES
(1, 'Roberto Fonseca Araujo', '12345678', '1', '1996-05-05', '12345678', '3199434341', '', 'Belo Horizonte', 'Carlos Prates', 'Rua Corumb?', 'VAZIO', 224, 'MG', '30710280'),
(2, 'Felipe Almeida', '99081254007', 'felipeA1@gmail.com', '1976-11-05', '15483750', '9996792099', 'Deficiente Fisico', 'Belo Horizonte', 'Santo Andre', 'Rua Ibia', 'VAZIO', 132, 'MG', '30880428'),
(3, 'Mariana Ferreira', '23970058729', 'mari_gatinha22@gmail.com', '2000-05-22', '99657211', '997456555', 'Deficiente Fisico', 'Belo Horizonte', 'Estrela Dalva', 'Rua Francisco Manoel', 'Apto 202', 903, 'MG', '30433087'),
(4, 'Marcello Lessa', '55347612944', 'MLessaAB@gmail.com', '1985-01-29', '83463680', '990012468', 'Deficiente Visual', 'Belo Horizonte', 'Ipanema', 'Rua Poranga', 'VAZIO', 108, 'MG', '38190011');

-- --------------------------------------------------------

--
-- Table structure for table `clinica`
--

CREATE TABLE IF NOT EXISTS `clinica` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `cnpj` char(14) NOT NULL,
  `telefone` char(11) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `Bairro` varchar(60) NOT NULL,
  `Logradouro` varchar(60) NOT NULL,
  `complemento` varchar(30) NOT NULL,
  `numero` int(10) unsigned NOT NULL,
  `uf` char(2) NOT NULL,
  `cep` bigint(20) NOT NULL,
  `nota` double unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `clinica`
--

INSERT INTO `clinica` (`id`, `nome`, `cnpj`, `telefone`, `cidade`, `Bairro`, `Logradouro`, `complemento`, `numero`, `uf`, `cep`, `nota`) VALUES
(1, 'Nenhuma', '0', '0', '', '', '', '', 0, '', 0, 0),
(2, 'Centro Assistencial Carlos Prates', '19197615000188', '32781614', 'Belo Horizonte', 'Carlos Prates', 'Rua Corumbá', 'VAZIO', 224, 'MG', 30710280, 8.5),
(3, 'Doação de Órtese - Hospital da Baleia', '17200429000125', '32775772', 'Belo Horizonte', 'Saudade', 'Rua Juramento', 'VAZIO', 1464, 'MG', 30285048, 9.5),
(4, 'Associação Mineira dos Paraplégicos - AMP', '21728746000196', '32413918', 'Belo Horizonte', 'Santa Efigênia', 'Avenida do Contorno', 'VAZIO', 2655, 'MG', 30110080, 7),
(5, 'Clínica de Psicologia Infantil - CPI', '19884295000134', '32923484', 'Belo Horizonte', ' Barro Preto', 'Rua Guajajaras', 'VAZIO', 1607, 'MG', 30180101, 9);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_cliente`
--

CREATE TABLE IF NOT EXISTS `feedback_cliente` (
  `cliente_id` int(10) unsigned NOT NULL,
  `nota` double DEFAULT NULL,
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_cliente`
--

INSERT INTO `feedback_cliente` (`cliente_id`, `nota`) VALUES
(1, 8.5),
(2, 9.5),
(3, 10),
(4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `pagamento`
--

CREATE TABLE IF NOT EXISTS `pagamento` (
  `Pedido_id` int(10) unsigned NOT NULL,
  `valor_bruto` double unsigned NOT NULL,
  `valor_liquido` double unsigned NOT NULL,
  `imposto` double unsigned NOT NULL,
  `Feedback_cliente_Cliente_ID` int(10) unsigned NOT NULL,
  KEY `Pedido_id` (`Pedido_id`),
  KEY `fk_Pagamento_Feedback_cliente1` (`Feedback_cliente_Cliente_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagamento`
--

INSERT INTO `pagamento` (`Pedido_id`, `valor_bruto`, `valor_liquido`, `imposto`, `Feedback_cliente_Cliente_ID`) VALUES
(1, 39.65, 29.65, 10, 1),
(2, 25.4, 15.4, 10, 2),
(3, 12, 2, 10, 3),
(4, 54.28, 44.28, 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `local` varchar(225) NOT NULL,
  `data_hora` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `cliente_id` int(10) unsigned NOT NULL,
  `Assistente_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `Assistente_id` (`Assistente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pedido`
--

INSERT INTO `pedido` (`id`, `local`, `data_hora`, `status`, `cliente_id`, `Assistente_id`) VALUES
(1, 'Avenida do Contorno', '2016-06-25 19:38:00', 2, 1, 1),
(2, 'Rua Portugal', '2016-05-30 14:54:00', 0, 2, 2),
(3, 'Rua Dido', '2016-05-25 10:34:00', 0, 3, 3),
(4, 'Avenida Engenheiros', '2016-03-12 08:16:00', 0, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id` int(10) unsigned NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `nome`) VALUES
(1, 'Gerente Clinica'),
(2, 'Assistente'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(40) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `tipo` int(10) unsigned NOT NULL,
  `fk` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo` (`tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`, `tipo`, `fk`) VALUES
(1, 'clinica', '123', 1, 1),
(2, 'assistente', '123', 2, 1),
(3, 'cliente', '123', 3, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assistente`
--
ALTER TABLE `assistente`
  ADD CONSTRAINT `assistente_ibfk_1` FOREIGN KEY (`Clinica_id`) REFERENCES `clinica` (`id`);

--
-- Constraints for table `feedback_cliente`
--
ALTER TABLE `feedback_cliente`
  ADD CONSTRAINT `fk_Feedback_cliente_Clientes` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `fk_Pagamento_Feedback_cliente1` FOREIGN KEY (`Feedback_cliente_Cliente_ID`) REFERENCES `feedback_cliente` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`Pedido_id`) REFERENCES `pedido` (`id`);

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`Assistente_id`) REFERENCES `assistente` (`id`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
