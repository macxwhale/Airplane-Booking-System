<?php 
class Validation {
	$data = "";
	function test_input($par) {
		$this->data = trim($par);
		$this->data = stripslashes($par)
		$this->data = htmlspecialchars($par)
	}
}
?>

function ucname($string) {
    $string =ucwords(strtolower($string));

    foreach (array('-', '\'') as $delimiter) {
      if (strpos($string, $delimiter)!==false) {
        $string =implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
      }
    }
    return $string;
}
?>
<?php
//TEST

$names =array(
  'JEAN-LUC PICARD',
  'MILES O\'BRIEN',
  'WILLIAM RIKER',
  'geordi la forge',
  'bEvErly CRuSHeR'
);
foreach ($names as $name) { print ucname("{$name}\n"); }

//PRINTS:
/*
Jean-Luc Picard
Miles O'Brien
William Riker
Geordi La Forge
Beverly Crusher
*/