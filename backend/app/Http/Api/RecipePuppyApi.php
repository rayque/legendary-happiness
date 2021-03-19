<?php


namespace App\Http\Api;

use Illuminate\Http\Client\Response;

class RecipePuppyApi extends Api
{
    public function __construct()
    {
        parent::__construct(env('RECIPEPUPPY_URL', ''));
    }

    public function getRecipes($params = ''): Response
    {
        $params['i'] = $params[0];
        return $this->get($params);
    }
}
