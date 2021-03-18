<?php


namespace App\Http\Api;

use Illuminate\Support\Facades\Http;

class Api
{
    private $url;

    public function __construct($url)
      {
          $this->url = $url;
      }

    /**
     * @return mixed
     */
    protected function get($params)
    {
        return Http::get($this->url.$params);
    }
}
