CREATE TABLE VentasEnMesa ( 
	numeroMesa smallint,
	numeroPersonas smallint,
	ventaID integer PRIMARY KEY AUTO INCREMENT
)
;

CREATE TABLE VentasADomicilio ( 
	direccion varchar(200),
	referencia varchar(150),
	nombreCliente varchar(70),
	telefono varchar(10),
	ventaID integer PRIMARY KEY AUTO INCREMENT
)
;

CREATE TABLE Ventas ( 
	totalVenta MONEY,
	tipoVenta varchar(15),
	ventaID Integer PRIMARY KEY AUTO INCREMENT,
	usuarioID Integer NOT NULL
)
;

CREATE TABLE Usuarios ( 
	userName varchar(30) NOT NULL UNIQUE,
	password varchar(25) NOT NULL,
	nombrePersona varchar(70),
	tipoUsuario char(2) NOT NULL,
	usuarioID Integer PRIMARY KEY AUTO INCREMENT
)
;

CREATE TABLE Productos_Venta ( 
	ventaID integer NOT NULL,
	productoID integer NOT NULL,
	cantidadProducto numeric(6,3) NOT NULL,
	ID PRIMARY KEY AUTO INCREMENT
)
;

CREATE TABLE Productos ( 
	nombre varchar(70) NOT NULL,
	unidadDeMedida varchar(10),
	precioDeVenta MONEY,
	costoDeProduccion MONEY,
	categoria varchar(30),
	productoID Integer PRIMARY KEY AUTO INCREMENT,
	stock numeric(7,3)
)
;

CREATE TABLE Operacion ( 
	fechaDeRegistro timestamp NOT NULL,
	usuarioID Integer,
	operacionID Integer PRIMARY KEY AUTO INCREMENT
)
;
