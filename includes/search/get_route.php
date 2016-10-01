 <?php require ( "../db_connect.php" ); ?> 
 <?php include ( "../functions/functions.php" ); ?>
 <?php
$routes = find_all_routes();
if (is_array($routes) || is_object($routes)) {
foreach ($routes as $key => $route_set) {
  
// Array with names
$a[] = $route_set["title"];


// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
    if ($q !== "") {
        $q = strtolower($q);
        $len=strlen($q);
        foreach($a as $name) {
            if (stristr($q, substr($name, 0, $len))) {
                $link = "includes/forms/read_route.php";
                if ($hint === "") {
                    $route_name = find_route_by_name($name);
                    foreach ($route_name as $key => $route_set) {
                        $id = $route_set["route_id"];
                        $hint = "<a href=";
                        $hint .= $link . "?route_id=" . $id;
                        $hint .= ">";
                        $hint .= $name; 
                        $hint .= "</a>";
                    }
                    
                } else {
                    $route_name = find_route_by_name($name);
                    foreach ($route_name as $key => $route_set) {
                        $id = $route_set["route_id"];
                        $hint .= "," . "<a href=";
                        $hint .= $link . "?route_id=" . $id;
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