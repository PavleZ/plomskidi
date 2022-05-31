<?php

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

use App\TipInformacije;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;

//Route::get('/', function () {
//    return view('welcome');
//
//});

Route::get('/','HomeController@login')->name("home");
Route::get('/registration-form','HomeController@register')->name("reg-form");

Route::post('/register',"RegisterController@register")->name("register");
Route::post('/login',"LoginController@login")->name("login");
Route::get('/logout',"LoginController@logout")->name("logout");

Route::middleware(['adminLogged'])->group(function(){

    Route::get('/user/admin',"AdminLoginController@index")->name('adminHome');
    Route::resource('korisnik', 'KorisnikController');
    Route::post('/userStatusChange', 'KorisnikController@changeStatus')->name('userStatusChange');
    Route::resource('predmet', 'PredmetController');



});
Route::middleware(['userLogged'])->group(function(){
    Route::get('/user/home',"HomeController@userHome")->name('userHome');


});

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
//Route::get('/botman/tinker', 'BotManController@tinker');


Route::get('/error', function(){
    return view('error');
})->name('error');
