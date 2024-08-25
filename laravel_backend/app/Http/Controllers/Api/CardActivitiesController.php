<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\card_activities_model; 
use Illuminate\Support\Facades\Validator;

class CardActivitiesController extends Controller
{
    // Retrieve all card activities
    public function index()
    {
        return response()->json(card_activities_model::all());
    }

    // Store a new card activity
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'card_id' => 'nullable|integer',
            'comment' => 'nullable|string',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $cardActivity = card_activities_model::create($request->all());
        return response()->json($cardActivity, 201);
    }

    // Retrieve a specific card activity by ID
    public function show($id)
    {
        $cardActivity = card_activities_model::find($id);

        if (!$cardActivity) {
            return response()->json(['message' => 'Card activity not found'], 404);
        }

        return response()->json($cardActivity);
    }

    // Update a specific card activity by ID
    public function update(Request $request, $id)
    {
        $cardActivity = card_activities_model::find($id);

        if (!$cardActivity) {
            return response()->json(['message' => 'Card activity not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'card_id' => 'nullable|integer',
            'comment' => 'nullable|string',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $cardActivity->update($request->all());
        return response()->json($cardActivity);
    }

    // Delete a specific card activity by ID
    public function destroy($id)
    {
        $cardActivity = card_activities_model::find($id);

        if (!$cardActivity) {
            return response()->json(['message' => 'Card activity not found'], 404);
        }

        $cardActivity->delete();
        return response()->json(['message' => 'Card activity deleted successfully']);
    }
}
