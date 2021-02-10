<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <title>Nuovo studente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script type="text/javascript">
      function caricaAziende(settore) {
        server = "/caricaAziende.php?settore="+settore;
        richiesta = new XMLHttpRequest();
        richiesta.onreadystatechange = () => {
          if ((richiesta.readyState == 4) && (richiesta.status == 200)) {
            document.getElementById("aziende").options.length = 0;
            risposta = JSON.parse(richiesta.response);
            if (risposta !== "null") {
              for (var i = 0; i < risposta.length; i++) {
                var id = risposta[i]["id"];
                var nome = risposta[i]["nome"];
                document.getElementById("aziende").append(new Option(nome, id));
              }
              document.querySelector("label[for=azienda]").style.color = "var(--testo)";
              document.getElementById("aziende").disabled = false;
            } else {
              document.querySelector("label[for=azienda]").style.color = "var(--testo-ter)";
              document.getElementById("aziende").disabled = true;
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
    <h2>Inserisci i tuoi dati</h2>
    <form action="aggiornaStudenti.php" method="get">
      <label for="nome" class="campoRichiesto">Nome</label>
        <input type="text" name="nome" required>
      <label for="cognome" class="campoRichiesto">Cognome</label>
        <input type="text" name="cognome" required>
      <label for="matricola" class="campoRichiesto">Numero di matricola</label>
        <input type="text" name="matricola" required>
      <label for="dataInizio" class="campoRichiesto">Data di inizio tirocinio</label>
        <input type="date" name="dataInizio" required>
      <label for="dataFine" class="campoRichiesto">Data di fine tirocinio</label>
        <input type="date" name="dataFine" required>
      <label for="settore" class="campoRichiesto">Settore</label>
        <select name="settore" onchange="caricaAziende(this.value)">
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
      <label for="azienda" class="campoRichiesto" style="color:var(--testo-ter)">Azienda</label>
        <select name="azienda" id="aziende" disabled>
        </select>
      <div id="formInvia">
        <span>I campi con * sono obbligatori</span>
        <button type="submit">Invia</button>
      </div>
    </form>


  </body>
</html>
