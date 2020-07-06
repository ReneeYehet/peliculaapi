<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Tracking extends CI_Controller {

    public function callAPI(){
        $url = 'https://api.dhl.com/dgff/transportation/shipment-tracking';
        $tracking_number = 'SCLA00055';

        $request_url = $url . '/' .$tracking_number;
                    
        /* Init cURL resource */
        $curl = curl_init($request_url);
            
        /* Array Parameter Data 
        $data = ['housebill: "'.$tracking_number.'"'];
        */

        /*curl_setopt($curl, CURLOPT_URL, 'https://api.dhl.com/dgff/transportation/shipment-tracking');*/
        /*curl_setopt($curl, CURLOPT_POST, true);*/
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt($curl, CURLOPT_CAINFO, "C:/xampp/php/extras/ssl/cacert.pem");
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'accept: application/json',
            'DHL-API-Key: oWzKTO2B7znEMmtaY9vr7t3pvv5E7SO9'
        ]);
            
        /* pass encoded JSON string to the POST fields 
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);*/
        
        /* set return type json 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);*/
            
        /* execute request */
        $result = curl_exec($curl);
        

        $err = curl_error($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($result, true);
            print_r($response);
            curl_close($curl);
        }
    }
}
    

