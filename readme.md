Mailgun plugin
==============

This plugin adds Mailgun email integration to Kuusamo.

Installation
------------

Install into your project using Composer.

    composer require kuusamo/plugin-mailgun

Usage
-----

Install it in `index.php` of your project.

    $mailgunConfig = new MailgunConfig([
        'senderAddress' => 'test@example.com',
        'senderName' => 'Kuusamo',
        'senderReplyAddress' => 'reply@example.com', // optional
        'apiKey' => 'abc123',
        'domain' => 'kuusamo.org'
    ]);

    Kuusamo\Plugin\Mailgun\MailgunFactory::create($mailgunConfig);
