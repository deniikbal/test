<?php

namespace App\Http\Controllers\Student;

use App\Models\Payment;
use App\Models\Student;
use App\Models\TempPayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function payment()
    {
        $student = Student::where('user_id', Auth::user()->id)->first();
        $payment = Payment::where('student_id', $student->id)->get();
        $countpayment = Payment::where('student_id', $student->id)->count();
        $countpayment = Payment::where('student_id', $student->id)->count();
        return view('siswa.payment.home', compact('student','payment','countpayment'));
    }

    public function create (Request $request)
    {

        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->nominal,
            ),
            'item_details' => array(
                [
                    'id' => 'a1',
                    'price' =>  $request->nominal,
                    'quantity' => 1,
                    'name' =>  $request->jenisbayar
                ]
            ),
            'customer_details' => array(
                'first_name' => $request->get('namestudent'),
                'last_name' => '',
                'email' => Auth::user()->email,
                'phone' => Auth::user()->nohp,
            ),
        );
        $student = Student::where('user_id', Auth::user()->id)->first();
        TempPayment::create([
            'student_id'=>$student->id,
            'namestudent'=>$request->get('namestudent'),
            'jenisbayar'=>$request->jenisbayar,
            'nominal'=>$request->nominal,
            'email' => Auth::user()->email,
            'nohp' => Auth::user()->nohp,
        ]);
        $temppayment = TempPayment::where('student_id', $student->id)->first();
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('siswa.payment.create', compact('params', 'student','snapToken','temppayment'));
    }

    public function create_payment(Request $request, $id)
    {
        $json = json_decode($request->get('json'));
        $student = Student::where('user_id', Auth::user()->id)->first();
        $temp = TempPayment::find($id);
        Payment::create([
            'student_id'=>$student->id,
            'transaction_status' => $json->transaction_status,
            'namestudent' => $temp->namestudent,
            'email' => $temp->email,
            'nohp' => $temp->nohp,
            'jenisbayar' => $temp->jenisbayar,
            'transaction_id' => $json->transaction_id,
            'order_id' => $json->order_id,
            'gross_amount' => $json->gross_amount,
            'payment_type' => $json->payment_type,
            'transaction_time' => $json->transaction_time,
            'status_message' => $json->status_message,
        ]);
        TempPayment::find($id)->delete();
        Toastr::success('Pembayaran Berhasil','success');
        return redirect()->route('payment.index');
    }

    // public function createpayment(Request $request)
    // {
    //     $student = Student::where('user_id', Auth::user()->id)->first();
    //     $validate = $request->validate([
    //         'namestudent'=>'required',
    //         'email'=>'required',
    //         'nohp'=>'required',
    //         'jenisbayar'=>'required',
    //         'nominal'=>'required',
    //     ]);
    //     TempPayment::create([
    //         'namestudent'=> $request->namestudent,
    //         'email'=> $request->email,
    //         'nohp'=> $request->nohp,
    //         'jenisbayar'=> $request->jenisbayar,
    //         'nominal'=> $request->nominal,
    //         'student_id'=>$student->id
    //     ]);
    //     Toastr::success('Pembayaran Berhasil dibuat','success');
    //     return redirect()->route('confirm');
    // }
    // public function confirm(Request $request)
    // {
    //     $student = Student::where('user_id', Auth::user()->id)->first();
    //     $payment = TempPayment::where('student_id', $student->id)->first();
    //     \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    //     \Midtrans\Config::$isProduction = false;
    //     \Midtrans\Config::$isSanitized = true;
    //     \Midtrans\Config::$is3ds = true;

    //     $params = array(
    //         'transaction_details' => array(
    //             'order_id' => rand(),
    //             'gross_amount' => $payment->nominal,
    //         ),
    //         'item_details' => array(
    //             [
    //                 'id' => 'a1',
    //                 'price' =>  $payment->nominal,
    //                 'quantity' => 1,
    //                 'name' =>  $payment->jenisbayar
    //             ]
    //         ),
    //         'customer_details' => array(
    //             'first_name' => $payment->namestudent,
    //             'last_name' => '',
    //             'email' => $payment->email,
    //             'phone' => $payment->nohp,
    //         ),
    //     );
    //     $snapToken = \Midtrans\Snap::getSnapToken($params);
    //     return view('siswa.payment.create', compact('params', 'payment','snapToken'));
    // }
}
