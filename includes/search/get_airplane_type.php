 <?php require ( "../db_connect.php" ); ?> 
 <?php include ( "../functions/functions.php" ); ?>
 <?php
$airplane = find_all_airplane_types();
if (is_array($airplane) || is_object($airplane)) {
foreach ($airplane as $key => $airplane_set) {
  
// Array with names
$a[] = $airplane_set["airplane_name"];


// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
    if ($q !== "") {
        $q = strtolower($q);
        $len=strlen($q);
        foreach($a as $name) {
            if (stristr($q, substr($name, 0, $len))) {
                $link = "includes/forms/read_airplane_type.php";
                if ($hint === "") {
                    $airplane_type_name = find_airplane_type_by_name($name);
                    foreach ($airplane_type_name as $key => $airplane_set) {
                        $id = $airplane_set["airplane_id"];
                        $hint = "<a href=";
                        $hint .= $link . "?airplane_id=" . $id;
                        $hint .= ">";
                        $hint .= $name; 
                        $hint .= "</a>";
                    }
                    
                } else {
                    $airplane_type_name = find_airplane_type_by_name($name);
                    foreach ($airplane_type_name as $key => $airplane_set) {
                        $id = $airplane_set["airplane_id"];
                        $hint .= "," . "<a href=";
                        $hint .= $link . "?airplane_id=" . $id;
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