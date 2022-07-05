<?php
use Illuminate\Support\Facades\Route;




Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');

Route::delete('/permissions/{permission}/destroy', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permissions.destroy');


Route::post('/permissions', [App\Http\Controllers\PermissionController::class, 'store'])->name('permissions.store');

Route::get('/permissions/{permission}/edit',[App\Http\Controllers\PermissionController::class, 'edit'])->name('permissions.edit');

Route::patch('/permissions/{permission}/update',[App\Http\Controllers\PermissionController::class, 'update'])->name('permissions.update');

Route::patch('permissions/{permission}/attach',[App\Http\Controllers\PermissionController::class, 'attachRole'])->name('role.permission.attach');
Route::patch('permissions/{permission}/detach',[App\Http\Controllers\PermissionController::class, 'detachRole'])->name('role.permission.detach');