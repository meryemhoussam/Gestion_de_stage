<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idS=isset($_POST['idS'])?$_POST['idS']:0;
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
    $civilite=isset($_POST['civilite'])?$_POST['civilite']:"F";
    $nomEncadrant=isset($_POST['nomEncadrant'])?$_POST['nomEncadrant']:"";
    $sujet=isset($_POST['sujet'])?$_POST['sujet']:"";
    $Services=isset($_POST['Services'])?$_POST['Services']:"";
   

    $nomPhoto=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
    $imageTemp=$_FILES['photo']['tmp_name'];
    move_uploaded_file($imageTemp,"../images/".$nomPhoto);
    $idFiliere=isset($_POST['idFiliere'])?$_POST['idFiliere']:1;

    echo $nomPhoto ."<br>";
    echo $imageTemp;
    if(!empty($nomPhoto)){
        $requete="update stagiaire set nom=?,prenom=?,civilite=?,nomEncadrant=?,sujet=?,Services=?,photo=?,idFiliere=? where idStagiaire=?";
        $params=array($nom,$prenom,$civilite,$nomEncadrant,$sujet,$Services,$nomPhoto,$idFiliere,$idS);
    }else{
        $requete="update stagiaire set nom=?,prenom=?,civilite=?,nomEncadrant=?,sujet=?,Services=?,idFiliere=? where idStagiaire=?";
        $params=array($nom,$prenom,$civilite,$nomEncadrant,$sujet,$Services,$idFiliere,$idS);
    }

    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:stagiaires.php');

?>