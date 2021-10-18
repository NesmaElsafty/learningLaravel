<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Native Auth</title>
</head>
<body>

	@if(isset($data['id']))

	<p {{ $data['success'] }} ? style="color:green;" : ''; >
		{{ $data['success'] }}
	</p>
	
	<form method="get" action="{{ route('logoutRoute') }}">
	  @csrf
	  <button type="submit" class="registerbtn">Logout</button>
	</form>

	<h1>welcome, {{$data['name']}}</h1>
	@else

	<h1>You have to log in First</h1>

	<form method="get" action="{{ route('loginRoute') }}">
	  @csrf
	  <button type="submit" class="registerbtn">login</button>
	</form>

	@endif
</body>
</html>