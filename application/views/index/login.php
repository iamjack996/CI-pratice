<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Grayscale - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/grayscale.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/internship/index">MALL</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
      </div>
    </nav>

    <header class="masthead" id="about">

      <!-- About Section -->
      <section class="content-section text-center">
        <p><?php if(null !== $this->session->flashdata('msg')){
           echo('** '.$this->session->flashdata('msg')).' **';
         } ?></p>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2>登入會員</h2>
              <?php echo validation_errors(); ?>
              <?php echo form_open('/logincheck');?>
              <fieldset>
                <div class="row">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" value="<?= get_cookie('email'); ?>" aria-describedby="emailHelp" placeholder="Enter your email">
                  <small id="emailHelp" class="form-text text-muted">Here fill in your account number.</small>
                </div>
                <div class="row">
                  <label>Password</label>
                  <input type="text" class="form-control" name="password" value="<?= get_cookie('password'); ?>" aria-describedby="emailHelp" placeholder="Enter your password">
                  <small id="emailHelp" class="form-text text-muted">Here fill in your password.</small>
                </div>
                <div class="container">
                  <label for="checkbox">記住我</label>
                  <?php if(null !==(get_cookie('email'))){ ?>
                    <input type="checkbox"  name="remember" value="keep" checked>
                  <?php }else{ ?>
                    <input type="checkbox"  name="remember" value="keep">
                  <?php } ?>
                </div>

                    <?php if(isset($msg)){echo $msg;} ?>

                <br>
                <div class="container">
                  <button type="submit" class="btn btn-secondary">登入</button>
                  <a href="<?= base_url() ?>registered#content" class="btn btn-secondary">註冊</a>
                </div>

              </fieldset>
              </form>
            </div>
          </div>
        </div>
      </section>

    </header>
