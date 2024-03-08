<?php
//Aktivasi PHPMailer-->jangan dihapus
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//koneksi database
include '../koneksi.php';

//menangkapdata yang di kirim dari form
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//menginput data ke database
mysqli_query($koneksi,"insert into contact values('','$name','$email','$subject','$message')");

//Load Composer's autoloader -->setup autoload
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mailingtestingobaja@gmail.com';                     //SMTP username
    $mail->Password   = 'hnav skyd ophk lgie';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('obajasiadari@gmail.com', 'Chris');     //Add a recipient
    //$mail->addReplyTo($email, $name);

    //Attachments
    //$mail->addAttachment('assets/3dtec.png');         //Add attachments

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = '';

    $mail->send();
    echo 'Message has been sent';
    

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
header('Location: ../thankyou.php');
exit;