<?= $this->extend('layouts/dashboard-layout'); ?>
<?= $this->section('content'); ?>

<!-- Info boxes Display Simple Reading Data -->
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box bg-dark">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-id-badge"></i></span>

        <div class="info-box-content">
            <div id="tempCarousel" class="carousel slide" data-ride="carousel">
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <span class="info-box-text">Total Scan (Today)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $scanToday:'0' ?>
                        </span>
                    </div>
                    <div class="carousel-item">
                        <span class="info-box-text">Total Scan (Past 7 Days)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $scan7Days:'0' ?>
                        </span>
                    </div>
                    <div class="carousel-item">
                        <span class="info-box-text">Total Scan (Past 30 Days)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $scan30Days:'0' ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box bg-dark">
        <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-thermometer-half"></i></span>

        <div class="info-box-content">
            <div id="tempCarousel" class="carousel slide" data-ride="carousel">
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <span class="info-box-text">Risk Temperature (Today)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $tempToday:'0' ?>
                        </span>
                    </div>
                    <div class="carousel-item">
                        <span class="info-box-text">Risk Temperature (Past 7 Days)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $temp7Days:'0' ?>
                        </span>
                    </div>
                    <div class="carousel-item">
                        <span class="info-box-text">Risk Temperature (Past 30 Days)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $temp30Days:'0' ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 bg-dark">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-heartbeat"></i></span>

        <div class="info-box-content">
            <div id="tempCarousel" class="carousel slide" data-ride="carousel">
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <span class="info-box-text">Risk Heartrate (Today)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $bpmToday:'0' ?>
                        </span>
                    </div>
                    <div class="carousel-item">
                        <span class="info-box-text">Risk Heartrate (Past 7 Days)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $bpm7Days:'0' ?>
                        </span>
                    </div>
                    <div class="carousel-item">
                        <span class="info-box-text">Risk Heartrate (Past 30 Days)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $bpm30Days:'0' ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 bg-dark">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-lungs"></i></span>

        <div class="info-box-content">
            <div id="tempCarousel" class="carousel slide" data-ride="carousel">
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <span class="info-box-text">Risk Oxygen (Today)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $spoToday:'0' ?>
                        </span>
                    </div>
                    <div class="carousel-item">
                        <span class="info-box-text">Risk Oxygen (Past 7 Days)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $spo7Days:'0' ?>
                        </span>
                    </div>
                    <div class="carousel-item">
                        <span class="info-box-text">Risk Oxygen (Past 30 Days)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $spo30Days:'0' ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    
</div>
<!-- /.row -->

<div class="row d-none d-lg-block">
    <div class="col-md-12">
        <div class="card shadow p-4 bg-dark" width="100%">
            <!-- Information Section -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner pl-5 pr-5" style=" width:100%; height: 400px !important;">
                <div class="carousel-item active">
                <img class="d-block h-100 mx-auto" src="<?php echo base_url(); ?>/public/assets/img/Banner1.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block h-100 mx-auto" src="<?php echo base_url(); ?>/public/assets/img/Banner2.jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                <img class="d-block h-100 mx-auto" src="<?php echo base_url(); ?>/public/assets/img/Banner3.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
    </div>  
</div>

<?= $this->endSection() ?>