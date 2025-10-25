<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Materia;
use App\Models\Administrativo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materia::all();
        return view('admin.materias.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $carreras = Carrera::all();

    // Filtra solo los administrativos cuyo usuario tiene el rol "Docente"
    $docentes = DB::table('administrativos')
        ->join('users', 'administrativos.usuario_id', '=', 'users.id')
        ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->where('roles.name', 'Docente')
        ->select('administrativos.id', 'administrativos.nombre', 'administrativos.apellido')
        ->get();

    return view('admin.materias.create', compact('carreras', 'docentes'));
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'carrera_id' => 'required|exists:carreras,id',
            'docente_id' => 'required|exists:administrativos,id',
            'nombre'     => 'required|string|max:255',
            'codigo'     => 'required|string|max:50',
            'anio' => 'required|string|max:50',

        ]);

        Materia::create($request->all());

        return redirect()->route('admin.materias.index')
                ->with('mensaje','Materia registrada correctamente')
                ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia)
    {
        //$materia = Materia::find($id);
        //return view('admin.materias.show', compact('materia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit($id)
{
    $materia = Materia::findOrFail($id);
    $carreras = Carrera::all();

    // Traemos solo los administrativos que tienen el rol "Docente"
    $docentes = DB::table('administrativos')
        ->join('users', 'administrativos.usuario_id', '=', 'users.id')
        ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->where('roles.name', 'Docente')
        ->select('administrativos.id', 'administrativos.nombre', 'administrativos.apellido')
        ->get();

    return view('admin.materias.edit', compact('materia', 'carreras', 'docentes'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'carrera_id' => 'required|exists:carreras,id',
            'docente_id' => 'required|exists:administrativos,id',
            'nombre'     => 'required|string|max:255',
            'codigo'     => 'required|string|max:50',
            'anio' => 'required|string|max:50',
        ]);

        $materia = Materia::findOrFail($id);
        $materia->update($request->only(['nombre','codigo','carrera_id','docente_id','anio']));

        return redirect()->route('admin.materias.index')
            ->with('mensaje', 'Materia actualizada correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $materia = Materia::find($id);
        $materia->delete();

        return redirect()->route('admin.materias.index')
    ->with('mensaje','Materia registrada correctamente')
    ->with('icono','success');
    }
}
