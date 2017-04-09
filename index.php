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
	<h2>Nouveautes</h2>
		</div>
		<div class="table">
			<table>
				<tr>
				<?php

					$db = get_connect("ft_amazon");
					$db_table = mysqli_query($db, 'SELECT * FROM products LIMIT 0, 4');
					while($data = mysqli_fetch_assoc($db_table))
					{
						echo '<td class="cell">';
						echo '<img src="'.$data['img'].'"/></br>';
						echo "<h3>".$data['name'].'</h3></br></br>'."Prix ".$data['prix']." €</br></br>";
						$cat_table = ft_split($data['categories']);
						foreach ($cat_table as $catego)
							echo $catego.'</br>';
						echo '</td>';
					}
					mysqli_free_result($db_table);

				?>
				</tr>
			</table>
		</div>
		<div class='hotnow'>
			<!--inserer ici les produits -->
		<?php include_once("footer.php"); ?>
	</body>
</html>
