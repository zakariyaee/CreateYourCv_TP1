<?php

require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

session_start();
//  if (isset($_POST['Valider'])) {

//     $options = new Options();
//     $options->set('isRemoteEnabled' ,true); // 3la wdiit les images 
//     $Dompdf =new Dompdf($options);

//     // HTml li ay t7et f pdf (dompdf at convertih rasso)
//     $html ='
//     <h1 style="text-align: center;">Curriculum Vitae</h1>
//     <h2>Informations Personnelles</h2>
//     <p><strong>Nom:</strong> '.$_SESSION["LastName"].'</p>
//     <p><strong>Prénom:</strong> '.$_SESSION["name"].'</p
//     <p><strong>Âge:</strong> '.$_SESSION["Age"].'</p>
//     <p><strong>Téléphone:</strong> '.$_SESSION["NumTele"].'</p>
//     <p><strong>Email:</strong> '.$_SESSION["email"].'</p>
//     <p><strong>Classe:</strong> '.$_SESSION["class"].'</p>
//     <p><strong>Année universitaire:</strong> '.$_SESSION["annee"].'</p>
//     <p><strong>Nombre de projets réalisés:</strong> '.$_SESSION["nbreProjets"].'</p>
//     <p><strong>Remarques:</strong> '.$_SESSION["remarques"].'</p>

//     <h2>Modules Suivis</h2>
//     <ul>';
//     foreach ($_SESSION["Modules"] as $module) {
//         $html .='<li>'.$module.'</li>';
//     }
//     $html .='</ul>
//     <h2>Langues Parlées</h2>
//     <p>'.$_SESSION["Langues"].'</p>
//     <h2>Centres d\'intérêt</h2>
//     <p>'.$_SESSION["CentreInteret"].'</p>
//     <h2>Projets</h2>
//     <p>'.$_SESSION["projets"].'</p>
//     <h2>Stages</h2>
//     <p>'.$_SESSION["stages"].'</p>
//     ';

//     $Dompdf->loadHtml($html); // html ghanconvertiwh f pdf
//     $Dompdf->setPaper('A4','portrait'); // format w orientation
//     $Dompdf->render(); // hadi katgenerer l pdf
//     $Dompdf->stream("Cv.pdf",["Attachment"=>false]); // hna kataffichi l pdf f navigateur
//     exit(0);



    


//     //     // Ouvrir le fichier en écriture (écrase s'il existe)
//     //     $file = fopen("Cv.txt", "w");
//     //     if ($file) {
//     //         // Formatage du contenu du CV
//     //         $cv = "===== CV Pro =====\n\n";
//     //         $cv .= "Nom : " . $_SESSION["LastName"] . "\n";
//     //         $cv .= "Prénom : " . $_SESSION["name"] . "\n";
//     //         $cv .= "Âge : " . $_SESSION["Age"] . "\n";
//     //         $cv .= "Téléphone : " . $_SESSION["NumTele"] . "\n";
//     //         $cv .= "Email : " . $_SESSION["email"] . "\n";
//     //         $cv .= "Classe : " . $_SESSION["class"] . "\n";
//     //         $cv .= "Année universitaire : " . $_SESSION["annee"] . "\n";
//     //         $cv .= "Nombre de projets réalisés : " . $_SESSION["nbreProjets"] . "\n";
//     //         $cv .= "Remarques : " . $_SESSION["remarques"] . "\n\n";
//     //         $cv .= "----- Modules suivis -----\n";
//     //         foreach ($_SESSION["Modules"] as $module) {
//     //             $cv .= "- " . $module . "\n";
//     //         }
//     //         $cv .= "\n----- Langues parlées -----\n";
//     //         $cv .= $_SESSION["Langues"] . "\n";
//     //         $cv .= "\n----- Centres d’intérêt -----\n";
//     //         $cv .= $_SESSION["CentreInteret"] . "\n";
//     //         $cv .= "\n----- Projets -----\n";
//     //         $cv .= $_SESSION["projets"] . "\n";
//     //         $cv .= "\n----- Stages -----\n";
//     //         $cv .= $_SESSION["stages"] . "\n";
//     //         // Écrire dans le fichier
//     //         fwrite($file, $cv);
//     //         fclose($file);
//     //         echo "✅ CV généré avec succès dans le fichier Cv.txt";
//     //     } else {
//     //         echo "❌ Impossible d'ouvrir le fichier.";
//     //     }
//     //     $_SESSION["name"] = '';
//     //     $_SESSION["LastName"] = '';
//     //     $_SESSION["NumTele"] ='';
//     //     $_SESSION["email"] = '';
//     //     $_SESSION["Age"] =  '';
//     //     $_SESSION["remarques"] ='';
//     //     $_SESSION["class"] ='';
//     //     $_SESSION["annee"] = '';
//     //     $_SESSION["nbreProjets"] ='';
//     //     $_SESSION['Langues'] ='';
//     //     $_SESSION['CentreInteret'] ='';
//     //     $_SESSION['projets'] ='';
//     //     $_SESSION['stages'] ='';
//     //     $_SESSION['Modules'] =[];
//     //     header('Location: formulaire.php');
//     //     exit();
//     // 


// }
if (isset($_POST['Valider'])) {
    header('Location: pdf.php');
    exit();
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