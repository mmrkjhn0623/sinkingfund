<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Member;
use App\Models\SfContribution;
use App\Models\SfLoan;
use App\Models\SfCreditpay;
use App\Models\SfInterest;
use App\Models\SfRelease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ReleaseController extends Controller
{
    public function release(string $id = ''){

        $contributions = SfContribution::where('member_id', $id)
                                        ->where('status', 'Posted')
                                        ->sum('amount');

        $loans = SfLoan::where('member_id', $id)
                        ->where('status', 'Posted')
                        ->sum('amount');

        $creditpays = SfCreditpay::where('member_id', $id)
                                ->where('status', 'Posted')
                                ->sum('amount');

        $totalfund = SfContribution::where('status', 'Posted')->sum('amount');
        $totalinterest = SfInterest::sum('amount');

        $p_interest = ($contributions / $totalfund) * 100;

        $int_alloc = ($p_interest * $totalinterest) / 100;

        // $release = SfRelease::where('member_id', $id)->first();
        $release = new SfRelease;
        $release->member_id = $id;
        $release->contribution = $contributions;
        $release->loan_balance = $loans - $creditpays;
        $release->interest_allocation = $int_alloc;
        $release->date = date('Y-m-d');

        $release->save();

        $rel_contrib = SfContribution::where('member_id', $release->member_id)
                                    ->where('status', 'Posted')
                                    ->update(['status' => 'Released']);
        $rel_loan = SfLoan::where('member_id', $release->member_id)
                                    ->where('status', 'Posted')
                                    ->update(['status' => 'Released']);
        $rel_contrib = SfCreditpay::where('member_id', $release->member_id)
                                    ->where('status', 'Posted')
                                    ->update(['status' => 'Released']);

        $reduct_interest = new SfInterest;
        $reduct_interest->amount = $release->interest_allocation * (-1);
        $reduct_interest->date = $release->date;
        $reduct_interest->save();

        $member = Member::where('member_id', $release->member_id)->first();

        // $pdf = Pdf::loadView('pdftemp', compact('release', 'member'));
        // return $pdf->download('release.pdf');

        return redirect()->back()->with('released', 'Successfully release member contributions!')
                                 ->with('released_id', $release->release_id);
    }

    public function printdetails(string $id =''){
        $release = SfRelease::findOrFail($id);
        $member = Member::findOrFail($release->member_id);
        $pdf = Pdf::loadView('pdftemp', compact('release', 'member'));
        return $pdf->download('release_'.$release->date.'_'.$member->Firstname.'_'.$member->Lastname.'.pdf');
    }
}
