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

 // ENREGISTREMENT DU CHOIX DE LUTILISATEUR

	switch($_POST['KCOD']) {
	case '1':
		$tri = '1';
	break;
	case '2':
		$tri = '2';
	break;
	case '3':
		$tri = '3';
	break;
}

// REQUETE POUR AFFICHE LISTE PATIENT SELON CHOIX UTLISATEUR

$requete= "select Num_dossier,Nom, Pren  from tab_patient where Situation_init_KC_OD ='".$tri."';";
 $resultat=$bdd->query($requete);
$ligne = $resultat->fetch();


// AFFICHAGE A LUTILISATEUR 

 while ($ligne)
	{   echo  "Numero dossier: ",$ligne['Num_dossier'],'   ',"Nom: ",$ligne['Nom'] ,'  ',"Prenom: ",$ligne['Pren'] ,'  ', '<br />';
 	    $ligne = $resultat->fetch(); 	
	} ;


// RETOUR 
	
?>



</body>
</html>
