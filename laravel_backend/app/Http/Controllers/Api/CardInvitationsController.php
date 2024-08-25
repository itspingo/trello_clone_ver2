<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\card_invitations_model;
use Illuminate\Support\Facades\Validator;

class CardInvitationsController extends Controller
{
    // Retrieve all card invitations
    public function index()
    {
        return response()->json(card_invitations_model::all());
    }

    // Store a new card invitation
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'card_id' => 'nullable|integer',
            'full_name' => 'nullable|string|max:255',
            'email_address' => 'nullable|email|max:255',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $cardInvitation = card_invitations_model::create($request->all());
        return response()->json($cardInvitation, 201);
    }

    // Retrieve a specific card invitation by ID
    public function show($id)
    {
        $cardInvitation = card_invitations_model::find($id);

        if (!$cardInvitation) {
            return response()->json(['message' => 'Card invitation not found'], 404);
        }

        return response()->json($cardInvitation);
    }

    // Update a specific card invitation by ID
    public function update(Request $request, $id)
    {
        $cardInvitation = card_invitations_model::find($id);

        if (!$cardInvitation) {
            return response()->json(['message' => 'Card invitation not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'card_id' => 'nullable|integer',
            'full_name' => 'nullable|string|max:255',
            'email_address' => 'nullable|email|max:255',
            'active' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $cardInvitation->update($request->all());
        return response()->json($cardInvitation);
    }

    // Delete a specific card invitation by ID
    public function destroy($id)
    {
        $cardInvitation = card_invitations_model::find($id);

        if (!$cardInvitation) {
            return response()->json(['message' => 'Card invitation not found'], 404);
        }

        $cardInvitation->delete();
        return response()->json(['message' => 'Card invitation deleted successfully']);
    }
}
