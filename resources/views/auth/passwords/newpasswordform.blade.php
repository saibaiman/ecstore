

@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">New Password</div>

					<div class="panel-body">
						@empty($word)
						<form class="form-horizontal" method="POST" action="{{ route('password.passrevision') }}">
							{{ csrf_field() }}

							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label for="password" class="col-md-4 control-label">Password</label>

								<div class="col-md-6">
									<input id="password" type="password" class="form-control" name="password" required>
									<input  type="hidden"  name="hash" value="{{ $id }}">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
									新規パスワードに設定
									</button>
								</div>
							</div>
						</form>
						@else
							{{ $word }}
							<a href="{{ route('login') }}">ログイン画面に戻る</a>
						@endempty
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
