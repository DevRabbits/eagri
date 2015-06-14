<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="../script/bootstrap.js"></script>
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/bootstrap.min.js"></script>
    <script type="text/javascript" src="../script/script.js"></script>
    <meta charset="utf-8">
    <title>Eagri - Accueil</title>
</head>
<body>
<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=eagri', 'root', 'rabbit');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
<?php session_start();?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <strong><a style="color:black;" class="navbar-brand" href="#">Carnet 47</a></strong>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a style="color:#000000;" href="./dashboard.php">Parcelles</a></li>
                <li><a style="color:black;"href="#">Cheptel</a></li>
                <li style="background-color:#74DF00;"><a style="color:#FFFFFF;" href="./myexp.php">Experiences</a></li>
                <li><a style="color:black;" href="#">Materiel</a></li>
                <li><a style="color:black;" href="#">Partenaires</a></li>
                <li><a style="color:black;"href="#">Stocks</a></li>
            </ul>
<form class="navbar-form navbar-left" action="./search.php" role="search" >
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Rechercher une experience...">
        </div>
        <button type="submit" class="btn btn-default">GO</button>
      </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a style="background-color:black;color:#FFFFFF;" class="dropdown-toggle" data-toggle="dropdown" href="#"> Profil de <?php echo $_SESSION['login'];?>
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="./function/user_disconnect.php"> Se deconnecter</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
<div class="col-md-10 col-md-offset-1"><h2><strong><?php echo $_SESSION['login']; ?> > Recherche</strong></h2></div>
<br></br>
<br></br>
<div class="search col-md-10 col-md-offset-1">
	<img src="../img/search.jpg">
</div>
</body>
</html>
