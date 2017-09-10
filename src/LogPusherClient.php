<?php

declare(strict_types=1);

namespace LogPusher;

use GuzzleHttp\Client;
use LogPusher\Config\AuthKey;
use LogPusher\Config\Email;

class LogPusherClient
{
    CONST API_URL = 'https://api.logpusher.com/api/agent/savelog';

    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var AuthKey
     */
    private $authKey;

    /**
     * @param Client $client
     * @param string $email
     * @param string $password
     * @param string $apiKey
     */
    public function __construct(Client $client, string $email, string $password, string $apiKey)
    {
        $this->client = $client;

        $this->authKey = new AuthKey(
            new Email($email),
            $password
        );

        $this->apiKey = $apiKey;
    }

    /**
     * @param string $logMessage
     * @param string $source
     * @param string $category
     * @param string $logType
     * @param string $logTime
     * @param \DateTime $createdDate
     * @param string $eventId
     * @return string
     */
    public function push(
        string $logMessage = '',
        string $source = '',
        string $category = '',
        string $logType = '',
        string $logTime = '',
        \DateTime $createdDate,
        string $eventId
    )
    {
        $response = $this->client->post(self::API_URL, [
            'form_params' => [
                'AuthKey' => $this->authKey->getAuthKey(),
                'ApiKey' => $this->apiKey,
                'LogMessage' => $logMessage,
                'Source' => $source,
                'Category' => $category,
                'LogType' => $logType,
                'LogTime' => $logTime,
                'CreatedDate' => $createdDate->format('Y-m-d\TH:i:s.uP'),
                'EventId' => $eventId
            ]
        ]);

        return $response->getBody()->getContents();
    }
}