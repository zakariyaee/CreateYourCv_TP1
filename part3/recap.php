<?php
    require 'vendor/autoload.php';

    session_start();


    $connection = new PDO("mysql:host=localhost;dbname=tp1", "root", "");

    if (isset($_POST['Valider'])) {
        if(!$connection){
            echo "Erreur lors de la connection avec la base de donnee !";
        }else{
            $sql = "select email from utilisateurs where email = '".$_SESSION["email"]."' ";
            $result = $connection->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            if( $result->rowCount() == 0 ){
                $module = '';
                foreach ($_SESSION["Modules"] as $m) {
                    $module = $module . $m . ' ';
                }

                $sql1 = "Insert into utilisateurs values ('".$_SESSION["name"]."','"
                        .$_SESSION["LastName"]."',"
                        .$_SESSION["NumTele"].",'"
                        .$_SESSION["photo"]."',"
                        .$_SESSION["Age"].",'"
                        .$_SESSION["class"]."','"
                        .$_SESSION["annee"]."','"
                        .$_SESSION["stages"]."','"
                        .$_SESSION["projets"]."','"
                        .$_SESSION["Langues"]."','"
                        .$_SESSION["CentreInteret"]."',"
                        .$_SESSION["nbreProjets"].",'"
                        .$_SESSION["remarques"]."','"
                        .$_SESSION["email"]."','"
                        .$module."')";
                if (!$connection->query($sql1)){
                        echo '<script>
                        alert("Les données n\'ont pas pu être sauvegardées !");
                        window.location.href = "formulaire.php";
                        </script>';
                        exit();
                }
                header('Location: pdf.php');
                exit();
            }else { 
                echo '<script>
                alert("email déjà exist !");
                window.location.href = "formulaire.php";
                </script>';
                exit();
            }
              
        }
        
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