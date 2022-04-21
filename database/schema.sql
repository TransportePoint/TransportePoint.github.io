create database transporte_point
use transporte_point
create table driver(
 `id_driver` int NOT NULL,
  `nombre_driver` varchar(50) NOT NULL,
  `edad_chofer` int NOT NULL,
  PRIMARY KEY (`id_driver`) 
);

create table customer(
 `id_customer` int NOT NULL,
  `nombre_customer` varchar(50) NOT NULL,
  `rfc_customer` varchar(15) NOT NULL,
  PRIMARY KEY (`id_customer`) 
);

create table mercancia(
 `id_mercancia` int NOT NULL,
  `nombre_mercancia` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mercancia`) 
);

create table city(
  `id_ciudad` int NOT NULL,
  `nombre_ciudad` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ciudad`) 
);

create table trip
(
	`id_consecutivo` int not null AUTO_INCREMENT,
	`id_viaje` varchar(50) not null,
	`id_driver` int NOT NULL,
	`id_ciudadorigen` int NOT NULL,
	`id_ciudaddestino` int NOT NULL,
 	`id_customer` int NOT NULL,
	`id_mercancia` int NOT null,
	`departuredate` date not null, 
	`arrivaldate` date not null,
	primary KEY(`id_consecutivo`),
	FOREIGN KEY(id_driver) REFERENCES driver(id_driver),
	FOREIGN KEY(id_ciudadorigen) REFERENCES driver(id_ciudad),
	FOREIGN KEY(id_ciudaddestino) REFERENCES driver(id_ciudad),
	FOREIGN KEY(id_customer) REFERENCES driver(id_customer),
	FOREIGN KEY(id_mercancia) REFERENCES driver(id_mercancia)
);



insert into driver values (1,'Jose Angel Cabrera',25);
insert into driver values (2,'Antonio de la Cruz',21);
insert into driver values (3,'Eduardo TomasLopez',30);
insert into driver values (4,'Alejandro Cabrera',55);

insert into city values (1,'Nuevo Laredo');
insert into city values (2,'Monterrey');
insert into city values (3,'Laredo Tx');
insert into city values (4,'Ciudad de mexico');
insert into city values (5,'Guadalajara');


insert into customer values (000078,'ABB Mexico', 'ABB0000HTBS01');
insert into customer values (000100,'Palos Garza','PG06000HTBS22');

insert into mercancia values (1,'Flete aereo');
insert into mercancia values (2,'Flete terrestre');
insert into mercancia values (3,'Flete maritimo');
insert into mercancia values (4,'Flete bulto peque;o');
insert into mercancia values (5,'Flete tractocamion');

insert into trip (id_viaje,id_driver,id_ciudadorigen,id_ciudaddestino,id_customer, id_mercancia, departuredate, arrivaldate) 
values ('FLETEPRUEBAFA-01', 1,2,3,000100,3,  '2012-05-05', '2012-05-12');


insert into trip (id_viaje,id_driver,id_ciudadorigen,id_ciudaddestino,id_customer, id_mercancia, departuredate, arrivaldate) 
values ('FLETEPRUEBAFA-02', 1,1,2,000078,3,  '2012-05-10', '2012-05-12');

insert into trip (id_viaje,id_driver,id_ciudadorigen,id_ciudaddestino,id_customer, id_mercancia, departuredate, arrivaldate) 
values ('FLETEPRUEBAFA-03', 1,2,3,000100,3,  '2012-05-01', '2012-05-02');




select t.id_consecutivo,t.id_viaje, d.nombre_driver, c.nombre_ciudad, c2.nombre_ciudad, c3.nombre_customer , m.nombre_mercancia  from trip t
	inner join driver d 
		on t.id_driver = d.id_driver 
	inner join city c 
		on t.id_ciudadorigen = c.id_ciudad
	inner join city c2 
		on t.id_ciudaddestino = c2.id_ciudad
	inner join customer c3  
		on t.id_customer = c3.id_customer
	inner join mercancia m 
		on t.id_mercancia = m.id_mercancia


select id_driver, nombre_driver from driver

select * from trip


/*usuarios*/
create table usuarios(
 `id_usuario` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(25) NOT NULL,
  `contrasena` varchar(25) NOT NULL,
  PRIMARY KEY (`id_usuario`) 
)


insert into usuarios(usuario, contrasena)
values ('jose', 'cabrera123'),
	  ('antonio','delacruz123'),
		('profe', 'zarate123')

/*todo va junto con el delimiter hasta end.*/
DELIMITER $$
CREATE PROCEDURE spSelectUser
(
	in Usuario VARCHAR(25), 
	in Contrasena varchar(25)
)
BEGIN
   select * from usuarios where usuario = Usuario and contrasena= Contrasena;
