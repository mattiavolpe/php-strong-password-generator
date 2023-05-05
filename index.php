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
          <div id="lengthInput" class="d-flex justify-content-between align-items-end gap-5 mb-4">
            <div class="flex-grow-1">
              <label for="passwordLength" class="form-label">Password length</label>
              <input type="number"
                class="form-control" name="passwordLength" id="passwordLength" placeholder="Insert the desired length...">
            </div>
            <button type="submit" class="btn btn-primary">Generate password</button>
          </div>
          <!-- /#lengthInput -->
          <div id="checkboxGroup" class="mb-3">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="numbers" id="numbers" value="numbers" checked>
              <label class="form-check-label" for="numbers">Numbers</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="lowercase" id="lowercase" value="lowercase" checked>
              <label class="form-check-label" for="lowercase">Lowercase characters</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="uppercase" id="uppercase" value="uppercase" checked>
              <label class="form-check-label" for="uppercase">Uppercase characters</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="symbols" id="symbols" value="symbols" checked>
              <label class="form-check-label" for="symbols">Symbols</label>
            </div>
          </div>
          <!-- /#checkboxGroup -->
          <div id="repetitionSelection">
            <h6 class="d-inline me-3 mb-0">Allow two or more adjacent identical characters: </h6>
            <div class="form-check form-check-inline mb-0">
              <input class="form-check-input" type="radio" name="adjacent" id="adjacentYes" value="yes" checked>
              <label class="form-check-label" for="adjacentYes">Yes</label>
            </div>
            <div class="form-check form-check-inline mb-0">
              <input class="form-check-input" type="radio" name="adjacent" id="adjacentNo" value="no">
              <label class="form-check-label" for="adjacentNo">No</label>
            </div>
          </div>
          <!-- /#repetitionSelection -->

        </form>
      </div>

    </main>
    <!-- /#app_main -->
    
  </body>
  
</html>
