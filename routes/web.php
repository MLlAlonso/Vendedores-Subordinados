<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\SubordinadoController;
use App\Http\Controllers\JerarquiaController;

//Url´s havia las vistas
Route::view('/', 'index')->name('index');
Route::view('/subordinados', 'subordinados')->name('subordinados');
Route::view('/addSubordinado', 'registroSubordinados')->name('registroSubordinados');
Route::view('/registroVendedores', 'registroVendedores')->name('registroVendedores');

//Url correspondientes al controlador de Vendedor
Route::get('/registroVendedores', [VendedorController::class, 'showForm'])->name('registroVendedores');
Route::post('/registroVendedores', [VendedorController::class, 'add'])->name('vendedor.add');
Route::get('/', [VendedorController::class, 'index'])->name('index');
Route::delete('/vendedor/{id}', [VendedorController::class, 'destroy'])->name('vendedor.destroy');
Route::get('/vendedor/editar/{id}', [VendedorController::class, 'edit'])->name('vendedor.edit');
Route::put('/vendedor/editar/{id}', [VendedorController::class, 'update'])->name('vendedor.update');

//Url correspondientes al controlador de Subordinado
Route::get('/subordinados/{id}', [SubordinadoController::class, 'showSubordinados'])->name('subordinados.show');
