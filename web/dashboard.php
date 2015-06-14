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
<div class="col-md-12"><h2>Bonjour, <strong><?php echo $_SESSION['login']; ?></strong></h2></div>



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

<div class="col-md-10 col-md-offset-1 showparce">
    <br>
    <?php
    $owner = $_SESSION['login'];
    $request = $bdd->query("SELECT * FROM parcelle WHERE owner ='".$owner."'");
    foreach ($request as $show)
    {
        echo "<form method='POST' action='./user_parcelle.php?parcelle=".$show['name']."'><button type='submit' id='jjj' class='btn btn-default'>".$show['name']."</button></form>";
    }
    ?>
    <br>
    <br>
</div>

<div class="col-md-6 col-md-offset-3 showtemp">
    <?php
    include('../lib/forecast.io.php');

    $api_key = 'e779d40307caf2f42aa37625a35e9db9';

    $latitude = '48.471';
    $longitude = '0.996399';
    $units = 'auto';  // Can be set to 'us', 'si', 'ca', 'uk' or 'auto' (see forecast.io API); default is auto
    $lang = 'fr'; // Can be set to 'en', 'de', 'pl', 'es', 'fr', 'it', 'tet' or 'x-pig-latin' (see forecast.io API); default is 'en'

    $forecast = new ForecastIO($api_key, $units, $lang);

    // all default will be
    // $forecast = new ForecastIO($api_key);


    /*
     * GET CURRENT CONDITIONS
     */
    $condition = $forecast->getCurrentConditions($latitude, $longitude);
    echo '<pre>';
    echo 'Current temperature: '.$condition->getTemperature(). "\n";


    /*
     * GET HOURLY CONDITIONS FOR TODAY
     */
    $conditions_today = $forecast->getForecastToday($latitude, $longitude);

    echo "\n\nTodays temperature:\n";

    foreach($conditions_today as $cond) {

        echo $cond->getTime('H:i:s') . ': ' . $cond->getTemperature(). "\n";

    }

    /*
     * GET DAILY CONDITIONS FOR NEXT 7 DAYS
     */
    $conditions_week = $forecast->getForecastWeek($latitude, $longitude);

    echo "\n\nConditions this week:\n";

    foreach($conditions_week as $conditions) {

        echo $conditions->getTime('Y-m-d') . ': ' . $conditions->getMaxTemperature() . "\n";

    }

    /*
     * GET HISTORICAL CONDITIONS
     */
    $condition = $forecast->getHistoricalConditions($latitude, $longitude, '2010-10-10T14:00:00-0700');

    echo "\n\nTemperatur 2010-10-10: ". $condition->getMaxTemperature(). "\n";
    ?>
</div>
<div class="footer col-md-12"></div>
</body>
</html>
