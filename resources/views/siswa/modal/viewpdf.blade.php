<div class="modal fade" id="viewpdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content tx-14">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Create Payment</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{ $pay->pdf_url }}
            <embed src="https://app.sandbox.midtrans.com/snap/v1/transactions/355e6ca4-db09-48c2-a88a-c5a8d1059016/pdf" frameborder="0" width="100%" height="400px">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger tx-13">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
