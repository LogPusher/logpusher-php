<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers \LogPusher\LogPusherClient
 */
class LogPusherClientTest extends TestCase
{
    /**
     * @test
     */
    public function canBeCreatedFromValidEmailPasswordAndApiKey()
    {
        $logPusher = new \LogPusher\LogPusherClient(
            new \GuzzleHttp\Client(),
            'hello@logpusher.com',
            '123456',
            'MY_API_KEY'
        );

        $this->assertInstanceOf(
            \LogPusher\LogPusherClient::class,
            $logPusher
        );
    }
}