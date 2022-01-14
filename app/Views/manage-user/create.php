<?= $this->section('css'); ?>
    
<?= $this->endSection(); ?>

<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">
                <h5>Create</h5>
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
                            <form method="post" id="add_user" name="add_user" action="<?= site_url('manage-user/store') ?>">
                                <div class="form-group d-flex">
                                    <label class="col-md-2">Name</label>
                                    <input type="text" name="name" placeholder="Name" class="form-control col-md-6" required/>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">Email</label>
                                    <input type="email" name="email" placeholder="Email" class="form-control col-md-6" required/>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">RFID</label>
                                    <input type="text" name="rfid" placeholder="RFID" class="form-control col-md-3" required/>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">User Type</label>
                                    <select class="form-select form-control col-md-3" aria-label="Default select example" name="user_type" <?php if($user_type != 'admin'){echo 'disabled';};?> required>
                                        <option selected value="normal">Normal</option>
                                        <?php if($user_type == 'admin'){
                                            echo '<option value="staff">Staff</option>
                                            <option value="admin">Admin</option>';
                                        }
                                         ?>
                                    </select>
                                </div>
                                <div class="form-group d-flex ">
                                    <span class="col-md-2"></span>
                                    <span id="nextPics" style="display:none;">
                                        <img id="output" class="img-circle elevation-2" height="150px;" width="150px;"/>
                                    </span>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">Image</label>
                                    <input type="file" name="image" id="image" placeholder="Image" class="form-control col-md-6 image-select" onchange="loadFile(event)"/>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">Password</label>
                                    <input type="password" name="password" placeholder="Password" class="form-control col-md-3" required/>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">Confirm Password</label>
                                    <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control col-md-3" required/>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">Relative Email</label>
                                    <input type="email" name="email_relative" placeholder="Relative Email" class="form-control col-md-6"/>
                                </div>
                                <div class="form-group pt-3">
                                <button type="submit" class="btn btn-primary">Create User</button>
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
        var nextPics = document.getElementById("nextPics");
        nextPics.style.display = "block";
    };

    
</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>