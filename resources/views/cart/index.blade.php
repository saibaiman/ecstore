@extends('layouts.app')
@section('content')
@if (count($data) == 0)
<p>Your cart is currently empty</p>
@else
<div class="container">
<div class="row">
<div class="col-xs-12 col-lg-12">
<table class="table table-hover table-borderd" border="9">
<thead>
<tr>
<th class="text-center">Name</th>
<th class="text-center">Quantity</th>
<th class="text-center">Price</th>
<th class="text-center">Remove</th>
</tr>
</thead>
<tbody>
@foreach ($data as $item)
<tr>
<td class="text-center">{{$item->item->name}}</td>
<td class="text-center">{{$item->qty}}</td>
<td class="text-center">${{$item->price}}</td>
<td class="text-center"><a href="{{route('cart.remove', ['id' => $item->id])}}">x</a></td>
</tr>
@endforeach
</tbody>
</table>
<div class="text-right">
<strong>{{'TotalPrice:'}} {{$total_sum}}</strong>
@endif
<a class="btn btn-primary" href="{{ route('adress.index') }}">お届け先選択</a>
<a href="{{route('item.index')}}" class="btn btn-success">{{'return'}}</a>
</div>
</div>
</div>
</div>
@endsection







