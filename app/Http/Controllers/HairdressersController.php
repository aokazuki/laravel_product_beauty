<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//使用するclassを個別に宣言
use App\Hairdresser; //Hairdresserモデルを使用する
use Validator; //バリデーションを有効にする
use Auth; //認証モデルを使用する

class HairdressersController extends Controller
{
    //施術記録を「更新」する処理
    public function update(Request $request){
        //バリデーション
        $validator = Validator::make($request->all(), [
        'id' => 'required',
        'hair_title' => 'required|max:20',
        'arrivedate' => 'required'
        ]);
        //バリデーション:エラー 
        if ($validator->fails()) {
        return redirect('/hairdressersedit')
        ->withInput()
        ->withErrors($validator);
        }
    
        //データ更新処理
        // Eloquent モデル
        $hairdressers = Hairdresser::find($request->id);
        $hairdressers->hair_title = $request->hair_title;
        $hairdressers->arrivedate = $request->arrivedate;
        $hairdressers->save(); 
        return redirect('/hairrecords');
    }
    //ここまでが「更新」する処理

    //施術記録を「更新する画面を表示」する処理
    public function edit(Hairdresser $hairdressers){
        return view('hairdressersedit', ['hairdresser' => $hairdressers]);
    }
    //ここまでが「更新する画面を表示」する処理

    //施術記録を「削除」する処理
    public function delete(Hairdresser $hairdresser){
        $hairdresser->delete();
        return redirect('/hairrecords');
    }
    //ここまでが「削除」する処理


    //施術記録を「追加」する処理
    public function store(Request $request){
        //バリデーション
        $validator = Validator::make($request->all(), [
        'hair_title' => 'required|max:20',
        'arrivedate' => 'required'
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
        $hairdressers->arrivedate = $request->arrivedate;
        $hairdressers->save(); 
        return redirect('/');
    }
    //ここまでが「追加」する処理


    //施術記録を「追加する画面を表示」する処理
    public function add(){
        return view('hairdressers');
    }
    //ここまでが「追加する画面を表示」する処理


    //施術記録を「一覧表示する画面を表示」する処理
    public function index(){
        $hairdressers = Hairdresser::orderBy('created_at', 'asc')->get();
        return view('hairrecords', [
            'hairdressers' => $hairdressers
        ]);
    }
    //ここまでが「一覧表示する画面を表示」する処理
}
