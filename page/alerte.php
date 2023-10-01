<?php
     require_once('identifier.php');
    require_once('connexiondb.php');
    
    $message=isset($_GET['message'])?$_GET['message']:"Erreur";
    
  
    
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Alerte</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/mystyle.css">
    </head>
    <body>
        <?php include("menu.php");?>
        <div class="container margetop60">
          <div class="panel panel-danger ">
            <div class = panel-body>
                <h3><? php echo $message ?><h3>
                    <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Routour</a>
</div>
</div>
</div>         
    </body>
</HTML>