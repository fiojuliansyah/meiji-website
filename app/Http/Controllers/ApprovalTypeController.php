<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ApprovalType;
use Illuminate\Http\Request;

class ApprovalTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lang)
    {
        $approvalTypes = ApprovalType::all();
        return view('approval_types.index', compact('approvalTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lang)
    {
        $users = User::all();
        return view('approval_types.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        ApprovalType::create($request->all());

        return redirect()->route('approval_types.index')->with('success', 'Approval Type created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lang, ApprovalType $approvalType)
    {
        $users = User::all();
        return view('approval_types.edit', compact('approvalType', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($lang, Request $request, ApprovalType $approvalType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $approvalType->update($request->all());

        return redirect()->route('approval_types.index')->with('success', 'Approval Type updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lang, ApprovalType $approvalType)
    {
        $approvalType->delete();

        return redirect()->route('approval_types.index')->with('success', 'Approval Type deleted successfully!');
    }
}
