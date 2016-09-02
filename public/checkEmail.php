<?php


    //$registeredEmail = User::all()->lists('email');
    $requestedEmail  = $_REQUEST['useremail'];
    $registeredEmail = User::where('email', '=', "test@test.com")->get();

    echo json_encode(false);


    /*
    if( in_array($requestedEmail, $registeredEmail) ){
        echo json_encode(false);
    }
    else{
        echo json_encode(true);
    }
    */


?>
