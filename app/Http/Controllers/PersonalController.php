<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personales = Personal::all();
        $personales->load('usuario');

        return view('personales.index', compact('personales'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:100', 'unique:App\Models\Usuario,email'],
            'password' => ['required', 'string'],
            'nombre' => ['required', 'string', 'max:50', 'min:3'],
            'telefono' => ['required', 'string', 'max:10', 'min:8'],
            'direccion' => ['required', 'string', 'max:100', 'min:10'],
            'profesion' => ['required', 'string', 'max:100', 'min:3'],
        ]);

        $user = Usuario::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
        ]);

        Personal::create([
            'id' => $user->id,
            'profesion' => $request->profesion,
        ]);

        return redirect()->route('personales.index')->with('success', 'Personal creado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personal $personale)
    {
        $personal = $personale;
        return view('personales.edit', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personal $personale)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:100', 'unique:App\Models\Usuario,email,'.$personale->id],
            'nombre' => ['required', 'string', 'max:50', 'min:3'],
            'telefono' => ['required', 'string', 'max:10', 'min:8'],
            'direccion' => ['required', 'string', 'max:100', 'min:10'],
            'profesion' => ['required', 'string', 'max:100', 'min:3'],
        ]);

        $user = Usuario::find($personale->id);
        $user->nombre = $request->nombre;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->direccion = $request->direccion;
        $user->save();

        $personal = Personal::find($personale->id);
        $personal->profesion = $request->profesion;
        $personal->save();

        return redirect()->route('personales.index')->with('success', 'Personal actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personal $personale)
    {
        $personale->delete();
        $usuario = Usuario::find($personale->id);
        $usuario->delete();

        return redirect()->route('personales.index')->with('success', 'Personal eliminado correctamente');
    }
}
