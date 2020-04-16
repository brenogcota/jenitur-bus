<!DOCTYPE html>
<html>
<head>
	<title>show</title>

	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}">
	<link href="{{asset('/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,900&display=swap')}}" rel="stylesheet">

</head>
<body>

	@if ($passenger)
		@foreach($passenger as $p)
	        <p>{{ $p->NOME }}</p>
			<p>{{ $p->DATANASC }}</p>
			<hr>
		@endforeach
	@endif
	
</body>
</html>