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

//publicフォルダで/homeを呼び出した時の初期画面を、indexファイルに定義している。
Route::get('/home', 'HomeController@index')->name('home');

// 美容師の新しい「施術記録」の追加を行う画面へのルート定義(hairdressers.blade.php)
//http://firstdev.sakura.ne.jp/beauty/ にアクセスした際の表示ページになる。
Route::get('/', function () {
    // $hairdressers = Hairdresser::orderBy('created_at', 'asc')->get();
    //  return view('hairdressers', [
    //      'hairdressers' => $hairdressers
    //  ]);
     return view('hairdressers');
});

//美容師の記録を一覧表示する個別画面へのルート定義(hairrecords.blade.php)
Route::get('/hairrecords', function () {
    $hairdressers = Hairdresser::orderBy('created_at', 'asc')->get();
    return view('hairrecords', [
        'hairdressers' => $hairdressers
    ]);
    // return view('hairrecords');
});

// 新しい「施術記録」を行う追加処理をhairdressers.blade.phpに実装するルート定義
Route::post('/hairdressers', function (Request $request) {

    //バリデーション
    $validator = Validator::make($request->all(), [
    'hair_title' => 'required|max:20',
    ]);
    //バリデーション:エラー 
    if ($validator->fails()) {
    return redirect('/')
    ->withInput()
    ->withErrors($validator);
    }

    //以下に登録処理を記述（Eloquentモデル）
    // Eloquent モデル
    $hairdressers = new Hairdresser;
    $hairdressers->hair_title = $request->hair_title;
    $hairdressers->arrivedate = '2021-07-10 00:00:00';
    $hairdressers->save(); 
    return redirect('/');
});

// 施術記録を削除
Route::delete('/hairdresser/{hairdresser}', function (Hairdresser $hairdresser) {
    //
});

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
