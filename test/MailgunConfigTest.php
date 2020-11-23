<?php

namespace Kuusamo\Plugin\Mailgun\Test;

use Kuusamo\Plugin\Mailgun\MailgunConfig;
use PHPUnit\Framework\TestCase;

class MailgunConfigTest extends TestCase
{
    public function testValid()
    {
        $config = new MailgunConfig([
            'senderAddress' => 'test@example.com',
            'senderName' => 'Kuusamo',
            'apiKey' => 'abc123',
            'domain' => 'kuusamo.org'
        ]);

        $this->assertInstanceOf('Kuusamo\Plugin\Mailgun\MailgunConfig', $config);
    }

    /**
     * @expectedException Kuusamo\Plugin\Mailgun\Exception\ConfigException
     */
    public function testInvalidOption()
    {
        $config = new MailgunConfig([
            'senderAddress' => 'test@example.com',
            'senderName' => 'Kuusamo',
            'apiKey' => 'abc123',
            'domain' => 'kuusamo.org',
            'invalid_config_option' => 'kuusamo.org'
        ]);
    }

    /**
     * @expectedException Kuusamo\Plugin\Mailgun\Exception\ConfigException
     */
    public function testMissingOption()
    {
        $config = new MailgunConfig([
            'senderEmail' => 'test@example.com',
            'senderName' => 'Kuusamo',
            'apiKey' => 'abc123'
        ]);
    }
}
