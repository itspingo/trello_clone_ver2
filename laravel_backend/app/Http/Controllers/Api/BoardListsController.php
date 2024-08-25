<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\board_lists_model; 
use Illuminate\Support\Facades\Validator;

class BoardListsController extends Controller
{
    // Retrieve all board lists
    public function index()
    {
        return response()->json(board_lists_model::all());
    }

    // Store a new board list
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'visibility' => 'required|string',
            'head_color' => 'nullable|string|max:20',
            'head_image' => 'nullable|string|max:255',
            'background_color' => 'nullable|string|max:20',
            'background_image' => 'nullable|string|max:200',
            'is_template' => 'nullable|string|max:5',
            'member_ids' => 'nullable|string|max:255',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $boardList = board_lists_model::create($request->all());
        return response()->json($boardList, 201);
    }

    // Retrieve a specific board list by ID
    public function show($id)
    {
        $boardList = board_lists_model::find($id);

        if (!$boardList) {
            return response()->json(['message' => 'Board list not found'], 404);
        }

        return response()->json($boardList);
    }

    // Update a specific board list by ID
    public function update(Request $request, $id)
    {
        $boardList = board_lists_model::find($id);

        if (!$boardList) {
            return response()->json(['message' => 'Board list not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'visibility' => 'required|string',
            'head_color' => 'nullable|string|max:20',
            'head_image' => 'nullable|string|max:255',
            'background_color' => 'nullable|string|max:20',
            'background_image' => 'nullable|string|max:200',
            'is_template' => 'nullable|string|max:5',
            'member_ids' => 'nullable|string|max:255',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $boardList->update($request->all());
        return response()->json($boardList);
    }

    // Delete a specific board list by ID
    public function destroy($id)
    {
        $boardList = board_lists_model::find($id);

        if (!$boardList) {
            return response()->json(['message' => 'Board list not found'], 404);
        }

        $boardList->delete();
        return response()->json(['message' => 'Board list deleted successfully']);
    }
}
