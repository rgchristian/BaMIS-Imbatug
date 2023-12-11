<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;
use Twilio\Rest\Client;

class SMSController extends Controller
{
    // public function sendSMS(Request $request)
    // {
    //     $number = $request->input('number');
    //     $message = $request->input('message');
    //     $provider = $request->input('provider');

    //     if ($provider === 'infobip') {
    //         $base_url = "https://8grqn9.api.infobip.com.com";
    //         $api_key = "1c7f77ed910660d9ed44b6a1ffd4bc62-61dcd012-2dc2-4e40-bfbf-9f3d6a8f2859";

    //         $configuration = new Configuration(host: $base_url, apiKey: $api_key);
    //         $api = new SmsApi(config: $configuration);

    //         $destination = new SmsDestination(to: $number);

    //         $message = new SmsTextualMessage(
    //             destinations: [$destination],
    //             text: $message,
    //             from: "Barangay Imbatug"
    //         );

    //         $request = new SmsAdvancedTextualRequest(messages: [$message]);

    //         $response = $api->sendSmsMessage($request);

    //     } else {   // Twilio
            
    //         $account_id = "your account SID";
    //         $auth_token = "your auth token";

    //         $client = new Client($account_id, $auth_token);

    //         $twilio_number = "+ your outgoing Twilio phone number";

    //         $client->messages->create(
    //             $number,
    //             [
    //                 "from" => $twilio_number,
    //                 "body" => $message
    //             ]
    //         );
    //     }

    //     return "Message sent.";
    // }

//     public function sendSMS(Request $request)
// {
//     $announcementDetails = $request->input('announcement_details');
//     $smsProvider = $request->input('sms_provider');

//     if ($smsProvider === 'infobip') {
//         $base_url = "https://8grqn9.api.infobip.com.com";
//         $api_key = "1c7f77ed910660d9ed44b6a1ffd4bc62-61dcd012-2dc2-4e40-bfbf-9f3d6a8f2859";

//         $configuration = new Configuration(host: $base_url, apiKey: $api_key);
//         $api = new SmsApi(config: $configuration);

       
//         $phoneNumbers = BarangayResidents::pluck('phone')->toArray();

        
//         foreach ($phoneNumbers as $phoneNumber) {
//             $destination = new SmsDestination(to: $phoneNumber);

//             $message = new SmsTextualMessage(
//                 destinations: [$destination],
//                 text: $announcementDetails,
//                 from: "Barangay Imbatug"
//             );

//             $request = new SmsAdvancedTextualRequest(messages: [$message]);

//             $response = $api->sendSmsMessage($request);

            
//             if ($response->getMessages()[0]->getStatus()->getGroupName() === 'PENDING') {
//                 // SMS sending failed
//                 return redirect()->back()->with('error', 'Infobip SMS sending failed.');
//             }
//         }

        
//         return redirect()->back()->with('success', 'Barangay announcement sent successfully.');
//     } else {
//         $account_id = "your account SID";
//             $auth_token = "your auth token";

//             $client = new Client($account_id, $auth_token);

//             $twilio_number = "+ your outgoing Twilio phone number";

//             $client->messages->create(
//                 $number,
//                 [
//                     "from" => $twilio_number,
//                     "body" => $message
//                 ]
//             );
//     }
// }

// public function sendSMS(Request $request)
// {
//     $announcementDetails = $request->input('announcement_details');
//     $smsProvider = $request->input('sms_provider');

//     if ($smsProvider === 'infobip') {
//         $base_url = "https://8grqn9.api.infobip.com.com";
//         $api_key = "1c7f77ed910660d9ed44b6a1ffd4bc62-61dcd012-2dc2-4e40-bfbf-9f3d6a8f2859";

//         $configuration = new Configuration(host: $base_url, apiKey: $api_key);
//         $api = new SmsApi(config: $configuration);

        
//         $phoneNumbers = BarangayResidents::pluck('phone')->toArray();

        
//         foreach ($phoneNumbers as $phoneNumber) {
//             $destination = new SmsDestination(to: $phoneNumber);

//             $message = new SmsTextualMessage(
//                 destinations: [$destination],
//                 text: $announcementDetails,
//                 from: "Barangay Imbatug"
//             );

//             $request = new SmsAdvancedTextualRequest(messages: [$message]);

//             $response = $api->sendSmsMessage($request);

            
//             if ($response->getMessages()[0]->getStatus()->getGroupName() === 'PENDING') {
//                 // SMS sending failed
//                 return redirect()->back()->with('error', 'Infobip SMS sending failed.');
//             }
//         }

        
//         return redirect()->back()->with('success', 'Barangay announcement sent successfully.');
//     } else {
//         $account_id = "your account SID";
//             $auth_token = "your auth token";

//             $client = new Client($account_id, $auth_token);

//             $twilio_number = "+ your outgoing Twilio phone number";

//             $client->messages->create(
//                 $number,
//                 [
//                     "from" => $twilio_number,
//                     "body" => $message
//                 ]
//             );
//     }
// }
}
