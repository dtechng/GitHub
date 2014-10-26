<!--  -->
       <div class="bar">
        	<center>Complaints FOR - <?php echo strtoupper($complaints[0]->plate_number); ?></center>
        </div>

      <div class="container main-container">

      	<div class="search-list-results">
      	<?php foreach($complaints as $item){ ?>
      		<div class="row complaint-top">
	          	<!-- <div class="col-xs-3 complaint-icon">
	           		<i class="fa fa-car"></i>
	          	</div> -->
	        <?php if($item->image != ''){ ?>
            <img src="<?php echo $item->image; ?>" class="col-xs-3 complaint-icon" >
            <?php } else { ?>
            <img src="gallery/12345.jpg" class="col-xs-3 complaint-icon" >
            <?php } ?>
		        <div class="col-xs-9 complaint-top-details">
            		<!--<h4><small class="pull-right"><i class="fa fa-calendar"></i>  <?php echo date('M, d Y', strtotime($item->created)); ?></small></h4>-->
		            <ul>
			            <li><strong><i class="fa fa-map-marker"></i> From:</strong> <?php echo ucfirst($item->from_city); ?>, <?php echo $item->state_from; ?></li>
			            <li><strong><i class="fa fa-map-marker"></i> To:</strong> <?php echo ucfirst($item->to_city); ?>, <?php echo $item->state_to; ?></li>
			            <li><strong><i class="fa fa-th-list"></i> Category:</strong> <?php echo $item->comp_type; ?></li>
			            <li><strong><i class="fa fa-comments"></i> Responses:</strong>  <?php echo $item->response; ?> <!-- <span class="badge">3</span> --></li>
			            <li><strong style="color: #F87E76 !important;">
                    <i class="fa fa-calendar"></i> <?php echo date('M, d Y', strtotime($item->created)); ?></strong></li>
		            </ul>
		            <a href="<?php echo DIR.'complaint/detail/'.$item->id; ?>"><i class="fa fa-angle-double-right read-more"></i></a>
		        </div>
	        </div>
	    <?php } ?>
	        <!--<div class="eagle-eye-load-trans-bg"></div>-->
      	</div>

      </div>

     <!--  <footer class="footer">
      		&nbps; 2014, EAGLE-EYE. All Right Reserved.
      </footer>
      <script src="js/jquery.min.js" type="text/javascript"></script>
      <script src="js/bootstrap.min.js"></script>
    </body>
  </html>