<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=eagri', 'root', 'rabbit');
	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
?>
<?php
	if (isset($_POST['mail']) && isset($_POST['login']) && isset($_POST['password']) && isset($_POST['passwordval']) && $_POST['password'] == $_POST['passwordval'])
	{
		$value1 = $_POST['mail'];
		$value2 = $_POST['login'];
		$value3 = $_POST['password'];

		$signreq = $bdd->prepare("INSERT INTO user (mail, login, password) VALUES (?, ?, ?)");
		$signreq->bindParam(1, $value1);
		$signreq->bindParam(2, $value2);
		$signreq->bindParam(3, $value3);
		$signreq->execute();

		session_start();
		$_SESSION['mail'] = $value1;
		$_SESSION['login'] = $value2;
		$_SESSION['password'] = $value3;
		header("Location: ../index.php");
	}
	else
	{
		echo "Erreur lors de la connection";
	}
?>
