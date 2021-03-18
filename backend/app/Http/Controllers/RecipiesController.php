<?php

namespace App\Http\Controllers;

use App\Http\Services\RecipiesService;
use Illuminate\Http\Request;

class RecipiesController extends Controller
{
    /**
     * @var RecipiesService
     */
    private $recipiesService;

    public function __construct(RecipiesService $recipiesService)
    {
        $this->recipiesService = $recipiesService;
    }

    public function getRecipies(Request $request)
    {
        $response = $this->recipiesService->getRecipies($request->i);
        return response()->json($response['data'], $response['status']);
    }
}
