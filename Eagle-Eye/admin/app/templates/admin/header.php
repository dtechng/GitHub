<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo $title.' | '.SITETITLE; ?></title>
    	<base href="<?php echo BASEPATH; ?>">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/dashboard.css">
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Project name</a>
				</div>
				<div class="navbar-collapse collapse col">
					<ul class="nav navbar-nav navbar-right ">
						<li><a href="<?php echo DIR."admin/allcomplaints";?>">Complaints</a></li>
						<li><a href="<?php echo DIR."admin/allusers";?>">Users</a></li>
						<li><a href="<?php echo DIR."admin/add_user";?>">Add User</a></li>
						<li><a href="<?php echo DIR."admin/add_transcomp";?>">Add Transport Company</a></li>
						<li><a href="<?php echo DIR."admin/signout";?>">Signout</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<li><a href="<?php echo DIR."admin/allcomplaints";?>">Complaints</a></li>
						<li><a href="<?php echo DIR."admin/allusers";?>">Users</a></li>
						<li><a href="<?php echo DIR."admin/add_user";?>">Add User</a></li>
						<li><a href="<?php echo DIR."admin/add_transcomp";?>">Add Transport Company</a></li>		
						<li><a href="<?php echo DIR."admin/signout";?>">Signout</a></li>
					</ul>
					
				</div>