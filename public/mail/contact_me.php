<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter($_POST["name"]);
    $email = filter($_POST["email"]);
    $message = filter($_POST["message"]);
    
    $res['name'] = $name;
    $res['email'] = $email;
    $res['message'] = $message;

    $to = 'info@synergynode.com';
    //$to = 'icekidben@gmail.com';
    $subject = 'New Contact Info from '.$name.' with email: '. $email;
    $message = $message;
    $headers = 'From: '.$email;

    $process = sendMail($to,$subject,$message,$headers);
    $res['success'] = $process;
    echo json_encode($res);
    
}

function filter($data){
    // $data = trim($data);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function sendMail($to,$subject,$message,$headers)
{
    $secure_check = sanitize_my_email($to);
    if ($secure_check == false) {
       return false;
    } else { //send email 
        mail($to,$subject,$message,$headers);
        return true;
    }
    
}

function sanitize_my_email($field) {
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
    
?>