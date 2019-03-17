<?php

/**
 * CustomerOptions short summary.
 * Customer Options model
 *
 * CustomerOptions description.
 * Customer Options model definition
 * 
 *
 * @version 1.0
 * @author Raza
 */
namespace Cronapis\paymentGateway\Entities;
class CustomerOptions
{
    public $IncludeBillingAddress = false;
    public $IncludeShippingAddress = false;
    public $IncludeCreditCards = false;
    public $IncludeCustomFields = false;
}
