<?php 
function ucname($string) {
    $string = ucwords(strtolower($string));
    foreach (array('-', '\'') as $delimiter) {
      if (strpos($string, $delimiter)!==false) {
        $string = implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
      }
    }
    return $string;
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<?php
?>