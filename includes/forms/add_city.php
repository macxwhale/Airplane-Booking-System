<?php 
// check if $_POST["submit"] is isset and if request method is post
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
	// check to see if $_POST["city"]  is empty
	if(empty($_POST["city"])){
		$_SESSION["error"] = "City name is required";
	} else {
		// test_input function (trim stripslashes htmlspecialchars ucname)
		$city_name = test_input($_POST["city"]); 
    	// check if name only contains letters and no whitespaces/ numbers
    	if(ereg('^[[:space:]]*$', $city_name)) {
    	  $_SESSION["error"] = "Only letters allowed";
    	} elseif (!preg_match("/^[a-zA-Z ]*$/",$city_name)) {
	      $_SESSION["error"] = "Only letters allowed";
	    }
	}
	// check if $_SESSION["error"] is not set and empty
	if(empty($_SESSION["error"]) && !isset($_SESSION["error"])) {
		insert_city(); // insert city function
	} 

} else {
	//echo "This is get";
}

?>
<div class="col-md-6 col-md-offset-3" id="show" 
<?php if(!isset($_SESSION["error"]) && !isset($_SESSION["message"])) { echo 'style="display:none;'; } ?>"> 
	<!-- Opening of div id="show"-->
<h1 class="page-header text-center">Add City</h1>
<?php echo message();?> <!-- form success messages -->
<?php echo errors($errors);?> <!-- form error messages-->
<!-- #################################################################################--> 
  <form class="form-inline" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="form-group">
  <label for="city">City:</label>
  <input type="text" class="form-control" id="city" name="city" placeholder="Enter City Name" value="<?php echo $city_name;?>">
  </div>

  <input id="submit" name="submit" type="submit" value="Add City" class="btn btn-primary">
  </form>
  <!-- #################################################################################--> 
<h5 class="page-header text-center">
</h5>   
</div> <!-- closing of div id="show"-->
