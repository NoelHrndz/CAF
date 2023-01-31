CREATE TABLE roles(
	cod_rol INT PRIMARY KEY NOT NULL,
	nombre_rol VARCHAR(15) NOT NULL
);

CREATE TABLE usuarios(
	cod_usuario INT PRIMARY KEY NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	usuario VARCHAR(50) NOT NULL,
	clave TEXT NOT NULL,
	estado CHAR(1) NOT NULL,
	correo VARCHAR(50) NOT NULL,
	cod_rol INT NOT NULL,

	CONSTRAINT FK_usuarios_roles
	FOREIGN KEY (cod_rol) REFERENCES roles(cod_rol) 
		ON UPDATE CASCADE
		ON DELETE CASCADE
);

CREATE TABLE empresas(
	cod_empresa INT PRIMARY KEY NOT NULL,
	nombre_empresa VARCHAR(50) NOT NULL,
	nombre_BD_SAP VARCHAR(50) NOT NULL,
	estado CHAR(1) NOT NULL
);

CREATE TABLE usuario_empresas_asign(
	cod_usuario INT NOT NULL,
	cod_empresa INT NOT NULL,
	asignado CHAR(1) NOT NULL,

	CONSTRAINT FK_usuario_empresas_asign_usuarios
	FOREIGN KEY (cod_usuario) REFERENCES usuarios(cod_usuario) 
		ON UPDATE CASCADE
		ON DELETE CASCADE,

	CONSTRAINT FK_usuario_empresas_asign_empresas
	FOREIGN KEY (cod_empresa) REFERENCES empresas(cod_empresa) 
		ON UPDATE CASCADE
		ON DELETE CASCADE,

	PRIMARY KEY (cod_usuario, cod_empresa)
);

CREATE TABLE ubicacion(
	cod_ubicacion INT PRIMARY KEY NOT NULL,
	nombre_ubicacion VARCHAR(50) NOT NULL,
);
CREATE TABLE catalogo_departamentos(
codigo_departamento varchar(10) PRIMARY KEY NOT NULL,
nombre_departamento varchar(50) NOT NULL);

CREATE TABLE empleados(
	cod_empresa INT NOT NULL ,
	cod_empleado_RRHH VARCHAR(10) NOT NULL,
	nombre_completo VARCHAR(200) NOT NULL,
	codigo_departamento VARCHAR(10) NOT NULL,

	CONSTRAINT FK_empleados_empresas
	FOREIGN KEY (cod_empresa) REFERENCES empresas(cod_empresa) 
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT FK_empleados_catalogo_departamentos
	FOREIGN KEY (codigo_departamento) REFERENCES catalogo_departamentos(codigo_departamento)
	ON UPDATE CASCADE
	ON DELETE CASCADE,

	PRIMARY KEY (cod_empleado_RRHH,cod_empresa)
);

CREATE TABLE activos_fijos(
	cod_empresa INT NOT NULL,
	cod_af_SAP NVARCHAR(50) NOT NULL,
	cod_empresa_empleados INT NOT NULL,
	cod_empleado_RRHH VARCHAR(10) NOT NULL,
	serie NVARCHAR(32) NOT NULL,
	descripcion nvarchar(100) NOT NULL,
	codigo_interno VARCHAR(100) NOT NULL,
	cod_ubicacion INT NOT NULL,
	path_foto VARCHAR(100),


	CONSTRAINT FK_activos_fijos_empleados
	FOREIGN KEY (cod_empleado_RRHH,cod_empresa_empleados) REFERENCES empleados(cod_empleado_RRHH,cod_empresa),

	CONSTRAINT FK_activos_fijos_ubicacion
	FOREIGN KEY (cod_ubicacion) REFERENCES ubicacion(cod_ubicacion) 
		ON UPDATE CASCADE
		ON DELETE CASCADE,

	CONSTRAINT FK_activos_fijos_empresa
	FOREIGN KEY (cod_empresa) REFERENCES empresas(cod_empresa),

	PRIMARY KEY (cod_af_SAP,cod_empresa)
);

  
CREATE TABLE hoja_responsabilidad(
	cod_hoja_responsabilidad VARCHAR(6)  NOT NULL,
	cod_empresa INT NOT NULL,
	cod_empresa_empleados INT NOT NULL,
	cod_empleado_RRHH VARCHAR(10) NOT NULL,
	cod_empresa_af INT NOT NULL,
	cod_af_SAP NVARCHAR(50) NOT NULL,
	cod_usuario INT NOT NULL,
	cod_ubicacion INT NOT NULL,
	fecha_creacion_hoja DATETIME NOT NULL,
	fecha_asignacion_hoja DATETIME  NULL,
	fecha_creacion_retorno DATETIME NULL,	
	estado CHAR(1) NOT NULL,
	firma_empleado_entrega TEXT NULL,
	firma_empleado_retorno TEXT NULL,

	CONSTRAINT FK_hoja_responsabilidad_empleados
	FOREIGN KEY (cod_empleado_RRHH,cod_empresa_empleados) REFERENCES empleados(cod_empleado_RRHH,cod_empresa) 
		ON UPDATE CASCADE
		ON DELETE CASCADE,

	CONSTRAINT FK_hoja_responsabilidad_usuarios
	FOREIGN KEY (cod_usuario) REFERENCES usuarios(cod_usuario) 
		ON UPDATE CASCADE
		ON DELETE CASCADE,

	CONSTRAINT FK_hoja_responsabilidad_ubicacion
	FOREIGN KEY (cod_ubicacion) REFERENCES ubicacion(cod_ubicacion) 
		ON UPDATE CASCADE
		ON DELETE CASCADE,

	CONSTRAINT FK_hoja_responsabilidad_activos_fijos
	FOREIGN KEY (cod_af_SAP,cod_empresa_af) REFERENCES activos_fijos(cod_af_SAP, cod_empresa),

	CONSTRAINT FK_hoja_responsabilidad_empresas
	FOREIGN KEY (cod_empresa) REFERENCES empresas(cod_empresa),

	PRIMARY KEY (cod_hoja_responsabilidad,cod_empresa) 
);

