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
                                    <h4 class="page-title">Pengguna</h4>
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
                                          <div id="modal-form-user" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                              <div class="modal-dialog modal-lg">
                                                  <div class="modal-content">
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
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button class="btn btn-primary" type="submit">Edit</button>
                                                      </div>
                                                    </form>
                                                  </div><!-- /.modal-content -->
                                              </div><!-- /.modal-dialog -->
                                          </div><!-- /.modal -->
                                      </div>
                                                           
                                      <table id="alternative-page-datatable" class="table dt-responsive nowrap w-100">
                                          <thead>
                                              <tr>
                                                  <th>ID</th>
                                                  <th>Email</th>
                                                  <th>Name</th>
                                                  <th>Pekerjaan</th>
                                                  <th>Role</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                      
                                      
                                          <tbody>
                                            <?php foreach($data['users'] as $usr => $index) : ?>
                                              <tr>
                                                <td><?= $data['users'][$usr]['id'] ?></td>
                                                <td><?= $data['users'][$usr]['email'] ?></td>
                                                <td><?= $data['users'][$usr]['fullname'] ?></td>
                                                <td><?= $data['users'][$usr]['job'] ?></td>
                                                <td><?= $data['users'][$usr]['role'] ?></td>
                                                <td>
                                                  <a 
                                                    class="action-icon modalUbahUser" 
                                                    role="button" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modal-form-user"
                                                    data-id="<?= $data['users'][$usr]['id']; ?>"
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
        <script src="<?= BASEURL; ?>/assets/js/custom-user.js"></script>
        <!-- end demo js-->

    </body>
</html>
