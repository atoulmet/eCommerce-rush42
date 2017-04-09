<?php

if (session_start() === false)
{
	echo "Erreur inattendue\n";
	exit ;
}

include("get_connect.php");
include('check_admin.php');

if (check_admin($_SESSION['loggued_on_user']) === false)
{
	echo "Statut administrateur requis\n";
	exit;
}
else
	$_SESSION['admin'] = 'true';

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Panneau Admin</title>
	</head>

	<body>

	</body>
</html>
