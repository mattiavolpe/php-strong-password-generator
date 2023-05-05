<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  
  <?php include __DIR__ . "/assets/views/head.php" ?>
  
  <body>
    
    <?php include __DIR__ . "/assets/views/partials/header.php" ?>

    <main id="app_main">

      <div class="container text-center">
        <div class="bg-light rounded-3 p-4">

          <h2 class="fw-bold">Congratulations</h2>  
          <h4>Here's your new <?= $_SESSION["length"] ?> characters long super-secure password</h4>
          <h5 class="text-success">
            <?= $_SESSION["password"] ?>
          </h5>
          
        </div>
      </div>
      <!-- /.container -->

    </main>
    <!-- /#app_main -->
    
  </body>
  
</html>
