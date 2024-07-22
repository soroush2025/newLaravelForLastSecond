<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::all();
        return response()->json($activities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }
        $activity = Activity::create($data);
        return response()->json($activity, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $activity = Activity::findOrFail($id);
        return response()->json($activity);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityRequest $request, $id)
    {
        $activity = Activity::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }
        $activity = Activity::create($data);

        return response()->json($activity);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        if ($activity->image) {
            Storage::delete('public/' . $activity->image);
        }
        $activity->delete();
        return response()->json(null, 204);
    }
}
