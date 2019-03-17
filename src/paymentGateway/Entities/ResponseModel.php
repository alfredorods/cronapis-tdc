<?php

/**
 * ResponseModel short summary.
 * Response model
 *
 * ResponseModel description.
 * Response model definition
 *
 * @version 1.0
 * @author Waqas
 */
 namespace Cronapis;
 use Cronapis\ValidationError;
class ResponseModel
{
    public $APIVersion= "";
    public $ResponseMessage= "";
    public $Identification= "";
    public $Errors= null;

    function __construct() {
        $this->Errors  = new ValidationError();
    }
    function __destruct() {
        unset($this->Errors);
    }
}