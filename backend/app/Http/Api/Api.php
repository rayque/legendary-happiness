<?php


namespace App\Http\Api;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Api
{
    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    protected function get($params): Response
    {
        return Http::get($this->url, $params);
    }
}
