<?php
 include_once "config/config.php";

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
    
    <div class="teksti">
    
    <?php



        
if(isset($_POST['submit']))
{
    if(!empty($_POST['user']) && !empty($_POST['pass']) && isset($_POST['submit']))
    {
        
        $userdata["Nimimerkki"]=$_POST['user'];
        $userdata["Salasana"]= $_POST['pass'];

        
            if(login($_POST['user'], $_POST['pass'],$DBH)){
                echo("<br/>");
                echo('Tervetuloa K.K tiimi');
                echo '<br/><br/>';
                echo('<a href=login.php>Kirjaudu ulos</a>');
                echo '<br/><br/>';
                echo('<a href=poistaminen.php>Kommenttien ja kuvien poistaminen');
                echo("<br/><br/>");
                echo('<a href=baarilisays.php>Baarin lisääminen</a>');
                echo("<br/><br/>");
         
            }else{
                echo("<br/>");
                echo("Väärä nimi tai salasana");
                
                
            }

    }
    
}
    
    ?>
    </div>
    
<footer>
        <p> © Kallionkierros 2016</p>
    </footer>
</body>
</html>

