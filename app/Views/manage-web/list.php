<?= $this->section('css'); ?>
    
<?= $this->endSection(); ?>
<?= $this->extend('layouts/dashboard-layout'); ?>
<?= $this->section('content'); ?>

<!-- Query Table -->
<div class="row pt-2">
    <div class="col-md-12 pt-2">
        <div class="card">
            <div class="card-header bg-dark">
                <label>Manage Web</label>                
            </div>
            <form method="post" id="update_setting" name="update_setting" action="<?= site_url('manage-web/update') ?>">
            <div class="card-body">
                <div class="row">
                <div class="col-md-4">
                    <div class="card-body">
                        <label class="label">Temperature Setting</label>
                        <hr />
                        <div class="form-group d-flex flex-wrap">
                            <label class="col-md-6 form-control bg-secondary">Low Temperature</label>
                            <input class="form-control col-md-6" type="number" step="0.1" name="templow" value="<?php echo $templow['value']; ?>"/>
                            <textarea class="col-md-12" disabled><?php echo $templow['description']; ?></textarea>
                        </div>
                        <hr />
                        <div class="form-group d-flex flex-wrap">
                            <label class="col-md-6 form-control bg-secondary">High Temperature</label>
                            <input class="form-control col-md-6" type="number" step="0.1" name="temphigh" value="<?php echo $temphigh['value']; ?>"/>
                            <textarea class="col-md-12" disabled><?php echo $temphigh['description']; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-body">
                        <label class="label">Heartrate Setting</label>
                        <hr />
                        <div class="form-group d-flex flex-wrap">
                            <label class="col-md-6 form-control bg-secondary">Low Heartrate</label>
                            <input class="form-control col-md-6" type="number" step="0.1" name="bpmlow" value="<?php echo $bpmlow['value']; ?>"/>
                            <textarea class="col-md-12" disabled><?php echo $bpmlow['description']; ?></textarea>
                        </div>
                        <hr />
                        <div class="form-group d-flex flex-wrap">
                            <label class="col-md-6 form-control bg-secondary">High Heartrate</label>
                            <input class="form-control col-md-6" type="number" step="0.1" name="bpmhigh" value="<?php echo $bpmhigh['value']; ?>"/>
                            <textarea class="col-md-12" disabled><?php echo $bpmhigh['description']; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-body">
                        <label class="label">Oxygen Setting</label>
                        <hr />
                        <div class="form-group d-flex flex-wrap">
                            <label class="col-md-6 form-control bg-secondary">Low Oxygen</label>
                            <input class="form-control col-md-6" type="number" step="0.1" name="spolow" value="<?php echo $spolow['value']; ?>"/>
                            <textarea class="col-md-12" disabled><?php echo $spolow['description']; ?></textarea>
                        </div>
                        <hr />
                        <div class="form-group d-flex flex-wrap">
                            <label class="col-md-6 form-control bg-secondary">High Oxygen</label>
                            <input class="form-control col-md-6" type="number" step="0.1" name="spohigh" value="<?php echo $spohigh['value']; ?>"/>
                            <textarea class="col-md-12" disabled><?php echo $spohigh['description']; ?></textarea>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-center pb-5">
                <button type="submit" class="btn btn-success" style="width: 150px;">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?= $this->section('script'); ?>

<?= $this->endSection() ?>

<?= $this->endSection() ?>

