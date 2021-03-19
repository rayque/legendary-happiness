<?php


namespace App\Http\Services;


use App\Http\Api\GiphyApi;
use App\Http\Api\RecipePuppyApi;
use Exception;
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

    public function getRecipes($params): array
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

            $responseRecipies = $this->recipePuppyApi->getRecipes($ingredients);
            if ($responseRecipies->failed()) {
                return serverError();
            }
            $responseRecipies = collect($responseRecipies->collect()['results']);

            $recipies = $responseRecipies->map(function ($recipie) use($responseRecipies) {
                $responseGifs = $this->giphyApi->getGifs([
                    'q' => $recipie['title'],
                    'limit' => $responseRecipies->count(),
                    'rating' => 'g',
                ]);
                if ($responseGifs->failed()) {
                    return serverError();
                }
                $gifs = $responseGifs->collect()['data'] ?? [];
                $gif = $gifs['0']['images']['fixed_height_downsampled']['url'] ?? '';

                return [
                    'title' => $recipie['title'],
                    'ingredients' => explode(",", $recipie['ingredients']),
                    'link' => $recipie['href'],
                    'gif' => $gif,
                ];
            });

            $data = [
                'keywords' => $ingredients,
                'recipies' => $recipies,
            ];

            return ok($data);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            Log::error($exception->getTraceAsString());
            return serverError();
        }
    }
}
