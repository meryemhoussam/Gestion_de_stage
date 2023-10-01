<?php
    require_once('identifier.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>jQuery sc025</title>
<!-- nettuts -->
<!-- traduit et adapté par outils-web.com -->
<!-- chargement des feuilles de style -->
<link rel="stylesheet" href="../css/styly.css" type="text/css" media="screen" />
<!-- chargement des scripts -->   
<script type="text/javascript" src="../js/jquery.js" ></script> 
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js//jquery.spasticNav.js"></script>   
</head>
<body bg-color="#CCCCCC" style="height:1500px" >
<!-- Emplacement du menu -->    
<div id="container">
<nav class="navbar navbar-inverse navbar-fixed-top">
  <ul id="nav">
    <li id="selected"><a href="../index.php" class="navbar-brand">Gestion des stagiaires</a></li>
    <li><a href="stagiaires.php">Les Stagiaires</a></li>
    <li><a href="filiere.php"> Les Filières</a></li>
    <?php if ($_SESSION['user']['role']=='ADMIN') {?>
    <li><a href="Utilisateurs.php">Les utilisteurs</a></li>
    <?php }?>
	</ul>
	<ul id="mi">
	
	<ul class="nav navbar-nav navbar-right">
					
			<li>
				<a href="editerUtilisateur.php?id=<?php echo $_SESSION['user']['iduser'] ?>">
                   
					<?php echo  ' '.$_SESSION['user']['login']?>
				</a> 
			</li>
			<li>
				<a href="sedeconecter.php" >
                    
				 Se déconnecter
				</a>
			</li>
							
		</ul>
	</ul>
  
</div>
<!-- Initialisation de la fonction -->    
<script type="text/javascript">
$('#nav').spasticNav();
</script>
</nav>  
</body>
</html>






















<!-- 
<nav class="navbar navbar-inverse navbar-fixed-top">

	<div class="container-fluid">
	
		<div class="navbar-header">
		
			<a href="../index.php" class="navbar-brand">Gestion des stagiaires</a>
			
		</div>
		
		<ul class="nav navbar-nav">
					
			<li><a href="stagiaires.php">
                    
                    &nbsp Les Stagiaires
                </a>
            </li>
			
			<li><a href="filiere.php">
                   
                    &nbsp Les Filières
                </a>
            </li>
			
			<?php if ($_SESSION['user']['role']=='ADMIN') {?>
					
				<li><a href="Utilisateurs.php">
                        
                        &nbsp Les utilisteurs
                    </a>
                </li>
				
			<?php }?>
			
		</ul>
		
		
		<ul class="nav navbar-nav navbar-right">
					
			<li>
				<a href="editerUtilisateur.php?id=<?php echo $_SESSION['user']['iduser'] ?>">
                   
					<?php echo  ' '.$_SESSION['user']['login']?>
				</a> 
			</li>
			
			<li>
				<a href="sedeconecter.php">
                    
					&nbsp Se déconnecter
				</a>
			</li>
							
		</ul>
		
	</div>
</nav> -->