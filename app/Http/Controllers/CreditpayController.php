<?php



namespace App\Http\Controllers;



use App\Http\Controllers\Controller;

use App\Models\SfCreditpay;

use Illuminate\Http\Request;



class CreditpayController extends Controller

{

    public function store(Request $request, string $id){
        $creditpay = new SfCreditpay;
        $creditpay->member_id = $id;
        $creditpay->status = 'Pending';
        $creditpay->amount = $request->input('creditpay_amount');
        $creditpay->date = $request->input('creditpay_date');

        if ($request->file('creditpayreceipt')) {
            // Store the file in the 'uploads' directory under 'storage/app/public/uploads'
            $receiptphoto = $request->file('creditpayreceipt');
            $filename = time() . '_' . $receiptphoto->getClientOriginalName();
            $receiptphoto->move(public_path('storage/receiptimg'), $filename);

            $receiptpath = '/public/storage/receiptimg/' . $filename;
        }
        else{
            $receiptpath = '';
        }
        $creditpay->receipt_photo = $receiptpath;
        
        $creditpay->save();

        return redirect()->back()->with('success', 'Successfully posted new credit payment!');

    }

    public function update(Request $request, string $action, string $id){
        $creditpay = SfCreditpay::findOrFail($id);
        
        if($action == 'approve'){
            $creditpay->status = 'Posted';
            $returnmsg = 'approved';
        }
        else{
            $creditpay->status = 'Declined';
            $returnmsg = 'decilned';
        }

        $creditpay->save();

        return redirect()->back()->with('creditpay_approve', '1 credit payment '.$returnmsg.'!');
    }

}

