<?php

if (session_start() === false)
{
	echo "Erreur inattendue\n";
	exit ;
}

?>
<!DOCTYPE html>
<html>
	<head lang="fr">
        <meta charset="utf-8">
        <title>Modifier le mot de passe</title>
        <link rel="stylesheet" type="text/css" href="#" />
	</head>

	<body>
	    <form method="post" action="modif_passwd.php">
	        <p>
		        Identifiant: <input type="text" name="login" />
		        <br />

		        Ancien mot de passe: <input type="password" name="oldpw" />
		        <br/>

		        Nouveau mot de passe: <input type="password" name="newpw" />

		        <input type="submit" name="submit" value="OK"/>
	        </p>
	    </form>

		<a href="./index.php">Retourner à l'accueil</a>
	</body>
</html>
<?php

include_once("get_connect.php");

$i = 0;

if ($_POST['submit'] == 'OK')
{
	if ($_POST['login'] === '')
	{
		echo "Veuillez renseigner votre login\n";
		exit ;
	}
	if ($_POST['oldpw'] === '' || $_POST['newpw'] === '')
	{
		echo "Veuillez renseigner un mot de passe !\n";
		exit ;
	}
	else
	{
		$db = get_connect("private");
		if (($req_pre = mysqli_prepare($db, 'SELECT * FROM users WHERE login = ?')) === FALSE)
		{
			mysqli_close($db);
			exit (mysqli_error($db));
		}
		mysqli_stmt_bind_param($req_pre, "s", $_POST['login']);
		mysqli_stmt_execute($req_pre);
		mysqli_stmt_bind_result($req_pre, $user['login'], $user['passwd'], $user['admin']);
		mysqli_stmt_fetch($req_pre);
		$old_pw_hash = hash('whirlpool', $_POST['oldpw']);
		if ($old_pw_hash !== $user['passwd'])
		{
			mysqli_close($db);
			echo "Ancien mot de passe erroné\n";
			exit ;
		}
		mysqli_close($db);
		$db = get_connect("private");
		$new_pw_hash = hash('whirlpool', $_POST['newpw']);
		if (($req_updt = mysqli_prepare($db, 'UPDATE users SET passwd = ? WHERE login = ?')) === FALSE)
		{
			mysqli_close($db);
			exit (mysqli_error($db));
		}
		mysqli_stmt_bind_param($req_updt, "ss", $new_pw_hash, $_POST['login']);
		mysqli_stmt_execute($req_updt);
		mysqli_close($db);
		echo "Modification reussie\n";
	}
}
?>
