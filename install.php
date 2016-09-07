<?php include ("includes/header.php"); ?>
<?php // require_once ("includes/db_connect.php");?>

    <hr></hr>

<div class="col-sm-8 text-left">  <!-- opening col-sm-8 text-left timetable div tag --> <!--2-->
    
  <ul class="nav nav-tabs" role="tablist" id="myTab"> <!-- opening nav nav- tabs -->
    <li class="active"><a href="#routes" role="tab" data-toggle="tab">
    Routes</a></li> <!-- closing routes li tag-->
    <li><a href="#cities" role="tab" data-toggle="tab">
    Cities</a></li> <!-- closing rcities li tag-->
  </ul> <!-- closing nav nav- tabs -->

  <!-- Tab panes -->
  <div class="tab-content"> <!-- opening tab-content div tag --> <!--3-->

    <div class="tab-pane active" id="routes"> <!-- opening routes div tag --> <!--4-->  
        <div class="alert alert-info"> <!-- opening alert alert-inf0 div tag --> <!--5-->
        <strong>Info!</strong> Below is a list of all routes. Routes are basic elements of the Airplane Schedule system. They describe the start (departure) and the final (arrival) location of a airplane trip and all intermediate stops. Here you can search, filter or sort routes. Using the arrow icon at the end of each route row you can create a reverse route or copy the selected route, which might help you in creating your routes list.
      </div> <!-- closing alert alert-info div tag--> <!--5-->

    </div> <!-- closing routes div tag -->

    
<div class="tab-pane" id="cities"> <!-- opening cities div tag --> <!--6-->
  
  <div class="alert alert-info"> <!-- opening alert alert info div tag --> <!--7-->
      <strong>Info!</strong> You can find below the list of cities that you can use to assign to a specific route. If you want to add new city, click on the 'Add +' button.
  </div> <!-- closing alert alert info div tag --> <!--7-->


  </div> <!-- closing routes timetable div tag --> <!--6-->
   </div> <!-- opening col-sm-8 text-left div tag --> <!--5-->

      <hr>



    </div> <!--4-->



  </div>
</div>

</body>
</html>



