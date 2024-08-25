<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\card_labels_model;
use Illuminate\Support\Facades\Validator;

class CardLabelsController extends Controller
{
    // Retrieve all card labels
    public function index()
    {
        return response()->json(card_labels_model::all());
    }

    // Store a new card label
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'card_id' => 'nullable|integer',
            'label_color' => 'nullable|string|max:255',
            'label_text' => 'nullable|string|max:255',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $cardLabel = card_labels_model::create($request->all());
        return response()->json($cardLabel, 201);
    }

    // Retrieve a specific card label by ID
    public function show($id)
    {
        $cardLabel = card_labels_model::find($id);

        if (!$cardLabel) {
            return response()->json(['message' => 'Card label not found'], 404);
        }

        return response()->json($cardLabel);
    }

    // Update a specific card label by ID
    public function update(Request $request, $id)
    {
        $cardLabel = card_labels_model::find($id);

        if (!$cardLabel) {
            return response()->json(['message' => 'Card label not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'card_id' => 'nullable|integer',
            'label_color' => 'nullable|string|max:255',
            'label_text' => 'nullable|string|max:255',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $cardLabel->update($request->all());
        return response()->json($cardLabel);
    }

    // Delete a specific card label by ID
    public function destroy($id)
    {
        $cardLabel = card_labels_model::find($id);

        if (!$cardLabel) {
            return response()->json(['message' => 'Card label not found'], 404);
        }

        $cardLabel->delete();
        return response()->json(['message' => 'Card label deleted successfully']);
    }
}
