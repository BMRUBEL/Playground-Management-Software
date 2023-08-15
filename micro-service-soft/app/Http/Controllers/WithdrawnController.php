<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Member;
use App\Models\WithdrawDeposit;
use Illuminate\Http\Request;

class WithdrawnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $withdraw_list=WithdrawDeposit::all();

        return view('withdrawn.list_withdrawn', compact('withdraw_list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $deposit = Deposit::all();
        return view('withdrawn.add_withdrawn');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->all();
        WithdrawDeposit::create($data);
        return redirect('/withdrawn')->with('msg','Saved Successfully!');
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
        $deposits=Deposit::all();
        $withdraw=WithdrawDeposit::find($id);
        return view('withdrawn.edit_withdrawn',compact('withdraw','deposits'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data= $request->all();
        WithdrawDeposit::find($id)->update($data);
        return back()->with('msg', 'Withdraw info has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        WithdrawDeposit::find($id)->delete();
        return redirect()->route('withdrawn.index')->with('msg','Deleted Successfully!');
    }

    function getmember(Request $request)
    {

        $id = $request->input('id');

        $data = Deposit::with('member')->where('id', $id)->get();


        return response()->json($data);
    }
}
