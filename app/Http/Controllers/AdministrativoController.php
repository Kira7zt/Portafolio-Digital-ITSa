<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Administrativo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
// En tu app/Http/Controllers/AdministrativoController.php

public function index()
{
    // Carga los Administrativos, y optimiza cargando sus relaciones de usuario y roles.
    $administrativos = Administrativo::with('usuario.roles')->get();

    return view('admin.administrativos.index', compact('administrativos')); 
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.administrativos.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'ci' => 'required|string|max:255|unique:administrativos',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'profesion' => 'required|string|max:255',
            'rol' => 'required',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombres."".$request->apellidos;
        $usuario->email = $request->ci."@gmail.com";
        $usuario->password = Hash::make($request->ci);
        $usuario->save();

        $usuario->assignRole($request->rol);

        $administrativo = new Administrativo();
        $administrativo->usuario_id = $usuario->id;
        $administrativo->nombre = $request->nombre;
        $administrativo->apellido = $request->apellido;
        $administrativo->ci = $request->ci;
        $administrativo->fecha_nacimiento = $request->fecha_nacimiento;
        $administrativo->telefono = $request->telefono;
        $administrativo->direccion = $request->direccion;
        $administrativo->profesion = $request->profesion;
        $administrativo->save();

        return redirect()->route('admin.administrativos.index')
                ->with('mensaje', 'Administrativo registrado exitosamente.')
                ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $administrativo = Administrativo::findOrFail($id);
        return view('admin.administrativos.show', compact('administrativo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrativo $administrativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrativo $administrativo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrativo $administrativo)
    {
        //
    }
}
