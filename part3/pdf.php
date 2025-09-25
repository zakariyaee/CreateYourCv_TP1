<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

session_start();
 
  $options = new Options();
    $options->set('isRemoteEnabled' ,true); // 3la wdit les images 
    $Dompdf =new Dompdf([$options,
    "chroot" => __DIR__ // hna kat3tina dik  chemin absolu dyal dossier li fih pdf.php
    ]);


    $photoPath = __DIR__ . '/' . $_SESSION["photo"]; // Construire le chemin absolu


    // HTml li ay t7et f pdf (dompdf at convertih rasso)
  $html = '
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 30px;
        color: #333;
    }
    h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 5px;
    }
    .subtitle {
        text-align: center;
        font-size: 14px;
        color: #555;
        margin-bottom: 20px;
    }
    .photo {
        text-align: center;
        margin-bottom: 15px;
    }
    .photo img {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        border: 3px solid #2c3e50;
    }
    .info {
        text-align: left;
        margin-bottom: 25px;
        font-size: 14px;
    }
    .info p {
        margin: 3px 0;
    }
    .section {
        margin-bottom: 18px;
    }
    .section h2 {
        font-size: 16px;
        color: #2c3e50;
        border-bottom: 1px solid #ccc;
        margin-bottom: 8px;
    }
    .section p, .section li {
        font-size: 14px;
        margin: 5px 0;
    }
    ul {
        margin: 0;
        padding-left: 20px;
    }
</style>
</head>
<body>

    <div class="photo">
        <img src="'.$photoPath.'" alt="Photo">
        <h1><strong> '.$_SESSION["LastName"].' '.$_SESSION["name"].'</strong></h1>
        <div>Eleve ingenieur a l\'ENSA de Tetouan  </div>

    </div>

    <div class="info">
        <br><br>
        <p><strong>Téléphone:</strong> '.$_SESSION["NumTele"].'</p>
        <p><strong>Email:</strong> '.$_SESSION["email"].'</p>
        <p><strong>Classe:</strong> '.$_SESSION["class"].'</p>
        <p><strong>Année universitaire:</strong> '.$_SESSION["annee"].'</p>
    </div>

    <div class="section">
        <h2>Modules Suivis</h2>
        <ul>';
            foreach ($_SESSION["Modules"] as $module) {
                $html .='<li>'.$module.'</li>';
            }
$html .= '
        </ul>
    </div>

    <div class="section">
        <h2>Langues Parlées</h2>
        <p>'.$_SESSION["Langues"].'</p>
    </div>

    <div class="section">
        <h2>Centres d\'intérêt</h2>
        <p>'.$_SESSION["CentreInteret"].'</p>
    </div>

    <div class="section">
        <h2>Projets</h2>
        <p>'.$_SESSION["projets"].'</p>
    </div>

    <div class="section">
        <h2>Stages</h2>
        <p>'.$_SESSION["stages"].'</p>
    </div>

    <div class="section">
        <h2>Remarques</h2>
        <p>'.$_SESSION["remarques"].'</p>
    </div>

</body>
</html>';



    $Dompdf->loadHtml($html); // html ghanconvertiwh f pdf

    $Dompdf->setPaper('A4','portrait'); // format w orientation

    $Dompdf->render(); // hadi katgenerer l pdf
    
    $Dompdf->stream("Cv.pdf",["Attachment"=>false]); // hna kataffichi l pdf f navigateur
    

    ?>
