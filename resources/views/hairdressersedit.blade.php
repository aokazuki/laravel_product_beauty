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