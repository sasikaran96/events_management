
<?php
session_start();
include('connection.php');

//logout
include('logout.php');

//remember me
include('remember.php');
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
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Contact us</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="#loginModal" data-toggle="modal">Login</a></li>
                  </ul>
              
              </div>
          </div>
      
      </nav>
      
    <!--Jumbotron with Sign up Button-->
      <div class="jumbotron" id="myContainer">
          <h1>Eventzilla</h1>
          <p>Share your event with everyone.</p>
          <p>Life is an event. Make it Memorable!</p>
          <button type="button" class="btn btn-lg blue signup" data-target="#signupModal" data-toggle="modal">Sign up</button>
      </div>
      
      <!--Login form-->    
      <form method="post" id="loginform">
        <div class="modal" id="loginModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Login: 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Login message from PHP file-->
                  <div id="loginmessage"></div>
                  

                  <div class="form-group">
                      <label for="loginemail" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="loginemail" id="loginemail" placeholder="Email" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="loginpassword" class="sr-only">Password</label>
                      <input class="form-control" type="password" name="loginpassword" id="loginpassword" placeholder="Password" maxlength="64">
                  </div>
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="rememberme" id="rememberme">
                        Remember me
                      </label>
                          <a class="pull-right" style="cursor: pointer" data-dismiss="modal" data-target="#forgotpasswordModal" data-toggle="modal">
                      Forgot Password?
                      </a>
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <input class="btn blue" name="login" type="submit" value="Login">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">
                  Register
                </button>  
              </div>
          </div>
      </div>
      </div>
      </form>

  

    <!--Sign up form--> 
      <form method="post" id="signupform">
        <div class="modal" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                   <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Sign up and share your event with everyone! 
                  </h4>
                   
              </div>
              <div class="modal-body">
                  
                  <!--Sign up message from PHP file-->
                  <div id="signupmessage"></div>
                  
                  <div class="form-group">
                      <label for="username" class="sr-only">Username:</label>
                      <input class="form-control" type="text" name="username" id="username" placeholder="Username" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="firstname" class="sr-only">firstname:</label>
                      <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Firstname" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="lastname" class="sr-only">lastname:</label>
                      <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Lastname" maxlength="50">
                  </div>
                
                  <div class="form-group">
                      <label for="email" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="email" id="email" placeholder="Email Address" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="password" class="sr-only">Choose a password:</label>
                      <input class="form-control" type="password" name="password" id="password" placeholder="Choose a password" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="password2" class="sr-only">Confirm password</label>
                      <input class="form-control" type="password" name="password2" id="password2" placeholder="Confirm password" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="phonenumber" class="sr-only">phonenumber:</label>
                      <input class="form-control" type="text" name="phonenumber" id="phonenumber" placeholder="Phonenumber" maxlength="10">
                  </div>
                
              </div>
              <div class="modal-footer">
                  <input class="btn blue" name="signup" type="submit" value="Sign up">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
              </div>
          </div>
      </div>
      </div>
      </form>
      
      <!--Forgot password form-->
      <form method="post" id="forgotpasswordform">
        <div class="modal" id="forgotpasswordModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Forgot Password? Enter your email address: 
                  </h4>

              </div>
              <div class="modal-body">
                  
                  <!--forgot password message from PHP file-->
                  <div id="forgotpasswordmessage"></div>
                  

                  <div class="form-group">
                      <label for="forgotemail" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="forgotemail" id="forgotemail" placeholder="Email" maxlength="50">
                  </div>
              </div>
              <div class="modal-footer">
                  <input class="btn blue" name="forgotpassword" type="submit" value="Submit">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">
                  Register
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
    <script src="index.js"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>