END		
			
/*todo va junto con el delimiter hasta end.*/
DELIMITER $$
CREATE PROCEDURE spInsertUser
(
	in Usuario VARCHAR(25), 
	in Contrasena varchar(25)
)
BEGIN
   insert into usuarios(usuario, contrasena) values (Usuario,Contrasena);
end

select * from trip t 

select nombre_customer from customer where id_customer = 78

select * from mercancia m 


/*PAGINA VIAJES.PHP*/
/*sp para traer en la tabla todos los viajes*/
DELIMITER $$
create procedure spSelectViajes()
BEGIN
	select t.id_consecutivo,t.id_viaje, d.nombre_driver,c.nombre_ciudad, c2.nombre_ciudad as ciudad, c3.nombre_customer , m.nombre_mercancia, t.departuredate, t.arrivaldate  
             from trip t
                 inner join driver d 
				  	on t.id_driver = d.id_driver
				 inner join city c 
                    on t.id_ciudadorigen = c.id_ciudad
                 inner join city c2 
                   on t.id_ciudaddestino = c2.id_ciudad
                 inner join customer c3  
                   on t.id_customer = c3.id_customer
                 inner join mercancia m 
                   on t.id_mercancia = m.id_mercancia;
end

/*sp para traer el nombre del driver*/
DELIMITER $$
create procedure spSelectDriver()
begin
	select id_driver, nombre_driver from driver;
end
/*sp para traer el nombre de la ciudad*/
DELIMITER $$
create procedure spSelectCity()
begin
	select id_ciudad, nombre_ciudad from city;
end

/*sp para traer el nombre del customer*/
DELIMITER $$
create procedure spSelectCustomer()
begin
	select id_customer, nombre_customer from Customer;
end

/*sp para traer el nombre de la mercancia*/
DELIMITER $$
create procedure spSelectMercancia()
begin
	select id_mercancia, nombre_mercancia from mercancia;
end


/*CIERRE DE QUERYS PAGINA VIAJES.PHP*/

/*QUERYS PAGINA DELETE_TRIP.PHP*/
DELIMITER $$
create procedure delete_trip
(
	in idconsecutivo int 
)
begin
delete from trip where id_consecutivo = idconsecutivo;
end

/**CIERRE DE QUERYS PAGINA DELETE_TRIP.PHP*/

/*querys de save_trip.php*/
DELIMITER $$
create procedure save_trip
(
	in idviaje varchar(50),
	in iddriver int,
	in idciudadorigen int, 
	in idciudaddestino int,
	in idcustomer int, 
	in idmercancia int,
	in departure date,
	in arrival date
)
begin
	insert into trip (id_viaje,id_driver,id_ciudadorigen,
		id_ciudaddestino,id_customer, id_mercancia, departuredate, arrivaldate) 
	values (idviaje,iddriver,idciudadorigen,idciudaddestino,idcustomer,
		idmercancia,departure, arrival);
end


/*querys download.php*/
DELIMITER $$
create procedure spAllTrip
(
	in idconsecutivo varchar(50)
)
begin
	select * from trip where id_consecutivo = idconsecutivo;
end

/*sp para traer el nombre del customer dependiendo su id*/
DELIMITER $$
create procedure spNameCustomer
(
	in idcustomer int
)
begin
	select nombre_customer from customer where id_customer =
idcustomer;
end

/*sp para traer el nombre de la mercancia dependiendo su id*/

DELIMITER $$
create procedure spNameMercancia
(
	in idmercancia int
)
begin
	select nombre_mercancia from mercancia where id_mercancia =
idmercancia;
end
/*cierre de querya download.*/


/*querys edit.php*/
DELIMITER $$
create procedure spEditTrip
(
	in idconsecutivo int,
	in idviaje varchar(50),
	in iddriver int,
	in idciudadorigen int, 
	in idciudaddestino int,
	in idcustomer int, 
	in idmercancia int,
	in departure date,
	in arrival date
)
begin
	UPDATE trip set id_viaje = idviaje, id_driver = iddriver, id_ciudadorigen = idciudadorigen, 
        id_ciudaddestino = idciudaddestino, id_customer = idcustomer, id_mercancia = idmercancia, 
        departuredate = departure, arrivaldate = arrival where id_consecutivo=idconsecutivo;
end


DELIMITER $$
create procedure spNameDriver
(
	in iddriver int
)
begin
	select nombre_driver from driver where id_driver =
iddriver;
end


DELIMITER $$
create procedure spNameCity
(
	in idcity int
)
begin
	select nombre_ciudad from city where id_ciudad =
idcity;
end

/*cierre de querya edit.*/