<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers \LogPusher\Config\AuthKey
 */
final class AuthKeyTest extends TestCase
{
    /**
     * @test
     */
    public function can_create_a_valid_auth_key_string()
    {
        $email = new \LogPusher\Config\Email('hello@logpusher.com');

        $method = new ReflectionMethod(\LogPusher\Config\AuthKey::class, 'createAuthKeyString');
        $method->setAccessible(true);

        $authKey = new \LogPusher\Config\AuthKey($email, '123456');

        $this->assertEquals(
            $method->invoke($authKey),
            'hello@logpusher.com|' . md5('123456') . '|' . date('c')
        );

        $this->assertEquals(
            $authKey->getAuthKey(),
            base64_encode('hello@logpusher.com|' . md5('123456') . '|' . date('c'))
        );
    }
}