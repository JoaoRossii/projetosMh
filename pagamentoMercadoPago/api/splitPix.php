<?php
        $valor                 = 100;
        $porcentagem_comissao  = 10;
        $descricao             = "Pagamento pix";
        $email_cliente         = "clientemail@gmail.com";
        $referencia_externa    = "123";
        $url_notificacao       = "https://lorde.dev";
        $comissao_vendedor     = $valor * ($porcentagem_comissao / 100);
        $valor_loja            = floatval(number_format($valor - $comissao_vendedor, 2, '.', ''));
        $access_token_loja     = "ACESS_TOKEN_LOJA";
        $access_token_vendedor = "ACESS_TOKEN_VENDEDOR";
        $sponsor_id_loja       = "ID_LOJA_MP";

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.mercadopago.com/v1/payments',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "transaction_amount": '.$valor.',
            "description": "'.$descricao.'",
            "payment_method_id": "pix",
            "payer": {
                "email": "'.$email_cliente.'"
            },
            "binary_mode": true,
            "application_fee": '.$valor_loja.',
            "external_reference": "'.$referencia_externa.'",
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
            'Authorization: Bearer '.$access_token_vendedor,
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        // echo '<pre>';
        // print_r(json_decode($response));

        $dados_payment = json_decode($response);
        $qrcodepix     = "data:image/jpeg;base64,{$dados_payment->point_of_interaction->transaction_data->qr_code_base64}";
        echo "<img width='200' src='{$qrcodepix}' />";