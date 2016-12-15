<?php
include('config/config.php')
?>
<!DOCTYPE html>
<html>
<body>
<?php 
$sql = $DBH->prepare('SELECT KLinkki FROM A_Kuva WHERE KID = 2');
$sql->execute();
$url = $sql->fetch(PDO::FETCH_COLUMN);

echo('<img src="'.$url.'">');
    
?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Valitse haluamasi kuva:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
