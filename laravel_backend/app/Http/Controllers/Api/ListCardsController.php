<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ListCardsModel;
use Illuminate\Support\Facades\Validator;

class ListCardsController extends Controller
{
    // Retrieve all list cards
    public function index()
    {
        return response()->json(ListCardsModel::all());
    }

    // Store a new list card
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'list_id' => 'nullable|integer',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'head_color' => 'nullable|string|max:20',
            'head_image' => 'nullable|string|max:255',
            'background_color' => 'nullable|string|max:20',
            'background_image' => 'nullable|string|max:255',
            'is_template' => 'nullable|string|max:255',
            'visibility' => 'nullable|string|max:255',
            'member_ids' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'start_time' => 'nullable|string|max:20',
            'end_date' => 'nullable|date',
            'end_time' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'share_url' => 'nullable|string|max:255',
            'share_embed_code' => 'nullable|string|max:255',
            'share_qr_code' => 'nullable|string|max:255',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $listCard = ListCardsModel::create($request->all());
        return response()->json($listCard, 201);
    }

    // Retrieve a specific list card by ID
    public function show($id)
    {
        $listCard = ListCardsModel::find($id);

        if (!$listCard) {
            return response()->json(['message' => 'List card not found'], 404);
        }

        return response()->json($listCard);
    }

    // Update a specific list card by ID
    public function update(Request $request, $id)
    {
        $listCard = ListCardsModel::find($id);

        if (!$listCard) {
            return response()->json(['message' => 'List card not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'list_id' => 'nullable|integer',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'head_color' => 'nullable|string|max:20',
            'head_image' => 'nullable|string|max:255',
            'background_color' => 'nullable|string|max:20',
            'background_image' => 'nullable|string|max:255',
            'is_template' => 'nullable|string|max:255',
            'visibility' => 'nullable|string|max:255',
            'member_ids' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'start_time' => 'nullable|string|max:20',
            'end_date' => 'nullable|date',
            'end_time' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'share_url' => 'nullable|string|max:255',
            'share_embed_code' => 'nullable|string|max:255',
            'share_qr_code' => 'nullable|string|max:255',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $listCard->update($request->all());
        return response()->json($listCard);
    }

    // Delete a specific list card by ID
    public function destroy($id)
    {
        $listCard = ListCardsModel::find($id);

        if (!$listCard) {
            return response()->json(['message' => 'List card not found'], 404);
        }

        $listCard->delete();
        return response()->json(['message' => 'List card deleted successfully']);
    }
}
