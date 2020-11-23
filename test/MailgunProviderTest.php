<?php

namespace Kuusamo\Plugin\Mailgun\Test;

use Kuusamo\Plugin\Mailgun\MailgunProvider;
use PHPUnit\Framework\TestCase;

class MailgunProviderTest extends TestCase
{
    public function testSendEmail()
    {
        $configMock = $this->createMock('Kuusamo\Plugin\Mailgun\MailgunConfig');
        $configMock->method('offsetGet')->willReturn('abc123');

        $messageMock = $this->createMock('Mailgun\Api\Message');
        $messageMock->expects($this->once())->method('send');

        $mailgunMock = $this->createMock('Mailgun\Mailgun');
        $mailgunMock->method('messages')->willReturn($messageMock);

        $provider = new MailgunProvider($configMock, $mailgunMock);
        $provider->sendEmail('recipient@example.com', 'Subject', 'Message');
    }
}
