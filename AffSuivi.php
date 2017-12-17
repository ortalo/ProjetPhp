<!DOCTYPE html>
<html>
<head>
	<title>Affichage contactologie</title>
</head>
<body>

<?php

// connexion bdd avec affichage message exception

try
{
$con = new PDO('mysql:host=localhost;dbname=kc', 'root', '',		 	array(PDO::ATTR_ERRMODE => 	PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
	die('Erreur :'.$e->getMessage());
};

// affichage numéro patient soumis
echo 'Numéro patient demandé : '.$_POST['numPat'];

// requête SQL
$sqlContact = "
	SELECT Date, Oeil, Id_lentille, Autre_nom_lentille, Ro, Diamètre, Puissance, Commentaires
	FROM tab_contacto
	WHERE N° dossier = ".$_POST['numPat']."
	;"

$res = $con->query($sqlContact);

// affichage chaque colonne
	if ($res->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        echo "Date: " . $row["Date"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	    }
	} else {
	    echo "0 résultats";
	}
$con->close();
?>



</body>
</html>
