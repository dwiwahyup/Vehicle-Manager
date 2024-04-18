<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Dotenv\Exception\ValidationException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Driver::all();

        return view('dashboard.drivers.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request, Driver $driver)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:drivers,email',
                'phone_number' => 'required|unique:drivers,phone_number',
                'address' => 'required',
                'license_number' => 'required|unique:drivers,license_number',
                'status' => 'required',
            ], [
                'email.unique' => 'The email has already been taken.',
                'phone_number.unique' => 'The phone number has already been taken.',
                'license_number.unique' => 'The license number has already been taken.',
            ]);

            $data = $request->all();
            $data['slug'] = SlugService::createSlug(Driver::class, 'slug', $request->name);
            $driver->create($data);

            return redirect()
                ->route('drivers.index')
                ->with([
                    'success' => 'New category added successfully!',
                ]);
        } catch (ValidationException $e) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($e->validator->errors())
                ->with([
                    'error' => 'Failed to add new category!',
                ]);
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
        $data = Driver::where('slug', $slug)->first();

        return view('dashboard.drivers.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:drivers,email,' . $driver->id,
                'phone_number' => 'required|unique:drivers,phone_number,' . $driver->id,
                'address' => 'required',
                'license_number' => 'required|unique:drivers,license_number,' . $driver->id,
                'status' => 'required',
            ], [
                'email.unique' => 'The email has already been taken.',
                'phone_number.unique' => 'The phone number has already been taken.',
                'license_number.unique' => 'The license number has already been taken.',
            ]);

            $data = $request->all();
            $data['slug'] = SlugService::createSlug(Driver::class, 'slug', $request->name);
            $driver->update($data);

            return redirect()
                ->route('drivers.index')
                ->with([
                    'success' => 'Driver updated successfully!',
                ]);
        } catch (ValidationException $e) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($e->validator->getMessageBag())
                ->with([
                    'error' => 'Failed to update driver!',
                ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();

        return redirect()
            ->route('drivers.index')
            ->with([
                'success' => 'Driver deleted successfully!',
            ]);
    }
}
