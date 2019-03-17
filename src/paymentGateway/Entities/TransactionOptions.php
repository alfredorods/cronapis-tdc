<?php

/**
 * TransactionOptions short summary.
 * Transaction Options model
 *
 * TransactionOptions description.
 * Transaction Options model definition
 *
 * @version 1.0
 * @author Raza
 */
 namespace Cronapis\paymentGateway\Entities;
 class TransactionOptions
 {
    public $GenerateToken = false;
    public $GenerateTokenOnSuccess = false;
    public $AddShippingAddressForCustomer = false;
    public $UseDefaultCustomerPaymentMethod = false;
    public $Operation = "";
  }
