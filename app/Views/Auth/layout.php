<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - App Kostel</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/main/app.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/pages/auth.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/main/custom.css" />
    <link
      rel="shortcut icon"
      href="/assets/images/logo/favicon.svg"
      type="image/x-icon"
    />
    <link
      rel="shortcut icon"
      href="/assets/images/logo/favicon.png"
      type="image/png"
    />
    <?= $this->renderSection('pageStyles') ?>
  </head>

<body>
<div id="auth">
      <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="<?php echo base_url(); ?>"><img src="/assets/images/logo/logo.svg" alt="Logo"/></a>
                </div>
                
                <!-- <p class="auth-subtitle mb-5">
                    Log in with your data that you entered during registration.
                </p> -->
                <?= $this->renderSection('main') ?>
            </div>
            
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right" ></div>
        </div>
    </div>
</div>



<?= $this->renderSection('pageScripts') ?>
</body>
</html>
