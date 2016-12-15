<?php
include('config/config.php')
?>
 

    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tenho</title>

        <link rel="icon" href="img/logo.png">
        <link href="opensans_regular/stylesheet.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet" type="text/css">
        <link href="tyyli.css" rel="stylesheet">
        
      
        
        

    </head>

    <body class="minttu">
        <a name="top"></a>
        <div class="sivu">

            <header>
                <a href="kallionkierros.html">
                    <img style="width: 100%" src="img/kkhed.png">
                </a>
            </header>

            <main>
               <a class="foo" href="#">
                    <img src="img/paakonttori.jpg" />
                    <img src="img/tenhokuva.jpg" />
                </a>
                
                
                <div class="laatikko">
                    <h1>TENHO</h1>
                </div>


                <div class="laatikko">
                    <ul>
                        <li>
                            Osoite: <b>
                             Helsinginkatu 15, toinen kerros
                             00500 Helsinki 
                            </b>
                        </li>
                        <li>
                            Aukioloajat: <b>arkisin xx-xx vklp xx-xx	</b>
                        </li>
                        <li>
                            Tuoppi: <b> karhu IV 3,5€</b>
                        </li>

                    </ul>
                </div>
                <div class="laatikko">
             
                    <ul class="kuvat">
                    
                    <?php 
                    $sql = $DBH->prepare('SELECT Klinkki FROM A_Kuva WHERE KBaari = :Baari');
                    $sql->execute();
             
                    while($url = $sql->fetch(PDO::FETCH_COLUMN)){
                        echo('<img src="'.$url.'">');
                        }                

                    ?>
                     
                    </ul>
                </div>
                <div class="laatikko">
                    <div class="klisäys">
                    <form action="upload.php" method="post" enctype="multipart/form-data"> 
                        Valitse haluamasi kuva:
                        <input type="file" name="fileToUpload" id="fileToUpload" >
                        <input type="submit" value="Upload Image" name="submit">
                    </form>
                    </div>
                    <a href="kallionkierros.html">
                        <p style="text-align:center">Etusivulle</p>
                    </a>
                    <a href="#top">
                        <p style="text-align:center">Takaisin ylös</p>
                    </a>
                     </div>
                
            </main>
        </div>
        <footer>
            <p> © KallionKierros 2016</p>
        </footer>
    </body>

    </html>
