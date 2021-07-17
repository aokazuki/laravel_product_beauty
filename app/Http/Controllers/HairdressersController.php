<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//使用するclassを個別に宣言
use App\Hairdresser; //Hairdresserモデルを使用する
use Validator; //バリデーションを有効にする
use Auth; //認証モデルを使用する
use Session; //Session機能を利用する

class HairdressersController extends Controller
{
    //認証チェック
    public function __construct()
    {
        $this->middleware('auth');
    }

    //施術記録を「更新」する処理
    public function update(Request $request){
        //バリデーション
        $validator = Validator::make($request->all(), [
        'id' => 'required',
        'hair_title' => 'required|max:20',
        'hair_talk' => 'required|max:200',
        'arrivedate' => 'required'
        ]);
        //バリデーション:エラー 
        if ($validator->fails()) {
        return redirect('/hairdressersedit')
        ->withInput()
        ->withErrors($validator);
        }
    
        //画像アップロード処理
        $file = $request->file('img_url'); //file取得
        if( !empty($file) ){ //file名が空かどうかのチェック
            $filename = $file->getClientOriginalName(); //ファイル名を取得
            $move = $file->move('../upload/', $filename); //ファイルを移動
        }else{
            $filename ="";
        }

        //データ更新処理(Eloquent モデル)
        $hairdressers = Hairdresser::where('user_id', Auth::user()->id)->find($request->id);
        $hairdressers->hair_title = $request->hair_title;
        $hairdressers->hair_talk = $request->hair_talk;
        $hairdressers->img_url = $filename;
        $hairdressers->arrivedate = $request->arrivedate;
        $hairdressers->save(); 
        return redirect('/hairrecords')->with('editmessage', '施術記録を更新しました');
    }
    //ここまでが「更新」する処理

    //施術記録を「更新する画面を表示」する処理
    public function edit($hairdresser_id){
        $hairdressers = Hairdresser::where('user_id', Auth::user()->id)->find($hairdresser_id);
        return view('hairdressersedit', [
            'hairdresser' => $hairdressers
            ]);
    }
    //ここまでが「更新する画面を表示」する処理

    //施術記録を「削除」する処理
    public function delete(Hairdresser $hairdresser){
        $hairdresser->delete();
        return redirect('/hairrecords')->with('deletemessage', '施術記録を削除しました');
    }
    //ここまでが「削除」する処理


    //施術記録を「追加」する処理
    public function store(Request $request){
        //バリデーション
        $validator = Validator::make($request->all(), [
        'hair_title' => 'required|max:20',
        'hair_talk' => 'required|max:200',
        'arrivedate' => 'required'
        ]);
        //バリデーション:エラー 
        if ($validator->fails()) {
        return redirect('/')
        ->withInput()
        ->withErrors($validator);
        }

        //画像アップロード処理
        $file = $request->file('img_url'); //file取得
        if( !empty($file) ){ //file名が空かどうかのチェック
            $ext = $file->guessExtension(); //ファイルの拡張子取得
            $filename = $file->getClientOriginalName(); //ファイル名を取得
            $target_path = public_path('/upload/'); //public/uploadフォルダを作成
            $file->move($target_path,$filename); //ファイルをpublic/uploadフォルダに移動
            // $move = $file->move('../upload/', $filename); //ファイルを移動
        }else{
            $filename ="";
        }

        //以下に登録処理を記述（Eloquentモデル）
        $hairdressers = new Hairdresser;
        $hairdressers->user_id = Auth::user()->id;
        $hairdressers->hair_title = $request->hair_title;
        $hairdressers->hair_talk = $request->hair_talk;
        $hairdressers->img_url = $filename;
        $hairdressers->arrivedate = $request->arrivedate;
        $hairdressers->save(); 
        return redirect('/hairrecords')->with('addmessage', '施術記録を作成しました');
    }
    //ここまでが「追加」する処理


    //施術記録を「追加する画面を表示」する処理
    public function add(){
        return view('hairdressers');
    }
    //ここまでが「追加する画面を表示」する処理


    //施術記録を「一覧表示する画面を表示」する処理
    public function index(){
        $hairdressers = Hairdresser::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')->get();

        return view('hairrecords', [
            'hairdressers' => $hairdressers
        ]);
    }
    //ここまでが「一覧表示する画面を表示」する処理
}
