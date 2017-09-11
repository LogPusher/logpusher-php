<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers \LogPusher\Config\Email
 */
final class EmailTest extends TestCase
{
    /**
     * @test
     */
    public function canBeCreatedFromValidEmailAddress()
    {
        $this->assertInstanceOf(
            \LogPusher\Config\Email::class,
            new \LogPusher\Config\Email('hello@logpusher.com')
        );
    }

    /**
     * @test
     */
    public function cannotBeCreatedFromInvalidEmailAddress()
    {
        $this->expectException(\LogPusher\Config\Exceptions\InvalidEmailException::class);

        new \LogPusher\Config\Email('invalid');
    }

    /**
     * @test
     */
    public function canBeUsedAsString()
    {
        $this->assertEquals(
            'hello@logpusher.com',
            new \LogPusher\Config\Email('hello@logpusher.com')
        );
    }
}

