<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SfContribution;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ContributionController extends Controller
{
    public function show($id){
        // Find the member by ID
        $contributions = SfContribution::where('member_id', $id)->get();

        // Pass the member data to the view
        return view('memberinfo', compact('contributions'));
    }

    public function store(Request $request, string $id){

        $contribution = new SfContribution;
        $contribution->member_id = $id;
        $contribution->amount = $request->input('contrib_amount');
        $contribution->status = 'Pending';
        $contribution->date = $request->input('contrib_date');

        if ($request->file('contribreceipt')) {
            // Store the file in the 'uploads' directory under 'storage/app/public/uploads'
            $receiptphoto = $request->file('contribreceipt');
            $filename = time() . '_' . $receiptphoto->getClientOriginalName();
            $receiptphoto->move(public_path('storage/receiptimg'), $filename);

            $receiptpath = '/public/storage/receiptimg/' . $filename;
        }
        else{
            $receiptpath = '';
        }

        $contribution->receipt_photo = $receiptpath;

        $contribution->save(); // Save the contribution

        // return $contribution->member_id + $contribution->amount + $contribution->remarks + $contribution->date;
        return redirect()->back()->with('success', 'Successfully posted new contribution!');
    }

    public function update(Request $request, string $action, string $id){
        $contrib = SfContribution::findOrFail($id);

        if($action == 'approve'){
            $contrib->status = 'Posted';
            $returnmsg = 'approved';
        }
        else{
            $contrib->status = 'Declined';
            $returnmsg = 'decilned';
        }
        $contrib->save();

        return redirect()->back()->with('contrib_approve', '1 contribution ' . $returnmsg . '!');
    }

    public function checkall(){
        $userid = Auth::user()->member_id;
        $user = Member::findOrFail($userid);

        $contributions = DB::table('sf_contributions')
        ->select([
            DB::raw('SUM(sf_contributions.amount) as total'),
            'members.Firstname as firstname',
            'members.Lastname as lastname',
            'members.image as image',
            'members.Job as job'
        ])
        ->join('members', 'sf_contributions.member_id', '=', 'members.member_id')
        ->where('sf_contributions.status', 'Posted')
        ->groupBy('members.Firstname', 'members.Lastname', 'members.image', 'members.Job')
        ->orderBy('total', 'DESC')
        ->get();

        $totalfund = SfContribution::where('status', 'Posted')->sum('amount');
        
        return view('contributions', compact('contributions', 'user'));
    }
}
