<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Mostrar todas las personas.
     */
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    /**
     * Mostrar formulario para crear nueva persona.
     */
    public function create()
    {
        return view('personas.create');
    }

    /**
     * Guardar una nueva persona en la base de datos.
     */
    public function store(Request $request)
    {
        // 🧩 Validación con mensajes personalizados
        $data = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'documento_unico' => 'required|string|max:50|unique:personas',
            'fecha_nacimiento' => 'required|date',
            'lugar_nacimiento' => 'nullable|string|max:150',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'direccion' => 'nullable|string|max:255',
        ], [
            'nombres.required' => 'Por favor, ingrese los nombres.',
            'apellidos.required' => 'Por favor, ingrese los apellidos.',
            'documento_unico.required' => 'Por favor, ingrese el número de documento.',
            'documento_unico.unique' => '⚠️ Este número de documento ya está registrado en el sistema.',
            'fecha_nacimiento.required' => 'Debe ingresar la fecha de nacimiento.',
            'email.email' => 'Por favor, ingrese un correo electrónico válido.',
        ]);

        // 🧠 Formateo automático de nombre y apellido
        $data['nombres'] = ucwords(strtolower($data['nombres']));
        $data['apellidos'] = ucwords(strtolower($data['apellidos']));

        Persona::create($data);

        return redirect()->route('personas.index')
            ->with('success', '✅ Persona registrada con éxito.');
    }

    /**
     * Mostrar una persona específica junto con sus sacramentos.
     */
    public function show(Persona $persona)
    {
        $persona->load(['sacramentos.tipo']);
        return view('personas.show', compact('persona'));
    }

    /**
     * Mostrar formulario para editar una persona existente.
     */
    public function edit(Persona $persona)
    {
        return view('personas.edit', compact('persona'));
    }

    /**
     * Actualizar una persona en la base de datos.
     */
    public function update(Request $request, Persona $persona)
    {
        $data = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'documento_unico' => 'required|string|max:50|unique:personas,documento_unico,' . $persona->id,
            'fecha_nacimiento' => 'required|date',
            'lugar_nacimiento' => 'nullable|string|max:150',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'direccion' => 'nullable|string|max:255',
        ], [
            'nombres.required' => 'Por favor, ingrese los nombres.',
            'apellidos.required' => 'Por favor, ingrese los apellidos.',
            'documento_unico.required' => 'Debe ingresar el número de documento.',
            'documento_unico.unique' => '⚠️ Este número de documento ya pertenece a otra persona.',
            'fecha_nacimiento.required' => 'Debe ingresar la fecha de nacimiento.',
            'email.email' => 'Ingrese un correo electrónico válido.',
        ]);

        // 🧠 Formateo de nombres/apellidos
        $data['nombres'] = ucwords(strtolower($data['nombres']));
        $data['apellidos'] = ucwords(strtolower($data['apellidos']));

        $persona->update($data);

        return redirect()->route('personas.index')
            ->with('success', '✅ Datos actualizados correctamente.');
    }

    /**
     * Eliminar una persona de la base de datos.
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();

        return redirect()->route('personas.index')
            ->with('success', '🗑️ Persona eliminada exitosamente.');
    }

    /**
     * Exportar datos de una persona a Word.
     */
    public function exportWord(Persona $persona)
    {
        $persona->load('sacramentos.tipo');

        $html = view('personas.word', compact('persona'))->render();

        return response($html)
            ->header('Content-Type', 'application/msword')
            ->header('Content-Disposition', 'attachment; filename="Constancia_'.$persona->nombres.'_'.$persona->apellidos.'.doc"');
    }
}
