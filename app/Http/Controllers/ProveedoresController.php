<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use DataTables;



class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('doria.proveedores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        if ($request->ajax() && $request->isMethod('GET')) {
            $proveedor = Proveedor::all();
            return DataTables::of($proveedor)           
                ->removeColumn('created_at')
                ->removeColumn('updated_at')
                ->make(true);
         }
    }

    public function create()
    {
        return view('doria.proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedor = new Proveedor();
        $proveedor->nombre = $request->get('nombre');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->email = $request->get('email');
        $proveedor->save();
         
         return response([
            'msg' => 'Proveedor registrado correctamente.',
            'title' => '¡Registro exitoso!'
        ], 200)// 200 Status Code: Standard response for successful HTTP request
            ->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     *
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
        $proveedor = Proveedor::findOrFail($id);
        $edit = true;
        return view(
            'doria.proveedores.edit',
            compact('proveedor', 'edit')
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
        $proveedor = Proveedor::find($id);
        $proveedor->nombre=$request->get('nombre');
        $proveedor->telefono=$request->get('telefono');
        $proveedor->direccion=$request->get('direccion');
        $proveedor->email=$request->get('email');
         
         $proveedor->update();
         
         return response([
            'msg' => 'El proveedor ha sido modificado exitosamente.',
            'title' => '¡Proveedor Modificado!'
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
        Proveedor::destroy($id);
        return response([
           'msg' => 'El proveedor a sido eliminado exitosamente.',
           'title' => '¡Proveedor Eliminado!'
       ], 200)// 200 Status Code: Standard response for successful HTTP request
           ->header('Content-Type', 'application/json');
    }
}
