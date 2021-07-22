<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;


class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {
        $request->reference = Paystack::genTranxRef();
        
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
        
        
            $stats = $paymentDetails['data']['status'];
        $type_db = $paymentDetails['data']['metadata']['account'];
            
                if($stats === 'success') {

            if ($type_db == '0') {

                    
                    $lister = Listing::find($paymentDetails['data']['metadata']['items_id']);
                    $lister->which = '0';
                    $lister->save();
                    return redirect('/hm-cafetariaOrders')->with('success', 'Order made. You will get your order soon.');
                    
            } elseif ($type_db == '1') {
                $specially = OrderedSpecially::find($paymentDetails['data']['metadata']['items_id']);
                $specially->which = '0';
                $specially->save();
            }
                    
                } else {
                    return redirect('/hm-cafetariaOrders')->with('error', 'Payment incomplete.');
                }
        
        
        
        
    }
    
    public function isTransactionVerificationValid()
    {
        $this->verifyTransactionAtGateway();
        $result = $this->getResponse()['message'];
        switch ($result) {
            case self::VS:
                $validate = true;
                break;
            case self::ITF:
                $validate = false;
                break;
            default:
                $validate = false;
                break;
        }
        return $validate;
    }
    
    
    
    
}