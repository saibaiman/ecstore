

@extends('layouts.app')
<!DOCTYPE html>
<html lang="ja">
<head>
<title>Delivery_Adress_Info/delete</title>
<meta charset="utf-8">
</head>
@section('content')
<body>
<div class="container">
<div class="row">
<div class="col-xs-12 col-lg-12">
<h3 style="text-align" class="text-center">削除一覧</h3>
<table class="table table-borderd table-hover" border="3">
<thead bgcolor="#CCDE87">
<tr>
<th class="text-center">name</th>
<th class="text-center">zipcode</th>
<th class="text-center">prefecture</th>
<th class="text-center">city</th>
<th class="text-center">detail-adress</th>
<th class="text-center">tel</th>
</tr>
</thead>
@foreach ($Adress_Info as $adress)
<tbody>
<tr>
<td class="text-center">{{$adress->name}}</td>
<td class="text-center">{{$adress->zipcode}}</td>
<td class="text-center">{{$adress->prefecture}}</td>
<td class="text-center">{{$adress->city}}</td>
<td class="text-center">{{$adress->detail_adress}}</td>
<td class="text-center">{{$adress->tel}}</td>
</tr>
</tbody>
</table>
<form action="{{ route('adress.delete', [$adress->id]) }}" method="post">
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ $adress->id }}">
<div class="text-right">
<input type="submit" value="削除する" class="btn btn-success">
</form>
@endforeach
<a href="{{ route('adress.index') }}" class="btn btn-primary">住所一覧へ戻る</a>
</div>
</div>
</div>
</div>
@endsection
</body>
</html>







