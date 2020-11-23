<?php

namespace Kuusamo\Plugin\Mailgun\Test;

use Kuusamo\Plugin\Mailgun\MailgunFactory;
use PHPUnit\Framework\TestCase;

class MailgunFactoryTest extends TestCase
{
    public function testCreate()
    {
        $configMock = $this->createMock('Kuusamo\Plugin\Mailgun\MailgunConfig');
        $configMock->method('offsetGet')->willReturn('abc123');

        $provider = MailgunFactory::create($configMock);

        $this->assertInstanceOf('Kuusamo\Plugin\Mailgun\MailgunProvider', $provider);
    }
}
