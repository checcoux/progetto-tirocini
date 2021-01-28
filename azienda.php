<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <title>Scopri le aziende</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>

  </head>
  <body>
  <header>
      <a id="logo1" href="/">Portale<br>dei tirocini<br>d'azienda</a>
      <span id="logo2">Università<br>degli studi<br>di Udine</span>
	    <div class="gooey-rec"></div>
    </header>

    <?php
      $id = $_GET["id"];
      $link = mysqli_connect("db.ccns.it", "tirocinio_user","Tirocinio2020!");
      mysqli_select_db($link, "progetto_tirocinio");
      $query = mysqli_query($link, "SELECT * FROM aziende WHERE id = '$id'");
      $stato = 0;
      
      $query2 = mysqli_query($link, "SELECT * FROM tirocini WHERE azienda = '$id' and stato=0 and dataInizio <= CURDATE()");

      $query3 = mysqli_query($link, "SELECT * FROM tirocini WHERE azienda = '$id' and stato=1"); //and dataFine <= CURDATE() se con relazione e terminati temporalmente 

    
      while ($azienda = mysqli_fetch_assoc($query)) {
        echo "<div class=\"row_azienda alt\">
                <img src=\"https://picsum.photos/seed/" . $azienda['id'] . "/100/100?grayscale\">
                <div>
                  <h2>" . $azienda['nome'] . "</h2>
                  <h3 class='descrizioneaz'>" . $azienda['descrizione'] . "</h3>
                  <h4>" . $azienda['indirizzo'] . ", " .$azienda['comune'] . "</h4>
                  <h5><span class=\"hed\">TIROCINI</span> <span>IN CORSO</span> <span class=\"nmb\">" . $azienda['tirociniAttivi'] . "</span> <span class=\"dsk\">COMPLETATI</span> <span class=\"nmb\">" . $azienda['tirociniCompletati'] . "</span></h5>
                </div>
              </div>";
              $stato++;
      }
    
      if (mysqli_num_rows($query2) > 0) {
        
        echo '<h2 id="incorso" class="titoloSezioneAzienda">Tirocini in corso</h2>';
        
        while ($tirocinioAttivo = mysqli_fetch_assoc($query2)) {
          echo "<div class=\"row_azienda alt2\">              
                  <div>
                    <h2>" . $tirocinioAttivo['nome'] . " " . $tirocinioAttivo['cognome'] . "</h2>                
                    <h5><span>DATA DI INIZIO</span> <span class=\"nmb\">" . $tirocinioAttivo['dataInizio'] . "</span></h5>
                  </div>
                </div>";
                $stato++;
        }
      } 

      if (mysqli_num_rows($query3) > 0) {
        
        echo '<h2 id="completati" class="titoloSezioneAzienda">Tirocini completati</h2>';
        
        while ($tirocinioCompletato = mysqli_fetch_assoc($query3)) {
          echo "<div class=\"row_azienda alt2\">              
                  <div>
                    <h2>" . $tirocinioCompletato['nome'] . " " . $tirocinioCompletato['cognome'] . "</h2>   
                    <h4>" . $tirocinioCompletato['relazione'] . "</h4>             
                    <h5><span>DATA DI INIZIO</span> <span class=\"nmb\">" . $tirocinioCompletato['dataInizio'] . "</span> <span class=\"dsk\">DATA FINE </span> <span class=\"nmb\">" . $tirocinioCompletato['dataFine'] . "</span></h5>
                  </div>
                </div>";
                $stato++;
        }
      } 

      if ($stato ==0) {echo '
        <div class="contenuto-centrato">
          <h2>Questa azienda non esiste</h2>
        </div>';}
    ?>
    <!-- INSERIRE BREVE DESCRIZIONE AZIENDA -->

  </body>
</html>
