<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/css/signpage.css">

    <title><?php echo SITE_NAME ?> - Sign In</title>
  </head>
  <body>
    <div class="container h-100">
        <div class="row d-flex h-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card shadow rounded elevation-3">
                    <div class="card-body">
                        <img class="rounded mx-auto d-block" src="<?php echo base_url(); ?>/public/assets/img/logo.png" alt="Logo" width="150px;"/>
                        <h6 class="text-center"><?= SITE_NAME; ?></h6>
                        <h2 class="text-center">Log In</h2>
                
                        <?php if(session()->getFlashdata('msg')):?>
                            <div class="alert alert-warning">
                            <?= session()->getFlashdata('msg') ?>
                            </div>
                        <?php endif;?>

                        <form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
                            <div class="form-group mb-3 col-md-6 mx-auto d-block">
                                <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" >
                            </div>

                            <div class="form-group mb-3 col-md-6 mx-auto d-block">
                                <input type="password" name="password" placeholder="Password" class="form-control" >
                            </div>
                            
                            <div class="form-group mb-3 btn-signin">
                                <button type="submit" class="btn btn-primary mx-auto d-block p-2" style="width: 150px;">Log In</button>
                            </div> 
                            <div class="form-group mb-3 signup-link"> 
                                <p>Dont Have account yet.
                                <a href="<?php echo site_url('signup');?>">Click Here</a> to create new account. </p>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-grey text-center p-0 m-0" style="font-size: 10px;">
                        <p class="pt-3"><strong><?= SITE_NAME; ?> Project 2021-2022 - </strong><a href="<?= base_url(); ?>"><?= SITE_CREATOR; ?></a></p>
                    </div>
                </div>
                
            </div>
              
        </div>
    </div>
  </body>
</html>