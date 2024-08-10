<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PromoCodeController;

Route::group([
    'prefix'     => 'admin',
], function () {
    // auth section
    Route::get('/', [AuthController::class, 'loginView'])->name('login_view');
    Route::post('/handle/login', [AuthController::class, 'login'])->name('login');

    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboardView'])->name('dashboard_view')->middleware('auth');

    // promocode section
    Route::get('/promocodes', [PromoCodeController::class, 'promocodeView'])->name('promocodes')->middleware('auth');

    // export promocodes to exel
    Route::get('used/promocodes/export/', [PromoCodeController::class, 'exportUsedPromoCode'])->name('used_promocodes')->middleware('auth');
    Route::get('new/promocodes/export/', [PromoCodeController::class, 'exportNewPromoCode'])->name('new_promocodes')->middleware('auth');
    Route::post('promocodes/import/', [PromoCodeController::class, 'importPromoCode'])->name('import_promocodes')->middleware('auth');

});
