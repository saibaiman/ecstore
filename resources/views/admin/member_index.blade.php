
@extends('layouts.app_admin')
<!DOCTYPE html>
<html lang="ja">
<head>
<title>member/Index</title>
<meta charset="utf-8">
</head>
<body>
@section('content')
<div class="container">
<div class="row">
<div class="col-xs-12 col-lg-12">
<h3 style="text-align" class="text-center">会員一覧</h3>
<div class="panel panel-default">
<div class="panel-body">
<table class="table table-borderd table-hover" border="3">
<thead bgcolor="#CCDE87">
<tr>
<th class="text-center">name</th>
</tr>
</thead>
<tbody>
@foreach ($users as $user)
<tr>
<td class="text-center"><a href="{{route('admin.member_detail', ['id' => $user->id])}}">{{$user->name}}</a></td>
</tr>
@endforeach
</tbody>
</table>
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





