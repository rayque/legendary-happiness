<?php

function ok($data)
{
    return [
        'data' => $data,
        'status' => 200
    ];
}

function badRequest($data)
{
    return [
        'data' => $data,
        'status' => 400
    ];
}

function serverError($message)
{
    return [
        'data' => [
            'message' => $message." Recomendamos que tente novamente ou entre em contato com o nosso suporte. xx xxxx-xxxx",
        ],
        'status' => 500
    ];
}
