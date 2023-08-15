<?php

namespace App\Http\Controllers;

use App\Models\Expense_category;
use Illuminate\Http\Request;

class Expense_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Expense_category::all();
        return view('admin.expense_categories.expense_category', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Expense_category::all();
        return view('admin.expense_categories.add_category', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Expense_category::create($request->all());
        return redirect()->route('expense_category.index')->with('msg', 'Expense Category Insert Successfully Inserted');
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
        $categories = Expense_category::all();
        $category = Expense_category::find($id);
        return view('admin.expense_categories.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();


        Expense_category::find($id)->update($data);
        return redirect()->route('expense_category.index')->with('msg', 'Expense category updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Expense_category::find($id)->delete();
        return redirect()->route('expense_category.index')->with('msg', 'Expense category Deleted Successfully');
    }
}
