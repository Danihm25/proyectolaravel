<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class ContadorController extends Controller {

    public function index()
    {
        $facturas = Factura::latest()->get();
        return view('contadores.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'cliente' => 'required|string',
            'monto' => 'required|numeric',
            'fecha_emision' => 'required|date'
        ]);

        Factura::create($data);
        return redirect()->route('contadores.index')->with('success', 'Factura registrada');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Factura $factura) {
        $factura->delete();
        return redirect()->route('contadores.index');
    }
}
