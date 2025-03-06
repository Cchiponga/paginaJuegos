
create database paginaajuegos;
use paginaajuegos;


CREATE TABLE Clasificacion
(
  id_clasificacion INT NOT NULL,
  clasificacion VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_clasificacion)
);

CREATE TABLE Desarrollador
(
  id_desarrollador INT NOT NULL,
  desarrollador VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_desarrollador)
);

CREATE TABLE Genero
(
  id_genero INT NOT NULL,
  genero VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_genero)
);

CREATE TABLE Distribuidor
(
  id_distribuidor INT NOT NULL,
  distribuidor VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_distribuidor)
);

CREATE TABLE Usuario
(
  id_usuario INT NOT NULL AUTO_INCREMENT,
  usuario VARCHAR(50) NOT NULL,
  contraseña VARCHAR(50) NOT NULL,
  mail VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_usuario),
  UNIQUE (mail)
);



CREATE TABLE Juego
(
  id_juego INT NOT NULL,
  nombreJuego VARCHAR(50) NOT NULL,
  precio FLOAT NOT NULL,
  lanzamiento DATE NOT NULL,
  id_genero INT NOT NULL,
  id_desarrollador INT NOT NULL,
  id_clasificacion INT NOT NULL,
  id_distribuidor INT NOT NULL,
  PRIMARY KEY (id_juego)
);

CREATE TABLE Carrito
(
  id_carrito INT NOT NULL AUTO_INCREMENT,
  precioJuego FLOAT NOT NULL,
  id_usuario INT NOT NULL,
  id_juego INT NOT NULL,
  PRIMARY KEY (id_carrito)
);

CREATE TABLE Requerimientos
(
  id_requerimientos INT NOT NULL,
  CPUMinima VARCHAR(50) NOT NULL,
  CPUMaxima VARCHAR(50) NOT NULL,
  GPUMinima VARCHAR(50) NOT NULL,
  GPUMaxima VARCHAR(50) NOT NULL,
  ramMinima VARCHAR(50) NOT NULL,
  ramRecomendada VARCHAR(50) NOT NULL,
  EspacioRequerido VARCHAR(50) NOT NULL,
  id_juego INT NOT NULL,
  PRIMARY KEY (id_requerimientos)
);


CREATE TABLE biblioteca
(
  id_ventas INT NOT NULL AUTO_INCREMENT,
  id_usuario INT NOT NULL,
  id_juego INT NOT NULL,
  PRIMARY KEY (id_ventas)
);


INSERT INTO usuario VALUES(1,"admin",123,"admin@admin.com");

INSERT INTO clasificacion VALUES(0,"PEGI 3");
INSERT INTO clasificacion VALUES(1,"PEGI 7");
INSERT INTO clasificacion VALUES(2,"PEGI 12");
INSERT INTO clasificacion VALUES(3,"PEGI 16");
INSERT INTO clasificacion VALUES(4,"PEGI 18");


INSERT INTO genero VALUES(0,"Accion");
INSERT INTO genero VALUES(1,"Aventura");
INSERT INTO genero VALUES(2,"Rol");
INSERT INTO genero VALUES(3,"Estrategia");
INSERT INTO genero VALUES(4,"Deportes y carreras");



/*
accion
*/
INSERT INTO desarrollador VALUES(0,"RockStar North");
INSERT INTO desarrollador VALUES(1,"Valve");
INSERT INTO desarrollador VALUES(2,"Respawn Entertainment");
INSERT INTO desarrollador VALUES(3,"CAPCOM Co.,Ltd.");
INSERT INTO desarrollador VALUES(4,"id Software");

