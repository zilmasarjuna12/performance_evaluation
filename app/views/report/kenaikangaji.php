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
                                    <h4 class="page-title">Report kenaikan gaji</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <?php Flasher::flash(); ?>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="row mb-2">
                                  <div class="col-xl-8">
                                      <form class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between" action="<?= BASEURL; ?>/report/evaluasibyperiode/">
                                          <div class="col-auto">
                                              <div class="d-flex align-items-center">
                                                  <label for="status-select" class="me-2">Periode</label>
                                                  <select class="form-select select2" required aria-label="select example" name="periode">
                                                    <?php foreach($data['periodes'] as $usr => $index) : ?>
                                                      <option value="<?= $data['periodes'][$usr]['id'] ?>" <?php if($data['periode']['id'] == $data['periodes'][$usr]['id']) echo 'selected' ?>><?= $data['periodes'][$usr]['name'] ?></option>
                                                    <?php endforeach; ?>
                                                  </select>
                                              </div>
                                          </div>
                                      </form>                            
                                  </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                      <div class="row mb-2">
                                          <!-- SignIn modal content -->
                                          <div id="modal-detail-kenaikangaji" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                              <div class="modal-dialog modal-lg">
                                                  
                                                  <div class="modal-content">
                                                    <?php $this->view('report/modal_kenaikangaji') ?>
                                                  </div><!-- /.modal-content -->
                                              </div><!-- /.modal-dialog -->
                                          </div><!-- /.modal -->
                                      </div>
                                          
                                      <table id="basic-datatable" class="table dt-responsive nowrap w-100 table-centered">
                                          <thead>
                                              <tr>
                                                  <th>ID</th>
                                                  <th>Name</th>
                                                  <th>Status</th>
                                                  <th>Delivery</th>
                                                  <th>Execution</th>
                                                  <th>Teamwork</th>
                                                  <th>Innovation</th>
                                                  <th>Keterangan</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                      
                                          <tbody>
                                            <?php foreach($data['users_penilaian'] as $usr => $index) : ?>
                                              <tr>
                                                <td><?= $usr+1; ?></td>
                                                <td><?= $data['users_penilaian'][$usr]['user']['fullname'] ?></td>
                                                <td>
                                                  <?php if($data['users_penilaian'][$usr]['penilaian'] == ""): ?>
                                                      <i class="mdi mdi-circle text-danger"></i> Belum input penilaian
                                                  <?php elseif($data['users_penilaian'][$usr]['penilaian']['status_penilaian'] == "submitted"): ?>
                                                      <i class="mdi mdi-circle text-warning"></i> Perlu persetujuan leader
                                                  <?php elseif($data['users_penilaian'][$usr]['penilaian']['status_penilaian'] == "approved"): ?>
                                                      <i class="mdi mdi-circle text-info"></i> Selesai
                                                  <?php endif ?>
                                                </td>
                                                <td><?php if ($data['users_penilaian'][$usr]['penilaian'] != "") echo $data['users_penilaian'][$usr]['penilaian']['delivery_time'] ?></td>
                                                <td><?php if ($data['users_penilaian'][$usr]['penilaian'] != "") echo $data['users_penilaian'][$usr]['penilaian']['execution'] ?></td>
                                                <td><?php if ($data['users_penilaian'][$usr]['penilaian'] != "") echo $data['users_penilaian'][$usr]['penilaian']['team_work'] ?></td>
                                                <td><?php if ($data['users_penilaian'][$usr]['penilaian'] != "") echo $data['users_penilaian'][$usr]['penilaian']['innovation'] ?></td>
                                                <td>
                                                  <?php if ($data['users_penilaian'][$usr]['penilaian'] != ""): ?>
                                                    <?php if($data['users_penilaian'][$usr]['penilaian']['naik_gaji'] == "Yes"): ?>
                                                      Direkomendasikan naik gaji
                                                    <?php else: ?>
                                                      Direkomendasikan tidak naik gaji
                                                    <?php endif ?>
                                                  <? endif ?>
                                                </td>
                                                <td>

                                                  <?php if ($data['users_penilaian'][$usr]['penilaian'] != ""): ?>
                                                      <a 
                                                          class="btn btn-info btn-sm modalDetailKenaikanGaji" 
                                                          role="button" 
                                                          data-bs-toggle="modal" 
                                                          data-bs-target="#modal-detail-kenaikangaji"
                                                          data-id="<?= $data['users_penilaian'][$usr]['penilaian']['penilaian_id']; ?>"
                                                          >Analisa</a>
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
        <script src="<?= BASEURL; ?>/assets/js/custom-report.js"></script>

        <!-- third party js -->
        <script src="<?= BASEURL; ?>/assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="<?= BASEURL; ?>/assets/js/vendor/dataTables.bootstrap5.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="<?= BASEURL; ?>/assets/js/pages/demo.datatable-init.js"></script>
        <!-- end demo js-->

    </body>
</html>
