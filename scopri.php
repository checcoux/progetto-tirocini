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
    <h2>Scopri le aziende</h2>

    <?php
      $link = mysqli_connect("db.ccns.it", "tirocinio_user","Tirocinio2020!");
      mysqli_select_db($link, "progetto_tirocinio");
      $query = mysqli_query($link, "SELECT * FROM aziende WHERE tirociniAttivi > 0 OR tirociniCompletati > 0");
      while ($azienda = mysqli_fetch_assoc($query)) {
        echo "<a href=\"/azienda.php?id=".$azienda['id']."\">
              <div class=\"row_azienda\">
                <img src=\"https://picsum.photos/seed/" . $azienda['id'] . "/100/100?grayscale\">
                <div>
                  <h3>" . $azienda['nome'] . "</h3>
                  <h4>" . $azienda['indirizzo'] . ", " .$azienda['comune'] . "</h4>
                  <h5><span class=\"hed\">TIROCINI</span> <span>IN CORSO</span> <span class=\"nmb\">" . $azienda['tirociniAttivi'] . "</span> <span class=\"dsk\">COMPLETATI</span> <span class=\"nmb\">" . $azienda['tirociniCompletati'] . "</span></h5>
                </div>
              </div>
              </a>";
      }
    ?>

  </body>
</html>
