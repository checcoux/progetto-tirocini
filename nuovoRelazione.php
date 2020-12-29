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
          if ((richiesta.readyState == 4) && (richiesta.status == 200)) {
            risposta = JSON.parse(richiesta.response);
            for (var i = 0; i < risposta.length; i++) {
              var id = risposta[i]["id"];
              var azienda = risposta[i]["azienda"];
              var relazioni = document.getElementById("inserisciRelazioni");
              if (relazioni.children[id] == null) {
                var label = document.createElement("label");
                var testo = document.createElement("textarea");
                label.innerHTML = azienda;
                label.setAttribute("for", id);
                relazioni.appendChild(label);
                testo.setAttribute("name", id);
                relazioni.appendChild(testo);
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
      <span id="logo1">Università<br>degli studi<br>di Udine</span>
      <span id="logo2">Portale<br>dei tirocini<br>d'azienda</span>
    </header>
    <h2>Inserisci relazione di tirocino</h2>
    <form class="" action="index.html" method="post">
      <label for="matricola" class="campoRichiesto">Numero di matricola</label>
        <input type="text" name="matricola" onblur="caricaAziendeStudente(this.value)" required>
      <div id="inserisciRelazioni">
      </div>
    </form>
    </form>
  </body>
</html>
