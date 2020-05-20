
@extends('layouts.app_admin')
<!DOCTYPE html>
<html lang="ja">
<head>
<title>Item/Index</title>
<meta charset="utf-8">
</head>
<body>
@section('content')
<h3 style="text-align" class="text-center">商品一覧</h3>
<div class="panel panel-default">
<div class="panel-body">
<table class="table table-borderd table-hover" border="3">
<thead bgcolor="#CCDE87">
<tr>
<th class="text-center">name</th>
<th class="text-center">price</th>
<th class="text-center">stocks</th>
</tr>
</thead>
@foreach ($items as $item)
<tr>
<td class="text-center"><a href="{{route('admin.detail', ['id' => $item->id])}}">{{$item->name}}</a></td>
<td class="text-center">{{$item->price}}</td>
<td class="text-center">
@if ($item->stocks == 0)
{{'在庫なし'}}
@else
{{$item->stocks}}
@endif
</td>
</tr>
@endforeach
</table>
<div class="text-center">
<a href="{{route('admin.add')}}" class="btn btn-primary">商品を追加する</a>
</div>
</div>
</div>
@endsection
</body>
</html>

