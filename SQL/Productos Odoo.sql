Select PP.id as ID, PP.ean13 as CodigoBarras, PP.name_template as Nombre, PT.list_price as Precio, PU.name As Unidad 
from product_product as PP, product_template as PT, product_uom as PU 
WHERE PT.id = PP.product_tmpl_id and PT.company_id = 1 and PU.id = PT.uom_id and PT.type = 'product' and PT.sale_ok = TRUE;

CREATE DATABASE vales;
USE vales;

CREATE TABLE productos(
	id INT NOT NULL COMMENT 'identificador de la base de datos origen',
	codigo VARCHAR(50) NOT NULL COMMENT 'Codigo de barras de cada producto',
	nombre VARCHAR NOT NULL COMMENT 'nombre del producto',
	precio DOUBLE NOT NULL COMMENT 'Es el precio de los productos',
	unidad VARCHAR(50) NOT NULL COMMENT 'Es la unidad para cada prodcuto',
	PRIMARY KEY (id)
);

CREATE TABLE empleados(
	id_empleado INT NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
	nombre VARCHAR(100) NOT NULL COMMENT 'nombre del empleado',
	empresa VARCHAR(3) NOT NULL COMMENT 'Siglas de empresa a la que pertenece',
	activo BIT NOT NULL COMMENT 'Para saber si esta activo',
	PRIMARY KEY (id_empleado)
);

CREATE TABLE vale(
	id_venta INT NOT NULL COMMENT 'Folio de cada venta',
	id_empleado INT NOT NULL COMMENT 'Id del empleado que compro',
	activo BIT NOT NULL COMMENT "Para saber si esta activo o no la venta"
);

CREATE TABLE venta(
	id_producto INT NOT NULL COMMENT 'relacion con el Producto vendido',
	cantidad DOUBLE NOT NULL COMMENT 'Cantidad comprada',
	tienda VARCHAR(3) NOT NULL COMMENT 'tienda donde se compro el prodcuto',
	precio DOUBLE NOT NULL COMMENT 'Precio total de la veneta',
	fecha DATE NOT NULL COMMENT 'Fecha en la que se realizo la venta',
	id_venta INT NOT NULL COMMENT 'Folio de cada venta',
);


