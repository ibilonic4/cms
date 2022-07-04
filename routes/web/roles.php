<?php
use Illuminate\Support\Facades\Route;




Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');

Route::post('/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');

Route::delete('/roles/{role}/destroy',[App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');

Route::get('/roles/{role}/edit',[App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');

Route::patch('/roles/{role}/update',[App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');