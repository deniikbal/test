<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function createstudent(Request $request)
    {
        Student::create([
            'user_id'=>auth()->id(),
            'nodaftar'=> 'SMATEL2022',
            'namestudent'=>$request->namestudent,
            'jenis_kelamin'=>$request->jenis_kelamin,
        ]);
        Toastr::success('Pendaftaran Berhasil', 'Berhasil');
        return back();
    }
}
