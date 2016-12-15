<?php 
require_once("config/config.php"); 
        $baarit = '[';
              
      $sql = $DBH->prepare("SELECT * FROM A_Baari ");
                $sql->execute(); 
        
        while($rivi = $sql->fetch()){
            $baarit .= '["'.$rivi['BNimi'].'",';
            $baarit .= $rivi['BOsoite'].',';    
            $baarit .= '"<div id=\"content\"><div id=\"siteNotice\"></div><h1 id=\"firstHeading\" class=\"firstHeading\"><a href=\"baarit.php?Baari='.$rivi['BID'].'\">'.$rivi['BNimi'].'</a></h1><div id=\"bodyContent\"><p><b>'.$rivi['BNimi'].'</b>, '.$rivi['lyhytKuvaus'].'</div></div>"],';
        }
        $baarit = rtrim($baarit, ",");
        $baarit .= ']';
    echo $baarit;
?>