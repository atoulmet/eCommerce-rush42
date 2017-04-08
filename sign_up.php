<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Inscription</title>
	</head>
	<body>
		<p>Créez votre compte :</p>
		<form action="create.php" method="post">
			<label for="login">Identifiant : </label>

			 <input type="text" name="login" id="login" placeholder="login" value="" />
			<br />

			<label for="passwd">Mot de passe : </label>
			<input type="password" name="passwd" id="passwd" placeholder="password" value="" />

			<input type="submit" name="submit" value="OK" />
			<br />

			<label for="admin">Compte administrateur : </label>
			<input type="checkbox" name="admin" id="admin_check" value="true" />
		</form>
		<br />
		<a href="./index.php">Retourner à l'accueil</a>
	</body>
</html>
