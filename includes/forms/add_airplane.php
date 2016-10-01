<?php include ( "header.php"); ?>
<?php //require_once ( "../functions/functions.php" ); ?>
<?php
$errors = array();
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
	if($_POST["route"] == "") {
		$errors["route"] = "This field is required";
	} else {
		$route = test_input($_POST["route"]); 
	}

	if($_POST["airplane_type"] == "") {
		$errors["airplane_type"] = "This field is required";
	} else {
		$airplane_type = test_input($_POST["airplane_type"]);
	}

	if($_POST["date_from"] == "") {
		$errors["date_from"] = "This field is required";
	} else {
		$date_from = test_input($_POST["date_from"]);
	}

	if($_POST["date_to"] == "") {
		$errors["date_to"] = "This field is required";	
	} else {
		$date_to = test_input($_POST["date_to"]);
	}

	if($_POST["time_from"] == "") {
		$errors["time_from"] = "This field is required";
	} else {
		$time_from = test_input($_POST["time_from"]);
	}

	if($_POST["time_to"] == "") {
		$errors["time_to"] = "This field is required";
	} else {
		$time_to = test_input($_POST["time_to"]);
	}

	if($_POST["day"] == "" && empty($_POST["day"])) {
		$errors["day"] = "Please select atleast one option";
	} else {
		$count = count($days);
		$days = $_POST["day"];
	}

	
	if(empty($errors)) {
		echo $route;
		echo "<br>";
		echo $airplane_type;
		echo "<br>";
		echo strtotime(date("Y" ,$date_from));
		echo "<br>";
		echo $date_to;
		echo "<br>";
		echo $time_from;
		echo "<br>";
		echo $time_to;
		echo "<br>";
		foreach ($days as $day) {
			echo $day . ",";
		}
	}
} else {
	//echo "This is get";
} 
?>
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">

<h1 class="page-header text-center">Add Airplane</h1>
<?php echo message();?>
<!-- #################################################################################--> 
<form class="form-group" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

	<div class="form-group form-group-sm">
		<label for="sel1">Routes</label>
		<?php $route_set = find_all_routes(); ?>
		<select class="form-control" id="r0" name="route">
		<option value=""> --Select-- </option>
		<?php foreach ($route_set as $k => $r) { ?>
		<?php echo "<option value=". $r["title"].">". $r["title"]."</option>" ?>
		<?php } ?>	
		</select>	
<script type="text/javascript">
	document.getElementById('r0').value = "<?php echo $_POST['route'];?>";
</script>
<p class="text-danger"><?php echo $errors["route"]; ?></p>			
	</div>

	<div class="form-group form-group-sm">
		<label for="sel1">Airplane Type</label>
		<?php $airplane_set = find_all_airplane_types(); ?>
		<select class="form-control" id="r1" name="airplane_type">
		<option value=""> --Select-- </option>
		<?php foreach ($airplane_set as $k => $r) { ?>
		<?php echo "<option value=". $r["airplane_name"].">". $r["airplane_name"]."</option>" ?>
		<?php } ?>	
		</select>	
<script type="text/javascript">
	document.getElementById('r1').value = "<?php echo $_POST['airplane_type'];?>";
</script>	
<p class="text-danger"><?php echo $errors["airplane_type"]; ?></p>		
	</div>

	<label>Period Operating</label>
	<div class="form-group form-group-sm">
		<label>From</label>
		<input type="text" class="form-control" id="fromDatepicker" name="date_from"
		value = "<?php echo $date_from; ?>">
		<p class="text-danger"><?php echo $errors["date_from"]; ?></p>
	</div>
	<div class="form-group from-group-sm">
		<label>To</label>
		<input type="text" class="form-control" id="toDatepicker" name="date_to"
		value = "<?php echo $date_to; ?>"> 
		<p class="text-danger"><?php echo $errors["date_to"]; ?></p>
	</div>
<!-- ###################################################-->
	<label for="period">Time Operating</label>
	<div class="form-group">
		<label for="period">Departure Time</label>
		<div class="form-group input-group">
		<input type="text" class="form-control" id="fromTimepicker" name="time_from"
		value = "<?php echo $time_from; ?>">
		<span class="input-group-btn">
            <button class="btn btn-default" type="button" id="fromTimeButton">Now</button>
        </span>    
         </div>  
		<p class="text-danger"><?php echo $errors["time_from"]; ?></p>
	</div>
