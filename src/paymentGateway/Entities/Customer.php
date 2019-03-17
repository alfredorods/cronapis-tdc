<?php

/**
 * Customer short summary.
 * Customer model
 *
 * Customer description.
 * Customer model definition
 *
 * @version 1.0
 * @author Raza
 */
 namespace Cronapis\paymentGateway\Entities;
 use Cronapis\paymentGateway\Entities\CustomerResponse;
 use Cronapis\paymentGateway\Entities\CustomerOptions;
class Customer
{
    public $CustomerId = "";
    public $FriendlyName= "";
    public $Status= "";
    public $UniqueIdentifier = "";
    public $Email = "";
    public $Fax = "";
    public $FirstName = "";
    public $LastName = "";
    public $Phone = "";
    public $Website = "";
    public $Company = "";
    public $Created = "";
    public $Updated = "";
    public $ResponseDetails =null;
    public $Options =null;
    public $BillingAddress =null;
    public $ShippingAddress =null;
    public $CreditCards =null;
    public $CustomFields =null;
    public $Username =null;
    public $ACHs =null;
    public $CustomerEntities =null;
    public $Wallet =null;
    public $PaymentInstructions =null;
    
    function __construct() {
        $this->ResponseDetails = new CustomerResponse();
        $this->Options = new CustomerOptions();
        $this->BillingAddress = array();
        $this->ShippingAddress = array();
        $this->CreditCards = array();
    		$this->CustomerEntities = array();
    		$this->PaymentInstructions = array();
    }
    function __destruct() {
        unset($this->ResponseDetails);   
        unset($this->Options);
    }
}
