<?php
    include("PHPMailer/src/Exception.php");
    include("PHPMailer/src/OAuth.php");
    include("PHPMailer/src/POP3.php");
    include("PHPMailer/src/PHPMailer.php");
    include("PHPMailer/src/SMTP.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);
    try{

        $mail -> SMTPDebug = 2;
        $mail -> isSMTP();
        $mail -> Host = 'smtp.gmail.com';
        $mail -> SMTPAuth = true;
        $mail -> Username = 'woala932@gmail.com';
        $mail -> Password = 'IoeMo1yn@#';
        $mail ->SMTPSecure = 'tls';
        $mail -> Port = 587;

        $mail -> CharSet = 'UTF-8';
        $mail -> setFrom('woala932@gmail.com');
        $mail -> addAddress('vanyellow1211@gmail.com','Thu Van');
        $mail -> isHTML(true);
            $mail -> Subject = 'Heloo00!!!';
            $mail -> Body = 'Wellcome to my website ';
            $mail -> AltBody = 'Thanks for visit us';
        $mail -> send();
        echo 'Message has been sent';
    } 
        catch(Exception $e){
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

?>