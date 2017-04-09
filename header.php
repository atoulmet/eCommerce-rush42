<header>
<?php
	if ($_SESSION['loggued_on_user'])
   	{
		if ($_SESSION['admin'] === 'true')
			echo '<div class ="status" >Mighty administrator\n</div>';
		echo "Bonjour ".$_SESSION['loggued_on_user'];
		echo '<a href="panier.php" >Accéder au panier</a><br />';
		echo '<div class="account" ><a href="logout.php">Logout</a></div>';
	}
	else
  	{
		echo '<a href="login.php">Login</a>';
		echo '<br />';
		echo '<a href="panier.php" >Accéder au panier</a><br />';
	}
?>
</header>
