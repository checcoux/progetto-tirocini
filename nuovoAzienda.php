<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <title>Nuova azienda</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script type="text/javascript">
      function caricaProvince(regione) {
        server = "http://localhost/caricaProvince.php?regione="+regione;
        richiesta = new XMLHttpRequest();
        richiesta.onreadystatechange = () => {
          if ((richiesta.readyState == 4) && (richiesta.status == 200)) {
            document.getElementById("province").options.length = 0;
            risposta = JSON.parse(richiesta.response);
            for (var i = 0; i < risposta.length; i++) {
              var id = risposta[i]["id"];
              var nome = risposta[i]["nome"];
              document.getElementById("province").append(new Option(nome, id));
            }
          }
        };
        richiesta.open("GET", server, true);
        richiesta.send(null);
      }
      function caricaComuni(provincia) {
        server = "http://localhost/caricaComuni.php?provincia="+provincia;
        richiesta = new XMLHttpRequest();
        richiesta.onreadystatechange = () => {
          if ((richiesta.readyState == 4) && (richiesta.status == 200)) {
            document.getElementById("comuni").options.length = 0;
            risposta = JSON.parse(richiesta.response);
            for (var i = 0; i < risposta.length; i++) {
              var nome = risposta[i]["nome"];
              document.getElementById("comuni").append(new Option(nome, nome));
            }
          }
        };
        richiesta.open("GET", server, true);
        richiesta.send(null);
      }
    </script>
  </head>
  <body>
    <header>
      <span id="logo1">Università<br>degli studi<br>di Udine</span>
      <span id="logo2">Portale<br>dei tirocini<br>d'azienda</span>
    </header>
    <h2>Inserisci i dati</h2>
    <form action="aggiornaAziende.php" method="get">
      <label for="nome" class="campoRichiesto">Nome</label>
        <input type="text" name="nome" required>
      <label for="regione" class="campoRichiesto">Regione</label>
        <select name="regione" onchange="caricaProvince(this.value)">
          <?php
            $link = mysqli_connect("localhost", "root");
            mysqli_select_db($link, "test");
            $query = mysqli_query($link, "SELECT * FROM regioni");
            while ($regione = mysqli_fetch_assoc($query)) {
              echo '<option value="'.$regione["id"].'">'.$regione["nome"].'</option>';
            }
            mysqli_close($link);
          ?>
        </select>
      <label for="provincia" class="campoRichiesto">Provincia</label>
        <select name="provincia" id="province" onchange="caricaComuni(this.value)" required>
        </select>
      <label for="comune" class="campoRichiesto">Comune</label>
        <select name="comune" id="comuni" required>
        </select>
      <label for="indirizzo" class="campoRichiesto">Indirizzo</label>
        <input type="text" name="indirizzo" required>
      <label for="settore" class="campoRichiesto">Settore</label>
        <select name="settore" required>
          <option value="agricoltura">Agricoltura</option>
          <option value="allevamento">Allevamento</option>
          <option value="architettura">Architettura</option>
          <option value="artigianato">Artigianato</option>
          <option value="audiovisivi">Audiovisivi</option>
          <option value="banca">Banca</option>
          <option value="biblioteca">Biblioteca</option>
          <option value="benessere">Benessere</option>
          <option value="comunicazione">Comunicazione</option>
          <option value="consulenza">Consulenza</option>
          <option value="cosmesi">Cosmesi</option>
          <option value="cultura">Cultura</option>
          <option value="design">Design</option>
          <option value="divulgazione">Divulgazione</option>
          <option value="edilizia">Ediliza</option>
          <option value="editoria">Editoria</option>
          <option value="educazione">Educazione</option>
          <option value="elettronica">Elettronica</option>
          <option value="farmacia">Farmacia</option>
          <option value="finanza">Finanza</option>
          <option value="fitness">Fitness</option>
          <option value="gastronomia">Gastronomia</option>
          <option value="giustizia">Giustizia</option>
          <option value="hotel">Hotel</option>
          <option value="immobiliare">Immobiliare</option>
          <option value="import export">Import/export</option>
          <option value="industria">Industria</option>
          <option value="informatica">Informatica</option>
          <option value="ingegneria">Ingegneria</option>
          <option value="intrattenimento">Intrattenimento</option>
          <option value="istruzione">Istruzione</option>
          <option value="marketing">Marketing</option>
          <option value="medicina">Medicina</option>
          <option value="musica">Musica</option>
          <option value="musei">Musei</option>
          <option value="no profit">No profit</option>
          <option value="noleggio">Noleggio</option>
          <option value="produzione">Produzione</option>
          <option value="progettazione">Progettazione</option>
          <option value="pubblicità">Pubblicità</option>
          <option value="ricerca">Ricerca</option>
          <option value="sanità">Sanità</option>
          <option value="servizi">Servizi</option>
          <option value="spettacolo">Spettacolo</option>
          <option value="sport">Sport</option>
          <option value="studio">Studio</option>
          <option value="terziario">Terziario</option>
          <option value="traduzione">Traduzione</option>
          <option value="turismo">Turismo</option>
          <option value="veterinaria">Veterinaria</option>
          <option value="web">Web</option>
          <option value="veterinaria">Zootecnico</option>
        </select>
      <label for="email" class="campoRichiesto">Email</label>
        <input type="email" name="email" placeholder="mariorossi@agenzia.it" required>
      <label for="telefono">Numero di telefono</label>
        <input type="tel" name="telefono">
      <label for="web">Sito web</label>
        <input type="text" name="web" placeholder="www.agenzia.it">
      <div>
        <span>I campi con * sono obbligatori</span>
        <button type="submit">Invia</button>
      </div>
    </form>
  </body>
</html>
