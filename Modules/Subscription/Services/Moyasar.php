<?php

namespace Modules\Subscription\Services;

class Moyasar
{

    protected $payment_id;

    public function setPaymentID($payment_id) {
        $this->payment_id = $payment_id;
    }

    public function getPaymentInformation() {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.moyasar.com/v1/payments/". $this->payment_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_USERPWD => env('MOYASAR_SECRET_API_KEY') . ":",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }

}