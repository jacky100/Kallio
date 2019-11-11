<?php 
require_once("config/config.php"); 
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kallionkierros</title>

    <link rel="icon" href="img/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet">
    </head>
    <header>
        <a href="index.php"><img style="width: 100%;" src="img/kkhed.png"></a>
    </header>

    <body>
        <?php 
            include("map.php"); 
        ?>
            <div class="container">
                <div class="col">
                    <form class="barsearch">
                        Millä perusteella haluat hakea baaria?
                            <input type="submit" id="nappula" name="hinnat" value="Kaljojen hinnat">
                            <input type="submit" id="nappula" name="suosittu" value="Suosituin baari">
                    </form> 
                        <?php
                            if(!empty($_GET["hinnat"])){
                                $sql = $dbh->prepare ("SELECT nimi, hinnasto FROM baari ORDER BY hinnasto DESC");
                                $info = $sql->execute();

                                if (!$info){print_r ($sql->errorInfo());}
                                    while($row = $sql->fetch()) {
                                        echo ($row["nimi"] .": " . $row["hinnasto"]) . "<br />";  
                                    }
                                }       
                        
                            if(!empty($_GET["suosittu"])){
                                $sql = $dbh->prepare ("SELECT arvostelu.likes as thumbs, baari.nimi as pub FROM arvostelu INNER JOIN baari ON arvostelu.baari = baari.ID ORDER BY likes DESC LIMIT 2");
                                $infoo = $sql->execute();

                                if (!$infoo){print_r ($sql->errorInfo());}
                                    while($row = $sql->fetch()) {
                                        echo ($row["pub"] .": tykkäyksiä " . $row["thumbs"]) . "<br />";  
                                    }
                                }         
                        ?>        
                </div>    
            </div>
        <footer>
            <p> © Kallionkierros 2016</p>
        </footer>
    </body>
</html>