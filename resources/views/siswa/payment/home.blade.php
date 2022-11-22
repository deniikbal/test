@extends('layouts.app')
@section('content')
<div class="col-lg-12 mb-2">
    <div class="card bd-gray-500">
        <div class="card-body">
          <h6 class="card-subtitle mb-2">Selamat datang di web PPDB SMA TELKOM BANDUNG Tahun Ajaran 2023-2024, Berikut Langkah-langkah untuk melakukan pembayaran PPDB SMA TELKOM BANDUNG</h6>
          <ul class="list-group mb-2">
            <li class="list-group-item bg-primary text-white">Klik tombol Tambah Pembayaran, Isi dengan nominal pembayaran.</li>
            <li class="list-group-item bg-primary text-white">harap di isi data.</li>
          </ul>
          <a href="#modal1" class="btn btn-danger" data-toggle="modal">Tambah Pembayaran</a>
        </div>
        @include('siswa.modal.createpayment')
    </div>
</div>
@foreach ($payment as $pay)
    <div class="col-sm-6 col-lg-3">
        <div class="card card-body bd-gray-500 {{ $countpayment >= 5 ? 'mb-2' : '' }}">
            @if ($pay->jenisbayar=='tp')
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold tx-primary mg-b-8">Titipan Pembayaran</h6>
            @else
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-warning tx-semibold mg-b-8">Daftar Ulang</h6>
            @endif
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">Rp. {{ $pay->gross_amount }}</h3>
          </div>
          <div>
            <p class="mb-1">Order Id : {{ $pay->order_id }}</p>
            @if ($pay->transaction_status=='pending')
            <p class="mb-1">Status : <span class="badge badge-danger">{{ Str::upper($pay->transaction_status) }}</span></p>
            @elseif ($pay->transaction_status=='settlement')
            <p class="mb-1">Status : <span class="badge bg-success">{{ Str::upper($pay->transaction_status) }}</span></p>
            @else
            <p class="mb-1">Status : <span class="badge badge-dark">{{ Str::upper($pay->transaction_status) }}</span></p>
            @endif

            <p class="mb-1">Type Pembayaran : {{ $pay->payment_type }}</p>
            <p class="mb-1 badge badge-warning">{{ $pay->status_message }}</p>
            <p class="mb-1 badge badge-info">{{ $pay->transaction_time }}</p>
            <div style="display: inline-block">
                <form action="{{ route('verifikasi', $pay->id) }}" method="POST" value="Go"
                    onclick="return confirm('Apakah kamu yakin mau verifikasi Pembayaran?')">
                    @csrf
                    <button class="btn btn-info btn-sm" type="submit">
                        Verifikasi Pembayaran
                    </button>
                </form>
            </div>
          </div>
        </div>
    </div><!-- col -->
@endforeach


@endsection
