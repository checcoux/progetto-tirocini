<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <title>Nuovo studente</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script type="text/javascript">
      function caricaAziendeStudente(matricola) {
        server = "http://localhost/caricaAziendeStudente.php?matricola="+matricola;
        richiesta = new XMLHttpRequest();
        richiesta.onreadystatechange = () => {
          var relazioni = document.getElementById("inserisciRelazioni");
          if ((richiesta.readyState == 4) && (richiesta.status == 200)) {
            if (richiesta.response !== "null") {
              risposta = JSON.parse(richiesta.response);
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
                  relazioni.appendChild(testo);
                }
              }
              if (relazioni.lastElementChild.nodeName !== "BUTTON") {
                invia = document.createElement("button");
                invia.setAttribute("type", "submit");
                invia.innerHTML = "invia";
                relazioni.appendChild(invia);
              }
            } else {
              if (relazioni.lastElementChild == null) {
                messaggio = document.createElement("p");
                messaggio.innerHTML = "Non ci sono relazioni da inserire.";
                relazioni.appendChild(messaggio);
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
    <form action="aggiornaRelazioni.php" method="get">
      <label for="matricola">Numero di matricola</label>
        <input type="text" name="matricola" onblur="caricaAziendeStudente(this.value)">
      <div id="inserisciRelazioni">
      </div>
    </form>
    </form>
  </body>
</html>
