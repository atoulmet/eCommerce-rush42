<?php

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
		<title>Panneau Admin</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>

	<body>
		<?php

		include_once("get_connect.php");
		include_once('check_admin.php');

		if (check_admin($_SESSION['loggued_on_user']) === false)
		{
			echo "Statut administrateur requis\n";
			exit;
		}
		else
			$_SESSION['admin'] = 'true';

		?>
	</body>
</html>
