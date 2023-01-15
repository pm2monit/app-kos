<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Menteng Park Apartemen Invoice Management System</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/datepicker/css/bootstrap-datepicker3.min.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/pages/profile.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/app.css">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/favicon.svg" type="image/x-icon">




    <style>
      table.dataTable.no-footer {
        border-bottom: 0px solid #111!important;
      }
      table.dataTable tbody td {
        border-bottom: 1px solid #e2e2e2!important;
      }
    </style>
</head>

<body>
    <div id="app">
        <!-- <div id="main"> -->
          <?= $this->include('layout/sidebar') ?>
          <div id="main" class="layout-navbar">
            <?= $this->include('layout/header') ?>
            <div id="main-content">
              <?= $this->renderSection('content') ?>
              <?= $this->include('layout/footer') ?>
            </div>

          </div>
        <!-- </div> -->
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap.bundle.min.js"></script>


    <!-- <script src="<?php echo base_url(); ?>/assets/vendors/apexcharts/apexcharts.js"></script> -->
    <!-- <script src="<?php echo base_url(); ?>/assets/js/pages/dashboard.js"></script> -->

    <script src="<?php echo base_url(); ?>/assets/js/main.js"></script>



</body>

</html>
