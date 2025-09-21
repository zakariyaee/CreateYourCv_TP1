$_SESSION["name"] = $_POST["name"];
$_SESSION["LastName"] = $_POST["LastName"];
$_SESSION["NumTele"] = $_POST["NumTele"];
$_SESSION["email"] = $_POST["email"];
$_SESSION["Age"]= $_POST["Age"];
$_SESSION["remarques"]= $_POST["remarques"];
$_SESSION["class"]= $_POST["class"];
$_SESSION["annee"]= $_POST["annee"];
$_SESSION["nbreProjets"]= $_POST["nbreProjets"];
$_SESSION["Modules"]= isset($_POST["Modules"]) ? $_POST["Modules"] : array();   a verifier
$_SESSION[remarques]= $_POST["remarques"];

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>CV pro</title>
     <link rel="stylesheet" href="formulaire.css">
</head>
<body>
    <form action="formulaire.php" method="post"  enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($_SESSION['name']) ?  $_SESSION['name'] : ''?>" required><br><br> 
        <label for="LastName">LastName:</label>
        <input type="text" id="LastName" name="LastName" value="<?php echo isset($_SESSION['LasteName']) ?  $_SESSION['LastName'] : ''?>" required><br><br>
        <label for="Age">Age:</label>
        <input type="number" id="Age" name="Age" min="1" max="50" value="<?php echo isset($_SESSION['Age']) ?  $_SESSION['Age'] : ''?>" required><br><br>
        <label for="NumTele">Num Tele:</label>
        <input type="tel" id="NumTele" name="NumTele" value="<?php echo isset($_SESSION['NumTele']) ?  $_SESSION['NumTele'] : ''?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($_SESSION['email']) ?  $_SESSION['email'] : ''?>" required><br><br>
    
        <label for ="class">Vous etes en :</label>
        <select name="class" id="class"  >
                <option value="2AP" <?php echo (isset($_SESSION["class"]) && $_SESSION["class"]=="2AP") ? 'selected':'' ?>>2AP</option>
                <option value="GSTR" <?php echo (isset($_SESSION["class"]) && $_SESSION["class"]=="GSTR") ? 'selected':'' ?>>GSTR</option>
                <option value="GI"  <?php echo (isset($_SESSION["class"]) && $_SESSION["class"]=="GI") ? 'selected':'' ?>>GI</option>
                <option value="SCM" <?php echo (isset($_SESSION["class"]) && $_SESSION["class"]=="SCM") ? 'selected':'' ?>>SCM</option>
                <option value="GC" <?php echo (isset($_SESSION["class"]) && $_SESSION["class"]=="GC") ? 'selected':'' ?>>GC</option>
                <option value="MS" <?php echo (isset($_SESSION["class"]) && $_SESSION["class"]=="MS") ? 'selected':'' ?>>MS</option>
        </select><br><br>
            <label for="annee">Annee :</label>
                <select name="annee" id="annee">
                    <option value="1ere" <?php echo (isset($_SESSION["annee"]) && $_SESSION["annee"]=="1ere") ? 'selected':'' ?>>1ere</option>
                    <option value="2eme" <?php echo (isset($_SESSION["annee"]) && $_SESSION["annee"]=="2eme") ? 'selected':'' ?>>2eme</option>
                    <option value="3eme" <?php echo (isset($_SESSION["annee"]) && $_SESSION["annee"]=="3eme") ? 'selected':'' ?>>3eme</option>
                </select><br><br>
            <label for="Modules">Modules suivis cette année :</label><br>
            <filedset id="Modules" name="Modules" >
                <label for="BD" name="BD">BD</label>
                <input type="checkbox" id="BD" name="Modules[]" value="BD" <?php echo (isset($_SESSION["Modules"]) && in_array("BD", $_SESSION["Modules"])) ? 'checked':'' ?> >
                <label for="Web" name="Web">Web</label>
                <input type="checkbox" id="Web" name="Modules[]" value="Web"  <?php echo (isset($_SESSION["Modules"]) && in_array("Wab", $_SESSION["Modules"])) ? 'checked':'' ?>>
                <label for="Reseau" name="Reseau">Reseau</label>
                <input type="checkbox" id="Reseau" name="Modules[]" value="Reseau"  <?php echo (isset($_SESSION["Modules"]) && in_array("Reseau", $_SESSION["Modules"])) ? 'checked':'' ?>>
                <label for="Java" name="Java">Java</label>
                <input type="checkbox" id="Java" name="Modules[]" value="Java"  <?php echo (isset($_SESSION["Modules"]) && in_array("Java", $_SESSION["Modules"])) ? 'checked':'' ?>>
                <label for="Compilation" name="Compilation">Compilation</label>
                <input type="checkbox" id="Compilation" name="Modules[]" value="Compilation"  <?php echo (isset($_SESSION["Modules"]) && in_array("Compilation", $_SESSION["Modules"])) ? 'checked':'' ?>>
                </filedset><br><br>
                <label for="nbreProjets">Nbre Projets realise cette anne:</label>
                <input type="number" id="nbreProjets" name="nbreProjets" min="0" max="10" value="<?php echo isset($_SESSION['nbreProjets']) ?  $_SESSION['nbreProjets'] : ''?> " required ><br><br>
    
                <input type="text" name="remarques" id="remarques" placeholder="Remarques" value="<?php echo isset($_SESSION['remarques']) ?  $_SESSION['remarques'] : ''?>" required><br><br>
                <input name="file" type="file"><br><br> 
                <button type="submit" name = "upload" >Upload</button><br><br>
        
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
        </form>
</body>
</html>