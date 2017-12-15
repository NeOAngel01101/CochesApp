# Instalación

Configurar el archivo .env.example con tus datos de acceso a la base de datos.
Renombrar el **.env.example** a **.env**
## Cargar la base de datos

Puedes utilizar el script **_createdb.sql_** para construir la base de datos contra la que se ejecuta la aplicación.
Tambien puedes irte a la ruta de tu servidor mamp phpmyadmin y crear una database en la cual importar los datos que vienen
en createdb.sql

### Línea de comandos
Para importar la base de datos desde la teminal:

```
$ mysql -u username -p < createdb.sql
```

donde _username_ y _password_ son las credenciales de acceso a tu servidor MySQL.

### Requisitos para poder usar el proyecto
Se debera tener instalado composer con anterioridad. En caso de no tenerlo instalado no se podra utilizar el proyecto correctamente ,
dando asi diversos errores.

Cuando tengamos instalado composer ,lo unico que deberemos poner es en el terminar de nuestra api :
```
composer install
```
Y se instalaran todas las librerias necesarias para que nuestro proyecto funcione a la perfeccion.(Tanto las versiones como las 
librerias aparecen en composer.json.
