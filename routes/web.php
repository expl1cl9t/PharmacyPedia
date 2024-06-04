<?php

use App\Livewire\AuthComponent;
use Illuminate\Support\Facades\Route;

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

Route::get('/auth', AuthComponent::class)->name('auth');
Route::get('/register',\App\Livewire\RegisterComponent::class);

Route::group(['middleware' => 'auth', 'prefix' => 'store'], function ($router) {
    Route::get('/', function (Request $request) {
        return view('Index');
    })->name('inde');
    Route::get('profile', function (Request $request) {
        $user = Auth::user();
        $userBills = auth()->user()->bills;
        return view('UserProfile', ['user' => $user, 'userBills' => $userBills]);
    })->name('profile');
    Route::view('/order', 'MakeOrderView')->name('makeOrder');
    Route::get('/catalog/{type}', function($type){
        $typeObf = \App\Models\TypeOfMedicine::find($type);
        $meds = $typeObf->medicines->sortByDesc(function (\App\Models\Medicine $bills, int $key){
            return count($bills->inBills);
        });
        return view('CatalogView', ['type' => $typeObf, 'meds' => $meds]);
    })->name('catalog');
});

Route::group(['middleware' => ['auth','admin'], 'prefix' => 'admin'], function ($router) {
    Route::get('/', function (){
       return view('AdminPage');
    });
});


Route::get('/logout', function(){
    auth()->logout();
    session()->regenerate();
    return redirect()->route('auth');
})->name('logout');
