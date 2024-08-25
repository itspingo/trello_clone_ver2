<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\countries_model;
use Illuminate\Support\Facades\Validator;

class CountriesController extends Controller
{
    // Retrieve all countries
    public function index()
    {
        return response()->json(countries_model::all());
    }

    // Store a new country
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|string|max:10',
            'user_id' => 'nullable|string|max:10',
            'country_code' => 'required|string|max:2',
            'country_name' => 'required|string|max:100',
            'currency_code' => 'nullable|string|max:10',
            'currency_name' => 'nullable|string|max:100',
            'currency_symbol' => 'nullable|string|max:10',
            'lang_code' => 'nullable|string|max:10',
            'language' => 'nullable|string|max:200',
            'lang_direction' => 'nullable|string|max:10',
            'active' => 'required|string|max:10',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $country = countries_model::create($request->all());
        return response()->json($country, 201);
    }

    // Retrieve a specific country by ID
    public function show($id)
    {
        $country = countries_model::find($id);

        if (!$country) {
            return response()->json(['message' => 'Country not found'], 404);
        }

        return response()->json($country);
    }

    // Update a specific country by ID
    public function update(Request $request, $id)
    {
        $country = countries_model::find($id);

        if (!$country) {
            return response()->json(['message' => 'Country not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|string|max:10',
            'user_id' => 'nullable|string|max:10',
            'country_code' => 'required|string|max:2',
            'country_name' => 'required|string|max:100',
            'currency_code' => 'nullable|string|max:10',
            'currency_name' => 'nullable|string|max:100',
            'currency_symbol' => 'nullable|string|max:10',
            'lang_code' => 'nullable|string|max:10',
            'language' => 'nullable|string|max:200',
            'lang_direction' => 'nullable|string|max:10',
            'active' => 'required|string|max:10',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $country->update($request->all());
        return response()->json($country);
    }

    // Delete a specific country by ID
    public function destroy($id)
    {
        $country = countries_model::find($id);

        if (!$country) {
            return response()->json(['message' => 'Country not found'], 404);
        }

        $country->delete();
        return response()->json(['message' => 'Country deleted successfully']);
    }
}
