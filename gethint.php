 <?php require ( "includes/db_connect.php" ); ?> 
 <?php include ( "includes/functions/functions.php" ); ?>
 <?php
$cities = find_cities();
foreach ($cities as $key => $value) {
    $value["city_name"];

// Array with names
$a[] = $value["city_name"];


// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
    if ($q !== "") {
        $q = strtolower($q);
        $len=strlen($q);
        foreach($a as $name) {
            if (stristr($q, substr($name, 0, $len))) {
                if ($hint === "") {
                    $hint = "<a href='#'>" . $name . "</a>";
                } else {
                    $hint .= "," . "<a href='#'>" . "$name" . "</a>";
                }
            }
        }
    }
}
// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No suggestion" : $hint;
?> 