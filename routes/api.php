<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

Route::controller(UserController::class)
    ->middleware('auth')
    ->prefix('user')
    ->group(function () {
        Route::get('index', 'index')
            ->can('vewAny', User::class)
            ->name('user-index');

        Route::get('show', 'show')
            ->can('view', User::class)
            ->name('user-show');

        Route::post('store', 'store')
            ->can('create', User::class)
            ->name('user-store');

        Route::put('update', 'update')
            ->can('update', User::class)
            ->name('user-update');

        Route::delete('destroy', 'destroy')
            ->can('delete', User::class)
            ->name('user-destroy');
    });
