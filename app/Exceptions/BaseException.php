<?php
namespace App\Exceptions;

use RuntimeException;

class BaseException extends RuntimeException
{

    private $error;

    /**
     * RoshniRidesException constructor
     * @param Error
     */
    public function __construct(Error $error)
    {
        $this->error = $error;
        parent::__construct($error->getMessage() . " - " . $error->getCode());
    }

    public function getError() : Error {
        return $this->error;
    }

}
