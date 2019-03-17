<?php 
  namespace Cronapis\paymentGateway;
  use Cronapis\MetropagoGateway;
  use Cronapis\CustomerManager;
  use Cronapis\TransactionManager;
  use Cronapis\paymentGateway\Entities\Customer;
  use Cronapis\paymentGateway\Entities\CustomerSearch;
  use Cronapis\paymentGateway\Entities\CustomerSearchOption;
  use Cronapis\paymentGateway\Entities\CreditCard;
  use Cronapis\paymentGateway\Entities\Transaction;
  use Cronapis\paymentGateway\Entities\TransactionResponse;
  use Cronapis\paymentGateway\Entities\CustomerEntity;

  class MetropagoGatewayCronapis{
      
      public $metropago;
      public $CustManager;
      public function __construct($environment){
        $this->metropago = new  MetropagoGateway($environment->environment,$environment->mid,$environment->tid,"","");
        $this->CustManager  = new CustomerManager($this->metropago);
      }
      public function registerUser($identifier, $name,$lastname){
        
        
        $customer = new Customer();
        $customer->UniqueIdentifier = $identifier;
        $customer->FirstName =$name;
        $customer->LastName = $lastname;
        $customerResult = $this->CustManager->AddCustomer($customer);
        return $customerResult; // shows if the operation was successfull
      }
      
      
      
      public function createCard($customer, $card_user,$evaluate=false){
        
          $savedCreditCards = $customer->CreditCards;
          $customer->CreditCards = array();
          $card = new CreditCard();
          $card->CardholderName=$card_user->name;
          $card->Status="ACTIVE";
          $card->ExpirationDate = $card_user->date_of_issue;
          $card->Number=$card_user->card_number;
          $card->CVV=$card_user->cvv;
          $customer->CreditCards[]=$card;
          
          $response = $this->CustManager->UpdateCustomer($customer);
          
          if(!$response->CreditCards[0]->ResponseDetails->IsSuccess){
            if($response->CreditCards[0]->ResponseDetails->ResponseCode==13)
              return ($evaluate ? 13 : $response->CreditCards[0]); 
             else
               return false;
          }
            
          $CreditCard=$response->CreditCards[0];
          return $CreditCard;
      }
      
      public function findCustomer($customer_id){
          
          $CustManager = new CustomerManager($this->metropago);
          $customerFilters =new CustomerSearch();    
          $customerFilters->UniqueIdentifier=$customer_id;
          $customerSearchOptions = new CustomerSearchOption();
          $customerSearchOptions->IncludeCardInstruments=true;
          $customerFilters->SearchOption=$customerSearchOptions;
          $response_customers = $this->CustManager->SearchCustomer($customerFilters);
         
          return ($response_customers ? (object) $response_customers[0] : false);
      }
      
      public function pay($customer, $token,$amount){
        $TrxManager = new TransactionManager($this->metropago);
        $transRequest = new Transaction();
        $transRequest->CustomerData = new Customer();
        $transRequest->CustomerData->CreditCards =array();
        $transRequest->CustomerData->CustomerEntities=array();
        $card = new CreditCard();
        $account = new CustomerEntity();
        $card->Token = $token;//Card Token
        $account->Id = "968544"; //Account Token
        $transRequest->CustomerData->CustomerId = $customer->CustomerId;//Customer Token
        $transRequest->CustomerData->CreditCards[] = $card;
        $transRequest->CustomerData->CustomerEntities[]=$account;
        $transRequest->Amount = $amount;
        $sale_response = $TrxManager->Sale($transRequest);
     
        return $sale_response->ResponseDetails->IsSuccess;
      }
  }
?>