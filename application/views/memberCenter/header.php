<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Grayscale - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="../css/grayscale.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?= base_url() ?>">MALL</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?= base_url() ?>#about">關於我們</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#">商品列</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?= base_url() ?>contacts#content">聯絡我們</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#">友善連結</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#">最新消息</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#">活動與報名</a>
            </li>
            <?php if(isset($_SESSION['user_account'])){ ?>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?= base_url() ?>memberCenter/index">會員專區</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?= base_url() ?>logout">登出</a>
              </li>
            <?php }else{ ?>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?= base_url() ?>registered#content">加入會員</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?= base_url() ?>login">登入</a>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?= base_url() ?>#download">詳情資訊</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
