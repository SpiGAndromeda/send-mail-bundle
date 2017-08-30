<?php

namespace SpiGAndromeda\SendMailBundle\Services;

use PhpImap\Mailbox;

/**
 * Class SendMailService
 * @package SpiGAndromeda\SendMailBundle\Services
 */
class SendMailService
{
    protected $config = array();

    /**
     * @var \Swift_Mailer $mailer
     */
    protected $mailer;

    /**
     * SendMailService constructor.
     *
     * @param array $config
     * @param \Swift_Mailer $mailer
     */
    public function __construct(\Swift_Mailer $mailer,array $config)
    {
        $this->mailer = $mailer;

        $config['path'] = "{" . $config['host'] . ":" . $config['port'] . "/imap/" . $config["encryption"] . "}" . $config['sent_items_folder'];
        $this->config = $config;
    }

    /**
     * @param \Swift_Message $message
     */
    public function sendMail(\Swift_Message $message)
    {
        $this->mailer->send($message);

        $mailbox = new Mailbox(
            $this->config['path'],
            $this->config['login'],
            $this->config['password']);

        $imapStream = $mailbox->getImapStream();
        imap_append($imapStream,$mailbox->getImapPath(),$message->toString() . "\r\n","\\Seen");
        $mailbox->disconnect();
    }
}