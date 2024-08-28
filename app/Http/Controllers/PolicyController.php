<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;
use App\Models\PolicyType;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $policies = Policy::with('policyType:id,type_name')->paginate(5);
        return view('policies.index', compact('policies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $policyTypes = PolicyType::all();
        return view('policies.create', compact('policyTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'policy_title' => 'required|min:4|max:255',
            'policy_type_id' => 'required',
        ]);

        $policy = new Policy;
        $policy->policy_type_id = $request->policy_type_id;
        $policy->policy_title = $request->policy_title;
        $policy->save();

        return redirect()->route('policies');
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
