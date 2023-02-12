<?php
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();

$mail->IsSMTP();

$mail->Host = "smtp.gmail.com";

$mail->SMTPAuth = true;

$mail->CharSet = 'UTF-8';

$mail->SMTPSecure="tls";

$mail->Port="587";

$mail->Username="grisha123berberov654@gmail.com";

$mail->Password="orwvenibkugdlegd";

$mail->setFrom('gnome.@teaminfo');

$mail->FromName='gnome.@teaminfo';

$mail->isHTML(true);

$mail->Subject='Ваш код для регистрации ';

$mail->Body= "<p> Вы были зарегистрированы на новом онлайн сервисе Мои Тесты, который был создан гениальным программистом Григорием Берберовым с группы ВИИМ21 ! </p>
        <p> Тут я кароче отправляю код при регистрации,типа это не я сам написал а автоматом высылается при нажатии на кнопку, просто очуметь. Но сейчас кода нет потому что зачем он нужен когда серверов то ещё нет, вообще порадуйся за меня что это вообще работает я пишу код в два ночи. </p>
        <p> С уважением, Gnome team </p>  ";

$mail->addAddress('grisha123berberov654@gmail.com');

if ($mail->send()){
            echo "da";
        }else{
            echo "error";
        }



$mail->smtpClose();