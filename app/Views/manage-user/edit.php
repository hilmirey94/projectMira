<?= $this->section('css'); ?>
    
<?= $this->endSection(); ?>

<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">
                <h6 class="" >Edit</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container">
                            <?php if(isset($validation)):?>
                            <div class="alert alert-danger">
                            <?= $validation->listErrors() ?>
                            </div>
                            <?php endif;?>
                            <form method="post" id="update_report" name="update_report" action="<?= site_url('manage-user/update') ?>" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id" value="<?php echo $user_obj['id']; ?>">
                                <div class="form-group d-flex">
                                    <label class="col-md-2">Name</label>
                                    <input type="text" name="name" placeholder="Name" class="form-control col-md-10" value="<?php echo $user_obj['name']; ?>" required/>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">Email</label>
                                    <input type="email" name="email" placeholder="Email" class="form-control col-md-10" value="<?php echo $user_obj['email']; ?>" required/>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">RFID</label>
                                    <input type="text" name="rfid" placeholder="RFID" class="form-control col-md-6" value="<?php echo $user_obj['rfid']; ?>" required/>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">User Type</label>
                                    <select class="form-select form-control col-md-6" aria-label="Default select example" name="user_type" <?php if($user_type != 'admin'){echo 'disabled';};?>>
                                        <option <?php if($user_obj['user_type'] == 'normal') {echo 'selected';}; ?> value="normal">Normal</option>
                                        <option <?php if($user_obj['user_type'] == 'staff') {echo 'selected';}; ?> value="staff">Staff</option>
                                        <option <?php if($user_obj['user_type'] == 'admin') {echo 'selected';}; ?> value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="form-group d-flex ">
                                    <span class="col-md-2"></span>
                                    <span id="nextPics" style="display:none;">
                                        <img id="output" class="img-circle elevation-2" height="150px;" width="150px;"/>
                                    </span>
                                    <span id="prevPics"> 
                                    <?php 
                                        if ($user_obj['image'] != null){
                                        echo '<img src="'. base_url().'/uploads/'.$user_obj['image'] .'" class="img-circle elevation-2" alt="User Image" height="150px;" width="150px;">';
                                        }
                                        else {
                                        echo '<img src="'. base_url().'/public/assets/img/avatar.png" class="img-circle elevation-2" alt="User Image"  height="150px;" width="150px;">';
                                        }
                                    ?>
                                    </span>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">Image</label>
                                    <input type="file" name="image" id="image" placeholder="Image" class="form-control col-md-6 image-select" onchange="loadFile(event)"/>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">Relative Email</label>
                                    <input type="email" name="email_relative" placeholder="Relative Email" class="form-control col-md-10" value="<?php echo $user_obj['email_relative']; ?>"/>
                                </div>

                                <div class="form-group pt-3 float-right">
                                <button type="submit" class="btn btn-success btn-lg">Save User</button>
                                </div>
                            </form>
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