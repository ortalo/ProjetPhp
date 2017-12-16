<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php


// CONNECTION A LA BASE

try
{
$bdd = new PDO('mysql:host=localhost;dbname=kc', 'root', '',		 	array(PDO::ATTR_ERRMODE => 	PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
	die('Erreur :'.$e->getMessage());
};



$numpat = $_POST['Numpat'];
$chir = $_POST['chir'];

// REQUETE DE SELECTION DE TOUS LES NUMERO DOSSIER

$requete= "select Num_dossier FROM tab_patient WHERE Num_dossier =".$numpat.";";
$resultat=$bdd->query($requete);
$ligne = $resultat->fetch();


// SI NUMERO DE DOSSIER TROUVE -> SUPPRESSION DE l'ATCD chir choisi par l'utilisateur

 if ($_POST['Numpat'] == $ligne['Num_dossier'])
 	{	
 		$req= " delete FROM tab_Chirurgie WHERE (NumDossier =".$numpat." and Code_chir =".$chir.");";
 		$bdd->query($req);
 		
 		echo "Suppression reussie";
 	}
	else
	{
	echo "Dossier non trouvé " ;
	}


$resultat->closeCursor();

// RETOUR MENU

echo '<br /><a href="http://127.0.0.1/PHP_INF204/DeleteKC.html">Retour au menu précedent</a><br />';
echo '<a href="xxxx">Retour a la page principale</a>';

?>

</body>
</html>
