<?= $this->section('css'); ?>
    
<?= $this->endSection(); ?>

<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-9">
        <div class="card bg-dark">
            <div class="card-body">
                <h3 class="d-flex justify-content-center border shadow rounded p-3">About Project</h3>
                <div class="">
                    <div class="p-5 d-flex justify-content-center">
                        <img src="<?php echo base_url(); ?>/public/assets/img/Logo.png" style="width:400px;" class="shadow rounded elevation-3 bg-white"/>
                    </div>
                    <div class="blockquote text-justify bg-dark p-3">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            It has survived not only five centuries, but also the leap into electronic typesetting, 
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset 
                            sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
                            like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <footer class="blockquote-footer text-center"><?= SITE_CREATOR; ?> <cite title="Source Title"><?= SITE_NAME; ?></cite></footer>
                    </div>
                </div>
                <div class="card p-1 bg-white">
                    <img src="<?php echo base_url(); ?>/public/assets/img/about-logo.png" class="w-100 bg-dark rounded shadow pb-3"/>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-dark">
            <div class="card-body">
            <h3 class="d-flex justify-content-center border shadow rounded p-3">About Creator</h3>
                <div class="">
                    <div class="p-5 d-flex justify-content-center">
                        <img src="<?php echo base_url(); ?>/public/assets/img/profile.jpg" style="width:200px;" class="shadow rounded elevation-3"/>
                    </div>
                    <div class="blockquote text-justify bg-dark p-3">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            It has survived not only five centuries, but also the leap into electronic typesetting, 
                            remaining essentially unchanged.</p>
                        <footer class="blockquote-footer text-center"><?= SITE_CREATOR; ?> <cite title="Source Title">Project Creator</cite></footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('script'); ?>

<?= $this->endSection() ?>

