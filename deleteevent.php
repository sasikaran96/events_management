<?php
session_start();
include('connection.php');

 
//delete event

if(isset($_POST["delete_event_image"])){
    
    $delete_id = $_POST['delete_id'];
    $delete_image = $_POST['delete_image'];
    // run a query to delete the note
    $sql = "DELETE FROM events WHERE event_id = $delete_id";
    $result = mysqli_query($link, $sql);
    if($result){
        unlink("eventpicture/".$_GET["eventpicture"]);
        $_SESSION['status'] = "Deleted Sucessfully";
        header("location: mainpagelogin.php");
    }
    else{
        $_SESSION['status'] = "Data Not Deleted";
        header("location: mainpagelogin.php");
    }
    
    
    
    
    
    }



?>