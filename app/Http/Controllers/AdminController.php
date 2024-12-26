<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use App\Models\SfContribution;
use App\Models\SfLoan;
use App\Models\SfCreditpay;
use App\Models\SfInterest;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $userid = Auth::user()->member_id;
        $user = Member::findOrFail($userid);

        $pending_contribs = SfContribution::where('status', 'Pending')
        ->with('member:member_id,Firstname,Lastname,image,Job') // Eager load members
        ->get(['contribution_id', 'member_id', 'amount', 'date', 'status', 'receipt_photo'])
        ->map(function ($contribution) {
            return [
                'contribution_id' => $contribution->contribution_id,
                'firstname' => $contribution->member->Firstname,
                'lastname' => $contribution->member->Lastname,
                'image' => $contribution->member->image,
                'job' => $contribution->member->Job,
                'amount' => $contribution->amount,
                'date' => $contribution->date,
                'status' => $contribution->status,
                'receipt_photo' => $contribution->receipt_photo,
            ];
        });

        $pending_creditpays = SfCreditpay::where('status', 'Pending')
        ->with('member:member_id,Firstname,Lastname,image,Job') // Eager load members
        ->get(['creditpay_id', 'member_id', 'amount', 'date', 'status', 'receipt_photo'])
        ->map(function ($pending_creditpay) {
            return [
                'creditpay_id' => $pending_creditpay->creditpay_id,
                'firstname' => $pending_creditpay->member->Firstname,
                'lastname' => $pending_creditpay->member->Lastname,
                'image' => $pending_creditpay->member->image,
                'job' => $pending_creditpay->member->Job,
                'amount' => $pending_creditpay->amount,
                'date' => $pending_creditpay->date,
                'status' => $pending_creditpay->status,
                'receipt_photo' => $pending_creditpay->receipt_photo,
            ];
        });

        $pending_loans = SfLoan::where('status', 'Pending')
        ->with('member:member_id,Firstname,Lastname,image,Job') // Eager load members
        ->get(['loan_id', 'member_id', 'amount', 'date', 'status'])
        ->map(function ($pending_loan) {
            return [
                'loan_id' => $pending_loan->loan_id,
                'firstname' => $pending_loan->member->Firstname,
                'lastname' => $pending_loan->member->Lastname,
                'image' => $pending_loan->member->image,
                'job' => $pending_loan->member->Job,
                'amount' => $pending_loan->amount,
                'date' => $pending_loan->date,
                'status' => $pending_loan->status,
            ];
        });

        $totalcontrib = SfContribution::where('status', 'Posted')->sum('amount');
        $totalcreditpay = SfCreditpay::where('status', 'Posted')->sum('amount');
        $totalloan = Sfloan::where('status', 'Posted')->sum('amount');
        $totalinterest = SfInterest::sum('amount');
        $member_count = count(Member::get());

        return view('admin.admin', compact('user', 'pending_contribs', 'pending_creditpays', 'pending_loans',
                    'totalcontrib', 'totalcreditpay', 'totalloan', 'totalinterest', 'member_count'));
    }

    public function members(){
        $userid = Auth::user()->member_id;

        $searchkey = $_GET['s'] ?? '';
        $page = $_GET['p'] ?? 0;
        if($page > 1){
            $startpage = ($page - 1) * 15;
        }else{
            $startpage = 0;
        }

        // Fetch all members
        $user = Member::findOrFail($userid);
        $members = Member::when($searchkey, function ($query, $searchkey) {
            // Adjust the query to search by Firstname, Lastname, or any other fields
            return $query->where('Firstname', 'like', '%' . $searchkey . '%')
                         ->orWhere('Lastname', 'like', '%' . $searchkey . '%')
                         ->orWhere('Job', 'like', '%' . $searchkey . '%');
        })
        ->skip($startpage)  // Always skip 5 records
        ->limit(15) // Always limit to 9 records
        ->orderBy('Lastname', 'asc')
        ->get();

        $membercount = Member::when($searchkey, function ($query, $searchkey) {
            // Adjust the query to search by Firstname, Lastname, or any other fields
            return $query->where('Firstname', 'like', '%' . $searchkey . '%')
                         ->orWhere('Lastname', 'like', '%' . $searchkey . '%')
                         ->orWhere('Job', 'like', '%' . $searchkey . '%');
        })->get();

        $totalmembers = count($membercount);

        // Pass data to the view
        return view('members.main', compact('user', 'members','searchkey','page','totalmembers'));
    }
}
