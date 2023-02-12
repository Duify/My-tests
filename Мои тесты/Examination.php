<?php
/*
class Examination
{
    var $host;
    var $username;
    var $password;
    var $database;
    var $connect;
    var $home_page;
    var $query;
    var $data;
    var $statement;
    var $filedata;

    function __construct()
    {
        $this->host="localhost:8889";
        $this->username="root";
        $this->password="root";
        $this->database="online_examination";
        $this->home_page="http://localhost:8888";
        $this->connect= new PDO("mysql:host=$this->host;dbname=$this->database","$this->username","$this->password");
 
        session_start();
    }
    function execute_query()
    {
        $this->statement=$this->connect->prepare($this->query);
        $this->statement->execute($this->data);
    }
    function total_row()
    {
        $this->execute_query();
        return $this->statement->rowCount();
    }

    function send_email($receiver_email, $subject, $body)
    {
        $mail= new PHPMailer();

        $mail->IsSMTP();

        $mail->Host = 'smtp.gmail.com';

        $mail->Port="587";

        $mail->SMTPAuth = true;

        $mail->CharSet = 'UTF-8';

        $mail->Username='grisha123berberov654@gmail.com';

        /*$mail->Password='G2*4b9r6j33';
        $mail->Password="orwvenibkugdlegd";

        $mail->SMTPSecure='tls';

        $mail->setFrom('gnome.@teaminfo');

        $mail->FromName='gnome.@teaminfo';

        $mail->AddAddress($receiver_email,'');

        $mail->isHTML(true);

        $mail->Subject=$subject;

        $mail->Body= $body;

        $mail->send();

    }

}*/









require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

class Examination
{
	var $host;
	var $username;
	var $password;
	var $database;
	var $connect;
	var $home_page;
	var $query;
	var $data;
	var $statement;
	var $filedata;

	function __construct()
    {
        $this->host="localhost:8889";
        $this->username="root";
        $this->password="root";
        $this->database="online_examination";
        $this->home_page="http://localhost:8888";
        $this->connect= new PDO("mysql:host=$this->host;dbname=$this->database","$this->username","$this->password");
 
        session_start();
    }

	function execute_query()
	{
		$this->statement = $this->connect->prepare($this->query);
		$this->statement->execute($this->data);
	}

	function total_row()
	{
		$this->execute_query();
		return $this->statement->rowCount();
	}

	function send_email($receiver_email, $subject, $body)
	{
		$mail = new PHPMailer();

		$mail->IsSMTP();

		$mail->Host = 'smtp.gmail.com';

		$mail->Port = '587';

		$mail->SMTPAuth = true;

        $mail->CharSet = 'UTF-8';

		$mail->Username = 'grisha123berberov654@gmail.com';

		$mail->Password = 'orwvenibkugdlegd';

		$mail->SMTPSecure = 'tls';

		$mail->setFrom('gnome.@teaminfo');

		$mail->FromName = 'GnomeSupport@team';

		$mail->AddAddress($receiver_email, '');

		$mail->IsHTML(true);

		$mail->Subject = $subject;

		$mail->Body = $body;

		$mail->Send();		
	}
}

?>