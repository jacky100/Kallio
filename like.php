<?php 
require_once("config/config.php"); 
?>
<link href="tyyli.css" rel="stylesheet">
<?php //tykkäykset
    if(!empty($_GET['Baari'])){
                $sql = $DBH->prepare("UPDATE A_Arvostelu SET ALike = ALike+1 WHERE ABaari = 2");
                $sql->execute();
              
      $sql = $DBH->prepare("SELECT ALike FROM A_Arvostelu WHERE ABaari = 2");
                $sql->execute(); 
        
        $rivi = $sql->fetch();
    }
  ?>     

   <?php echo ('Tykkäyksiä: ' . $rivi["ALike"]); ?>

                        <a class="foo" href="like.php"  >

                            <img src="img/tykkäys.png" />
                            <img src="img/tykkäyshover.png" name="Baari" />
                        </a>
