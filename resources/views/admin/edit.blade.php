@extends('layouts.app_admin')

@section('content')

@if ($errors->any())
<div class="alert alert-danger mt-3">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<h3 style="text-align" class="text-center">商品情報編集</h3>
<div class="panel panel-default">
<div class="panel-body">


<form action="{{ route('admin.edit_post') }}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}

<input type="hidden" name="id" value="{{ $form->id }}">

<div class="form-group text-center">
<label for="name">NAME</label>
<input type="text" name="name" class="name form-control text-center" value="{{ $form->name }} ">
</div>
<div class="custom-file form-group">
<div class="text-center">
<label for="img">IMAGE FILE</label>
</div>
@isset ($form->items_img)
<input type="checkbox" name="delete"  value="delete">削除する
<img src="{{ asset('/storage/items/' . $form->items_img) }}" width="300" heigth="200">
@else
{{ '登録されていません' }}
@endisset
<input type="file" name="img" class="custom-file-input text-center" id="customFile" access="images/*" >
</div>

<div class="form-group text-center">
<label for="info">INFOMATION</label>
<input type="text" name="info" class="info form-control text-center" value="{{ $form->info }} ">
</div>

<div class="form-group text-center">
<label for="info">PRICE</label>
<input type="text" name="price" class="info form-control text-center" value="{{ $form->price }}">
</div>

<div class="form-group text-center">
<label for="stocks">STOCKS</label>
<input type="text" name="stocks" class="stocks form-control text-center" value="{{ $form->stocks }} ">
</div>

<div class="text-center">
<input type="submit" value="登録する" class="btn btn-primary">
</form>

<a href="{{route('admin.detail', ['id' => $form->id])}}" class="btn btn-success">戻る</a>
</div>
</div>
</div>

@endsection



