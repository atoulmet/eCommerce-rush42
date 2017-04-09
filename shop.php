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
		<?php

			include_once("header.php");
			echo '<h2>'.$_GET['categorie'].'</h2>';

		?>

		<div class="table">
					<?php

					include_once("get_connect.php");

					$cat = array();
					$categorie = '%'.$_GET['categorie'].'%';
					$db = get_connect("ft_amazon");
					$req_pre = mysqli_prepare($db, 'SELECT * FROM products WHERE categories LIKE ?');
					mysqli_stmt_bind_param($req_pre, "s", $categorie);
					mysqli_stmt_execute($req_pre);
					mysqli_stmt_bind_result($req_pre, $user['id'], $user['name'], $user['img'], $user['prix'], $user['categories']);
					while(mysqli_stmt_fetch($req_pre))
					{
					      echo '<div class="cell">

									<img src="'.$user['img'].'" alt="product_picture" /></br>

						  			<span class="prod_name"><h3>'.$user['name'].'</h3></span></br>

									<span class="prod_price">Prix '.$user['prix'].' Wallets</span>

									<form class="add_panier" action="panier.php" method="post">
										<button type="submit" name="add_panier" id="add_panier_but" value="'.$user['id'].'">Ajouter au panier</button>
									</form>
						  		</div>';
					}
					mysqli_stmt_close($req_pre);
					if (!mysqli_close($db))
						exit(mysqli_error($db));

					?>
		</div>
	</div>

		<?php include_once("footer.php"); ?>
	</body>
</html>
