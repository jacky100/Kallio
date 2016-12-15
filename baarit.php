<?php
include('config/config.php')
    
  
?>

    <?php //saadaan baarien tiedot sivuille  
    $data["Baari"]=$_GET["Baari"];  
   $tiedot = $DBH->prepare("SELECT BKuva, BID, BNimi, Osoite, Aukiolo, Hinnasto FROM A_Baari WHERE BID = :Baari");
        $tiedot->execute($data); 
       
        $baari = $tiedot->fetch();        
?>



    <?php //tykkäykset
    if(!empty($_GET['Baari'])){
                $data["Baari"]=$_GET["Baari"];
                $sql = $DBH->prepare("UPDATE A_Arvostelu SET ALike = ALike+1 WHERE ABaari = :Baari");
                $sql->execute($data);
              
      $sql = $DBH->prepare("SELECT ALike FROM A_Arvostelu WHERE ABaari = :Baari");
                $sql->execute($data); 
        
        $rivi = $sql->fetch();
        
       
   
    }

?>



    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>
            <?php echo $baari['BNimi']; ?>
        </title>

        <link rel="icon" href="img/logo.png">
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

            <main>
                <div class="pääkuva">
                    <img src="<?php echo $baari['BKuva']; ?>" alt="<?php echo $baari['BNimi']; ?>">
                </div>
                <div class="laatikko">
                    <h1>
                        <?php echo $baari['BNimi']; ?>
                    </h1>
                </div>


                <div class="laatikko">
                    <div class="vierekkäin">
                        <ul>
                            <li>
                                Osoite: <b>
                             <?php echo $baari['Osoite']; ?>
                            </b>
                            </li>
                            <li>
                                Aukioloajat: <b>  
                            <?php echo $baari['Aukiolo']; ?>
                            </b>
                            </li>
                            <li>
                                Hintoja: <b> 
                            <?php echo $baari['Hinnasto']; ?>
                            </b>
                            </li>
                        </ul>
                    </div>
                    <div class="vierekkäin">

                        <?php echo ('Tykkäyksiä: ' . $rivi["ALike"]); ?>

                        <a class="foo" href="baarit.php?Baari=<?php echo $baari['BID']; ?>">

                            <img src="img/tykkäys.png" />
                            <img src="img/tykkäyshover.png" />
                        </a>
                        
                    </div>
                </div>
                <div class="laatikko">

                    <ul class="kuvat">


                        <?php //kuvien lisäys
     $sql = $DBH->prepare('SELECT Klinkki FROM A_Kuva WHERE KBaari = :Baari');
     $sql->execute($data);
              
     while($url = $sql->fetch(PDO::FETCH_COLUMN)){
          echo('<img src="'.$url.'">');    
        }  
?>
                    </ul>
                </div>

                <div class="laatikko">
                    <div class="klisäys">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            Valitse haluamasi kuva:
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="hidden" name="BID" value="<?php echo $baari['BID']; ?>">
                            <input type="submit" value="Lataa Kuva" id="nappula" name="submit">
                        </form>
                    </div>



                    <div>
                        <div class="laatikko">
                            <div class="formit">
                                <form action="baarit.php?Baari=<?php echo $baari ['BID'];?>" method="post">
                                    <textarea type="text" name="nimi" id="styled" placeholder="Kirjoita nimesi"  value="<?php echo $nimi;?>"></textarea>
                                    <br/><br/>

                                    <textarea name="kommentti" id="styled"  placeholder="Kirjoita kommentti" value="<?php echo $kommentti;?>"></textarea>
                                    <br/><br/>
                                    <input type="submit" name="submit" id="nappula" value="kommentoi">
                            
                            </form>
                                </div>
<?php
date_default_timezone_set('Europe/Helsinki');
                            
if(isset($_POST["submit"])){
    
    if(empty($_POST["nimi"]) || empty($_POST["kommentti"]))
    {
        
        echo'Anna nimi ja kommentti!';
    } else {

    
    
try {

$sql = "INSERT INTO A_Kommentti (nimi, kommentti, KOBaari, KDate)
VALUES ('".$_POST["nimi"]."','".$_POST["kommentti"]."','".$_GET["Baari"]."','".date('Y.m.d'). "')";
if ($DBH->query($sql)) {
 //echo "onnistui";
}
else{
echo "ei onnannu";
}

$dbh = null;
}
catch(PDOException $e)
{
echo $e->getMessage();
}

}
    
}
?>
<div class="kommentit">
                                <?php //kommentointi
     $sql = $DBH->prepare('SELECT nimi, kommentti, KDate FROM A_Kommentti WHERE KOBaari = :Baari');
     $sql->execute($data);
    
     while($kommentti = $sql->fetch(PDO::FETCH_OBJ)){
          echo($kommentti->KDate . '  ' . $kommentti->nimi . ': ' . $kommentti->kommentti . '<br>');    
        }  

?>
                            </div>
                        </div>

                        <a href="kallionkierros.php">
                            <p style="text-align:center">Etusivulle</p>
                        </a>
                        <a href="#top">
                            <p style="text-align:center">Takaisin ylös</p>
                        </a>

                    </div>
            </main>
            <footer>
                <p> © KallionKierros 2016</p>
            </footer>
    </body>

    </html>
