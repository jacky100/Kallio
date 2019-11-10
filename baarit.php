
<?php
include('config/config.php') 
?>

    <?php //saadaan baarien tiedot sivuille  
    $data["baari"]=$_GET["baari"];  
    $tiedot = $dbh->prepare("SELECT ID, nimi, osoite, aukiolo, hinnasto, kuva FROM baari WHERE ID = :baari");
    $tiedot->execute($data); 
       
    $baari = $tiedot->fetch();        
?>



    <?php //tykkäykset
    if(!empty($_GET['baari'])){
                $data["baari"]=$_GET["baari"];
                $sql = $dbh->prepare("UPDATE arvostelu SET likes = likes+1 WHERE baari = :baari");
                $sql->execute($data);
              
      $sql = $dbh->prepare("SELECT likes FROM arvostelu WHERE baari = :baari");
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
            <?php echo $baari['nimi']; ?>
        </title>

        <link rel="icon" href="img/logo.png">
        <link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet">
        

    </head>

    <body class="minttu">
        <a name="top"></a>
        <div class="sivu">

            <header>
                <a href="index.php">
                    <img style="width: 100%" src="img/kkhed.png">
                </a>
            </header>

            <main>
                <div class="pääkuva">
                    <img src="<?php echo $baari['kuva']; ?>" alt="<?php echo $baari['nimi']; ?>">
                </div>
                <div class="container">
                    <h1>
                        <?php echo $baari['nimi']; ?>
                    </h1>
            


                    <div class="vierekkäin">
                        <ul>
                            <li>
                                Osoite: <b>
                             <?php echo $baari['osoite']; ?>
                            </b>
                            </li>
                            <li>
                                Aukioloajat: <b>  
                            <?php echo $baari['aukiolo']; ?>
                            </b>
                            </li>
                            <li>
                                Hintoja: <b> 
                            <?php echo $baari['hinnasto']; ?>
                            </b>
                            </li>
                        </ul>
                        </div>

                        <div class="vierekkäin">

                        <ul>
                        <li>
                
                        <?php echo ('Tykkäyksiä: ' . $rivi["likes"]); ?>

                        <a class="foo" href="baarit.php?baari=<?php echo $baari['ID']; ?>">

                            <img src="img/tykkäys.png" />
                            <img src="img/bisse.png" />
                        </a>
                        </li>
                        </ul>
                        </div>
                </div>

                    <ul class="kuvat">


                        <?php //kuvien lisäys
     $sql = $dbh->prepare('SELECT linkki FROM kuva WHERE baari = :baari');
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
                            <input type="hidden" name="ID" value="<?php echo $baari['ID']; ?>">
                            <input type="submit" value="Lataa Kuva" id="nappula" name="submit">
                        </form>
                    </div>



                    <div>
                        <div class="laatikko">
                            <div class="formit">
                                <form action="baarit.php?baari=<?php echo $baari ['ID'];?>" method="post">
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

$sql = "INSERT INTO kommentti (nimi, kommentti, baari, dates)
VALUES ('".$_POST["nimi"]."','".$_POST["kommentti"]."','".$_GET["baari"]."','".date('Y.m.d'). "')";
if ($dbh->query($sql)) {
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
     $sql = $dbh->prepare('SELECT nimi, kommentti, dates FROM kommentti WHERE baari = :baari');
     $sql->execute($data);
    
     while($kommentti = $sql->fetch(PDO::FETCH_OBJ)){
          echo($kommentti->dates . '  ' . $kommentti->nimi . ': ' . $kommentti->kommentti . '<br>');    
        }  

?>
                            </div>
                        </div>

                        <a href="index.php">
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
