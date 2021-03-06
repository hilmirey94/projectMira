<?= $this->section('css'); ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/css/userdetail.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/css/deletemodal.css">
<?= $this->endSection(); ?>

<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content'); ?>

<div class="row user-detail">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">
                <h6 class="" ><?= (isset($name))? $name:'User Details';?> - <?= (isset($rfid))? '('.$rfid.')':'';?></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container bg-dark rounded shadow">
                            <?php if(isset($validation)):?>
                            <div class="alert alert-danger">
                            <?= $validation->listErrors() ?>
                            </div>
                            <?php endif;?>
                                <div class="row rounded shadow border p-2">
                                <div class="col-md-6 border-left border-right">
                                    <input type="hidden" name="id" id="id" value="<?php echo $user_obj['id']; ?>">
                                    <div class="form-group d-flex">
                                        <label class="col-md-2 col-4">Name</label>
                                        <p><?php echo $user_obj['name']; ?></p>
                                    </div>
                                    <div class="form-group d-flex">
                                        <label class="col-md-2 col-4">Email</label>
                                        <p><?php echo $user_obj['email']; ?></p>
                                    </div>
                                    <div class="form-group d-flex">
                                        <label class="col-md-2 col-4">RFID</label>
                                        <p><?php echo $user_obj['rfid']; ?></p>
                                    </div>
                                    <div class="form-group d-flex">
                                        <label class="col-md-2 col-4">User Type</label>
                                        <p><?php if($user_obj['user_type'] == 'admin')
                                            echo 'Admin';
                                            elseif($user_obj['user_type'] == 'staff'){
                                                echo 'Staff';
                                            }
                                            elseif($user_obj['user_type'] == 'normal'){
                                                echo 'Normal';
                                            }else{
                                                echo 'Not Assigned';
                                            } ?></p>
                                    </div>
                                    <div class="form-group d-flex ">
                                        <label class="col-md-2 col-4">Image</label>
                                        <?php 
                                            if ($user_obj['image'] != null){
                                            echo '<img src="'. base_url().'/uploads/'.$user_obj['image'] .'" class="img-circle elevation-2" alt="User Image" height="150px;" width="150px;">';
                                            }
                                            else {
                                            echo '<img src="'. base_url().'/public/assets/img/avatar.png" class="img-circle elevation-2" alt="User Image"  height="150px;" width="150px;">';
                                            }
                                        ?>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6 border-left border-right">
                                    <div class="form-group d-flex">
                                        <label class="col-md-2 col-4">Relative Email</label>
                                        <p><?php if($user_obj['email_relative'] == null)
                                            {echo 'Not Assigned';}
                                            else{
                                                echo $user_obj['email_relative'];
                                            } ?></p>
                                    </div>
                                    <div class="form-group d-flex">
                                        <label class="col-md-2 col-4">Date Created</label>
                                        <p><?php echo $user_obj['date_created']; ?></p>
                                    </div>

                                    <div class="form-group">
                                        <a href="<?php echo base_url('/user-detail/edit/'.$user_obj['id']);?>" class="btn btn-info btn-sm" title="Edit details."><i class="fas fa-edit">Edit Details</i></a>
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->section('script'); ?>
<script>

    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
        }
        var oldPics = document.getElementById("prevPics");
        oldPics.style.display = "none";
        var nextPics = document.getElementById("nextPics");
        nextPics.style.display = "block";
    };

    
</script>

<?= $this->endSection() ?>

<?= $this->endSection() ?>