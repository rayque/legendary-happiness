<?php


namespace App\Http\Api;

use Illuminate\Support\Facades\Http;

class Api
{
    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    protected function get($params)
    {
        return Http::get($this->url, $params);
    }
}
