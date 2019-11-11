<?php 
require_once("config/config.php"); 
?>
<!DOCTYPE html>
<html>
<head>
<title>K.K. tiimi</title>
    
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<header>
    <a href="kallionkierros.php">
        <img style="width: 100%" src="img/kkhed.png">
    </a>
</header>
<body class="minttu">
    <div class="laatikko">
        <div class="teksti">
            <form action="baarilisays.php" method="post" enctype="multipart/form-data">
                Baarin Nimi:<br/>
                <input type="text" name="nimi" id="styled" required/>
                <br/>
                Koordinaatit:<br/>
                <input type="text" name="koordinaatit" id="styled" required/>
                <br/>
                Katuoisoite:<br/>
                <input type="text" name="osoite" id="styled" required/>
                <br/> 
                Aukiolot:<br/>
                <input type ="text" name="aukiolo" id="styled" required/>
                <br/>
                Hinnasto:<br/>
                <input type="text" name="hinnasto" id="styled" required/>
                <br/>
                Baarin kuvaus:<br/>
                <input type="text" name="kuvaus" id="styled"  required /> 
                <br/>
                
                <input type="file" id="nappula" name="fileToUpload" id="fileToUpload"/>
                <br/>
                <input type="submit" id="nappula" name="submit" value="Lähetä"/>   
            </form>

            <?php
                if(isset($_POST["submit"])){ 
                    try {
                    $tiedot = "INSERT INTO baari (nimi, koordinaatit, osoite, aukiolo, hinnasto, kuvaus) VALUES ('".$_POST["nimi"]."','".$_POST["koordinaatit"]."','".$_POST["osoite"]."','".$_POST["aukiolo"]."','".$_POST["hinnasto"]."','".$_POST["kuvaus"]."')";

                    if ($dbh->query($tiedot)) {
                    echo "onnistui";
                    $lastID=$dbh->lastInsertId();
                        
                    $data["baari"]=$lastID;
                    $like = $dbh->prepare("INSERT INTO arvostelu (baari, likes) VALUES (:baari, 0)");
                    $like->execute($data);
                        
                    include("kuvanlisays.php");
                    }
                    else{
                        echo "ei onnannu";
                    }

                    $dbh = null;
                    }
                    catch(PDOException $e){
                        echo $e->getMessage();
                    }

                    }
            ?>
        </div>
    </div>
</body>
<footer>
    <p><a href="#" onclick="history.go(-1)"> © Kallionkierros 2016 </a></p>
</footer>
</html>


