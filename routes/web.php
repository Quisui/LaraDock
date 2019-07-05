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
/*
Route::get('/', function(){
    return 'Url raiz';
});
#para almecenar registros por medio de un formulario
Route::post();
# para actualizar
Route::put();
#para eliminarlos
Route::delete();
*/
/*Route::get('/', function () {
    return view('welcome');
});*/
#un helper son funciones que se pueden realziar para devolver una vista

use Illuminate\Http\Request;
use App\Product;

Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('products', function(){
        $products = Product::orderBy('created_at','desc')->get();

        return view('products.index', compact('products'));
    })->name('products.index');

    Route::get('products/create', function(){
        return view('products.create');
    })->name('products.create');

    #Metodo por medio de rutas para ingresar un producto
    Route::post('product',function(Request $request){
        $newProduct = new Product;
        $newProduct-> description= $request->input('description');
        $newProduct-> price= $request->input('price');
        $newProduct->save();

        return redirect()->route('products.index')->with('info','Producto creado exitosamente');
    })->name('products.store');

    #Metodo para borrar un producto
    Route::delete('products/{id}', function($id){
        $product = Product::findOrFail($id);
        $product ->delete();

        return redirect()->route('products.index')->with('info','Producto eliminado exitosamente');
    })->name('products.destroy');

    #Metodo para encontrar un producto y obtener los datos del mismo
    Route::get('products/{id}/edit', function($id){
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    })->name('products.edit');

    #Metodo para guardar un producto ya editado
    Route::put('products/{id}', function(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();
        return redirect()->route('products.index')->with('info','Producto modificado exitosamente');
    })->name('products.update');
});


Auth::routes();

