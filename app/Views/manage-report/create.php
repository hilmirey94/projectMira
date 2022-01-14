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
                            <form method="post" id="update_report" name="update_report" action="<?= site_url('manage-report/store') ?>">
                                <div class="form-group d-flex">
                                    <label class="col-md-2">RFID</label>
                                    <input type="text" name="rfid" class="form-control col-md-3" required/>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">Temperature (°C)</label>
                                    <input type="number" step="0.1" name="temperature" class="form-control  col-md-2" required/>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">Heartbeat (BPM)</label>
                                    <input type="number" step="0.1" name="bpm" class="form-control col-md-2" required/>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-md-2">Oxygen (SPO<sup>2</sup>)</label>
                                    <input type="number" step="0.1" name="spo2" class="form-control col-md-2" required/>
                                </div>

                                <div class="form-group pt-3">
                                <button type="submit" class="btn btn-primary">Create Report</button>
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