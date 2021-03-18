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

function serverError()
{
    return [
        'data' => [
            'message' => "Sorry, something goes wrong. We recommend trying again or contact us on xx xxxx-xxxx.",
        ],
        'status' => 500
    ];
}
