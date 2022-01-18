<?php
    // Rebecca Purple
    $color1 = 'style="background-color: #663399;"';
    // Purple
    $color2 = 'style="background-color: #800080;"';
    // Medium Purple
    $color3 = 'style="background-color: #9370DB;"';
    // Medium Orchid
    $color4 = 'style="background-color: #BA55D3;"';
    // Violet
    $color5 = 'style="background-color: #EE82EE;"';
    // Magenta
    $color6 = 'style="background-color: #FF00FF;"';
    // Dark Orchid
    $color7 = 'style="background-color: #9932CC;"';
    // Dark Violet
    $color8 = 'style="background-color: #9400D3;"';
    // Dark Magenta
    $color8 = 'style="background-color: #8B008B;"';
    // Blue Violet
    $color8 = 'style="background-color: #8A2BE2;"';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/css/signpage.css">
    <title><?php echo SITE_NAME ?> - Sign Up</title>
</head>

<body class="bg-light">
    <div class="container h-100">
        <div class="row d-flex h-100 justify-content-center align-items-center">
            <div class="card col-md-6 shadow elevation-3">
                <div class="card-body">
                    <div class="col-md-12">
                        <img class="rounded mx-auto d-block" src="<?php echo base_url(); ?>/public/assets/img/logo.png" alt="Logo" width="150px;"/>
                        <h6 class="text-center"><?= SITE_NAME; ?></h6>
                        <h2 class="text-center">Register User</h2>

                        <?php if(isset($validation)):?>
                        <div class="alert alert-danger">
                        <?= $validation->listErrors() ?>
                        </div>
                        <?php endif;?>

                        <form action="<?php echo base_url(); ?>/SignupController/store" method="post">
                            <div class="form-group mb-3 col-md-9 mx-auto d-block">
                                <input type="text" name="name" placeholder="Name" value="<?= set_value('name') ?>" class="form-control" >
                            </div>

                            <div class="form-group mb-3 col-md-9 mx-auto d-block">
                                <input type="text" name="rfid" placeholder="RFID" value="<?= set_value('rfid') ?>" class="form-control" >
                            </div>

                            <div class="form-group mb-3 col-md-9 mx-auto d-block">
                                <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" >
                            </div>

                            <div class="form-group mb-3 col-md-9 mx-auto d-block">
                                <input type="password" name="password" placeholder="Password" class="form-control" >
                            </div>

                            <div class="form-group mb-3 col-md-9 mx-auto d-block">
                                <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" >
                            </div>

                            <div class="form-group mb-3 col-md-9 mx-auto d-block">
                                <button type="submit" class="btn btn-success mx-auto d-block p-2" style="width: 150px;">Sign Up</button>
                            </div>
                            <div class="form-group mb-3 signup-link"> 
                                <p>Already have an account.
                                <a href="<?php echo site_url('signin');?>">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-footer bg-light text-center p-0 m-0" style="font-size: 10px;">
                        <p class="pt-3"><strong><?= SITE_NAME; ?> Project 2021-2022 - </strong><a href="<?= base_url(); ?>"><?= SITE_CREATOR; ?></a></p>
                    </div>
            </div>
        </div>
    </div>
</body>

</html>