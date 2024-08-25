<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\card_check_lists_model;
use Illuminate\Support\Facades\Validator;

class CardCheckListsController extends Controller
{
    // Retrieve all card checklists
    public function index()
    {
        return response()->json(card_check_lists_model::all());
    }

    // Store a new card checklist
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'card_id' => 'nullable|integer',
            'check_list_title' => 'nullable|string|max:255',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $cardCheckList = card_check_lists_model::create($request->all());
        return response()->json($cardCheckList, 201);
    }

    // Retrieve a specific card checklist by ID
    public function show($id)
    {
        $cardCheckList = card_check_lists_model::find($id);

        if (!$cardCheckList) {
            return response()->json(['message' => 'Card checklist not found'], 404);
        }

        return response()->json($cardCheckList);
    }

    // Update a specific card checklist by ID
    public function update(Request $request, $id)
    {
        $cardCheckList = card_check_lists_model::find($id);

        if (!$cardCheckList) {
            return response()->json(['message' => 'Card checklist not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'card_id' => 'nullable|integer',
            'check_list_title' => 'nullable|string|max:255',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $cardCheckList->update($request->all());
        return response()->json($cardCheckList);
    }

    // Delete a specific card checklist by ID
    public function destroy($id)
    {
        $cardCheckList = card_check_lists_model::find($id);

        if (!$cardCheckList) {
            return response()->json(['message' => 'Card checklist not found'], 404);
        }

        $cardCheckList->delete();
        return response()->json(['message' => 'Card checklist deleted successfully']);
    }
}
