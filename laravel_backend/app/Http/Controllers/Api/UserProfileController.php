<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfileModel;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    // Retrieve all user profiles
    public function index()
    {
        return response()->json(UserProfileModel::all());
    }

    // Store a new user profile
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'client_id' => 'nullable|exists:clients,id',
            'user_type' => 'nullable|string|max:255',
            'contact_no' => 'nullable|string|max:255',
            'country_id' => 'nullable|exists:countries,id',
            'state_province' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'street_address' => 'nullable|string|max:255',
            'preffered_lang' => 'nullable|string|max:10',
            'preffered_currency' => 'nullable|string|max:10',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $profile = UserProfileModel::create($request->all());

        return response()->json($profile, 201);
    }

    // Retrieve a specific user profile by ID
    public function show($id)
    {
        $profile = UserProfileModel::find($id);

        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        return response()->json($profile);
    }

    // Update a specific user profile by ID
    public function update(Request $request, $id)
    {
        $profile = UserProfileModel::find($id);

        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'user_id' => 'nullable|exists:users,id',
            'client_id' => 'nullable|exists:clients,id',
            'user_type' => 'nullable|string|max:255',
            'contact_no' => 'nullable|string|max:255',
            'country_id' => 'nullable|exists:countries,id',
            'state_province' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'street_address' => 'nullable|string|max:255',
            'preffered_lang' => 'nullable|string|max:10',
            'preffered_currency' => 'nullable|string|max:10',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $profile->update($request->all());

        return response()->json($profile);
    }

    // Delete a specific user profile by ID
    public function destroy($id)
    {
        $profile = UserProfileModel::find($id);

        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        $profile->delete();

        return response()->json(['message' => 'Profile deleted successfully']);
    }
}
