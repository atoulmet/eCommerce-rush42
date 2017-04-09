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
        <title>Connection</title>
    </head>

    <body>
        <p>Veuillez vous connecter :</p>

        <form action="login.php" method="post">
            <label for="login">Identifiant : </label>

             <input type="text" name="login" id="login" placeholder="login" value="" />
            <br />

            <label for="passwd">Mot de passe : </label>
            <input type="password" name="passwd" id="passwd" placeholder="password" value="" />

            <input type="submit" name="submit" value="OK" />
        </form>
        <br />

        <a href="./index.php">Retourner à l'accueil</a>
    </body>
</html>

<?php

include_once("get_connect.php");
include_once("auth.php");
include_once("check_admin.php");

if (!$_POST['login'] || !$_POST['passwd'] || $_POST['submit'] !== "OK")
	    return ;
else if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "OK")
{
	$passwd = $_POST['passwd'];
	if (auth($_POST['login'], $passwd) === TRUE)
	{
		$_SESSION['loggued_on_user'] = $_POST['login'];
		echo "Logged in";
		if (check_admin($_POST['login']))
			$_SESSION['admin'] = 'true';
	}
	else
	{
		$_SESSION['loggued_on_user'] = '';
		echo "Erreur d'authentification\n";
		exit ;
	}
}

?>
