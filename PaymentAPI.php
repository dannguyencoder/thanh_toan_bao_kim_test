<?php

namespace thanh_toan_bao_kim_test;

use GuzzleHttp;

class PaymentAPI {

    public static function createPaymentLink() {
        //pre-requisites: install Guzzle package https://github.com/guzzle/guzzle
        $client = new GuzzleHttp\Client(['timeout' => 20.0]);
        $options['query']['jwt'] = BaoKimAPI::getToken();

        $payload['mrc_order_id'] = "eDwosV1D1bPmI7OI";
        $payload['total_amount'] = "11";
        $payload['description'] = "sVUThdCXFZ2tl7UI";
        $payload['url_success'] = "xsRBQyq5ezeH0DLY";
        $payload['url_detail'] = "kF4SxifkVC0VYZ1J";
        $payload['lang'] = "6VraD4RdYyCXG8Xd";
        $payload['bpm_id'] = "10";
        $payload['accept_bank'] = "au5vGZa8zOqDVjzg";
        $payload['accept_cc'] = "BEQWbaATOMBESsuX";
        $payload['accept_qrpay'] = "ICcGUwRh0RhIHfZu";
        $payload['webhooks'] = "QOhjhMA67Wo5YoGE";
        $payload['customer_email'] = "dIicAc544KyWgh7W";
        $payload['customer_phone'] = "QscFgfIO5N9DVIVz";
        $payload['customer_name'] = "ZwPgJT0ZlXjHZR52";
        $payload['customer_address'] = "TrIbInRg9Y8DTo40";
        $options['form_params'] = $payload;

        $response = $client->request("POST", "https://api.baokim.vn/payment/api/v4/order/send", $options);
        echo "Response status code: " . $response->getStatusCode();
        echo "Response data: ". $response->getBody()->getContent();
    }
}

?>