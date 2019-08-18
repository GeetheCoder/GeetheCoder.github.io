<?php


//my variables from index.php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';



      
   
$mail = new PHPMailer(true);  
    try {// Passing `true` enables exceptions

    //Server settings
    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'grmays144';                 // SMTP username
    $mail->Password = 'Deshon144!';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
        //sender 
    $mail->setFrom($email, $name);
        
        //Recipients
    $mail->addAddress('grmays144@gmail.com', 'Gee');     // Add a recipient            // Name is optional
 
   
         //Body Content
        $body =  "<p><strong>YO G</strong>, you have received a message from " . $name . " the message is " . $message . "</p>";

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = ' Email from Porfolio ' . $name;
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);    
    



    $mail->send();
    
    header("location: index.php?sent");
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

       

     ?>