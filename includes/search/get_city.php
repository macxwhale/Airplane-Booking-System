 <?php require ( "../db_connect.php" ); ?> 
 <?php include ( "../functions/functions.php" ); ?>
 <?php
$cities = find_all_cities();
if (is_array($cities) || is_object($cities)) {
foreach ($cities as $key => $city_set) {
  
// Array with names
$a[] = $city_set["city_name"];


// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
    if ($q !== "") {
        $q = strtolower($q);
        $len=strlen($q);
        foreach($a as $name) {
            if (stristr($q, substr($name, 0, $len))) {
                $link = "includes/forms/read_city.php";
                if ($hint === "") {
                    $city_name = find_city_by_name($name);
                    foreach ($city_name as $key => $city_set) {
                        $id = $city_set["city_id"];
                        $hint = "<a href=";
                        $hint .= $link . "?city_id=" . $id;
                        $hint .= ">";
                        $hint .= $name; 
                        $hint .= "</a>";
                    }
                    
                } else {
                    $city_name = find_city_by_name($name);
                    foreach ($city_name as $key => $city_set) {
                        $id = $city_set["city_id"];
                        $hint .= "," . "<a href=";
                        $hint .= $link . "?city_id=" . $id;
                        $hint .= ">";
                        $hint .= $name;
                        $hint .= "</a>";
                    }
                    
                }
            }
        }
    }
}
}
// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "<span class=\"label label-danger\">No suggestion</span>" : $hint;

?> 