<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <title>Nuovo studente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script type="text/javascript">
    server = "/caricaSettori.php";
    richiesta = new XMLHttpRequest();
      richiesta.onreadystatechange = () => {
        if ((richiesta.readyState == 4) && (richiesta.status == 200)) {
          risposta = JSON.parse(richiesta.response);
          for (var i = 0; i < risposta.length; i++) {
            document.querySelector('select[name=settore] > option[value='+risposta[i]+']').disabled = false;
          }
        }
      };
      richiesta.open("GET", server, true);
      richiesta.send();
      function caricaAziende(settore) {
        server = "/caricaAziende.php?settore="+settore;
        richiesta = new XMLHttpRequest();
        richiesta.onreadystatechange = () => {
          if ((richiesta.readyState == 4) && (richiesta.status == 200)) {
            document.getElementById("aziende").options.length = 0;
            risposta = JSON.parse(richiesta.response);
            if (risposta !== "null") {
              for (var i = 0; i < risposta.length; i++) {
                document.getElementById("aziende").append(new Option(risposta[i]["nome"], risposta[i]["id"]));
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
        <select name="settore" onchange="caricaAziende(this.value)" >
          <option value="agricoltura" disabled>Agricoltura</option>
          <option value="allevamento" disabled>Allevamento</option>
          <option value="architettura" disabled>Architettura</option>
          <option value="artigianato" disabled>Artigianato</option>
          <option value="audiovisivi" disabled>Audiovisivi</option>
          <option value="banca" disabled>Banca</option>
          <option value="biblioteca" disabled>Biblioteca</option>
          <option value="benessere" disabled>Benessere</option>
          <option value="comunicazione" disabled>Comunicazione</option>
          <option value="consulenza" disabled>Consulenza</option>
          <option value="cosmesi" disabled>Cosmesi</option>
          <option value="cultura" disabled>Cultura</option>
          <option value="design" disabled>Design</option>
          <option value="divulgazione" disabled>Divulgazione</option>
          <option value="edilizia" disabled>Ediliza</option>
          <option value="editoria" disabled>Editoria</option>
          <option value="educazione" disabled>Educazione</option>
          <option value="elettronica" disabled>Elettronica</option>
          <option value="farmacia" disabled>Farmacia</option>
          <option value="finanza" disabled>Finanza</option>
          <option value="fitness" disabled>Fitness</option>
          <option value="gastronomia" disabled>Gastronomia</option>
          <option value="giustizia" disabled>Giustizia</option>
          <option value="hotel" disabled>Hotel</option>
          <option value="immobiliare" disabled>Immobiliare</option>
          <option value="import export" disabled>Import/export</option>
          <option value="industria" disabled>Industria</option>
          <option value="informatica" disabled>Informatica</option>
          <option value="ingegneria" disabled>Ingegneria</option>
          <option value="intrattenimento" disabled>Intrattenimento</option>
          <option value="istruzione" disabled>Istruzione</option>
          <option value="marketing" disabled>Marketing</option>
          <option value="medicina" disabled>Medicina</option>
          <option value="musica" disabled>Musica</option>
          <option value="musei" disabled>Musei</option>
          <option value="no profit" disabled>No profit</option>
          <option value="noleggio" disabled>Noleggio</option>
          <option value="produzione" disabled>Produzione</option>
          <option value="progettazione" disabled>Progettazione</option>
          <option value="pubblicità" disabled>Pubblicità</option>
          <option value="ricerca" disabled>Ricerca</option>
          <option value="sanità" disabled>Sanità</option>
          <option value="servizi" disabled>Servizi</option>
          <option value="spettacolo" disabled>Spettacolo</option>
          <option value="sport" disabled>Sport</option>
          <option value="studio" disabled>Studio</option>
          <option value="terziario" disabled>Terziario</option>
          <option value="traduzione" disabled>Traduzione</option>
          <option value="turismo" disabled>Turismo</option>
          <option value="veterinaria" disabled>Veterinaria</option>
          <option value="web" disabled>Web</option>
          <option value="veterinaria" disabled>Zootecnico</option>
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
