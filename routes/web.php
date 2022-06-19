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

Route::get('/', [SettingsController::class, 'index'])->name('homes');
Route::get('/manage-pricelist', [PricelistController::class, 'index'])->name('manage-pricelist');
Route::get('/manage-airwaybill', [AirwaybillController::class, 'index'])->name('manage-airwaybill');
Route::get('/manage-agent', [AgentController::class, 'index'])->name('manage-agent');
Route::get('/manage-user', [UserController::class, 'index'])->name('manage-user');
Route::get('/pricelist-data', [PricelistController::class, 'pricelistData']
)->name('pricelist-data');
Route::get('/pricelist-find', [PricelistController::class, 'pricelistFind']
)->name('pricelist-find');
Route::get('admin/managePricelist/create', [PricelistController::class, 'create']
)->name('create-pricelist');
Route::get('admin/managePricelist/getRegencies', [PricelistController::class, 'getRegencies']
)->name('pricelist-get-regencies');
Route::get('admin/managePricelist/getDistricts', [PricelistController::class, 'getDistricts']
)->name('pricelist-get-districts');
Route::get('admin/managePricelist/getVillages', [PricelistController::class, 'getVillages']
)->name('pricelist-get-villages');
Route::post('admin/managePricelist/store', [PricelistController::class, 'store']
)->name('store-pricelist');
Route::get('admin/managePricelist/edit/{id}', [PricelistController::class, 'edit']
)->name('edit-pricelist/{id}');
Route::post('admin/managePricelist/update', [PricelistController::class, 'update']
)->name('update-pricelist');
Route::post('admin/managePricelist/fetch', [PricelistController::class, 'fetch']
)->name('fetch-pricelist');
Route::post('admin/managePricelist/import', [PricelistController::class, 'import']
)->name('import-pricelist');

Route::get('/airwaybill-data', [AirwaybillController::class, 'airwaybillData']
)->name('airwaybill-data');
Route::get('admin/manageAirwaybill/create', [AirwaybillController::class, 'create']
)->name('create-airwaybill');
Route::post('admin/manageAirwaybill/store', [AirwaybillController::class, 'store']
)->name('store-airwaybill');
Route::get('admin/manageAirwaybill/print/{ids}', [AirwaybillController::class, 'print']
)->name('print-airwaybill');

Route::get('/agent-data', [AgentController::class, 'agentData']
)->name('agent-data');
Route::get('admin/manageAgent/create', [AgentController::class, 'create']
)->name('create-agent');
Route::post('admin/manageAgent/store', [AgentController::class, 'store']
)->name('store-agent');
Route::get('admin/manageAgent/edit/{id}', [AgentController::class, 'edit']
)->name('edit-agent/{id}');
Route::post('admin/manageAgent/update', [AgentController::class, 'update']
)->name('update-agent');

Route::get('/user-data', [UserController::class, 'userData']
)->name('user-data');
Route::get('admin/manageUser/create', [UserController::class, 'create']
)->name('create-user');
Route::post('admin/manageUser/store', [UserController::class, 'store']
)->name('store-user');
Route::get('admin/manageUser/edit/{id}', [UserController::class, 'edit']
)->name('edit-user/{id}');
Route::post('admin/manageUser/update', [UserController::class, 'update']
)->name('update-user');

Route::prefix('admin')->group(function () {
    Route::prefix('deposit')->group(function () {
        Route::get('/manage-deposit', [DepositsController::class, 'index'])->name('manage-deposit');
        Route::get('/deposit-data', [DepositsController::class, 'depositData'])->name('deposit-data');
        Route::get('/create', [DepositsController::class, 'create'])->name('create-deposit');
        Route::post('/store', [DepositsController::class, 'store'])->name('store-deposit');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
