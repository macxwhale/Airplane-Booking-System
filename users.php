<?php include ("includes/header.php"); ?>
 
    </div>
    <div class="col-sm-8 text-left"> 


    <hr>
      <div class="alert alert-info">
        <strong>Info!</strong> Below is a list of all users that have access to the system back end. There are two types of users - Administrators and Editors. Administrators have full access to the system. Editors cannot access Reports, Settings, Users.
      </div>

      <!-- Trigger the modal with a button -->
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
      <span class="glyphicon glyphicon-plus"></span>&nbsp;Add Users</button>

       <div class="btn-group">
          <button type="button" class="btn btn-default">All</button>
          <button type="button" class="btn btn-default">Active</button>
          <button type="button" class="btn btn-default">Inactive</button>
      </div>

      <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search..">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>        
        </div>
      </form>
         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Registration date</th>
        <th>Role</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

      <tr class="danger">
        <td>Boeing</td>
        <td>301</td>
        <td>Active/Inactive</td>
        <td>Edit/Delete</td>
      </tr>

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

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


</body>
</html>
