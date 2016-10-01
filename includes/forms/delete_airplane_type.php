<?php include ( "header.php"); ?>
<?php 
if(!isset($_GET["id"])){
    redirect_to("../../airplane_types.php");
} else {
    $airplane_id = $_GET["id"];
}
 
if(delete_airplane_types($airplane_id)){
	redirect_to("read_airplane_type.php?airplane_id=$airplane_id");
}
?>