<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="projet_phase2.css">
	<title>Validation insertion donnees de suivi</title>
</head>
<body>
<?php

// connexion à la base avec gestion exception
	try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=kc', 'root', '',		 	array(PDO::ATTR_ERRMODE => 	PDO::ERRMODE_EXCEPTION));
		}
			catch (Exception $e)
		{
			die('Erreur :'.$e->getMessage());
		};


// récupération variables depuis le formulaire
	
$iDSuivi = $_POST['iDSuivi'];
$typCs = $_POST['typCs'];
$numDoss = $_POST['numDoss'];
$date = $_POST['date'];
$sFdet = $_POST['sFdet'];
$bAVRpd = $_POST['bAVRpd'];
$bAVLente = $_POST['bAVLente'];
$halNoct = $_POST['halNoct'];
$photoph = $_POST['photoph'];
$visDoubl = $_POST['visDoubl'];
$rougOcul = $_POST['rougOcul'];
$autrSFOc = $_POST['autrSFOc'];
$autreDet = $_POST['autreDet'];
$frotYx = $_POST['frotYx'];
$portLent = $_POST['portLent'];
$adaptLent = $_POST['adaptLent'];
$nbHrJrLent = $_POST['nbHrJrLent'];
$nbJrSemLent = $_POST['nbJrSemLent'];

$reqInsSuiv= "insert INTO tab_suivi(ID_suivi, Type_consult, Num_dossier,Date, Signes_Fonctionnels_Details, BAVrapide, BAVLente, Halos_noct, Photophobie, Vision_ddblee, Rougeurs_ocul, Autre, Autre_det, Frottement_yeux, Port_lentille, Tolerance, Nb_hrL_jr, Nb_jrL_sem) VALUES (".$iDSuivi.", ".$typCs.", '".$numDoss."', '".$date."', '".$sFdet."', ".$bAVRpd.", ".$bAVLente.", ".$halNoct.", ".$photoph.", ".$visDoubl.", ".$rougOcul.", ".$autrSFOc.", '".$autreDet."', ".$frotYx.", ".$portLent.", ".$adaptLent.", ".$nbHrJrLent.", ".$nbJrSemLent.");";

$bdd->query($reqInsSuiv);

echo "Ajout de données de suivi reussi";
echo '<a href="InserSuivi.html">Retour au menu precedent</a><br />';
echo '<a href="Menu.html">Retour a la page principale</a>';
?>
</body>
</html>
