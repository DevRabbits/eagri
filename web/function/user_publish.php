<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=eagri', 'root', 'rabbit');
	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
?>
<?php
	session_start();
	$value1 = $_GET['experience'];

	$signreq = $bdd->prepare("UPDATE experience SET publish='1' WHERE name='".$value1."'");
	$signreq->execute();

	header("Location: ../myexp.php");
?>
