<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Muestra la lista de equipos.
     */
    public function index()
    {
        $equipos = Equipo::all();
        // Ajustado a tu carpeta 'Equipo' (mayúscula)
        return view('Equipo.index', compact('equipos'));
    }

    /**
     * Muestra el formulario para crear un nuevo equipo.
     */
    public function create()
    {
        return view('Equipo.create');
    }

    /**
     * Guarda el equipo en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'marca' => 'required'
        ]);

        Equipo::create($request->all());

        return redirect()->route('equipos.index')->with('success', 'Equipo creado');
    }

    /**
     * Muestra el formulario para editar.
     */
    public function edit(Equipo $equipo)
    {
        // Es mejor pasar el modelo Equipo directamente que un string $id
        return view('Equipo.edit', compact('equipo'));
    }

    /**
     * Actualiza los datos del equipo.
     */
    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'nombre' => 'required',
            'marca' => 'required'
        ]);

        $equipo->update($request->all());

        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado');
    }

    /**
     * Elimina el equipo.
     */
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado');
    }
}
