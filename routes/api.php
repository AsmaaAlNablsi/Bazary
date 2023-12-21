<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainControllers\AddressController;
use App\Http\Controllers\MainControllers\AuthenticationController;
use App\Http\Controllers\MainControllers\GeneralCodeController;
use App\Http\Controllers\MainControllers\PermissionController;
use App\Http\Controllers\MainControllers\RoleController;
use App\Http\Controllers\MainControllers\UsersController;
use App\Http\Controllers\MobileControllers\Auth\AuthenticationController as MobileAuthenticationController;
use App\Http\Controllers\MobileControllers\Auth\RegistrationController;
use App\Http\Controllers\MobileControllers\GeneralCodeController as MobileGeneralCodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('logout', [AuthenticationController::class, 'logout']);
    Route::apiResource('/users', UsersController::class);
    Route::get('/users/toggle-activation/{user}', [UsersController::class, 'toggleActivation']);

    Route::apiResource('general-codes', GeneralCodeController::class);

    Route::prefix('general-codes')->group(function () {
        Route::controller(GeneralCodeController::class)->group(function () {
            Route::get('/toggle-activation/{generalCode}', 'toggleActivation');
            Route::get('/codes/{code}', 'codes');

        });
    });

    Route::apiResource('/address', AddressController::class);
    Route::get('address/toggle-activation/{address}', [AddressController::class, 'toggleActivation']);

    Route::get('/permissions', [PermissionController::class, 'index']);
    Route::apiResource('/roles', RoleController::class);
    Route::post('/roles/assignPermissions/{role}', [RoleController::class, 'assignPermissions']);
});

Route::get('lang', [Controller::class, 'switchLang']);

Route::prefix('mobile')->group(function () {
    Route::controller(RegistrationController::class)
        ->group(function () {
            Route::middleware('throttle:' . env('REQUESTS_PER_MENUTE') . ',1')
                ->post('/generate-code', 'generateActivationCode');
            Route::post('/verify-code', 'verifyActivation');
            Route::post('/register', 'register');
        });
    Route::controller(MobileGeneralCodeController::class)
        ->group(function () {
            Route::get('/general-codes', 'index');
        });
    Route::controller(MobileAuthenticationController::class)
        ->group(function () {
            Route::post('login', 'login');
            Route::get('logout', 'logout')->middleware('auth:sanctum');
        });
});

