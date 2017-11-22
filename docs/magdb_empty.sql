CREATE TABLE IF NOT EXISTS `fluxo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `habilidade` int(11) DEFAULT NULL,
  `desafio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `reputacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pontos` int(11) DEFAULT NULL,
  `pontos_nes` int(11) DEFAULT NULL,
  `nivel` varchar(24) DEFAULT NULL,
  `nivel_prox` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `fluxo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_fluxo_id_professor` (`fluxo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `professor`
  ADD CONSTRAINT `fk_fluxo_id_professor` FOREIGN KEY (`fluxo_id`) REFERENCES `fluxo` (`id`);

CREATE TABLE IF NOT EXISTS `aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ra` varchar(14) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `semestre` int(1) DEFAULT NULL,
  `curso` varchar(100) DEFAULT NULL,
  `universidade` varchar(100) DEFAULT NULL,
  `professor_id` int(11) NOT NULL,
  `reputacao_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ra` (`ra`),
  KEY `fk_professor_id_aluno` (`professor_id`),
  KEY `fk_reputacao_id_aluno` (`reputacao_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_professor_id_aluno` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`);

ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_reputacao_id_aluno` FOREIGN KEY (`reputacao_id`) REFERENCES `reputacao` (`id`);
  