<?php
session_start();
if (isset($_POST['MiseAjour'])) {
     $connection = new PDO("mysql:host=localhost;dbname=tp1", "root", "");
     $module = '';
    foreach ($_SESSION["Modules"] as $m) {
    $module = $module . $m . ' ';
                }

   $req="UPDATE utilisateurs SET name='".$_SESSION["name"]."', lastName='".$_SESSION["LastName"]."', Num_tele=".$_SESSION["NumTele"].", photo='".$_SESSION["photo"]."', age=".$_SESSION["Age"].", classe='".$_SESSION["class"]."', anne_Universitaine='".$_SESSION["annee"]."', stage='".$_SESSION["stages"]."', projets='".$_SESSION["projets"]."', lagues='".$_SESSION["Langues"]."', centre_interets='".$_SESSION["CentreInteret"]."', nbre_de_projetse=".$_SESSION["nbreProjets"].", remarque='".$_SESSION["remarques"]."', modules='".$module."' WHERE email='".$_SESSION["email"]."'"; 
    $result = $connection->query($req);
    if (!$result){
        echo '<script > alert("les donnes ne peut pas etre mis a jour  !")</script>';
        exit();
    }
    header('Location: pdf.php');
    exit();
}
if (isset($_POST['retour'])) {
    header('Location: formulaire.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formulaire.css">
    <title>Document</title>
</head>
<body>
    <form method="post" action=''>
        <button type="MiseAjour" name="MiseAjour">MiseAjour</button> 
            
        <button type="retour" name="retour">retour</button>
       
    </form>
</body>
</html>