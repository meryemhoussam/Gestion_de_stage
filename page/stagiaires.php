<?php
    require_once('identifier.php');
    
    require_once("connexiondb.php");
  
    $nomPrenom=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
    $idfiliere=isset($_GET['idfiliere'])?$_GET['idfiliere']:0;
    $nomEncadrant=isset($_GET['nomEncadrant'])?$_GET['nomEncadrant']:"";
    $sujet=isset($_POST['sujet'])?$_POST['sujet']:"";
    $services=isset($_POST['services'])?$_POST['services']:"";
    
    $size=isset($_GET['size'])?$_GET['size']:5;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    $requeteFiliere="select * from filiere";

    if($idfiliere==0){
        $requeteStagiaire="select  idStagiaire,nom,prenom,nomFiliere,civilite,nomEncadrant,sujet,Services,photo
                from filiere as f,stagiaire as s
                where f.idFiliere=s.idFiliere
                and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                order by idStagiaire
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countS from stagiaire
                where nom like '%$nomPrenom%' or prenom like '%$nomPrenom%'";
    }else{
         $requeteStagiaire="select idStagiaire,nom,prenom,nomFiliere,civilite,nomEncadrant,sujet,Services,photo
                from filiere as f,stagiaire as s
                where f.idFiliere=s.idFiliere
                and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                and f.idFiliere=$idfiliere
                 order by idStagiaire
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countS from stagiaire
                where (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                and idFiliere=$idfiliere";
    }

    $resultatFiliere=$pdo->query($requeteFiliere);
    $resultatStagiaire=$pdo->query($requeteStagiaire);
    $resultatCount=$pdo->query($requeteCount);

    $tabCount=$resultatCount->fetch(PDO::FETCH_ASSOC);
    $nbrStagiaire=$tabCount['countS'];
    $reste=$nbrStagiaire % $size;   
    if($reste===0) 
        $nbrPage=$nbrStagiaire/$size;   
    else
        $nbrPage=floor($nbrStagiaire/$size)+1;  
?>
E HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des stagiaires</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/mystyle.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css.map">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap">
    </head>
    <body>
        <?php require("menu.php"); ?>
        
        <div class="container">
            <div class="panel panel-primary ">
            
				<div class="panel-heading">Rechercher des stagiaires</div>
				
				<div class="panel-body">
					<form method="get" action="stagiaires.php" class="form-inline">
						<div class="form-group">
						
                            <input type="text" name="nomPrenom" 
                                   placeholder="Nom et prénom"
                                   class="form-control"
                                   value="<?php echo $nomPrenom ?>"/>
                        </div>
                            <label for="idfiliere">Filière:</label>
                            
				            <select name="idfiliere" class="form-control" id="idfiliere"
                                    onchange="this.form.submit()">
                                    
                                    <option value=0>Toutes les filières</option>
                                    
                                <?php while ($filiere=$resultatFiliere->fetch()) { ?>
                                
                                    <option value="<?php echo $filiere['idFiliere'] ?>"
                                    
                                        <?php if($filiere['idFiliere']===$idfiliere) echo "selected" ?>>
                                        
                                        <?php echo $filiere['nomFiliere'] ?> 
                                        
                                    </option>
                                    
                                <?php } ?>
                                
				            </select>
				            
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
                        
                        &nbsp;&nbsp;
                         <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                         
                            <a href="nouveauStagiaire.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                Nouveau Stagiaire
                                
                            </a>
                            
                         <?php }?>
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Stagiaires (<?php echo $nbrStagiaire ?> Stagiaires)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>Id Stagiaire</th> <th>Nom</th> <th>Prénom</th> <th>NomEncadrant</th> 
                                <th>Sujet</th><th>Services</th><th>Photo</th> <th>Filière</th>
                                <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                	<th>Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($stagiaire=$resultatStagiaire->fetch()){ ?>
                                <tr>
                                    <td><?php echo $stagiaire['idStagiaire'] ?> </td>
                                    <td><?php echo $stagiaire['nom'] ?> </td>
                                    <td><?php echo $stagiaire['prenom'] ?> </td> 
                                    <td><?php echo $stagiaire['nomEncadrant'] ?> </td> 
                                    <td><?php echo $stagiaire['sujet'] ?> </td> 
                                    <td><?php echo $stagiaire['Services'] ?> </td> 
                                    
                                    <td>
                                        <img src="../images/<?php echo $stagiaire['photo']?>"
                                        width="50px" height="50px" class="img-circle">
                                    </td>
                                    <td><?php echo $stagiaire['nomFiliere'] ?> </td> 
                                    
                                     <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                        <td>
                                        <button class="btn btn-success"><a href="editerStagiaire.php?idS=<?php echo $stagiaire['idStagiaire'] ?>"  class="text-light" >Editer</a></button>
                                            &nbsp;
                                            <button class="btn btn-danger" ><a onclick="return confirm('Etes vous sur de vouloir supprimer la filière')"
                                            href="supprimerStagiaire.php?idS=<?php echo $stagiaire['idStagiaire'] ?>">Supprimer</a></button>

                                            
                                        </td>
                                    <?php }?>
                                    
                                 </tr>
                             <?php } ?>
                        </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="stagiaires.php?page=<?php echo $i;?>&nomPrenom=<?php echo $nomPrenom ?>&idfiliere=<?php echo $idfiliere ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </body>
</HTML>