<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use \App\Http\Middleware\MyMiddle;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'middleware' => [
        'role:human',//El alias correspondiente a Roles se encuentra definido en App\Http\Kernel        
    ]
],function(){

    Route::get('/contact','ContactController@index');
    Route::get('/contact/{id}','ContactController@show');
    Route::get('/contact/{id}/edit','ContactController@edit')->name('contact.edit');
    Route::put('/contact/{id}','ContactController@update')->name('contact.update');

    Route::get('/contact/{id}/delete','ContactController@destroy');

    Route::get('/phone/{id}/edit','PhoneController@edit')->name('phone.edit');
    Route::put('/phone/{id}/update','PhoneController@update')->name('phone.update');

});



























Route::resource('user', 'UserController');
/*
 * Las rutas pueden ser utilizadas como, donde en $callback es posible indicar la especifica funcion de un controlador o en su caso una funcion directamente
 *  Route::get($uri, $callback);
    Route::post($uri, $callback);
    Route::put($uri, $callback);
    Route::patch($uri, $callback);
    Route::delete($uri, $callback);
    Route::options($uri, $callback);
 * */
Route::get('users','UserController@index')->name('user.index')->middleware(MyMiddle::class.':admin','auth.basic');
Route::get('user/{id}','UserController@show')->name('user.show');
Route::post('store-user','UserController@store')->name('user.store');
Route::put('update-user/{id}','UserController@update')->name('user.update');
Route::get('hash','UserController@hash')->name('user.hash');

Route::get('create','Auth\RegisterController@create');
Route::get('login','Auth\RegisterController@showLoginForm');

Route::get('responses',function(){
    $data = ['hola'=>'Saludo','arreglo'=> [1,2,3]];
    return view('admin.roles',$data);

    return response($data);
    return "Hola";
});

/*
 *  Una ves realizado el comando de "php artisan make:auth" laravel nos proveera de funcionamiento relacionado a su
 *  autenticacion estandar en las cuales se incluye login, logout, registro...
 */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * Genera las rutas estandar de acuerdo al nombre y controlador indicado
 *  GET	        /products	                index	    products.index      -   Display all records
    GET	        /products/create	        create  	products.create     -   Display the form
    POST	    /products	                store	    products.store      -   Store for the first time
    GET	        /products/{photo}	        show	    products.show       -   Display the record
    GET	        /products/{photo}/edit	    edit	    products.edit       -   Display the record in the form
    PUT/PATCH	/products/{photo}	        update	    products.update     -   Update the changes
    DELETE	    /products/{photo}	        destroy	    products.destroy    -   Destroy the record
 */
Route::middleware('role:admin')->resource('/products','ProductsController');

//Route::get('/products','ProductsController@index')->middleware('role');

//Route::put('products/{id}/{param2}');


Route::put('detail/{id}','DetailController@update')->name('detail.update');
Route::get('detail','DetailController@index')->name('detail');


Route::get('fileUpload/{id}', function ($id) {

    return view('upload',['id'=> $id]);

})->name('update.image');

//Route::post('fileUpload', ['as'=>'fileUpload','uses'=>'Uploads@upload']);

Route::post('fileUpload', 'Uploads@upload')->name('fileUpload');

Route::resource('charges','ChargesController');