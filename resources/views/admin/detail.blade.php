
@extends('layouts.app_admin')
<!DOCTYPE html>
<html lang="ja">
<head>
<title>admin/detail</title>
<meta charset="utf-8">
</head>
<body>
@section('content')
<h3 style="text-align" class="text-center">商品詳細</h3>
<div class="panel panel-default">
<div class="panel-body">
<table class="table table-borderd table-hover" border="3">
<thead bgcolor="#CCDE87">
<tr>
<th class="text-center">name</th>
<th class="text-center">image</th>
<th class="text-center">info</th>
<th class="text-center">price</th>
<th class="text-center">stocks</th>
</tr>
</thead>
<tbody>
<tr>
<td class="text-center">{{$item->name}}</td>
<td class="text-center">
@isset ($item->items_img)
<img src="{{ asset('/storage/items/' . $item->items_img) }}" width="200" heigth="150">
@else
{{ '登録されていません' }}
@endisset
</td>
<td class="text-center">{{$item->info}}</td>
<td class="text-center">{{$item->price}}</td>
<td class="text-center">
@if ($item->stocks <= 0)
{{'在庫なし'}}
@else
{{$item->stocks}}
@endif
</td>
</tr>
</tbody>
</table>
<div class="text-center">
<a class="btn btn-success" href="{{route('admin.edit', ['id' => $item->id])}}">編集する</a>
<a class="btn btn-primary" href="{{route('admin.home')}}">戻る</a>
</div>
</div>
</div>
@endsection
</body>
</html>




