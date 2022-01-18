<?= $this->section('css'); ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/css/deletemodal.css">
<?= $this->endSection(); ?>
<?= $this->extend('layouts/dashboard-layout'); ?>
<?= $this->section('content'); ?>

<!-- Query Table -->
<div class="row pt-2">
    <div class="col-md-12 pt-2">
        <div class="card">
            <div class="card-header bg-dark">
                <label>Report List (From: <?= (isset($startDate))?$startDate:'Earliest Date';?> - To: <?= (isset($endDate))?$endDate:'Recent Date';?>)</label>
                <?php if ($user_type == 'admin') {
                    echo '<div class="float-right">
                        <a href="';
                    echo base_url('/manage-report/create');
                    echo  '" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            New
                            </a>
                        </div>';
                } ?>
                
            </div>
            <div class="card-body">
                <!-- Filtering Option -->
                <div class="row">
                    <!-- Filtering Date -->
                    <div class="col-md-12">
                    <form method="post" id="manage-report" name="manage-report" action="<?= site_url('/manage-report/find') ?>" enctype="multipart/form-data">
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
                    
                    <!-- Filtering Column -->
                    <div class="col-md-12">
                        <div class="form-group d-flex flex-wrap">
                            <label class="label col-md-1">RFID :</label>
                            <select name="rfidFilter" id="rfidFilter" class="form-control col-md-6">
                                <option value="">Choose RFID</option>
                                <?php 
                                    if($rfid):
                                        foreach($rfid as $row):
                                            echo '<option value="'.$row['drfid'].'">'.$row['drfid'].'</option>';
                                        endforeach;
                                    endif;
                                ?>
                            </select>
                        </div>
                        <div class="form-group d-flex flex-wrap">
                            <label class="label col-md-1">Name :</label>
                            <select name="nameFilter" id="nameFilter" class="form-control col-md-6">
                                <option value="">Choose Name</option>
                                <?php 
                                    if($name):
                                        foreach($name as $row):
                                            echo '<option value="'.$row['dname'].'">'.$row['dname'].'</option>';
                                        endforeach;
                                    endif;
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

               
                <hr />
                <div class="table-responsive">
                    <table id="ManageTable" class="table table-sm table-striped table-bordered" style="width:100%;">
                
                        <thead>
                            <tr>
                                <th scope="col">Report ID</th>
                                <th scope="col">Date</th>
                                <th scope="col">Name</th>
                                <th scope="col">RFID</th>
                                <th scope="col">Temperature (°C)</th>
                                <th scope="col">Hearbeat (BPM)</th>
                                <th scope="col">Oxygen (SPO<sup>2</sup>)</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($reading): ?>
                        <?php foreach($reading as $i): ?>
                        <tr>
                            <?php
                                if($user):
                                    foreach($user as $u):
                                        if($u['rfid'] == $i['rfid'] ):
                                            $username = $u['name'];
                                        endif;
                                    endforeach;
                                else:
                                    $username = 'N/A';
                                endif;
                            ?>
                            <td><?php echo $i['id']; ?></td>
                            <td><?php echo $i['date_created']; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $i['rfid']; ?></td>
                            <td><?php echo $i['temperature']; ?></td>
                            <td><?php echo $i['bpm']; ?></td>
                            <td><?php echo $i['spo2']; ?></td>
                            <td>
                                <a href="<?php echo base_url('/manage-report/edit/'.$i['id']);?>" class="btn btn-info btn-sm" title="Edit this row.">
                                Edit</a>
                                <a href="#delModal" class="trigger-btn btn btn-danger btn-delete btn-sm" data-toggle="modal" data-id="<?php echo $i['id']; ?>" title="Remove this row.">
                                Delete</a>
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
            document.getElementById('delId').href = '<?php echo site_url('/manage-report/delete/');?>' + id;
        })
    });

    
</script>
<script>

    

      $(document).ready(function() {

          // Table with export function
          var ManageTable = $('#ManageTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
              { extend: 'excel', className: 'btn btn-success glyphicon glyphicon-list-alt btn-tables', text: 'Excel <i class="fas fa-file-excel"></i>' },
              { extend: 'pdf', className: 'btn btn-danger glyphicon glyphicon-file btn-tables', text: 'PDF <i class="fas fa-file-pdf"></i>' },
              { extend: 'print', className: 'btn btn-primary glyphicon glyphicon-print btn-tables', text: 'Print <i class="fas fa-print"></i>' }
            ],
            "order": [[0, 'desc']],
            "searching": true
          });
          
          
            $('#rfidFilter').on('change', function () {
                if (!!this.value) {
                    ManageTable.column(3).search(this.value).draw();
                } else {
                    ManageTable.column(3).search(this.value).draw();
                }
            });

            $('#nameFilter').on('change', function () {
                if (!!this.value) {
                    ManageTable.column(2).search(this.value).draw();
                } else {
                    ManageTable.column(2).search(this.value).draw();
                }
            });

            
          
      } );  
      
    </script>
    
<?= $this->endSection() ?>

<?= $this->endSection() ?>

