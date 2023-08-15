<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\LoanApplication;
use App\Models\LoanProduct;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoanapplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = LoanApplication::all();
        // dd($lists);
        return view('loanApplication.loanListAll', compact('lists'));
    }

    public function pending()
    {
        $lists = LoanApplication::all()->where('status', 'pending');
        return view('loanApplication.loanListPending', compact('lists'));
    }

    public function approved()
    {
        $lists = LoanApplication::all()->where('status', 'approved');
        return view('loanApplication.loanListApproved', compact('lists'));
    }

    public function loanCalculate(Request $request)
    {

        $rules = $request->validate([
            'apply_amount' => 'required|numeric',
            'interest_rate' => 'required|numeric',
            'interest_type' => 'required',
            'term' => 'required|numeric',
            'term_period' => 'required',
            'first_payment_date' => 'required|date',
            'penalties' => 'required|numeric'

        ]);
        $validated = Validator::make($request->all(), $rules);
        
        if ($validated->failed()) {
            dd('Error! Something is worng ');
        } else {

            $data = $request->all();
            $amount = $data['apply_amount'];
            $interest = $data['interest_rate'];
            $type = $data['interest_type'];
            $first_date = $data['first_payment_date'];
            $latePenalty = $data['penalties'];
            

            if ($type !== 'one_time') {

                $term = $data['term'];
                $term_period = $data['term_period'];
                $mainAmount = $amount / $term;
                $interestPerMonth = ($amount * $interest) / 100;
                $payAbleInterest = $interestPerMonth / $term;
                $payableAmount = $amount + $interestPerMonth;
                $payAmntPerTerm = $payableAmount / $term;
                $latePnltyFinl = ($payAmntPerTerm * $latePenalty) / 100;
                $finalPayable = $payableAmount;

            if ($type == 'fixed_rate') {
                // fixed rate interest type Looks like this
                //  where i=interest rate and P=Principle amount
                $totalIntrst = 1 + ($interest / 100) * $term;
                $fixedAmount = $amount + $amount * ($totalIntrst - 1);
            }

            $formdata = [
                'famount' => $amount,
                'fintrst' => $interest,
                'ftype' => $type,
                'fterm' => $term,
                'ftmPriod' => $term_period,
                'fdate' => $first_date,
                'fpnlty' => $latePenalty
            ];



            $newDate[] = $first_date;
            $lists = [];
            for ($x = 1; $x <= $term; $x++) {
                $c = count($newDate) - 1;

                if ($term_period == '+1 year') {
                    $date = date('Y-m-d', strtotime($newDate[$c] . ' + 1 year'));
                }

                if ($term_period == '+1 month') {
                    $date = date('Y-m-d', strtotime($newDate[$c] . ' + 1 month'));
                }

                if ($term_period == '+1 week') {
                    $date = date('Y-m-d', strtotime($newDate[$c] . ' + 7 days'));
                }

                if ($term_period == '+1 day') {
                    $date = date('Y-m-d', strtotime($newDate[$c] . ' + 1 day'));
                }

                $finalPayable -= $payAmntPerTerm;
                $lists[] = [
                    'totalPayable' => $payableAmount,
                    'date' => $date,
                    'amount' => $payAmntPerTerm,
                    'penalty' => $latePnltyFinl,
                    'principalAmnt' => $mainAmount,
                    'interest' => $payAbleInterest,
                    'balance' => $finalPayable
                ];
                $newDate[] = $date;
            }
            } else {

            $interestPerMonth = ($amount * $interest) / 100;
            $payableAmount = $amount + $interestPerMonth;
            $latePnltyFinl = ($amount * $latePenalty) / 100;
            $finalPayable = $payableAmount - $payableAmount;
            $lists[] = [
                'totalPayable' => $payableAmount,
                'date' => $first_date,
                'amount' => $payableAmount,
                'penalty' => $latePnltyFinl,
                'principalAmnt' => $amount,
                'interest' => $interestPerMonth,
                'balance' => $finalPayable
            ];
            $formdata = [
                'famount' => $amount,
                'fintrst' => $interest,
                'ftype' => $type,
                'fdate' => $first_date,
                'fpnlty' => $latePenalty
            ];
            }

            // dd($fixedAmount);

            return view('loanApplication.loanCalculated', compact('lists', 'formdata'));
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        LoanApplication::create($data);
        return redirect('/loans');
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

    public function getPro()
    {
        $branches = Branch::all();
        $managers = User::where('role', 'manager')->get();
        $user = User::all();
        $members = Member::all();
        $loanproducts = LoanProduct::all();
        return view('loanApplication.loanApplicationForm')->with('loanproducts', $loanproducts)->with('members', $members)->with('users', $user)->with('branches', $branches)->with('managers', $managers);
    }
}
