<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\check_list_items_model;
use Illuminate\Support\Facades\Validator;

class CheckListItemsController extends Controller
{
    // Retrieve all check list items
    public function index()
    {
        return response()->json(check_list_items_model::all());
    }

    // Store a new check list item
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'check_list_id' => 'nullable|integer',
            'item_title' => 'nullable|string|max:255',
            'is_completed' => 'nullable|string|max:5',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $checkListItem = check_list_items_model::create($request->all());
        return response()->json($checkListItem, 201);
    }

    // Retrieve a specific check list item by ID
    public function show($id)
    {
        $checkListItem = check_list_items_model::find($id);

        if (!$checkListItem) {
            return response()->json(['message' => 'Check list item not found'], 404);
        }

        return response()->json($checkListItem);
    }

    // Update a specific check list item by ID
    public function update(Request $request, $id)
    {
        $checkListItem = check_list_items_model::find($id);

        if (!$checkListItem) {
            return response()->json(['message' => 'Check list item not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'check_list_id' => 'nullable|integer',
            'item_title' => 'nullable|string|max:255',
            'is_completed' => 'nullable|string|max:5',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $checkListItem->update($request->all());
        return response()->json($checkListItem);
    }

    // Delete a specific check list item by ID
    public function destroy($id)
    {
        $checkListItem = check_list_items_model::find($id);

        if (!$checkListItem) {
            return response()->json(['message' => 'Check list item not found'], 404);
        }

        $checkListItem->delete();
        return response()->json(['message' => 'Check list item deleted successfully']);
    }
}

