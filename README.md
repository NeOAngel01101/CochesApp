# Instalación

Configurar el archivo .env.example con tus datos de acceso a la base de datos.
Renombrar el **.env.example** a **.env**
## Cargar la base de datos

Puedes utilizar el script **_createdb.sql_** para construir la base de datos contra la que se ejecuta la aplicación.
Tambien puedes irte a la ruta de tu servidor phpmyadmin y crear una database en la cual importar los datos que vienen
en createdb.sql.Tambien es recomendable poner la ruta del servidor en el proyecto en la zona de public.

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

# Proyecto
Esta es la 2 version del proyecto,con la cual se pretende hacer una pagina web en la cual los usuarios puedan ser enlazados a sus coches ya creados en la misma,para asi tengan una zona de foro (aun no creada) para poder comentar informacion sobre bricos,modificaciones,dudas,
curiosidades de sus coches .

## Uso
-Nada mas iniciamos la web nos muestra una lista de coches con su informacion ,creadas por los usuarios.En el mismo podemos presionar 
encima del nombre o de la foto para que nos direccione a otra pagina en la cual estara la informacion tecnica del coche.Y dos fotos
en la zona superior.
Si nos fijamos en la ultima parte de la pagina (una vez dentro de la informacion del coche) nos encontraremos una zona de comentarios,
para que los usuarios logueados o no ,pongan sus dudas,o reclamaciones por algun error.

-En el menu superior podemos ver que hay una zona de contacto,en la cual pone la ruta de la "empresa",y una zona donde cualquier usuario
puede preguntar directamente dudas o consejos para mejorar la pagina.

### Acceso
Siempre situada en el menu superior al final a la derecha ,sin pasar de apercibido .El usuario tiene tres opciones a elegir :

**_-Loguearse._** En el caso de que tenga una cuenta ,puede meterse poniendo correctamente sus credenciales.

**_-Registro._** Un sencillo formulario para poder registrarse en el sitio web,teniendo asi los beneficios del mismo.

**_-Recuperar_** (No implementado) El usuario podra recuperar la contraseña en el caso de que se le haya olvidado,mediante un mensaje a su correo electronico.

### ¿ Una vez logueado que ?
Felicidades ,optienes los beneficios de estar registrado.Que son :

**_-Añadir un coche._** Te saldra en el menu esta nueva opcion,en la que podras rellenar un formulario con la finalidad de crear el coche con toda su informacion para despues ser vinculado al usuario (aun no implementado).

**_-Editar un coche._** ¿Alguien se a equivocado poniendo que tu maravilloso renault megane tiene 70caballos de potencia cuando realmente tiene 110 UNICORNIOS? ,pues cambialo ;D .Para editar el coche lo unico que se debe hacer es irte a la pagina principal y darle al lapiz que habra salido en la zona derecha de la lista de los coches ,una vez dado te saldra el mismo formulario como el de añadir pero con todos los parametros escritos.

**_-Borrar un coche._** Situado como una papelera en la lista de coches al final,para si alguien a creado un falso coche y a puesto una moto ,no apta en esta pagina.

Si estas correctamente logueado te saldra en donde ponia acceso ,tu nombre.En el cual si le das podras cerrar la sesion en logout.
