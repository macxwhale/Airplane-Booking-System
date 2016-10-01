<?php include ( "includes/header.php" ); ?>
    </div> <!-- Header div tag -->
    <hr> <!-- Line -->
    <div class="col-sm-8 text-left">  <!-- <div class="col-sm-8 text-left"> --> 
      <!-- opening alert alert info div tag -->
      <div class="alert alert-info"> 
          <strong>Info!</strong> You can find below the list of <code>Cities</code> that you can use to assign to a specific <code>Route</code>. If you want to add new city click on the <code>'Add +' button</code>.<code>Search</code> for any city and click on the results to add more routes.
      </div> 
      <!-- closing alert alert info div tag --> 

      <!-- Add city button -->
      <button type="button" class="btn btn-success"> 
      <span class="glyphicon glyphicon-plus"></span>&nbsp;Add City</button>
      <!-- End of city button -->

      <!-- Search form -->
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search..." onkeyup="showCity(this.value)">
          <span class="input-group-btn"></span>        
        </div>
      </form>
      <!-- End of search form -->
<hr>      
      <p>Suggestions: <span id="txtHint"></span></p>
<hr>
<!-- #################################################################################-->
<!--Inlude the add city form -->
<?php if(file_exists("includes/forms/add_city.php")) { require("includes/forms/add_city.php"); }  ?>
<!-- #################################################################################-->
<!-- Sql function to find all cities-->
<?php $city_set = find_all_cities(); ?>
<!-- #################################################################################-->
<!-- Scroll bar div tag-->
    <div style="width: 830px;height: 270px;overflow: scroll;">  
<!-- #################################################################################-->
<!-- If statement to check if array $city_set is empty-->    
    <?php if (is_array($city_set) || is_object($city_set)) { ?>    
<!-- #################################################################################-->
  <table class="table table-hover">
    <thead>
      <tr>
        <th>City</th>
        <th>Created On</th>
        <th>Update On</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>    
<!-- #################################################################################-->
<!-- Foreach loop to echo all data found using the find_all_cities function -->
  <?php foreach ($city_set as $key => $city) { ?>
        <tr>
          <?php echo "<td>" . $city["city_name"] . "</td>"; ?>
          <?php echo "<td><em>" . date("M j, Y, g:i a", strtotime($city["created_on"])) . "</em></td>"; ?> 
          <?php echo "<td><em>" . date("M j, Y, g:i a", strtotime($city["updated_on"])) . "</em></td>"; ?>
          <?php echo $city["status"] == 1 ? "<td><span class=\"label label-info\">Active</td>" : ""; ?>
          <?php echo $city["status"] == 0 ? "<td><span class=\"label label-warning\">Inactive</td>" : ""; ?>
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


