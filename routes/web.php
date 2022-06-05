<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PricelistController;
use App\Http\Controllers\AirwaybillController;
use App\Http\Controllers\AgentController;

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

Route::get('/', function () {
    return view('admin/dashboard');
})->name('homes');
Route::get('/manage-pricelist', function () {
    return view('admin/managePricelist');
})->name('manage-pricelist');
Route::get('/manage-airwaybill', function () {
    return view('admin/manageAirwaybill');
})->name('manage-airwaybill');
Route::get('/manage-agent', function () {
    return view('admin/manageAgent');
})->name('manage-agent');
Route::get('/pricelist-data', [PricelistController::class, 'pricelistData']
)->name('pricelist-data');
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
