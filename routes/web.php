<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PruebaController;
#Practica de base de datos y migraciones//referenciamos el modelo de la tabla que llenaremos
use App\Models\Computer;


#Practica de ACCESORES, MUTADORES Y CASTING

Route::get('/insertar', function() {
    $computers = new Computer;
    $computers->model='MacBook Air'; //Prueba de set, se coloco en minusculas, pero se inserto a la db en mayusculas
    $computers->mark='Apple';
    $computers->size=13.3;
    $computers->processor='apple m1';
    $computers->ram='8GB';
    $computers->storage='256GB';
    $computers->published_at='2024-10-27 13:11:00';//nuevos campos para probar casting
    $computers->is_active=true;
    $computers->save();
    return $computers;
});
//Prueba de Get, obtiene todo, y los muestra en mayusculas todos
Route::get('/obtenertodo', function () {

    $computers = Computer::all();
    return $computers;

});
// en caso de time stamp
Route::get('/accedercam', function () {

    $computers = Computer::find(1);
    return $computers->published_at;

});
// en caso de carbon
Route::get('/accedercar', function () {
    //SE ESTABLECE UN FORMATO PARA EL DESPLIEGUE DE FECHA

    $computers = Computer::find(1);

    //EJEMPLO 1 - despliega la fecha en el formato que le indiquemos
    //return $computers->published_at->format('d-m-Y');
    //EJEMPLO 2 - despliega cuanto tiempo pasó despues de publicado
    return $computers->published_at->diffForHumans();

    //AHORA NO DARÁ RESULTADO PORQUE LAS ENTRADAS DE format Y DE diffForHumans DEBEN 
    //DE SER VALORES TIMESTAMP
});



















#AQUI ESTARA EL CRUD DE LA PRACTICA
//INSERTAR
/*Route::get('/insertar', function() {
    $computers = new Computer;
    $computers->model='Legion';
    $computers->mark='Lenovo';
    $computers->size=16;
    $computers->processor='AMD ryzen 5500';
    $computers->ram='8GB';
    $computers->storage='256GB';
    $computers->save();
    return $computers;
});*/


//SELECCIONAR BÁSICO Y MODIFICAR
Route::get('/insertarvalor', function () {
    //se aplica filtro WHERE y se establece la columna y valor a encontrar
    //la sentencia devuelve el primer resultado que encuentre (FIRST)
    $computer = Computer::where('model','Legion')->first();
    return $computer;

});

Route::get('/actsave', function () {

    //se aplica filtro WHERE y se establece la columna y valor a encontrar
    //la sentencia devuelve el primer resultado que encuentre (FIRST)
    $computer = Computer::where('model','Legion')->first();
    //como ya se tiene "seleccionado" un registro podemos actualizar el valor
    //de la columna "model" y posteriormente guardarlo en la base de datos
    $computer->model = 'Legion 15';
    $computer->save();
    return $computer;

});

/*Route::get('/obtenertodo', function () {

    $computer = Computer::all();
    return $computer;

});*/

Route::get('/obtenerparte', function () {

    $computer = Computer::where('id','>=',2)->get();
    return $computer;
    
    // También se puede ordenar los resultados con la sentencia ORDER BY para
    // que los resultados obtenidos esten en un determinado orden
    
    $computer = Computer::where('id','>=',2)->orderBy('id','desc')->get();
    return $computer;
    
    // Las columnas que despliega el resultado puede ser personalizado
    // esto es que se pueden establecer las columnas que se tendrían como
    // resultado
    
    $computer = Computer::where('id','>=',2)
						    ->select('id','model')
						    ->orderBy('id','desc')
						    ->get();
    return $computer;
    
});
//borrar registro
Route::get('/registroborrar', function () {

    $computer = Computer::find(2);
    if ($computer){
        $computer->delete();
        return "El registro con id {$computer->id} ha sido eliminado";
    } else {
        return "no se encontro el registro con esa id";
    }
    // el método delete borrará de la tabla el registro seleccionado
     
 });





















#Estas son las practicas de la plantilla con diseño

Route::get('/', [PruebaController::class, 'index']);

Route::get('/entrada', [PruebaController::class, 'entrada']);

Route::get('/ajustes', [PruebaController::class, 'ajustes']);

Route::get('/sobre', [PruebaController::class, 'sobre']);

Route::get('/comentarios', [PruebaController::class, 'coment']);

















/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/Bienvenido', HomeController::class);*/

#Estas rutas son del proyecto principal
/*Route::get('/', [HomeController::class, 'index']);

Route::get('/entrada', [HomeController::class, 'entrada']);

Route::get('/ajustes', [HomeController::class, 'ajustes']);

Route::get('/sobre', [HomeController::class, 'sobre']);

Route::get('/comentarios', [HomeController::class, 'coment']);*/








##prueba del video codersfree





















##EJEMPLOS##


##pueba de controladores - codersfree
Route::get('/posts', [PostController::class, 'index']);
Route::get('/Posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}', [PostController::class, 'show']);



#Ejemplos de rutas estaticas

Route::get('/saludos/prueba-2', function () {
    return "Prueba de ruta estatica 2";
});

#creacion dinamica de las rutas
Route::get('/saludos/{nombre}', function ($nombre) {
    return "saludos {$nombre}";
});

#se puede agregar varias variables en la URL
/*Route::get('/saludos/{nombre}/{carrera}',function($nombre, $carrera) {
    return "Saludos {$nombre} de la carrera de {$carrera}";
}); #generara inconsistencia si no se ingresa una variable esperada*/

#Se puede añadir varias variables a la url asegurando que no haya error 
#Si llegase a faltar una variable
Route::get('/saludo/{nombre}/{carrera?}',function($nombre, $carrera=null){
    if($carrera)
    {
        return 'saludos {$nombre} de la carrera {$carrera}';
    }
    return 'saludos {$nombre} bienvenid@';
});

