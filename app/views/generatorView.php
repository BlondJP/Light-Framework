<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
	<title>Créer votre module ici !</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<br><br><br>


<div class="row">
  <div class="col-md-6 col-md-offset-3">.

<h1>Créer votre module ici !</h1>
<br>
<form method='POST' action='http://localhost/light/index.php/terminatorTreatForm' class="form-inline">
  <div class="form-group">
    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
    <div class="input-group">
      <div class="input-group-addon">Nom du Module: </div>
      <input type="text" class="form-control" id="nomModule" name="nomModule" placeholder="DragonBallModule">
      <div class="input-group-addon">.php</div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Créer</button>
</form>

  </div>
</div>

</body>
</html>
