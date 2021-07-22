<!-- resources/views/hairdressers.blade.php -->
@extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
        
        <!-- 施術記録のタイトル -->
         <div class="card-title">
             今日のテーマ名
         </div>
         <!-- バリデーションエラーの表示に使用-->
     	@include('common.errors')
         <!-- バリデーションエラーの表示に使用-->
            <!-- 施術記録の登録フォーム -->
            <form enctype="multipart/form-data" action="{{ url('hairdressers') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-sm-6">
                        <!--バリデーションが失敗したら直前の入力値をフラッシュデータから再表示-->
                        <input type="text" name="hair_title" class="form-control" value="{{ old('hair_title')}}">
                    </div>
                </div>

             <!-- 施術記録日 -->
             <div class="card-title">
                施術記録日
             </div>
             <div class="form-group">
                 <div class="col-sm-6">
                     <!--バリデーションが失敗したら直前の入力値をフラッシュデータから再表示-->
                     <input type="date" name="arrivedate" class="form-control" value="{{ old('arrivedate')}}">
                 </div>
             </div>

             <!-- 施術時の会話内容 -->
             <div class="card-title">
                話したこと
             </div>
             <div class="form-group">
                 <div class="col-sm-6">
                     <!--バリデーションが失敗したら直前の入力値をフラッシュデータから再表示-->
                     <textarea name="hair_talk" rows="10" cols="30" class="form-control" value="{{ old('hair_talk')}}"></textarea>
                 </div>
             </div>

             <!-- 画像登録 -->
             <div class="col-sm-6">
              <label>画像1</label>
              <input type="file" name="img_url">
              <!--<input id="fileUploader" type="file" name="img_url" accept='image/' enctype="multipart/form-data" multiple="multiple" required autofocus>-->
              <!--<input type="file" name="img_url">-->
             </div>
             <div class="col-sm-6">
              <label>画像2</label>
              <input type="file" name="img_url2">
             </div>
             <div class="col-sm-6">
              <label>画像3</label>
              <input type="file" name="img_url3">
             </div>
            <!--
             <div class="form-group">
                <input id="fileUploader" type="file" name="img" accept='image/' enctype="multipart/form-data" multiple="multiple" required autofocus>
             </div>
             -->


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