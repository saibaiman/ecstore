

@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">mypage edit</div>

					<div class="panel-body">
						<!-- フラッシュメッセージ -->
						@if (session('flash_message'))
						<div class="flash_message">
							{{ session('flash_message') }}
						</div>
						@endif

						@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
								</ul>
							</div>
						@endif

						@isset ($email, $password)
						<form class="form-horizontal" method="POST" action="{{ route('mypage.edit') }}">
							{{ csrf_field() }}

							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label for="name" class="col-md-4 control-label">Name</label>
								<div class="col-md-6">
									<input id="name" type="text" class="form-control" name="name" value="{{ $name }}" required>
								</div>
								<label for="email" class="col-md-4 control-label">Mail-Adress</label>
								<div class="col-md-6">
									<input id="email" type="text" class="form-control" name="email" value="{{ $email }}" required>
								</div>
								<label for="password" class="col-md-4 control-label">Password</label>
								<div class="col-md-6">
									<input id="password" type="text" class="form-control" name="password" required>
								</div>
								<label for="password" class="col-md-4 control-label">New-Password</label>
								<div class="col-md-6">
									<input id="password" type="text" class="form-control" name="newpass">
								</div>
								<label for="password" class="col-md-4 control-label">Confirm-Password</label>
								<div class="col-md-6">
									<input id="password" type="text" class="form-control" name="newpass_confirmation">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										変更する
									</button>
								</div>
							</div>
						</form>
						@else
						<form class="form-horizontal" method="POST" action="{{ route('mypage.update') }}">
							{{ csrf_field() }}
							<label for="name" class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input id="name" type="text" class="form-control" name="name" value="{{ $name }}" required>
							</div>

							<label for="email" class="col-md-4 control-label">Mail</label>
							<div class="col-md-6">
								<input id="email" type="text" class="form-control" name="email" required>
							</div>

							<label for="password" class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input id="password" type="text" class="form-control" name="password" required>
							</div>

							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									追加登録
								</button>
							</div>
						</form>
						@endisset
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection





