<?php
  require_once('identifier.php');
    require_once('connexiondb.php');

    $iduser=isset($_GET['iduser'])?$_GET['iduser']:0;

    $requeteUser="select * from utilisateur where idUser=$iduser " ;

    $resultatUser=$pdo->query($requeteUser);
    $user=$resultatUser->fetch(PDO::FETCH_ASSOC);  
    if (isset($_POST['login']))
    $login = $_POST['login'];
else
    $login = "";
    if (isset($_POST['email']))
    $email = $_POST['email'];
else
    $email = "";
   
    if (isset($_POST['role']))
    $role = $_POST['role'];
else
    $role = "";
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'un utilisateur</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/mystyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Edition de l'utilisateur :</div>
                <div class="panel-body">
                    <form method="post" action="updateutilisateur.php" class="form">
						<div class="form-group">
                           <!-- <label for="id">id user:</label>-->
                            <input type="hidden" name="iduser" class="form-control" value="<?php echo $id ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nom">Login :</label>
                            <input type="text" name="login" placeholder="Login" class="form-control" value="<?php echo $login ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">Email :</label>
                            <input type="email" name="email" placeholder="email" class="form-control"
                                   value="<?php echo  $email ?>"/>
                        </div>
                        <div class="form-group">
                            <select name="role" class="form-control">
                                <option value="ADMIN" <?php if($role="ADMIN") echo "selected" ?>>ADMINISTRATEUR</option>
                                <option value="VISITEUR" <?php if($role="VISITEUR") echo "selected" ?>>VISITEUR</option>
</select>
</div>
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button>

                        <a href="editPwd.php">Changer le mot de passe</a>
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
</HTML>