<?php

namespace Kuusamo\Plugin\Mailgun;

use Mailgun\Mailgun;

class MailgunFactory
{
    /**
     * Create an instance of the provider.
     *
     * @param MailgunConfig $config Config.
     * @return MailgunProvider
     */
    public static function create(MailgunConfig $config): MailgunProvider
    {
        $mailgun = Mailgun::create($config['apiKey'], 'https://api.eu.mailgun.net');
        return new MailgunProvider($config, $mailgun);
    }
}
