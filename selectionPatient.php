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



$_SESSION['numpat'] = $_POST['Numpat'];


// REQUETE DE SELECTION DE TOUS LES NUMERO DOSSIER

$requete= "select Num_dossier FROM tab_patient WHERE Num_dossier =".$_SESSION['numpat'].";";
$resultat=$bdd->query($requete);
$ligne = $resultat->fetch();


// SI NUMERO DE DOSSIER TROUVE -> Menu choix de modification

 if ($_SESSION['numpat'] == $ligne['Num_dossier'])
 	{	
 		
 		
 		echo "Dossier Trouvé";
 		echo'<ul id="sous_menu">
             <li>
               <a href="SuppressionATCDChir.html">Suppression Antécedent chirurgical</a>
             </li>
             <li>
               <a href=#>xxx</a>
             </li>
             <li>
               <a href="modifGrossesse.php">Modification des Grossesses</a>
             </li>
             ';

 	}
	else
	{
	echo "Dossier non trouvé " ;
	}


$resultat->closeCursor();

// RETOUR MENU

echo '<br /><a href="selectionPatient.html">Retour à la saisie du numero de dossier</a><br />';
echo '<a href="xxxx">Retour a la page principale</a>';

?>

</body>
</html>
