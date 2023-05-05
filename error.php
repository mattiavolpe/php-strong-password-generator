<?php
  session_start();
  if($_SESSION["lengthError"] && $_SESSION["allowedError"]) {
    $error = "Please insert a valid length and select at least one type of allowed character";
  } elseif($_SESSION["lengthError"]) {
    $error = "Please insert a valid length";
  } else {
    $error = "Please select at least one type of allowed character";
  }
?>

<!DOCTYPE html>
<html lang="en">
  
  <?php include __DIR__ . "/assets/views/head.php" ?>
  
  <body>
    
    <?php include __DIR__ . "/assets/views/partials/header.php" ?>

    <main id="app_main">

      <div class="container text-center">
        <div class="bg-light rounded-3 p-4">

          <div class="alert alert-danger" role="alert">
            <strong>ERROR: </strong>
            <span>
              <?= $error ?>
            </span>
          </div>
          <!-- /.alert -->

          <a name="tryAgain" id="tryAgain" class="btn btn-primary" href="index.php" role="button">Try again</a>
          
        </div>
      </div>
      <!-- /.container -->

    </main>
    <!-- /#app_main -->
    
  </body>
  
</html>
