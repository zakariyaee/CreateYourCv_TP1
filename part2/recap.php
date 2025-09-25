<?php

require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

session_start();

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