# Requisitos para el proyecto

- Herramientas y versiones
    
    > Todo el proyecto se realizará sobre el sistema operativo Windows 10.
    > 
    > 
    > Es necesario instalar [Composer](https://getcomposer.org/) (versión 2.6.6) como gestor de dependencias de PHP y poder crear el proyecto en [Laravel](https://laravel.com/docs/11.x), en mi caso he optado por esta opción para el proyecto.
    > 
    > La versión de [Laravel](https://laravel.com/docs/11.x) que se utilizará será la 11.x (última versión).
    > 
    > En caso de no querer crear el proyecto vía [Composer](https://getcomposer.org/), se puede optar por la opción de instalar Laravel globalmente y no a nivel de proyecto con el propio instalador de [Laravel](https://laravel.com/docs/11.x):
    > 
    > ```bash
    > composer global require laravel/installer
    > ```
    > 
    > Teniendo en cuenta que el proyecto se aloja en GitHub, doy por hecho que debe tener Git instalado, en caso contrario adjunto enlace e instalación por pasos [aquí](https://git-scm.com/downloads) en caso de querer clonar el proyecto.
    > 
    > Se deberá instalar en el sistema operativo, [Node.js](https://nodejs.org/en) para poder gestionar e instalar todas las dependencias requeridas dentro del proyecto, aunque no se utilizará como servidor para el backend.
    > 
    > Una vez instalado comprobar que se haya instalado correctamente junto al gestor de paquetes npm.
    > 
    > ```bash
    > node -v
    > npm -v
    > ```
    > 
    > Con sus respectivas versiones.
    > 
    > ```bash
    > node--> v20.12.2
    > npm--> 10.5.0
    > ```
    > 
    
- Servidor y Base de datos
    
    > [XAMP](https://www.apachefriends.org/es/download.html) para servidor local Apache en el que ejecutar el proyecto y MariaDB interno para la propia base de datos, con versión PHP 8.2.4.
    > 
    > 
    > 
    > La ruta en la que ubicar el proyecto debe estar dentro de la carpeta donde tenga instalado [XAMP](https://www.apachefriends.org/es/download.html), en mi caso lo tengo instalado en la raíz del disco principal:
    > 
    > ```bash
    > ~/xampp/htdocs/proyecto_laravel
    > ```
    > 
    > La URL para lanzar el proyecto con el servidor Apache de [XAMP](https://www.apachefriends.org/es/download.html) arrancado será:
    > 
    > ```bash
    > http://localhost/soluciones_mj/public/
    > ```
    > 
    
- Entorno de desarrollo
    
    > El proyecto, para ahorrar paquetes extra y mera comodidad, se ha realizado en su totalidad con [Visual Studio Code](https://code.visualstudio.com/), aunque se pueden utilizar otros entornos como [PhpStorm](https://www.jetbrains.com/phpstorm/promo/?source=google&medium=cpc&campaign=EMEA_en_ES_PhpStorm_Branded&term=phpstorm&content=540304431794&gad_source=1&gclid=CjwKCAjwydSzBhBOEiwAj0XN4Nk4mnGgkaLNi-Q1SQX4wNjkBS8WmSs_5lQoPMALsQkms2hRiS9yFBoCuU8QAvD_BwE) que permiten una cómoda codificación de código PHP.
    > 
    > 
    > 
    > El uso de [Visual Studio Code](https://code.visualstudio.com/), ha sido elección propia por preferencia a mi zona de confort en el desarrollo de PHP, aunque cualquier entorno de desarrollo sería válido ya que se ejecutará a través del servidor local alojado en [XAMP](https://www.apachefriends.org/es/download.html).
    > 
    

# Clonación del proyecto

En caso de querer el código tal cual se encuentra aquí en [Github](https://github.com/), simplemente deberá realizar una clonación del proyecto para copiar todos los archivos en su máquina ubicándose en la ruta:

```bash
~/xampp/htdocs
```

Una vez en dicha ruta, deberá clonar el proyecto mediante el comando de Git:

```bash
git clone https://github.com/rvumbra/soluciones_mj.git
```

Cuando la clonación finalice, encontrará en proyecto dentro de la ruta donde ejecutó el comando:

```bash
~/xampp/htdocs/soluciones_mj
```

# Creación del proyecto

### Nuevo proyecto

Para crear el proyecto nos ubicamos dentro de la carpeta htdocs de la ruta donde esté instalado [XAMP](https://www.apachefriends.org/es/download.html), ya que será la carpeta que aloje los proyectos ejecutables por el servidor:

```bash
~/xampp/htdocs
```

Y procedemos a ejecutar el comando que creará el proyecto vacío con [Composer](https://getcomposer.org/):

```bash
composer create-project laravel/laravel soluciones_mj
```

Esperamos a que se terminen de instalar las dependencias del proyecto y ya estaría listo para codificar y replicar la funcionalidad de éste proyecto.

Una vez terminada la instalación y preparación del proyecto, se alojará en 

```bash
~/xampp/htdocs/soluciones_mj
```

### Instalación de dependencias

Una vez creado y ubicados en el proyecto, se deberán instalar todas las dependencias para tener el proyecto listo para su funcionamiento.

```bash
npm install
```

### Alojamiento en la nube para mantenerlo actualizado

> Para mantener el proyecto con un control de versiones y poder mantenerlo actualizado y llevarte el código a cualquier lugar y seguir desarrollando, una vez terminado de crear el proyecto vacío, crearemos un repositorio vacío en [Github](https://github.com/).
> 

Una vez creado, iniciaremos Git en nuestro proyecto nuevo y clonaremos nuestro proyecto en el repositorio vacío para mantener el proyecto vinculado, añadiendo todos los archivos y actualizando dicho repositorio (últimos 3 comandos para futuras actualizaciones del propio código).

```bash
git init
git remote add origin https://github.com/rvumbra/soluciones_mj.git
git add .
git commit -m "first commit"

```

Al ser un proyecto vacío y no tener aún ninguna rama, se subirá el proyecto a la nube tras el primer commit generando la rama master por defecto como rama padre del proyecto.

```bash
git push --set-upstream origin master
```

# Programación del proyecto

Una vez que el proyecto está listo para comenzar a desarrollar pasamos directamente a la codificación.

- Configuración de la base de datos
    
    > Para configurar la base de datos, deberemos acceder al archivo .env situado en la raíz del proyecto, y buscar las credenciales de conexión, en mi caso accedo a la base de datos local de [XAMP](https://www.apachefriends.org/es/download.html) en la cual tengo creada la base de datos soluciones_mj vacía, con credenciales de root y sin contraseña (deberá cambiarse en caso de situar la base de datos en cualquier otro lugar).
    > 
    > 
    > ```bash
    > DB_CONNECTION=mysql
    > DB_HOST=127.0.0.1
    > DB_PORT=3306
    > DB_DATABASE=soluciones_mj
    > DB_USERNAME=root
    > DB_PASSWORD=
    > ```
    > 
    
- Autenticación y configuración
    
    > Para configurar la autenticación, utilizaremos breeze para la autenticación por defecto requiriendolo de composer e instalándolo para poder realizar el registro y el inicio de sesión de usuarios autenticados.
    > 
    > 
    > ```bash
    > composer require laravel/breeze --dev
    > php artisan breeze:install
    > ```
    > 
    > Una vez configurada, deberemos realizar una migración sin tablas para que [Laravel](https://laravel.com/docs/11.x) gestione la autenticación por defecto que trae, creando tablas auxiliares para los usuarios, gestión de contraseñas, etc.
    > 
    > Para ello nos situaremos en la ruta del proyecto y ejecutaremos el comando de migración y al ejecutarlo podremos comprobar que se añadieron tablas por parte de [Laravel](https://laravel.com/docs/11.x) para la autenticación de usuarios yvolvemos a instalar las dependencias en caso de tener nuevas dependencias requeridas en el proyecto.
    > 
    > ```bash
    > php artisan migrate
    > npm install
    > ```
    > 
    > Una vez completado el registro, y cambiado el diseño inicial, se cambia la ruta dashboard por home en todos los archivos requeridos para una mayor comodidad a la hora de indicar las rutas en el futuro y se puede proceder a desarrollar el proyecto interno con el acceso ya gestionado.
    > 
    
- Plantillas y diseño
    
    > Todo el diseño y desarrollo se realizará con la extensión .blade del propio framework para la totalidad de las vistas, gestionando las variables internas y de sesión, rutas, plantillas y contenido que se requiera.
    > 
    > 
    > 
    > Para la plantilla global, se ha reutilizado la plantilla de [AdminLTE](https://adminlte.io/) de [Boostrap](https://getbootstrap.com/) como indica los requerimientos de la prueba técnica. y se comienza a adaptar a las especificaciones requeridas.
    > 
    > El diseño se ha cambiado añadiendo la plantilla estándar para la parte común del menú en la ruta:
    > 
    > ```bash
    > ~/xampp/htdocs/soluciones_mj/resources/views/layouts/plantilla.blade.php
    > ```
    > 
    > En ella se incluirá el contenido de cada vista lanzada por el controlador en la petición que deba devolver la vista correspondiente.
    > 
    > En cuanto a los estilos, me he ceñido a los colores y estándares solicitados por la prueba.
    > 
    > Todos los estilos de encuentran en la misma ruta:
    > 
    > ```bash
    > ~/xampp/htdocs/soluciones_mj/public/css/app.css
    > ```
    > 
    > Y el código JavaScript utilizado para todo el proyecto está todo comentado y ordenado en esta ruta:
    > 
    > ```bash
    > ~/xampp/htdocs/soluciones_mj/public/js/code.js
    > ```
    > 
    
- Home
    
    > Para el calendario de la pantalla principal, se ha utilizado la librería [Year Calendar](https://year-calendar.github.io/js-year-calendar/getstarted) la cual es gratuita y de código libre, se ha instalado tal como viene en la documentación de la propia librería y configurado para servir como el calendario oficial del proyecto.
    > 
    > 
    > Se dispone de un toggle que se muestra cuando en un día del calendario hay un evento añadido, dispone del color y del propio nombre del evento o eventos registrados para ese día.
    > 
    > La edición de los eventos se deberá realizar desde la lista de días festivos.
    > 
- CRUD de usuarios
    
    > Para el CRUD de usuarios, se ha generado sobre la lista disponible de los mismos (opción del menú) aplicando sobre dicha lista la librería [DataTables](https://datatables.net/) para aplicar un formato de tabla a la propia lista.
    > 
    > 
    > Al seleccionar un usuario de la lista, se podrá editar o eliminar dicho registro mediante un modal emergente similar a la creación de un nuevo usuario.
    > 
    > Todos los modales envían peticiones AJAX al servidor y el enrutador de Laravel se encarga del resto, ubicado en la ruta: 
    > 
    > ```bash
    > ~/xampp/htdocs/soluciones_mj/routes/web.php
    > ```
    > 
    > En dicha ruta se encuentra cada endpoint del servidor al que se le puede realizar petición, incluyendo los métodos del respectivo controlador que actuarán sobre la petición.
    > 
    > ```php
    > #region Lista de usuarios
    > Route::get('/list-users', [UserController::class, 'index'])->name('userList.table');
    > Route::post('list-users', [UserController::class, 'store']);
    > Route::put('/list-users/{id}', [UserController::class, 'update']);
    > Route::delete('/list-users/{id}', [UserController::class, 'destroy']);
    > #endregion
    > ```
    > 
    > El controlador UserController que se utiliza para el CRUD se genera mediante línea de comandos ubicándonos en la raíz del proyecto y escribiendo el comando:
    > 
    > ```bash
    > php artisan make:controller UserController --resource
    > ```
    > 
    > Este comando creará el controlador vacío con todos los métodos disponibles para la modificación del modelo User. Se encargará de comunicar con el modelo y la vista atacando a la misma petición que ha recibido validando los datos de entrada y actuando en respuesta.
    > 
    
- CRUD de días festivos
    
    > Se hace uso de un nuevo modelo denominado Fest que se crea de nuevo junto al controlador mediante línea de comandos.
    > 
    > 
    > ```bash
    > php artisan make:model Fest --all
    > php artisan make:controller FestController --all
    > ```
    > 
    > Al añadirlo, hay que definir los métodos en el controller al igual que en el CRUD de usuarios y volver a definir las rutas necesarias dentro del archivo ‘web.php’.
    > 
    > Para evitar problemas de autorización por el middleware ‘auth’, hay 2 opciones:
    > 
    > - Definir en el método authorize() que devuelva true, ya que por defecto devolverá falso, pero también habrá que añadir validaciones extra innecesarias y puede llegar a ser redundancia en el código en caso de tener muchos modelos.
    > - Borrar los archivos generados de Request para el modelo Fest para evitar problemas con validaciones y autorización sobre el modelo para el usuario.
    > 
    > Se podrá editar los campos nombre, fecha, color y si es recurrente, indicando que dicho evento se propagará a lo largo de los años.
    > 
    > El diseño será similar al CRUD de usuarios.
    >