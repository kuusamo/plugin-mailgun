Mailgun plugin
==============

[![Latest Stable Version](https://poser.pugx.org/kuusamo/plugin-mailgun/v)](//packagist.org/packages/kuusamo/plugin-mailgun)
[![Total Downloads](https://poser.pugx.org/kuusamo/plugin-mailgun/downloads)](//packagist.org/packages/kuusamo/plugin-mailgun)
[![License](https://poser.pugx.org/kuusamo/plugin-mailgun/license)](//packagist.org/packages/kuusamo/plugin-mailgun)
[![Build Status](https://app.travis-ci.com/kuusamo/plugin-mailgun.svg?branch=master&status=errored)](https://app.travis-ci.com/github/kuusamo/plugin-mailgun)

This plugin adds Mailgun email integration to Kuusamo.


Installation
------------

Install into your project using Composer.

    composer require kuusamo/plugin-mailgun


Usage
-----

Install it in `index.php` of your project.

    $mailgunConfig = new Kuusamo\Plugin\Mailgun\MailgunConfig([
        'senderAddress' => 'test@example.com',
        'senderName' => 'Kuusamo',
        'senderReplyAddress' => 'reply@example.com', // optional
        'apiKey' => 'abc123',
        'domain' => 'kuusamo.org'
    ]);

    $provider = Kuusamo\Plugin\Mailgun\MailgunFactory::create($mailgunConfig);
    Kuusamo\Vle\Service\Email\EmailFactory::setProvider($provider);


Development
-----------

Run the tests

    ant
