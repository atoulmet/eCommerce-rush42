<?php

if (session_start() === false)
{
	echo "Erreur inattendue\n";
	exit ;
}

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
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Panneau Admin</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>

	<body>
		<?php include_once("header.php"); ?>

		<ul class="categories">
			<li><a href="?admin=products">Administrer les produits</a></li>
			<li><a href="?admin=users">Administrer les utilisateur</a></li>
		</ul>

		<div class="table">
			<?php
				if ($_GET['admin'] === 'products')
				{
					echo '<div class="cell cell_add">
							<form class="new_prod" action="new_prod.php" method="post">
								  <input type="text" name="img_url" id="img_url" placeholder="img_url" value="" /></br>

								  <span class="prod_name"><input type="text" name="prod_name" id="prod_name" placeholder="nom du produit" value="" /></span></br>

								  <span class="prod_price"><input type="text" name="prod_price" id="prod_price" placeholder="prix" value="" /></span><br />

								  <span class="prod_cat"><input type="text" name="prod_cat" id="prod_cat" placeholder="categories" value="" /></br><small>categories sans espaces separe par des \';\'</small></span></br>

								  <button type="submit" name="new_prod" id="new_prod" value="ADD">Ajouter</button>
							  </form>
						  </div>';

					$db = get_connect("ft_amazon");
					$req = mysqli_query($db, 'SELECT * FROM products');
					while($prod = mysqli_fetch_assoc($req))
					{
						echo '<div class="cell">

								  <img src="'.$prod['img'].'" alt="product_picture" /></br>

								  <span class="prod_name"><h3>'.$prod['name'].'</h3></span></br>

								  <span class="prod_price">Prix '.$prod['prix'].' Wallets</span>

								  <form class="del_prod" action="del_prod.php" method="post">
									  <button type="submit" name="del_prod" id="del_prod_but" value="'.$prod['id'].'">Supprimer</button>
								  </form>
								  <br />

								  <form class="updt_passwd" action="updt_prod.php" method="post">
									  <button type="submit" name="updt_prod" id="updt_prod_but" value="'.$prod['id'].'">Modifier</button>
								  </form>
							  </div>';
					}
					mysqli_free_result($req);
					if (!mysqli_close($db))
						exit(mysqli_error($db));
				}

				if ($_GET['admin'] === 'users')
				{
					echo '<div class="cell cell_add">
							<form action="create.php" method="post">
								<label for="login">Identifiant : </label>

								 <input type="text" name="login" id="login" placeholder="login" value="" />
								<br />

								<label for="passwd">Mot de passe : </label>
								<input type="password" name="passwd" id="passwd" placeholder="password" value="" />

								<input type="submit" name="submit" value="OK" />
								<br />

								<label for="admin">Compte administrateur : </label>
								<input type="checkbox" name="admin" id="admin_check" value="true" />
							</form>
						  </div>';

					$db = get_connect("private");
					$req = mysqli_query($db, 'SELECT * FROM users');
					while($user = mysqli_fetch_assoc($req))
					{
						echo '<div class="cell">
								  <p>Identifiant: '.$user['login'].'</p>

								  <form class="updt_passwd" action="updt_passwd.php" method="post">
								  		<label for="newpw">Nouveau mot de passe : </label>
								  		<input type="password" name="newpw" id="newpw" placeholder="new password" value="" />
										<button type="submit" name="updt_passwd" id="updt_passwd_but" value="UPDT_PASS">Modifier</button>
								  </form>
								  <br />

								  <form class="del_user" action="del_user.php" method="post">
									  <button type="submit" name="del_user" id="del_user_but" value="'.$user['login'].'">Supprimer</button>
								  </form>
							  </div>';
					}
					mysqli_free_result($req);
					if (!mysqli_close($db))
						exit(mysqli_error($db));
				}
			?>
		</div>
	</body>
</html>
