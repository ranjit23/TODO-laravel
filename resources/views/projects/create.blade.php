<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css" />

</head>
<body>
<div class="container">
  <div class="box" style="margin-top: 10%;">
    <p class="title">CREATE PROJECT</p>

	<form method="POST" action="/projects">
		{{csrf_field()}}
	<div class="field">
  <label class="label">Title</label>
  <div class="control">
    <input class="input" type="text" placeholder="Text input" name = "title">
  </div>
  <div class="field">
  <label class="label">Description</label>
  <div class="control">
    <input name="description" class="input" type="text" placeholder="Text input">
  </div>
  <div class="control">
  <button class="button is-primary" type="Submit" style="margin-top: 20px;">Submit</button>
</div>
</div>
</div>
</form>
</body>
</html>