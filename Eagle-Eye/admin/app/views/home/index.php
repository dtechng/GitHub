

<body class="eagle-eye-background">
    <div class="container main-container">
    	<div class="row">
    		<div class="logo"><img src="images/eagle-eye-logo.png" /></div>
    	</div>
    	<div class="row">
	    	<div class="col-sm-12">
	    		<form action="<?php echo DIR.'search'; ?>" role="form" class="eagle-search" method="get">
	    			<div class="form-group">
	    				<input type="text" name="pnumber" id="tags" placeholder="Enter Plate Number" class="form-control">
	    			</div>
	    			<div class="form-group">
	    				<button class="btn btn-orange btn-full-width"><i class="fa fa-search"></i> SEARCH</button>
	    			</div>
	    			<div class="form-group">
	    				<a href="<?php echo DIR.'complaint/add'; ?>" class="btn btn-black btn-full-width">
	    					<i class="fa fa-file-text-o"></i> 
	    					ADD COMPLAINT
	    				</a>
	    			</div>
	    		</form>
	    	</div>
    	</div>
    </div>

