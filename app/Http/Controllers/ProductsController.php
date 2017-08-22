<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
/*
 * Se requiere la inclusion de los modelos que seran utilizados
 */
use App\Product;
use App\ProductType;
/*
 * La creación de un controlador es posible desde la consola mediante el comando "php artisan make:controller Productscontroller --resource"
 * e indicando mediante una bandera si este se convertira en un controlador recurso
 *
 */
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::with(['type'])->get()->toArray();
        /*
         * Si se requiere encontrar el producto e incluir su relacion con la tabla de product_types es necesario realizar
         * lo siguiente, donde primeramente se obtiene el registro mediante el metodo "find()" para despues obtener el tipo
         * dado que el resultado podría tratarse de un solo elemento, es necesario utilizar el metodo "first()" para que
         * sea regresado dicho elemento
         */
        //$product = Product::find(1)->type()->first()->toArray();
        //dd($product);
        /*
         * En caso de tratarse de multiples elementos relacionados es necesario utilizar el metodo "get()"
         */
        //$type = ProductType::find(2)->products()->get()->toArray();
        //return $type;

        /*
         * Los controladores pueden retornar vistas o en su caso arreglos y/o objetos
         * Estos ultimos son convertidos automaticamente por laravel para ser enviados a la vista
         */
        return view('products.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
         * Se obtiene el registro deseado por medio de el metodo "find()" para despues enviar dicha informacion a la vista
         */
        $product = Product::find($id);
        $data['product'] = $product;
        return view('products.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $types = ProductType::all();
        $data['types'] = $types;
        $data['product'] = $product;
        return view('products.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        /*
         * Mediante una inyeccion de dependencia se manda llamar la clase ProductRequest con el objetivo de validar la
         * informacion recibida por medio de las reglas definidas en la misma, en caso de que no se cumplan, se arrojara
         * una excepcion que enviara los errores encontrados a la ruta que anteriormente se habia llamado, en este caso
         * a la ruta de "edit"
         */
        //From Controller
        /*
         * Si se desea realizar las validaciones mediante el controlador es posible realizarlo con el metodo "$this->validate"
         * el cual tomara las reglas y realizara el mismo comportamiendo que la clase ProductRequest al no cumplirse
         * alguna de sus reglas
         */
        /*$this->validate($request,[
            'titulo' => 'required',
            'descripcion' => 'required'
        ]);*/
        $product = Product::find($id);
        $product->titulo = $request->get('titulo');
        $product->descripcion = $request->get('descripcion');
        $product->product_type_id = $request->get('product_type_id');
        /*
         * Eloquent a traves del metodo save almacenara la informacion distinguiendo en caso de insercion o actualizacion
         */
        $product->save();
        /*
         * Es posible redireccionar utilizando nombres de rutas y en su caso enviar parametros mediante un arreglo indexado
         * donde la llave sera un argumento a enviar definido en la ruta.
         */
        return redirect()->route('products.show',['id'=>$id]);
        //$product->fill($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
