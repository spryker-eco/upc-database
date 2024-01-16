<?php

namespace SprykerEco\Client\UpcDatabase\Exception;

use Exception;
use SprykerEco\Client\UpcDatabase\Dependency\External\UpcDatabaseToHttpResponseInterface;

class UpcDatabaseToHttpClientException extends Exception
{
    /**
     * @var \SprykerEco\Client\UpcDatabase\Dependency\External\UpcDatabaseToHttpResponseInterface
     */
    protected UpcDatabaseToHttpResponseInterface $response;

    /**
     * @param \SprykerEco\Client\UpcDatabase\Dependency\External\UpcDatabaseToHttpResponseInterface $response
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(
        UpcDatabaseToHttpResponseInterface $response,
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);

        $this->response = $response;
    }

    /**
     * @return \SprykerEco\Client\UpcDatabase\Dependency\External\UpcDatabaseToHttpResponseInterface
     */
    public function getResponse(): UpcDatabaseToHttpResponseInterface
    {
        return $this->response;
    }
}
