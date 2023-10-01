<?php
session_start();
if (isset($_SESSION['erreurLogin']))
    $erreurLogin = $_SESSION['erreurLogin'];
else {
    $erreurLogin = "";
}
session_destroy();
?>
  <!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Se connecter </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="../css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="box-form">
  <div class="left">
    <div class="overlay">
    <h1>Gestion Stagiaires.</h1>
    <h1>APP WEB</h1>
    
    </div>
  </div>
  
  
    <div class="right">

  <form method="post" action="seconnecter.php" class="form">
  
       
  <?php if (!empty($erreurLogin)) { ?>
                    <div class="alert alert-danger">
                    <?php echo $erreurLogin ?>
                    </div>
                <?php } ?> 
    <h5>Login</h5>
  
    <div class="inputs">
      <input type="text" name="login" placeholder="Nom d'utilisateur "
                           class="form-control" autocomplete="off"/>
      <br>
      <input type="password" name="pwd"
        placeholder="Mot de passe" class="form-control"/>
    </div>
      
      <br><br>
      
    <div class="remember-me--forget-password">
        <!-- Angular -->
 
      <a href="nouvelUtilisateur.php">Créer un compte         
      </a>
      
       <a href="Initialiserpwd.php" class="link">Mot de passe oublié</a> 
&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
&nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
&nbsp;&nbsp; &nbsp;&nbsp; 
    </div>
      
      <br>
      <button class="container" type="submit" >Se connecter</button>
  </div>

  </form>
</div>
<!-- partial -->
  
</body>
</html>

