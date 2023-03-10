<div id="sidebar" class="active">
    <div class="sidebar-wrapper">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?php echo base_url('/dashboard'); ?>">
                        <!-- <img src="<?php echo base_url(); ?>/assets/images/logo/logo.png" alt="Logo" srcset=""> -->
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

                <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>/" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>/mskamar" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Master Data Kamar</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>/logout" class='sidebar-link'>
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Lagout</span>
                    </a>
                </li>

                

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
