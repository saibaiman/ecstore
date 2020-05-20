
@extends('layouts.app_admin')
<!DOCTYPE html>
<html lang="ja">
<head>
<title>member/detail</title>
<meta charset="utf-8">
</head>
<body>
@section('content')
<div class="container">
<div class="row">
<div class="col-xs-12 col-lg-12">
<h3 style="text-align" class="text-center">会員詳細</h3>
<div class="panel panel-default">
<div class="panel-body">
<table class="table table-borderd table-hover" border="3">
<thead bgcolor="#CCDE87">
<tr>
<th class="text-center">name</th>
<th class="text-center">email</th>
</tr>
</thead>
<tbody>
<tr>
<td class="text-center">{{$user->name}}</td>
@empty ($user->email)
<td class="text-center">{{"メールアドレスが登録されていません"}}</td>
@else
<td class="text-center">{{$user->email}}</td>
@endempty
</tr>
</tbody>
</table>
@if (!isset($adress[0]))
<table class="table table-borderd table-hover" border="3">
<thead bgcolor="#CCDE87">
<tr>
<th class="text-center">adress</th>
</tr>
</thead>
<tbody>
<tr>
<td class="text-center">{{"住所が登録されていません"}}</td>
</tr>
</tbody>
</table>
@else
<table class="table table-borderd table-hover" border="3">
<thead bgcolor="#CCDE87">
<tr>
<th class="text-center">zipcode</th>
<th class="text-center">prefecture</th>
<th class="text-center">city</th>
<th class="text-center">detail_adress</th>
</tr>
</thead>
<tbody>
@foreach ($adress as $user_adress)
<tr>
<td class="text-center">{{$user_adress->zipcode}}</td>
<td class="text-center">{{$user_adress->prefecture}}</td>
<td class="text-center">{{$user_adress->city}}</td>
<td class="text-center">{{$user_adress->detail_adress}}</td>
</tr>
@endforeach
</tbody>
</table>
@endif
<div class="text-center">
<a href="{{ route('admin.member_index') }}" class="btn btn-success">
return
</a>
</div>
</div>
</div>
</div>
@endsection
</body>
</html>






