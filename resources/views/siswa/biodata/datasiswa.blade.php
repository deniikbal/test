<form>
    <div class="form-row">
      <div class="form-group col-md-6 mb-2">
        <label for="inputEmail4">Nama Lengkap</label>
        <input type="text" name="namestudent" class="form-control" value="{{ $student->namestudent }}">
      </div>
      <div class="form-group col-md-6 mb-2">
        <label for="inputPassword4">Password</label>
        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
      </div>
    </div>
    <div class="form-group mb-2">
      <label for="inputAddress">Address</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="form-group">
      <label for="inputAddress2">Address 2</label>
      <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
    </div>
    <div class="form-row">
      <div class="form-group col-md-5">
        <label>Birthday</label>
        <select class="custom-select">
          ...
        </select>
      </div>
      <div class="form-group col-md-3 d-flex align-items-end">
        <select class="custom-select">
          ...
        </select>
      </div>
      <div class="form-group col-md-4 d-flex align-items-end">
        <select class="custom-select">
          ...
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="customCheck1">
        <label class="custom-control-label" for="customCheck1">Agree with Terms of Use and Privacy Policy</label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit Form</button>
  </form>
