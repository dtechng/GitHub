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
					<h3 class="panel-title">Change Password</h3>
				</div>

				<div class="panel-body">
					<?php if($success !=''){ ?>
					<div class="alert alert-success">
						<?php echo $success; ?>
					</div>
					<?php } ?>
					<?php if($error !=''){ ?>
					<div class="alert alert-danger">
						<?php echo $error; ?>
					</div>
					<?php } ?>
				
					<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

						<div class="form-group col-lg-8">
							<input type="text" name="old_password" placeholder="Old Password" class="form-control">
						</div>
						<div class="form-group col-lg-8">
							<input type="text" name="new_password" placeholder="New Password" class="form-control">
						</div>
						
						
						
						<div class="form-group col-lg-8">
							<input type="submit" class="btn btn-primary" value="Send Response" name="change">
						</div>
					</form>

				</div>
			</div>
			
		</div>
	</div>
</div>