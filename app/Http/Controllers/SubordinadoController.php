<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;
use App\Models\Subordinado;

class SubordinadoController extends Controller
{
    public function showSubordinados($id)
{
    $vendedor = Vendedor::findOrFail($id);
    $subordinados = Subordinado::where('idVendedor', $id)->get();

    return view('subordinados', ['vendedor' => $vendedor, 'subordinados' => $subordinados]);
}

}
