<!DOCTYPE html>
<html lang="en">
    <head>
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
                                    <h4 class="page-title">Form penilaian</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-body">
                                <ol class="list-group list-group-numbered">
                                  <li class="mb-2 d-flex justify-content-between">
                                    <div class="ms-2 me-auto">
                                      <div class="fw-bold">Delivery</div>
                                      Pencapaian dalam segi selesai sebuah projek sesuai dengan target yang diberikan.
                                      <div class="mt-2">
                                        <div class="form-check">
                                            <input type="radio" id="customRadio1" name="customRadio" class="form-check-input">
                                            <label class="form-check-label" for="customRadio1">5</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                            <label class="form-check-label" for="customRadio2">4</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                            <label class="form-check-label" for="customRadio2">3</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                            <label class="form-check-label" for="customRadio2">2</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                            <label class="form-check-label" for="customRadio2">1</label>
                                        </div>
                                      </div> 
                                    </div>
                                  </li>
                                  <li class="mb-2 d-flex justify-content-between">
                                    <div class="ms-2 me-auto">
                                      <div class="fw-bold">Execution</div>
                                      Kemampuan menerapkan rencana yang dibuat secara efektif dengan memanfaatkan pendekatan tertentu, dan memiliki kemampuan memastikan penerapan tersebut dijalankan sebagaimana mestinya untuk mencapai tujuan yang telah ditetapkan. 
                                      <div class="mt-2">
                                        <div class="form-check">
                                            <input type="radio" id="customRadio1" name="customRadio" class="form-check-input">
                                            <label class="form-check-label" for="customRadio1">5</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                            <label class="form-check-label" for="customRadio2">4</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                            <label class="form-check-label" for="customRadio2">3</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                            <label class="form-check-label" for="customRadio2">2</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                            <label class="form-check-label" for="customRadio2">1</label>
                                        </div>
                                      </div> 
                                    </div>
                                  </li>
                                </ol>
                              </div>
                            </div>
                          </div>
                        </div>

                        
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

    </body>
</html>
