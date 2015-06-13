<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=eagri', 'root', 'rabbit');
	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
?>
<?php
	if (isset($_POST['name']) && isset($_POST['date']) && isset($_POST['resume']))
	{
		session_start();
		$value1 = $_POST['name'];
		$value2 = $_POST['date'];
		$value3 = $_POST['resume'];
		$value4 = $_GET['experience'];
		$value5 = $_GET['parcelle'];

		$signreq = $bdd->prepare("INSERT INTO task (name, date, resume, experience) VALUES (?, ?, ?, ?)");
		$signreq->bindParam(1, $value1);
		$signreq->bindParam(2, $value2);
		$signreq->bindParam(3, $value3);
		$signreq->bindParam(4, $value4);
		$signreq->execute();

		header("Location: ../user_experience.php?parcelle=".$value5."&experience=".$value4);
	}
	else
	{
		echo "Erreur lors de la connection";
	}
?>
