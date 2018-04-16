<?php

// Creando estructura basica para implementacion Symfony1.4
sf_projects>mkdir zebra\lib\vendor\symfony
sf_projects>robocopy symfony zebra\lib\vendor\symfony

// Verificamos que todo este bien!
sf_projects\zebra>php lib\vendor\symfony\data\bin\symfony generate:project zebra
sf_projects\zebra>php lib\vendor\symfony\data\bin\check_configuration.php
sf_projects\zebra>copy zebra\lib\vendor\symfony\data\bin\symfony.bat zebra

// Generamos los archivos de Symfony mediante la tarea Generate
sf_projects\zebra>php symfony project:permissions
sf_projects\zebra>php symfony generate:app backend
sf_projects\zebra>robocopy lib\vendor\symfony\data\lib\web web
sf_projects\zebra>php symfony plugin:publish-assets

// Nos dirijimos a la carpeta web y corremos nuestro servidor
/** http://localhost:8000 **/
sf_projects\zebra\web>php -S 127.0.0.1:8000

// Configuramos el acceso a la Base de Datos y Agregamos el Modelo Conceptual a Schema.yml para Contruir
sf_projects\zebra>php symfony configure:database "mysql:host=localhost;dbname=sf_zebra" root 1234

// Se modifica setting.yml (El Entorno DEV) # error_reporting: <?php echo ((E_ALL | E_STRICT) ^ E_DEPRECATED)."\n" />
sf_projects\zebra>php symfony doctrine:build --all --no-confirmation

// Agregar el metodo __String en todas las clases del modelo y luego generar los modulos admin
sf_projects\zebra>php symfony doctrine:generate-admin backend Remitente --module=remitente
sf_projects\zebra>php symfony doctrine:generate-admin backend Cliente --module=cliente
sf_projects\zebra>php symfony doctrine:generate-admin backend Contacto --module=contacto
sf_projects\zebra>php symfony doctrine:generate-admin backend Plantilla --module=plantilla
sf_projects\zebra>php symfony doctrine:generate-admin backend Etiqueta --module=etiqueta

// Agregar public function __toString(){ return $this->getNombreQueQuieresVer();} Path = lib/model/doctrine/modulo.php

// External Libraries
sf_projects\zebra>composer init
sf_projects\zebra>composer require monolog/monolog
// Add to zebra/config/ProjectConfiguration.class.php
// Before sfCoreAutoload::register();
# Composer Require
require_once __DIR__.'/../vendor/autoload.php';
sf_projects\zebra>php symfony cache:clear





EXPORTAR:
mysqldump -h IP -u USER -p – -default-character-set=utf8 NOMBASEDATOS > ARCHIVO.sql
Donde:
IP: IP servidor MYSQL
USER: usuario que tiene permisos para acceder a a base de datos.
NOMBASEDATOS: Nombre de la base de datos que se quiere EXPORTAR.
ARCHIVO: nombre del fichero .sql que va a contener todo el backup.

IMPORTAR:
Desde la misma consola, existen 2 maneras:
1. Todo en una sola línea.
mysql -h IP -u USER -p - -default-character-set=utf8 NOMBASEDATOS < ARCHIVO.sql
2. Entrando al mysql.
#Nos conectamos al servidor
mysql -h IP -u USER -p
# Creamos la base de datos.
create database NOMBREDB
#Le decimos al MYSQL que base de datos vamos a usar.
use NOMBREDB
#Le damos la ubicación de nuestro archivo .sql.
source /ruta/archivo/sql/archivo.sql









?>
