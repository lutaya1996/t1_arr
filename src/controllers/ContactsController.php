<?php

namespace tt\Controllers;

use tt\DataProvider\DataProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use tt\Helpers\ValidateInputs;

class ContactsController extends BaseController
{
    /**
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        $this->view = "src/Views/contactsView.php";
        parent::__construct($dataProvider);
    }

    public function render(array $param)
    {
        if(!empty($this->request->getPost()))  {
            $this->sendMail($this->request->getPost());
        }
        require_once $this->view;
    }

    public function sendMail(array $request)
    {
        $name = ValidateInputs::getNormalData($request['name']);

        $email = ValidateInputs::getNormalData($request['email']);

        $number = ValidateInputs::getNormalData($request['number']);

        $message = ValidateInputs::getNormalData($request['message']);

        $mail = new PHPMailer(true);

        try {

            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.yandex.ru';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'felppt@yandex.ru';
            $mail->Password   = 'secret';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('felppt@yandex.ru', 'Посетитель');
            $mail->addAddress('felppt@yandex.ru');


            $mail->isHTML(true);
            $mail->Subject = 'Обращение';
            $mail->Body    = "Номер: $number почта: $email имя: $name \<br\> $message";

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }
}
