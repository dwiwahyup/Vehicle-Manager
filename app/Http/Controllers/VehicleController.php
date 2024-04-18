<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Vehicle::all();

        return view('dashboard.vehicles.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request, Vehicle $vehicle)
    {
        $this->validate($request, [
            'type' => 'required',
            'registration_number' => 'required',
            'year' => 'required',
            'region' => 'required',
            'owned_vehicles' => 'required',
            'status' => 'required',
            'service_schedule' => 'required',
        ]);
        // dd($request->all());

        try {
            $data = $request->all();
            $data['slug'] = SlugService::createSlug(Vehicle::class, 'slug', $request->registration_number);
            Vehicle::create($data);

            return redirect()
                ->route('vehicles.index')
                ->with([
                    'success' => 'New vehicle added successfully!',
                ]);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with([
                        'error' => 'Failed to add new vehicle! The registration number is already in use.',
                    ]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $data = Vehicle::where('slug', $slug)->first();

        return view('dashboard.vehicles.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        try {
            // Validate the incoming request
            $this->validate($request, [
                'type' => 'required',
                'registration_number' => 'required',
                'year' => 'required',
                'region' => 'required',
                'owned_vehicles' => 'required',
                'status' => 'required',
                'service_schedule' => 'required',
            ]);

            $data = $request->all();
            $data['slug'] = SlugService::createSlug(Vehicle::class, 'slug', $request->registration_number);

            // Update the vehicle
            $vehicle->update($data);

            return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully!');
        } catch (\Exception $e) {
            // Handle the database integrity constraint violation error
            if ($e instanceof \Illuminate\Database\QueryException && $e->getCode() === '23000') {
                return redirect()->back()->withInput()->with('error', 'Failed to update vehicle! The registration number is already in use.');
            }

            // Handle other types of exceptions if needed
            return redirect()->back()->withInput()->with('error', 'Failed to update vehicle: ' . $e->getMessage());
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()
            ->route('vehicles.index')
            ->with([
                'success' => 'Vehicle deleted successfully!',
            ]);
    }
}
