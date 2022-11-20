@extends('layouts.app')

@section('content')
<div class="col-lg-12 mb-2">
    <div class="card bd-gray-500">
        <div class="card-body">
          <h6 class="card-subtitle mb-2">Selamat datang di web PPDB SMA TELKOM BANDUNG Tahun Ajaran 2023-2024, Berikut Langkah-langkah pendaftaran Calon Siswa SMA TELKOM BANDUNG</h6>
          <ul class="list-group mb-2">
            <li class="list-group-item bg-primary text-white">Klik tombol Tambah Siswa Baru, Isi dengan nama calon siswa yang akan didaftarkan.</li>
            <li class="list-group-item bg-primary text-white">harap di isi data siswa dengan data sebenar-benarnya dan jika sudah terisi semua klik simpan permananen diakhir mengisi.</li>
          </ul>
          @if ($student==null)
          <a href="#modal1" class="btn btn-dark" data-toggle="modal">View Live Demo</a>
          @endif
          @include('siswa.modal.createstudent')
        </div>
    </div>
</div>
@if ($student==null)
    @else
    <div class="col-lg-12">
        <div class="card">
          <div class="card-header bd-b-0 pd-t-20 pd-lg-t-25 pd-l-20 pd-lg-l-25 d-flex flex-column flex-sm-row align-items-sm-start justify-content-sm-between">
            <div>
              <h6 class="mg-b-5">Biodata Calon Siswa</h6>
              <p class="tx-12 tx-color-03 mg-b-0">Audience to which the users belonged while on the current date range.</p>
            </div>
            <div class="btn-group mg-t-20 mg-sm-t-0">
            </div><!-- btn-group -->
          </div><!-- card-header -->
          <div class="card-body pd-lg-25">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Siswa</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Data Sekolah</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Data Orang Tua</a>
                </li>
              </ul>
              <div class="tab-content bd bd-gray-300 bd-t-0 pd-20" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  @include('siswa.biodata.datasiswa')
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <h6>Profile</h6>
                  <p>...</p>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <h6>Contact</h6>
                  <p>...</p>
                </div>
              </div>
          </div><!-- card-body -->
        </div><!-- card -->
    </div>
@endif
@endsection
