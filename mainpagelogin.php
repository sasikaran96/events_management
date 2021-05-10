<?php

session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
include('connection.php');

$user_id = $_SESSION['user_id'];



?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

      
    <title>Eventzilla</title>
    <!-- Bootstrap CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="styling.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
      <style>
        #container{
            margin-top:120px;   
        }
          
    
        .buttons{
            margin-bottom: 20px;   
        }

    
              

        
       
        .events{
            margin-bottom: 100px;
        }

      </style>
   

  </head>
  <body>
     <!--Navigation Bar-->  
      <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
      
          <div class="container-fluid">
            
              <div class="navbar-header">
              
                  <a class="navbar-brand">Eventzilla</a>
                  <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  
                  </button>
              </div>
              <div class="navbar-collapse collapse" id="navbarCollapse">
                  <ul class="nav navbar-nav">
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li class="active"><a href="#">My Events</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Logged in as <b><?php echo $_SESSION['username']?></b></a></li>
                      <li><a href="index.php?logout=1">Log out</a></li>
                  </ul>
              
              </div>
          </div>
      
      </nav>
      
     

      
      <!--Container-->
      <div class="container" id="container">
          <!--Alert Message-->
          <div id="alert" class="alert alert-danger collapse">
              <a class="close" data-dismiss="alert">
                &times;
              </a>
              <p id="alertContent"></p>
          
          </div>
          <div class="row">
              <div class="col-md-offset-1 col-md-6">
                  <div class="buttons">
                      <button id="addEvent" type="button" class="btn btn-info btn-lg" data-dismiss="modal" data-target="#eventmodal" data-toggle="modal">
                  Add Event
                </button> 
    
                  </div>
            
              </div>
          </div>
         <div class="table-responsive-sm">
           <table table class="table table-striped">
               <tr><th>Event Id</th><th>Event Name</th><th>Date And Time</th><th>Location</th><th>Organization</th><th>Organizer</th><th>Contact</th><th>Description</th><th>Picture</th><th>Action</th></tr>
                          <?php
                            //geting user_id
                          $user_id = $_SESSION['user_id'];
                          //run a query to look for notes corresponding to user_id
                            $sql =mysqli_query($link,"SELECT * FROM events WHERE user_id ='$user_id'");
                            while($row=mysqli_fetch_array($sql,)){
                                echo '<tr><td>' .$row["event_id"].'</td>';
                                echo '<td>'.$row["eventname"].'</td>';
                                echo '<td>'.$row["dateandtime"].'</td>';
                                echo '<td>'.$row["location"].'</td>';
                                echo '<td>'.$row["nameoforganization"].'</td>';
                                echo '<td>'.$row["nameofeventorganizer"].'</td>';
                                echo '<td>'.$row["contactdetails"].'</td>';
                                echo '<td>'.$row["descriptionofevent"].'</td>';
                                echo '<td><img src="eventpicture/'.$row["eventpicture"].'"style="width:100px;height:100px;"/></td>';
                                echo '<td>';
                                echo '<form action="deleteevent.php" method="POST">';
                                echo '<input type="hidden" name="delete_id" value='.$row["event_id"].'>';
                                echo '<input type="hidden" name="delete_image" value='.$row["eventpicture"].'>';
                                echo '<button type="submit" name="delete_event_image" class="btn btn-danger">Delete</button>';
                                
                                echo '</form>';
                                echo '</td>';

                                echo '</tr>';
                            }
                            
                         
//delete event

if(isset($_GET["delete"])){
    $sql =mysqli_query($link,"DELETE FROM events WHERE event_id'".$_GET["delete"]."'");
    if($sql){
        unlink("eventpicture/".$_GET["eventpicture"]);
    }
}

                          ?>
                      
                      </table>
</div>
      </div>
      <?php
      $user_id = $_SESSION['user_id'];

//delete event

if(isset($_GET["delete"])){
    $sql =mysqli_query($link,"DELETE FROM events WHERE event_id'".$_GET["delete"]."'");
    if($sql){
        unlink("eventpicture/".$_GET["eventpicture"]);
    }
}
      
      ?>

      
    <!--Add event form--> 
      <form method="post" enctype="multipart/form-data" id="createeventform">
        <div class="modal" id="eventmodal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                   <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Create Your Event Here!
                  </h4>
                   
              </div>
              <div class="modal-body">
                  
                  <!--Sign up message from PHP file-->
                  <div id="eventsmessage"></div>
                  
                  <div class="form-group">
                      <label for="eventname" class="sr-only">Name Of Event:</label>
                      <input class="form-control" type="text" name="eventname" id="eventname" placeholder="Name Of Event" maxlength="500">
                  </div>
                  <div class="form-group">
                      <label for="dateandtime" class="sr-only">Date And Time:</label>
                      <input class="form-control" type="datetime-local" name="dateandtime" id="dateandtime" placeholder="Date And Time" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="location" class="sr-only">Location:</label>
                      <input class="form-control" type="text" name="location" id="location" placeholder="Location" maxlength="500">
                  </div>
                
                  <div class="form-group">
                      <label for="nameoforganization" class="sr-only">Name Of Organization:</label>
                      <input class="form-control" type="text" name="nameoforganization" id="nameoforganization" placeholder="Name Of Organization" maxlength="500">
                  </div>
                  <div class="form-group">
                      <label for="nameoforganization" class="sr-only">Name Of Event Organizer:</label>
                      <input class="form-control" type="text" name="nameofeventorganizer" id="nameofeventorganizer" placeholder="Name Of Event Organizer" maxlength="500">
                  </div>
                  <div class="form-group">
                      <label for="contactdetails" class="sr-only">Contact Details</label>
                      <input class="form-control" type="tetx" name="contactdetails" id="contactdetails" placeholder="Contact Details" maxlength="500">
                  </div>
                  <div class="form-group">
                      <label for="descriptionofevent" class="sr-only">Description Of Event:</label>
                      <input class="form-control" type="text" name="descriptionofevent" id="descriptionofevent" placeholder="Description Of Event" maxlength="10000">
                  </div>
                  <div class="form-group">
                      <label for="eventpicture" class="sr-only">Select a picture:</label>
                      <input class="form-control"  type="file" name="eventpicture" placeholder="Select a picture:" id="eventpicture">
                      
                  </div>
                 <!--  <div class="form-group">
             <div class="custom-file">
                <label for="imageSelect" class="custom-file-label">Select Image </label>
                <input class="custom-file-input" type="File" name="imageSelect" id="imageSelect" value="">
              
              </div>
            </div> -->
                
                
              </div>
              <div class="modal-footer">
                  <input class="btn blue" name="submit" type="submit" value="Add Event">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
              </div>
          </div>
      </div>
      </div>
      </form>
      
      
      <!-- Footer-->
      <div class="footer">
          <div class="container">
              <p>events.jaffnait.com Copyright &copy; 2020-<?php $today = date("Y"); echo $today?>.</p>
          </div>
      </div>
    
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="event.js"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>