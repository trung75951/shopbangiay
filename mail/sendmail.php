<?php
require 'Model/Exception.php';
require 'Model/PHPMailer.php';
require 'Model/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';
// require 'PHPMailer/src/OAuth.php';
// require 'PHPMailer/src/POP3.php';

// //Import PHPMailer classes into the global namespace
// //These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

class Mailler
{
    // public function sendMail($title,$content,$addressMail)
    // {

    //     //Create an instance; passing `true` enables exceptions
    //     $mail = new PHPMailer(true); 
    //     // $mail->SMTPOptions = array(
    //     //     'ssl' => array(
    //     //     'verify_peer' => false,
    //     //     'verify_peer_name' => false,
    //     //     'allow_self_signed' => true
    //     //     )
    //     //     );

    //     try {
    //         //Server settings
    //         $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    //         // $mail->isSMTP();             
    //         $mail->CharSet    = 'utf-8';                                //Send using SMTP
    //         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    //         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //         $mail->Username   = 'aliscuont@gmail.com';                     //SMTP username
    //         $mail->Password   = 'ddnjucmnmevurwqt';                               //SMTP password
    //         // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    //         // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    //         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //         //Recipients
    //         $mail->setFrom('aliscuont@gmail.com', 'Mailer');
    //         $mail->addAddress($addressMail);     //Add a recipient
    //         // $mail->addAddress('ellen@example.com');               //Name is optional
    //         // $mail->addReplyTo('info@example.com', 'Information');
    //         // $mail->addCC('cc@example.com');
    //         // $mail->addBCC('bcc@example.com');

    //         // //Attachments
    //         // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //         // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //         //Content
    //         $mail->isHTML(true);                                  //Set email format to HTML
    //         $mail->Subject = $title;
    //         $mail->Body    = $content;
    //         // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //         $mail->send();
    //         echo 'Message has been sent';
    //     } catch (Exception $e) {
    //         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //     }
    // }
    public function sendMail($title, $content, $addressMail)
    {
        // $email = new PHPMailer();
        // $email->CharSet = "UTF-8";
        // $email->Host = 'smtp.gmail.com';
        // $email->Port = 25;
        // $email->SMTPAuth = true;
        // $email->isSMTP();
        // $email->Username = 'whillits@gmail.com';
        // $email->Password = 'spongybaawilkmnj';
        // $email->SMTPSecure = 'ssl';
        // // $email->addAttachment($image, 'new.jpg');
        // $email->isHTML(true);
        // $email->setFrom('whillits@gmail.com', 'TrungTu');
        // $email->addAddress('trungtp2201@gmail.com');
        // $email->Subject = 'test';
        // $email->Body   = 'test';
        // $email->SMTPDebug = 2;
        // if (!$email->send()) {
        // 	echo $email->ErrorInfo;
        // 	exit();
        // } else {
        // 	echo 'send mail';
        // 	exit();
        // }
        // spongybaawilkmnj

        $mail = new PHPMailer(true);
        $mail->IsSMTP(); // telling the class to use SMTP
        //$mail->Host       = "ssl://smtp.gmail.com"; // SMTP server
        
        // $mail->SMTPDebug  = 1;
        $mail->CharSet    = 'utf-8';         
        $mail->Host       = "smtp.gmail.com";
        $mail->SMTPAuth   = true;
        $mail->Username = "aliscuont@gmail.com";
        $mail->Password = "oalwjjzkzucllrrh";
        $mail->SMTPSecure = 'tls';
        $mail->Port       = '587';
        // 
        $mail->SetFrom('whillits@gmail.com', 'Admin');
        $mail->AddAddress($addressMail, "reciever_name");
        //$mail->AddReplyTo("user2@gmail.com', 'First Last");

        $mail->IsHTML(true);
        $mail->Subject = $title;
        $mail->Body = $content;
        // $mail->AltBody    = 'Nhấn vào link để đặt lại mật khẩu!';
        // $mail->MsgHTML($body);

        if ($mail->Send()) {
            echo '<script> alert ("Đã gửi đường link đặt mật khẩu qua Mail của bạn!")</script>';
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=login&act=Verification"/>';
        } else {
            echo '<script> alert ("Mail Error")</script>';
            // var_dump($mail);
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=forgetpass"/>';
        }
    }
}

//     // ddnjucmnmevurwqt ==>pass
