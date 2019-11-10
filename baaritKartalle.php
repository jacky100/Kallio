<?php 
require_once("config/config.php"); 
        $baarit = '[';
              
      $sql = $dbh->prepare("SELECT * FROM baari");
      $sql->execute(); 
      
      while($rivi = $sql->fetch()){
            $baarit .= '["'.$rivi['nimi'].'",';
            $baarit .= $rivi['koordinaatit'].',';    
            $baarit .= '"<div id=\"content\"><div id=\"siteNotice\"></div><h1 id=\"firstHeading\" class=\"firstHeading\"><a href=\"baarit.php?baari='.$rivi['ID'].'\">'.$rivi['nimi'].'</a></h1><div id=\"bodyContent\"><p><b>'.$rivi['nimi'].'</b>, '.$rivi['kuvaus'].'</div></div>"],';
        }
        $baarit = rtrim($baarit, ",");
        $baarit .= ']';
    echo $baarit;
?>