<script type="text/javascript">
$('#fromTimepicker').timepicker();
$('#fromTimeButton').on('click', function (){
$('#fromTimepicker').timepicker('setTime', new Date());
});
</script>
	<div class="form-group">
		<label for="period">Arrival Time</label>
		<div class="form-group input-group">
		<input type="text" class="form-control" id="toTimepicker" name="time_to"
		value = "<?php echo $time_to; ?>"> 
		<span class="input-group-btn">
           <button class="btn btn-default" type="button" id="toTimeButton">Now</button>
          </span>    
         </div>  
		<p class="text-danger"><?php echo $errors["time_to"]; ?></p>
	</div>
<script type="text/javascript">
$('#toTimepicker').timepicker();
$('#toTimeButton').on('click', function (){
$('#toTimepicker').timepicker('setTime', new Date());
});
</script>

	<label for="period">Recurring</label>

	<div class="checkbox">
      <label><?php 
      echo '<input type="checkbox" name="day[]" ';
      if(isset($_POST["day"]) && is_array($_POST["day"]) && in_array(1, $_POST["day"])) { 
      echo "checked='checked' "; } 
      echo 'value="1">Every Sunday'; 
      ?></label>
    </div>

	<div class="checkbox">
      <label><?php 
      echo '<input type="checkbox" name="day[]" ';
      if(isset($_POST["day"]) && is_array($_POST["day"]) && in_array(2, $_POST["day"])) {
      echo "checked='checked'"; } 
      echo 'value="2">Every Monday'; 
      ?></label>
    </div>

    <div class="checkbox">
      <label><?php 
      echo '<input type="checkbox" name="day[]" ';
      if(isset($_POST["day"]) && is_array($_POST["day"]) && in_array(3, $_POST["day"])) {
      echo "checked='checked'"; } 
      echo 'value="3">Every Tuesday'; 
      ?></label>
    </div>

    <div class="checkbox">
      <label><?php 
      echo '<input type="checkbox" name="day[]" ';
      if(isset($_POST["day"]) && is_array($_POST["day"]) && in_array(4, $_POST["day"])) {
      echo "checked='checked'"; } 
      echo 'value="4">Every Wednesday'; 
      ?></label>
    </div>

    <div class="checkbox">
      <label><?php 
      echo '<input type="checkbox" name="day[]" ';
      if(isset($_POST["day"]) && is_array($_POST["day"]) && in_array(5, $_POST["day"])) {
      echo "checked='checked'"; } 
      echo 'value="5">Every Thursday'; 
      ?></label>
    </div>

    <div class="checkbox">
      <label><?php 
      echo '<input type="checkbox" name="day[]" ';
      if(isset($_POST["day"]) && is_array($_POST["day"]) && in_array(6, $_POST["day"])) { 
      echo "checked='checked'"; } 
      echo 'value="6">Every Friday'; 
      ?></label>
    </div>

    <div class="checkbox">
      <label><?php 
      echo '<input type="checkbox" name="day[]" ';
      if(isset($_POST["day"]) && is_array($_POST["day"]) && in_array(7, $_POST["day"])) {
      echo "checked='checked'"; } 
      echo 'value="7">Every Saturday'; 
      ?></label>
    </div>
    <p class="text-danger"><?php echo $errors["day"]; ?></p>
<hr>


<input id="submit" type="submit" name="submit" value="Save" class="btn btn-warning">
<a href="../../airplanes.php" class="btn btn-primary" role="button">Cancel</a>
</form>
 <!-- #################################################################################--> 
</div> 
</div> 
</div>



<!-- <div class="alert alert-info"> 
	<strong>Info!</strong> Use the form below to start creating your airplane. You need to define a route that this airplane operates on and an airplane type. Then you'll have to define departure and arrival time for each location along the selected route. You also have to choose which days of the week the airplane is traveling and the time period this airplane will operate. After saving you will be able to define the rest of the bus settings.
</div> -->