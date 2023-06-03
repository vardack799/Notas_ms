<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $actividades = Actividad::all();
        $data = json_encode(([
            "data" => $actividades
        ]));
        return response($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
     {
         $actividad = new Actividad();
         $actividad->codigo = $request->input('codigo');
         $actividad->nombres = $request->input('nombres');
         $actividad->apellidos = $request->input('apellidos');
         $actividad->save();
         return response(json_encode([
             "data" => "Estudiante registrado"
         ]));
     }
     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($codigo)
    {
        $actividad = Actividad::find($codigo);
        return response(json_encode([
            "data" => $actividad
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $codigo)
    {
        $estudiante = Actividad::find($codigo);
         $estudiante->codigo = $request->input('codigo');
        $estudiante->nombres = $request->input('nombres');
        $estudiante->apellidos = $request->input('apellidos');
        $estudiante->save();
        return response(json_encode([
            "data" => "Estudiante actualizado"
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($codigo)
    {
        $estudiante = Actividad::find($codigo);
        if (empty($estudiante)) {
            return response(json_encode([
                "data" => "El estudiante no existe"
            ]), 404);
        }
        $estudiante->delete();
        return response(json_encode([
            "data" => "Estudiante eliminado"
        ]));
    }

}
