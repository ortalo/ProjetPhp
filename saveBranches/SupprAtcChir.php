<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

session_start();
// CONNECTION A LA BASE

try
{
$bdd = new PDO('mysql:host=localhost;dbname=kc', 'root', '',		 	array(PDO::ATTR_ERRMODE => 	PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
	die('Erreur :'.$e->getMessage());
};



$chir = $_POST['chir'];

	
 		$req= " delete FROM tab_Chirurgie WHERE (NumDossier =".$_SESSION['numpat']." and Code_chir =".$chir.");";
 		$bdd->query($req);
 		
 		echo "Suppression reussie";




// RETOUR MENU

echo '<br /><a href="SupprAtcChir.html">Retour au menu précedent</a><br />';
echo '<a href="Menu.html">Retour a la page principale</a>';

?>

</body>
</html>
