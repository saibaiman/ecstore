@extends('layouts.app')

@section('content')

<div class="container">
<div class="panel panel-default">
<div class="text-center">
<div class="panel-heading">
<h3>Tweet 検索結果 </h3>
</div>
</div>
<div class="panel-body">
{{-- コントローラーで取得した$resultをforeachで回す --}}
@foreach ($result as $tweet)
<h5 class="d-inline mr-3"><strong>{{ $tweet->user->name }}</strong></h5>
<h6 class="d-inline text-secondary">{{ date('Y/m/d', strtotime($tweet->created_at)) }}</h6>
<p class="mt-3 mb-0">{{ $tweet->text }}</p>
<p>==================================================================================================================================================================================</p>
@endforeach
<div class="text-center">
<a href="{{ route('twitter.form') }}" class="btn btn-primary">戻る</a>
</div>
</div>
</div>
@endsection

