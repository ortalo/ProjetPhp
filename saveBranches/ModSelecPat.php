<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="projet_phase2.css">
	<title>Selection Numéro Patient</title>
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



$_SESSION['numpat'] = $_POST['Numpat'];


// REQUETE DE SELECTION DE TOUS LES NUMERO DOSSIER

$requete= "select Num_dossier, Sexe FROM tab_patient WHERE Num_dossier =".$_SESSION['numpat'].";";
$resultat=$bdd->query($requete);
$ligne = $resultat->fetch();


// SI NUMERO DE DOSSIER TROUVE -> Menu choix de modification

 if ($_SESSION['numpat'] == $ligne['Num_dossier'])
 	{	
 		
 		
 		echo "Dossier Trouvé";
 		echo'<ul id="sous_menu">
             <li>
               <a href="SupprAtcChir.html">Suppression Antécedent chirurgical</a>
             </li>';
        if($ligne['Sexe']==2){echo 
            '<li>
               <a href="ModifGrossesse.php">Modifier grossesse</a>
             </li>';}   
          echo'   <li>
               <a href="ModifAdress.html">Modifier adresse</a>
             </li>
             ';

 	}
	else
	{
	echo "Dossier non trouvé " ;
	}


$resultat->closeCursor();

// RETOUR MENU

echo '<br /><a href="ModSelecPat.html">Retour à la saisie du numero de dossier</a><br />';
echo '<a href="Menu.html">Retour a la page principale</a>';

?>

</body>
</html>
