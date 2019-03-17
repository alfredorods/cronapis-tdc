<?php

/**
 * InstructionResponse short summary.
 * Instruction Response model
 *
 * InstructionResponse description.
 * Instruction Response model definition
 *
 * @version 1.0
 * @author Waqas
 */
 namespace Cronapis;
 use Cronapis\ValidationError;
class InstructionResponse
{
    public $ValidationErrors= null;
    public $IsSuccess= false;
    public $ResponseSummary= "";
    public $ResponseCode= "";
    public $Id= "";
    public $PaymentInstructionToken= "";

    function __construct() {
        $this->ValidationErrors  = new ValidationError();
    }
    function __destruct() {
        unset($this->ValidationErrors);
    }
}