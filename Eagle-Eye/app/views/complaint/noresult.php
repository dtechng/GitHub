            <div class="bar">
            	<center>No Complaint Filed</center>
            </div>

            <div class="container main-container marg-top-50">
                    
                        <form action="" role="form" class="eagle-complaint-form form-horizontal">
                        	<p>
                        		<i class="fa fa-smile-o fs-8"></i>
                        		<div class="alert alert-danger" role="alert">
                        			<strong>Wow,</strong> seems there are no reports for this vehicle <strong><?php echo strtoupper($platenumber); ?></strong>. 
                        			<br/><br/>However,if you have any unpleasant experience on this vehicle or
                                     you think its not road worthy, Click link below 
                        			<br/><a href="<?php echo DIR.'complaint/add'; ?>"><strong>Add Complaints</strong></a>
                        		</div>
                        	</p>
                        </form>
                    
                </div>
            </div>
          <!--   <script src="js/jquery.min.js" type="text/javascript"></script>
            <script src="js/bootstrap.min.js"></script>
        </body>
    </html> -->