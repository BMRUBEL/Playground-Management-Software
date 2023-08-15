<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Expense;
use App\Models\Expense_category;
use App\Models\User;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $list= Expense::all();
    //     return view('admin.expenses.expense', compact('list'));
    // }
    public function index()
    {
        $list = Expense::with('user', 'branch', 'category')->get();
        return view('admin.expenses.expense', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $branches = Branch::all();
        $categories = Expense_category::all();
        $expenses = Expense::all();
        return view('admin.expenses.add_expense', compact('users', 'branches', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Expense::create($data);

        return redirect()->route('expense.index')->with('msg', 'expense Insert Successfully Inserted');
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
        $categories = Expense_category::all();
        $expenses = Expense::all();
        $expense = Expense::find($id);
        return view('admin.expenses.edit_expense', compact('users', 'branches', 'categories', 'expenses', 'expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        Expense::find($id)->update($data);
        return redirect()->route('expense.index')->with('msg', 'Expense Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Expense::find($id)->delete();
        return redirect()->route('expense.index')->with('msg', 'Expense Deleted Successfully');
    }
}
