<?php

 include_once "config/config.php";


$nimi = '';
$kommentti = '';
$KOBaari ='';

function getPost()
{
    $posts = array();
  
    $posts[1] = $_POST ['nimi'];
    $posts[2] = $_POST ['kommentti'];
    
    return $posts;
    
}

if (isset($_POST['submit']))
{
    $data = getPost();
    if(empty($data[1]) || empty($data[2]))
    {
        
        echo'Syötä tietoja!';
    } else {
        
        $insertStmt = $DBH->prepare('INSERT INTO A_Kommentti(nimi,kommentti,KOBaari)VALUES(:nimi,:kommentti, 2 )');
        $insertStmt->execute(array(
        ':nimi'=> $data[1],
        ':kommentti'=> $data[2],
    ));
     
    if($insertStmt)
    {
        

            echo ('kommentti lisätty');
        } else ( "ei lisätty");
    }
        
    }

    

        
?>


<!DOCTYPE html>
<html>
<h3>Kommentit</h3>
<head>
    <title></title>
</head>
<body>
   

        
 <form action="baarit.php?Baari=<?php echo $baari ['BID'];?>" method="post">
     
    
    <input type="text" name="nimi" placeholder="Kirjoita nimesi" value="<?php echo $nimi;?>"><br/><br/>
    <textarea name="kommentti" placeholder="Kirjoita kommentti" value="<?php echo $kommentti;?>"></textarea><br/><br/>
    <input type="submit" name="submit" value="kommentoi">  
     
</form>
</body>
</html>