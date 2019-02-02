
<?php

  function responseJson($status , $msg , $data = null){

    $response = [

    'status' => $status,
    'message' =>$msg,
    'data' => $data

    ];
    return response()->json($response);
 }

 //sms code
 
// New (N)
// Fork (F)
// Raw (R)
// Please note that all pasted data is publicly available.

// function smsMisr($to,$message)
//     {
//         $url = 'https://smsmisr.com/api/webapi/?';
//         $push_payload = array(
//             "username" => "*****",
//             "password" => "*****",
//             "language" => "2",
//             "sender" => "ipda3",
//             "mobile" => '2' . $to,
//             "message" => $message,
//         );
 
//         $rest = curl_init();
//         curl_setopt($rest, CURLOPT_URL, $url.http_build_query($push_payload));
//         curl_setopt($rest, CURLOPT_POST, 1);
//         curl_setopt($rest, CURLOPT_POSTFIELDS, $push_payload);
//         curl_setopt($rest, CURLOPT_SSL_VERIFYPEER, true);  //disable ssl .. never do it online
//         curl_setopt($rest, CURLOPT_HTTPHEADER,
//             array(
//                 "Content-Type" => "application/x-www-form-urlencoded"
//             ));
//         curl_setopt($rest, CURLOPT_RETURNTRANSFER, 1); //by ibnfarouk to stop outputting result.
//         $response = curl_exec($rest);
//         curl_close($rest);
//         return $response;
//     }
        