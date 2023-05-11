<?php

namespace App\Traits;

trait Firebase
{
    public function sendFcmNotifications($firebaseToken, $data, $lang = 'ar')
    {
        $SERVER_API_KEY = 'AAAADV7Mi-k:APA91bGopf3WFXBMjDdLQh2F7SHFdRfBdp9-rH4w0SO9YWEaJ3aWSslo9ZDxwilHsmCodKjAuX8hKvoqD3hFkEJso4wFAChgZOvXK1eKl1IKbjD-v7WSFLZ2AyxAHAF_sAoI2uQQPVFr';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $data['title_' . $lang],
                "body" => $data['body_' . $lang],
                "content_available" => true,
                "priority" => "high",
            ],
            'data'  => $data
        ];

        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        // dd($response);
    }
}
