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
    <h1>Panier</h1>
    <body>
        <?php include_once("header.php"); ?>

        <div class="account">
			        <a href="sign_up.php">Inscription</a>
					     </br>

            <a href="modif_passwd.php">Modifier le mot de passe</a>
        </div>
        <div class='panier'>
            <!--inserer ici les produits -->
        </div>
        <?php include_once("footer.php"); ?>
    </body>
</html>
