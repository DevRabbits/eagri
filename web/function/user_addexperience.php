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
		$parcelle = $_GET['parcelle'];

		$signreq = $bdd->prepare("INSERT INTO experience (name, parcelle) VALUES (?, ?)");
		$signreq->bindParam(1, $value);
		$signreq->bindParam(2, $parcelle);
		$signreq->execute();

		header("Location: ../user_parcelle.php?parcelle=".$parcelle);
	}
	else
	{
		echo "Erreur lors de la connection";
	}
?>
