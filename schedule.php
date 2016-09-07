<?php include ("includes/header.php"); ?>
</div> <!-- closing header div tag --> 
    <hr></hr>

<div class="col-sm-8 text-left">  <!-- opening col-sm-8 text-left timetable div tag --> <!--2-->
    
  <ul class="nav nav-tabs" role="tablist" id="myTab"> <!-- opening nav nav- tabs -->
    <li class="active"><a href="#daily_schedule" role="tab" data-toggle="tab">
    Daily Schedule</a></li> <!-- closing daily schedule li tag-->
    <li><a href="#routes_timetable" role="tab" data-toggle="tab">
    Routes Timetable</a></li> <!-- closing routes timetable li tag-->
  </ul> <!-- closing nav nav- tabs -->

  <!-- Tab panes -->
  <div class="tab-content"> <!-- opening tab-content div tag --> <!--3-->

    <div class="tab-pane fade in active" id="daily_schedule"> <!-- opening daily schedule div tag --> <!--4-->

    
      <div class="alert alert-info"> <!-- opening alert alert-inf0 div tag --> <!--5-->
        <strong>Info!</strong> Here you can see a list of airplanes that will departure today or the date selected by you. You can filter the list of airplanes by routes. "Total Tickets" stands for the total number of tickets sold for this plane / trip. You can directly add new booking for a selected bus using the "Add booking" button. You can view more details about the plane / trip or start some actions using the arrow next to "Add booking" button.
      </div> <!-- closing alert alert-info div tag--> <!--5-->

      <button type="button" class="btn btn-default">
      <span class="glyphicon glyphicon-calendar"></span>&nbsp;
      Today</button>

      <button type="button" class="btn btn-default">
      <span class="glyphicon glyphicon-print"></span>&nbsp;
      Print Schedule</button> 

      <hr>

        <table class="table table-hover"> <!-- opening table div tag -->
            <thead>
              <tr>
                  <th>Airplane</th>
                  <th>Departure</th>
                  <th>Arrival</th>
                  <th>Total Tickets</th>
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
        </table> <!-- closing table div tag -->

    </div> <!-- closing daily schedule div tag -->

    



<div class="tab-pane fade" id="routes_timetable"> <!-- opening routes timetable div tag --> <!--6-->
  <div class="alert alert-info"> <!-- opening alert alert info div tag --> <!--7-->
      <strong>Info!</strong> Here you can see a departure timetable of all airplaness of a specific route. It is weekly timetable and you can browse weeks by the "previous" and "next" links above the timetable. You can also jump to a chosen date / week timetable using the calendar date picker. To view the seats list of a bus trip click on its departure time. On mouse over you will see the number of passengers.
  </div> <!-- closing alert alert info div tag --> <!--7-->
    

    <table class="table table-hover"> <!-- opening table div tag -->
          <thead>
              <tr>
                  <th>Airplane</th>
                  <th>Departure</th>
                  <th>Arrival</th>
                  <th>Total Tickets</th>
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
          </table> <!-- closing table div tag -->

  </div> <!-- closing routes timetable div tag --> <!--6-->
   </div> <!-- opening col-sm-8 text-left div tag --> <!--5-->


<!-- pagination -->
      <ul class="pager">
        <li class="previous"><a href="#">Previous Week</a></li>
        <li class="next"><a href="#">Next Week</a></li>
      </ul>

      <hr>



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
