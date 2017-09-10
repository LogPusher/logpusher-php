<?php

declare(strict_types=1);

namespace LogPusher\Config;

use LogPusher\Config\Exceptions\InvalidEmailException;

final class Email
{
    /**
     * @var string
     */
    private $email;

    /**
     * @param string $email
     */
    public function __construct(string $email)
    {
        $this->ensureIsValidEmail($email);

        $this->email = $email;
    }

    /**
     * @param string $email
     * @throws \InvalidArgumentException
     */
    private function ensureIsValidEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException(sprintf(
                '"%s" is not a valid email address',
                $email
            ));
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->email;
    }
}