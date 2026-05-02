<?php

use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\UploadedImageController;
use Illuminate\Support\Facades\Route;

// Admin routes with prefix
Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Portfolio management
    Route::resource('portfolio', PortfolioItemController::class, ['as' => 'admin']);

    // Certificate management
    Route::resource('certificates', CertificateController::class, ['as' => 'admin']);

    // Image management
    Route::resource('images', UploadedImageController::class, ['as' => 'admin']);
    Route::post('images/bulk-delete', [UploadedImageController::class, 'bulkDelete'])->name('admin.images.bulk-delete');
    Route::post('images/update-order', [UploadedImageController::class, 'updateOrder'])->name('admin.images.update-order');

    // Menu management
    Route::get('/menus', [DashboardController::class, 'menus'])->name('admin.menus.index');
    Route::post('/menus', [DashboardController::class, 'storeMenu'])->name('admin.menus.store');
    Route::put('/menus/{menu}', [DashboardController::class, 'updateMenu'])->name('admin.menus.update');
    Route::delete('/menus/{menu}', [DashboardController::class, 'destroyMenu'])->name('admin.menus.destroy');

    // Page management
    Route::get('/pages', [DashboardController::class, 'pages'])->name('admin.pages.index');
    Route::get('/pages/{page}/edit', [DashboardController::class, 'editPage'])->name('admin.pages.edit');
    Route::put('/pages/{page}', [DashboardController::class, 'updatePage'])->name('admin.pages.update');
});