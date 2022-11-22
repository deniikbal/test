<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Services\Midtrans\CallbackService;

class CallbackController extends Controller
{

    public function receive()
    {

    \Midtrans\Config::$isProduction = false;
    \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    $notif = new \Midtrans\Notification();

    $transaction = $notif->transaction_status;
    $type = $notif->payment_type;
    $status_code = $notif->status_code;
    $order_id = $notif->order_id;
    $fraud = $notif->fraud_status;
    $signature_key = $notif->signature_key;
    $payment = Payment::where('order_id',$order_id)->first();
    $signature = hash('sha512',$payment->order_id . 200 . $payment->gross_amount . env('MIDTRANS_SERVER_KEY'));

    if ($signature != $signature_key ){
        return abort(404);
    }

    if ($transaction == 'capture') {
        // For credit card transaction, we need to check whether transaction is challenge by FDS or not
        if ($type == 'credit_card'){
          if($fraud == 'challenge'){
            // TODO set payment status in merchant's database to 'Challenge by FDS'
            // TODO merchant should decide whether this transaction is authorized or not in MAP
            echo "Transaction order_id: " . $order_id ." is challenged by FDS";
            }
            else {
            // TODO set payment status in merchant's database to 'Success'
            echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
            }
          }
        }
      else if ($transaction == 'settlement'){
        // TODO set payment status in merchant's database to 'Settlement'
        $payment = Payment::where('order_id',$order_id)->first();
        $payment->update([
            'transaction_status'=>$transaction,
        ]);
        }
        else if($transaction == 'pending'){
        // TODO set payment status in merchant's database to 'Pending'
        echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
        }
        else if ($transaction == 'deny') {
        // TODO set payment status in merchant's database to 'Denied'
        echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        }
        else if ($transaction == 'expire') {
        // TODO set payment status in merchant's database to 'expire'
        echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
        }
        else if ($transaction == 'cancel') {
        // TODO set payment status in merchant's database to 'Denied'
        echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
      }

    }

    public function verifikasi($id)
    {
        $payment = Payment::find($id);
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $status = \Midtrans\Transaction::status($payment->order_id);
        $payment->update([
            'transaction_status'=> $status->transaction_status,
            'status_message'=> $status->status_message,
        ]);

        Toastr::success('Pembayaran Berhasil','success');
        return redirect()->back();

    }

}
