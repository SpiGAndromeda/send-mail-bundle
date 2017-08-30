<?php
/**
 * Created by PhpStorm.
 * User: marti
 * Date: 30.08.2017
 * Time: 14:15
 */

namespace SpiGAndromeda\SendMailBundle\Services;


use PhpImap\Mailbox;

class SendMailService
{
    protected $cofig = array();

    /**
     * @var \Swift_Mailer $mailer
     */
    protected $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
    }

    public function sendMail(\Swift_Message $message)
    {
        $this->mailer->send($message);

        $mailbox = new Mailbox(
            $config['imapPath'],
            $config['imapLogin'],
            $config['imapPassword']);

        $imapStream = $mailbox->getImapStream();
        imap_append($imapStream,$mailbox->getImapPath(),$message->toString() . "\r\n","\\Seen");
        $mailbox->disconnect();
    }
}