@extends('layouts.app')
<!DOCTYPE html>
<html lang="ja">
<head>
<title>Item/Index</title>
<meta charset="utf-8">
</head>
<body>
@section('content')
<div class="container">
<div class="row">
<div class="col-xs-12 col-lg-12">
<h3 style="text-align" class="text-center">商品一覧</h3>
<table class="table table-borderd table-hover" border="3">
<thead bgcolor="#CCDE87">
<tr>
<th class="text-center">name</th>
<th class="text-center">price</th>
<th class="text-center">stocks</th>
</tr>
</thead>
<tbody>
@foreach ($items as $item)
<tr>
<td class="text-center"><a href="{{route('item.detail', ['id' => $item->id])}}">{{$item->name}}</a></td>
<td class="text-center">{{$item->price}}</td>
<td class="text-center">
@if ($item->stocks <= 0)
{{'在庫なし'}}
@else
{{$item->stocks}}
@endif
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection
</body>
</html>

