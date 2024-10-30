<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PolicyType;

class PolicyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $policyTypes = PolicyType::paginate(5);
        return view('policytypes.index', compact('policyTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('policytypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type_name' => 'required|min:4|unique:policy_types|max:255',
            'description' => 'nullable',
        ]);

        $policyType = new PolicyType;
        $policyType->type_name = $request->type_name;
        $policyType->description = $request->description;
        $policyType->save();

        return redirect()->route('policytypes');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
