<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Sacramento;
use App\Models\SacramentoTipo;
use Illuminate\Http\Request;

class SacramentController extends Controller
{
    /**
     * Mostrar todos los sacramentos de una persona.
     */
    public function index(Persona $persona)
    {
        $persona->load('sacramentos.tipo');
        return view('sacramentos.index', compact('persona'));
    }

    /**
     * Mostrar formulario para agregar un sacramento a una persona.
     */
    public function create(Persona $persona)
    {
        $tipos = SacramentoTipo::orderBy('nombre')->get();
        return view('sacramentos.create', compact('persona', 'tipos'));
    }

    /**
     * Guardar nuevo sacramento.
     */
    public function store(Request $request, Persona $persona)
    {
        $data = $request->validate([
            'sacramento_tipo_id' => 'required|exists:sacramento_tipos,id',
            'fecha_sacramento'   => 'required|date',
            'lugar'              => 'nullable|string|max:255',
            'parroquia'          => 'nullable|string|max:255',
            'padre'              => 'nullable|string|max:255',
            'madre'              => 'nullable|string|max:255',
            'padrino1'           => 'nullable|string|max:255',
            'padrino2'           => 'nullable|string|max:255',
            'ministro'           => 'nullable|string|max:255',
            'libro'              => 'nullable|string|max:255',
            'folio'              => 'nullable|string|max:255',
            'partida'            => 'nullable|string|max:255',
            'notas'              => 'nullable|string',
            'conyuge1'           => 'nullable|string|max:255', // 🔹 agregado
            'conyuge2'           => 'nullable|string|max:255', // 🔹 agregado
        ]);

        $data['persona_id'] = $persona->id;

        Sacramento::create($data);

        return redirect()
            ->route('personas.show', $persona)
            ->with('success', 'Sacramento agregado correctamente.');
    }

    /**
     * Editar sacramento existente.
     */
    public function edit(Sacramento $sacramento)
    {
        $tipos = SacramentoTipo::orderBy('nombre')->get();
        return view('sacramentos.edit', compact('sacramento', 'tipos'));
    }

    /**
     * Actualizar sacramento existente.
     */
    public function update(Request $request, Sacramento $sacramento)
    {
        $data = $request->validate([
    'sacramento_tipo_id' => 'required|exists:sacramento_tipos,id',
    'fecha_sacramento'   => 'required|date',
    'lugar'              => 'nullable|string|max:255',
    'parroquia'          => 'nullable|string|max:255',
    'padre'              => 'nullable|string|max:255',
    'madre'              => 'nullable|string|max:255',
    'padrino1'           => 'nullable|string|max:255',
    'padrino2'           => 'nullable|string|max:255',
    'ministro'           => 'nullable|string|max:255',
    'libro'              => 'nullable|string|max:255',
    'folio'              => 'nullable|string|max:255',
    'partida'            => 'nullable|string|max:255',
    'notas'              => 'nullable|string',
    'conyuge1'           => 'nullable|string|max:255', // 🔹 agregado
    'conyuge2'           => 'nullable|string|max:255', // 🔹 agregado
 ]);


        $sacramento->update($data);

        return redirect()
            ->route('personas.show', $sacramento->persona_id)
            ->with('success', 'Sacramento actualizado correctamente.');
    }

    /**
     * Eliminar sacramento.
     */
    public function destroy(Sacramento $sacramento)
    {
        $personaId = $sacramento->persona_id;
        $sacramento->delete();

        return redirect()
            ->route('personas.show', $personaId)
            ->with('success', 'Sacramento eliminado correctamente.');
    }

        /**
     * Mostrar la constancia individual de Bautismo.
     */
    public function constanciaBautismo($id)
    {
        $sacramento = Sacramento::with('persona')->findOrFail($id);
        $persona = $sacramento->persona;

        return view('personas.bautismo', compact('sacramento', 'persona'));
    }

        /**
     * Mostrar la constancia individual de Confirmación.
     */
    public function constanciaConfirmacion($id)
    {
        $sacramento = Sacramento::with('persona')->findOrFail($id);
        $persona = $sacramento->persona;

        return view('personas.confirmacion', compact('sacramento', 'persona'));
    }

    /**
     * Mostrar la constancia individual de Matrimonio.
     */
    public function constanciaMatrimonio($id)
    {
        $sacramento = Sacramento::with('persona')->findOrFail($id);
        $persona = $sacramento->persona;

        return view('personas.matrimonio', compact('sacramento', 'persona'));
    }

    /**
     * Mostrar la constancia individual de Primera Comunión.
     */
    public function constanciaComunion($id)
    {
        $sacramento = Sacramento::with('persona')->findOrFail($id);
        $persona = $sacramento->persona;

        return view('personas.comunion', compact('sacramento', 'persona'));
    }


}
