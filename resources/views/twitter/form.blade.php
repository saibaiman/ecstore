
@extends('layouts.app')

@section('content')

<div class="container">
<div class="panel panel-default">
<div class="text-center">
<div class="panel-heading">
<h3>Tweet 検索</h3>
</div>
<div class="panel-body">
<form method="get" action="{{ route('twitter.searchResult') }}">
<div class="form-group">
<input class="form-control" type="text" placeholder="検索ワードを記入してください" name="search">
</div>
<input class="btn btn-primary" type="submit" value="検索">
</div>
</form>
</div>
</div>
</div>
</div>
@endsection




