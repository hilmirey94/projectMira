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
                            <form method="post" id="update_report" name="update_report" action="<?= site_url('manage-report/store') ?>">
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
                                    <label class="col-md-3">Normal <p style="font-size:small;color:red;">Default to normal access. Only Admin can assign higher access.</p></label>
                                    <input type="text" name="user_type" value="normal" class="form-control col-md-3" hidden/>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">Image</label>
                                    <input type="text" name="image" placeholder="Image" class="form-control col-md-3"/>
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

<?= $this->endSection() ?>

<?= $this->endSection() ?>