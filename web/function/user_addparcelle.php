<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=eagri', 'root', 'rabbit');
	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
?>
<?php
	if (isset($_POST['name']))
	{
		session_start();
		$value = $_POST['name'];
		$owner = $_SESSION['login'];

		$signreq = $bdd->prepare("INSERT INTO parcelle (name, owner) VALUES (?, ?)");
		$signreq->bindParam(1, $value);
		$signreq->bindParam(2, $owner);
		$signreq->execute();

		header("Location: ../dashboard.php");
	}
	else
	{
		echo "Erreur lors de la connection";
	}
?>
