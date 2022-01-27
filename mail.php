<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['firstname'];
$lastname = $_POST['lastname'];
$country = $_POST['country'];
$phone = $_POST['phone'];
$email = $_POST['email'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  				// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'puethost@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'international2020'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('puethost@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('puetget925@gmail.com');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment($_FILES['passport']['tmp__name'], $_FILES['passport']['name']);
$mail->addAttachment($_FILES['personaldata']['tmp__name'], $_FILES['personaldata']['name']);
$mail->addAttachment($_FILES['schooldoc']['tmp__name'], $_FILES['schooldoc']['name']);    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Register form PEUT international';
$mail->Body    = '' .$name. '' .$lastname. ' left a request, his phone number ' .$phone. '<br>mail of user: ' .$email. '<br>country of user' .$country;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}
?>