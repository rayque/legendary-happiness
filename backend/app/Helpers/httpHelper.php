<?php

function ok($data): object
{
    return (object) [
        'data' => $data,
        'status' => 200
    ];
}

function badRequest($data): object
{
    return (object) [
        'data' => $data,
        'status' => 400
    ];
}

function serverError($message): object
{
    return (object) [
        'data' => [
            'message' => $message." Recomendamos que tente novamente ou entre em contato com o nosso suporte. xx xxxx-xxxx",
        ],
        'status' => 500
    ];
}
