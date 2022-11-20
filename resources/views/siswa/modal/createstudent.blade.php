<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content tx-14">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Create Student</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('create.student') }}">
                @csrf
                <div class="form-group mb-2">
                  <label for="formGroupExampleInput" class="d-block">Nama Calon Siswa</label>
                  <input type="text" name="namestudent" class="form-control @error('namestudent') is-invalid @enderror"
                  placeholder="Enter your full name">
                  @error('namestudent')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                  <label for="formGroupExampleInput2" class="d-block">Jenis Kelamin</label>
                  <select class="custom-select @error('namestudent') is-invalid @enderror" name="jenis_kelamin">
                    <option value="">--Pilih--</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                  </select>
                  @error('jenis_kelamin')
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
