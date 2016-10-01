<?php include ( "header.php"); ?>
<?php 
#################################################################################
// Get city id form url
if(!isset($_GET["airplane_id"])){
    redirect_to("../../airplane_types.php");
} else {
    $airplane_id = $_GET["airplane_id"];
}
#################################################################################
 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
#################################################################################    
    if(empty($_POST["name"])){
        $_SESSION["error"] = "Airplane type is required";
    } else {
        $name = strtoupper(test_input($_POST["name"]));
    }
#################################################################################
    if(!isset($_POST["status"]) && $_POST["status"] == ""){
        $_SESSION["error"] = "Status is required";
    } else {
        $status = test_input($_POST["status"]);
    }
#################################################################################    
    if(empty($_SESSION["error"]) && !isset($_SESSION["error"])) {
        update_airplane_type_name($airplane_id);
    } 
#################################################################################    
} else {
    //echo "This is get";
} 
?>

    <div class="container">

        <div class="row">

            <div class="col-md-6 col-md-offset-3">

                <h1 class="page-header text-center">Airplane type Details</h1>

                <div class="alert alert-info"> <!-- opening alert alert info div tag --> <!--7-->
                    <strong>Info!</strong> You can modify the Airplane type details and click on <code>'Edit'</code> button to update the Airplane type information, <code>'Delete'</code> button to delete the Airplane type information and <code>'Add Seats'</code> button to add seats to the Airplane type. 
                </div> <!-- closing alert alert info div tag --> <!--7-->

                <?php echo message();?>
                <?php echo errors($errors);?>
<!-- #################################################################################-->                
<!-- #################################################################################-->                
                <?php $airplane_set = find_airplane_type_by_id($airplane_id); ?>
<!-- #################################################################################-->               
                <?php foreach ($airplane_set as $key => $airplane) { ?>

            <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?airplane_id=" . $airplane["airplane_id"]; ?>">
<!-- #################################################################################--> 
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Airplane Type</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" 
                        value="<?php echo $airplane["airplane_name"]; ?>">
                    </div>
                </div>
<!-- #################################################################################--> 
                <div class="form-group">
                    <label for="date" class="col-sm-2 control-label">Created</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="date"  
                        value="<?php echo date("M j, Y, g:i a", strtotime($airplane["created_on"]));?>" disabled>
                        
                    </div>
                </div>
<!-- #################################################################################--> 
                <div class="form-group">
                    <label for="date" class="col-sm-2 control-label">Updated</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="date"  
                        value="<?php echo date("M j, Y, g:i a", strtotime($airplane["updated_on"]))?>" disabled>
                        
                    </div>
                </div>
<!-- #################################################################################--> 
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                       
                    <label class="radio-inline"> 
                    <input type="radio" name="status" value="1"
                    <?php if (isset($airplane["status"]) && $airplane["status"]=="1") echo "checked"; ?>> Active
                    </label>
                    <label class="radio-inline">
                    <input type="radio" name="status" value="0"
                    <?php if (isset($airplane["status"]) && $airplane["status"]=="0") echo "checked"; ?>> Inctive
                    </label>
                        
                    </div>
                </div>
 <!-- #################################################################################-->               

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
        <input id="submit" name="submit" type="submit" value="Edit" class="btn btn-warning">

    <a class="btn btn-danger" href="delete_airplane_type.php?id=<?php echo $airplane["airplane_id"]; ?>"
    onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>


    <a href="add_seats.php" class="btn btn-success" role="button">Add Seats</a>

    <a href="../../airplane_types.php" class="btn btn-primary" role="button">Cancel</a>
    </div> 
</div>
<!-- #################################################################################-->   
            </form> 
<!-- #################################################################################-->              
            
<!-- #################################################################################--> 
                 <?php  } ?>
<!-- #################################################################################--> 


            </div>
        </div>
    </div>   
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  