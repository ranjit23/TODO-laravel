<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css" />
</head>
<body>
	<div class="container">
	@foreach ($projects as $project)
		<li class="subtitle"><a href="/projects/{{$project->id}}">{{$project->title}} </a></li>
	@endforeach
	</div>
</body>
</html>