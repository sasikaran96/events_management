//Ajax Call for the sign up form 
//Once the form is submitted
$("#createeventform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "addevent.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            if(data){
                $("#eventsmessage").html(data);
            }
        },
        error: function(){
            $("#signupmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});


