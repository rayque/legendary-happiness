<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipiesController extends Controller
{
    public function gerRecipies(Request $request)
    {
        return response()->json($request->all(), 200);
    }
}
