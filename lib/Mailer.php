<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 19.04.2017
 * Time: 13:44
 */
class Mailer
{

    public $to;
    public $from;
    public $subject;
    public $msg;
    public $headers;
    private $parser;

    public function __construct()
    {
        include_once __DIR__ . "/Parser.php";
        $this->parser = new Parser();
        $this->headers = "MIME-Version: 1.0\r\n";
        $this->headers .= "Content-type: text/html; utf-8\r\n";
    }

    public function setFrom($fromEmail, $fromName = '')
    {
        $this->headers .= "From: $fromName <$fromEmail>\r\n";
    }

    public function getMsg($tpl, array $data = array())
    {
        $this->msg = $this->parser->parse($tpl, $data);
    }

    public function send()
    {
        return mail($this->to, $this->subject, $this->msg, $this->headers);
    }

}