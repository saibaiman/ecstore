
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

<h3 style="text-align" class="text-center">新商品追加</h3>
<div class="panel panel-default">
<div class="panel-body">


<form action="{{ route('admin.add_post') }}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}


<div class="form-group text-center">
<label for="name">NAME</label>
<input type="text" name="name" class="name form-control text-center">
</div>
<div class="custom-file form-group text-center">
<label for="img">IMAGE</label>
<input type="file" name="img" class="custom-file-input text-center" id="customFile" access="images/*" >
</div>

<div class="form-group text-center">
<label for="info">INFOMATION</label>
<textarea name="info" cols="50" rows="5" class="info form-control text-center"></textarea>

<!--<input type="text" name="info" class="info form-control text-center">-->
</div>

<div class="form-group text-center">
<label for="info">PRICE</label>
<input type="text" name="price" class="info form-control text-center">
</div>

<div class="form-group text-center">
<label for="stocks">STOCKS</label>
<input type="text" name="stocks" class="stocks form-control text-center">
</div>

<div class="text-center">
<input type="submit" value="登録する" class="btn btn-primary">
</form>

<a href="{{route('admin.home')}}" class="btn btn-success">戻る</a>
</div>
</div>
</div>

@endsection



