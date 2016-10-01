<?php include ( "header.php"); ?>
<?php 
if(!isset($_GET["id"])){
    redirect_to("../../cities.php");
} else {
    $city_id = $_GET["id"];
}
 
/* $routes = find_routes_for_cities_by_id($city_id);
foreach ($routes as $key => $route) {
	$city_name = $route["arr"];
	$id = $route["city_id"];
}
$cities = find_city_by_name($city_name);
foreach ($cities as $key => $city) {
	$city["city_name"];
}
if($city_name === $city["city_name"]) {
	delete_city($id);
	$_SESSION["error"] = "You cannot delete Cities with Routes";
	redirect_to("read_city.php?city_id=$city_id");
} */

if(!delete_city($city_id)){
	redirect_to("read_city.php?city_id=$city_id");
}
?>