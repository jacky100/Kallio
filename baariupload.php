<?php
include_once("config/config.php");
                    //lisää tekstitedot tietokantaan kun ne on lisätty niin sen jälkeen file upload. kuvien ei oo insert vaan update, muista vaihata kansio img
$target_dir = "uploads/";
$target_file = $target_dir .time(). basename($_FILES["fileToUpload"]["name"]); //url--BKuva--linkki
print_r($_FILES);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
        echo($target_file);
        $data["BKuva"]=$target_file;
        $data["Baari"]=$lastID;
        try {
        $sql = $DBH->prepare("UPDATE A_Baari SET BKuva = :BKuva WHERE A_Baari.BID = :Baari");
        if ($sql->execute($data)){

        }else {
            echo("ei onnistunut");
        }
        }catch(PDOException $e){
            echo("Error adding t database");
        }
        //kirjota tähän kuva tietokantaan
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

//sivun alkuun ja sit noi echon sisälle

?>
            

