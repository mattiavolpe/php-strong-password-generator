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

  include __DIR__ . "/assets/helpers/functions.php";
?>

<!DOCTYPE html>
<html lang="en">
  
  <?php include __DIR__ . "/assets/views/head.php" ?>
  
  <body>
    
    <?php include __DIR__ . "/assets/views/partials/header.php" ?>

    <main id="app_main">

      <div class="container">
        <form action="" method="get" class="mx-auto bg-light rounded-3 p-4">
          <div class="d-flex justify-content-between align-items-end gap-5">
            <div class="flex-grow-1">
              <label for="passwordLength" class="form-label">Password length</label>
              <input type="number"
                class="form-control" name="passwordLength" id="passwordLength" placeholder="Insert the desired length...">
            </div>
            <button type="submit" class="btn btn-primary">Generate password</button>
          </div>
          

        </form>
      </div>

    </main>
    <!-- /#app_main -->
    
  </body>
  
</html>
