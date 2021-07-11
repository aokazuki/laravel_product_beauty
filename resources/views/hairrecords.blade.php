<!-- resources/views/hairrecords.blade.php -->
@extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
        <!-- hairdresser: 既に登録されてる施術記録のリスト -->
        @if (count($hairdressers) > 0)
         <div class="card-body">
             <div class="card-body">
                 <table class="table table-striped task-table">
                     <!-- テーブルヘッダ -->
                     <thead>
                         <th>記録一覧</th>
                         <th>&nbsp;</th>
                     </thead>
                     <!-- テーブル本体 -->
                     <tbody>
                         @foreach ($hairdressers as $hairdresser)
                             <tr>
                                 <!-- 施術記録タイトル -->
                                 <td class="table-text">
                                     <div>{{ $hairdresser->hair_title }}</div>
                                 </td>
 			        <!-- 施術記録: 削除ボタン -->
                                 <td>
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
             <a href="{{ url('/') }}">施術記録を作成する</a>
         </div>		
    @endif
 @endsection