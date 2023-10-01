<?php 
 require_once('identifier.php');
require_once('connexiondb.php');
    $requeteF="select * from filiere";
    $resultatF=$pdo->query($requeteF);

?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Nouveau stagiaire</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/mystyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Les informations du nouveau stagiaire :</div>
                <div class="panel-body">
                    <form method="post" action="insertstagiaire.php" class="form"  enctype="multipart/form-data">
						
                        <div class="form-group">
                             <label for="nom">Nom :</label>
                            <input type="text" name="nom" placeholder="Nom" class="form-control" >
                        </div>
                        <div class="form-group">
                             <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom" placeholder="Prénom" class="form-control"
                                  />
                        </div>
                        <div class="form-group">
                             <label for="nomEncadrant">NomEncadrant :</label>
                            <input type="text" name="nomEncadrant" placeholder="NomEncadrant" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="civilite">Civilité :</label>
                            <div class="radio">
                                <label><input type="radio" name="civilite" value="F"
                                    checked/> F </label><br>
                                <label><input type="radio" name="civilite" value="M"
                                    /> M </label>
                            </div>
                        </div>
                        <div class="form-group">
                             <label for="sujet">Sujet :</label>
                            <input type="text" name="sujet" placeholder="Sujet" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="idFiliere">Filière:</label>
				            <select name="idFiliere" class="form-control" id="idFiliere">
                              <?php while($filiere=$resultatF->fetch()) { ?>
                                <option value="<?php echo $filiere['idFiliere'] ?>"> 
                                    <?php echo $filiere['nomFiliere'] ?>
                                </option>
                              <?php }?>
				            </select>
                        </div>
                        <div class="form-group">
                             <label for="Services">Services :</label>
                            
                            <select name="Services" class="form-control">
                                <option value =Serviceinformatique >Services informatique</option>
                                <option value =ServicesRessourcesHumaines >Services Ressources Humaines</option>
                                <option value =ServiceFinancierEtComptable >Services Financier et Comptable</option>
                                <option value =Servicecomerciales >Services Comercial</option>
                                <option value =ServiceEtudeEtProgramation >Services Etude et Programation</option>
                              </select>
                            </div>
                        <div class="form-group">
                             <label for="photo">Photo :</label>
                            <input type="file" name="photo" />
                        </div>

				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button> 
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
</HTML>