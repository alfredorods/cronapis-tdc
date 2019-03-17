<?php

/**
 * ValidationError short summary.
 * Validation Error model
 *
 * ValidationError description.
 * Validation Error model definition
 *
 * @version 1.0
 * @author Raza
 */
namespace Cronapis\paymentGateway\Entities;
class ValidationError
{
    public $Count = 0;
    public $ErrorSummary = "";
    public $ErrorDescription = "";
    public $ErrorDetails = null;
    
    function __construct() {
        $this->ErrorDetails = array();
    }
    
}
