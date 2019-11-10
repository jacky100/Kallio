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
    <?php
        session_start();

        if(isset($_POST['logout'])) {
            session_start();
            session_destroy();

            header('location: index.php');
        }
    ?>

    <div class="teksti">
        <?php
            echo("<br/>");
            echo('Tervetuloa K.K tiimi');
            echo '<br/><br/>';
            echo $_SESSION['username'];
            echo '<br/><br/>';
            echo('<a href=poistaminen.php>Kommenttien ja kuvien poistaminen');
            echo("<br/><br/>");
            echo('<a href=baarilisays.php>Baarin lisääminen</a>');
            echo("<br/><br/>");
        ?>

        <form name="logout" method="post" enctype="multipart/form-data">
            <input type="submit" name="logout" value="Logout">
        </form>
    </div>
        <br/> 
</body> 
<footer>
    <p> © Kallionkierros 2016</p>
</footer>
</html>