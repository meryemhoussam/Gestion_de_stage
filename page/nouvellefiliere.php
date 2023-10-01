<?php require_once('identifier.php');
?>
<!doctype html>
<HTML>
 <HEAD>
    <meta charest="utf-8">
  <ti>Nouvelle filiére </ti>
  <link rel ="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel ="stylesheet" type="text/css" href="../css/mystyle.css">
 </HEAD>
<BODY>
  <?php include("menu.php");?>
  <div class ="container">
   
    <div class ="panel panel-primary  margetop60">
        <div class="panel-heading">Veuillez saisir les données de la nouvelle filiére </div>
        <div class="panel-body">
					<form method="post" action="insertfiliere.php" class="form">
					
                    <div class="form-group">
                    <label for="niveau">Nom de la filiére  :</label>
                        <input type="text" name="nomF" 
                               placeholder="Nom de la filière"
                               class="form-control"/>
                               
                               
                    </div>
                    <div class="form-group">
                    <label for="niveau">Niveau:</label>
                    <select name="niveau" class="form-control" id="niveau">
                        <option value="q"   >Qualification</option>
                        <option value="t"  >Technicien</option>
                        <option value="ts" >Technicien Spécialisé</option>
                        <option value="l" selected >Licence</option>
                        <option value="m"   >Master</option> 
                    </select>
</div>
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span>
                        Enregistrer 
</button>
                        
                                  
                     
                </form>
        </div>
    </div>
    </BODY>
</HTML>  