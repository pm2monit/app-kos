<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Menteng Park Apartemen Invoice Management System</title>

    <link rel="stylesheet" href="/assets/css/main/app.css">
    <!-- <link rel="stylesheet" href="/assets/css/main/app-dark.css"> -->
    <link rel="shortcut icon" href="/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/images/logo/favicon.png" type="image/png">



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


    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/app.js"></script>



</body>

</html>
