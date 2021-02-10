<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <title>Scopri le aziende</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>
  <body>
  <header>
      <a id="logo1" href="/">Portale<br>dei tirocini<br>d'azienda</a>
      <span id="logo2">Università<br>degli studi<br>di Udine</span>
	    <div class="gooey-rec"></div>
    </header>
      <?php
        if (empty($_GET)) {
          echo '<div class="contenutoCentrato">
            <h2>Ci dispiace</h2>
            <p>L\'azienda che hai cercato non esiste. Puoi provare a <a href="/scopri.php">cercarne un\'altra</a> oppure <a href="/">tornare alla home</a>.</p>
          </div>';
        } else {
          $id = $_GET["id"];
          $link = mysqli_connect("db.ccns.it", "tirocinio_user","Tirocinio2020!");
          mysqli_select_db($link, "progetto_tirocinio");
          $query = mysqli_query($link, "SELECT * FROM aziende WHERE id = '$id'");
          $stato = 0;
          $query2 = mysqli_query($link, "SELECT * FROM tirocini WHERE azienda = '$id' and stato=0 and dataInizio <= CURDATE()");
          $query3 = mysqli_query($link, "SELECT * FROM tirocini WHERE azienda = '$id' and stato=1"); //and dataFine <= CURDATE() se con relazione e terminati temporalmente
          while ($azienda = mysqli_fetch_assoc($query)) {
            echo '<main><div class="aziendaScheda">
                    <img src="https://picsum.photos/seed/'.$azienda['id'].'/100/100?grayscale\">
                    <div>
                      <h2>'.$azienda['nome'].'</h2>
                      <h3 class=descrizioneAzienda>'.$azienda['descrizione'].'</h3>
                      <h4>'.$azienda['indirizzo'].', '.$azienda['comune'].'</h4>
                      <h5>
                        <span>TIROCINI</span>
                        <span>IN CORSO</span>
                        <span>'.$azienda['tirociniAttivi'].'</span>
                        <span>COMPLETATI</span>
                        <span>'.$azienda['tirociniCompletati'].'</span>
                      </h5>
                    </div>
                  </div>';
            $stato++;
          }
          if (mysqli_num_rows($query2) > 0) {
            echo '<h2 class="aziendaTirociniTitolo">Tirocini in corso</h2>';
            while ($tirocinioAttivo = mysqli_fetch_assoc($query2)) {
              echo '<div class="aziendaTirocinio">
                      <h2>'.$tirocinioAttivo['nome'].' '.$tirocinioAttivo['cognome'].'</h2>
                      <h5>
                        <span>DATA DI INIZIO</span>
                        <span>'.$tirocinioAttivo['dataInizio'].'</span>
                      </h5>
                    </div>';
              $stato++;
            }
          }
          if (mysqli_num_rows($query3) > 0) {
            echo '<h2 class="aziendaTirociniTitolo">Tirocini completati</h2>';
            while ($tirocinioCompletato = mysqli_fetch_assoc($query3)) {
              echo '<div class="aziendaTirocinio">
                      <h2>'.$tirocinioCompletato['nome'].' '.$tirocinioCompletato['cognome'].'</h2>
                      <h4>'.$tirocinioCompletato['relazione'].'</h4>
                      <h5>
                        <span>DATA DI INIZIO</span>
                        <span>'.$tirocinioCompletato['dataInizio'].'</span>
                        <span>DATA FINE</span>
                        <span>'.$tirocinioCompletato['dataFine'].'</span>
                      </h5>
                    </div>';
              $stato++;
            }
          }
        }
        echo "</main>"
      ?>
    </main>
  </body>
</html>
