
<div class="col-md-6 col-md-offset-3" id="show"> <!-- Opening of div id="show"-->
<h1 class="page-header text-center">Add City</h1>
  <form class="form-inline" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="form-group">
  <label for="city">City:</label>
  <input type="text" class="form-control" id="city" name="city" placeholder="Enter City Name" value="">
  </div>

  <input id="submit" name="submit" type="submit" value="Add City" class="btn btn-primary">
  </form>
<h5 class="page-header text-center">
</h5>   
</div> <!-- closing of div id="show"-->
