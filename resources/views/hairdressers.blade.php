<!-- resources/views/hairdressers.blade.php -->
@extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
         <div class="card-title">
             今日のテーマ名
         </div>
         <!-- バリデーションエラーの表示に使用-->
     	@include('common.errors')
         <!-- バリデーションエラーの表示に使用-->
         <!-- 施術記録の登録フォーム -->
         <form action="{{ url('hairdressers') }}" method="POST" class="form-horizontal">
             {{ csrf_field() }}
             <!-- 施術記録のタイトル -->
             <div class="form-group">
                 <div class="col-sm-6">
                     <!--バリデーションが失敗したら直前の入力値をフラッシュデータから再表示-->
                     <input type="text" name="hair_title" class="form-control" value="{{ old('hair_title')}}">
                 </div>
             </div>
             <!-- 施術記録 登録ボタン -->
             <div class="form-group">
                 <div class="col-sm-offset-3 col-sm-6">
                     <button type="submit" class="btn btn-primary">
                         保存する
                     </button>
                 </div>
             </div>
         </form>
         <a href="{{ url('/hairrecords') }}">施術記録一覧へ</a>
     </div>
 @endsection