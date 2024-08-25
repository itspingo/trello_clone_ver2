<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\active_status_model;
use Illuminate\Http\Request;
use App\Http\Resources\ActiveStatusResource;

class ActiveStatusController extends Controller
{
    public function index()
    {
        return ActiveStatusResource::collection(active_status_model::all());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            //'id' => 'required|integer',
            'is_active' => 'nullable|string|max:5',
            'active' => 'required|string|max:5',
            'recdate' => 'required|date',
        ]);

        $activeStatus = active_status_model::create($validatedData);

        return new ActiveStatusResource($activeStatus);
    }

    public function show($id)
    {
        $activeStatus = active_status_model::findOrFail($id);
        return new ActiveStatusResource($activeStatus);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'is_active' => 'nullable|string|max:5',
            'active' => 'required|string|max:5',
            'recdate' => 'required|date',
        ]);

        $activeStatus = active_status_model::findOrFail($id);
        $activeStatus->update($validatedData);

        return new ActiveStatusResource($activeStatus);
    }

    public function destroy($id)
    {
        $activeStatus = active_status_model::findOrFail($id);
        $activeStatus->delete();

        return response()->noContent();
    }
}
