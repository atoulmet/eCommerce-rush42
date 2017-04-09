<header>
	<h1>Bienvenue sur la boutique 42</h1>

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
</header>
