<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StarredObjectsModel;
use Illuminate\Support\Facades\Validator;

class StarredObjectsController extends Controller
{
    // Retrieve all starred objects
    public function index()
    {
        return response()->json(StarredObjectsModel::all());
    }

    // Store a new starred object
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'object_type' => 'nullable|string|max:255',
            'object_id' => 'nullable|integer',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $starredObject = StarredObjectsModel::create($request->all());
        return response()->json($starredObject, 201);
    }

    // Retrieve a specific starred object by ID
    public function show($id)
    {
        $starredObject = StarredObjectsModel::find($id);

        if (!$starredObject) {
            return response()->json(['message' => 'Starred object not found'], 404);
        }

        return response()->json($starredObject);
    }

    // Update a specific starred object by ID
    public function update(Request $request, $id)
    {
        $starredObject = StarredObjectsModel::find($id);

        if (!$starredObject) {
            return response()->json(['message' => 'Starred object not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'object_type' => 'nullable|string|max:255',
            'object_id' => 'nullable|integer',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $starredObject->update($request->all());
        return response()->json($starredObject);
    }

    // Delete a specific starred object by ID
    public function destroy($id)
    {
        $starredObject = StarredObjectsModel::find($id);

        if (!$starredObject) {
            return response()->json(['message' => 'Starred object not found'], 404);
        }

        $starredObject->delete();
        return response()->json(['message' => 'Starred object deleted successfully']);
    }
}
