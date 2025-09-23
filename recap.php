<?php
session_start();
if (isset($_POST['Valider'])) {

    // Ouvrir le fichier en écriture (écrase s'il existe)
    $file = fopen("Cv.txt", "w");

    if ($file) {
        // Formatage du contenu du CV
        $cv = "===== CURRICULUM VITAE =====\n\n";
        $cv .= "Nom : " . $_SESSION["LastName"] . "\n";
        $cv .= "Prénom : " . $_SESSION["name"] . "\n";
        $cv .= "Âge : " . $_SESSION["Age"] . "\n";
        $cv .= "Téléphone : " . $_SESSION["NumTele"] . "\n";
        $cv .= "Email : " . $_SESSION["email"] . "\n";
        $cv .= "Classe : " . $_SESSION["class"] . "\n";
        $cv .= "Année universitaire : " . $_SESSION["annee"] . "\n";
        $cv .= "Nombre de projets réalisés : " . $_SESSION["nbreProjets"] . "\n";
        $cv .= "Remarques : " . $_SESSION["remarques"] . "\n\n";

        $cv .= "----- Modules suivis -----\n";
        foreach ($_SESSION["Modules"] as $module) {
            $cv .= "- " . $module . "\n";
        }

        $cv .= "\n----- Langues parlées -----\n";
        $cv .= $_SESSION["Langues"] . "\n";

        $cv .= "\n----- Centres d’intérêt -----\n";
        $cv .= $_SESSION["CentreInteret"] . "\n";

        $cv .= "\n----- Projets -----\n";
        $cv .= $_SESSION["projets"] . "\n";

        $cv .= "\n----- Stages -----\n";
        $cv .= $_SESSION["stages"] . "\n";

        // Écrire dans le fichier
        fwrite($file, $cv);
        fclose($file);

        echo "✅ CV généré avec succès dans le fichier Cv.txt";
    } else {
        echo "❌ Impossible d'ouvrir le fichier.";
    }
    $_SESSION["name"] = '';
    $_SESSION["LastName"] = '';
    $_SESSION["NumTele"] ='';
    $_SESSION["email"] = '';
    $_SESSION["Age"] =  '';
    $_SESSION["remarques"] ='';
    $_SESSION["class"] ='';
    $_SESSION["annee"] = '';
    $_SESSION["nbreProjets"] ='';
    $_SESSION['Langues'] ='';
    $_SESSION['CentreInteret'] ='';
    $_SESSION['projets'] ='';
    $_SESSION['stages'] ='';
    $_SESSION['Modules'] =[];
    header('Location: formulaire.php');
}
if (isset($_POST['Modifier'])) {
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
        <button type="Valider" name="Valider">Valider</button> 
        <button type="Modifier" name="Modifier">Modifier</button>
    </form>
</body>
</html>