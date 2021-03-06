<?php include ( "header.php"); ?>
<?php 
#################################################################################
// Get city id form url
if(!isset($_GET["city_id"])){
    redirect_to("../../cities.php");
} else {
    $city_id = $_GET["city_id"];
}
#################################################################################
 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
#################################################################################    
    if(empty($_POST["city"])){
        $_SESSION["error"] = "City name is required";
    } else {
        $city_name = test_input($_POST["city"]);
        if(ereg('^[[:space:]]*$', $city_name)) {
          $_SESSION["error"] = "Only letters allowed";
        } elseif (!preg_match("/^[a-zA-Z ]*$/",$city_name)) {
          $_SESSION["error"] = "Only letters allowed";
        }
    }
#################################################################################
    if(!isset($_POST["status"]) && $_POST["status"] == ""){
        $_SESSION["error"] = "Status is required";
    } else {
        $status = test_input($_POST["status"]);
    }
#################################################################################    
    if(empty($_SESSION["error"]) && !isset($_SESSION["error"])) {
        update_city_status($city_id);
        if($route_set = find_all_routes()){
            update_route_status($city_id); 
        }
        $routes_for_city = find_routes_for_cities_by_id($city_id);
        if(is_array($routes_for_city) || is_object($routes_for_city)) {
            $_SESSION["error"] = "You cannot update a city with routes. Delete routes first";
        } else {
            update_city_name($city_id);
        }

        if(isset($_SESSION["message"]) && !empty($_SESSION["message"])) {
            unset($_SESSION["error"]);
        }
    } 
#################################################################################    
} else {
    //echo "This is get";
} 
?>

    <div class="container">

        <div class="row">

            <div class="col-md-6 col-md-offset-3">

                <h1 class="page-header text-center">City Details</h1>

                <div class="alert alert-info"> <!-- opening alert alert info div tag --> <!--7-->
                    <strong>Info!</strong> You can modify the city details and click on <code>'Edit'</code> button to update the city information, <code>'Delete'</code> button to delete the city information and <code>'Add Routes'</code> button to add routes to the city. You cannot add routes if the city is inactive 
                </div> <!-- closing alert alert info div tag --> <!--7-->

                <?php echo message();?>
                <?php echo errors($errors);?>
<!-- #################################################################################-->                
<!-- #################################################################################-->                
                <?php $city_set = find_city_by_id($city_id); ?>
<!-- #################################################################################-->               
                <?php foreach ($city_set as $key => $city) { ?>

            <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?city_id=" . $city["city_id"]; ?>">
<!-- #################################################################################--> 
                <div class="form-group">
                    <label for="city" class="col-sm-2 control-label">City</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="city" name="city" 
                        value="<?php echo $city["city_name"];?>">
                    </div>
                </div>
<!-- #################################################################################--> 
                <div class="form-group">
                    <label for="date" class="col-sm-2 control-label">Created</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="date"  
                        value="<?php echo date("M j, Y, g:i a", strtotime($city["created_on"]));?>" disabled>
                        
                    </div>
                </div>
<!-- #################################################################################--> 
                <div class="form-group">
                    <label for="date" class="col-sm-2 control-label">Updated</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="date"  
                        value="<?php echo date("M j, Y, g:i a", strtotime($city["updated_on"]))?>" disabled>
                        
                    </div>
                </div>
<!-- #################################################################################--> 
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                       
                    <label class="radio-inline"> 
                    <input type="radio" name="status" value="1"
                    <?php if (isset($city["status"]) && $city["status"]=="1") echo "checked"; ?>> Active
                    </label>
                    <label class="radio-inline">
                    <input type="radio" name="status" value="0"
                    <?php if (isset($city["status"]) && $city["status"]=="0") echo "checked"; ?>> Inctive
                    </label>
                        
                    </div>
                </div>
 <!-- #################################################################################-->               

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
        <input id="submit" name="submit" type="submit" value="Edit" class="btn btn-warning">

    <a class="btn btn-danger" href="delete_city.php?id=<?php echo $city["city_id"]; ?>"
    onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>

<?php $id = $city["city_id"]; ?>
<?php 
$link = "add_route.php?city_id=" . $id;
?>
<?php echo $city["status"] == 1 ? "<a href=".$link." class=\"btn btn-success\" role=\"button\">Add Routes</a>" : ""; ?>
<?php echo $city["status"] == 0 ? "<button class=\"btn btn-warning\" role=\"button\" disabled>Add Routes</button>" : ""; ?>

        <a href="../../cities.php" class="btn btn-primary" role="button">Cancel</a>
    </div> 
</div>
<!-- #################################################################################-->   
            </form> 
<!-- #################################################################################-->              
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Routes in <?php echo $city["city_name"];?></h4>
      </div>
      <div class="modal-body">
        <p>
        <?php $city_id = $city["city_id"]; ?>
        <?php $routes_set = find_routes_for_cities_by_id($city_id); ?>
        <?php if (is_array($routes_set) || is_object($routes_set)) { ?>
        <?php foreach ($routes_set as $key => $route) { ?> 
            <ul>
        <?php echo "<li>".  $route["title"] . "</li>"; ?>
            </ul> 
        <?php } }?>    
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>            
<!-- #################################################################################--> 
                 <?php  } ?>
<!-- #################################################################################--> 


            </div>
        </div>
    </div>   
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  