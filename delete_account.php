<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Supprimez son compte</title>
	</head>
	<body>
		<p>Entrez vos identifiants pour supprimer votre compte :</p>
		<form action="delete.php" method="post">
			<label for="login">Identifiant : </label>

			 <input type="text" name="login" id="login" placeholder="login" value="" />
			<br />

			<label for="passwd">Mot de passe : </label>
			<input type="password" name="passwd" id="passwd" placeholder="password" value="" />

			<input type="submit" name="submit" value="SUPPRIMER" />
			<br />
		</form>
		<br />
		<a href="./index.php">Retourner à l'accueil</a>
	</body>
</html>
