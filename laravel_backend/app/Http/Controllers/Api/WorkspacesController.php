<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkspacesModel;
use Illuminate\Support\Facades\Validator;

class WorkspacesController extends Controller
{
    // Retrieve all workspaces
    public function index()
    {
        return response()->json(WorkspacesModel::all());
    }

    // Store a new workspace
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|exists:clients,id',
            'user_id' => 'nullable|exists:users,id',
            'title' => 'nullable|string|max:255',
            'short_name' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|string|max:200',
            'visibility' => 'nullable|string|max:255',
            'membership_rule' => 'nullable|string|max:255',
            'board_creation_rule' => 'nullable|string|max:100',
            'board_deletion_rule' => 'nullable|string|max:100',
            'board_sharing_rule' => 'nullable|string|max:100',
            'member_ids' => 'nullable|string|max:255',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $workspace = WorkspacesModel::create($request->all());

        return response()->json($workspace, 201);
    }

    // Retrieve a specific workspace by ID
    public function show($id)
    {
        $workspace = WorkspacesModel::find($id);

        if (!$workspace) {
            return response()->json(['message' => 'Workspace not found'], 404);
        }

        return response()->json($workspace);
    }

    // Update a specific workspace by ID
    public function update(Request $request, $id)
    {
        $workspace = WorkspacesModel::find($id);

        if (!$workspace) {
            return response()->json(['message' => 'Workspace not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|exists:clients,id',
            'user_id' => 'nullable|exists:users,id',
            'title' => 'nullable|string|max:255',
            'short_name' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|string|max:200',
            'visibility' => 'nullable|string|max:255',
            'membership_rule' => 'nullable|string|max:255',
            'board_creation_rule' => 'nullable|string|max:100',
            'board_deletion_rule' => 'nullable|string|max:100',
            'board_sharing_rule' => 'nullable|string|max:100',
            'member_ids' => 'nullable|string|max:255',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $workspace->update($request->all());

        return response()->json($workspace);
    }

    // Delete a specific workspace by ID
    public function destroy($id)
    {
        $workspace = WorkspacesModel::find($id);

        if (!$workspace) {
            return response()->json(['message' => 'Workspace not found'], 404);
        }

        $workspace->delete();

        return response()->json(['message' => 'Workspace deleted successfully']);
    }
}
