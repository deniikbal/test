@extends('layouts.app')

@section('content')
@php
    $temp = App\Models\TempPayment::where('student_id', $student->id)->first();
@endphp
 <div class="col-lg-8 mb-2">
        <div class="card bd-gray-500">
            <div class="card-body">
              <h6 class="card-subtitle mb-2">Payment Detail</h6>
                <div class="p-3" style="background-color: #eee;">
                  <div class="d-flex justify-content-between mt-2">
                    <span>Nama Calon Siswa</span> <span>{{ $temp->namestudent }}</span>
                  </div>
                  <div class="d-flex justify-content-between mt-2">
                    <span>Email</span> <span>{{ $temp->email }}</span>
                  </div>
                  <div class="d-flex justify-content-between mt-2">
                    <span>No Hp</span> <span>{{ $temp->nohp }}</span>
                  </div>
                  <div class="d-flex justify-content-between mt-2">
                    <span>Jenis Pembayaran</span> <span>{{ $temp->jenisbayar }}</span>
                  </div>
                  <hr />
                  <div class="d-flex justify-content-between mt-2">
                    <span>Nominal Pembayaran</span> <span> Rp. {{ $temp->nominal }}</span>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card bd-gray-500">
            <div class="card-body">
              <h6 class="card-subtitle mb-2">Perhatikan Data-data Pembayaran</h6>
              <button class="btn btn-danger" id="pay-button">Bayar</button>
            </div>
        </div>
    </div>

    <form action="" id="submit_form" method="POST">
    @csrf
    <input type="hidden" name="json" id="json_callback">
</form>

<script type="text/javascript">
  // For example trigger on button clicked, or any time you need
  var payButton = document.getElementById('pay-button');
  payButton.addEventListener('click', function () {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay('{{$snapToken}}', {
      onSuccess: function(result){
        /* You may add your own implementation here */
        console.log(result);
        send_response_to_form(result);
      },
      onPending: function(result){
        /* You may add your own implementation here */
        console.log(result);
        send_response_to_form(result);
      },
      onError: function(result){
        /* You may add your own implementation here */
        console.log(result);
        send_response_to_form(result);
      },
      onClose: function(){
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');
      }
    })
  });

  function send_response_to_form(result){
    document.getElementById('json_callback').value = JSON.stringify(result);
    $('#submit_form').submit();
  }
</script>
@endsection
