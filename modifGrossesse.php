<?php session_start(); 
if (isset($_POST['cleGrossesse'])){
    try{
	   $bdd = new PDO('mysql:host=localhost;dbname=kc', 'root', 'root', 	array(PDO::ATTR_ERRMODE => 	PDO::ERRMODE_EXCEPTION));
        foreach($_POST['cleGrossesse'] as $cle){
            $dossierAndGrossesse = explode(',', $cle);
            $req= " delete FROM tab_grossesse WHERE (Num_Dossier =".$dossierAndGrossesse[0]." and idGrossesse =".$dossierAndGrossesse[1].");";
 		     $bdd->query($req);
    }
    
    }catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
}
if (isset($_POST['newGrossesse'])){
    try{
	   $bdd = new PDO('mysql:host=localhost;dbname=kc', 'root', 'root', 	array(PDO::ATTR_ERRMODE => 	PDO::ERRMODE_EXCEPTION));
        $reqMaxIdGrosesse = "SELECT max(idGrossesse) FROM tab_grossesse WHERE Num_Dossier = '".$_SESSION['numpat']."';";
        $resultatMaxId=$bdd->query($reqMaxIdGrosesse);
        $ligne = $resultatMaxId->fetch();
        $maxIdGrossesse=$ligne[0];
        if($maxIdGrossesse == 'null'){$maxIdGrossesse='0';}
        
        $intMaxIdGrossesse = (int)$maxIdGrossesse;
        $intMaxIdGrossesse++;
        $maxIdGrossesse = (string)$intMaxIdGrossesse;
        
        $req= "INSERT INTO `tab_grossesse` (`Num_Dossier`, `IdGrossesse`, `Année`) VALUES ('".$_SESSION['numpat']."', '".$maxIdGrossesse."', '".$_POST['newGrossesse']."');";
 		$bdd->query($req);
    
    }catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />	
	<title>Modification de grossesses</title>
</head>
<body>

<form method="POST" action="modifGrossesse.php">
<fieldset><legend><h4> Grossesses de la patiente <?php echo $_SESSION['numpat'] ?> </h4></legend>

<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=kc', 'root', 'root', 	array(PDO::ATTR_ERRMODE => 	PDO::ERRMODE_EXCEPTION));
    $resultat=$bdd->query("SELECT Num_Dossier, idGrossesse, Année FROM tab_grossesse WHERE Num_Dossier = '".$_SESSION['numpat']."';");
    
    while ($ligne = $resultat->fetch()){ 

        echo '<input type="checkbox" name="cleGrossesse[]" value="'.$ligne[0].','.$ligne[1].'">'.$ligne[2].'</option>';
    }
   
    
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
    <br>
    <input type="submit" value="Effacer les grossesses séléctionnées" />
    </fieldset>
</form>
    
 <form method="POST" action="modifGrossesse.php">
     <fieldset><legend><h4> Ajouter une grossesse à la patiente <?php echo $_SESSION['numpat'] ?> </h4></legend>
  Année de la nouvelle grossesse: <input type="text" name="newGrossesse" maxlength="4"><br>
  <input type="submit" value="Ajouter la grossesse">
     </fieldset>
</form> 

</body>
</html>
