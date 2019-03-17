<?php

/**
 * CustomerResponse short summary.
 * Customer Response model
 *
 * CustomerResponse description.
 * Customer Response model definition
 *
 * @version 1.0
 * @author Raza
 */
namespace Cronapis\paymentGateway\Entities;
use Cronapis\paymentGateway\Entities\ValidationError; 
class CustomerResponse
{
    public $ValidationErrors = null;
    public $IsSuccess = false;
    public $ResponseSummary = "";
    public $ResponseCode = "";
    public $CustomerId = "";
    public $CustomerToken = "";
    public $UniqueIdentification = "";
    function __construct() {
        $this->ValidationErrors  = new ValidationError();
    }
    function __destruct() {
        unset($this->ValidationErrors);           
    }
}
