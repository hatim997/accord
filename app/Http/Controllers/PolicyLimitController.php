<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PolicyType;
use App\Models\PolicyLimit;

class PolicyLimitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $policyLimits = PolicyLimit::with('policyType:id,type_name')->paginate(5);
        return view('policylimits.index', compact('policyLimits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $policyTypes = PolicyType::all();
        return view('policylimits.create', compact('policyTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'policy_type_id' => 'required',
            'coverage_item' => 'required|min:4|max:100',
            'nature_of_input' => 'required|min:4|max:255',
        ]);

        $policyLimit = new PolicyLimit;
        $policyLimit->policy_type_id = $request->policy_type_id;
        $policyLimit->coverage_item = $request->coverage_item;
        $policyLimit->nature_of_input = $request->nature_of_input;
        $policyLimit->save();

        return redirect()->route('policylimits');
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
