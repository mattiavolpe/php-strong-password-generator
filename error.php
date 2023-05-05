<!DOCTYPE html>
<html lang="en">
  
  <?php include __DIR__ . "/assets/views/head.php" ?>
  
  <body>
    
    <?php include __DIR__ . "/assets/views/partials/header.php" ?>

    <main id="app_main">

      <div class="container text-center">
        <div class="bg-light rounded-3 p-4">
          <div class="alert alert-danger" role="alert">
            <strong>ERROR:</strong> Please insert a valid length and select at least one type of allowed character
          </div>
          <a name="tryAgain" id="tryAgain" class="btn btn-primary" href="index.php" role="button">Try again</a>
        </div>
      </div>

    </main>
    <!-- /#app_main -->
    
  </body>
  
</html>
