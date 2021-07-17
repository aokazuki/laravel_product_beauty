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

use App\Hairdresser; //appのHairdresser.phpを参照できるようにする処理
use Illuminate\Http\Request; //HTTPリクエストを扱うためのメソッド参照用の処理

// Route::get('/', function () {
//     return view('welcome');
// });

//laravelのログイン認証機能呼び出し
Auth::routes();

//publicフォルダで/homeを呼び出した時の初期画面を、Homeコントローラのindexから呼び出している。
Route::get('/home', 'HairdressersController@index')->name('home');

//美容師の記録を一覧表示する個別画面へのルート定義(hairrecords.blade.php)
Route::get('/hairrecords', 'HairdressersController@index');

// 美容師の新しい「施術記録」の追加を行う画面へのルート定義(hairdressers.blade.php)
//http://firstdev.sakura.ne.jp/beauty/ にアクセスした際の表示ページになる。
Route::get('/', 'HairdressersController@add');

// 新しい「施術記録」を行う追加処理をhairdressers.blade.phpに実装するルート定義
Route::post('/hairdressers', 'HairdressersController@store');

// 施術記録を「削除」する処理
Route::delete('/hairdresser/{hairdresser}', 'HairdressersController@delete');

//施術記録を「更新する画面を表示」する処理
Route::get('/hairdressersedit/{hairdressers}', 'HairdressersController@edit');

//施術記録を「更新」する処理（処理はコントローラー内のメソッドで定義）
Route::post('hairdressers/update', 'HairdressersController@update');

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
