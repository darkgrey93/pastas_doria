<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MateriaPrima;
use DataTables;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('doria.materias.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        if ($request->ajax() && $request->isMethod('GET')) {
             $materias = MateriaPrima::all();
            return DataTables::of($materias)           
                ->removeColumn('created_at')
                ->removeColumn('updated_at')
                ->make(true);
         }
    }
    public function create()
    {
        return view('doria.materias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materia = new MateriaPrima();
        $materia->nombre = $request->get('nombre');
        $materia->descripcion = $request->get('descripcion');
        $materia->cantidad = $request->get('cantidad');
        $materia->valor = $request->get('valor');
        $materia->save();
         
         return response([
            'msg' => 'Materia prima registrada correctamente.',
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
        $materias = MateriaPrima::findOrFail($id);
        $edit = true;
        return view(
            'doria.materias.edit',
            compact('materias', 'edit')
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
        $materias = MateriaPrima::find($id);
        $materias->nombre=$request->get('nombre');
        $materias->descripcion=$request->get('descripcion');
        $materias->cantidad=$request->get('cantidad');
        $materias->valor=$request->get('valor');
         
         $materias->update();
         
         return response([
            'msg' => 'La materia prima ha sido modificada exitosamente.',
            'title' => '¡Materia Prima Modificada!'
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
        MateriaPrima::destroy($id);
        return response([
           'msg' => 'la materia prima se ha sido eliminada exitosamente.',
           'title' => '¡Materia prima Eliminada!'
       ], 200)// 200 Status Code: Standard response for successful HTTP request
           ->header('Content-Type', 'application/json');
    }
}
