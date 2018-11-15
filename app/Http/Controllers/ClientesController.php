<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use DataTables;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('doria.clientes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        if ($request->ajax() && $request->isMethod('GET')) {
            $cliente = Cliente::all();
            return DataTables::of($cliente)           
                ->removeColumn('created_at')
                ->removeColumn('updated_at')
                ->make(true);
         }
    }

    public function create()
    {
        return view('doria.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nombre = $request->get('nombre');
        $cliente->telefono = $request->get('telefono');
        $cliente->direccion = $request->get('direccion');
        $cliente->email = $request->get('email');
        $cliente->save();
         
         return response([
            'msg' => 'Cliente registrado correctamente.',
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
        $cliente = Cliente::findOrFail($id);
        $edit = true;
        return view(
            'doria.clientes.edit',
            compact('cliente', 'edit')
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
        $cliente = Cliente::find($id);
        $cliente->nombre=$request->get('nombre');
        $cliente->telefono=$request->get('telefono');
        $cliente->direccion=$request->get('direccion');
        $cliente->email=$request->get('email');
         
         $cliente->update();
         
         return response([
            'msg' => 'El Cliente ha sido modificado exitosamente.',
            'title' => '¡Cliente Modificado!'
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
        Cliente::destroy($id);
        return response([
           'msg' => 'El cliente a sido eliminado exitosamente.',
           'title' => '¡Cliente Eliminado!'
       ], 200)// 200 Status Code: Standard response for successful HTTP request
           ->header('Content-Type', 'application/json');
    }
}
