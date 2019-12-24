
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NuhaPOS</title>
    <link rel="apple-touch-icon" href="<?php echo base_url('assets/app-assets/vendors/logo/logo.png') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/app-assets/vendors/logo/logo.png') ?>">    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/login/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/login/css/fontawesome-all.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/login/css/iofrm-style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/login/css/iofrm-theme9.css') ?>">
</head>
<body>
    <div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="<?php echo base_url('assets/app-assets/vendors/login/images/kc-login.png') ?>" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                      <h3>NUHA POS</h3>
                        <p></p>

                        <div class="page-links">
                            <a href="login9.html" class="active">Login</a>
                        </div>
                        <form action="<?php echo site_url('Auth/process') ?>" method="post">
                            <input class="form-control" id="user_id" type="text" name="user_id" placeholder="E-mail Address" required>
                            <input class="form-control" id="password" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button type="submit" class="ibtn">Login</button>
                            </div>
                        </form>
                        <div class="other-links">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="<?php echo base_url('assets/app-assets/vendors/login/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/app-assets/vendors/login/js/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets/app-assets/vendors/login/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/app-assets/vendors/login/js/main.js') ?>"></script>
</body>
</html>
