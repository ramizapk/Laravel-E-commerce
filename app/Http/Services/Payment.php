<?php
namespace App\Http\Services;

//  
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;

class Payment{

    private $base_url;
    private $headers;
    private $request_client;
    
    /**
     * paymentservice constructor
     * @param Client $request_client
    */

     public function __construct(Client $request_client)
     {
         $this->request_client= $request_client;
         $this->base_url = env('fatoora_base_url');
         $this->headers=[
             'Content-Type' =>'application/json',
             'authorization' =>'Bearer ' .env('fatoora_token')
 


         ];
         
     }

     /**
      * @param $uri 
      * @param $method
      * @param array $body
      * @return false|mixed
      * @throws \GuzzleHttp\Exception\GuzzleException
     */
      private function buildRequest($uri, $method ,$body=[]){
          $request=new Request($method ,  $this->base_url . $uri , $this->headers);
        
          if(!$body){
          return false;
          }

          $response=$this->request_client->send($request,[
              'json' =>$body
          ]);

          if($response->getStatusCode() != 200){
          
            return false;
          }

          $response=json_decode($response->getBody(),true);
          return $response;
      }



      /**
       * @param $patient_id
       * @param $value
       * @return array|false
       */

   private function parsePaymentData($invoiceItems,$name,$email,$mobile,$totalPrice){
        
//  $invoiceItems =array();
//    $invoiceItems[0] = [
//   'ItemName'  => 'Item one', //ISBAN, or SKU
//   'Quantity'  => '2', //Item's quantity
//   'UnitPrice' => '25', //Price per item
//   ]; 
//   $invoiceItems[1] = [
//     'ItemName'  => 'Item two', //ISBAN, or SKU
//     'Quantity'  => '1', //Item's quantity
//     'UnitPrice' => '10', //Price per item
//     ]; 
//     $invoiceItems[2] = [
//         'ItemName'  => 'Item three', //ISBAN, or SKU
//         'Quantity'  => '5', //Item's quantity
//         'UnitPrice' => '8', //Price per item
//         ]; 
//         $invoiceItems[3] = [
//             'ItemName'  => 'Item foure', //ISBAN, or SKU
//             'Quantity'  => '4', //Item's quantity
//             'UnitPrice' => '50', //Price per item
//             ]; 

// //  $invoiceItems[] = [
// //   'ItemName'  => 'Item one', //ISBAN, or SKU
// //   'Quantity'  => '2', //Item's quantity
// //   'UnitPrice' => '25', //Price per item
// //   ]; 

     return[
        'CustomerName'       => $name,
        'NotificationOption' => 'LNK',
        'InvoiceValue'       => $totalPrice,
        'CustomerEmail'      => $email,
        'CustomerMobile'     => $mobile,
        'CallBackUrl'        => env('success_url'),
        'ErrorUrl'           => env('error_url') ,
        'Language'           => 'en', 
        'DisplayCurrencyIso' => 'USD',
        'InvoiceItems'       => $invoiceItems,
        
      ];
  }






      /**
       * @param $patient
       * @param $value
       * @return mixed
     */
//$patient_id,$fee,$plan_id,$subscriptionPlan
       public function sendPayment($invoiceItems,$name,$email,$mobile,$totalPrice){

        $requestData = $this->parsePaymentData($invoiceItems,$name,$email,$mobile,$totalPrice);
        
        $response = $this->buildRequest('v2/SendPayment', 'POST' , $requestData);
       
        if($response){
        // $this->saveTransactionPayment($patient_id, $response['Data']['InvoiceId']);
     
        }
       
        return $response;
       }





      /**
       * @param $patient_id
       * @param $invoice_id
       * @param $plan_id
       * 
       * 
       */

       private function saveTransactionPayment($patient_id , $invoice_id){

       }



       public function getPaymentStatus($data){

      
         return  $response = $this->buildRequest('v2/getPaymentStatus', 'POST' , $data);
       }

}


?>