<?php require_once("includes/sessions.php");?>
<?php include ("includes/header.php"); ?>
<?php require ("includes/functions/functions.php"); ?>
<?php require ("includes/db_connect.php"); ?>
    </div>
    <hr>
    <div class="col-sm-8 text-left"> 
      <div class="alert alert-info"> <!-- opening alert alert info div tag --> <!--7-->
          <strong>Info!</strong> You can find below the list of <code>Cities</code> that you can use to assign to a specific route. If you want to add new city, click on the <code>'Add +' button</code> to toggle between hide and show to see the add city field.
      </div> <!-- closing alert alert info div tag --> <!--7-->

      <button type="button" class="btn btn-success" data-toggle="tooltip" title="Show/Hide Form"> 
      <span class="glyphicon glyphicon-plus"></span>&nbsp;Add City</button>

      <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search.." onkeyup="showHint(this.value)">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>        
        </div>
      </form>
      <p>Suggestions <span id="txtHint"></span></p>
<hr>
<?php
// include the add city form
if(file_exists("includes/forms/add_city.php")) { require("includes/forms/add_city.php"); }
//echo "<p><code class='text-danger'>$errCity</code></p>";  
?>
         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>City</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
<?php 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, city, status FROM cities LIMIT 5");
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach($stmt->fetchAll() as $k=>$v) {

?>    


      <tr>
        <?php echo "<td>" . $v["city"] . "</td>"; ?>
        <?php 
              if ($v["status"] == 1) { 
                  echo  "<td>Active</td>"; 
              } elseif($v["status"] == 0) { 
                  echo  "<td>Inactive</td>";
              } else {
                  echo "Null";
              }
              ?>
        <?php echo '<td><a href="edit.php" class="btn btn-warning btn-sm">
          <span class="glyphicon glyphicon-pencil"></span> Edit 
        </a>

        <a href="remove.php" class="btn btn-danger btn-sm">
          <span class="glyphicon glyphicon-remove"></span> Remove 
        </a>

        </td>'; ?>
      
      </tr>

<?php 
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>      

    </tbody>
  </table>

      
      <ul class="pager">
        <li class="previous"><a href="#">Previous</a></li>
        <li class="next"><a href="#">Next</a></li>
      </ul>

      <hr>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>
<?php include ("includes/footer.php"); ?>

</body>
</html>


