@extends('layouts.app')
@section('content')

<div class="wrapper">

<h2>株式会社シンクワン</h2>
<h1>社内報</h1>
<br>

<form method="post">
    {{ csrf_field() }}
	<label for="password">Pass</label>
	<input type="password" name="password" style="width:150px;">
	<br><br>
	<button type="submit">Enter</button>
</form>

</div>

@endsection
