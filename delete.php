<?PHP
if (session_start() === false)
{
	echo "Erreur inattendue\n";
	exit ;
}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Suppression compte</title>
	</head>
	<body>
		<p>Suppression du compte</p>
		<form action="delete.php" method="post">
			<label for="login">Identifiant : </label>

			 <input type="text" name="login" id="login" placeholder="login" value="" />
			<br />

			<label for="passwd">Mot de passe : </label>
			<input type="password" name="passwd" id="passwd" placeholder="password" value="" />

			<input type="submit" name="suppr" value="suppr" />
			<br />
		</form>
		<br />
		<a href="./index.php">Retourner à l'accueil</a>
	</body>
</html>
<?php
include("get_connect.php");
if (!$_POST['login'] || !$_POST['passwd'] || $_POST['suppr'] !== "suppr")
{
	echo "Vous devez remplir les champs.\n";
	return ;
}
else if ($_POST['login'] && $_POST['passwd'] && $_POST['suppr'] === "suppr")
{
	$db = get_connect("private");
	if (!$db)
		exit(mysqli_error($db));
	$passwd = hash('whirlpool', $_POST['passwd']);
	$priv_db = mysqli_query($db, 'SELECT * FROM users');
	while($user = mysqli_fetch_assoc($priv_db))
		if (auth($_POST['login'], $_POST['passwd']) == true)
		{
			mysqli_query($db, 'DELETE FROM users(login, passwd, admin) VALUES(?, ?, ?)');    
			echo "Compte supprime.\n";
			return ;
		}
	mysqli_free_result($user);
	mysqli_stmt_execute($req_pre);
	mysqli_close($db);
}
?>
