<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\CreditpayController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\AdminController;

use App\Models\Member;
use App\Models\User;
use App\Models\SfContribution;

use App\Http\Middleware\DecryptId;
use App\Http\Middleware\AdminRole;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

Route::get('/about', function () {
    return view('about');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware('auth')->controller(MemberController::class)->group(function () {

    Route::get('/', function () {
        if (Auth::user()->role == 'admin') {
            return app(AdminController::class)->index();
        }
        return app(MemberController::class)->show();
    })->name('members.show');

    Route::put('updatemember/{id}', 'update')->name('members.update')->middleware(DecryptId::class.':id');

    Route::post('/newcontribution/{id}', [ContributionController::class, 'store'])
    ->name('contributions.store')
    ->middleware(DecryptId::class.':id');

    Route::post('/newcreditpay/{id}', [CreditpayController::class, 'store'])
        ->name('creditpay.store')
        ->middleware(DecryptId::class.':id');

    Route::post('/newloan/{id}', [LoanController::class, 'store'])
        ->name('loans.store')
        ->middleware(DecryptId::class.':id');

    Route::get('/contributions', [ContributionController::class, 'checkall']);
    
    Route::get('/loanbalance', [LoanController::class, 'balance']);

    Route::get('/generatedinterest', [InterestController::class ,'total']);

    Route::get('/changepassword', [MemberController::class, 'changePassword']);
    Route::put('/updatepassword', [MemberController::class, 'updatepassword'])
        ->name('update.password');
    
});

Route::middleware([AdminRole::class])->controller(MemberController::class)->group(function () {
    Route::post('newmember', 'store')->name('members.store');

    Route::get('/memberinfo/{id}', 'show')
        ->name('members.show')
        ->middleware(DecryptId::class.':id');
    
    Route::get('/members', [AdminController::class, 'members'])->name('admin.members');

    Route::get('/updatecontribution/{action}/{id}', [ContributionController::class, 'update'])
        ->name('contribution.update')
        ->middleware(DecryptId::class.':id');

    Route::get('/updatecreditpay/{action}/{id}', [CreditpayController::class, 'update'])
        ->name('creditpay.update')
        ->middleware(DecryptId::class.':id');

    Route::get('/updateloan/{action}/{id}', [LoanController::class, 'update'])
        ->name('loan.update')
        ->middleware(DecryptId::class.':id');
});

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LogoutController::class, 'logout']);
















// Route::get('/testmemberinfo/{member}/', function (Member $member) {
//     // $displaymember =  $member->Lastname .', '. $member->Firstname . ' '. $member->MI . '<br/>';
//     // $displaymember .= $member->Address . '<br/><br/>';

//     $contributions = SfContribution::where('member_id', $member->member_id)
//                                         ->orderBy('contribution_id', 'desc')
//                                         ->get();

//     // foreach($contributions as $contrib){
//     //     $displaymember .= $contrib->amount . '<br/>';
//     // }

//     return $member;
// });

// Route::get('/createuser', function(){
//     $members = Member::get();
//     $memberinfo = '';
//     foreach($members as $member){
//         $user = User::where('member_id', $member['member_id'])->exists();
//         if (!$user) {
//             $newuser = new User;
//             $newuser->email = $member['Email'];
//             $newuser->name = $member['Firstname'] .' '. $member['Lastname'];

//             $pwd = str_replace(' ', '', strtolower($member['Lastname'])) . substr($member['Contact'], -4);

//             $newuser->password = Hash::make($pwd);
//             $newuser->role = 'member';
//             $newuser->member_id = $member['member_id'];
//             $newuser->save();
//         }
//     }
//     return $memberinfo;

// });

// Route::fallback(function () {
//     return view('welcome');
// });

