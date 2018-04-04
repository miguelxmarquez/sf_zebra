<?php

// Creando estructura basica para implementacion Symfony1.4
sf_projects>mkdir zebra\lib\vendor\symfony
sf_projects>robocopy symfony zebra\lib\vendor\symfony

// Verificamos que todo este bien!
sf_projects\zebra>php lib\vendor\symfony\data\bin\symfony generate:project -V
sf_projects\zebra>php lib\vendor\symfony\data\bin\check_configuration.php 
sf_projects\zebra>copy zebra\lib\vendor\symfony\data\bin\symfony.bat zebra

// Generamos los archivos de Symfony mediante la tarea Generate
sf_projects\zebra>php symfony generate:project zebra
sf_projects\zebra>php symfony project:permissions
sf_projects\zebra>php symfony generate:app backend
sf_projects\zebra>robocopy lib\vendor\symfony\data\lib\web web
sf_projects\zebra>php symfony plugin:publish-assets

// Nos dirijimos a la carpeta web y corremos nuestro servidor 
/** http://localhost:8000 **/
sf_projects\zebra\web>php -S 127.0.0.1:8000

// Configuramos el acceso a la Base de Datos y Agregamos el Modelo Conceptual a Schema.yml para Contruir 
sf_projects\zebra>php symfony configure:database "mysql:host=localhost;dbname=sf_zebra" root 1234
sf_projects\zebra>php symfony doctrine:build --all --no-confirmation

// Agregar el metodo __String en todas las clases del modelo y luego generar los modulos admin
sf_projects\zebra>php symfony doctrine:generate-admin backend Remitente --module=remitente
sf_projects\zebra>php symfony doctrine:generate-admin backend Cliente --module=cliente
sf_projects\zebra>php symfony doctrine:generate-admin backend Contacto --module=contacto
sf_projects\zebra>php symfony doctrine:generate-admin backend Plantilla --module=plantilla















?>