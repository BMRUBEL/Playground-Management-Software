<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Member;
use Illuminate\Http\Request;

class DepositeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depo_list=Deposit::orderByDesc('id')->get();
        

        return view('deposite.list_deposit',compact('depo_list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $member=Member::all();
        return view('deposite.add_deposit')->with('members',$member);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->all();
        Deposit::create($data);
        return redirect('/deposite');
    }

    /**
     * Display the specified resource.
     */
    public function show()

    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $members=Member::all();
        $deposit=Deposit::find($id);
        return view('deposite.edit_deposit', compact('members','deposit'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data= $request->all();
        Deposit::find($id)->update($data);
        return back()->with('msg', 'Deposite info has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Deposit::find($id)->delete();
        return redirect()->route('deposite.index')->with('msg','Deleted Successfully!');
    }

    

}
