<?php

namespace Kuusamo\Plugin\Mailgun\Test;

use Kuusamo\Plugin\Mailgun\MailgunConfig;
use Kuusamo\Plugin\Mailgun\Exception\ConfigException;
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

        $this->assertInstanceOf(MailgunConfig::class, $config);
    }

    public function testInvalidOption()
    {
        $this->expectException(ConfigException::class);

        $config = new MailgunConfig([
            'senderAddress' => 'test@example.com',
            'senderName' => 'Kuusamo',
            'apiKey' => 'abc123',
            'domain' => 'kuusamo.org',
            'invalid_config_option' => 'kuusamo.org'
        ]);
    }

    public function testMissingOption()
    {
        $this->expectException(ConfigException::class);

        $config = new MailgunConfig([
            'senderEmail' => 'test@example.com',
            'senderName' => 'Kuusamo',
            'apiKey' => 'abc123'
        ]);
    }
}
