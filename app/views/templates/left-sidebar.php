<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">
    
    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="<?= BASEURL; ?>/assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="<?= BASEURL; ?>/assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="<?= BASEURL; ?>/assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="<?= BASEURL; ?>/assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>
    
    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <?php switch(Utils::GetRole()):
            case "karyawan": ?>
            <li class="side-nav-item">
                <a href="<?= BASEURL; ?>/home" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPenilaianKaryawan" aria-expanded="false" aria-controls="sidebarPenilaianKaryawan" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Penilaian </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPenilaianKaryawan">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="<?= BASEURL; ?>/penilaian/employee">Pending action</a>
                        </li>
                        <li>
                            <a href="<?= BASEURL; ?>/penilaian/hasil">Hasil</a>
                        </li>
                    </ul>
                </div>
            </li>
            <?php break; ?>
            <?php case "approval": ?>
            <li class="side-nav-item">
                <a href="<?= BASEURL; ?>/home" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPenilaianKaryawan" aria-expanded="false" aria-controls="sidebarPenilaianKaryawan" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Penilaian </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPenilaianKaryawan">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="<?= BASEURL; ?>/penilaian/periode">Persutujuan</a>
                        </li>
                        <li>
                    </ul>
                </div>
            </li>
            <?php break; ?>
            <?php case "hrd": ?>
                <li class="side-nav-item">
                    <a href="<?= BASEURL; ?>/home" class="side-nav-link">
                        <i class="uil-home-alt"></i>
                        <span> Dashboards </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="<?= BASEURL; ?>/user" class="side-nav-link">
                        <i class="uil-accessible-icon-alt"></i>
                        <span> Pengguna </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="<?= BASEURL; ?>/periode" class="side-nav-link">
                        <i class="uil-accessible-icon-alt"></i>
                        <span> Periode Penilaian </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarRekomendasi" aria-expanded="false" aria-controls="sidebarReport" class="side-nav-link">
                        <i class="uil-store"></i>
                        <span> Rekomendasi </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarRekomendasi">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="<?= BASEURL; ?>/rekomendasi/kenaikangaji">Kenaikan gaji</a>
                            </li>
                            <li>
                                <a href="<?= BASEURL; ?>/rekomendasi/evaluasi">Evaluasi kinerja</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarReport" aria-expanded="false" aria-controls="sidebarReport" class="side-nav-link">
                        <i class="uil-store"></i>
                        <span> Report </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarReport">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="<?= BASEURL; ?>/report/evaluasi">Evaluasi kinerja</a>
                            </li>
                            <li>
                                <a href="<?= BASEURL; ?>/report/kenaikangaji">Kenaikan gaji</a>
                            </li>
                        </ul>
                    </div>
                </li>
            <?php break; ?>
            <?php endswitch; ?>

            
        </ul>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->