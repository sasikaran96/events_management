<?php
//<!--Start session-->
session_start();
include('connection.php'); 


$user_id = $_SESSION['user_id'];





//    <!--Define error messages-->
$missingEventname = '<p><strong>Please enter a event name!</strong></p>';
$missingDateandtime = '<p><strong>Please enter event date and time!</strong></p>';
$missingLocation = '<p><strong>Please enter event location!</strong></p>';
$missingNameoforganization = '<p><strong>Please enter your name of organization!</strong></p>';
$missingNameofeventorganizer = '<p><strong>Please enter name of your event organizer!</strong></p>';
$missingContactdetails = '<p><strong>Please enter name of your Address, mobile no, email!</strong></p>';
$missingDescriptionofevent = '<p><strong>Please brifly describe about your event</strong></p>';


//$missingImageSelect = '<p><strong>Please Add your event invitation</strong></p>';


//Get eventname
if(empty($_POST["eventname"])){
    $errors .= $missingEventname;
}else{
    $eventname = filter_var($_POST["eventname"], FILTER_SANITIZE_STRING);   
}

//Get Date And Time
if(empty($_POST["dateandtime"])){
    $errors .= $missingDateandtime;
}else{
    $dateandtime = filter_var($_POST["dateandtime"], FILTER_SANITIZE_STRING);   
}



//Get location
if(empty($_POST["location"])){
    $errors .= $missingLocation;
}else{
    $location = filter_var($_POST["location"], FILTER_SANITIZE_STRING);   
}

//Get Name of organization
if(empty($_POST["nameoforganization"])){
    $errors .= $missingNameoforganization;
}else{
    $nameoforganization = filter_var($_POST["nameoforganization"], FILTER_SANITIZE_STRING);   
}

//Get Name of name of your event organizer
if(empty($_POST["nameofeventorganizer"])){
    $errors .= $missingNameofeventorganizer;
}else{
    $nameofeventorganizer = filter_var($_POST["nameofeventorganizer"], FILTER_SANITIZE_STRING);   
}

//Get Contactdetails
if(empty($_POST["contactdetails"])){
    $errors .= $missingContactdetails;
}else{
    $contactdetails = filter_var($_POST["contactdetails"], FILTER_SANITIZE_STRING);   
}

//Get Descriptionofevent
if(empty($_POST["descriptionofevent"])){
    $errors .= $missingDescriptionofevent;
}else{
    $descriptionofevent = filter_var($_POST["descriptionofevent"], FILTER_SANITIZE_STRING);   
}





//If there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}




//Prepare variables for the queries
$eventname = mysqli_real_escape_string($link, $eventname);
$dateandtime = mysqli_real_escape_string($link, $dateandtime);
$location = mysqli_real_escape_string($link, $location);
$nameoforganization = mysqli_real_escape_string($link,$nameoforganization);
$nameofeventorganizer = mysqli_real_escape_string($link, $nameofeventorganizer);
$contactdetails = mysqli_real_escape_string($link, $contactdetails);
$descriptionofevent = mysqli_real_escape_string($link, $descriptionofevent);




//Insert event details  event table `imageSelect` '$imageSelect'

$sql = "INSERT INTO events (`user_id`, `eventname`, `dateandtime`, `location`, `nameoforganization`, `nameofeventorganizer`, `contactdetails`, `descriptionofevent`, `eventpicture`  ) VALUES ('$user_id', '$eventname', '$dateandtime', '$location', '$nameoforganization', '$nameofeventorganizer', '$contactdetails', '$descriptionofevent','".$_FILES['eventpicture']['name']."' )";
//insert images
if($sql){

   /* Getting file name */
   $filename = $_FILES['eventpicture']['name'];

   /* Location */
   $target_dir = "eventpicture/";
   $target_file = $target_dir . basename($_FILES['eventpicture']['name']);
   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


   /* Valid extensions */
   $valid_extensions = array("jpg","jpeg","png");

   
      /* Upload file */
      if(move_uploaded_file($_FILES['eventpicture']['tmp_name'],$target_file));
   

   
}


$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>'; 
    exit;
}
else{
    echo "<div class='alert alert-success'>Your event added sucessfully.</div>";

header("location: mainpagelogin.php");
}

 

?>