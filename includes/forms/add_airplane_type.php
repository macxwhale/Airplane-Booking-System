<?php 
// check if $_POST["submit"] is isset and if request method is post
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
	// check to see if $_POST["city"]  is empty
	if(empty($_POST["name"])){
		$_SESSION["error"] = "Airplane type is required";
	} else {
		// test_input function (trim stripslashes htmlspecialchars ucname)
		$name = strtoupper(test_input($_POST["name"])); 
	}
	// check if $_SESSION["error"] is not set and empty
	if(empty($_SESSION["error"]) && !isset($_SESSION["error"])) {
		insert_airpane_type();;
	} 

} else {
	//echo "This is get";
}

?>
<div class="col-md-6 col-md-offset-3" id="show" 
<?php if(!isset($_SESSION["error"]) && !isset($_SESSION["message"])) { echo 'style="display:none;'; } ?>"> 
	<!-- Opening of div id="show"-->
<h1 class="page-header text-center">Add Airplane</h1>
<?php echo message();?> <!-- form success messages -->
<?php echo errors($errors);?> <!-- form error messages-->
<!-- #################################################################################--> 
  <form class="form-inline" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="form-group">
  <label for="city">Airplane type:</label>
  <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>">
  </div>

  <input id="submit" name="submit" type="submit" value="Add" class="btn btn-primary">
  </form>
  <!-- #################################################################################--> 
<h5 class="page-header text-center">
</h5>   
</div> <!-- closing of div id="show"-->
