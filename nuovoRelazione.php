<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <title>Inserisci relazione</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script type="text/javascript">
      function caricaAziendeStudente(matricola) {
        server = "/caricaAziendeStudente.php?matricola="+matricola;
        richiesta = new XMLHttpRequest();
        richiesta.onreadystatechange = () => {
          var relazioni = document.getElementById("inserisciRelazioni");
          if ((richiesta.readyState == 4) && (richiesta.status == 200)) {
            risposta = richiesta.response;
            if (risposta == "vuotaMatricola") {
              relazioni.innerHTML = "";
              messaggio = document.createElement("p");
              messaggio.innerHTML = "Nessuna matricola inserita.";
              relazioni.appendChild(messaggio);
            } else if (risposta == "noMatricola") {
              relazioni.innerHTML = "";
              messaggio = document.createElement("p");
              messaggio.innerHTML = "La matricola inserita non risulta presente nel database. Prova a reinserirla o <a href=/nuovoStudente.php'>inzia un nuovo tirocinio</a>.";
              relazioni.appendChild(messaggio);
            } else if (risposta == "noTirocini") {
              relazioni.innerHTML = "";
              messaggio = document.createElement("p");
              messaggio.innerHTML = "Nessun tirocinio in corso. Che ne dici di <a href=/nuovoStudente.php'>iniziarne uno</a>?";
              relazioni.appendChild(messaggio);
            } else if (risposta !== "") {
              relazioni.innerHTML = "";
              risposta = JSON.parse(risposta);
              for (var i = 0; i < risposta.length; i++) {
                var id = risposta[i]["id"];
                var azienda = risposta[i]["azienda"];
                if (relazioni.children[id] == null) {
                  var label = document.createElement("label");
                  var testo = document.createElement("textarea");
                  label.innerHTML = azienda;
                  label.setAttribute("for", id);
                  relazioni.appendChild(label);
                  testo.setAttribute("name", "relazioni["+id+"]");
                  testo.required = true;
                  relazioni.appendChild(testo);
                }
              }
              if (relazioni.lastElementChild.nodeName !== "BUTTON") {
                invia = document.createElement("button");
                invia.setAttribute("type", "submit");
                invia.style.cssFloat = "right";
                invia.innerHTML = "invia";
                relazioni.appendChild(invia);
              }
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
    <h2>Inserisci relazione di tirocino</h2>
    <form action="aggiornaRelazioni.php" method="get" >
      <label for="matricola">Numero di matricola</label>
        <input type="text" name="matricola" onblur="caricaAziendeStudente(this.value)" placeholder="es. 144019">
      <div id="inserisciRelazioni">
      </div>
    </form>
    </form>
  </body>
</html>
