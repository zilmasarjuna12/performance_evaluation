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
                                              <div class="modal-dialog modal-sm">
                                                  <div class="modal-content">
                                                    <?php $this->view('periode/create', $data) ?>
                                                  </div><!-- /.modal-content -->
                                              </div><!-- /.modal-dialog -->
                                          </div><!-- /.modal -->
                                      
                                          <div class="col-sm-4">
                                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-form-user"><i class="mdi mdi-plus-circle me-2"></i>Tambah periode penilaian</a>
                                          </div>
                                      </div>
                                                           
                                      <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                          <thead>
                                              <tr>
                                                  <th>ID</th>
                                                  <th>Name</th>
                                                  <th>Status</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                      
                                      
                                          <tbody>
                                            <?php foreach($data['periodes'] as $usr => $index) : ?>
                                              <tr>
                                                <td><?= $data['periodes'][$usr]['id'] ?></td>
                                                <td><?= $data['periodes'][$usr]['name'] ?></td>
                                                <td>
                                                  <?php if ($data['periodes'][$usr]['is_active'] == 1 && $data['periodes'][$usr]['is_published'] == 0): ?>
                                                    <i class="mdi mdi-circle text-info"></i> Sedang berlangsung
                                                  <?php elseif($data['periodes'][$usr]['is_active'] == 0 && $data['periodes'][$usr]['is_published'] == 0): ?>
                                                    <i class="mdi mdi-circle text-danger"></i> Tidak aktif
                                                  <?php elseif($data['periodes'][$usr]['is_active'] == 1 && $data['periodes'][$usr]['is_published'] == 1): ?>
                                                    <i class="mdi mdi-circle text-success"></i> Sudah diarsipkan
                                                  <?php endif ?>
                                                </td>
                                                <td>
                                                  <?php if ($data['periodes'][$usr]['is_active'] == 1 && $data['periodes'][$usr]['is_published'] == 0): ?>
                                                    <a 
                                                      class="btn btn-success btn-sm" 
                                                      href="<?= BASEURL; ?>/periode/publish/<?= $data['periodes'][$usr]['id'] ?>"
                                                    > 
                                                      Terbitkan
                                                    </a>
                                                  <?php elseif($data['periodes'][$usr]['is_active'] == 0 && $data['periodes'][$usr]['is_published'] == 0): ?>
                                                    <a 
                                                      class="btn btn-info btn-sm" 
                                                      href="<?= BASEURL; ?>/periode/start/<?= $data['periodes'][$usr]['id'] ?>"
                                                    > 
                                                      Mulai
                                                    </a>
                                                  <?php elseif($data['periodes'][$usr]['is_active'] == 1 && $data['periodes'][$usr]['is_published'] == 1): ?>
                                                  <?php endif ?>
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
        <script src="<?= BASEURL; ?>/assets/js/custom-user.js"></script>

        <!-- third party js -->
        <script src="<?= BASEURL; ?>/assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="<?= BASEURL; ?>/assets/js/vendor/dataTables.bootstrap5.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="<?= BASEURL; ?>/assets/js/pages/demo.datatable-init.js"></script>
        <!-- end demo js-->

    </body>
</html>
