<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users_que_tengan_el_rol_1_y_2', [UserController::class, 'uno']);

Route::get('permisos_que_se_tienen_del_rol_1',

[UserController::class, 'dos']);

Route::get('usuarios_y_el_rol_que_tienen_el_permiso_2', [UserController::class, 'tres']);

Route::post('log-in', [AuthController::class, 'logIn']);