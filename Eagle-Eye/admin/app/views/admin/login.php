<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
<title><?php echo $title.' | '.SITETITLE; ?></title>
      <base href="<?php echo BASEPATH; ?>">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">
      <?php if($error !=''){ ?>
      <div class="alert alert-danger">
       <?php echo $error;?>
      </div>
      <?php } ?>
      <form class="form-signin" method="post" action="" role="form">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="email" class="form-control" placeholder="Email address" name="email" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <input type="submit" name="login" class="btn btn-lg btn-primary btn-block" value="Sign in">
      </form>

    </div> <!-- /container -->


  </body>
</html>
