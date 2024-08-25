<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\boards_model; // Assuming your model class is boards_model
use Illuminate\Support\Facades\Validator;

class BoardsController extends Controller
{
    // Retrieve all boards
    public function index()
    {
        return response()->json(boards_model::all());
    }

    // Store a new board
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'visibility' => 'required|string',
            'background_color' => 'nullable|string|max:20',
            'background_image' => 'nullable|string|max:255',
            'is_template' => 'nullable|string|max:5',
            'logo' => 'nullable|string|max:200',
            'member_ids' => 'nullable|string|max:255',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $board = boards_model::create($request->all());
        return response()->json($board, 201);
    }

    // Retrieve a specific board by ID
    public function show($id)
    {
        $board = boards_model::find($id);

        if (!$board) {
            return response()->json(['message' => 'Board not found'], 404);
        }

        return response()->json($board);
    }

    // Update a specific board by ID
    public function update(Request $request, $id)
    {
        $board = boards_model::find($id);

        if (!$board) {
            return response()->json(['message' => 'Board not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'visibility' => 'required|string',
            'background_color' => 'nullable|string|max:20',
            'background_image' => 'nullable|string|max:255',
            'is_template' => 'nullable|string|max:5',
            'logo' => 'nullable|string|max:200',
            'member_ids' => 'nullable|string|max:255',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $board->update($request->all());
        return response()->json($board);
    }

    // Delete a specific board by ID
    public function destroy($id)
    {
        $board = boards_model::find($id);

        if (!$board) {
            return response()->json(['message' => 'Board not found'], 404);
        }

        $board->delete();
        return response()->json(['message' => 'Board deleted successfully']);
    }
}
