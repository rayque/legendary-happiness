<?php


namespace App\Http\Services;


class RecipiesService
{
    public function gerRecipies($params)
    {
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

        $data = [
            'keywords' => $ingredients,
        ];

        return ok($data);
    }
}