INSERT INTO empleados (nombre,empresa,activo) VALUES ('ANTONIO JIMENEZ BLANCO','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('MARIA ALEJANDRA HERNANDEZ FONSECA','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('HILARIO CASTAÑEDA HERNANDEZ','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('LUIS MIGUEL LIMA NIETO','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('JUAN MIGUEL NIEVA PONCE','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('JESUS ARMANDO HERNANDEZ MORENO','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('RAYMUNDO ONOFRE PAZ LAZCANO','CBA',1);

INSERT INTO empleados (nombre,empresa,activo) VALUES ('JUAN PABLO MORALES CARCAMO','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('NORITA ENRIQUEZ PARRAZALES','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('HUMBERTO MARTINEZ SALINAS','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('MARIA ELENA BELLO CASAS','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('MARIA ESTHER ILLESCAS FERNANDEZ','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('PEDRO JUAREZ SANCHEZ','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('BLANCA ANTONIA BARRADAS CASTRO ','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('FRANCISCO HUERTA DEL PILAR','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('ROBERTO CARLOS GONZALEZ JUAREZ','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('ROSA ELVIA CAMACHO GUZMAN','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('GUSTAVO HUERTA XOCUA','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('LUZ MARIA ITURBIDE ROMERO','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('EDUARDO BELLO GARCIA','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('ABDON DOMINGUEZ PALACIOS','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('RAYMUNDA PATRICIA DE LOS SANTOS LEON','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('ALICIA LOPEZ AGUILAR','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('OMAR SOLIS VILLICAÑA','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('ROSA ANGELICA MORENO CONTRERAS','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('BALTASAR SANCHEZ ESPINOSA DE LOS MONTEROS','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('JUAN CARLOS JIMENEZ VELEZ','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('IVAN BRITO PEÑA','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('ALDO RODRIGUEZ BLANCO','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('MARTIN SEGURA MENDOZA','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('RENE ANTONIO GARCIA VAZQUEZ','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('DANIEL PALMA TRUJILLO','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('JOSE MARCOS VAZQUEZ SILVESTRE','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('EUGENIO PEREZ ABREGO ','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('LUIS ANGEL MORGADO LOPEZ','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('JONATHAN DE JESUS GILES TINOCO','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('MARCOS SOLIS HERNANDEZ','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('ISAAC JOSUE GONZALEZ GRANADOS','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('JESUS FERNANDO ALCANTARA RODRIGUEZ','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('ONESIMO VAZQUEZ SILVESTRE','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('CYNTHIA ZOAR MARRON MENDEZ ','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('GALDINO POZOS RAMIREZ','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('CESAR SAMUEL RODRIGUEZ HERNANDEZ','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('GERSON ZILLI PEÑA','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('RAQUEL JUDITH MENDEZ ROSALES','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('ADRIAN VICTORIA ILLESCAS','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('MARIANO ALBERTO DIAZ EUGENIO','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('ARANZAZU CALATAYUD GUTIERREZ','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('RAUL SOSA ALEMAN','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('JOSE RICARDO PEREZ VERA','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('LEONEL SARMIENTO RODRIGUEZ','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('JOSE JAVIER NORIEGA GONZALEZ','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('BARTOLO PALACIOS GONZALEZ','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('JOSE LUIS ALTAMIRA CUEL','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('RAUL MILIAN VAZQUEZ','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('ARSENIO NAJERA BAUTISTA','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('OSCAR ARTURO GONZALEZ RAMOS','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('MARCOS LOPEZ ESPEJO','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('JOSE RODRIGO VERA REYES','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('SANDRA ROSAS RODRIGUEZ','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('CARLOTA BAEZ QUIRAZCO','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('VERONICA REYES OLMOS','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('JOSE IGNACIO PEÑA PEREZ','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('ELISEO DIMAS MENDOZA','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('MARIA DEL CARMEN VAZQUEZ GIL','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('MARIA HEIDI SANCHEZ ESPINOSA DE LOS MONTEROS','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('NATALI MUÑOZ GALICIA','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('PATRICIA RODRIGUEZ GINEZ','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('OMAR CASTRO HERNANDEZ','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('GUADALUPE DELGADO MALAGON','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('MARIA HEIDI ESPINOSA DE LOS MONT MORANCHEL','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('MARISOL JIMENEZ REYES','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('MARIA DEL ROCIO RODRIGUEZ ORTEGA','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('FABIOLA DAMIAN ROSAS','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('ANDRES JIMENEZ BLANCO','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('ALFONSO BALLESTEROS AVILA','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('BALTASAR SANCHEZ REGULES','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('GUILLERMO DOMINGUEZ MEDINA','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('IVAN DE JESUS RODRIGUEZ PAREDES','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('JOSE CARLOS ARAIZA MORENO ','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('JOSE MANUEL ROMERO PAULINO','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('SALVADOR GONZALEZ ROMERO','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('AGUSTIN ORDUÑA MARTINEZ','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('ALEJANDRO VASQUEZ REYES','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('EDGAR DANIEL VELEZ BELLO','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('ANITA MUÑOZ GALICIA','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('LUIS JAVIER RODRIGUEZ LOPEZ','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('TERESA AGUILAR ROSAS','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('KARLA JACQUELINE VAZQUEZ LOPEZ','CBC',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('CLAUDIA COLORADO CRISOSTOMO','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('RAMIRO MALDONADO COLOHUA','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('JORGE ALEJANDRO MORA VALDIVIA ','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('JONATHAN SAINZ GASPERIN','CBA',1);
INSERT INTO empleados (nombre,empresa,activo) VALUES ('ANGEL JAFFAR ROBLES RODRIGUEZ','CBA',1);

INSERT INTO ventas (id_venta, id_empleado,activo) VALUES (1,1,1);

SELECT P.nombre, V.cantidad, V.precio FROM productos P, venta V WHERE V.id_venta = 1 AND V.id_producto = P.id;

SELECT P.nombre, V.cantidad, V.precio FROM productos P, venta V 
WHERE V.id_venta = 1 AND V.id_producto = ;

SELECT E.nombre, V.id_venta FROM vale V, empleados E, venta Ve WHERE 
V.id_empleado = E.id_empleado AND V.id_venta = Ve.id_venta AND Ve.fecha = '2018-04-09' 
GROUP BY E.nombre; 

CREATE TABLE usuarios(
	id_usuario INT NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
	usuario VARCHAR(100) NOT NULL COMMENT 'Nombre de usuario',
	contraseña VARCHAR(20) NOT NULL COMMENT 'contraseña del usuario',
	tipo VARCHAR(3) NOT NULL COMMENT 'Tipo de usuario',
	activo BIT NOT NULL COMMENT 'Para saber si esta activo',
	PRIMARY KEY (id_usuario)
);

INSERT INTO usuarios (usuario,contraseña,tipo,activo) VALUES ('Samuel','123','Adm',1);