<?php


namespace App\Http\Services;


use App\Http\Api\GiphyApi;
use App\Http\Api\RecipePuppyApi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class RecipiesService
{
    /**
     * @var RecipePuppyApi
     */
    private $recipePuppyApi;
    /**
     * @var GiphyApi
     */
    private $giphyApi;

    public function __construct(
        RecipePuppyApi $recipePuppyApi,
        GiphyApi $giphyApi
    ) {
        $this->recipePuppyApi = $recipePuppyApi;
        $this->giphyApi = $giphyApi;
    }

    public function getRecipies($params)
    {
        try {
            if (!$params) {
                return badRequest([
                    'message' => 'Insert at least one ingredient.'
                ]);
            }
            $ingredients = explode(",", $params);
            if (count($ingredients) > 3) {
                return badRequest([
                    'message' => 'Insert a maximum of 3 ingredients.'
                ]);
            }

            $responseRecipies = $this->recipePuppyApi->getRecipies($ingredients);
            if ($responseRecipies->failed()) {
                serverError("Falha ao buscar buscar receiras");
            }


            $recipies = array_map(function ($recipe) {

                $res = $this->giphyApi->getGifs([
                    'q'=> $recipe['title'],
                    'limit'=> 1,
                    'rating'=> 'g',
                ]);

                if ($res->failed()) {
                    serverError("Falha ao buscar buscar receiras");
                }

                return [
                    'title' => $recipe['title'],
                    'ingredients' =>  explode(",", $recipe['ingredients']) ,
                    'link' => $recipe['href'],
                    'gif' => $recipe['thumbnail'],
                ];
            }, $responseRecipies->collect()['results'] ?? []);


            $data = [
                'keywords' => $ingredients,
                'recipies' => $recipies,
            ];

            return ok($data);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Log::error($exception->getTraceAsString());
            return serverError("Falha ao buscar buscar receiras");
        }
    }
}
