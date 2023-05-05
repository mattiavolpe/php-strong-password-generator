<?php
  /*
  Descrizione
  Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure. L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.
  
  Milestone 1
  Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere minuscole, lettere maiuscole, numeri e simboli) da restituire all’utente. Scriviamo tutto (logica e layout) in un unico file index.php

  Milestone 2
  Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale

  Milestone 3 (BONUS)
  Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.

  Milestone 4 (BONUS)
  Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme). Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.
  */

  include __DIR__ . "/helpers/functions.php";
  var_dump(strlen("°"));
  var_dump(strlen("K19/"));
?>

<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- EXTERNAL FONTAWESOME CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    
    <!-- EXTERNAL BOOTSTRAP CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Strong Password Generator</title>
  </head>
  
  <body>
    
    <header id="app_header">
      <h1 class="text-uppercase">Strong Password Generator</h1>
      <h4>Generate your super-secure password</h4>
    </header>
    <!-- /#app_header -->

    <main id="app_main">

      <form action="" method="get">
        <div class="mb-3">
          <label for="passwordLength" class="form-label">Password length</label>
          <input type="number"
            class="form-control" name="passwordLength" id="passwordLength" aria-describedby="passwordLengthHelper" placeholder="Insert the desired length...">
          <small id="passwordLengthHelper" class="form-text text-muted">Insert the desired length</small>
        </div>
        <button type="submit" class="btn btn-primary">Generate password</button>
      </form>

    </main>
    <!-- /#app_main -->
    
  </body>
  
</html>