/*
aventura
*/
INSERT INTO desarrollador VALUES(5,"Re-Logic");
INSERT INTO desarrollador VALUES(6,"Endnight Games Ltd");
INSERT INTO desarrollador VALUES(7,"Avalanche Software");
INSERT INTO desarrollador VALUES(8,"Moon Studios GmbH");
INSERT INTO desarrollador VALUES(9,"Klei Entertainment");
/*
Rol
*/
INSERT INTO desarrollador VALUES(10,"Larian Studios");
INSERT INTO desarrollador VALUES(11,"Square Enix");
INSERT INTO desarrollador VALUES(12,"CD PROJEKT RED");
INSERT INTO desarrollador VALUES(13,"NEOWIZ");
INSERT INTO desarrollador VALUES(14,"FromSoftware Inc");
/*
Estrategia
*/
INSERT INTO desarrollador VALUES(15,"FireFly Studios");
INSERT INTO desarrollador VALUES(16,"Paradox Development Studio");
INSERT INTO desarrollador VALUES(17,"Firexis Games");
INSERT INTO desarrollador VALUES(18,"ATLUS");
INSERT INTO desarrollador VALUES(19,"Ludeon Studios");

/*
Deporte y carreras
*/
INSERT INTO desarrollador VALUES(20,"Kunos Simulazioni");
INSERT INTO desarrollador VALUES(21,"Codemasters");
INSERT INTO desarrollador VALUES(22,"Milestone S.r.l.");
INSERT INTO desarrollador VALUES(23,"CodeMasters");
INSERT INTO desarrollador VALUES(24,"Roll7");


/*
accion
*/
INSERT INTO distribuidor VALUE(0,"Rockstar Games");
INSERT INTO distribuidor VALUE(1,"Valve");
INSERT INTO distribuidor VALUE(2,"Electronic Arts");
INSERT INTO distribuidor VALUE(3,"CAPCOM CO.,Ltd.");
INSERT INTO distribuidor VALUE(4,"Bethesda Softworks");
/*
aventura
*/
INSERT INTO distribuidor VALUE(5,"Re-Logic");
INSERT INTO distribuidor VALUE(6,"Endnight Games Ltd");
INSERT INTO distribuidor VALUE(7,"Warner Bros.Games");
INSERT INTO distribuidor VALUE(8,"Xbox Game Studios");
INSERT INTO distribuidor VALUE(9,"Klei Entertainment");
/*
Rol
*/
INSERT INTO distribuidor VALUE(10,"Larian Studios");
INSERT INTO distribuidor VALUE(11,"Square Enix");
INSERT INTO distribuidor VALUE(12,"CD PROJEKT RED");
INSERT INTO distribuidor VALUE(13,"NEOWIZ");
INSERT INTO distribuidor VALUE(14,"Bandai Namco Entertainment");
/*
Estrategia
*/
INSERT INTO distribuidor VALUE(15,"FireFly Studios");
INSERT INTO distribuidor VALUE(16,"Paradox Interactive");
INSERT INTO distribuidor VALUE(17,"2K");
INSERT INTO distribuidor VALUE(18,"SEGA");
INSERT INTO distribuidor VALUE(19,"Ludeon Studios");
/*
Deporte y carrera

*/
INSERT INTO distribuidor VALUE(20,"Kunos Simulazioni");
INSERT INTO distribuidor VALUE(21,"Codemasters");
INSERT INTO distribuidor VALUE(22,"Milestone S.r.l.");
INSERT INTO distribuidor VALUE(23,"Electronic Arts");
INSERT INTO distribuidor VALUE(24,"Private Division");

/*
accion
*/
INSERT INTO juego VALUE(0,"Grand Theft Auto V",60,"2015-04-14",0,0,4,0);
INSERT INTO juego VALUE(1,"Left 4 Dead 2",20,"2009-11-17",0,1,3,1);
INSERT INTO juego VALUE(2,"Titanfall® 2",45,"2016-10-28",0,2,3,2);
INSERT INTO juego VALUE(3,"Devil May Cry 5",60,"2019-03-7",0,3,3,3);
INSERT INTO juego VALUE(4,"DOOM Eternal",45,"2020-03-20",0,4,4,4);

/*
aventura
*/
INSERT INTO juego VALUE(5,"Terraria",25,"2011-05-16",1,5,0,5);
INSERT INTO juego VALUE(6,"The Forest",20,"2018-04-30",1,6,3,6);
INSERT INTO juego VALUE(7,"Hogwarts Legacy",60,"2023-02-10",1,7,2,7);
INSERT INTO juego VALUE(8,"Ori and the Will of the Wisps",45,"2020-03-11",1,8,1,8);
INSERT INTO juego VALUE(9,"Don't Starve",25,"2013-04-23",1,9,3,9);

