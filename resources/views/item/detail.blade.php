@extends('layouts.app')
<!DOCTYPE html>
<html lang="ja">
<head>
<title>Item/detail</title>
<meta charset="utf-8">
</head>
<body>
@section('content')
<div class="container">
<div class="row">
<div class="col-xs-12 col-lg-12">
<table class="table table-borderd" border="1" style="height: 100px">
<thead bgcolor="#CCDE87">
<tr>
<th class="text-center">name</th>
<th class="text-center">info</th>
<th class="text-center">price</th>
<th class="text-center">stocks</th>
</tr>
</thead>
<tr>
<td class="text-center">{{$item->name}}</td>
<td class="text-center">{{$item->info}}</td>
<td class="text-center">{{$item->price}}</td>
<td class="text-center">
@if ($item->stocks <= 0)
{{'在庫なし'}}
@else
{{'在庫あり'}}
@endif
@if (Auth::guest())
<form action="{{ route('home') }}" method="get">
<button>
ログインしてください
</button>
</form>
@else
@if ($item->stocks > 0)
<form class="form-inline" action="{{ url('/cart/store')}}" method="POST">
{{csrf_field()}}
<input class="form-control" type="number" min=1 name="item_num">
<button class="btn btn-primary" type="submit" name="cart">
cartに追加する
</button>
<input type="hidden" name="item_id" value='{{$item->id}}'>
</form>
@else
<br>
{{'～在庫がないためカートに追加できません～'}}
@endif
@endif
</td>
</tr>
</table>
@if (session('message'))
<div class='message'>
{{session('message')}}
</div>
@endif
<div class="text-right">
<a href="{{route('item.index')}}" class="btn btn-success">{{'return'}}</a>
</div>

</div>
</div>
</div>
@endsection
</body>
</html>
