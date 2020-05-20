

@extends('layouts.app')
<!DOCTYPE html>
<html lang="ja">
<head>
<title>Delivery_Adress_Info/register</title>
<meta charset="utf-8">
</head>
<body>
@section('content')
<div class="container">
<div class="row">
<div class="col-xs-12 col-lg-12">
<h3 style="text-align" class="text-center">新規お届け先フォーム</h3>
<br>
<!--フォーム作成-->
<form action="{{route('adress.register')}}" method="POST">
<div class="form-group row">
{{csrf_field()}}
<label for="inputZIP" class="col-lg-4 col-form-label">zipcode</label>
<div class="col-lg-8">
<input type="number" name="zipcode" class="form-control" id="inputZIP">
</div>
</div>
@if ($errors->has('zipcode'))
{{ $errors->first('zipcode') }}
@endif
<!--prefecture-->
<div class="form-group row">
<label for="inputPrefecture" class="col-lg-4 col-form-label">prefecture</label>
<div class="col-lg-8">
<select name="prefecture" id=inputPrefecture" class="form-control">
@foreach($prefs as $prefecture)
<option value="{{ $prefecture }}">{{ $prefecture }}</option>
@endforeach
</select>
</div>
</div>
@if ($errors->has('prefecture'))
{{ $errors->first('prefecture') }}
@endif
<!--city-->
<div class="form-group row">
<label for="inputCity" class="col-lg-4">city</label>
<div class="col-lg-8">
<input type="text" name="city" id="inputCity" class="form-control">
</div>
</div>
@if ($errors->has('city'))
{{ $errors->first('city') }}
@endif
<!--detail-adress-->
<div class="form-group row">
<label for="inputDetailAdress" class="col-lg-4">detail-adress</label>
<div class="col-lg-8">
<input type="text" name="detail_adress" class="form-control">
@if ($errors->has('detail_adress'))
{{ $errors->first('detail_adress') }}
@endif
</div>
</div>
<!--TEL-->
<div class="form-group row">
<label for="inputTEL" class="col-lg-4">TEL</label>
<div class="col-lg-8">
<input type="number" name="tel" class="form-control">
@if ($errors->has('tel'))
{{ $errors->first('tel') }}
@endif
</div>
</div>
<div class="text-right">
<input type="submit" value="登録する" class="btn btn-primary">
</form>

<a href="{{ route('adress.index') }}" class="btn btn-success">住所一覧へ戻る</a>
</div>
@endsection
</div>
</div>
</div>
</div>
</body>
</html>



