
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
					{{ $word }}
                </div>
					<a href="{{ route('login') }}">login form に戻る</a>
			</div>
        </div>
    </div>
</div>
@endsection
