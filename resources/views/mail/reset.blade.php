
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
				<div class="panel-heading">
					下記のリンクをクリックして、メールアドレスを変更してください。
						<br>
					<a href="{{route('mypage.authorize',[$token])}}">クリックして認証完了</a>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection





