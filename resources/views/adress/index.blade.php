
@extends('layouts.app')
<!DOCTYPE html>
<html lang="ja">
<head>
<title>Delivery_Adress_Info/Index</title>
<meta charset="utf-8">
</head>
@section('content')
<body>
<div class="container">
<div class="row">
<div class="col-xs-12 col-lg-12">
<h3 style="text-align" class="text-center">お届け先一覧</h3>
@if (!isset($Adress_Info[0]))
<strong>{{'登録がありません、登録をお願いします'}}</strong>
<br>
@else
@foreach ($Adress_Info as $adress)
<table class="table table-borderd table-hover" border="3">
<thead bgcolor="#CCDE87">
<tr>
<th></th>
<th class="text-center">name</th>
<th class="text-center">zipcode</th>
<th class="text-center">prefecture</th>
<th class="text-center">city</th>
<th class="text-center">detail-adress</th>
<th class="text-center">tel</th>
<th class="text-center">編集</th>
<th class="text-center">削除</th>
</tr>
</thead>
<tbody>
<tr>
<td class="text-center">
<form action="" method="post">
<input type="checkbox" name="select">
</form>
</td>
<td class="text-center">{{$adress->name}}</td>
<td class="text-center">{{$adress->zipcode}}</td>
<td class="text-center">{{$adress->prefecture}}</td>
<td class="text-center">{{$adress->city}}</td>
<td class="text-center">{{$adress->detail_adress}}</td>
<td class="text-center">{{$adress->tel}}</td>
<td class="text-center">
<a class="btn btn-primary" href="{{ route('adress.editForm', [$adress->id]) }}">編集</a>
</td>
<td class="text-center">
<a class="btn btn-primary" href="{{ route('adress.deleteForm', [$adress->id]) }}">削除</a>
</td>
</tr>
</tbody>
</table>
@endforeach
@endif
<div class="text-right">
<a class="btn btn-primary" href="{{ route('adress.registerForm') }}">新規お届け先登録</a>
<a class="btn btn-success" href="{{ route('cart.index') }}">カートに戻る</a>
</div>
</div>
</div>
</div>
@endsection
</body>
</html>



