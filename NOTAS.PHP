_______________________lista.html___________________
agregamos vue con el enlace que dan en la pagina en version de desarrollo
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js"></script>
*1 crear objeto con un nombre de elemento haciendo referencia a un componente de html y hacemos un arreglo que contendra la data.
	new Vue({
		el: '#main'
	});
-crear un ciclo v-for dentro del li para recorrer el array people
<li v-for="item in people">{{item}}</li>
en el primer ciclo item capturar el primer elemento 'sandra'.
*3 cuando doy enter se ejecuta el v-on;keyup y este activa el metodo addName *2
*2 El metodo addName me va a ejecutar la funcion en la que sube al arra people lo que encuentre en el modelo name
*4 this.name=''; vaciamos la caja de texto

____________________V-BIND.html______________________________
*1 el id me vincula inmediatamente el contenido de ese div con el elemento vue *2
*3 aqui se crea el metodo o propiedad en este caso info para  
llamarla en el renderizado de los elementos html *4 *5
*6 puedo hacer v-bind(enlazar) con propiedades de los elementos html


____________________AJAX.HTML________________________________
Conectaremos nuestro app vue a un api que nos devolvera cierto numero de registros.
//Vue trabaja con ajax a través de un complemento, no lo hace por si solo.

______________________________________
Instalar ajax
-ingresar a: https://cdnjs.com/ y buscar vue resources, copiar este link:
https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.3.4/vue-resource.min.js
*1 esta libreria depende de vue.js por lo tanto se coloca el sript por debajo de la linea donde llamamos a al script de vuejs *2
_______________________________________
instala bootstrap
*3 agregar bootstrap en el head
_______________________________________
//una aplicación vue es netamente visual, no es capaz de guardar info en una base de datos para eso se usa laravel como api.
//vamos a usar unas herramientas en linea para simular eso.
*4 https://randomuser.me/api/?results=10 me devuelve datos de usuario aleatorios en formato json
*5 $http funciona gracias a la libreria vue.resource *6-- .get es el metodo a utilizar para esta conexión (post,get,put, o delete),
*5 si la conexion a la url se establece entonces se ejecuta la funcion con el parametro (response), en ese response se van a guardar  todos los datos que devuelva la api.
//vue resource es una libreria usada en vue para hacer solicitudes ajax, esta libreria sigue vigente mas no es oficialmente recomendada por el equipo de vuejs debido a que recomiendad Axios actualmente

*7 un objeto vue tiene varios ciclos de vida, uno de ellos es el created, le pedimos que llame a la funcion getUsers cuando se crea el elemento. https://vuejs.org/v2/guide/instance.html#Lifecycle-Diagram

*8 se puede ir filtrando la cantidad de informacion que queremos del array original antes de enviarlo a lists a medida que profundisamos en response o response.data o response.data.results

_________________________AXIOS____________________________
*1 la forma de utilizar el metodo get es diferente en axios que en vue.resource

/*================================================================
_____________________LARAVEL_VUE____________________________
====================================================================*/
*1 libreria de vue
*2 libreria de axios
*3 para no crear conflictos entre la expresion {{}} de vue y la de laravel, se agrega un @ antes del @{{}} para las expresiones de vue
______________app.js_______________
-adicionamos código para 
-*1 hace referencia a la ruta users en la siguiente routes/web.php la cual retorna un arreglo con nombres de usuario
____________routes/web.php________
*1funcion que devuelve un array con nombres de usuario
______________welcome.lade.php__________
*1Llamamos a los item provenientes de lists

--------------Creacion de Base de Datos Mysql-----------
laravel-vue:
-Conectar a base de datos:
-------------.env------------------
DB_DATABASE=laravel-vue
DB_USERNAME=root
DB_PASSWORD=
----------------
_________________Seeder para base de datos____________
php artisan make:seeder UsersTableSeeder

------database/seeds/UsersTableSeeder.php-------------
*1 pedimos crear 25 unidades del modelo User que vamos a invocar en la linea *2 este modelo User ya viene creado por defecto en laravel debido a que se usa para crear los usuarios para el login de la app

-----App/User.php-----
namespace: App
class: User

---------database/seeds/DatabaseSeeder.php----------
*1 descomentar linea de la funcion run para poder llenar las tablas

---------database/factories/UserFActory.php----------------
de este archivo proviene la información aleatoria para crear usuarios ficticios

--------------app/providers/AppServiceProvider.php---------
*1 adicionar esta linea: use Illuminate\Support\Facades\Schema;
*2 Schema::defaultStringLength(190); se usa para configurar el tamaño de los campos en la base de datos

-------------Ejecutar seeders ------------------------

-php artisan migrate:refresh --seed

____Traer información desde la base de datos para llenar la lista de usuarios_______________
-------------routes/web.php----------
*1 invocamos modelo User
*2 creamos la variable users que traera por medio de get los datos vinculados al modelo User desde la base de datos
*3 devuelve el arreglo 
*4 alternativa para hacer una consulta selectiva


/*=====  End of LARAVEL-VUE  ======*/



