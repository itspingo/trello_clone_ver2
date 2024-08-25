<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\card_attachments_model;
use Illuminate\Support\Facades\Validator;

class CardAttachmentsController extends Controller
{
    // Retrieve all card attachments
    public function index()
    {
        return response()->json(card_attachments_model::all());
    }

    // Store a new card attachment
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'card_id' => 'nullable|integer',
            'file_name' => 'nullable|string|max:255',
            'file_attached' => 'nullable|string|max:255',
            'comment' => 'nullable|string',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $cardAttachment = card_attachments_model::create($request->all());
        return response()->json($cardAttachment, 201);
    }

    // Retrieve a specific card attachment by ID
    public function show($id)
    {
        $cardAttachment = card_attachments_model::find($id);

        if (!$cardAttachment) {
            return response()->json(['message' => 'Card attachment not found'], 404);
        }

        return response()->json($cardAttachment);
    }

    // Update a specific card attachment by ID
    public function update(Request $request, $id)
    {
        $cardAttachment = card_attachments_model::find($id);

        if (!$cardAttachment) {
            return response()->json(['message' => 'Card attachment not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'card_id' => 'nullable|integer',
            'file_name' => 'nullable|string|max:255',
            'file_attached' => 'nullable|string|max:255',
            'comment' => 'nullable|string',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $cardAttachment->update($request->all());
        return response()->json($cardAttachment);
    }

    // Delete a specific card attachment by ID
    public function destroy($id)
    {
        $cardAttachment = card_attachments_model::find($id);

        if (!$cardAttachment) {
            return response()->json(['message' => 'Card attachment not found'], 404);
        }

        $cardAttachment->delete();
        return response()->json(['message' => 'Card attachment deleted successfully']);
    }
}
