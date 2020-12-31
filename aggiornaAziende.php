<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <title>Nuova azienda</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>
  </head>
  <body>
    <header>
      <span id="logo1">Università<br>degli studi<br>di Udine</span>
      <span id="logo2">Portale<br>dei tirocini<br>d'azienda</span>
    </header>
    <div class="contenuto-centrato">
      <h2>Inserimento dati completato</h2>
      <?php
        $link = mysqli_connect("db.ccns.it", "tirocinio_user","Tirocinio2020!");
        mysqli_select_db($link, "progetto_tirocinio");
        $nome = mysqli_real_escape_string($link, $_GET["nome"]);
        $regione = $_GET["regione"];
        $provincia = $_GET["provincia"];
        $comune = $_GET["comune"];
        $indirizzo = mysqli_real_escape_string($_GET["indirizzo"]);
        $settore = $_GET["settore"];
        $email = $_GET["email"];
        $query = mysqli_query($link, "INSERT INTO aziende (nome, regione, provincia, comune, indirizzo, settore, email) VALUES ('$nome', '$regione', '$provincia', '$comune', '$indirizzo', '$settore', '$email')");
        $aziendaID = mysqli_fetch_assoc(mysqli_query($link, "SELECT id FROM aziende WHERE nome='$nome'"))["id"];
        if (!empty($_GET["telefono"])) {
          $telefono = $_GET["telefono"];
          $query = mysqli_query($link, "UPDATE aziende SET telefono='$telefono' WHERE id='$aziendaID'");
        }
        if (empty($_GET["telefono"])==false) {
          $web = $_GET["web"];
          $query = mysqli_query($link, "UPDATE aziende SET web='$web' WHERE id='$aziendaID'");
        }
        echo "<p>I dati dell'azienda sono stati inseriti correttamente nel database.</p>";
        mysqli_close($link);
      ?>
    </div>
    <img class="aggiorna-img" src="img/undraw_Business_decisions_re_84ag.svg">
  </body>
</html>
