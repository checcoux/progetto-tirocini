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
        $link = mysqli_connect("localhost", "root");
        mysqli_select_db($link, "test");
        $nome = $_GET["nome"];
        $regione = $_GET["regione"];
        $provincia = $_GET["provincia"];
        $comune = $_GET["comune"];
        $indirizzo = $_GET["indirizzo"];
        $settore = $_GET["settore"];
        $email = $_GET["email"];
        $query = mysqli_query($link, "INSERT INTO aziende (nome, regione, provincia, comune, indirizzo, settore, email) VALUES ('$nome', '$regione', '$provincia', '$comune', '$indirizzo', '$settore', '$email')");
        if (!empty($_GET["telefono"])) {
          $telefono = $_GET["telefono"];
          $query = mysqli_query($link, "INSERT INTO aziende (telefono) VALUES ('$telefono')");
        }
        if (empty($_GET["telefono"])==false) {
          $web = $_GET["web"];
          $query = mysqli_query($link, "INSERT INTO aziende (web) VALUES ('$web')");
        }
        mysqli_close($link);
        echo "<p>I dati dell'azienda sono stati inseriti correttamente nel database.</p>";
      ?>
    </div>
    <img class="aggiorna-img" src="img/undraw_Business_decisions_re_84ag.svg">
  </body>
</html>
