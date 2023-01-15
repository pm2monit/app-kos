<div id="sidebar" class="active">
    <div class="sidebar-wrapper">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?php echo base_url('/dashboard'); ?>">
                        <img src="<?php echo base_url(); ?>/assets/images/logo/logo_.jpeg" alt="Logo" srcset="">
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item <?php if($_SERVER['PATH_INFO'] == '/dashboard') { ?> active <?php } ?> ">
                    <a href="<?php echo base_url(); ?>/dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item  <?php if($_SERVER['PATH_INFO'] == '/dashboard/data_penghuni') { ?> active <?php } ?>">
                    <a href="<?php echo base_url(); ?>/dashboard/data_penghuni" class='sidebar-link'>
                        <i class="bi bi-people"></i>
                        <span>Data Master</span>
                    </a>
                </li>

                <li class="sidebar-item  <?php if($_SERVER['PATH_INFO'] == '/transaksi') { ?> active <?php } ?>">
                    <a href="<?php echo base_url(); ?>/transaksi" class='sidebar-link'>
                        <i class="bi bi-calendar4-event"></i>
                        <span>Data Transaksi</span>
                    </a>
                </li>

                <li class="sidebar-item  <?php if($_SERVER['PATH_INFO'] == '/settings/profile') { ?> active <?php } ?>">
                    <a href="<?php echo base_url(); ?>/settings/profile" class='sidebar-link'>
                        <i class="bi bi-gear"></i>
                        <span>Data Report</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>/AuthController/logout" class='sidebar-link'>
                        <i class="bi bi-power"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
