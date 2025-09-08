<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactoController extends Controller
{
    public function index()
    {
        $contactos = Contacto::all();
        return view('contactos.contactos-list', compact('contactos'));
    }

    public function create()
    {
        return view('contactos.formulario-contacto');
    }

    public function store(Request $request)
    {
        $request->validate($this->validationRules(), $this->validationMessages());

        Contacto::create($request->all());
        return redirect()->route('contactos.contactos-list')->with('success', 'Cliente registrado con éxito!');
    }

    public function edit($id)
    {
        $contacto = Contacto::findOrFail($id);
        return view('contactos.formulario-contacto', compact('contacto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->validationRules($id), $this->validationMessages());

        $contacto = Contacto::findOrFail($id);
        $contacto->update($request->all());
        return redirect()->route('contactos.contactos-list')->with('success', 'Cliente actualizado con éxito!');
    }

    public function destroy($id)
    {
        Contacto::destroy($id);
        return redirect()->route('contactos.contactos-list')->with('success', 'Cliente eliminado con éxito!');
    }

    private function validationRules($id = null)
    {
        return [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'documento_identidad' => 'required|string|max:8|unique:contactos,documento_identidad,' . $id,
            'correo' => 'required|email',
            'telefono' => 'required|string|max:9',
        ];
    }

    private function validationMessages()
    {
        return [
            'documento_identidad.unique' => 'El DNI ya está registrado en otro contacto.',
        ];
    }
}