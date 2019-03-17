<?php

/**
 * CreditCardResponse short summary.
 * Credit Card Response model
 *
 * CreditCardResponse description.
 * Credit Card Response model definition
 *
 * @version 1.0
 * @author Raza
 */
 namespace Cronapis\paymentGateway\Entities;
 use Cronapis\paymentGateway\Entities\ValidationError;

  class CreditCardResponse
  {
      public $ValidationErrors =null;
      public $IsSuccess = false;
      public $ResponseSummary = "";
      public $ResponseCode = "";
      public $Id = "";
      public $InstrumentToken = "";
      public $CardToken = "";
      function __construct() {
          $this->ValidationErrors = new ValidationError();
      }
      function __destruct() {
          unset($this->ValidationErrors);  
      }
  }
