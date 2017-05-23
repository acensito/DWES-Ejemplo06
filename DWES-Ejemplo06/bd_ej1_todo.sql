-- Creamos la base de datos
CREATE DATABASE IF NOT EXISTS `examen` DEFAULT CHARACTER SET utf8;
USE `examen`;

-- Creamos las tabla
CREATE TABLE IF NOT EXISTS `examen`.`usuariosapp` (
`id` mediumint( 9 ) NOT NULL AUTO_INCREMENT ,
`usuario` varchar( 25 )  NOT NULL ,
`password` varchar( 50 )NOT NULL ,
`nombre` varchar( 50 ) NOT NULL ,
`ap1` varchar( 50 )  NOT NULL ,
`ap2` varchar( 50 )  NOT NULL ,
`tfno` varchar( 8 )  ,
PRIMARY KEY ( `id` ) ,
UNIQUE KEY `id` ( `id` , `usuario` )
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

-- Creamos el usuario y le asignamos privilegios

GRANT SELECT,INSERT,UPDATE,DELETE
ON `examen`.* TO `usuadmin`@`localhost` IDENTIFIED BY 'administrador';

GRANT SELECT,INSERT,UPDATE,DELETE
ON `examen`.* TO `usuadmin`@`%` IDENTIFIED BY 'administrador';

-- Insertamos un usuario

INSERT INTO `examen`.`usuariosapp` (usuario, password, nombre, ap1, ap2) VALUES ('usuexam',SHA1('pwdexam'),'UsuarioExam','Junio','2013');
INSERT INTO `examen`.`usuariosapp` (usuario, password, nombre, ap1, ap2) VALUES ('us1',SHA1('1'),'u1','Junio','2013');
INSERT INTO `examen`.`usuariosapp` (usuario, password, nombre, ap1, ap2) VALUES ('us2',SHA1('2'),'u2','Junio','2013');
INSERT INTO `examen`.`usuariosapp` (usuario, password, nombre, ap1, ap2) VALUES ('us3',SHA1('3'),'u3','Junio','2013');