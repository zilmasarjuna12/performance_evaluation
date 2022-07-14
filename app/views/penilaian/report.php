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
                                    <h4 class="page-title">Penilaian karyawan</h4>
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
                                          <div id="modal-form-penilaian" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                              <div class="modal-dialog modal-lg">
                                                  
                                                  <div class="modal-content">
                                                    <?php $this->view('penilaian/edit') ?>
                                                  </div><!-- /.modal-content -->
                                              </div><!-- /.modal-dialog -->
                                          </div><!-- /.modal -->
                                      </div>
                                                           
                                      <table id="basic-datatable" class="table dt-responsive nowrap w-100 table-centered">
                                          <thead>
                                              <tr>
                                                  <th>ID</th>
                                                  <th>Email</th>
                                                  <th>Name</th>
                                                  <th>Pekerjaan</th>
                                                  <th>Process</th>
                                                  <th>Status</th>
                                                  <th>Naik gaji</th>
                                                  <th>Klasifikasi</th>
                                              </tr>
                                          </thead>
                                      
                                      
                                          <tbody>
                                            <?php foreach($data['users'] as $usr => $index) : ?>
                                              <tr>
                                                <td><?= $data['users'][$usr]['user_id'] ?></td>
                                                <td><?= $data['users'][$usr]['email'] ?></td>
                                                <td><?= $data['users'][$usr]['fullname'] ?></td>
                                                <td><?= $data['users'][$usr]['job'] ?></td>
                                                <td>
                                                  <div class="progress progress-sm">
                                                    <?php if ($data['users'][$usr]['periode_id'] == '' && $data['users'][$usr]['approved_by'] == '') echo '<div class="progress-bar progress-lg bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>' ?>
                                                    <?php if ($data['users'][$usr]['periode_id'] != '' && $data['users'][$usr]['approved_by'] == '') echo '<div class="progress-bar progress-lg bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>' ?>
                                                    <?php if ($data['users'][$usr]['periode_id'] != '' && $data['users'][$usr]['approved_by'] != '') echo '<div class="progress-bar progress-lg bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>' ?>
                                                  </div>
                                                </td>
                                                <td>
                                                  <?php if ($data['users'][$usr]['periode_id'] == '' && $data['users'][$usr]['approved_by'] == '') echo '<i class="mdi mdi-circle text-danger"></i> Perlu diisi karyawan' ?>
                                                  <?php if ($data['users'][$usr]['periode_id'] != '' && $data['users'][$usr]['approved_by'] == '') echo '<i class="mdi mdi-circle text-warning"></i> Perlu persetujuan leader' ?>
                                                  <?php if ($data['users'][$usr]['periode_id'] != '' && $data['users'][$usr]['approved_by'] != '') echo '<i class="mdi mdi-circle text-info"></i> Selesai' ?>
                                                </td>
                                                <td><?= $data['users'][$usr]['naik_gaji'] ?></td>
                                                <td><?= $data['users'][$usr]['classification'] ?></td>
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
        <script src="<?= BASEURL; ?>/assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="<?= BASEURL; ?>/assets/js/vendor/dataTables.bootstrap5.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="<?= BASEURL; ?>/assets/js/pages/demo.datatable-init.js"></script>
        <!-- end demo js-->

    </body>
</html>
