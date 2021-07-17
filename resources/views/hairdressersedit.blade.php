@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
        <form action="{{ url('hairdressers/update') }}" method="POST">
            <!-- hair_title -->
            <div class="form-group">
                <label for="hair_title">今日のテーマ名</label>
                <input type="text" name="hair_title" class="form-control" value="{{$hairdresser->hair_title}}">
            </div>
            <!--/ hair_title -->
            <!-- hair_talk -->
            <div class="form-group">
                <label for="hair_talk">話したこと</label>
                <textarea name="hair_talk" rows="10" cols="30" class="form-control">{{$hairdresser->hair_talk}}</textarea>
            </div>
            <!--/ hair_talk -->
            <!-- img_url -->
            <div class="form-group">
                <label for="img_url">画像</label>
                <input type="file" name="img_url" value="{{$hairdresser->img_url}}">
            </div>
            <!--/ img_url -->
            <!-- arrivedate -->
            <div class="form-group">
                <label for="arrivedate">施術記録日</label>
                <input type="date" name="arrivedate" class="form-control" value="{{$hairdresser->arrivedate}}">
            </div>
            <!--/ arrivedate -->
            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">変更を保存する</button>
                <a class="btn btn-link pull-right" href="{{ url('/hairrecords') }}"> 戻る</a>
            </div>
            <!--/ Save ボタン/Back ボタン -->
            <!-- id 値を送信 -->
            <input type="hidden" name="id" value="{{$hairdresser->id}}" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->
        </form>
    </div>
</div>
@endsection