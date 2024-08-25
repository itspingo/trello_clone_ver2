<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\card_button_actions_model;
use Illuminate\Support\Facades\Validator;

class CardButtonActionsController extends Controller
{
    // Retrieve all card button actions
    public function index()
    {
        return response()->json(card_button_actions_model::all());
    }

    // Store a new card button action
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'card_button_id' => 'nullable|integer',
            'base_rul' => 'nullable|string|max:255',
            'action' => 'nullable|string|max:255',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $cardButtonAction = card_button_actions_model::create($request->all());
        return response()->json($cardButtonAction, 201);
    }

    // Retrieve a specific card button action by ID
    public function show($id)
    {
        $cardButtonAction = card_button_actions_model::find($id);

        if (!$cardButtonAction) {
            return response()->json(['message' => 'Card button action not found'], 404);
        }

        return response()->json($cardButtonAction);
    }

    // Update a specific card button action by ID
    public function update(Request $request, $id)
    {
        $cardButtonAction = card_button_actions_model::find($id);

        if (!$cardButtonAction) {
            return response()->json(['message' => 'Card button action not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'card_button_id' => 'nullable|integer',
            'base_rul' => 'nullable|string|max:255',
            'action' => 'nullable|string|max:255',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $cardButtonAction->update($request->all());
        return response()->json($cardButtonAction);
    }

    // Delete a specific card button action by ID
    public function destroy($id)
    {
        $cardButtonAction = card_button_actions_model::find($id);

        if (!$cardButtonAction) {
            return response()->json(['message' => 'Card button action not found'], 404);
        }

        $cardButtonAction->delete();
        return response()->json(['message' => 'Card button action deleted successfully']);
    }
}
