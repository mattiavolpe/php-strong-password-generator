<?php
  session_start();

  if(!empty($_GET["passwordLength"])) {
    $passwordLength = $_GET["passwordLength"];
  } else {
    // TODO fill error page
  }

  if(empty($_GET["numbers"]) && empty($_GET["lowercase"]) && empty($_GET["uppercase"]) && empty($_GET["symbols"])) {
    // TODO fill error page
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
      $password .= $allowedList[$randomSubArrayIndex][$randomCharacterIndex];
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
