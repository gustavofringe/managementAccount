<?php
namespace App;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use function str_replace;

class Email{

    /**
     * @param $html
     * @param array $content
     * @return bool
     */
    public function send($html, array $content){

        $email = new PHPMailer(true);
        try {
            $email->CharSet = 'utf-8';
            $message = file_get_contents(ROOT . DS .'views'.DS. 'emails' . DS . $html . '.html');
            foreach($content as $k=>$v){
                $message = str_replace('%'.$k.'%', $v,$message);
            }
            $email->SMTPSecure = 'tls';
            $email->Host = "127.0.0.1";
            $email->Port = 1025;
            $email->SMTPAuth = true;
            $email->Username = '';
            $email->Password = '';
            $email->SetFrom('dussartguillaume.dev@gmail.com', 'Web developer');
            $email->AddAddress('addaddress@gmail.com');
            $email->Subject = 'new message';
            $email->MsgHTML($message);
            $email->IsHTML(true);
            $email->Send();
            return $email;
        }catch(Exception $e){
            echo 'Message counld\'t not be send ';
            echo 'Mailer error: '.$email->ErrorInfo;
            die();
        }
    }
}
