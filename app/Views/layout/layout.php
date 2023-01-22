<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .fontawesome-icons {
            text-align: center;
        }

        article dl {
            background-color: rgba(0, 0, 0, .02);
            padding: 20px;
        }

        .fontawesome-icons .the-icon {
            font-size: 24px;
            line-height: 1.2;
        }
    </style>




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

  <?= $this->renderSection('pageStyles') ?>
</head>

<body>
  <script src="/assets/js/initTheme.js"></script>
    <div id="app">
      <?= $this->include('layout/sidebar') ?>
      <div id="main" class="layout-navbar">
        <?= $this->include('layout/header') ?>
        <div id="main-content">
          <?= $this->renderSection('content') ?>
          <?= $this->include('layout/footer') ?>
        </div>
      </div>
    </div>
    
    <script src="/assets/extensions/jquery/jquery.js"></script>

    <!-- <script src="/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/assets/js/pages/simple-datatables.js"></script> -->
    
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/app.js"></script>
    
    <?= $this->renderSection('pageScripts') ?>  
</body>

</html>
