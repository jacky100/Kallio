<?php
require_once("config/config.php");
?>
<?php
    if(isset($_POST['login'])) {
            $username = ($_POST['username']);
            $password =( $_POST['password']);

            $query = $dbh->prepare("SELECT * FROM user WHERE username='$username' AND passw='$password'");
            $query->execute();

            $count = $query->fetchColumn();

            if($count == 1){
                $_SESSION['username'] = $username;
                header('location: admin.php');
            }
                else {
                    echo "Error: Incorrect Details!";
            }

        }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kirjautuminen</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<header>
    <a href="index.php"><img style="width: 100%" src="img/kkhed.png"></a>
</header>
<body class="minttu">
    <div class="flogin">
        <form name="login" method="post">
            <input type="text" placeholder="Username" name="username"><br />
            <input type="text" placeholder="Password" name="password" ><br />
            <input type="submit" name="login"  value="Login">   
        </form>
    </div> 
</body>
<footer>
    <p> © Kallionkierros 2016</p>
</footer>
</html>
