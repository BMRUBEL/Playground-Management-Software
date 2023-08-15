<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Expense;
use Illuminate\Http\Request;

class Expense_ReportController extends Controller
{
    public function filter(Request $request)
    {

        $branch_id = $request->branch_id;

        $query = Expense::query();

        if ($branch_id) {
            $query->where('branch_id', $branch_id);
        }

        $main = $query->get();
        $branch = Branch::all();
        // dd($branch);

        return view('admin.expenses.expensereport', compact('main', 'branch'));
    }
}
