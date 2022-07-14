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
                                    <h4 class="page-title">Hasil penilaian</h4>
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
                                          <!-- StartModal modal content -->
                                          <div id="modal-show-penilaian" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                              <div class="modal-dialog modal-lg">
                                                  
                                                  <div class="modal-content">
                                                    <?php $this->view('penilaian/detailhasil') ?>
                                                  </div><!-- /.modal-content -->
                                              </div><!-- /.modal-dialog -->
                                          </div><!-- /.modal -->

                                          <!-- EditModal modal content -->
                                          <div id="modal-form-edit-penilaian" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                  <th>Tahun</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                      
                                      
                                          <tbody>
                                            <?php foreach($data['periodes_penilaian'] as $usr => $index) : ?>
                                              <tr>
                                                <td><?= $data['periodes_penilaian'][$usr]['periode']['id'] ?></td>
                                                <td><?= $data['periodes_penilaian'][$usr]['periode']['name'] ?></td>
                                                <td>

                                                    <?php if($data['periodes_penilaian'][$usr]['penilaian'] == ""): ?>
                                                        <button 
                                                            type="button" 
                                                            class="btn btn-info btn-sm modalStartPenilaian"
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#modal-form-start-penilaian"
                                                            data-periodeId="<?= $data['periodes_penilaian'][$usr]['periode']['id']; ?>"
                                                        >Mulai</button>
                                                    <?php else: ?>
                                                        <a 
                                                        class="action-icon modalShowPenilaian" 
                                                        role="button" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#modal-show-penilaian"
                                                        data-id="<?= $data['periodes_penilaian'][$usr]['penilaian']['id']; ?>"
                                                        > <i class="mdi mdi-eye"></i></a>
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
        <script src="<?= BASEURL; ?>/assets/js/custom-penilaian.js"></script>

        <!-- third party js -->
        <script src="<?= BASEURL; ?>/assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="<?= BASEURL; ?>/assets/js/vendor/dataTables.bootstrap5.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="<?= BASEURL; ?>/assets/js/pages/demo.datatable-init.js"></script>
        <!-- end demo js-->

    </body>
</html>
