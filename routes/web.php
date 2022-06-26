<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PricelistController;
use App\Http\Controllers\AirwaybillController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepositsController;
use App\Http\Controllers\SettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SettingsController::class, 'index'])->middleware(['auth'])->name('homes');

Route::prefix('admin')->group(function () {
    Route::prefix('pricelist')->group(function () {
        Route::get('/manage-pricelist', [PricelistController::class, 'index'])->name('manage-pricelist');
        Route::get('/pricelist-data', [PricelistController::class, 'pricelistData'])->name('pricelist-data');
        Route::get('/pricelist-find', [PricelistController::class, 'pricelistFind'])->name('pricelist-find');
        Route::get('/create', [PricelistController::class, 'create'])->name('create-pricelist');
        Route::get('/getRegencies', [PricelistController::class, 'getRegencies'])->name('pricelist-get-regencies');
        Route::get('/getDistricts', [PricelistController::class, 'getDistricts'])->name('pricelist-get-districts');
        Route::get('/getVillages', [PricelistController::class, 'getVillages'])->name('pricelist-get-villages');
        Route::post('/store', [PricelistController::class, 'store'])->name('store-pricelist');
        Route::get('/edit/{id}', [PricelistController::class, 'edit'])->name('edit-pricelist/{id}');
        Route::post('/update', [PricelistController::class, 'update'])->name('update-pricelist');
        Route::post('/fetch', [PricelistController::class, 'fetch'])->name('fetch-pricelist');
        Route::post('/import', [PricelistController::class, 'import'])->name('import-pricelist');
    });

    Route::prefix('airwaybill')->group(function () {
        Route::get('/manage-airwaybill', [AirwaybillController::class, 'index'])->name('manage-airwaybill');
        Route::get('/airwaybill-data', [AirwaybillController::class, 'airwaybillData'])->name('airwaybill-data');
        Route::get('/create', [AirwaybillController::class, 'create'])->name('create-airwaybill');
        Route::post('/store', [AirwaybillController::class, 'store'])->name('store-airwaybill');
        Route::get('/print/{ids}', [AirwaybillController::class, 'print'])->name('print-airwaybill');
    });

    Route::prefix('agent')->group(function () {
        Route::get('/manage-agent', [AgentController::class, 'index'])->name('manage-agent');
        Route::get('/agent-data', [AgentController::class, 'agentData'])->name('agent-data');
        Route::get('/create', [AgentController::class, 'create'])->name('create-agent');
        Route::post('/store', [AgentController::class, 'store'])->name('store-agent');
        Route::get('/edit/{id}', [AgentController::class, 'edit'])->name('edit-agent/{id}');
        Route::post('/update', [AgentController::class, 'update'])->name('update-agent');
    });

    Route::prefix('user')->group(function () {
        Route::get('/manage-user', [UserController::class, 'index'])->name('manage-user');
        Route::get('/user-data', [UserController::class, 'userData'])->name('user-data');
        Route::get('/create', [UserController::class, 'create'])->name('create-user');
        Route::post('/store', [UserController::class, 'store'])->name('store-user');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit-user/{id}');
        Route::post('/update', [UserController::class, 'update'])->name('update-user');
    });

    Route::prefix('deposit')->group(function () {
        Route::get('/manage-deposit', [DepositsController::class, 'index'])->name('manage-deposit');
        Route::get('/deposit-data', [DepositsController::class, 'depositData'])->name('deposit-data');
        Route::get('/create', [DepositsController::class, 'create'])->name('create-deposit');
        Route::post('/store', [DepositsController::class, 'store'])->name('store-deposit');
        Route::post('/deposit-approve', [DepositsController::class, 'approveDeposit'])->name('deposit-approve');
        Route::post('/deposit-void', [DepositsController::class, 'voidDeposit'])->name('deposit-void');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
