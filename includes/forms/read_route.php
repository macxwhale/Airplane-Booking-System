<?php include ( "header.php"); ?>; 
<?php 
if(!isset($_GET["route_id"])){
    redirect_to("../../routes.php");
} else {
    $route_id = $_GET["route_id"];
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
            $dep = test_input($_POST["routes"][0]);
            $arr = test_input($_POST["routes"][1]);
            $title = $dep . " ". "-". " ".  $arr;
        }   
    }

    if(!isset($_POST["status"]) && $_POST["status"] == ""){
        $_SESSION["error"] = "Status is required";
    } else {
        $status = test_input($_POST["status"]);
    }

    if(empty($_SESSION["error"]) && !isset($_SESSION["error"])) {
        update_route($route_id);
    } 

} else {
    //echo "This is get";
} 
?>

    <div class="container">

        <div class="row">

            <div class="col-md-6 col-md-offset-3">

                <h1 class="page-header text-center">Route Details</h1>

                <div class="alert alert-info"> <!-- opening alert alert info div tag --> <!--7-->
                    <strong>Info!</strong> The route represents the <code>start <i>(departure)</i>a</code> and the <code>final <i>(arrival)</i></code> location of an <code>Airplane</code> trip. 
                </div> <!-- closing alert alert info div tag --> <!--7-->

                <?php echo message();?>
                <?php echo errors($errors);?>
<!-- #################################################################################-->                
                <?php $route_set = find_route_by_id($route_id); ?>
<!-- #################################################################################-->               
                <?php foreach ($route_set as $key => $route) { ?>

            <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?route_id=" . $route["route_id"]; ?>">
<!-- #################################################################################--> 
<div class="form-group">
  <label class="col-sm-2 control-label">Location&nbsp;:&nbsp;1&nbsp;
  <i class="text-primary">(Departure)</i></label>
        <?php $city_set = find_city_by_id($route["city_id"]); ?>
<div class="col-sm-10">
    <select class="form-control" id="r0" name="routes[]">
    <?php foreach ($city_set as $key => $value) { ?>
    <?php echo "<option value=". $value["city_name"] . ">" . $value["city_name"] ."</option>" ?>
    <?php } ?>  
    </select>
    <script type="text/javascript">
    document.getElementById('r0').value = "<?php echo $route['dep'];?>";
</script>
</div>
</div>

<!-- #################################################################################-->
<div class="form-group">
  <label for="sel1" class="col-sm-2 control-label">Location&nbsp;:&nbsp;2&nbsp;
  <i class="text-primary">(Arrival)</i></label>
        <?php $city_set = find_city_by_name($route['arr']); ?>
<div class="col-sm-10">
    <select class="form-control" id="r1" name="routes[]">
    <option value=""> --Select-- </option>
    <?php foreach ($city_set as $key => $value) { ?>
    <?php echo "<option value=". $value["city_name"] . ">" . $value["city_name"] ."</option>" ?>
    <?php } ?>  
    </select>
    <script type="text/javascript">
    document.getElementById('r1').value = "<?php echo $route['arr'];?>";
</script>
</div>
</div> 
<!-- #################################################################################--> 
                <div class="form-group">
                    <label for="date" class="col-sm-2 control-label">Created</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="date"  
                        value="<?php echo date("M j, Y, g:i a", strtotime($route["created_on"]));?>" disabled>
                        
                    </div>
                </div>
<!-- #################################################################################--> 
                <div class="form-group">
                    <label for="date" class="col-sm-2 control-label">Updated</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="date"  
                        value="<?php echo date("M j, Y, g:i a", strtotime($route["updated_on"]))?>" disabled>
                        
                    </div>
                </div>
<!-- #################################################################################--> 
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                       
                    <label class="radio-inline"> 
                    <input type="radio" name="status" value="1"
                    <?php if (isset($route["status"]) && $route["status"]=="1") echo "checked"; ?>> Active
                    </label>
                    <label class="radio-inline">
                    <input type="radio" name="status" value="0"
                    <?php if (isset($route["status"]) && $route["status"]=="0") echo "checked"; ?>> Inctive
                    </label>
                        
                    </div>
                </div>
 <!-- #################################################################################-->               

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input id="submit" name="submit" type="submit" value="Edit" class="btn btn-warning">

                    <a class="btn btn-danger" href="delete_route.php?id=<?php echo $route["route_id"]; ?>"
                    onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>

                        <a href="../../routes.php" class="btn btn-primary" role="button">Cancel</a>
                    </div> 
                </div>
<!-- #################################################################################-->   
            </form> 
<!-- #################################################################################--> 
                 <?php  } ?>
            </div>
        </div>
    </div>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

  