<body>
    <div class="container main-container">
    	<div class="row">
    		<div>LOGO</div>
    	</div>
    	<div class="row">
    	<div class="col-sm-12">
    		<form action="<?php echo DIR.'search'; ?>" role="form" method="get">
    			<div class="form-group">
    				<input type="text" name="pnumber" id="tags" class="form-control ">
    			</div>
    			<div class="form-group">
    				<input type="submit" class="btn btn-primary btn-default fa-search" value="search">
    			</div>
    			<div class="form-group">
    				<a href="<?php echo DIR.'complaint/add'; ?>" class="btn btn-danger" >Add Complaint</a>
    			</div>
    		</form>
    	</div>
    	</div>
    </div>
