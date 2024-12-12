<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Maintenance::with('creator');

        if ($request->has('completed') && $request->input('completed') !== '') {
            $query->where('completed', $request->input('completed'));
        }

        if ($request->has('approved') && $request->input('approved') !== '') {
            $query->where('approved', $request->input('approved'));
        }

        return $query->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            "address" => 'required|string',
            'phone_number' => ['required', 'regex:/^09\d{8}$/'],
            "description" => 'required|string',
        ]);

        return  $request->user()->maintenance()->create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Maintenance $maintenance) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance)
    {
        return $maintenance->delete();
    }
}
