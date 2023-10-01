<?php
     require_once('identifier.php');
    require_once('connexiondb.php');
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
    $nomEncadrant=isset($_POST['nomEncadrant'])?$_POST['nomEncadrant']:"";
    $civilite=isset($_POST['civilite'])?$_POST['civilite']:"F";
    $sujet=isset($_POST['sujet'])?$_POST['sujet']:"";
    $idFiliere=isset($_POST['idFiliere'])?$_POST['idFiliere']:1;
    $Services=isset($_POST['Services'])?$_POST['Services']:"";
    $nomPhoto=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
    $imageTemp=$_FILES['photo']['tmp_name'];
    move_uploaded_file($imageTemp,"../images/".$nomPhoto);
    $requete="insert into stagiaire(nom,prenom,,nomEncadrant,civilite,sujet,idFiliere,Services,photo) values(?,?,?,?,?,?,?,?)";
    $params=array($nom,$prenom,$nomEncadrant,$civilite,$sujet,$idFiliere,$Services,$nomPhoto);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:stagiaires.php');

?>