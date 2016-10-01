<?php include ("includes/header.php"); ?>
  </div> <!-- Header div tag -->
    <hr>
    <div class="col-sm-8 text-left"> <!-- <div class="col-sm-8 text-left"> --> 
    	<!-- opening alert alert-info div tag -->
      <div class="alert alert-info"> 
        <strong>Info!</strong> Below is a list of all <code>Routes</code>. They describe the <code>start <i>(departure)</i></code> and the <code>final <i>(arrival)</i></code> of an airplane trip. To create a route click the <code>"Add +" button</code>. You can also <code>search</code> for any route and click on the results to see more details.
      </div> 
      <!-- closing alert alert-info div tag--> <!--5-->

      <div class="btn-group">
          <button type="button" class="btn btn-default">All</button>
          <button type="button" class="btn btn-default">Confirmed</button>
          <button type="button" class="btn btn-default">Pending</button>
          <button type="button" class="btn btn-default">Cancelled</button>
      </div>

      <!-- Search form -->
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search..." onkeyup="showRoute(this.value)">
          <span class="input-group-btn"></span>        
        </div>
      </form>
      <!-- End search form -->
<hr>      
      <p>Suggestions: <span id="txtHint"></span></p>
<hr>
<!-- #################################################################################-->
<?php echo message();?>
<?php echo errors($errors);?>
<!-- #################################################################################-->
<!-- Sql function to find all routes-->
<?php $route_set = find_all_routes(); ?>
<!-- #################################################################################-->
<!-- Scroll bar div tag-->
    <div style="width: 830px;height: 270px;overflow: scroll;"> 
<!-- #################################################################################-->
<!-- If statement to check if array $route_set is empty-->
<?php if (is_array($route_set) || is_object($route_set)) { ?>   
<!-- #################################################################################-->    
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>From</th>
        <th>To</th>
        <th>Created on</th>
        <th>Updated on</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
<!-- #################################################################################-->
<!-- #################################################################################-->
<!-- Foreach loop to echo all data found using the find_all_routes function -->    
<?php foreach ($route_set as $key => $route) { ?>
     <tr>
  <?php echo "<td>" . $route["title"] . "</td>"; ?>
  <?php echo "<td>" . $route["dep"] . "</td>"; ?>
  <?php echo "<td>" . $route["arr"] . "</td>"; ?>
  <?php echo "<td><em>" . date("M j, Y, g:i a", strtotime($route["created_on"])) . "</em></td>"; ?> 
  <?php echo "<td><em>" . date("M j, Y, g:i a", strtotime($route["updated_on"])) . "</em></td>"; ?>
  <?php echo $route["status"] == 1 ? "<td><span class=\"label label-info\">Active</td>" : ""; ?>
  <?php echo $route["status"] == 0 ? "<td><span class=\"label label-warning\">Inactive</td>" : ""; ?>
      </tr>
<?php }  //End of foreach foreach ($route_set as $key => $route)?>
    </tbody>
  </table>
  <!-- #################################################################################-->
<?php } else { echo "<p class=\"text-muted\">No records found.</p> "; } // End of ff (is_array($route_set) || is_object($route_set))?>
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
<!-- #################################################################################-->
<?php include ("includes/footer.php"); ?>
<!-- #################################################################################-->
</body>
</html>


      