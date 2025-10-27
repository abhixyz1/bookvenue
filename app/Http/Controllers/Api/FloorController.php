<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function index()
    {
        $floors = Floor::withCount('rooms')->get();

        return response()->json([
            'data' => $floors
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|integer|unique:floors,number',
        ]);

        $floor = Floor::create($validated);

        return response()->json([
            'message' => 'Floor created successfully',
            'data' => $floor
        ], 201);
    }

    public function update(Request $request, Floor $floor)
    {
        $validated = $request->validate([
            'number' => 'required|integer|unique:floors,number,' . $floor->id,
        ]);

        $floor->update($validated);

        return response()->json([
            'message' => 'Floor updated successfully',
            'data' => $floor
        ]);
    }

    public function destroy(Floor $floor)
    {
        if ($floor->rooms()->count() > 0) {
            return response()->json([
                'message' => 'Cannot delete floor with existing rooms'
            ], 422);
        }

        $floor->delete();

        return response()->json([
            'message' => 'Floor deleted successfully'
        ]);
    }
}
