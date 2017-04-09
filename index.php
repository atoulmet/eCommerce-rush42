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
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>

	<body>
		<?php include_once("header.php"); ?>

		<div class="categories">
		</div>
		<div class='hotnow_container'>
	<h2>Nouveautes</h2>
		</div>
		<div class='hotnow'>
			<!--inserer ici les produits -->
		</div>
		<?php include_once("footer.php"); ?>
	</body>
</html>
