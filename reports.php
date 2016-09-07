<?php include ("includes/header.php"); ?>
</div> <!-- closing header div tag --> 
    <hr></hr>

<div class="col-sm-8 text-left">  <!-- opening col-sm-8 text-left timetable div tag --> <!--2-->
    
  <ul class="nav nav-tabs" role="tablist" id="myTab"> <!-- opening nav nav- tabs -->
    <li class="active"><a href="#bus" role="tab" data-toggle="tab">
    Bus</a></li> <!-- closing bus li tag-->
    <li><a href="#routes" role="tab" data-toggle="tab">
    Routes</a></li> <!-- closing rroutes li tag-->
  </ul> <!-- closing nav nav- tabs -->

  <!-- Tab panes -->
  <div class="tab-content"> <!-- opening tab-content div tag --> <!--3-->

    <div class="tab-pane active" id="bus"> <!-- opening bus div tag --> <!--4-->

     
      <div class="alert alert-info"> <!-- opening alert alert-inf0 div tag --> <!--5-->
        <strong>Info!</strong> Use the form below to generate a report about the performance and revenues of a selected airplane. You can choose between "up to date" report or report for chosen by you date to date time period.
      </div> <!-- closing alert alert-info div tag--> <!--5-->

  
      <hr>

      <div class="form-group"> <!-- form group opening-->
      
        <label for="sel1">Route:</label>
        <select class="form-control" id="sel1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
        </select>
   
      </div> <!-- form group ending-->
      <div class="form-group"> <!-- form group opening-->
      
        <label for="sel1">Bus:</label>
        <select class="form-control" id="sel1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
        </select>
   
      </div> <!-- form group ending-->
      <div class="form-group"> <!-- form group opening-->
      
        <label for="sel1">Time scale:</label>
        <select class="form-control" id="sel1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
        </select>
   
      </div> <!-- form group ending-->


    </div> <!-- closing bus div tag -->

    



<div class="tab-pane" id="routes"> <!-- opening routes div tag --> <!--6-->
  <div class="alert alert-info"> <!-- opening alert alert info div tag --> <!--7-->
      <strong>Info!</strong> Use the form below to generate a report about the total performance and revenues of all airplanes from a selected route. You can choose between "up to date" report or report for chosen by you date to date time period.
  </div> <!-- closing alert alert info div tag --> <!--7-->
    
  <hr></hr>
    <div class="form-group"> <!-- form group opening-->
      
        <label for="sel1">Route:</label>
        <select class="form-control" id="sel1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
        </select>
   
      </div> <!-- form group ending-->
      <div class="form-group"> <!-- form group opening-->
      
        <label for="sel1">Time scale:</label>
        <select class="form-control" id="sel1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
        </select>
   
      </div> <!-- form group ending-->
  </div> <!-- closing bus timetable div tag --> <!--6-->
   </div> <!-- opening col-sm-8 text-left div tag --> <!--5-->

    </div> <!--4-->



    <div class="col-sm-2 sidenav"> <!-- opening col-sm-2 sidenav  div tag --> <!--8-->
      <div class="well"> <!-- opening well  div tag -->
        <p>ADS</p>
      </div> <!-- closing well  div tag -->
      <div class="well"> <!-- opening well  div tag -->
        <p>ADS</p>
      </div> <!-- closing well  div tag -->
    </div> <!-- closing col-sm-2 sidenav  div tag --> <!--8-->
  

  </div> <!--3-->
</div> <!--2-->

<?php include ("includes/footer.php"); ?>

</body>
</html>
