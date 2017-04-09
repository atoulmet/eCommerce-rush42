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


	foreach ($_SESSION['panier'] as $article_id)
	{
		$db = get_connect("ft_amazon");
		$req_pre = mysqli_prepare($db, 'SELECT * FROM products WHERE id = ?');
		mysqli_stmt_bind_param($req_pre, "i", $article_id);
		mysqli_stmt_execute($req_pre);
		mysqli_stmt_bind_result($req_pre, $item['id'], $item['name'], $item['img'], $item['prix'], $item['categories']);
		mysqli_stmt_fetch($req_pre);
		if (!mysqli_close($db))
			exit(mysqli_error($db));
		$articles_all[] = $item['name'];
		$price_all[] = $item['prix'];
	}
	$cart = array_count_values($articles_all);
	$total = 0;
	foreach ($cart as $item_value => $number)
	{
		$i = 0;
		foreach ($articles_all as $arti)
		{
			if ($arti == $item_value)
				$price = $price_all[$i];
			$i++;
		}
		echo $item_value.' x '.$number.'</br>';
		$total = $total + ($number * $price);
		$number_stock[] = $number;
		$price_stock[] = $price;
		$item_value_stock[]  = $item_value;
	}
		echo "</br>Prix total = ".$total.'</br>';
		echo	'<form><input type="submit" name="submit" value="Valider" /></form>';
		if ($_GET == 'Valider')
		{
			$db = get_connect("ft_amazon");
			$req_pre = mysqli_prepare($db, 'INSERT INTO orders(name, numbers, prix) VALUES(?, ?, ?)');
			mysqli_stmt_bind_param($req_pre, "sii", $item_value_stock, $number_stock, $price_stock);
			mysqli_stmt_execute($req_pre);
			if (!mysqli_close($db))
				exit(mysqli_error($db));
				
		}
?>

			<div class="cart_cell">
				<img src="http://fla.fg-a.com/shopping-cart/shopping-cart-black-1.png">

				</div>

		<?php include_once("footer.php"); ?>
	</body>
</html>
