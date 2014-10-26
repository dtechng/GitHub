<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title.' | '.SITETITLE; ?></title>
  <meta name="author" content="Eagle-Eye" />
  <meta name="description" content="Helping commuters avoid bad transportation services by providing commuters and other stakeholders a channel to report and flag faulty vehicles and other irregularities on the part of the drivers." />
  <meta name="keywords" content="commuters, bad transportation, stakeholders, report, flag faulty vehicles, irregularities, reckless drivers, reckless driving" />
    <base href="<?php echo BASEPATH; ?>">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
  <style type="text/css">
  * {
margin: 0;
}
html, body {
height: 100%;
}
.wrapper {
min-height: 100%;
height: auto !important;
height: 100%;
margin: 0 auto -4em;
}
.footer, .push {
height: 4em;
}
</style>
</head>
      <?php if(isset($complaint_detail_page)){ ?>
      <body class="">
      <?php } else { ?>
      <body class="eagle-eye-background">
      <?php } ?>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId      : '716867948397482',
            xfbml      : true,
            version    : 'v2.1'
          });
        };

        (function(d, s, id){
           var js, fjs = d.getElementsByTagName(s)[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement(s); js.id = id;
           js.src = "//connect.facebook.net/en_US/sdk.js";
           fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
      </script>
          <div class="wrapper">
            <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" 
                        data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand top-bar-logo" href="<?php echo DIR; ?>">
                        <img src="images/eagle-eye-logo.png" /></a>
                    </div>
                     <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?php echo DIR; ?>">Home</a></li>
                            <li><a href="<?php echo DIR.'complaint/add'; ?>">Add Complaint</a></li>
                        </ul>
                    </div>
                </div>
            </div>

      <div class="container main-container border-light">
        <div class="row marg-top-50 complaint-top">
          <?php if($detail->image != ''){ ?>
            <img src="<?php echo $detail->image; ?>" class="col-xs-3 complaint-icon" >
            <?php } else { ?>
            <img src="gallery/12345.jpg" class="col-xs-3 complaint-icon" >
            <?php } ?>
       
	        <div class="col-xs-9 complaint-top-details orange-list">
	            <h4><?php echo strtoupper($detail->plate_number); ?>  </h4>
	            <ul>
		            <li><strong><i class="fa fa-map-marker"></i> From:</strong> <?php echo $detail->state_from; ?>, <?php echo $detail->from_city; ?></li>
		            <li><strong><i class="fa fa-map-marker"></i> To:</strong> <?php echo $detail->state_to; ?>, <?php echo $detail->to_city; ?></li>
                	<li><strong><i class="fa fa-twitch"></i>  Complaint Type:</strong> <?php echo $detail->comp_type; ?></li>
		            <li><strong><i class="fa fa-institution"></i> Transport Company:</strong> <?php echo $detail->trans_comp; ?></li>
		            <li><strong><i class="fa fa-comments"></i> Response: <?php echo $detail->response; ?> <!-- <span class="badge">3</span> --></li>
                	<li><strong><i class="fa fa-calendar"></i> Date:</strong> <?php echo date('M, d Y', strtotime($detail->created)); ?></li>
	            </ul>
	        </div>
        </div>
        <?php if(count($response) < 1){ ?>

              <?php if($days > 4){  ?>
              <div class="row">
                	<div class="orange-share" style="background-color: #CBCBCB">
                  	<span>Share On:</span>
                    <?php $share_image = DIR.'app/templates/default/gallery/12345.jpg'.$detail->image; ?>
                    <div class="fb-share-button" data-href="http://exolvetechnologies.com/eagleeye/"></div>
                  	<a 
                    href="javascript:;" 
                    onclick="FB.ui({

                            method: 'share',
                            action_type: 'og.likes',
                            action_properties: JSON.stringify({object:'http://exolvetechnologies.com/eagleeye/',})
                            }, function(response){});">
                  		<i class="fa fa-facebook-square"></i>
                  	</a>

                  	<a class="twitter-share-button" href="https://twitter.com/share">
                  		<i class="fa fa-twitter-square"></i>
                  	</a>
                    <script type="text/javascript">
                        window.twttr=(function(d,s,id){
                          var t,js,fjs=d.getElementsByTagName(s)[0];
                          if(d.getElementById(id)){
                            return}js=d.createElement(s);js.id=id;
                            js.src="https://platform.twitter.com/widgets.js";
                            fjs.parentNode.insertBefore(js,fjs);
                            return window.twttr||(t={_e:[],ready:function(f){
                              t._e.push(f)}})}(document,"script","twitter-wjs"));
                      </script>
                  	<!-- <a href="#">
                  		<i class="fa fa-google-plus-square"></i>
                  	</a> -->
                	</div>
              </div>
              <?php } else { ?>
              <div class="row"><div class="orange-share" style="background-color: #187CAF"></div></div>
              <?php } ?>
        <?php } else if(count($response) >  0) { ?>
        <div class="row">
            <div class="orange-share" style="background-color: #187CAF">
            </div>
        </div>
        <?php } ?>
        <div class="row"> 
            <div class="complaint-description">
              Complaint: 
            	<p> <?php echo $detail->description; ?></p>
            </div>
        </div>
      

        <div class="row complaint-comments">
        <?php foreach($response as $item){ ?>
			<div class="response">
				<div class="well">
					<div>
					  	<h4><i class="fa fa-user"></i> <?php echo strtoupper($item->institution); ?></h4>
					  	<p><?php echo $item->content; ?></p>
              Date:  <?php echo date('M, d Y', strtotime($item->created)); ?>
					</div>
				</div>
			</div>
      <?php } ?>

	
        </div>

     
      </div>

<div class="push"></div>
      </div><!-- END WRAPPER -->


  <footer class="footer" style="color: #fff">
          &copy; 2014. EAGLE-EYE. All Right Reserved.
    </footer>

<script src="js/bootstrap.min.js"></script> 
</body>
</html>