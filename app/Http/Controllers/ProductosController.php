<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use DataTables;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('doria.productos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        if ($request->ajax() && $request->isMethod('GET')) {
            $producto = Producto::all();
            return DataTables::of($producto)           
                ->removeColumn('created_at')
                ->removeColumn('updated_at')
                ->make(true);
         }
    }

    public function create()
    {
        return view('doria.productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre = $request->get('nombre');
        $producto->descripcion = $request->get('descripcion');
        $producto->cantidad = $request->get('cantidad');
        $producto->valor = $request->get('valor');
        $producto->save();
         
         return response([
            'msg' => 'Producto registrado correctamente.',
            'title' => '¡Registro exitoso!'
        ], 200)// 200 Status Code: Standard response for successful HTTP request
            ->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resourproducto
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos = Producto::findOrFail($id);
        $edit = true;
        return view(
            'doria.productos.edit',
            compact('productos', 'edit')
        );
           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->nombre=$request->get('nombre');
        $producto->descripcion=$request->get('descripcion');
        $producto->cantidad=$request->get('cantidad');
        $producto->valor=$request->get('valor');
         
         $producto->update();
         
         return response([
            'msg' => 'El producto ha sido modificado exitosamente.',
            'title' => '¡Producto Modificado!'
        ], 200)// 200 Status Code: Standard response for successful HTTP request
            ->header('Content-Type', 'application/json');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::destroy($id);
        return response([
           'msg' => 'El producto ha sido eliminado exitosamente.',
           'title' => '¡Producto Eliminado!'
       ], 200)// 200 Status Code: Standard response for successful HTTP request
           ->header('Content-Type', 'application/json');
    }
}
