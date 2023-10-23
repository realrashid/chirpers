<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\BillingController;
use RealRashid\PlanCraft\Facades\PlanCraft;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $plans = PlanCraft::plans();
    return view('welcome', compact('plans'));
})->middleware('guest');

Route::get('/test', function () {
    return auth()->user()->currentPlan();
    // $planByKey = PlanCraft::findPlan('pro');
    // $planById = PlanCraft::findPlan('price_1NqHDLKiNV0qopCOlij81VH2');

    // return PlanCraft::plans();
    // return PlanCraft::findPlan('basic');
    return PlanCraft::findPlan('basic');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::middleware(['isSubscribed'])->group(function () {

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::resource('chirps', ChirpController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);

    });

    Route::get('/billing-portal', function (Request $request) {
        return $request->user()->redirectToBillingPortal(route('billing'));
    });

    Route::get('/billing', [BillingController::class, 'billing'])->name('billing');
    Route::post('/subscribe', [BillingController::class, 'subscribe'])->name('subscribe');
    Route::post('/update-payment', [BillingController::class, 'updatePaymentMethod'])->name('updatePaymentMethod');
    Route::post('/switch-subscription', [BillingController::class, 'switchSubscription'])->name('switchSubscription');
    Route::post('/cancel-subscription', [BillingController::class, 'cancelSubscription'])->name('cancelSubscription');

});
