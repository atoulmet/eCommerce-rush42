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
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<h1>Bienvenue sur la boutique 42</h1>	
	<body>
		<?php include_once("header.php") ?>
		<div class="account">
		<a href="sign_up.php">Inscription</a>
		</br>
		<a href="modif_passwd.php">Modifier le mot de passe</a>
		</div>
	</body>
</html>
