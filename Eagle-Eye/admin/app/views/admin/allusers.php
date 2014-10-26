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
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">All Complaints</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>id</th>
									<th>Name</th>
									<th>Email</th>
									<th>User Type</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($allusers as $user){ ?>
								<tr>
								<td><?php echo $user->id;?></td>
								<td><?php echo $user->name;?></td>
								<td><?php echo $user->email;?></td>
								<td><?php echo $user->role;?></td>
								<td>
								
								<a href="<?php echo DIR."admin/view_complaint/".$user->id;?>" class="label label-success label-mini">view</a>
								
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