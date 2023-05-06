<?php
  session_start();

  // RESET ERROR VALUES
  $_SESSION["error"] = false;
  $_SESSION["lengthError"] = false;
  $_SESSION["allowedError"] = false;

  // SETS ERROR IF IT'S NOT THE FIRST LOAD OF THE PAGE AND A PASSWORD LENGTH IS NOT PROVIDED
  if((!empty($_GET)) && empty($_GET["passwordLength"])) {
    $_SESSION["error"] = true;
    $_SESSION["lengthError"] = true;
  } else {
    $passwordLength = $_GET["passwordLength"];
  }

  // SETS ERROR IF IT'S NOT THE FIRST LOAD OF THE PAGE AND NO CHECKBOX IS SELECTED
  if((!empty($_GET)) && empty($_GET["numbers"]) && empty($_GET["lowercase"]) && empty($_GET["uppercase"]) && empty($_GET["symbols"])) {
    $_SESSION["error"] = true;
    $_SESSION["allowedError"] = true;
  }

  // REDIRECTS TO ERROR.PHP IF THERE'S AN ERROR
  if ($_SESSION["error"]) {
    header("Location: error.php");
  }

  $charactersList = [];
  $numbers = range(0, 9);
  $lowercase = range("a", "z");
  $uppercase = range("A", "Z");
  $symbols = ["\\", "|", "!", '"', "£", "$", "%", "&", "/", "(", ")", "=", "'", "?", "ì", "^", "`", "~", "è", "é", "[", "+", "*", "]", "ù", "§", "ò", "ç", "@", "à", "°", "#", ",", ";", ".", ":", "-", "_", "{", "}", "<", ">"];
  
  // ADDS NUMBERS IF THE RELATIVE CHECKBOX IS SELECTED
  if($_GET["numbers"] === "numbers") {
    array_push($charactersList, $numbers);
  }

  // ADDS LOWERCASE CHARACTERS IF THE RELATIVE CHECKBOX IS SELECTED
  if($_GET["lowercase"] === "lowercase") {
    array_push($charactersList, $lowercase);
  }

  // ADDS UPPERCASE CHARACTERS IF THE RELATIVE CHECKBOX IS SELECTED
  if($_GET["uppercase"] === "uppercase") {
    array_push($charactersList, $uppercase);
  }

  // ADDS SYMBOLS IF THE RELATIVE CHECKBOX IS SELECTED
  if($_GET["symbols"] === "symbols") {
    array_push($charactersList, $symbols);
  }

  // GENERATES THE PASSWORD
  $password = generatePassword($passwordLength, $charactersList);

  // EXPORTS THE PASSWORD AND ITS LENGTH TO SHOW THEM IN RESULT.PHP
  $_SESSION["password"] = $password;
  $_SESSION["length"] = $passwordLength;
  

  function generatePassword($length, $allowedList) {
    $password = "";
    for ($i = 0; $i < $length; $i++) {
      // CHOOSES A RANDOM SUB-ARRAY (NUMBERS, LOWERCASE, UPPERCASE OR SYMBOLS)
      $randomSubArrayIndex = getRandomIndex($allowedList);

      // CHOOSES A RANDOM ELEMENT OF THE PREVIOUSLY CHOOSEN SUB-ARRAY
      $randomCharacterIndex = getRandomIndex($allowedList[$randomSubArrayIndex]);

      // COMPOSES THE PASSWORD CHECKING IF "NO IDENTICAL ADJACENT CHARACTERS" IS CHECKED
      if ($_GET["adjacent"] === "yes" || strlen($password) === 0 || $allowedList[$randomSubArrayIndex][$randomCharacterIndex] != $password[strlen($password) - 1]) {
        $password .= $allowedList[$randomSubArrayIndex][$randomCharacterIndex];
      } else {
        $i--;
      }
    }
    return $password;
  }
  
  function getRandomIndex($array) {
    return rand(0, (count($array) - 1));
  }

  if (!empty($passwordLength)) {
    header("Location: result.php");
  }

?>
