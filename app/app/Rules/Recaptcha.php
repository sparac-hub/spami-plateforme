<?php

namespace App\Rules;

use GuzzleHttp\Client;

class ReCaptcha
{
    public function validate(
        $attribute,
        $value,
        $parameters,
        $validator
    )
    {

        $client = new Client();

        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            ['form_params' =>
                [
                    'secret' => config('cms.google.recaptcha.secret'),
                    'response' => $value,
                    'remoteip' => request()->ip(),
                ]
            ]
        );

        $body = json_decode((string)$response->getBody());

        return $body->success;
    }

}
