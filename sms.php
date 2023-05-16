<?php 

require "twilio-php/Services/Twilio.php";  

// set your AccountSid and AuthToken from www.twilio.com/user/account

$AccountSid = "AC037df0c3f9e8a23b15b0c9ab87ac6941"; 

$AuthToken = "8e5123054c6d6071a6e1ad4751e477ae"; 

$client = new Services_Twilio($AccountSid, $AuthToken); 

try { 

    $number=$_POST['number']; 

    $msg=$_POST['Message']; 

    $message = $client->account->messages->create(array( 

        "From" => "+917025238254", // Paste your phone number here(Refer Step 4) 

        "To" => $number, 

        "Body" => $msg, 

    )); 

} catch (Services_Twilio_RestException $e) { 

    echo $e->getMessage(); 

} 

?> 
