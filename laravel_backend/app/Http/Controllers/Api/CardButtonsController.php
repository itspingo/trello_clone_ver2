<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\card_buttons_model;
use Illuminate\Support\Facades\Validator;

class CardButtonsController extends Controller
{
    // Retrieve all card buttons
    public function index()
    {
        return response()->json(card_buttons_model::all());
    }

    // Store a new card button
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'button_icon' => 'nullable|string|max:100',
            'button_label' => 'nullable|string|max:255',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $cardButton = card_buttons_model::create($request->all());
        return response()->json($cardButton, 201);
    }

    // Retrieve a specific card button by ID
    public function show($id)
    {
        $cardButton = card_buttons_model::find($id);

        if (!$cardButton) {
            return response()->json(['message' => 'Card button not found'], 404);
        }

        return response()->json($cardButton);
    }

    // Update a specific card button by ID
    public function update(Request $request, $id)
    {
        $cardButton = card_buttons_model::find($id);

        if (!$cardButton) {
            return response()->json(['message' => 'Card button not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'button_icon' => 'nullable|string|max:100',
            'button_label' => 'nullable|string|max:255',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $cardButton->update($request->all());
        return response()->json($cardButton);
    }

    // Delete a specific card button by ID
    public function destroy($id)
    {
        $cardButton = card_buttons_model::find($id);

        if (!$cardButton) {
            return response()->json(['message' => 'Card button not found'], 404);
        }

        $cardButton->delete();
        return response()->json(['message' => 'Card button deleted successfully']);
    }
}
