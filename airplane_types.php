<?php include ("includes/header.php"); ?>
 
    </div>
    <hr></hr>
    <div class="col-sm-8 text-left"> 
      <div class="alert alert-info">
        <strong>Info!</strong> Below is a list of all airplane types. Through airplane types you can search an Airplane Type and add the number of seats(Premier and Economy class). This will let customers make bookings and reserve their seats and tickets.
      </div>

      <a<!-- Add city button -->
      <button type="button" class="btn btn-success"> 
      <span class="glyphicon glyphicon-plus"></span>&nbsp;Add Airplane Type</button>
      <!-- End of city button -->

      <!-- Search form -->
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search..." onkeyup="showAirplane(this.value)">
          <span class="input-group-btn"></span>        
        </div>
      </form>
      <!-- End of search form -->
<hr>      
      <p>Suggestions: <span id="txtHint"></span></p>
<hr>
<!-- #################################################################################-->
<!--Inlude the add city form -->
<?php if(file_exists("includes/forms/add_airplane_type.php")) { require("includes/forms/add_airplane_type.php"); }  ?>
<!-- #################################################################################-->
<!-- Sql function to find all cities-->
<?php $airplane_set = find_all_airplane_types(); ?>
<!-- #################################################################################-->
<!-- Scroll bar div tag-->
    <div style="width: 830px;height: 270px;overflow: scroll;">  
<!-- #################################################################################-->
<!-- If statement to check if array $city_set is empty-->    
    <?php if (is_array($airplane_set) || is_object($airplane_set)) { ?>    
<!-- #################################################################################-->
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Airplane Type</th>
        <th>Created On</th>
        <th>Update On</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>    
<!-- #################################################################################-->
<!-- Foreach loop to echo all data found using the find_all_cities function -->
  <?php foreach ($airplane_set as $key => $type) { ?>
        <tr>
          <?php echo "<td>" . $type["airplane_name"] . "</td>"; ?>
          <?php echo "<td><em>" . date("M j, Y, g:i a", strtotime($type["created_on"])) . "</em></td>"; ?> 
          <?php echo "<td><em>" . date("M j, Y, g:i a", strtotime($type["updated_on"])) . "</em></td>"; ?>
          <?php echo $type["status"] == 1 ? "<td><span class=\"label label-info\">Active</td>" : ""; ?>
          <?php echo $type["status"] == 0 ? "<td><span class=\"label label-warning\">Inactive</td>" : ""; ?>
          </tr>   
  <?php } //End of foreach ($city_set as $key => $city) ?>
<?php } else { echo "<p class=\"text-muted\">No records found.</p> "; }// End of f (is_array($city_set) || is_object($city_set)) ?>
<!-- #################################################################################-->
    </tbody>
  </table>
<!-- #################################################################################-->
</div>       
</div> <!-- end of <div class="col-sm-8 text-left"> -->   
<!-- #################################################################################-->
    <div class="col-sm-2 sidenav"> <!-- <div class="col-sm-2 sidenav"> -->
<!-- #################################################################################-->    
      <div class="well">
        <p>ADS</p>
      </div>

      <div class="well">
        <p>ADS</p>
      </div>

      <div class="well">
        <p>ADS</p>
      </div>

      <div class="well">
        <p>ADS</p>
      </div>

      <div class="well">
        <p>ADS</p>
      </div> 
<!-- #################################################################################-->   
    </div> <!-- End of <div class="col-sm-2 sidenav"> -->
<!-- #################################################################################-->
</div>
</div>
<!-- #################################################################################-->
<?php include ( "includes/footer.php" ); ?>

</body>
</html>


