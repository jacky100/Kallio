<?php
        session_start();

        if(isset($_POST['logout'])) {
            session_start();
            session_destroy();

            header('location: index.php');
        }
    ?> 
    
<form name="logout" method="post" enctype="multipart/form-data">
    <input type="submit" name="logout" value="Logout">
</form>