<?php include ( "header.php"); ?>
<?php
if(!isset($_GET["city_id"])){
    redirect_to("read_city.php");
} else {
    $id = $_GET["city_id"];
} 

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
	if(is_array($_POST["routes"]) || is_array($_POST["routes"])) {
		if($_POST["routes"][0] == "" && $_POST["routes"][1] == "") {
			$_SESSION["error"] = "Departure & Arrival locations are required";
		} elseif ($_POST["routes"][0] == "") {
			$_SESSION["error"] = "Departure location is required";
		} elseif ($_POST["routes"][1] == "") {
			$_SESSION["error"] = "Arrival location is required";
		} elseif ($_POST["routes"][0] == $_POST["routes"][1]) {
			$_SESSION["error"] = "Departure & Arrival locations cannot be same";
		} else {
			$city_id = $id;
			$dep = test_input($_POST["routes"][0]);
	        $arr = test_input($_POST["routes"][1]);
	        $title = $dep ."-". $arr;

	        $dep_city = find_city_by_name($dep);
	        foreach ($dep_city as $key => $dc) {
	        	$dep_id = $dc["city_id"];
	        }
	        $arr_city = find_city_by_name($arr);
	        foreach ($arr_city as $key => $ac) {
	        	$arr_id = $ac["city_id"];
	        }
		}	
	}

	if(empty($_SESSION["error"]) && !isset($_SESSION["error"])) {
		insert_route();
		insert_return_route();
	}
} else {
	//echo "This is get";
} 
?>
<?php 
$city_set = find_all_cities();
if($stmt->rowCount() == 1) { 
    $_SESSION["error"] = "Only&nbsp;".$stmt->rowCount()."&nbsp;city available. Please <a href='../../cities.php'>add</a> more cities first before adding routes" ;
    redirect_to("read_city.php?city_id=$id");
} 
$active_ctities = find_active_cities();
if($stmt->rowCount() <= 1) { 
    $_SESSION["error"] = "Only&nbsp;".$stmt->rowCount()."&nbsp;active city at the moment. You need active cities to create routes" ;
    redirect_to("read_city.php?city_id=$id");
}
?>
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">

<h1 class="page-header text-center">Add Route</h1>
<div class="alert alert-info"> <!-- opening alert alert info div tag --> <!--7-->
	<strong>Info!</strong> The route represents the <code>start <i>(departure)</i>a</code> and the <code>final <i>(arrival)</i></code> location of an <code>Airplane</code> trip. Return routes are automatically created by the system. 
</div> <!-- closing alert alert info div tag --> <!--7-->
<?php echo message();?>
<?php echo errors($errors);?>
<!-- #################################################################################--> 
<form class="form-group" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?city_id=" . $id);?>">

	<div class="form-group form-group-sm">
		<label for="sel1">Location&nbsp;:&nbsp;1&nbsp;<i class="text-primary">(Departure)</i></label>
		<?php $city_set = find_city_by_id($id); ?>
		<select class="form-control" id="r0" name="routes[]">
		<?php foreach ($city_set as $key => $value) { ?>
		<?php echo "<option value=". $value["city_name"] . " selected>" . $value["city_name"] ."</option>" ?>
		<?php } ?>	
		</select>		
	</div>
	<div class="form-group form-group-sm">
		<label for="sel1">Location&nbsp;:&nbsp;2&nbsp;<i class="text-primary">(Arrival)</i></label>
		<?php $city_set = find_active_cities(); ?>
		<select class="form-control" id="r1" name="routes[]">
		<option value=""> --Select-- </option>
		<?php foreach ($city_set as $key => $value) { ?>
		<?php echo "<option value=". $value["city_name"] . ">" . $value["city_name"] . "</option>" ?>
		<?php } ?>	
		</select>
<script type="text/javascript">
	document.getElementById('r1').value = "<?php echo $_POST['routes'][1];?>";
</script>
	</div> 
<input id="submit" type="submit" name="submit" value="Add Route" class="btn btn-warning">
<a href="../../cities.php" class="btn btn-primary" role="button">Cancel</a>
</form>

 <!-- #################################################################################--> 
</div> 
</div> 
</div>