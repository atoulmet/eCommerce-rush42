<header>
	<a href="index.php"><h1>Bienvenue sur la boutique 42</h1></a>

	<?php

	if ($_SESSION['loggued_on_user'])
		{
		if ($_SESSION['admin'] === 'true')
			echo '<div class ="status" >Mighty administrator\n</div>';
		echo '<p>'."Bonjour ".$_SESSION['loggued_on_user'].'<br />'.'</p>';
		echo '<div class="account" >
				<a href="settings.php">Options</a><br />
				<a href="logout.php">Logout</a>
			  </div>';
	}
	else
	{
		echo '<a href="login.php">Se connecter</a><br />';
		echo '<a id="sign_up" href="sign_up.php">Inscription</a></br>';
	}
	echo '<a href="panier.php" >Accéder au panier</a><br />';

	?>

	<ul id="menus">
		<?php

			include_once("get_connect.php");

			$cat = array();
			$db = get_connect("ft_amazon");
			$db_cat = mysqli_query($db, 'SELECT categories FROM products');
			while($ret = mysqli_fetch_assoc($db_cat))
			{
				$tmp = explode(";", $ret['categories']);
				$cat = array_merge($cat, $tmp);
			}
			$cat = array_unique($cat);
			sort($cat);
			mysqli_free_result($db_cat);
			if (!mysqli_close($db))
				exit(mysqli_error($db));
			foreach ($cat as $elem)
			{
				echo '<li><a href="shop.php?categorie='.$elem.'">'.$elem.'</a></li>';
			}
		?>
	</ul>
</header>
