<?php 
    include_once "config/config.php";
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="img/logo.png">
    <link href="opensans_regular/stylesheet.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet">
</head>
<header>
    <a href="kallionkierros.php"><img style="width: 100%" src="img/kkhed.png"></a>
</header>
<body class="minttu">
    <a name="top"></a>
        <div class="sivu">
            <br/><br/>
                Kommenttien poistaminen
                    <form action="poistaminen.php" method="post"><br/>
                        <textarea type="text" name="ID" placeholder="käyttäjän ID" value="<?php echo $ID;?>"></textarea><br/><br/>
                        <input type="submit" name="delete" value="Poista kommentti"><br/><br/>
                    </form> 

<?php
if(isset($_POST["delete"])){
    try {
            $sql = "DELETE FROM kommentti WHERE ID = '".$_POST["ID"]."'";

            if ($dbh->query($sql)) {
            echo "kommentti poistettu";
            }
                else{
                    echo "poistaminen ei onnistunut";
                }
            $dbh = null;
        }
            catch(PDOException $e){
                echo $e->getMessage();
            }

    }
?>
</body>
<footer>
    <p><a href="#" onclick="history.go(-1)"> © KallionKierros 2016</a></p>
</footer>
</html>