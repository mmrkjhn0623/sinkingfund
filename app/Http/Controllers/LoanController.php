<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SfLoan;
use App\Models\SfInterest;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller

{

    public function store(Request $request, string $id){
        $loan = new SfLoan;
        $loan->member_id = $id;
        $loan->amount = $request->input('loan_amount');
        $loan->date = $request->input('loan_date');
        $loan->status = 'Pending';

        $loan->save(); // Save the contribution

        return redirect()->back()->with('success', 'Successfully process new loan!');
    }

    public function update(Request $request, string $action, string $id){
        $loan = SfLoan::findOrFail($id);
        
        if($action == 'approve'){
            $loan->status = 'Posted';
            $returnmsg = 'approved';
        }
        else{
            $loan->status = 'Declined';
            $returnmsg = 'decilned';
        }
        $loan->save();

        if($loan->status == 'Posted'){
            $interest = new SfInterest;
            $interest->loan_id = $loan->loan_id;
            $interest->amount = floatval($loan->amount * 0.05);
            $interest->date = $loan->date;
            $interest->save();
        }

        return redirect()->back()->with('loan_approve', '1 loan request '.$returnmsg.'!');
    }

    public function balance(Request $request){
        $userid = Auth::user()->member_id;
        $user = Member::findOrFail($userid);

        $loanbalances = DB::table('members')
                        ->leftJoinSub(
                            DB::table('sf_loans')
                                ->select('member_id', DB::raw('SUM(amount) AS total_loans'))
                                ->where('status', 'Posted')
                                ->groupBy('member_id'),
                            'loans_summary',
                            'members.member_id',
                            '=',
                            'loans_summary.member_id'
                        )
                        ->leftJoinSub(
                            DB::table('sf_creditpays')
                                ->select('member_id', DB::raw('SUM(amount) AS total_payments'))
                                ->where('status', 'Posted')
                                ->groupBy('member_id'),
                            'payments_summary',
                            'members.member_id',
                            '=',
                            'payments_summary.member_id'
                        )
                        ->select(
                            'members.member_id',
                            'members.Firstname',
                            'members.Lastname',
                            'members.Job',
                            'members.image',
                            DB::raw('COALESCE(loans_summary.total_loans, 0) - COALESCE(payments_summary.total_payments, 0) AS total_balance')
                        )
                        ->havingRaw('total_balance > 0')
                        ->orderBy('total_balance', 'DESC')
                        ->get();

        return view('loans', compact('user', 'loanbalances'));
    }

}