INSERT INTO roles(cod_rol,nombre_rol) VALUES ('1','Administrador');
INSERT INTO roles(cod_rol,nombre_rol) VALUES ('2','Contabilidad');
INSERT INTO roles(cod_rol,nombre_rol) VALUES ('3','Consultas');

INSERT INTO empresas(cod_empresa,nombre_empresa,nombre_BD_SAP,estado) VALUES ('1','Sistemas y Proyectos S.A.','','A');
INSERT INTO empresas(cod_empresa,nombre_empresa,nombre_BD_SAP,estado) VALUES ('2','Montacargas de Guatemala S.A.','','A');
INSERT INTO empresas(cod_empresa,nombre_empresa,nombre_BD_SAP,estado) VALUES ('3','Soluciones de Energia Limpia','','A');
INSERT INTO empresas(cod_empresa,nombre_empresa,nombre_BD_SAP,estado) VALUES ('4','ProLogistica','','A');
INSERT INTO empresas(cod_empresa,nombre_empresa,nombre_BD_SAP,estado) VALUES ('5','Workframe','','A');

INSERT INTO catalogo_departamentos(codigo_departamento,nombre_departamento) VALUES ('0','No Asignado');

INSERT INTO empleados(cod_empresa,cod_empleado_RRHH,nombre_completo,codigo_departamento) VALUES ('1','N/A','No Asignado','0');
INSERT INTO empleados(cod_empresa,cod_empleado_RRHH,nombre_completo,codigo_departamento) VALUES ('2','N/A','No Asignado','0');
INSERT INTO empleados(cod_empresa,cod_empleado_RRHH,nombre_completo,codigo_departamento) VALUES ('3','N/A','No Asignado','0');
INSERT INTO empleados(cod_empresa,cod_empleado_RRHH,nombre_completo,codigo_departamento) VALUES ('4','N/A','No Asignado','0');
INSERT INTO empleados(cod_empresa,cod_empleado_RRHH,nombre_completo,codigo_departamento) VALUES ('5','N/A','No Asignado','0');

INSERT INTO usuarios(cod_usuario,nombre,usuario,clave,estado,correo,cod_rol) VALUES ('1','Administrador','admin','c3284d0f94606de1fd2af172aba15bf3','A','admin@admin.com','1');


INSERT INTO usuario_empresas_asign(cod_usuario,cod_empresa,asignado) VALUES('1','1','S');
INSERT INTO usuario_empresas_asign(cod_usuario,cod_empresa,asignado) VALUES('1','2','S');
INSERT INTO usuario_empresas_asign(cod_usuario,cod_empresa,asignado) VALUES('1','3','S');
INSERT INTO usuario_empresas_asign(cod_usuario,cod_empresa,asignado) VALUES('1','4','S');
INSERT INTO usuario_empresas_asign(cod_usuario,cod_empresa,asignado) VALUES('1','5','S');

INSERT INTO ubicacion(cod_ubicacion,nombre_ubicacion) VALUES('0','No Asignado');
INSERT INTO ubicacion(cod_ubicacion,nombre_ubicacion) VALUES('1','Zona 9 Oficinas Centrales');
INSERT INTO ubicacion(cod_ubicacion,nombre_ubicacion) VALUES('2','Zona 12 Cortijo');
INSERT INTO ubicacion(cod_ubicacion,nombre_ubicacion) VALUES('3','Zona 12 CDC');
INSERT INTO ubicacion(cod_ubicacion,nombre_ubicacion) VALUES('4','Zona 4 Planta');

