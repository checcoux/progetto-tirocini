<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <title>Scopri le aziende</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>
  </head>
  <body>
    <header>
      <a id="logo1" href="/">Portale<br>dei tirocini<br>d'azienda</a>
      <span id="logo2">Università<br>degli studi<br>di Udine</span>
	    <div class="gooey-rec"></div>
    </header>
    <main>
      <h2>Scopri le aziende</h2>
      <?php
        $link = mysqli_connect("db.ccns.it", "tirocinio_user","Tirocinio2020!");
        mysqli_select_db($link, "progetto_tirocinio");
        $query = mysqli_query($link, "SELECT * FROM aziende");
        while ($azienda = mysqli_fetch_assoc($query)) {
          echo '<a href="azienda.php?id='.$azienda['id'].'">
                  <div class="scopriAzienda">
                    <img src="https://picsum.photos/seed/'.$azienda['id'].'/100/100?grayscale\"/>
                    <div>
                      <h2>'.$azienda['nome'].'</h2>
                      <h4>'.$azienda['indirizzo'].', '.$azienda['comune'].'</h4>
                      <h5>
                        <span>TIROCINI</span>
                        <span>IN CORSO</span>
                        <span>'.$azienda['tirociniAttivi'].'</span>
                        <span>COMPLETATI</span>
                        <span>'.$azienda['tirociniCompletati'].'</span>
                      </h5>
                    </div>
                  </div>
                </a>';
        }
      ?>
    </main>
  </body>
</html>
