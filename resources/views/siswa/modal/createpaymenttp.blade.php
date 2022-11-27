<div class="modal fade" id="createpaymenttp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content tx-14">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Create Payment</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('payment.create') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $student->id }}">
                <div class="form-group mb-2">
                  <label for="formGroupExampleInput" class="d-block">Nama Calon Siswa</label>
                  <input type="text" name="namestudent" class="form-control @error('namestudent') is-invalid @enderror"
                  placeholder="Enter your full name" value="{{ $student->namestudent }}">
                  @error('namestudent')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="formGroupExampleInput" class="d-block">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Enter your full email" value="{{ Auth::user()->email }}">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
                  <div class="form-group mb-2">
                    <label for="formGroupExampleInput" class="d-block">No Hp</label>
                    <input type="text" name="nohp" class="form-control @error('nohp') is-invalid @enderror"
                    placeholder="Enter your full nohp" value="{{ Auth::user()->nohp }}">
                    @error('nohp')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
                  <div class="form-group mb-2">
                    <label for="formGroupExampleInput2" class="d-block">Jenis Pembayaran</label>
                    <select class="custom-select @error('jenisbayar') is-invalid @enderror" name="jenisbayar">
                        <option value="">--Pilih--</option>
                        <option value="tp">Titipan Pembayaran</option>
                    </select>
                    @error('jenisbayar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group mb-2">
                    <label for="formGroupExampleInput" class="d-block">Nominal Pembayaran</label>
                    <input type="text" name="nominal" class="form-control @error('nominal') is-invalid @enderror"
                    placeholder="Nominal Pembayaran" value="300000">
                    @error('nominal')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger tx-13">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
