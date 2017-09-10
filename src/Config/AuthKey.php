<?php

declare(strict_types=1);

namespace LogPusher\Config;

final class AuthKey
{
    const SEPERATOR = '|';

    const DATE_FORMAT = 'c';

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $hashedPassword;

    /**
     * @param Email $email
     * @param string $password
     */
    public function __construct(Email $email, $password)
    {
        $this->email = (string) $email;
        $this->hashedPassword = md5($password);
    }

    /**
     * @return string
     */
    public function getAuthKey(): string
    {
        $authKey = $this->createAuthKeyString();

        return base64_encode($authKey);
    }

    /**
     * @return string
     */
    private function createAuthKeyString(): string
    {
        return $this->email . self::SEPERATOR .
            $this->hashedPassword . self::SEPERATOR .
            date(self::DATE_FORMAT);
    }
}