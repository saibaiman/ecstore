
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
<h3 style="text-align" class="text-center">届け先変更フォーム</h3>
@foreach ($Adress_Info as $adress)
<form action="{{ route('adress.edit', [$adress->id]) }}" method="post">
{{csrf_field()}}
<div class="form-group row">
<label for="inputZIP" class="col-lg-4 col-form-label">zipcode</label>
<div class="col-lg-8">
<input type="text" name="zipcode" class="form-control" id="inputZIP" value="{{$adress->zipcode}}">
</div>
</div>
@if ($errors->has('zipcode'))
{{ $errors->first('zipcode') }}
@endif

<div class="form-group row">
<label for="inputPrefecture" class="col-lg-4 col-form-label">prefecture</label>
<div class="col-lg-8">
<select name="prefecture" id=inputPrefecture" class="form-control">
@foreach($prefs as $prefecture)
@if ($prefecture == $adress->prefecture)
<option value="{{ $prefecture }}" selected>{{ $prefecture }}</option>
@else
<option value="{{ $prefecture }}">{{ $prefecture }}</option>
@endif
@endforeach
</select>
</div>
</div>
@if ($errors->has('prefecture'))
{{ $errors->first('prefecture') }}
@endif

<div class="form-group row">
<label for="inputCity" class="col-lg-4">city</label>
<div class="col-lg-8">
<input type="text" name="city" id="inputCity" class="form-control" value="{{$adress->city}}">
</div>
@if ($errors->has('city'))
{{ $errors->first('city') }}
@endif
</div>

<div class="form-group row">
<label for="inputDetailAdress" class="col-lg-4">detail-adress</label>
<div class="col-lg-8">
<input type="text" name="detail_adress" class="form-control" value="{{$adress->detail_adress}}">
</div>
@if ($errors->has('detail_adress'))
{{ $errors->first('detail_adress') }}
@endif
</div>

<div class="form-group row">
<label for="inputTEL" class="col-lg-4">TEL</label>
<div class="col-lg-8">
<input type="text" name="tel" class="form-control" value="{{$adress->tel}}">
</div>
@if ($errors->has('tel'))
{{ $errors->first('tel') }}
@endif
</div>

<div class="text-right">
<input type="submit" value="変更する" class="btn btn-primary">
</form>
<a href="{{ route('adress.index') }}" class="btn btn-primary">住所一覧へ戻る</a>
</div>
</div>
</div>
</div>
@endforeach
@endsection
</body>
</html>







