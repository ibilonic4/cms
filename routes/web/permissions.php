<?php
use Illuminate\Support\Facades\Route;




Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');

Route::delete('/permissions/{permission}/destroy', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permissions.destroy');