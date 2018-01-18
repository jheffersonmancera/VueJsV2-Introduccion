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

______________v-show____________________________
directiva: lo que utilizamos lo que utilizamos para que una etiquetao elemento haga algo.
//-El objetivo de este app es hacer que el boton de envio desaparesca a no ser que halla texto en la caja de texto.
v-show muestra condicionalmente algo
*1 si el v-model recibe informacion se activa una especie de valor true en el v.show que lo esta invocando

______________v-if V-ELSE Y TEMPLATE________________
*1 v-if="!message"> si resulta ser que  el v-model message es a vacio entonces poner texto de x manera
*2 el uso de template se da cuando queremos evitar poner muchas directivas repetitivas y de dificil mantenimiento
//se hace uso del v-show cuando no hay necesidad de usar un v-else, v-show por otra parte es mas pesado que v-if

____________eventos.html y eventos2.html_____________________-
//un evento se refiere a cualquier interacción que ejecute el usuario con el sistema (un click, una tecla, un movimiento del mouse, el uso de algun otro dispositivo de entrada)
*1 directiva v-on:click="addName" detecta el evento click y ejecuta el metodo addName
*2 this hace referencia al objeto Vue donde esta insertado
*3 la directiva es v-on el primer parametro es el evento keyup y el segundo parametro es la tecla enter
*4 unshift agrega el elemento al principio de la lista

____________filtro.html____________--
*1 listar propiedad name de item -> item proviene de lists
*2 invoca la funcion getUsers  al hacer click en el boton listar lo cual ocaciona que la lista se alimente de contenido y por la tanto se active el v-for *5, si la lista deja de estar vacia desaparece el boton debido a que su renderizacion depende del v-if
*3 la funcion getUsers por el metodo get de axios trae la respuesta del url y luego adiciona a lists[] *4 el parametro data devuelto por el url en formato json
*4 Esta relacionada con el la variable name
-----Algoritmo para buscar------
*5 el metodo computado sirve para incluir lógica mas avanzada
*6 this.lists trae el lists actual con el siguiente filtrado
filter((item)) item se refiere a los mismos item que estan contenidos en lists[] vamos a coger cada uno de estos item y seleccionamos su propiedad name la cual debe estar disponible en el json que traemos del servidor, con item.name.includes preguntamos si la propiedad name de nuestro objeto vue (this.name) esta incluido en el item.name de lists[] y nos devuelve u array  que coincide 

______________Component.html_________________-
*1 el primer argumento es el nombre del componente que sirve como etiqueta html,
el segundo parametro es un objeto
*2 creamos la propiedad variable para remplazar las palabras cambiantes como "posts" 
 se debe usar una palabra que sea capaz de definir el concepto comun. en este caso lists
*4 ejecución de la llave created la cual ejecuta 2 metodos,
*5 getPosts se conecta por medio de axios a la api en la url y llena el arreglo en data posts[] *6

*7 Con common-list llamamos a el componente en la *1
*8 la palabra lists en el v-for es remplazada por v-bind:lists='albums' *7
*9 v-bind:lists='posts' con posts le decimos que traiga el contenido del arreglo posts[] y lo pase al props del componente
