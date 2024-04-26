<?php

if (!isset($_GET['vl'])) {
    die('vl nao existe');
} else {
    if ($_GET['vl'] == "" || !is_numeric($_GET['vl'])) {
        die('vl não pode ser vazio, e tem que ser numerico');
    } else {
        if ($_GET['vl'] < 1 && $_GET['vl'] > 100) {
            die('valor deve ser entre 1 e 100');  /* Pagamento está limitado */
        }
    }
}

$amount = (float) trim($_GET['vl']);

    $porcentagem_comissao  = 10;
    $descricao             = "Pagamento pix";
    $email_cliente         = "clientemail@gmail.com"; // email de quem vai pagar capturado pela session
    $referencia_externa    = "123";
    $url_notificacao       = "https://lorde.dev"; // a definir
    $comissao_vendedor     = $amount * ($porcentagem_comissao / 100); // percentual de comissao
    $valor_loja            = floatval(number_format($amount - $comissao_vendedor, 2, '.', ''));
    $access_token_loja     = "APP_USR-4426961490887083-033018-cce67d842a33654cb9e5a982d6bd3c07-1032165530";  // accesstoken 
    $access_token_vendedor = "ACESS_TOKEN_VENDEDOR"; // accesstoken comissão
    $sponsor_id_loja       = "1032165530"; // sponsor token

$config = require_once '../config.php';
require_once '../class/Conn.class.php';
require_once '../class/Payment.class.php';

// captura  o valor


// instancia a classe pagamento
$payment = new Payment(1); //futuramente substituido pelo id da session

// criação do pagamento
$payCreate = $payment->addPayment($amount);

if ($payCreate) {

    // access token arquivo config.php
    $accesstoken = $config['accesstoken'];


    $curl = curl_init();

    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);


    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.mercadopago.com/v1/payments',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
            "transaction_amount": ' . $amount . ',
            "description": "'.$descricao.'",
            "payment_method_id": "pix",
            "payer": {
                "email": "'.$email_cliente.'"
            },
            "binary_mode": true,
            "application_fee": '.$valor_loja.',
            "external_reference": "'.$payCreate.'",
            "notification_url": "'.$url_notificacao.'",
            "additional_info": {
                "items": [
                    {
                        "id": "1",
                        "title": "'.$descricao.'",
                        "description": "'.$descricao.'",
                        "quantity": 1,
                        "unit_price": '.$valor.'
                    }
                ]
            },
            "sponsor_id": '.$sponsor_id_loja.'
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $access_token_vendedor
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $obj = json_decode($response);

    if (isset($obj->id)) {
        if ($obj->id != NULL) {

            $copia_cola = $obj->point_of_interaction->transaction_data->qr_code;
            $img_qrcode = $obj->point_of_interaction->transaction_data->qr_code_base64;
            $link_externo = $obj->point_of_interaction->transaction_data->ticket_url;
            $transaction_amount = $obj->transaction_amount;
            $external_reference = $obj->external_reference;

            echo "<h3>{$transaction_amount} #{$external_reference}</h3> <br />";
            echo "<img src='data:image/png;base64, {$img_qrcode}' width='200' /> <br />";
            echo "<textarea>{$copia_cola}</textarea> <br />";
            echo "<a href='{$link_externo}' target='_blank' >Link externo</a>";

        }
    }

}
