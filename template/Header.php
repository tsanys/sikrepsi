<?php

  session_start();
  if(!isset($_SESSION['id'])) {
    header('location: ../index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Creative - Bootstrap 3 Responsive Admin Template"
    />
    <meta name="author" content="GeeksLabs" />
    <meta
      name="keyword"
      content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal"
    />
    <link rel="shortcut icon" href="../img/logo-big.png" />

    <title>Sistem Informasi Kredit POIN Siswa - Pandu Norsya'bani</title>

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <!-- bootstrap theme -->
    <link href="../css/bootstrap-theme.css" rel="stylesheet" />
    <!--external css-->
    <!-- font icon -->
    <link href="../css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="../css/style.css" rel="stylesheet" />
    <link href="../css/style-responsive.css" rel="stylesheet" />
  </head>

  <body>
    <!-- container section start -->
    <section id="container" class="">
      <!--header start-->

      <header class="header dark-bg">
        <div class="toggle-nav">
          <div
            class="icon-reorder tooltips"
            data-original-title="Toggle Navigation"
            data-placement="bottom"
          >
            <i class="icon_menu"></i>
          </div>
        </div>

        <!--logo start-->
        <a href="index.html" class="logo">
          <span class="lite">SIKREPSI-893</span></a
        >
        <!--logo end-->

        <div class="top-nav notification-row">
          <!-- notificatoin dropdown start-->
          <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="profile-ava">
                  <img alt="Avatar" src="https://ui-avatars.com/api/?size=32&name=<?php echo $_SESSION['nama'] ?>" />
                </span>
                <span class="username"><?php echo $_SESSION['nama'] ?></span>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu extended logout">
                <div class="log-arrow-up"></div>
                <li class="eborder-top">
                  <a href="#"><i class="icon_profile"></i> My Profile</a>
                </li>
                <li>
                  <a href="../login/logout.php" onclick="return confirm('Ingin Logout!')"><i class="icon_key_alt"></i> Log Out</a>
                </li>
              </ul>
            </li>
            <!-- user login dropdown end -->
          </ul>
          <!-- notificatoin dropdown end-->
        </div>
      </header>
      <!--header end-->
