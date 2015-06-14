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
                <li class="active"><a href="#">Mes Parcelles</a></li>
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
<h3 id="parce"><a href="./user_parcelle.php?parcelle=<?php echo $_GET['parcelle'];?>"><?php echo $_GET['parcelle'] . "</a> > " . $_GET['experience'];?></h3>

<br>

<div class="col-md-12">
    <div class="col-md-7">
        <img src="../img/arton51844.jpg" style="width: 102.8%; height: 100%" />
    </div>

    <div class="col-md-5">
        <div class="border" id="scrollWindow">
            <div class="titreParcelle">
                Expérience en cours: <strong><?php echo $_GET['experience']; ?></strong>
            </div>


            <div class="col-md-12" id="ccc">

                <div class="col-md-7 col-md-offset-1">
                    <br>
                    <br>
                    <h4><strong>Ajouter une Tâche</strong></h4>
                </div>

                <div class="col-md-4">
                    <br>
                    <br>
                    <a href="#"><img id="imageTask" src="../img/+.png" /></a>
                    <br>
                    <br>
                    <br>
                </div>

            </div>

            <br>
            <br>
            <div class="from">
                <form id="addTask" style="margin:auto;text-align:center;" class="form-inline" role="form" method="POST" action="./function/user_addtask.php?parcelle=<?php echo $_GET['parcelle'];?>&experience=<?php echo $_GET['experience'];?>">
                    <div class="form-group">
                        <label for="name">Nom de la tache :</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="date">Date :</label>
                        <input type="text" class="form-control" id="date" name="date">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="resume">Description :</label>
                        <input type="text" class="form-control" id="resume" name="resume">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-default">Ajouter</button>
                </form>
            </div>
            <div class="col-md-12" id="aaa">
                <div id="gg">
                    <?php
                    $experience = $_GET['experience'];
                    $request = $bdd->query("SELECT * FROM task WHERE experience ='".$experience."'");
                    foreach ($request as $show)
                    {
                        echo "<div id='dd'>". "<h3>" . $show['name']."</h3></p>".$show['date']."</p><br><strong><p>".$show['resume'] . "</p></strong>" . '<img src="../img/plante1.png"/><img src="../img/plante2.png"/><img src="../img/plante3.png"/>'  . "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
