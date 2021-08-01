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
            <form enctype="multipart/form-data" action="{{ url('hairdressers/update') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-sm-6">
                        <!--バリデーションが失敗したら直前の入力値をフラッシュデータから再表示-->
                        <input type="text" name="hair_title" class="form-control" value="{{$hairdresser->hair_title}}">
                    </div>
                </div>

             <!-- 施術記録日 -->
             <div class="card-title">
                施術記録日
             </div>
             <div class="form-group">
                 <div class="col-sm-6">
                     <!--バリデーションが失敗したら直前の入力値をフラッシュデータから再表示-->
                     <input type="date" name="arrivedate" class="form-control" value="{{$hairdresser->arrivedate}}">
                 </div>
             </div>

             <!-- 施術時の会話内容 -->
             <div class="card-title">
                話したこと
             </div>
             <div class="form-group">
                 <div class="col-sm-6">
                     <!--バリデーションが失敗したら直前の入力値をフラッシュデータから再表示-->
                     <textarea name="hair_talk" rows="10" cols="30" class="form-control">{{$hairdresser->hair_talk}}</textarea>
                 </div>
             </div>

             <!-- ハッシュタグ -->
             <div class="card-title">
                ハッシュタグ
             </div>
             <div class="form-group">
                <div class="col-sm-6">
                    <!--バリデーションが失敗したら直前の入力値をフラッシュデータから再表示-->
                    <input type="text" name="hair_tag" class="form-control" value="{{$hairdresser->hair_tag}}">
                </div>
            </div>

             <!-- 画像登録 -->
             <div class="form-group">
                <div class="col-sm-6">
                <label>画像1</label>
                <input type="file" name="img_url">
                <img src="../storage/{{ $hairdresser->img_url }}" width="300">
                <!--<input id="fileUploader" type="file" name="img_url" accept='image/' enctype="multipart/form-data" multiple="multiple" required autofocus>-->
                <!--<input type="file" name="img_url">-->
                </div>
             </div>
             <div class="form-group">
                <div class="col-sm-6">
                <label>画像2</label>
                <input type="file" name="img_url2">
                <img src="../storage/{{ $hairdresser->img_url2 }}" width="300">
                </div>
             </div>
             <div class="form-group">
                <div class="col-sm-6">
                <label>画像3</label>
                <input type="file" name="img_url3">
                <img src="../storage/{{ $hairdresser->img_url3 }}" width="300">
                </div>
             </div>
             <div class="form-group">
                <div class="col-sm-6">
                <label>動画</label>
                <input type="file" name="hair_movie">
                <video controls playsinline width="300px" height="200px">
                    <source src="../storage/{{ $hairdresser->hair_movie }}">
                </video>
                </div>
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
                        変更を保存する
                     </button>
                     <a class="btn btn-link pull-right" href="{{ url('/hairrecords') }}"> 戻る</a>
                 </div>
             </div>
             <input type="hidden" name="id" value="{{$hairdresser->id}}" /> <!--/ id 値を送信 -->
         </form>
     </div>
@endsection