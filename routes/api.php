<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
                        AuthController,
                        ZoneController,
                        RoleController,
                        PermissionController,
                        YardController,
                        UserController,
                        MaterialController,
                        ThirdController,
                        AdjustmentController,
                        RateController,
                        TicketController,
                        SynchronizationController
                    };

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(["prefix" => "/auth"], function () {
    Route::get('/get-active-token', [AuthController::class, 'getActiveToken'])->name('auth.getActiveToken');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::middleware(['middleware' => 'auth:api'])->post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::group(['middleware' => 'auth:api' , "prefix" => "/zone"], function () {
    Route::get('/list', [ZoneController::class, 'list'])->middleware('can:zone.list')->name('zone.list');
    Route::post('/create', [ZoneController::class, 'create'])->middleware('can:zone.create')->name('zone.create');
    Route::put('/update/{id}', [ZoneController::class, 'update'])->middleware('can:zone.update')->name('zone.update');
    Route::delete('/delete/{id}', [ZoneController::class, 'delete'])->middleware('can:zone.delete')->name('zone.delete');
    Route::get('/get/{id}', [ZoneController::class, 'get'])->middleware('can:zone.get')->name('zone.get');
});

Route::group(['middleware' => 'auth:api' , "prefix" => "/role"], function () {
    Route::get('/list', [RoleController::class, 'list'])->middleware('can:role.list')->name('role.list');
    Route::post('/create', [RoleController::class, 'create'])->middleware('can:role.create')->name('role.create');
    Route::put('/update/{id}', [RoleController::class, 'update'])->middleware('can:role.update')->name('role.update');
    Route::delete('/delete/{id}', [RoleController::class, 'delete'])->middleware('can:role.delete')->name('role.delete');
    Route::get('/get/{id}', [RoleController::class, 'get'])->middleware('can:role.get')->name('role.get');
});

Route::group(['middleware' => 'auth:api' , "prefix" => "/permission"], function () {
    Route::get('/list', [PermissionController::class, 'list'])->name('permission.list');
});

Route::group(['middleware' => 'auth:api' , "prefix" => "/yard"], function () {
    Route::get('/list/{yard}/{displayAll}', [YardController::class, 'list'])->middleware('can:yard.list')->name('yard.list');
    Route::post('/create', [YardController::class, 'create'])->middleware('can:yard.create')->name('yard.create');
    Route::put('/update/{id}', [YardController::class, 'update'])->middleware('can:yard.update')->name('yard.update');
    Route::delete('/delete/{id}', [YardController::class, 'delete'])->middleware('can:yard.delete')->name('yard.delete');
    Route::get('/get/{id}', [YardController::class, 'get'])->middleware('can:yard.get')->name('yard.get');
});

Route::group(['middleware' => 'auth:api' , "prefix" => "/user"], function () {
    Route::get('/list/{displayAll}', [UserController::class, 'list'])->middleware('can:user.list')->name('user.list');
    Route::post('/create', [UserController::class, 'create'])->middleware('can:user.create')->name('user.create');
    Route::put('/update/{id}', [UserController::class, 'update'])->middleware('can:user.update')->name('user.update');
    Route::delete('/delete/{id}', [UserController::class, 'delete'])->middleware('can:user.delete')->name('user.delete');
    Route::get('/get/{id}', [UserController::class, 'get'])->middleware('can:user.get')->name('user.get');
    Route::put('/updateProfile/{id}', [UserController::class, 'updateProfile'])->middleware('can:user.updateProfile')->name('user.updateProfile');
});

Route::group(['middleware' => 'auth:api' , "prefix" => "/material"], function () {
    Route::get('/list/{displayAll}/{material}', [MaterialController::class, 'list'])->middleware('can:material.list')->name('material.list');
    Route::post('/create', [MaterialController::class, 'create'])->middleware('can:material.create')->name('material.create');
    Route::put('/update/{id}', [MaterialController::class, 'update'])->middleware('can:material.update')->name('material.update');
    Route::delete('/delete/{id}', [MaterialController::class, 'delete'])->middleware('can:material.delete')->name('material.delete');
    Route::get('/get/{id}', [MaterialController::class, 'get'])->middleware('can:material.get')->name('material.get');
});

Route::group(['middleware' => 'auth:api' , "prefix" => "/third"], function () {
    Route::get('/list/{displayAll}/{type}/{third}', [ThirdController::class, 'list'])->middleware('can:third.list')->name('third.list');
    Route::post('/create', [ThirdController::class, 'create'])->middleware('can:third.create')->name('third.create');
    Route::post('/createInBatch', [ThirdController::class, 'createInBatch'])->middleware('can:third.createInBatch')->name('third.createInBatch');
    Route::put('/update/{id}', [ThirdController::class, 'update'])->middleware('can:third.update')->name('third.update');
    Route::delete('/delete/{id}', [ThirdController::class, 'delete'])->middleware('can:third.delete')->name('third.delete');
    Route::get('/get/{id}', [ThirdController::class, 'get'])->middleware('can:third.get')->name('third.get');
});

Route::group(['middleware' => 'auth:api' , "prefix" => "/adjustment"], function () {
    Route::get('/list', [AdjustmentController::class, 'list'])->middleware('can:adjustment.list')->name('adjustment.list');
    Route::post('/create', [AdjustmentController::class, 'create'])->middleware('can:adjustment.create')->name('adjustment.create');
    Route::put('/update/{id}', [AdjustmentController::class, 'update'])->middleware('can:adjustment.update')->name('adjustment.update');
    Route::delete('/delete/{id}', [AdjustmentController::class, 'delete'])->middleware('can:adjustment.delete')->name('adjustment.delete');
    Route::get('/get/{id}', [AdjustmentController::class, 'get'])->middleware('can:adjustment.get')->name('adjustment.get');
});

Route::group(['middleware' => 'auth:api' , "prefix" => "/rate"], function () {
    Route::get('/list', [RateController::class, 'list'])->middleware('can:rate.list')->name('rate.list');
    Route::post('/create', [RateController::class, 'create'])->middleware('can:rate.create')->name('rate.create');
    Route::put('/update/{id}', [RateController::class, 'update'])->middleware('can:rate.update')->name('rate.update');
    Route::delete('/delete/{id}', [RateController::class, 'delete'])->middleware('can:rate.delete')->name('rate.delete');
    Route::get('/get/{id}', [RateController::class, 'get'])->middleware('can:rate.get')->name('rate.get');
});

Route::group(['middleware' => 'auth:api' , "prefix" => "/ticket"], function () {
    Route::get('/list', [TicketController::class, 'list'])->middleware('can:ticket.list')->name('ticket.list');
    Route::post('/create', [TicketController::class, 'create'])->middleware('can:ticket.create')->name('ticket.create');
    Route::put('/update/{id}', [TicketController::class, 'update'])->middleware('can:ticket.update')->name('ticket.update');
    Route::delete('/delete/{id}', [TicketController::class, 'delete'])->middleware('can:ticket.delete')->name('ticket.delete');
    Route::get('/get/{id}', [TicketController::class, 'get'])->middleware('can:ticket.get')->name('ticket.get');
});

Route::group(['middleware' => 'auth:api' , "prefix" => "/synchronization"], function () {
    Route::post('/upload', [SynchronizationController::class, 'upload'])->middleware('can:synchronization.synchronize')->name('synchronization.upload');
    Route::get('/download', [SynchronizationController::class, 'download'])->middleware('can:synchronization.synchronize')->name('synchronization.download');
});
