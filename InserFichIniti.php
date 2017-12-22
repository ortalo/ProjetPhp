<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="projet_phase2.css">
	<title>Insertion fiche initiale</title>
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


// ENREGISTREMENT DES DONNEES QUE L'UTILISATEUR VEUT INSERER
	
$nom = $_POST['Nom'];
$prenom = $_POST['Prenom'];
$DDS = $_POST['DDS'];
$KCOD = $_POST['KCOD'];
$KCOG = $_POST['KCOG'];

// REQUETE D'INSERTION

$requete= "insert INTO tab_patient(Num_dossier,Date_debut_suivi, Nom, Pren, Adressage, Typ_consul, Sexe, Date_nais, CSP, Ethnie, Com_ou_Pays_nais, Annee_dec_KC, Lat_man, Tabagisme_actif, nb_cig_jr, Nb_annees, Tabagisme_passif, Situation_init_KC_OD, Situation_init_KC_OG) VALUES (null,".$DDS.",'".$nom."','".$prenom."',null,null,null,null,null,null,null,null,null,null,null,null,null,".$KCOD.",".$KCOG."); ";


$bdd->query($requete);


// RETOUR MENU

echo "Ajout reussi <br />";
echo '<a href="InserFichIniti.html">Retour au menu précedent</a><br />';
echo '<a href="Menu.html">Retour a la page principale</a>';
?>
</body>
</html>
