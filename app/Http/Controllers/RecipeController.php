<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeStoreRequest;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        return RecipeResource::collection(Recipe::with('ingredients')->with('steps')->with('comments')->get());
    }

    public function store(RecipeStoreRequest $request)
    {
        $recipe = Recipe::create($request->all());
        if ($request->has('ingredients')) $recipe->ingredients()->createMany($request->ingredients);
        if ($request->has('steps')) $recipe->steps()->createMany($request->steps);

        return response(['message' => 'success']);
    }

    public function show(Recipe $recipe)
    {
        //
    }

    public function edit(Recipe $recipe)
    {
        //
    }

    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    public function destroy(Recipe $recipe)
    {
        //
    }
}