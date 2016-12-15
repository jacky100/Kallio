
    
   
<!DOCTYPE html>
<html>
<head>
    <title>Kirjautuminen</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" type="text/css" href="tyyli.css">
</head>
<body class="minttu">
    
    <header>
        <a href="kallionkierros.php">
            <img style="width: 100%" src="img/kkhed.png">
        </a>
    </header>
<div class="flogin">
<form  method="POST" action="logout.php">
        
    Käyttäjätunnus:<br><input type="text"  name = "user" placeholder="Nimi"  /><br />
        Salasana:<br><input type="password" name = "pass" placeholder="Salasana" /><br /><br />
    <btn><input type="submit" name="submit" value="Kirjaudu sisään" /></btn>
        
</form>
    </div> 
    
    <?php
    /*$hashpwd= hash('md5', "Kallio0123".'!!');
    echo("$hashpwd");*/
    
    ?>
<footer>
        <p> © Kallionkierros 2016</p>
    </footer>
</body>
</html>