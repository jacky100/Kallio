<!DOCTYPE html>
        <html>

        <head>

            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">


            <link rel="icon" href="img/logo.png">
            <link href="opensans_regular/stylesheet.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet" type="text/css">
            <link href="tyyli.css" rel="stylesheet">

        </head>

        <body class="minttu">
            <a name="top"></a>
            <div class="sivu">

                <header>
                    <a href="kallionkierros.php">
                        <img style="width: 100%" src="img/kkhed.png">
                    </a>
                </header>


<?php 

include_once "config/config.php";

?> 
  <br/><br/>
  Kommenttien poistaminen
  
<form action="poistaminen.php" method="post">
     <br/>
     <textarea type="text" name="CID" placeholder="käyttäjän ID" value="<?php echo $CID;?>"></textarea>
     <br/><br/>
     <input type="submit" name="delete" value="Poista kommentti">
     <br/><br/>
      
</form> 

<?php
if(isset($_POST["delete"])){

try {

$sql = "DELETE FROM A_Kommentti WHERE CID = '".$_POST["CID"]."'";

if ($DBH->query($sql)) {
 echo "kommentti poistettu";
}
else{
echo "poistaminen ei onnistunut";
}

$DBH = null;
}
catch(PDOException $e)
{
echo $e->getMessage();
}

}
?>
                
                
<?php 



?>
<div class="delpic">
  <br/><br/>
  Kuvien poistaminen
  
<form action="poistaminen.php" method="post">
     <br/>
     <textarea type="text" name="KID" placeholder="kuvan ID" value="<?php echo $KID;?>"></textarea>
     <br/><br/>
     <input type="submit" name="del" value="Poista kuva">
     <br/><br/>
      
</form>

<?php

if(isset($_POST["del"])){

try {

$sql = "DELETE FROM A_Kuva WHERE KID = '".$_POST["KID"]."'";

if ($DBH->query($sql)) {
 echo "kuva poistettu";
}
else{
echo "poistaminen ei onnistunut";
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
                <p><a href="#" onclick="history.go(-1)"> © KallionKierros 2016</a></p>
            </footer>
        </body>

        </html>