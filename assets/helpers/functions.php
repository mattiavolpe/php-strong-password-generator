<?php
  session_start();

  $_SESSION["error"] = false;
  $_SESSION["lengthError"] = false;
  $_SESSION["allowedError"] = false;

  if((!empty($_GET)) && empty($_GET["passwordLength"])) {
    $_SESSION["error"] = true;
    $_SESSION["lengthError"] = true;
  } else {
    $passwordLength = $_GET["passwordLength"];
  }

  if((!empty($_GET)) && empty($_GET["numbers"]) && empty($_GET["lowercase"]) && empty($_GET["uppercase"]) && empty($_GET["symbols"])) {
    $_SESSION["error"] = true;
    $_SESSION["allowedError"] = true;
  }

  if ($_SESSION["error"]) {
    header("Location: error.php");
  }

  $charactersList = [];
  $numbers = range(0, 9);
  $lowercase = range("a", "z");
  $uppercase = range("A", "Z");
  $symbols = ["\\", "'", "|", "!", '"', "$", "%", "&", "/", "(", ")", "=", "?", "^", "`", "~", "[", "+", "*", "]", "@", "#", ",", ";", ".", ":", "-", "_", "{", "}"];
  
  if($_GET["numbers"] === "numbers") {
    array_push($charactersList, $numbers);
  }

  if($_GET["lowercase"] === "lowercase") {
    array_push($charactersList, $lowercase);
  }

  if($_GET["uppercase"] === "uppercase") {
    array_push($charactersList, $uppercase);
  }

  if($_GET["symbols"] === "symbols") {
    array_push($charactersList, $symbols);
  }

  $password = generatePassword($passwordLength, $charactersList);

  $_SESSION["password"] = $password;
  $_SESSION["length"] = $passwordLength;
  
  function generatePassword($length, $allowedList) {
    $password = "";
    while (strlen($password) < $length) {
      $randomSubArrayIndex = getRandomIndex($allowedList);
      $randomCharacterIndex = getRandomIndex($allowedList[$randomSubArrayIndex]);
      if ($_GET["adjacent"] === "yes" || strlen($password) === 0 || $allowedList[$randomSubArrayIndex][$randomCharacterIndex] != $password[strlen($password) - 1]) {
        $password .= $allowedList[$randomSubArrayIndex][$randomCharacterIndex];
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
