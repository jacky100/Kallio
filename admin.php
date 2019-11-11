<?php
include("config/config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Sivu</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<header>
    <a href="admin.php">
        <img style="width: 100%" src="img/kkhed.png">
    </a>
</header>
<body class="minttu">

    <div class="teksti">
        <?php
            echo("<br/>");
            echo('Tervetuloa K.K tiimi');
            echo '<br/><br/>';
            echo '<br/><br/>';
            echo('<a href=poistaminen.php>Kommenttien ja kuvien poistaminen');
            echo("<br/><br/>");
            echo('<a href=baarilisays.php>Baarin lisääminen</a>');
            echo("<br/><br/>");

        ?>
<?php  
include("logout.php");
?>
    </div>
        <br/> 
</body> 
<footer>
    <p> © Kallionkierros 2016</p>
</footer>
</html>