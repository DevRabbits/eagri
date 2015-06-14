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

<h3 id="parce"><?php echo $_SESSION['login']; ?> > <?php echo $_GET['parcelle'];?></h3>
<br>

<div class="col-md-12">
    <div class="col-md-7">
        <img src="../img/arton51844.jpg" style="width: 102.8%; height: 100%" />
    </div>

    <div class="col-md-5">
        <div class="border" id="scrollWindow">
            <div class="titreParcelle">
                Parcelle en cours: <strong><?php echo $_GET['parcelle']; ?></strong>
            </div>


            <div class="col-md-12" id="aaa">

                <div class="col-md-6 col-md-offset-1">
                    <br>
                    <br>
                    <h4><strong>Ajouter une Experience</strong></h4>
                </div>

                <div class="col-md-4">
                    <br>
                    <br>
                    <a href="#"><img id="image" src="../img/+.png" /></a>
                    <br>
                    <br>
                    <br>
                </div>

            </div>


            <div class="from">
                <form id="addExperience" style="margin:auto;text-align:center;" class="form-inline" role="form" method="POST" action="./function/user_addexperience.php?parcelle=<?php echo $_GET['parcelle']?>">
                    <div class="form-group">
                        <br>
                        <br>
                        <label for="name">Nom de l'Expérience: </label>
                        <input type="text" class="form-control" id="name" name="name">
                        <input type="submit" value="Ajouter" />
                    </div>
                </form>
            </div>
            <div class="col-md-12" id="aaa">
                <div id="gg">
                    <?php
                    $parcelle = $_GET['parcelle'];
                    $request = $bdd->query("SELECT * FROM experience WHERE parcelle ='".$parcelle."'");
                    foreach ($request as $show)
                    {
                        echo "<form method='POST' action='./user_experience.php?parcelle=".$parcelle."&experience=".$show['name']."'><button type='submit' name=".$show['name']." class='btn btn-default'>".$show['name']."</button></form>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
