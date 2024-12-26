<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Member;
use App\Models\SfContribution;
use App\Models\SfLoan;
use App\Models\SfCreditpay;
use App\Models\SfInterest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class MemberController extends Controller

{
    public function store(Request $request){

        // Validate the request data

        $validated = $request->validate([
            'Firstname' => 'required|string|max:255',
            'Lastname' => 'required|string|max:255',
            'Address' => 'required|string',
            'Contact' => 'required|string',
            'Email' => 'required|email|unique:members',
            'Job' => 'required|string',
            'Birthdate' => 'required|date',
            'Gender' => 'required|string',
            'Profile' => 'file|mimes:jpg,jpeg,png|max:2048',
            'Password' => 'required|string'
        ]);



        if ($request->file('Profile')) {

            // Store the file in the 'uploads' directory under 'storage/app/public/uploads'
            $profilephoto = $request->file('Profile');
            $filename = time() . '_' . $profilephoto->getClientOriginalName();
            $profilephoto->move(public_path('storage/profileimg'), $filename);

            $profilepath = '/public/storage/profileimg/' . $filename;

        }

        else{

            $profilepath = '';

        }
        // Insert data into the database

        $member = new Member;
        $member->Firstname = $validated['Firstname'];
        $member->Lastname = $validated['Lastname'];
        $member->Address = $validated['Address'];
        $member->Contact = $validated['Contact'];
        $member->Email = $validated['Email'];
        $member->Job = $validated['Job'];
        $member->Birthdate = $validated['Birthdate'];
        $member->Gender = $validated['Gender'];
        $member->image = $profilepath;
        $member->save(); // Save the member data

        $user = new User;
        $user->name = $validated['Firstname'] . ' ' . $validated['Lastname'];
        $user->email = $validated['Email'];
        $user->password = Hash::make($validated['Password']);
        $user->role = 'member';
        $user->member_id = $member->member_id;
        $user->save();

        return redirect()->back()->with('success', 'Member created successfully!');
    }



    public function show(string $id = ''){

        $userid = Auth::user()->member_id;

        if($id){
            $memberid = $id;
        }
        else{
            $memberid = $userid;
        }
        $user = Member::findOrFail($userid);
        $member = Member::findOrFail($memberid);

        $contributions = SfContribution::where('member_id', $memberid)
                                        ->orderBy('contribution_id', 'desc')
                                        ->get();

        $loans = SfLoan::where('member_id', $memberid)
                                        ->orderBy('loan_id', 'desc')
                                        ->get();

        $creditpays = SfCreditpay::where('member_id', $memberid)
                                        ->orderBy('creditpay_id', 'desc')
                                        ->get();

        $totalfund = SfContribution::where('status', 'Posted')->sum('amount');
        $totalinterest = SfInterest::sum('amount');

        // Pass the member data to the view
        return view('memberinfo.main', compact('user', 'member','contributions','loans', 'creditpays','totalfund', 'totalinterest'));
    }

    public function update(Request $request, string $id = ''){

        //Validate the request data

        $validated = $request->validate([
            'Firstname' => 'required|string|max:255',
            'Lastname' => 'required|string|max:255',
            'Address' => 'required|string',
            'Contact' => 'required|string',
            'Job' => 'required|string',
            'Birthdate' => 'required|date',
            'Gender' => 'required|string',
            'Profile' => 'file|mimes:jpg,jpeg,png|max:2048'
        ]);

        $member = Member::findOrFail($id);
        $member->Firstname = $validated['Firstname'];
        $member->Lastname = $validated['Lastname'];
        $member->Address = $validated['Address'];
        $member->Contact = $validated['Contact'];
        $member->Job = $validated['Job'];
        $member->Birthdate = $validated['Birthdate'];
        $member->Gender = $validated['Gender'];

        if ($request->file('Profile')) {

            // Store the file in the 'uploads' directory under 'storage/app/public/uploads'
            $profilephoto = $request->file('Profile');
            $filename = time() . '_' . $profilephoto->getClientOriginalName();
            $profilephoto->move(public_path('storage/profileimg'), $filename);
            $profilepath = '/public/storage/profileimg/' . $filename;

            $member->image = $profilepath;

        }

        $member->save(); // Save the member data
        return redirect()->back()->with('success', 'Member successfully update!');

    }

    public function changePassword(){
        $userid = Auth::user()->member_id;
        $user = Member::findOrFail($userid);

        return view('changepassword', compact('user'));

    }

    public function updatepassword(Request $request){

        $request->validate([
            'current_password' => ['required', 'current_password'], // Validate current password
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Validate new password
        ]);
    
        // Update the password
        $user = $request->user();
        $user->password = Hash::make($request->password);
        $user->save();
    
        return redirect()->back()->with('success', 'Password changed successfully!');
    }

}

