<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title.' | '.SITETITLE; ?></title>
    <base href="<?php echo BASEPATH; ?>">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css">
    <!--  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script> -->

  <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>

  <?php if(isset($complaint_search)){?>
  <script>
  $(function() {
    var availableTags = [
    <?php 
    $i=0; foreach($transport_autocomplete as $item){ 
      if($i == 0)
          $source = '"'.$item->title.'"';
      else 
          $source .= ',"'.$item->title.'"';
     
     $i++; }
 echo $source;
      ?>
    ];
    $("#transport_tags").autocomplete({
      source: availableTags
    });
  });
  </script>
    <?php } ?>
</head>

      <body class="eagle-eye-background">
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

            <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand top-bar-logo" href="<?php echo DIR; ?>"><img src="images/eagle-eye-logo.png" /></a>
                    </div>
                     <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?php echo DIR; ?>">Home</a></li>
                            <li><a href="javascript:;">About</a></li>
                            <li><a href="javascript:;">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
