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
                            <form method="post" id="update_report" name="update_report" action="<?= site_url('manage-report/update') ?>">
                                <input type="hidden" name="id" id="id" value="<?php echo $user_obj['id']; ?>">
                                <div class="form-group d-flex">
                                    <label class="col-md-2">Name</label>
                                    <input type="text" name="name" placeholder="Name" class="form-control col-md-6" value="<?php echo $user_obj['name']; ?>" required/>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">Email</label>
                                    <input type="email" name="email" placeholder="Email" class="form-control col-md-6" value="<?php echo $user_obj['email']; ?>" required/>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">RFID</label>
                                    <input type="text" name="rfid" placeholder="RFID" class="form-control col-md-3" value="<?php echo $user_obj['rfid']; ?>" required/>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">User Type</label>
                                    <input type="text" name="user_type" value="normal" class="form-control col-md-3" value="<?php echo $user_obj['user_type']; ?>" readonly/>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">Image</label>
                                    <input type="text" name="image" placeholder="Image" class="form-control col-md-3" />
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">Relative Email</label>
                                    <input type="email" name="email_relative" placeholder="Relative Email" class="form-control col-md-6" value="<?php echo $user_obj['email_relative']; ?>"/>
                                </div>

                                <div class="form-group pt-3">
                                <button type="submit" class="btn btn-success">Save User</button>
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