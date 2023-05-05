<?php
  $passwordLength = $_GET["passwordLength"];
  $charactersList = [];
  $symbols = ["\\", "'", "|", "!", '"', "$", "%", "&", "/", "(", ")", "=", "?", "^", "`", "~", "[", "+", "*", "]", "@", "#", ",", ";", ".", ":", "-", "_", "{", "}"];
  array_push($charactersList, range(0, 9));
  array_push($charactersList, range("a", "z"));
  array_push($charactersList, range("A", "Z"));
  array_push($charactersList, $symbols);

  $password = generatePassword($passwordLength, $charactersList);

  session_start();
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
