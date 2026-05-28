create database if not exists proyecto_zapateria;
use proyecto_zapateria;
CREATE TABLE cliente (
  id_cliente INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  dpi VARCHAR(13) NOT NULL,
  direccion VARCHAR(70) NOT NULL,
  telefono INT(10) NOT NULL,
  email VARCHAR(50));
  
  CREATE TABLE detalle_ingreso (
  id_detalle_ingreso INT PRIMARY KEY AUTO_INCREMENT,
  cantidad INT(10) NOT NULL,
  precio_compra DECIMAL(11,2) NOT NULL,
  precio_venta DECIMAL(11,2) NOT NULL,
  id_ingreso INT,
  id_zapato INT);

  
  CREATE TABLE detalle_venta (
  id_detalle_venta INT PRIMARY KEY AUTO_INCREMENT,
  cantidad INT(10) NOT NULL,
  precio_venta DECIMAL(11,2) NOT NULL,
  descuento DECIMAL(11,2) NOT NULL,
  total DECIMAL(11,2) NOT NULL,
  id_venta INT,
  id_zapato INT);

  
  CREATE TABLE ingreso (
  id_ingreso INT PRIMARY KEY AUTO_INCREMENT,
  tipo_comprobante VARCHAR(20) NOT NULL,
  serie_comprobante VARCHAR(5) NOT NULL,
  no_comprobante INT(10) NOT NULL,
  fecha_hora DATETIME NOT NULL,
  total_compra DECIMAL(11,2) NOT NULL,
  estados VARCHAR(20) NOT NULL,
  id_proveedor INT,
  id_usuario INT);
  
  
  CREATE TABLE marca (
  id_marca INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  origen VARCHAR(45) NOT NULL,
  imagen VARCHAR(100));
  
  CREATE TABLE proveedor (
  id_proveedor INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  direccion VARCHAR(70) NOT NULL,
  telefono INT(8) NOT NULL,
  email VARCHAR(50) NOT NULL,
  imagen VARCHAR(100),
  id_marca INT);
  
  CREATE TABLE usuario (
  id_usuario INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(70) NOT NULL,
  dpi VARCHAR(13) NOT NULL,
  direccion VARCHAR(45) NOT NULL,
  telefono INT(10) NOT NULL,
  email VARCHAR(70) NOT NULL,
  password VARCHAR(45) NOT NULL,
  imagen VARCHAR(100),
  status int(1) NOT NULL);
  
  CREATE TABLE venta (
  id_venta INT PRIMARY KEY AUTO_INCREMENT,
  tipo_comprobante VARCHAR(20) NOT NULL,
  serie_comprobante VARCHAR(5) NOT NULL,
  fecha_hora DATETIME NOT NULL,
  total_venta DECIMAL(11,2) NOT NULL,
  estados VARCHAR(20) NOT NULL,
  id_cliente INT,
  id_usuario INT);
  
  CREATE TABLE zapato (
  id_zapato INT PRIMARY KEY AUTO_INCREMENT,
  estilo VARCHAR(20) NOT NULL,
  descripcion VARCHAR(100) NOT NULL,
  talla VARCHAR(20) NOT NULL,
  stock INT(20) NOT NULL,
  precio DECIMAL(6,2) NOT NULL,
  imagen VARCHAR(100));
  
  
  /*Creación de llaves primarias*/
alter table proveedor ADD foreign key (id_marca) references marca(id_marca);  
alter table venta ADD foreign key (id_cliente) references cliente(id_cliente);
alter table venta ADD foreign key (id_usuario) references usuario(id_usuario);
alter table detalle_ingreso ADD foreign key (id_ingreso) references ingreso(id_ingreso);
alter table detalle_ingreso ADD foreign key (id_zapato) references zapato(id_zapato);
alter table detalle_venta ADD foreign key (id_venta) references venta(id_venta);
alter table detalle_venta ADD foreign key (id_zapato) references zapato(id_zapato);
alter table ingreso ADD foreign key (id_proveedor) references proveedor(id_proveedor);
alter table ingreso ADD foreign key (id_usuario) references usuario(id_usuario);

/*Creación de Triggers*/
DELIMITER //
CREATE TRIGGER actualizar_zapato 
AFTER INSERT ON detalle_ingreso 
FOR EACH ROW 
BEGIN
  UPDATE zapato 
  SET stock = stock + NEW.cantidad, 
      precio = NEW.precio_venta 
  WHERE zapato.id_zapato = NEW.id_zapato;
END//
DELIMITER ;

DELIMITER //
CREATE TRIGGER actualizar_zapato2 
AFTER INSERT ON detalle_venta 
FOR EACH ROW 
BEGIN
  UPDATE zapato 
  SET stock = stock - NEW.cantidad 
  WHERE zapato.id_zapato = NEW.id_zapato;
END//
DELIMITER ;

DELIMITER //
CREATE TRIGGER actualizar_total_compra
AFTER INSERT ON detalle_ingreso
FOR EACH ROW
BEGIN
  UPDATE ingreso
  SET total_compra = total_compra + (NEW.precio_compra * NEW.cantidad)
  WHERE id_ingreso = NEW.id_ingreso;
END//
DELIMITER ;


