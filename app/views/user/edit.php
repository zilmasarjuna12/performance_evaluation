<form class="needs-validation form-user" action="<?= BASEURL; ?>/user/edit" method="post">
  <input type="hidden" name="id" id="id" >

  <div class="modal-header">
      <h4 class="modal-title" id="standard-modalLabel">Edit pengguna</h4>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
  </div>
  <div class="modal-body">
    <h4 class="header-title">Data akun</h4>
    <div class="mb-3">
      <div class="row">
        <div class="mb-3">
          <div class="row">
            <div class="col-md-6">
              <label class="form-label" for="validationEmailEdit">Email</label>
              <input type="email" class="form-control" id="validationEmailEdit" name="email" placeholder="Email" value="" required>
              <div class="invalid-feedback">
              Field ini tidak valid.
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label" for="validationFullnameEdit">Nama lengkap</label>
              <input type="text" class="form-control" id="validationFullnameEdit" name="fullname" placeholder="Nama lengkap" value="" required>
              <div class="invalid-feedback">
                Field ini tidak valid.
              </div>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <div class="row">
            <div class="col-md-6">
              <label class="form-label" for="validationJobPositionEdit">Posisi Pekerjaan</label>
              <select class="form-select select2" required aria-label="select example" name="job_position" id="validationJobPositionEdit">
                <option value="" selected disabled hidden>Choose here</option>
                <?php foreach($data['job_positions'] as $usr => $index) : ?>
                  <option value="<?= $data['job_positions'][$usr]['id'] ?>"><?= $data['job_positions'][$usr]['name'] ?></option>
                <?php endforeach; ?>
              </select>
              <div class="invalid-feedback">
                Field ini tidak valid.
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label" for="validationRoleEdit">Role</label>
              <select class="form-select select2" required aria-label="select example" name="role" id="validationRoleEdit">
                <option value="" selected disabled hidden>Choose here</option>
                <option value="admin">Admin</option>
                <option value="hrd">HRD</option>
                <option value="approval">Approval</option>
                <option value="karyawan">Karyawan</option>
              </select>
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