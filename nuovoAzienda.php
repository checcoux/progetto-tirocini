<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <title>Nuova azienda</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript">
      function caricaProvince(regione) {
        server = "/caricaProvince.php?regione="+regione;
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
        server = "/caricaComuni.php?provincia="+provincia;
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
      <a id="logo1" href="/">Portale<br>dei tirocini<br>d'azienda</a>
      <span id="logo2">Università<br>degli studi<br>di Udine</span>
	    <div class="gooey-rec"></div>
    </header>
    <h2>Nuova azienda</h2>
    <form action="aggiornaAziende.php" method="get">
      <label for="nome" class="campoRichiesto">Nome</label>
        <input type="text" name="nome" required placeholder="es. Green Studio">
        <label for="nome" class="campoRichiesto">Descrizione</label>
        <input type="text" name="descrizione" required placeholder="es. chi siete e cosa fate">
      <label for="regione" class="campoRichiesto">Regione</label>
        <select name="regione" onchange="caricaProvince(this.value)">
          <?php
            $link = mysqli_connect("db.ccns.it", "tirocinio_user","Tirocinio2020!");
            mysqli_select_db($link, "progetto_tirocinio");
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
        <input type="text" name="indirizzo" required placeholder="es. via Udine 69">
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
        <input type="email" name="email" placeholder="es. segreteria@azienda.it" required>
      <label for="telefono">Numero di telefono</label>
        <input type="tel" name="telefono" placeholder="es. 123 4567822">
      <label for="web">Sito web</label>
        <input type="text" name="web" placeholder="es. www.agenzia.it">
      <div id="formInvia">
        <span>I campi con * sono obbligatori</span>
        <button type="submit">Invia</button>
      </div>
    </form>
  </body>
</html>
