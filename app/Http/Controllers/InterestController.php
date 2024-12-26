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

class InterestController extends Controller
{
    public function total(){
        $userid = Auth::user()->member_id;
        $user = Member::findOrFail($userid);

        $interests = DB::table('sf_loans')
                ->select([
                    'sf_loans.loan_id',
                    'sf_loans.date as date',
                    'sf_loans.amount as loan',
                    'members.Firstname as firstname',
                    'members.Lastname as lastname',
                    'members.image as image',
                    'members.Job as job',
                    'sf_interests.amount as interest'
                ])
                ->join('sf_interests', 'sf_loans.loan_id', '=', 'sf_interests.loan_id')
                ->join('members', 'sf_loans.member_id', '=', 'members.member_id')
                ->where('sf_loans.status', 'Posted')
                ->orderBy('interest', 'DESC')
                ->get();

        return view('interests', compact('user', 'interests'));
    }
}
