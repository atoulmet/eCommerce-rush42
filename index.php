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
		<title>ft_amazon</title>
		<link rel="stylesheet" type="text/css" href="#" />
	</head>
	<body>
		<?php include_once("header.php")?>
		<a href="sign_up.php">Inscription</a>
		<a href="modif_passwd.php">Modifier le mot de passe</a>
	</body>
</html>
