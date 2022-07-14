<form class="needs-validation form-user" action="<?= BASEURL; ?>/periode/add" method="post">
  <input type="hidden" name="id" id="id" >

  <div class="modal-header">
      <h4 class="modal-title" id="standard-modalLabel">Tambah periode</h4>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
  </div>
  <div class="modal-body">
    <h4 class="header-title">Data akun</h4>
    <div class="mb-3">
      <div class="row">
        <div class="mb-3">
          <div class="row">
            <div class="col-md-12">
              <label class="form-label" for="validationName">Nama</label>
              <input type="text" class="form-control" id="validationName" name="name" placeholder="Nama" value="" required>
              <div class="invalid-feedback">
              Field ini tidak valid.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
    <button class="btn btn-primary" type="submit">Submit</button>
  </div>
</form>