<?php
// Secure info for html.
function checkHtml($data){
  foreach ($data as $key => $value) {
    $data[$key] = htmlspecialchars(trim($value));
  }
  return $data;
}

// Check for empty
function checkEmpty($data){
  $errors = "";
  foreach ($data as $key => $value) {
    if (empty($value)) {
      $errors += 'Field for '. $key . ' is empty.<br>';
      var_dump($errors);
    }
  }
  return $errors;
}

// Check for integer
function checkInt($data){
  if (ctype_digit($data)) {

  }
  else {
      // Do not convert print error message
  }
}

// Check for date


?>
