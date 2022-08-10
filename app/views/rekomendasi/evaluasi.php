<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Tasks | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= BASEURL; ?>/assets/images/favicon.ico">

        <!-- Quill css -->
        <link href="<?= BASEURL; ?>/assets/css/vendor/quill.bubble.css" rel="stylesheet" type="text/css" />
        <link href="<?= BASEURL; ?>/assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
        <link href="<?= BASEURL; ?>/assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <?php $this->view('templates/head-css') ?>
        <link href="<?= BASEURL; ?>/assets/css/custom.css" rel="stylesheet" type="text/css" />


    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <?php $this->view('templates/left-sidebar') ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <?php $this->view('templates/topbar') ?>


                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xxl-12">
                                <!-- start page title -->
                                <div class="page-title-box">
                                  <div class="page-title">
                                    <div class="row">
                                      <div class="col-md-4">
                                        <h4 class="page-title">Evaluasi</h4>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                <!-- end page title -->

                                <!-- tasks panel -->
                                <div class="mt-2">
                                    <h5 class="m-0 pb-2">
                                        <a class="text-dark" data-bs-toggle="collapse" href="#todayTasks" role="button" aria-expanded="false" aria-controls="todayTasks">
                                            <i class='uil uil-angle-down font-18'></i>Dataset (<?= $data['jumlah_dataset']; ?>)</span>
                                        </a>

                                    </h5>

                                    <div class="collapse show" id="todayTasks">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div class="row mb-2">
                                                  <div class="col-sm-8">
                                                    <form action="<?= BASEURL; ?>/rekomendasi/upload_csv_evaluasi" method="POST" id="formUpload" enctype="multipart/form-data">
                                                        <input type="file" name="file" id="file" style="display:none;" />
                                                        <button type="button" id="buttonUpload" class="btn btn-success mb-2">Import (csv)</button>
                                                    </form>
                                                  </div><!-- end col-->
                                                </div>
                                                <!-- task -->
                                                
                                                <table class="table table-centered mb-0">
                                                  <thead>
                                                      <tr>
                                                          <th>ID</th>
                                                          <th>Email</th>
                                                          <th>Nama Lengkap</th>
                                                          <th>Posisi Pekerjaan</th>
                                                          <th>Delivery Time</th>
                                                          <th>Execution</th>
                                                          <th>Team Work</th>
                                                          <th>Innovation</th>
                                                          <th>Klasifikasi</th>
                                                      </tr>
                                                  </thead>

                                              
                                                  <tbody>
                                                      <tr class="text-center">
                                                          <td></td>
                                                          <td></td>
                                                          <td></td>
                                                          <td></td>
                                                          <td colspan="4" class="bg-green">Feature</td>
                                                          <td class="bg-red">Label</td>
                                                      </tr>
                                                    <?php foreach($data['datasets'] as $usr => $index) : ?>
                                                        <tr>
                                                            <td><?= $usr+1 ?></td>
                                                            <td><?= $data['datasets'][$usr]['email'] ?></td>
                                                            <td><?= $data['datasets'][$usr]['fullname'] ?></td>
                                                            <td><?= $data['datasets'][$usr]['job_position'] ?></td>
                                                            <td><?= $data['datasets'][$usr]['delivery_time'] ?></td>
                                                            <td><?= $data['datasets'][$usr]['execution'] ?></td>
                                                            <td><?= $data['datasets'][$usr]['team_work'] ?></td>
                                                            <td><?= $data['datasets'][$usr]['innovation'] ?></td>
                                                            <td><?= $data['datasets'][$usr]['penilaian'] ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                  </tbody>
                                                </table>   
    
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card -->
                                    </div> <!-- end .collapse-->
                                </div> <!-- end .mt-2-->

                                <!-- upcoming tasks -->
                                <div class="mt-4">

                                    <h5 class="m-0 pb-2">
                                        <a class="text-dark" data-bs-toggle="collapse" href="#upcomingTasks" role="button" aria-expanded="false" aria-controls="upcomingTasks">
                                            <i class='uil uil-angle-down font-18'></i>Pemodelan (Naive Bayes)</span>
                                        </a>
                                    </h5>

                                    <div class="collapse show" id="upcomingTasks">
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table table-centered mb-0">
                                                  <thead>
                                                      <tr>
                                                          <th>ID</th>
                                                          <th>Email</th>
                                                          <th>Nama Lengkap</th>
                                                          <th>Posisi Pekerjaan</th>
                                                          <th>Delivery Time</th>
                                                          <th>Execution</th>
                                                          <th>Team Work</th>
                                                          <th>Innovation</th>
                                                          <th>Klasifikasi</th>
                                                      </tr>
                                                  </thead>

                                              
                                                  <tbody>
                                                      <tr class="text-center">
                                                          <td colspan="9"class="bg-green">Data Training</td>
                                                      </tr>
                                                    <?php foreach($data['datasets_traning'] as $usr => $index) : ?>
                                                        <tr>
                                                            <td><?= $usr+1 ?></td>
                                                            <td><?= $data['datasets_traning'][$usr]['email'] ?></td>
                                                            <td><?= $data['datasets_traning'][$usr]['fullname'] ?></td>
                                                            <td><?= $data['datasets_traning'][$usr]['job_position'] ?></td>
                                                            <td><?= $data['datasets_traning'][$usr]['delivery_time'] ?></td>
                                                            <td><?= $data['datasets_traning'][$usr]['execution'] ?></td>
                                                            <td><?= $data['datasets_traning'][$usr]['team_work'] ?></td>
                                                            <td><?= $data['datasets_traning'][$usr]['innovation'] ?></td>
                                                            <td><?= $data['datasets_traning'][$usr]['penilaian'] ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                  </tbody>
                                                </table>   
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card -->
                                        <div class="card">
                                            <div class="card-body">
                                              <table class="table table-centered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Feature</th>
                                                        <th>Nilai</th>
                                                        <th>Sangat Baik</th>
                                                        <th>Baik</th>
                                                        <th>Cukup</th>
                                                        <th>Buruk</th>
                                                        <th>Sangat Buruk</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="text-center">
                                                        <td colspan="7" class="bg-green">Probability</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Delivery Time</td>
                                                        <td>1</td>
                                                        <td><?= $data['delivery_time'][0][0]; ?></td>
                                                        <td><?= $data['delivery_time'][1][0]; ?></td>
                                                        <td><?= $data['delivery_time'][2][0]; ?></td>
                                                        <td><?= $data['delivery_time'][3][0]; ?></td>
                                                        <td><?= $data['delivery_time'][4][0]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Delivery Time</td>
                                                        <td>2</td>
                                                        <td><?= $data['delivery_time'][0][1]; ?></td>
                                                        <td><?= $data['delivery_time'][1][1]; ?></td>
                                                        <td><?= $data['delivery_time'][2][1]; ?></td>
                                                        <td><?= $data['delivery_time'][3][1]; ?></td>
                                                        <td><?= $data['delivery_time'][4][1]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Delivery Time</td>
                                                        <td>3</td>
                                                        <td><?= $data['delivery_time'][0][2]; ?></td>
                                                        <td><?= $data['delivery_time'][1][2]; ?></td>
                                                        <td><?= $data['delivery_time'][2][2]; ?></td>
                                                        <td><?= $data['delivery_time'][3][2]; ?></td>
                                                        <td><?= $data['delivery_time'][4][2]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Delivery Time</td>
                                                        <td>4</td>
                                                        <td><?= $data['delivery_time'][0][3]; ?></td>
                                                        <td><?= $data['delivery_time'][1][3]; ?></td>
                                                        <td><?= $data['delivery_time'][2][3]; ?></td>
                                                        <td><?= $data['delivery_time'][3][3]; ?></td>
                                                        <td><?= $data['delivery_time'][4][3]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Delivery Time</td>
                                                        <td>5</td>
                                                        <td><?= $data['delivery_time'][0][4]; ?></td>
                                                        <td><?= $data['delivery_time'][1][4]; ?></td>
                                                        <td><?= $data['delivery_time'][2][4]; ?></td>
                                                        <td><?= $data['delivery_time'][3][4]; ?></td>
                                                        <td><?= $data['delivery_time'][4][4]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Execution</td>
                                                        <td>1</td>
                                                        <td><?= $data['execution'][0][0]; ?></td>
                                                        <td><?= $data['execution'][1][0]; ?></td>
                                                        <td><?= $data['execution'][2][0]; ?></td>
                                                        <td><?= $data['execution'][3][0]; ?></td>
                                                        <td><?= $data['execution'][4][0]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Execution</td>
                                                        <td>2</td>
                                                        <td><?= $data['execution'][0][1]; ?></td>
                                                        <td><?= $data['execution'][1][1]; ?></td>
                                                        <td><?= $data['execution'][2][1]; ?></td>
                                                        <td><?= $data['execution'][3][1]; ?></td>
                                                        <td><?= $data['execution'][4][1]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Execution</td>
                                                        <td>3</td>
                                                        <td><?= $data['execution'][0][2]; ?></td>
                                                        <td><?= $data['execution'][1][2]; ?></td>
                                                        <td><?= $data['execution'][2][2]; ?></td>
                                                        <td><?= $data['execution'][3][2]; ?></td>
                                                        <td><?= $data['execution'][4][2]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Execution</td>
                                                        <td>4</td>
                                                        <td><?= $data['execution'][0][3]; ?></td>
                                                        <td><?= $data['execution'][1][3]; ?></td>
                                                        <td><?= $data['execution'][2][3]; ?></td>
                                                        <td><?= $data['execution'][3][3]; ?></td>
                                                        <td><?= $data['execution'][4][3]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Execution</td>
                                                        <td>5</td>
                                                        <td><?= $data['execution'][0][4]; ?></td>
                                                        <td><?= $data['execution'][1][4]; ?></td>
                                                        <td><?= $data['execution'][2][4]; ?></td>
                                                        <td><?= $data['execution'][3][4]; ?></td>
                                                        <td><?= $data['execution'][4][4]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Team Work</td>
                                                        <td>1</td>
                                                        <td><?= $data['team_work'][0][0]; ?></td>
                                                        <td><?= $data['team_work'][1][0]; ?></td>
                                                        <td><?= $data['team_work'][2][0]; ?></td>
                                                        <td><?= $data['team_work'][3][0]; ?></td>
                                                        <td><?= $data['team_work'][4][0]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Team Work</td>
                                                        <td>2</td>
                                                        <td><?= $data['team_work'][0][1]; ?></td>
                                                        <td><?= $data['team_work'][1][1]; ?></td>
                                                        <td><?= $data['team_work'][2][1]; ?></td>
                                                        <td><?= $data['team_work'][3][1]; ?></td>
                                                        <td><?= $data['team_work'][4][1]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Team Work</td>
                                                        <td>3</td>
                                                        <td><?= $data['team_work'][0][2]; ?></td>
                                                        <td><?= $data['team_work'][1][2]; ?></td>
                                                        <td><?= $data['team_work'][2][2]; ?></td>
                                                        <td><?= $data['team_work'][3][2]; ?></td>
                                                        <td><?= $data['team_work'][4][2]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Team Work</td>
                                                        <td>4</td>
                                                        <td><?= $data['team_work'][0][3]; ?></td>
                                                        <td><?= $data['team_work'][1][3]; ?></td>
                                                        <td><?= $data['team_work'][2][3]; ?></td>
                                                        <td><?= $data['team_work'][3][3]; ?></td>
                                                        <td><?= $data['team_work'][4][3]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Team Work</td>
                                                        <td>5</td>
                                                        <td><?= $data['team_work'][0][4]; ?></td>
                                                        <td><?= $data['team_work'][1][4]; ?></td>
                                                        <td><?= $data['team_work'][2][4]; ?></td>
                                                        <td><?= $data['team_work'][3][4]; ?></td>
                                                        <td><?= $data['team_work'][4][4]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Innovation</td>
                                                        <td>1</td>
                                                        <td><?= $data['innovation'][0][0]; ?></td>
                                                        <td><?= $data['innovation'][1][0]; ?></td>
                                                        <td><?= $data['innovation'][2][0]; ?></td>
                                                        <td><?= $data['innovation'][3][0]; ?></td>
                                                        <td><?= $data['innovation'][4][0]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Innovation</td>
                                                        <td>2</td>
                                                        <td><?= $data['innovation'][0][1]; ?></td>
                                                        <td><?= $data['innovation'][1][1]; ?></td>
                                                        <td><?= $data['innovation'][2][1]; ?></td>
                                                        <td><?= $data['innovation'][3][1]; ?></td>
                                                        <td><?= $data['innovation'][4][1]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Innovation</td>
                                                        <td>3</td>
                                                        <td><?= $data['innovation'][0][2]; ?></td>
                                                        <td><?= $data['innovation'][1][2]; ?></td>
                                                        <td><?= $data['innovation'][2][2]; ?></td>
                                                        <td><?= $data['innovation'][3][2]; ?></td>
                                                        <td><?= $data['innovation'][4][2]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Innovation</td>
                                                        <td>4</td>
                                                        <td><?= $data['innovation'][0][3]; ?></td>
                                                        <td><?= $data['innovation'][1][3]; ?></td>
                                                        <td><?= $data['innovation'][2][3]; ?></td>
                                                        <td><?= $data['innovation'][3][3]; ?></td>
                                                        <td><?= $data['innovation'][4][3]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Innovation</td>
                                                        <td>5</td>
                                                        <td><?= $data['innovation'][0][4]; ?></td>
                                                        <td><?= $data['innovation'][1][4]; ?></td>
                                                        <td><?= $data['innovation'][2][4]; ?></td>
                                                        <td><?= $data['innovation'][3][4]; ?></td>
                                                        <td><?= $data['innovation'][4][4]; ?></td>
                                                    </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table table-centered mb-0">
                                                  <thead>
                                                      <tr>
                                                          <th>ID</th>
                                                          <th>Email</th>
                                                          <th>Nama Lengkap</th>
                                                          <th>Posisi Pekerjaan</th>
                                                          <th>Delivery Time</th>
                                                          <th>Execution</th>
                                                          <th>Team Work</th>
                                                          <th>Innovation</th>
                                                          <th>Klasifikasi</th>
                                                          <th>Hasil</th>
                                                      </tr>
                                                  </thead>

                                              
                                                  <tbody>
                                                      <tr class="text-center">
                                                          <td colspan="9"class="bg-green">Data Testing</td>
                                                          <td class="bg-red">Hasil</td>
                                                      </tr>
                                                    <?php foreach($data['datasets_testing'] as $usr => $index) : ?>
                                                        <tr>
                                                            <td><?= $usr+1 ?></td>
                                                            <td><?= $data['datasets_testing'][$usr]['email'] ?></td>
                                                            <td><?= $data['datasets_testing'][$usr]['fullname'] ?></td>
                                                            <td><?= $data['datasets_testing'][$usr]['job_position'] ?></td>
                                                            <td><?= $data['datasets_testing'][$usr]['delivery_time'] ?></td>
                                                            <td><?= $data['datasets_testing'][$usr]['execution'] ?></td>
                                                            <td><?= $data['datasets_testing'][$usr]['team_work'] ?></td>
                                                            <td><?= $data['datasets_testing'][$usr]['innovation'] ?></td>
                                                            <td><?= $data['datasets_testing'][$usr]['penilaian'] ?></td>
                                                            <td><?= $data['datasets_testing'][$usr]['hasil'] ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                  </tbody>
                                                </table>   
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card -->
                                    </div> <!-- end collapse-->
                                </div>
                                <!-- end upcoming tasks -->

                                <!-- start other tasks -->
                                <div class="mt-4 mb-4">
                                    <h5 class="m-0 pb-2">
                                        <a class="text-dark" data-bs-toggle="collapse" href="#otherTasks" role="button" aria-expanded="false" aria-controls="otherTasks">
                                            <i class='uil uil-angle-down font-18'></i>Evaluasi</span>
                                        </a>
                                    </h5>

                                    <div class="collapse show" id="otherTasks">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <p class="text-center">Total Testing: <?= $data['count_testing']; ?></p>
                                                <p class="text-center">Total Jumlah Tepat: <?= $data['count_TP']; ?> </p> 
                                                <p class="text-center">Total Jumlah Tidak Tepat: <?= $data['count_FN']; ?> </p>
                                                <p class="text-center">Akurasi: (<?= $data['count_TP']; ?> / <?= $data['count_testing']; ?>) x 100 = <?= $data['accurasi']; ?> % </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card -->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Right Sidebar -->
        <div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar>

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                    </div>

                    <!-- Settings -->
                    <h5 class="mt-3">Color Scheme</h5>
                    <hr class="mt-1" />

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked>
                        <label class="form-check-label" for="light-mode-check">Light Mode</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                        <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                    </div>
       

                    <!-- Width -->
                    <h5 class="mt-4">Width</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
                        <label class="form-check-label" for="fluid-check">Fluid</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                        <label class="form-check-label" for="boxed-check">Boxed</label>
                    </div>
        

                    <!-- Left Sidebar-->
                    <h5 class="mt-4">Left Sidebar</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                        <label class="form-check-label" for="default-check">Default</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked>
                        <label class="form-check-label" for="light-check">Light</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                        <label class="form-check-label" for="dark-check">Dark</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked>
                        <label class="form-check-label" for="fixed-check">Fixed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                        <label class="form-check-label" for="condensed-check">Condensed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                        <label class="form-check-label" for="scrollable-check">Scrollable</label>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
            
                        <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                            class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                    </div>
                </div> <!-- end padding-->

            </div>
        </div>

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <!-- bundle -->
        <script src="<?= BASEURL; ?>/assets/js/vendor.min.js"></script>
        <script src="<?= BASEURL; ?>/assets/js/app.min.js"></script>

        <!-- quill js -->
        <script src="<?= BASEURL; ?>/assets/js/vendor/quill.min.js"></script>
        <!-- Init js-->
        <script src="<?= BASEURL; ?>/assets/js/pages/demo.tasks.js"></script>

        <!-- third party js -->
        <script src="<?= BASEURL; ?>/assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="<?= BASEURL; ?>/assets/js/vendor/dataTables.bootstrap5.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="<?= BASEURL; ?>/assets/js/pages/demo.datatable-init.js"></script>
        <script src="<?= BASEURL; ?>/assets/js/custom-rekomendasi.js"></script>

        <!-- end demo js-->
    </body>

</html>
