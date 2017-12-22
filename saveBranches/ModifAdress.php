<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="projet_phase2.css">
	<title>Etat modifications adressage</title>
</head>
<body>
<?php

$codeAdrUpd = $_POST['codeAdrUpd'];

try
{
	// connexion avec gestion exception
$bdd = new PDO('mysql:host=localhost;dbname=kc', 'root', '',		 	array(PDO::ATTR_ERRMODE => 	PDO::ERRMODE_EXCEPTION));
}

catch (Exception $e)
{
	die('Erreur :'.$e->getMessage());
};

// requête de mise à jour du code d'adressage
$reqAdr= "UPDATE tab_patient SET Adressage = ".$codeAdrUpd." WHERE Num_dossier =".$_SESSION['numpat'].";";
$bdd->query($reqAdr);

//requête de vérification des informations, qui permettra d'alimenter la boucle d'affichage à venir
$reqVerifAdr = "SELECT Codage FROM tab_Codage_Adressage INNER JOIN tab_patient ON tab_patient.Adressage = tab_Codage_Adressage.Codage WHERE Num_dossier =".$_SESSION['numpat'].";";
$resVerifAdr=$bdd->query($reqVerifAdr);

$ligne = $resVerifAdr->fetch();


// si pas d'erreur, afficher le résultat des modifications
 if ($codeAdrUpd == $ligne['Codage'])
 	{	
 		echo "Modifications effectuees, ci-après les resultats :<br /><br /><br />";
		//requête attestant la modifications des informations, qui fera office de requête d'affichage de données
		$reqVerif= "SELECT Num_dossier, Codage, tab_Codage_Adressage.Adressage FROM tab_Codage_Adressage INNER JOIN tab_patient ON tab_patient.Adressage = tab_Codage_Adressage.Codage WHERE Num_dossier =".$_SESSION['numpat'].";";
		$resVerifUtil=$bdd->query($reqVerif);
		$ligne=$resVerifUtil->fetch();
			while ($ligne)
			{   
				echo  "<h3> Numero dossier: ",$ligne['Num_dossier'],'<br />',"Codage: ",$ligne['Codage'] ,'<br />',"Adressage: ",$ligne['Adressage'] ,'<br />', '</h3><br />';
 	    		$ligne = $resVerifUtil->fetch(); 	
			} ;
 	}
// si erreur, suggérer de recommencer
else
	{
	echo "Erreur de mise à jour, veuillez recommencer avec les bons parametres, via les liens ci-dessous : <br />" ;
	}

$resVerifAdr->closeCursor();

echo '<br /><a href="ModSelecPat.html">Retour à la saisie du numero de dossier</a><br />';
echo '<a href="Menu.html">Retour a la page principale</a>';

?>

</body>
</html>