/*
Rol
*/
INSERT INTO juego VALUE(10,"Baldur's Gate 3",60,"2023-08-03",2,10,3,10);
INSERT INTO juego VALUE(11,"FINAL FANTASY XIV Online",40,"2014-02-18",2,11,2,11);
INSERT INTO juego VALUE(12,"Cyberpunk 2077",50,"2020-12-09",2,12,4,12);
INSERT INTO juego VALUE(13,"Lies of P",55,"2023-09-18",2,13,3,13);
INSERT INTO juego VALUE(14,"ELDEN RING",60,"2022-02-24",2,14,3,14);

/*
Estrategia
*/
INSERT INTO juego VALUE(15,"Stronghold:Definitive Edition",35,"2023-11.07",3,15,2,15);
INSERT INTO juego VALUE(16,"Hearth of Iron IV",50,"2016-06-06",3,16,2,16);
INSERT INTO juego VALUE(17,"Sid Meier's Civilization® VI",35,"2016-10-21",3,17,2,17);
INSERT INTO juego VALUE(18,"Persona 5 Royal",55,"2022-10-21",3,18,2,18);
INSERT INTO juego VALUE(19,"RimWorld",35,"2018-10-17",3,19,2,19);

/*
Deportes y carrera
*/
INSERT INTO juego VALUE(20,"Asseto Corsa",25,"2014-12-19",4,20,1,20);
INSERT INTO juego VALUE(21,"DiRT Rally 2.0",30,"2019-02-25",4,21,1,21);
INSERT INTO juego VALUE(22,"MotoGP™22",50,"2022-04-21",4,22,1,22);
INSERT INTO juego VALUE(23,"F1® 23",60,"2023-06-16",4,23,1,23);
INSERT INTO juego VALUE(24,"OlliOlli World",30,"2022-02-07",4,24,0,24);


