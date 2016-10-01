<?php include ( "header.php"); ?>
<?php 
if(!isset($_GET["id"])){
    redirect_to("../../routes.php");
} else {
    $route_id = $_GET["id"];
}
delete_route($route_id);
 

?>