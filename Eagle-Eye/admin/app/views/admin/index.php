<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Dashboard</h1>
			<ol class="breadcrumb">
				<li>
					<i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
				</li>
				<li class="active">
					<i class="fa fa-edit"></i> Forms
				</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="panel panel-primary panel-center">
				<div class="panel-heading">
					<h3 class="panel-title">Total Complaints</h3>
				</div>
				<div class="panel-body">
					<p><i class=""></i></p>
					<p><h3><?php echo $allcomplaintscount;?></h3></p>
				</div>
				
			</div>
		</div>
		<div class="col-lg-4">
			<div class="panel panel-primary panel-center">
				<div class="panel-heading">
					<h3 class="panel-title">Treated Complaints</h3>
				</div>
				<div class="panel-body">
					<p><i class=""></i></p>
					<p><h3><?php echo $treatedComp[0]->total; ?></h3></p>
				</div>
				
			</div>
		</div>

		<div class="col-lg-4">
			<div class="panel panel-primary panel-center">
				<div class="panel-heading">
					<h3 class="panel-title">Total Users</h3>
				</div>
				<div class="panel-body">
					<p><i class=""></i></p>
					<p><h3><?php echo $allusers; ?></h3></p>
				</div>
				
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Latest Complaints</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>id</th>
									<th>Plate Number</th>
									<th>Complaint Type</th>
									<th>Route</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($latest as $complaint){ ?>
								<tr>
								<td><?php echo $complaint->id;?></td>
								<td><?php echo $complaint->plate_number;?></td>
								<td><?php echo $complaint->comp_type;?></td>
								<td><?php echo $complaint->state_from;?>(<?php echo $complaint->from_city;?>) - <?php echo $complaint->state_to;?>(<?php echo $complaint->to_city;?>)</td>
								<td>
									<a href="<?php echo DIR."admin/view_complaint/".$complaint->id;?>" class="label label-success label-mini">view</a>
								
								</td>
								</tr>
								
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>