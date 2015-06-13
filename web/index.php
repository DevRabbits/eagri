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
		<div class="connectdiv col-md-6 col-md-offset-3">
			<form role="form" method="POST" action="./function/user_connect.php">
				<div class="form-group">
					<label for="mail">Adresse E-Mail :</label>
					<div class="input-group">
				  	<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-globe"></span></span>
						<input type="text" name="mail" class="form-control" id="mail">
					</div>
				</div>	
				<div class="form-group">
					<label for="password">Mot de passe :</label>
					<div class="input-group">
				  	<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
						<input type="password" name="password" class="form-control" id="password">
					</div>
				</div>
				<div class="checkbox">
				  <label><input type="checkbox"> Se souvenir de moi</label>
				</div>
				<button type="submit" class="btn btn-default">Se connecter</button>
				<a href="#" data-toggle="modal" data-target="#signModal"><span class="glyphicon glyphicon-user"></span> S'inscrire</a>
			</form>
		</div>
		<div id="signModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">S'enregistrer</h4>
						<p><strong>Les champs marqués d'un <span class="red">*</span><strong> sont obligatoires.</p>
					</div>
					<div class="modal-body">
						<form role="form" method="POST" action="./function/user_sign.php">
							<div class="form-group">
								<label for="mail"><span class="red">*</span> Adresse mail :</label>
								<input type="mail" name="mail" class="form-control" id="mail">
							</div>
							<div class="form-group">
								<label for="login"><span class="red">*</span> Pseudo :</label>
								<input type="text" name="login" class="form-control" id="login">
							</div>
							<div class="form-group">
								<label for="password"><span class="red">*</span> Mot de passe :</label>
								<input type="password" name="password" class="form-control" id="password">
							</div>
							<div class="form-group">
								<label for="passwordval"><span class="red">*</span> Confirmation :</label>
								<input type="password" name="passwordval" class="form-control" id="passwordval">
							</div>
							<button type="submit" class="btn btn-default">S'enregistrer</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
