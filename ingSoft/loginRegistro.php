<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="es">
<head>
  <title>login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style type="text/css">
  
body{
  background-image: url(https://images8.alphacoders.com/687/687394.png);
}







</style>



</head>
<body>

<!-- if you want to create login page and register page together in one page ...you have to only chnage his name...that's it...                 -->
<div class="container" style="margin-top: 5%;">
  <div class="row">
    <div class="col-sm-4"> </div>
<div class="col-md-4">
  
<h1 class="text-center text-success">Login / Registro</h1>
<br/>

<div class="col-sm-12">

  <ul class="nav nav-pills" >
    <li class="" style="width:50%"><a class="btn btn-lg btn-default" data-toggle="tab" href="#home">Login</a></li>
    <li class=" " style="width:48%"><a class=" btn btn-lg btn-default" data-toggle="tab" href="#menu1">Registro</a></li>
  </ul>

<br/>


  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      
<form action="#" method="POST">


  
  <div class="form-group">
    <label for="email">Correo Electronico:</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>

  <div class="form-group">
    <label for="pwd">Constraseña:</label>
    <input type="password" class="form-control" id="pwd" name ="pwd">
  </div>
  <p>
    <?php
      if (isset($malCorreo)) {
        echo $malCorreo;
      }
    ?>
  </p>




  <button type="submit" class="btn btn-default">Ingresar</button>
  <button type="submit" class=" pull-right btn-link"><a href="www.google.com">Olvidaste tu contraseña?</a></button>

</form>
<br/>



    </div>

    <div id="menu1" class="tab-pane fade">

<form action="registro.php" method="POST">

  <div class="form-group">
    <label for="UserName">Nombre de Usuario:</label>
    <input type="text" class="form-control" id="UserName" name="UserName" required>
  </div>
  
  <div class="form-group">
    <label for="email">Correo electronico:</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>

  <div class="form-group">
    <label for="pwd">Contraseña:</label>
    <input type="password" class="form-control" id="pwd" name="pwd" required>
  </div>

  <button type="submit" class="btn btn-default">Registrar</button>

  <button type="submit" class=" pull-right btn-link btn-long"><a href="www.google.com">Olvidaste tu contraseña?</a></button>

</form>
<br/>



    



    </div>
   </div>
  </div>
</div>
</div>
<!-- This design is created by manoj chauhan  -->
</body>
</html>









