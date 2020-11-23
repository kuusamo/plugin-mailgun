<?php

namespace Kuusamo\Plugin\Mailgun;

use Kuusamo\Vle\Service\Email\Provider\ProviderInterface;
use Mailgun\Mailgun;

class MailgunProvider implements ProviderInterface
{
    /**
     * Configuration.
     *
     * @var MailgunConfig
     */
    private $config;

    /**
     * This is a facade for the Mailgun class, which we will store below.
     * @var Mailgun
     */
    private $mailgun;

    /**
     * Create a Mailgun object.
     *
     * @param MailgunConfig $config Configuration object.
     */
    public function __construct(MailgunConfig $config, Mailgun $mailgun)
    {
        $this->config = $config;
        $this->mailgun = $mailgun;
    }

    /**
     * Send an email.
     *
     * @param string $recipient Recipent address.
     * @param string $subject   Subject.
     * @param string $message   Message body.
     * @return boolean
     */
    public function sendEmail(string $recipient, string $subject, string $message): bool
    {
        $sender = sprintf('%s <%s>', $this->config['senderName'], $this->config['senderddress']);

        $data = [
            'from'    => $sender,
            'to'      => $recipient,
            'subject' => $subject,
            'html'    => $message
        ];

        if (isset($this->config['senderReplyAddress'])) {
            $data['h:Reply-To'] = $this->config['senderReplyAddress'];
        }

        $this->mailgun->messages()->send($this->config['domain'], $data);
        return true;
    }
}
