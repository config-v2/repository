<?
class smtp_mail {




public function sendmail($host, $user, $password, $secure, $port, $product, $email, $subject, $message ) {
require 'PHPMailerAutoload.php';
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    //Server settings
	$mail -> setLanguage ( 'ru' , '' );
    $mail->SMTPDebug = 3;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = $host;  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $user;                 // SMTP username
    $mail->Password = $password;                           // SMTP password
    $mail->SMTPSecure = $secure;                            // Enable TLS encryption, `ssl` also accepted, SMTPSecure = 'tls';
    $mail->Port = $port;                                    // TCP port to connect to $mail->Port = 587;    

    //Recipients
    $mail->setFrom($user, $product);
   // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress($email);               // Name is optional
   

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = stripslashes(htmlspecialchars($message));

    if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo; } else {    echo 'Message has been sent'; }



}
}
