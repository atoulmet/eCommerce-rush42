<?php
include("get_connect.php");
include("split_func.php");
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
			<table>
				<tr>
				<?php

					$db = get_connect("ft_amazon");
					$db_table = mysqli_query($db, 'SELECT * FROM products LIMIT 0, 6');
					while($data = mysqli_fetch_assoc($db_table))
					{
						echo '<td>'.$data['name'].'</br>'.$data['prix'];
						$cat_table = ft_split($data['categories']);
						foreach ($cat_table as $catego)
							echo '</br>'.$catego.'</br>';
						echo '</td>';
					}
					mysqli_free_result($db_table);

				?>
				</tr>
			</table>
		<div class='hotnow'>
			<!--inserer ici les produits -->
		</div>
		<?php include_once("footer.php"); ?>
	</body>
</html>
