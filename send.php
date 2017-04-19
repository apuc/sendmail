<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 19.04.2017
 * Time: 13:43
 */
include_once __DIR__ . '/lib/Mailer.php';
include_once __DIR__ . '/lib/Parser.php';
$mail = new Mailer();

$mail->getMsg(isset($_POST['msg_tpl']) ? $_POST['msg_tpl'] : 'msg.html', $_POST);
$mail->to = $_POST['to'];
$mail->subject = $_POST['subject'];
$mail->setFrom($_POST['from'], $_POST['from_name']);
$res = $mail->send();

if($res){
    Parser::render('send-success.html');
}
else {
    Parser::render('send-error.html');
}


