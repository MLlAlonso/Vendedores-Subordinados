<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;

class VendedorController extends Controller
{
    public function showForm()
    {
        //Llama al formulario de registro de vendedores
        return view('registroVendedores');
    }

    public function add(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:60|min:4',
            'apellidoPaterno' => 'required|string|max:40|min:3',
            'apellidoMaterno' => 'required|string|max:40|min:3',
            'domicilio' => 'required|string|max:100|min:5',
            'celular' => 'required|digits:10',
            'telefonoDeCasa' => 'required|digits:10',
            'email' => 'required|email',
        ]);

        // Crear un nuevo vendedor en la base de datos y redirige al index, donde se podran observar los vendedores
        Vendedor::create($request->all());
        return redirect()->route('index')->with('success', 'Vendedor registrado exitosamente');
    }

    public function index()
    {
        // Obtener la lista de vendedores desde la base de datos y pasarlo a index
        $vendedores = Vendedor::all();
        return view('index', ['vendedores' => $vendedores]);
    }

    public function destroy($id)
    {
        //Obtiene el id del vendedor y elimina el registro
        Vendedor::destroy($id);
        return redirect()->route('index')->with('success', 'Vendedor eliminado exitosamente');
    }


    public function edit($id)
    {
        //Mostrar los datos del vendedor en el form de edición
        $vendedor = Vendedor::findOrFail($id);
        return view('editVendedor', compact('vendedor'));
    }

    public function update(Request $request, $id)
    {
        // Validar y actualiza los datos del vendedor en la base de datos
        $request->validate([
            'nombre' => 'required|string|max:60|min:4',
            'apellidoPaterno' => 'required|string|max:40|min:3',
            'apellidoMaterno' => 'required|string|max:40|min:3',
            'domicilio' => 'required|string|max:100|min:5',
            'celular' => 'required|digits:10',
            'telefonoDeCasa' => 'required|digits:10',
            'email' => 'required|email',
        ]);

        $vendedor = Vendedor::findOrFail($id);
        $vendedor->update($request->all());

        return redirect()->route('index')->with('success', 'Vendedor actualizado exitosamente');
    }
}
