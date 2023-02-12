<?php
/*include('Examination.php');

require_once ('class.phpmailer.php');

$exam = new Examination;

$current_datetime = date("Y-m-d"). ' '.date("H:i:s", STRTOTIME(date('h:i:sa')));

if(isset($_POST['page']))
{
    if($_POST['page'] =='register')
    {
        if($_POST['action']=='check_email')
        {
            $exam->query = "SELECT * FROM admin_table WHERE admin_email_address = '".trim($_POST["email"])."'";
            $total_row = $exam->total_row();
            if($total_row == 0)
            {
                $output= array('success' => true);

                echo json_encode($output);
            }
        }
        
        if($_POST['action'] == 'register')
        {
            $admin_verfication_code= md5(rand());

            $receiver_email = $_POST['admin_email_address'];

            $adminname = $_POST['admin_name'];

            $adminfam = $_POST['admin_fam'];

            $adminotch = $_POST['admin_otch'];

            $exam->data = array(
                ':admin_email_address'      => $receiver_email,
                ':admin_password'           => password_hash($_POST['admin_password'],
                PASSWORD_DEFAULT),

                ':admin_verfication_code'   => $admin_verfication_code,

                ':admin_name'               => $adminname,

                ':admin_fam'                => $adminfam,

                ':admin_otch'               => $adminotch
            );

            $exam -> query = "INSERT INTO admin_table
            (admin_email_address, admin_password, admin_verfication_code, admin_name, admin_fam, admin_otch) 
            VALUES 
            (:admin_email_address,:admin_password,:admin_verfication_code,:admin_name,:admin_fam,:admin_otch)
            ";

            $exam -> execute_query();

            $subject='Подтвердите свой код регистрации на сервисе "Мои тесты"';

            $body = '<p> Вы были зарегистрированы на новом онлайн сервисе "Мои Тесты", который был создан гениальным программистом Григорием Берберовым с группы ВИИМ21 ! </p>
                <p> Тут я кароче отправляю код при регистрации,типа это не я сам написал а автоматом высылается при нажатии на кнопку, просто очуметь. Но сейчас кода нет потому что зачем он нужен когда серверов то ещё нет, вообще порадуйся за меня что это вообще работает я пишу код в два ночи. </p>
                <p> С уважением, Gnome team </p>
            ';

            $exam-> send_email($receiver_email, $subject , $body);

            $output = array(
                'success' => true
            );
            echo json_encode($output);
        }
    }
}
*/




//ajax_action.php

include('Examination.php');
//require_once('class.phpmailer.php');

$exam = new Examination;

$current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));

if(isset($_POST['page']))
{
	if($_POST['page'] == 'register')
	{
		if($_POST['action'] == 'check_email')
		{
			$exam->query = "
			SELECT * FROM admin_table 
			WHERE admin_email_address = '".trim($_POST["email"])."'
			";

			$total_row = $exam->total_row();

			if($total_row == 0)
			{
				$output = array(
					'success'	=>	true
				);

				echo json_encode($output);
			}
		}

		if($_POST['action'] == 'register')
		{
			$admin_verfication_code = md5(rand());

			$receiver_email = $_POST['admin_email_address'];

			$adminname = $_POST['admin_name'];

            $adminfam = $_POST['admin_fam'];

            $adminotch = $_POST['admin_otch'];

			$exam->data = array(
                ':admin_email_address'      => $receiver_email,
                ':admin_password'           => password_hash($_POST['admin_password'],
                PASSWORD_DEFAULT),

                ':admin_verfication_code'   => $admin_verfication_code,

                ':admin_name'               => $adminname,

                ':admin_fam'                => $adminfam,

                ':admin_otch'               => $adminotch
            );

			$exam -> query = "INSERT INTO admin_table
            (admin_email_address, admin_password, admin_verfication_code, admin_name, admin_fam, admin_otch) 
            VALUES 
            (:admin_email_address,:admin_password,:admin_verfication_code,:admin_name,:admin_fam,:admin_otch)
            ";

$exam -> execute_query();

$subject='Подтвердите свой код регистрации на сервисе "Мои тесты"';

$body = '<p> Уважаемый(ая) '.$adminname.  ' '.$adminfam.', Вы были зарегистрированы на новом онлайн сервисе Донского Государственного Технического Университета "Мои Тесты" </p>
	<p> Проект был создан в рамках конкурса "Студенческие IT-решения. Ваш пароль для входа на сайт - '.$_POST['admin_password'].' Чтобы перейти на страничку сервиса, перейдите по этой <a href="" <b> ссылке </b></a></p>
	<p> С уважением, Gnome team </p>
';

$exam->send_email($receiver_email, $subject , $body);

$output = array(
	'success' => true
);
echo json_encode($output);
		}
	}

}
?>