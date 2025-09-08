<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Contacto;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::with('cliente')->get();
        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create()
    {
        $contactos = Contacto::all();
        return view('vehiculos.formulario-vehiculo', compact('contactos'));
    }

    public function store(Request $request)
    {
        $request->validate($this->validationRules(), $this->validationMessages());

        Vehiculo::create($request->all());
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo registrado correctamente');
    }

    public function edit($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $contactos = Contacto::all();
        return view('vehiculos.formulario-vehiculo', compact('vehiculo', 'contactos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->validationRules($id), $this->validationMessages());

        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->update($request->all());
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado correctamente');
    }

    public function destroy($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado correctamente');
    }

    private function validationRules($id = null)
    {
        return [
            'placa' => 'required|string|max:10|unique:vehiculos,placa,' . $id,
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'year_fabricacion' => 'required|integer|digits:4|min:1999|max:' . date('Y'),
            'cliente_id' => 'required|exists:contactos,id',
        ];
    }

    private function validationMessages()
    {
        return [
            'placa.unique' => 'La placa ya está registrada en otro vehículo.',
            'year_fabricacion.min' => 'El año de fabricación debe ser al menos 1999.',
            'year_fabricacion.max' => 'El año de fabricación no puede ser mayor al año actual.',
            'year_fabricacion.digits' => 'El año de fabricación debe tener exactamente 4 dígitos.',
        ];
    }
}