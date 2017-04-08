<?php
	session_start();
	include('check_admin.php');
	if (check_admin($_SESSION['loggued_on_user']) === false)
	{
		echo "Statut administrateur requis\n";
	}
	else
	{
		echo "OKOK";
		$_SESSION['admin'] = 'true';
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>

	</body>
</html>
