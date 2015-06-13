<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=eagri', 'root', 'rabbit');
	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
?>
<?php
	$logu = $_POST["mail"];
	$logp = $_POST["password"];
	$check = $bdd->query("SELECT * FROM user WHERE mail ='".$logu."'");
	$donnees = $check->fetch();
	if ($donnees['password'] == $logp && $logu != NULL && $logp != NULL)
	{
			session_start();
			$_SESSION['mail'] = $logu;
			$_SESSION['login'] = $donnees['login'];
			$_SESSION['logged'] = true;
			header("Location: ../dashboard.php");
	}
	else
	{
			header("Location: ../index.php");
	}
?>
