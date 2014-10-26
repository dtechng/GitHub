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
  <link rel="shortcut icon" href="images/eagle-eye-logo.png" type="image/png">



  <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>

  <?php if(isset($homepage_search)){?>
  <script>
  $(function() {
    var availableTags = [
    <?php 
    $i=0; foreach($autocomplete as $item){ 
      if($i == 0)
          $source = '"'.$item->plate_number.'"';
      else 
          $source .= ',"'.$item->plate_number.'"';
     
     $i++; }
 echo $source;
      ?>
    ];
    $("#tags").autocomplete({
      source: availableTags
    });
  });
  </script>
    <?php } ?>

    
</head>