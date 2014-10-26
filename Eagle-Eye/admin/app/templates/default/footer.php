<!-- <script src="js/jquery.min.js" type="text/javascript"></script> -->
<script src="js/bootstrap.min.js"></script>	
</body>
</html>

<?php if(isset($complaint_search)){ ?>

<?php //if(!isset($_COOKIE["use_eagle_as_anonymous"]) && empty($_COOKIE["use_eagle_as_anonymous"])){ ?>
<?php if(!isset($auth) && empty($auth)){ ?>
<script>
$(document).ready(function() {
	$('#AlertGET').modal('show');
    //console.log( "ready!" );
});
</script>
<?php } ?>

<?php //} ?>


<div class="modal fade marg-top-150" id="AlertGET">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Report Option</h4>
      </div>
      <div class="modal-body">
        <p>Please select a Reporting option to continue with your report</p>
        <div class="select-btn-opt">
        	<a href="<?php echo DIR.'mydetails'; ?>" class="btn btn-orange btn-full-width">Use my details</a>

        	<button class="btn btn-black btn-full-width" data-dismiss="modal">Anonymous</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>


<?php if(isset($success) || isset($error)){ ?>
<script>
$(document).ready(function() {
	$('#notifications').modal('show');
    //console.log( "ready!" );
});
</script>
<?php } ?>

<div class="modal fade marg-top-150" id="notifications">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <!-- <h4 class="modal-title">Report Option</h4> -->
      </div>
      <div class="modal-body">
        <div class="select-btn-opt">
        <?php if(isset($success)){ ?>
        	<button class="btn btn-orange btn-full-width" data-dismiss="modal"><?php echo $success; ?></button>
		<?php } else if(isset($error)){ ?>
        	<button class="btn btn-black btn-full-width" data-dismiss="modal"><?php echo $error; ?></button>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

