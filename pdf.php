<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

session_start();
 
  $options = new Options();
    $options->set('isRemoteEnabled' ,true); // 3la wdiit les images 
    $Dompdf =new Dompdf($options);


    $photoPath = __DIR__ . '/' . $_SESSION["photo"]; // Construire le chemin absolu

    // HTml li ay t7et f pdf (dompdf at convertih rasso)

    $html ='
    <h1 style="text-align: center;">Curriculum Vitae</h1>
    <h2><img src="'.$photoPath.'" alt="Photo" style="width:150px;height:150px;border-radius:50%;"></h2>
    <h2>Informations Personnelles</h2>
    <p><strong>Nom:</strong> '.$_SESSION["LastName"].'</p>
    <p><strong>Prénom:</strong> '.$_SESSION["name"].'</p
    <p><strong>Âge:</strong> '.$_SESSION["Age"].'</p>
    <p><strong>Téléphone:</strong> '.$_SESSION["NumTele"].'</p>
    <p><strong>Email:</strong> '.$_SESSION["email"].'</p>
    <p><strong>Classe:</strong> '.$_SESSION["class"].'</p>
    <p><strong>Année universitaire:</strong> '.$_SESSION["annee"].'</p>
    <p><strong>Nombre de projets réalisés:</strong> '.$_SESSION["nbreProjets"].'</p>
    <p><strong>Remarques:</strong> '.$_SESSION["remarques"].'</p>

    <h2>Modules Suivis</h2>
    <ul>';
    foreach ($_SESSION["Modules"] as $module) {
        $html .='<li>'.$module.'</li>';
    }
    $html .='</ul>
    <h2>Langues Parlées</h2>
    <p>'.$_SESSION["Langues"].'</p>
    <h2>Centres d\'intérêt</h2>
    <p>'.$_SESSION["CentreInteret"].'</p>
    <h2>Projets</h2>
    <p>'.$_SESSION["projets"].'</p>
    <h2>Stages</h2>
    <p>'.$_SESSION["stages"].'</p>
    ';

    $Dompdf->loadHtml($html); // html ghanconvertiwh f pdf
    $Dompdf->setPaper('A4','portrait'); // format w orientation
    $Dompdf->render(); // hadi katgenerer l pdf
    $Dompdf->stream("Cv.pdf",["Attachment"=>false]); // hna kataffichi l pdf f navigateur
    

    ?>
