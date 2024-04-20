<?php
include("partial/header.php");
include("partial/navbar.php");
include("partial/sidebar.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hoa_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM events";
$result = $conn->query($sql);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Calendar</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
            <li class="breadcrumb-item active">Calendar</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-body">
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                <div class="sticky-top mb-3">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Draggable Event | Reservation</h4>
                    </div>
                    <div class="card-body">
                      <!-- the events -->
                      <div id="external-events">
                        <?php
                        if ($result) {
                          while ($row = $result->fetch_assoc()) {
                            echo '<div class="external-event bg-success">' . $row['transaction_id'] . '</div>';
                          }
                        }
                        ?>
                        <!-- <div class="external-event bg-success">Basketball Court</div>
                        <div class="external-event bg-warning">Tennis Court</div>
                        <div class="external-event bg-info">Swimming Pool</div>
                        <div class="external-event bg-primary">Clubhouse</div>
                        <div class="external-event bg-danger">Function Room</div> -->
                        <!-- <div class="checkbox">
                          <label for="drop-remove">
                            <input type="checkbox" id="drop-remove">
                            remove after drop
                          </label>
                        </div> -->
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  <div class="card">
                    <form method="POST" action="./php/add_event.php">
                      <div class="card-header">
                        <h3 class="card-title">Create Event</h3>
                      </div>
                      <div class="card-body">
                        <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                          <ul class="fc-color-picker" id="color-chooser">
                            <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                            <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                            <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                            <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                            <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                          </ul>
                        </div>
                        <!-- /btn-group -->
                        <div class="form-group">
                          <label for="start_date">Title:</label>
                          <input type="text" id="title" name="title" required style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                        </div>
                        <div class="form-group">
                          <label for="transaction">Transaction:</label>
                          <?php
                          $sql = "SELECT * FROM transaction";
                          $result = $conn->query($sql);

                          echo '<select name="transaction">';
                          if ($result) {
                            while ($row = $result->fetch_assoc()) {
                              echo '<option value="' . $row['tx_id'] . '">' . $row['tx_no'] . '</option>';
                            }
                          }
                          echo '</select>';
                          ?>
                          <div class="form-group">
                            <label for="start_date">Start Date:</label>
                            <input type="date" id="start_date" name="start_date" required style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                          </div>
                          <div class="form-group">
                            <label for="end_date">End Date:</label>
                            <input type="date" id="end_date" name="end_date" required style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                          </div>


                          <div class="input-group-append">
                            <button id="add-new-event" type="submit" class="btn btn-primary">Add</button>
                          </div>
                          <!-- /btn-group -->
                        </div>
                        <!-- /input-group -->
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-9">
                <div class="card card-primary">
                  <div class="card-body p-0">
                    <!-- THE CALENDAR -->
                    <div id="calendar"></div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!--<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>-->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    <script>
      $(function() {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function() {

            // create an Event Object (https://fullcalendar.io/docs/event-object)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            }

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject)

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 1070,
              revert: true, // will cause the event to go back to its
              revertDuration: 0 //  original position after the drag
            })

          })
        }

        ini_events($('#external-events div.external-event'))

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d = date.getDate(),
          m = date.getMonth(),
          y = date.getFullYear()

        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendar.Draggable;

        var containerEl = document.getElementById('external-events');
        var checkbox = document.getElementById('drop-remove');
        var calendarEl = document.getElementById('calendar');

        // initialize the external events
        // -----------------------------------------------------------------

        new Draggable(containerEl, {
          itemSelector: '.external-event',
          eventData: function(eventEl) {
            return {
              title: eventEl.innerText,
              backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
              borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
              textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
            };
          }
        });

        var calendar = new Calendar(calendarEl, {
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
          },
          themeSystem: 'bootstrap',
          //Random default events
          events: [

          ],
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar !!!
          drop: function(info) {
            // is the "remove after drop" checkbox checked?
            if (checkbox.checked) {
              // if so, remove the element from the "Draggable Events" list
              info.draggedEl.parentNode.removeChild(info.draggedEl);
            }
          }
        });


        calendar.render();
        // $('#calendar').fullCalendar()

        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
        // Color chooser button
        $('#color-chooser > li > a').click(function(e) {
          e.preventDefault()
          // Save color
          currColor = $(this).css('color')
          // Add color effect to button
          $('#add-new-event').css({
            'background-color': currColor,
            'border-color': currColor
          })
        })
        // $('#add-new-event').click(function(e) {
        //   e.preventDefault()
        //   // Get value and make sure it is not null
        //   var val = $('#new-event').val()
        //   if (val.length == 0) {
        //     return
        //   }

        //   // Create events  
        //   var event = $('<div />')
        //   event.css({
        //     'background-color': currColor,
        //     'border-color': currColor,
        //     'color': '#fff'
        //   }).addClass('external-event')
        //   event.text(val)
        //   $('#external-events').prepend(event)

        //   // Add draggable funtionality
        //   ini_events(event)

        //   // Remove event from text input
        //   $('#new-event').val('')
        // })
      })
    </script>
</div>
<!-- /.card-body -->
<div class="card-footer">
  <!-- Footer -->
</div>
<!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include('partial/footer.php') ?>