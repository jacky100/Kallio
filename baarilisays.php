<?php 
require_once("config/config.php"); 
?>
<!DOCTYPE html>
<html>
<head>
<title>K.K. tiimi</title>
    
<link rel="stylesheet" type="text/css" href="tyyli.css">
</head>
<body class="minttu">
    <header>
        <a href="kallionkierros.php">
            <img style="width: 100%" src="img/kkhed.png">
        </a>
    </header>
<div class="laatikko">
<div class="teksti">
    
<form action="baarilisays.php" method="post" enctype="multipart/form-data">
        Baarin Nimi:<br/>
        <input type="text" name="BNimi" id="styled" required/>
        <br/>
        Koordinaatit:<br/>
        <input type="text" name="BOsoite" id="styled" required/>
        <br/>
        Katuoisoite:<br/>
        <input type="text" name="Osoite" id="styled" required/>
        <br/> 
        Aukiolot:<br/>
        <input type ="text" name="Aukiolo" id="styled" required/>
        <br/>
        Hinnasto:<br/>
        <input type="text" name="Hinnasto" id="styled" required/>
        <br/>
        Baarin kuvaus:<br/>
        <input type="text" name="lyhytKuvaus" id="styled"  required /> 
        <br/>
    <input type="file" id="nappula" name="fileToUpload" id="fileToUpload"/>
    <br/>
    <input type="submit" id="nappula" name="submit" value="Lähetä"/>
    
     
</form>
<?php


if(isset($_POST["submit"])){
    
   
try {
$tiedot = "INSERT INTO A_Baari (BNimi, BOsoite, Osoite, Aukiolo, Hinnasto, lyhytKuvaus) VALUES ('".$_POST["BNimi"]."','".$_POST["BOsoite"]."','".$_POST["Osoite"]."','".$_POST["Aukiolo"]."','".$_POST["Hinnasto"]."','".$_POST["lyhytKuvaus"]."')";

if ($DBH->query($tiedot)) {
 echo "onnistui";
$lastID=$DBH->lastInsertId();
    
$data["Baari"]=$lastID;
$like = $DBH->prepare("INSERT INTO A_Arvostelu (ABaari, ALike) VALUES (:Baari, 0)");
    $like->execute($data);
    
include("baariupload.php");
}
else{
echo "ei onnannu";
}

$DBH = null;
}
catch(PDOException $e)
{
echo $e->getMessage();
}

}
   
?>

     </div>
    
<footer>
        <p><a href="#" onclick="history.go(-1)"> © Kallionkierros 2016 </a></p>
    </footer>
</body>
</html>


