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
					<h3 class="panel-title">Add User</h3>
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
							<input type="text" class="form-control" placeholder="Name" name="name">
						</div>
						<div class="form-group col-lg-8">
							<input type="text" class="form-control" placeholder="Phone" name="phone">
						</div>
						<div class="form-group col-lg-8">
							<input type="email" class="form-control" placeholder="Email" name="email">
						</div>
						<div class="form-group col-lg-8">
							<input type="password" class="form-control" placeholder="Password" name="password">
						</div>
						<div class="form-group col-lg-8">
							<input type="file" class="form-control" placeholder="Upload Image" name="image">
						</div>
						<div class="form-group col-lg-8">
							<select name="role" id="">
								<?php foreach ($roles as $role){ ?>
								<option value="<?php echo $role->id;?>"><?php echo $role->title;?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group col-lg-8">
							<input type="text" class="form-control" placeholder="Institution" name="institution">
						</div>
						<div class="form-group col-lg-8">
							<select class="" name="transport_co_id">
							<?php foreach ($allComps as $comp){ ?>
								<option value="<?php echo $comp->id;?>"><?php echo $comp->title;?></option>
							<?php } ?>
							</select>

						</div>
						<div class="form-group col-lg-8">
							<input type="submit" class="btn btn-primary" value="Add User" name="submit">
						</div>
					</form>

				</div>
			</div>
			
		</div>
	</div>
</div>