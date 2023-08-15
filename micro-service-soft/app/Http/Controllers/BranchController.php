<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Branch::all();
        return view('admin.branches.branch', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $branches = Branch::all();
        return view('admin.branches.add_branch', compact('users', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact_email' => 'required',
            'contact_phone' => 'required',
            'address' => 'required',
            'descriptions' => 'required',
            'user_id' => 'required',
        ]);

        Branch::create($request->all());
        return redirect()->route('branch.index')->with('msg', 'Branch Insert Successfully Inserted');
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
        $users = User::all();
        $branches = Branch::all();
        $branch = Branch::find($id);
        return view('admin.branches.edit_branch', compact('branch', 'users', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'contact_email' => 'required',
            'contact_phone' => 'required',
            'address' => 'required',
            'descriptions' => 'required',
            'user_id' => 'required',
        ]);
        Branch::find($id)->update($request->all());
        return redirect()->route('branch.index')->with('success', 'Branch update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Branch::find($id)->delete();
        return redirect()->route('branch.index')->with('msg', 'Branch Deleted Successfully');
    }
}
