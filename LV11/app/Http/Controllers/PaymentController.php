<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PrevailExcel\Bani\Facades\Bani;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;




class PaymentController extends Controller
{
    //
    public function createPayment()
    {
        try {
            return Bani::payWithWidget();
        } catch (\Exception $e) {
            return redirect()->back()->withMessage(['msg' => $e->getMessage(), 'type' => 'error']);
        }
    }

    public function handleGatewayCallback()
    {
        // Verify transaction and get data
        $data = bani()->getPaymentData();

        // Get user
        $user = Auth::user();

        // Do anything you want
        if ($data['status'] == true) { // Checking to ensure the transaction was successful
            Payment::create([
                'user_id' => $user->id,
                'reference' => $data['data']['pay_ref'],
                'amount' => $data['data']['pay_amount'],
                'channel' => $data['data']['pay_method'],
                'payment_date' => $data['data']['pub_date'],
                'payment_status' => $data['data']['pay_status'],
            ]); // Storing the payment in the database
            return view('thankyou.page');
        }
    }
}
