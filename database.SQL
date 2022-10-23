CREATE TABLE VentasEnMesa ( 
	numeroMesa smallint,
	numeroPersonas smallint,
	ventaID integer PRIMARY KEY AUTO_INCREMENT
);


CREATE TABLE VentasADomicilio ( 
	direccion varchar(200),
	referencia varchar(150),
	nombreCliente varchar(70),
	telefono varchar(10),
	ventaID integer PRIMARY KEY AUTO_INCREMENT
);


CREATE TABLE Ventas ( 
	totalVenta double(6,2),
	tipoVenta varchar(15),
	ventaID Integer PRIMARY KEY AUTO_INCREMENT,
	usuarioID Integer NOT NULL
);


CREATE TABLE Usuarios ( 
	userName varchar(30) NOT NULL UNIQUE,
	password varchar(25) NOT NULL,
	nombrePersona varchar(70),
	tipoUsuario char(2) NOT NULL,
	usuarioID Integer PRIMARY KEY AUTO_INCREMENT
);


CREATE TABLE Productos_Venta ( 
	ventaID integer NOT NULL,
	productoID integer NOT NULL,
	cantidadProducto numeric(6,3) NOT NULL,
	ID Integer PRIMARY KEY AUTO_INCREMENT
);


CREATE TABLE Productos ( 
	nombre  varchar(70) NOT NULL,
	unidadDeMedida varchar(10),
	precioDeVenta double(6,2),
	costoDeProduccion double(6,2),
	categoria varchar(30),
	productoID Integer PRIMARY KEY AUTO_INCREMENT,
	stock double(6,3)
);


CREATE TABLE Operacion ( 
	fechaDeRegistro timestamp NOT NULL,
	usuarioID Integer,
	operacionID Integer PRIMARY KEY AUTO_INCREMENT
);

