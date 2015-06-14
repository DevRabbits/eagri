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
            <a class="navbar-brand" href="#">Eagri</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="./dashboard.php">Mes Parcelles</a></li>
                <li><a href="#">Mon Cheptel</a></li>
                <li><a href="#">Mes Experiences</a></li>
                <li><a href="#">Mes Stocks</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Profil de <?php echo $_SESSION['login'];?>
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
<div class="col-md-10 col-md-offset-1"><h2>Exploitation <strong><?php echo $_SESSION['login']; ?></strong></h2></div>
<br></br>
<br></br>
<div class="grey col-md-10 col-md-offset-1"></div>
<a href="./user_parcelle.php?parcelle=Parcelle2"><img class="cadastre col-md-10 col-md-offset-1" src="../img/Cadastre.png"></a>


<!--
<div class="col-md-6 col-md-offset-3" id="ttt">

    <div class="col-md-3 col-md-offset-4">
        <br>
        <br>
        <div class="ee"><h4><strong>Ajouter une Parcelle</strong></h4></div>

        <form id="addParcelle" style="margin:auto;text-align:center;" class="form-inline" role="form" method="POST" action="./function/user_addparcelle.php">
            <div class="form-group">
                <label for="name">Nom Parcelle :</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <button type="submit" class="btn btn-default">Ajouter</button>
        </form>
        <br></br>
    </div>

    <div class="col-md-4">
        <div class="ee">
        <br>
        <br>
        <a href="#"><img id="imageParcelle" src="../img/+.png" /></a>
        <br>
        <br>
        <br>
            </div>
    </div>
<div class="col-md-3"></div>
</div>
-->

<div class="col-md-10 col-md-offset-1 showparce">
    <br>
    <?php
    $owner = $_SESSION['login'];
    $request = $bdd->query("SELECT * FROM parcelle WHERE owner ='".$owner."'");
    //foreach ($request as $show)
    {
        echo "<form method='POST' action='./user_parcelle.php?parcelle=".$show['name']."'><button type='submit' id='jjj' class='btn btn-default'>".$show['name']."</button></form>";
    }
    ?>
    <br>
    <br>
</div>
</body>
</html>
