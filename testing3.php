<!DOCTYPE html>
<html>
    <head>
        <style>
    body{
        font-family: verdana;
        };
        </style>
    </head>
    <body>
<?php 
require_once("config/config.php");  //Miten hakemistopolut?
        

//Avataan tietokantayhteys

?>

<p>Hakulomake:</p>
<form>
Millä perusteella haluat hakea baaria?<br />
   <input type="submit" name="eka" value="Kaljojen hinnat"> Halvin tuoppi <br>
    <input type="submit" name="toka" value="Suosituin baari"> Suosituin mesta <br>

</form> 
<br />
        
<?php
    if(!empty($_GET['eka'])){

                $kysely6 = $DBH->prepare("SELECT BNimi, Hinnasto FROM A_Baari ORDER BY Hinnasto DESC");
                $kysely6->execute();

                while($rivi = $kysely6->fetch()) {
                echo ($rivi["BNimi"] . $rivi["Hinnasto"]) . "<br />";
    }
        
    }      
        
     if(!empty($_GET['toka'])){

                $kysely6 = $DBH->prepare("SELECT A_Arvostelu.ALike as Arvostelu,
                A_Baari.BNimi as Ravintola
                FROM A_Arvostelu
                INNER JOIN A_Baari
                ON A_Arvostelu.ABaari = A_Baari.BID ORDER BY ALike DESC LIMIT 2");
                $kysely6->execute();

                while($rivi = $kysely6->fetch()) {
                echo ($rivi["Ravintola"] . $rivi["Arvostelu"]) . "<br />";
    }
        
    }          
?>    
 
        
        <form>
        <input 
                name="Baari" type="submit" value="Kaljojen hinnat">
       
        </form>
        
        
        <?php //tykkäykset
    if(!empty($_GET['Baari'])){
                $sql = $DBH->prepare("UPDATE A_Arvostelu SET ALike = ALike+1 WHERE ABaari = 2");
                $sql->execute($data);
        
  
      $sql = $DBH->prepare("SELECT ALike FROM A_Arvostelu WHERE ABaari = 2");
        
  
     $sql->execute($data); 
              
        
        $rivi = $sql->fetch();
        echo ('Tykkäyksiä: ' . $rivi["ALike"]);
    }
             
  ?>     


                      



