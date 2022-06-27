<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- third party css -->
        <link href="<?= BASEURL; ?>/assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="<?= BASEURL; ?>/assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="<?= BASEURL; ?>/assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="<?= BASEURL; ?>/assets/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <?php $this->view('templates/head-css') ?>

    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

        <!-- Begin page -->
        <div class="wrapper">
          <?php $this->view('templates/left-sidebar') ?>

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                <?php $this->view('templates/topbar') ?>

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Karyawan</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <?php Flasher::flash(); ?>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                      <div class="row mb-2">
                                          <!-- SignIn modal content -->
                                          <div id="modal-form-employee" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                              <div class="modal-dialog modal-lg">
                                                  <div class="modal-content">
                                                    <form class="needs-validation form-employee" action="<?= BASEURL; ?>/employee/create" method="post">
                                                      <input type="hidden" name="id" id="id" >

                                                      <div class="modal-header">
                                                          <h4 class="modal-title" id="standard-modalLabel">Tambah karyawan</h4>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <h4 class="header-title">Data akun</h4>
                                                        <div class="mb-3">
                                                          <div class="row">
                                                            <div class="col-md-6">
                                                              <label class="form-label" for="validationEmail">Email</label>
                                                              <input type="email" class="form-control" id="validationEmail" name="email" placeholder="Email" value="" required>
                                                              <div class="invalid-feedback">
                                                              Field ini tidak valid.
                                                              </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                              <label class="form-label" for="validationRole">Role</label>
                                                              <select class="form-select select2" required aria-label="select example" name="role" id="validationRole">
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
                                                        <h4 class="header-title">Data diri</h4>
                                                        <div class="mb-3">
                                                          <div class="row">
                                                            <div class="col-md-6">
                                                              <label class="form-label" for="validationFullname">Nama lengkap</label>
                                                              <input type="text" class="form-control" id="validationFullname" name="fullname" placeholder="Nama lengkap" value="" required>
                                                              <div class="invalid-feedback">
                                                                Field ini tidak valid.
                                                              </div>
                                                            </div>
                                                            <div class="col-md-6 position-relative">
                                                              <label class="form-label" for="validationDate" id="datepicker1">Tanggal Lahir</label>
                                                              <input type="text" class="form-control" id="validationDate" placeholder="Tanggal lahir" name="birthday" data-provide="datepicker" data-date-container="#datepicker1">
                                                              <div class="invalid-feedback">
                                                                Field ini tidak valid.
                                                              </div>
                                                            </div>
                                                          </div>  
                                                        </div>
                                                        <div class="mb-3" >
                                                          <div class="row">
                                                            <div class="col-md-6">
                                                              <label class="form-label" for="validationGender">Jenis kelamin</label>
                                                              <select class="form-select select2" required aria-label="select example" name="gender" id="validationGender">
                                                                <option value="" selected disabled hidden>Choose here</option>
                                                                <option value="pria">Laki laki</option>
                                                                <option value="wanita">Perempuan</option>
                                                              </select>
                                                              <div class="invalid-feedback">
                                                                Field ini tidak valid.
                                                              </div>                                                            
                                                            </div>
                                                            <div class="col-md-6">
                                                              <label class="form-label" for="validationPhone">No. Handphone</label>
                                                              <input type="text" class="form-control" id="validationPhone" name="phone" placeholder="No. Handphone" value="" required>
                                                              <div class="invalid-feedback">
                                                              Field ini tidak valid.
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="mb-3">
                                                          <div class="row">
                                                            <div class="col-md-6">
                                                              <label class="form-label" for="validationBloodType">Golongan darah</label>
                                                              <select class="form-select select2" required aria-label="select example" name="blood_type" id="validationBloodType">
                                                                <option value="" selected disabled hidden>Choose here</option>
                                                                <option value="A">A</option>
                                                                <option value="AB">AB</option>
                                                                <option value="B">B</option>
                                                                <option value="O">O</option>
                                                              </select>
                                                              <div class="invalid-feedback">
                                                                Field ini tidak valid.
                                                              </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                              <label class="form-label" for="validationMartialStatus">Status Pernikahan</label>
                                                              <select class="form-select select2" required aria-label="select example" name="marial_status" id="validationMartialStatus">
                                                                <option value="" selected disabled hidden>Choose here</option>
                                                                <option value="single">Single</option>
                                                                <option value="married">Sudah nikah</option>
                                                                <option value="widow">Janda</option>
                                                                <option value="widower">Duda</option>
                                                              </select>
                                                              <div class="invalid-feedback">
                                                                Field ini tidak valid.
                                                              </div>

                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="mb-3">
                                                          <div class="row">
                                                            <div class="col-md-6">
                                                              <label class="form-label" for="validationAgama">Agama</label>
                                                              <select class="form-select select2" required aria-label="select example" name="religion" id="validationAgama">
                                                                <option value="" selected disabled hidden>Choose here</option>
                                                                <option value="ISLAM">ISLAM</option>
                                                                <option value="PROTESTAN">PROTESTAN</option>
                                                                <option value="KATOLIK">KATOLIK</option>
                                                                <option value="HINDU">HINDU</option>
                                                                <option value="BUDHA">BUDHA</option>
                                                                <option value="KhONGHUCU">KhONGHUCU</option>
                                                              </select>
                                                              <div class="invalid-feedback">
                                                                Field ini tidak valid.
                                                              </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                              <label class="form-label" for="validationAddress">Alamat lengkap</label>
                                                              <textarea class="form-control" id="validationAddress" name="address" placeholder="Alamat lengkap" required></textarea>
                                                              <div class="invalid-feedback">
                                                                Field ini tidak valid.
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <h4 class="header-title">Data pekerjaan</h4>
                                                        <div class="mb-3">
                                                          <div class="row">
                                                            <div class="col-md-6">
                                                              <label class="form-label" for="validationNoID">Nomor ID</label>
                                                              <input type="text" class="form-control" id="validationNoID" name="employee_id" placeholder="Nomor ID" value="" required>
                                                              <div class="invalid-feedback">
                                                                Field ini tidak valid.
                                                              </div>
                                                            </div>
                                                            <div class="col-md-6 position-relative">
                                                              <label class="form-label" for="validationJoinDate" id="datepicker2">Tanggal Bergabung</label>
                                                              <input type="text" class="form-control" placeholder="Tanggal bergabung" id="validationJoinDate" name="join_date" data-provide="datepicker" data-date-container="#datepicker2">
                                                              <div class="invalid-feedback">
                                                                Field ini tidak valid.
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="mb-3">
                                                          <div class="row">
                                                            <div class="col-md-6">
                                                              <label class="form-label" for="validationJobLevel">Level pekerjaan</label>
                                                              <select class="form-select select2" required aria-label="select example" name="job_level" id="validationJobLevel">
                                                                <option value="" selected disabled hidden>Choose here</option>
                                                                <option value="Junior">Junior</option>
                                                                <option value="Mid">Mid</option>
                                                                <option value="Senior">Senior</option>
                                                              </select>
                                                              <div class="invalid-feedback">
                                                                Field ini tidak valid.
                                                              </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                              <label class="form-label" for="validationJobPosition">Posisi Pekerjaan</label>
                                                              <select class="form-select select2" required aria-label="select example" name="job_position" id="validationJobPosition">
                                                                <option value="" selected disabled hidden>Choose here</option>
                                                                <?php foreach($data['job_positions'] as $usr => $index) : ?>
                                                                  <option value="<?= $data['job_positions'][$usr]['id'] ?>"><?= $data['job_positions'][$usr]['name'] ?></option>
                                                                <?php endforeach; ?>
                                                              </select>
                                                              <div class="invalid-feedback">
                                                                Field ini tidak valid.
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button class="btn btn-primary" type="submit">Tambah</button>
                                                      </div>
                                                    </form>
                                                  </div><!-- /.modal-content -->
                                              </div><!-- /.modal-dialog -->
                                          </div><!-- /.modal -->
                                          <div class="col-sm-4">
                                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-form-employee"><i class="mdi mdi-plus-circle me-2"></i>Tambah Karyawan</a>
                                          </div>
                                          <div class="col-sm-8">
                                              <div class="text-sm-end">
                                                  <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button>
                                                  <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                                  <button type="button" class="btn btn-light mb-2">Export</button>
                                              </div>
                                          </div><!-- end col-->
                                      </div>
                                                           
                                      <table id="alternative-page-datatable" class="table dt-responsive nowrap w-100">
                                          <thead>
                                              <tr>
                                                  <th>ID</th>
                                                  <th>Fullname</th>
                                                  <th>Email</th>
                                                  <th>Posisi Pekerjaan</th>
                                                  <th>Posisi Level</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                      
                                      
                                          <tbody>
                                            <?php foreach($data['employees'] as $usr => $index) : ?>
                                              <tr>
                                                <td><?= $data['employees'][$usr]['id'] ?></td>
                                                <td><?= $data['employees'][$usr]['fullname'] ?></td>
                                                <td><?= $data['employees'][$usr]['email'] ?></td>
                                                <td><?= $data['employees'][$usr]['job_position'] ?></td>
                                                <td><?= $data['employees'][$usr]['job_level'] ?></td>
                                                <td>
                                                  <a 
                                                    class="action-icon modalUbahEmployee" 
                                                    role="button" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modal-form-employee"
                                                    data-id="<?= $data['employees'][$usr]['id']; ?>"
                                                  > <i class="mdi mdi-square-edit-outline"></i></a>
                                                </td>
                                              </tr>
                                            <?php endforeach; ?>
                                          </tbody>
                                      </table>                                           
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <?php $this->view('templates/footer') ?>

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->




        <!-- bundle -->
        <script src="<?= BASEURL; ?>/assets/js/vendor.min.js"></script>
        <script src="<?= BASEURL; ?>/assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="assets/js/vendor/dataTables.bootstrap5.js"></script>
        <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
        <script src="assets/js/vendor/responsive.bootstrap5.min.js"></script>
        <script src="assets/js/vendor/dataTables.buttons.min.js"></script>
        <script src="assets/js/vendor/buttons.bootstrap5.min.js"></script>
        <script src="assets/js/vendor/buttons.html5.min.js"></script>
        <script src="assets/js/vendor/buttons.flash.min.js"></script>
        <script src="assets/js/vendor/buttons.print.min.js"></script>
        <script src="assets/js/vendor/dataTables.keyTable.min.js"></script>
        <script src="assets/js/vendor/dataTables.select.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="assets/js/pages/demo.datatable-init.js"></script>
        <script src="<?= BASEURL; ?>/assets/js/custom.js"></script>
        <!-- end demo js-->

    </body>
</html>