INSERT INTO requerimientos VALUES(0,"NVIDIA 9800GT","NVIDIA GTX 660","Intel Core 2","Intel Core i5","4GB RAM","8GB RAM","110GB de espacio disponible",0);
INSERT INTO requerimientos VALUES(1,"NVIDIA 6600","NVIDIA 7600","Pentium 4","Intel Core 2","2GB RAM","2GB RAM","13GB de espacio disponible",1);
INSERT INTO requerimientos VALUES(2,"NVIDIA Geforce GTX 660","NVIDIA Geforce GTX 1060","Intel Core i3-6300t","Intel Core i5-6600","8GB RAM","16GB RAM","45GB de espacio disponible",2);
INSERT INTO requerimientos VALUES(3,"NVIDIA GeForce GTX 760","NVIDIA GeForce 1060","Intel Core i5-4460","Intel Core i7-3770","8GB RAM","16GB RAM","35GB de espacio disponible",3);
INSERT INTO requerimientos VALUES(4,"NIVIDIA GeForce GTX 1050Ti","NVIDIA GeForce GTX 1060","Intel Core i5","Intel Core i7-6700K","8GB RAM","8GB RAM","80GB de espacio disponible",4);
INSERT INTO requerimientos VALUES(5,"Shader Model 1.1","Shader Model 2.0+","1.6 GHz","Dual Core 3.0 GHz","512MB RAM","4GB RAM","4GB de espacio disponible",5);
INSERT INTO requerimientos VALUES(6,"NVIDIA GeForce 8800GT","NVIDIA GeForce GTX 560","Intel Dual-Core","Quad Core Processor","4GB RAM","4GB RAM","5GB de espacio disponible",6);
INSERT INTO requerimientos VALUES(7,"NVIDIA GeForce GTX 960","NVIDIA GeForce 1080Ti","Intel Core i5-6600","Intel Core i7-8700","16GB RAM","16GB RAM","85GB de espacio disponible",7);
INSERT INTO requerimientos VALUES(8,"Nvidia GTX 950","Nvidia GTX 970","AMD Athlon X4","AMD Ryzen 3","8GB RAM","8GB RAM","20GB de espacio disponible",8);
INSERT INTO requerimientos VALUES(9,"Raedeon HD5450","Nvidia GTX 970","1.7GHz o superior","2.5GHz o superior","1GB RAM","4GB RAM","500MB de espacio disponible",9);
INSERT INTO requerimientos VALUES(10,"Nvidia GTX 970","Nvidia 2060 Super","Intel i5 4690","Intel i7 8700K","8GB RAM","16GB RAM","150GB de espacio disponible",10);
INSERT INTO requerimientos VALUES(11,"Nvidia GeForce GTX750","Nvidia GeForce GTX970","Intel Core i5","Intel Core i7","4GB RAM","8GB RAM","80GB de espacio disponible",11);
INSERT INTO requerimientos VALUES(12,"GeForce GTX 1060","GeForce RTX 2060","Intel Core i7-6700","Intel Core i7-12700","12GB RAM","16GB RAM","70GB de espacio disponbile",12);
INSERT INTO requerimientos VALUES(13,"NVIDIA GeForce GTX 960","NVIDIA GeForce GTX 1660","AMD RYZEN 3-1200","AMD RYZEN 3-1200","8GB RAM","16GB RAM","50GB de espacio disponible",13);
INSERT INTO requerimientos VALUES(14,"NVIDIA GeForce GTX 1060","NVIDIA GeForce GTX 1070","Intel Core i5-8400","Intel Core i7-8700K","12GB RAM","16GB RAM","60GB de espacio disponible",14);
INSERT INTO requerimientos VALUES(15,"Graphics Card 2GB","Graphics Card 3GB","Intel Core i3-3220","Intel Core i3-6300","6GB RAM","8GB RAM","4GB de espacio disponbile",15);
INSERT INTO requerimientos VALUES(16,"Nvidia GeForce GTX 470","Nvidia GeForce GTX 570","Intel Core i5-750","Intel Core i5-2500K","4GB RAM","6GB RAM","2GB de espacio disponible",16);
INSERT INTO requerimientos VALUES(17,"AMD 5570","AMD 7970","Intel Core i3","Intel Core i5","4GB RAM","8GB RAM","23GB de espacio disponible",17);
INSERT INTO requerimientos VALUES(18,"Nvidia GeForce GTX 650Ti","Nvidia GeForce GTX 760","Intel Core i7-4790","Intel Core i7-4790","8GB RAM","8GB RAM","41GB de espacio disponible",18);
INSERT INTO requerimientos VALUES(19,"Intel HD Graphics 4000","Shader Model 4.0+","Core 2 Duo","Quad Core","4GB RAM","6GB RAM","1GB de espacio disponible",19);
INSERT INTO requerimientos VALUES(20,"Nvidia GeForce GT 460","Nvidia GeForce GTX 970","Intel Core 2","Intel Quad-Core","2GB RAM","6GB RAM","30GB de espacio disponible",20);
INSERT INTO requerimientos VALUES(21,"Nvidia GTX650 Ti","Nvidia GTX 1070","Intel Core i3-2130","Intel Core i5-8600K","8GB RAM","8GB RAM","100GB de espacio dsiponible",21);
INSERT INTO requerimientos VALUES(22,"Nvidia GeForce GT 640","Nvidia GeForce GTX1050 Ti","Intel Core i3-4160","Intel Core i5-7600K","6GB RAM","8GB RAM","30GB de espacio disponible",22);
INSERT INTO requerimientos VALUES(23,"Nvidia GTX 1050Ti","Nvidia GTX1660 Ti","Intel Core i3-2130","Intel Core i5-9600K","8GB RAM","16GB RAM","80GB de espacio disponible",23);
INSERT INTO requerimientos VALUES(24,"Nvidia GeForce GT430","Nvidia GeForce GTX 550","2.5GHz dual core","2.4GHz i5","4GB RAM","4GB RAM","6GB de espacio disponible",24);






