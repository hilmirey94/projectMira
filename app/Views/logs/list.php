<?= $this->section('css'); ?>
    <link rel="stylesheet" href="assets/css/deletemodal.css">
<?= $this->endSection(); ?>
<?= $this->extend('layouts/dashboard-layout'); ?>
<?= $this->section('content'); ?>

<!-- Query Table -->
<div class="row pt-2">
    <div class="col-md-12 pt-2">
        <div class="card">
            <div class="card-header bg-dark">
                <label>System Logs (From: <?= (isset($startDate))?$startDate:'Earliest Date';?> - To: <?= (isset($endDate))?$endDate:'Recent Date';?>)</label>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <form method="post" id="logs" name="logs" action="<?= site_url('/logs/find') ?>" enctype="multipart/form-data">
                        <div class="form-group d-flex flex-wrap">
                            <label class="label col-md-1">From :</label>
                            <input type="date" name="fromDate" id="fromDate" class="form-control col-md-2 mr-5" />
                            <label class="label col-md-1">To :</label>
                            <input type="date" name="toDate" id="toDate" class="form-control col-md-2 mr-3" />
                            <button class="btn btn-primary" name="search" id="search" type="submit" style="width: 65px;"><i class="fas fa-search"></i></button> 
                        </div>
                        <hr />
                    </form>
                </div>
                <div class="table-responsive">
                    <table id="reportTable" class="table table-sm table-striped table-bordered" style="width:100%;">
                
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Operation</th>
                                <th scope="col">Description</th>
                                <th scope="col">RFID</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($reading): ?>
                        <?php foreach($reading as $i): ?>
                        <tr>
                            <td><?php echo $i['date_created']; ?></td>
                            <td><?php echo $i['operation']; ?></td>
                            <td><?php echo $i['description']; ?></td>
                            <td><?php echo $i['rfid']; ?></td>
                            <td>
                                <a href="#delModal" class="trigger-btn btn btn-danger btn-sm btn-delete" data-toggle="modal" data-id="<?php echo $i['id']; ?>">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- Modal HTML -->
<div id="delModal" class="modal fade">
	<div class="modal-dialog modal-confirm modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
                    <i class="fas fa-times"></i>
				</div>						
				<h4 class="modal-title w-100">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary btn-modal" data-dismiss="modal">Cancel</button>
				<a id="delId" name="delId" style="color:white" href="<?php site_url('/');?>" class="btn btn-danger btn-modal">Delete</a>
			</div>
		</div>
	</div>
</div> 


<?= $this->section('script'); ?>
<script>
    $(function () {
        $(".btn-delete").click(function () {
            var id = $(this).data('id');
            document.getElementById('showId').innerHTML = id;
            document.getElementById('delId').href = '<?php echo site_url('/logs/delete/');?>' + id;
        })
    });
</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>

