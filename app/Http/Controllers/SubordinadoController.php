<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;
use App\Models\Subordinado;
use App\Models\Jerarquia;

class SubordinadoController extends Controller
{
    //Muestra al vendedor seleccionado junto con los miembros pertenecientes a su jerarquia
    public function showSubordinados($id)
    {
        $vendedor = Vendedor::findOrFail($id);
        $subordinados = Subordinado::where('idVendedor', $id)->get();

        return view('subordinados', ['vendedor' => $vendedor, 'subordinados' => $subordinados]);
    }

    //Redirige a la vista del forumulario de registro de subordinados
    public function showAddSubordinadoForm($id, $idSubordinadoPrincipal = null)
    {
        $vendedor = Vendedor::findOrFail($id);

        // Obtiene el nivel del subordinado principal si viene de otro subordinado
        $nivel = $idSubordinadoPrincipal ? Subordinado::find($idSubordinadoPrincipal)->nivel + 1 : 2;
        return view('registroSubordinados', ['vendedor' => $vendedor, 'idSubordinadoPrincipal' => $idSubordinadoPrincipal, 'nivel' => $nivel]);
    }

    // Registra un nuevo subordinado y actualiza la jerarquía
    public function addSubordinado(Request $request)
    {
        try {
            $subordinado = new Subordinado($request->all());
            $subordinado->save();
            dd("Lógica de guardado en Subordinado ejecutada");

            //Logica de guardado en jerarquia, verifica si el reclutador se trata directamente del vendedor o de otro subordinado
            if ($request->input('idSubordinadoPrincipal')) {
                $idVendedor = Jerarquia::where('idSubordinado', $request->input('idSubordinadoPrincipal'))->value('idReclutador');
            } else {
                $idVendedor = $request->input('idVendedor');
            }

            Jerarquia::create([
                'idReclutador' => $idVendedor,
                'idSubordinado' => $subordinado->id,
                'idVendedor' => $request->input('idVendedor'),
            ]);

            return redirect()->route('subordinados.show', ['id' => $request->input('idVendedor')])->with('success', 'Subordinado registrado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al procesar la solicitud: ' . $e->getMessage());
        }
    }
}
