<?php
  session_start();

  require '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';
?>

<?php
  $userID = '';
  $fullName = '';
  $userEmail = '';
  $companyID = '';
  $companyName = '';
  $companyEmail = '';
  $companyAddress = '';
  $companyContactNo = '';
  $companyBusinessType = '';
  $companyURL = '';
//   $companyOwnerImage = '';
//   $companyLogoImage = '';
//   $companyHeaderImage = '';
//   $companyVideos = '';
  $companyTagline = '';
  $companyInfo = '';
  $companyOwnerInfo = '';

  if (isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['userID'];
    $fullName = $_SESSION['userName'];
    $userEmail = $_SESSION['userEmail'];
    $companyID = $_SESSION['companyID'];
    $companyName = $_SESSION['companyName'];
    $companyEmail = $_SESSION['companyEmail'];
    $companyAddress = $_SESSION['companyAddress'];
    $companyContactNo = $_SESSION['contactNo'];
    $companyBusinessType = $_SESSION['businessType'];
    $companyURL = $_SESSION['company_url'];
    // $companyOwnerImage = $_SESSION['companyOwnerImage'];
    // $companyLogoImage = $_SESSION['companyLogoImage'];
    // $companyHeaderImage = $_SESSION['companyHeaderImage'];
    // $companyVideos = $_SESSION['companyVideos'];
    $companyTagline = $_SESSION['companyTagline'];
    $companyInfo = $_SESSION['companyInfo'];
    $companyOwnerInfo = $_SESSION['companyOwnerInfo'];
  }
?>

<?php
  if (isset($_GET['company'])) {
    $companyName = $_GET['company'];

    $sql = "SELECT * FROM company WHERE company_url = ?";
    $stmt = mysqli_stmt_init($conn);
  
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die('SQL Failed: ' . mysqli_error($conn));
    } else {
      mysqli_stmt_bind_param($stmt, "s", $companyName);
      mysqli_stmt_execute($stmt);
      
      $result = mysqli_stmt_get_result($stmt);
  
      while ($row = mysqli_fetch_assoc($result)) {
          $companyID = $row['company_ID'];
          $companyName = $row['company_name'];
          $companyEmail = $row['company_email'];
          $companyAddress = $row['company_address'];
          $companyContactNo = $row['company_contact_number'];
          $companyBusinessType = $row['company_business_type'];
          $companyURL = $row['company_url'];
        //   $companyOwnerImage = $_SESSION['companyOwnerImage'];
        //   $companyLogoImage = $_SESSION['companyLogoImage'];
        //   $companyHeaderImage = $_SESSION['companyHeaderImage'];
        //   $companyVideos = $_SESSION['companyVideos'];
          $companyTagline = $row['company_tagline'];
          $companyInfo = $row['company_info'];
          $companyOwnerInfo = $row['company_owner_info'];
      }
  
      $sql = "SELECT * FROM user WHERE user_ID = $companyID";
      $stmt = mysqli_stmt_init($conn);
  
      if (!mysqli_stmt_prepare($stmt, $sql)) {
          die('SQL Failed: ' . mysqli_error($conn));
      } else {
          mysqli_stmt_execute($stmt);
          
          $result = mysqli_stmt_get_result($stmt);
  
          while ($row_user = mysqli_fetch_assoc($result)) {
              $userID = $row_user['user_ID'];
              $fullName = $row_user['user_name'];
          }
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Trimatrix Lab">
    <meta name="description" content="">
    <meta name="keywords" content="">


    <title>Flatrica | Material CV/Resume</title>
    <link rel="icon" href="images/site/fav-icon.png">

    <!--APPLE TOUCH ICON-->
    <link rel="apple-touch-icon" href="images/site/apple-touch-icon.png">


    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>


    <!-- MATERIAL ICON FONT -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link href="stylesheets/vendors/font-awesome.min.css" rel="stylesheet">


    <!-- ANIMATION -->
    <link href="stylesheets/vendors/animate.min.css" rel="stylesheet">

    <!-- MAGNIFICENT POPUP -->
    <link href="stylesheets/vendors/magnific-popup.css" rel="stylesheet">

    <!-- SWIPER -->
    <link href="stylesheets/vendors/swiper.min.css" rel="stylesheet">


    <!-- MATERIALIZE -->
    <link href="stylesheets/vendors/materialize.css" rel="stylesheet">
    <!-- BOOTSTRAP -->
    <link href="stylesheets/vendors/bootstrap.min.css" rel="stylesheet">


    <!-- CUSTOM STYLE -->
    <link href="stylesheets/style.css" id="switch_style" rel="stylesheet">
  
  
</head>
<body>


<!--==========================================
                  PRE-LOADER
===========================================-->
<!-- <div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="box-holder animated bounceInDown">
                <span class="load-box"><span class="box-inner"></span></span>
            </div> -->
            <!-- NAME & STATUS -->
            <!-- <div class="text-holder text-center">
                <h2><?php echo $fullName; ?></h2> -->
                <!-- REPLACE ME -->
                <!-- <h6>Software Engineer & UI/UX Expert</h6>
            </div>
        </div>
    </div>
</div> -->

<!--==========================================
                    HEADER
===========================================-->
<header id="home">
    <nav id="theMenu" class="menu">

        <!--MENU-->
        <div id="menu-options" class="menu-wrap">

            <!--PERSONAL LOGO-->
            <div class="logo-flat">
                <img alt="personal-logo" class="img-responsive" src="images/profile/john.png">
            </div>
            <br>

            <!--OPTIONS-->
            <a href="#home"><i class="title-icon fa fa-user"></i>Home</a>
            <a href="#about"><i class="title-icon fa fa-dashboard"></i>About</a>
            <a href="#portfolios"><i class="title-icon fa fa-archive"></i>Portfolios</a>
            <a href="#testimonials"><i class="title-icon fa fa-users"></i>Testimonials</a>
            <a href="edit-company.php"><i class="title-icon fa fa-edit"></i>Edit Profile</a>
            <form action="../includes/user-management/logout.inc.php" method="POST"><button type="submit" name="logout" style="background:none; border:none; padding-left: 23px"><i class="title-icon fa fa-sign-out"></i>Log out</button></form>
        </div>

        <!-- MENU BUTTON -->
        <div id="menuToggle">
            <div class="toggle-normal">
                <i class="material-icons top-bar">remove</i>
                <i class="material-icons middle-bar">remove</i>
                <i class="material-icons bottom-bar">remove</i>
            </div>
        </div>
    </nav>

    <!--HEADER BACKGROUND-->
    <?php
        $sql = "SELECT * FROM company WHERE company_ID = $companyID";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            die('SQL Failed: ' . mysqli_error($conn));
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result)) {
                $headerImage = $row['company_header_image'];

                if (empty($headerImage)) {
    ?>
                    <div class="header-background section" id="header_background_image"></div>
    <?php
                } else {
                    $fileLocation = 'companies' . DIRECTORY_SEPARATOR . $companyURL . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . 'company_header' . DIRECTORY_SEPARATOR . $headerImage;
    ?>
                    <div class="header-background section" id="header_background_image" style="background-image: url(companies/<?php echo $companyURL; ?>/profile/company_header/<?php echo $headerImage; ?>)">
                    </div>
    <?php
                }
            }
        }
    ?>
</header>


<!--==========================================
                   V-CARD
===========================================-->
<div id="v-card-holder" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <!-- V-CARD -->
                <div id="v-card" class="card">

                    <!-- PROFILE PICTURE -->
                    <div id="profile" class="right">
                        <?php
                            $sql = "SELECT * FROM company WHERE company_ID = $companyID";
                            $stmt = mysqli_stmt_init($conn);

                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                die('SQL Failed: ' . mysqli_error($sql));
                            } else {
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $logoImage = $row['company_logo_image'];

                                    if (empty($logoImage)) {
                        ?>
                                        <img alt="profile-image" class="img-responsive" id="logo_image" src="images/profile/profile.png">
                        <?php
                                    } else {
                                        $fileLocation = 'companies' . DIRECTORY_SEPARATOR . $companyURL . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . 'company_logo' . DIRECTORY_SEPARATOR . $logoImage; 
                        ?>
                                        <img alt="profile-image" class="img-responsive" id="logo_image" src="companies/<?php echo $companyURL; ?>/profile/company_logo/<?php echo $logoImage; ?>">
                        <?php
                                    }
                                }
                            }
                        ?>
                        <div class="slant"></div>

                        <!--EMPTY PLUS BUTTON-->
                        <!-- <div class="btn-floating btn-large add-btn"><i class="material-icons">add</i></div> -->

                        <!--VIDEO PLAY BUTTON-->
                        <div id="button-holder" class="btn-holder">
                            <div id="play-btn" class="btn-floating btn-large btn-play">
                                <i id="icon-play" class="material-icons">play_arrow</i>
                            </div>
                        </div>
                    </div>
                    <!--VIDEO CLOSE BUTTON-->
                    <div id="close-btn" class="btn-floating icon-close">
                        <i class="fa fa-close"></i>
                    </div>

                    <div class="card-content">

                        <?php
                            $sql = "SELECT * FROM company WHERE company_ID = $companyID";
                            $stmt = mysqli_stmt_init($conn);
                            
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                              die('SQL Failed: ' . mysqli_error($conn));
                            } else {
                              mysqli_stmt_execute($stmt);
                              $result = mysqli_stmt_get_result($stmt);

                              while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <!-- NAME & STATUS -->
                                <div class="info-headings">
                                    <h4 class="text-uppercase left"><?php echo $companyName; ?></h4>
                                    <h6 class="text-capitalize left"><?php echo $row['company_tagline']; ?></h6>
                                </div>

                                <!-- CONTACT INFO -->
                                <div class="infos">
                                    <ul class="profile-list">
                                        <li class="clearfix">
                                            <span class="title"><i class="material-icons">email</i></span>
                                            <span class="content"><?php echo $row['company_email']; ?></span>
                                        </li>
                                        <!-- <li class="clearfix">
                                            <span class="title"><i class="material-icons">language</i></span>
                                            <span class="content"><?php echo $companyURL; ?></span>
                                        </li> -->
                                        <!-- <li class="clearfix">
                                            <span class="title"><i class="fa fa-skype" aria-hidden="true"></i></span>
                                            <span class="content">yourusername@skype.com</span>
                                        </li> -->
                                        <li class="clearfix">
                                            <span class="title"><i class="material-icons">phone</i></span>
                                            <span class="content"><?php echo $row['company_contact_number']; ?></span>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title"><i class="material-icons">place</i></span>
                                            <span class="content"><?php echo $row['company_address']; ?></span>
                                        </li>

                                    </ul>
                                </div>
                        <?php
                              }
                            }
                        ?>

                        <!--LINKS-->
                        <div class="links">
                            <?php
                                $sql = "SELECT * FROM `company_social_media` WHERE company_ID = $companyID";
                                $stmt = mysqli_stmt_init($conn);

                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    die('SQL Failed: ' . mysqli_error($conn));
                                } else {
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                    while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                        <!-- FACEBOOK-->
                                        <a href="https://www.facebook.com/<?php echo $row['media_facebook']; ?>" target="_blank" id="first_one"
                                        class="social btn-floating indigo"><i
                                                class="fa fa-facebook"></i></a>
                                        <!-- TWITTER-->
                                        <a href="https://twitter.com/<?php echo $row['media_twitter']; ?>" target="_blank" class="social  btn-floating blue"><i
                                                class="fa fa-twitter"></i></a>
                                        <!-- INSTAGRAM+-->
                                        <a href="https://www.instagram.com/<?php echo $row['media_instagram']; ?>"  target="_blank" class="social  btn-floating red"><i
                                                class="fa fa-instagram"></i></a>
                                        <!-- LINKEDIN-->
                                        <a href="https://www.linkedin.com/in/<?php echo $row['media_linkedin']; ?>" target="_blank" class="social  btn-floating blue darken-3"><i
                                                class="fa fa-linkedin"></i></a>
                                        <!-- RSS-->
                                        <!-- <a href="#" class="social  btn-floating orange darken-3"><i
                                                class="fa fa-rss"></i></a> -->
                            <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>

                    <style>
                        .videoWrapper iframe {margin: auto; width: 100%; height: 100%;}
                    </style>
                    <?php
                        $sql = "SELECT * FROM company WHERE company_ID = $companyID";
                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            die('SQL Failed: ' . mysqli_error($conn));
                        } else {
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $videoLink = $row['company_videos'];

                                if (empty($videoLink)) {
                    ?>
                                    <div class="videoWrapper">
                                        <iframe id="html-video" class="video" style="display:block; margin: 0 auto;" src="https://www.youtube-nocookie.com/embed/<?php echo $videoLink; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                    <?php
                                } else {
                    ?>
                                    <div class="videoWrapper">
                                        <iframe id="html-video" class="video" style="display:block; margin: 0 auto;" src="https://www.youtube-nocookie.com/embed/<?php echo $videoLink; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                    <?php
                                }
                            }
                        }
                    ?>
                    <!--HTML 5 VIDEO-->
                    <!-- <video id="html-video" class="video" poster="images/poster/poster.jpg" controls>
                        <source src="videos/........" type="video/webm">
                        <source src="videos/..........." type="video/mp4">
                    </video>-->

                </div>
            </div>
        </div>
    </div>
</div>

<!--==========================================
                   ABOUT
===========================================-->
<div id="about" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- DETAILS -->
                <div id="about-card" class="card">
                    <div class="card-content">
                        <!-- ABOUT PARAGRAPH -->
                        <p>
                            <?php
                                $sql = "SELECT company_info FROM company WHERE company_ID = $companyID";
                                $stmt = mysqli_stmt_init($conn);
                                
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    die('SQL Failed: ' . mysqli_error($conn));
                                } else {
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                    while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                        <p><?php echo $row['company_info']; ?></p>
                            <?php
                                    }
                                }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--==========================================
             OWNER INFORMATION
===========================================-->
<section id="testimonials" class="section">
    <div class="container">
        <!-- SECTION TITLE -->
        <div class="section-title">
            <h4 class="text-uppercase text-center"><img src="images/icons/user-male.png" alt="demo">Company Owner's Profile</h4>
        </div>
        <div id="testimonials-card" class="row card">
            <div class="col-md-12 col-xs-12">

                <div class="col-md-12">
                    <!--CLIENT IMAGE-->
                    <div class="client-img center-block">
                        <?php
                            $sql = "SELECT * FROM company WHERE company_ID = $companyID";
                            $stmt = mysqli_stmt_init($conn);

                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                die('SQL Failed: ' . mysqli_error($conn));
                            } else {
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $ownerImage = $row['company_owner_image'];

                                    if (empty($ownerImage)) {
                        ?>
                                        <img alt="client-image" class="center-block" id="owner_image" src="images/clients/client-1.png">
                        <?php
                                    } else {
                                        $fileLocation = 'companies' . DIRECTORY_SEPARATOR . $companyURL . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . 'company_owner' . DIRECTORY_SEPARATOR . $ownerImage;
                        ?>
                                        <img alt="client-image" class="center-block" id="owner_image" src="companies/<?php echo $companyURL; ?>/profile/company_owner/<?php echo $ownerImage; ?>">
                        <?php
                                    }
                                }
                            }
                        ?>
                    </div>
                    <!--CLIENT QUOTE-->
                    <blockquote>
                        <?php
                                $sql = "SELECT company_owner_info FROM company WHERE company_id = $companyID";
                                $stmt = mysqli_stmt_init($conn);
                                
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    die('SQL Failed: ' . mysqli_error($conn));
                                } else {
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <?php echo nl2br($row['company_owner_info']); ?>
                            <?php
                                    }
                                }
                            ?>
                        </p>
                        <cite><?php echo $fullName; ?></cite>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>


<!--==========================================
                  PRODUCTS & SERVICES
===========================================-->
<section id="portfolios" class="section">
    <div class="container">
        <!-- SECTION TITLE -->
        <div class="section-title">
            <h4 class="text-uppercase text-center"><img src="images/icons/offer.png" alt="demo">What We Offer</h4>
        </div>
        <div id="portfolios-card" class="row">

            <!--OPTIONS-->
            <ul class="nav nav-tabs">
                    <!--ALL CATEGORIES-->
                <li class="active waves-effect list-shuffle"><a id="all-sample" class="active" href="#all"
                                                                data-toggle="tab">PORTFOLIOS</a>
            </ul>

            <!--CATEGORIES CONTENT-->
            <div class="tab-content">

                <div id="all">
                </div>
            </div>
        </div>
    </div>
</section>




<!--==========================================
             TESTIMONIALS
===========================================-->
<section id="testimonials" class="section">
    <div class="container">
        <!-- SECTION TITLE -->
        <div class="section-title">
            <h4 class="text-uppercase text-center"><img src="images/icons/bubbles-alt.png" alt="demo">Testimonials</h4>
        </div>
        <div id="testimonials-card" class="row card">
            <div class="col-md-12 col-xs-12">

                <!-- SLIDER STRUCTURE -->
                <div id="clients-slider"
                     class="swiper-container swiper-container-clients">
                    <div class="swiper-wrapper">
                        <!-- SLIDE ONE -->
                        <?php
                            $sql = "SELECT * FROM `company_testimonial` WHERE company_ID = ?";
                            $stmt = mysqli_stmt_init($conn);

                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                die('SQL Failed: ' . mysqli_error($conn));
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $companyID);
                                mysqli_stmt_execute($stmt);

                                $result = mysqli_stmt_get_result($stmt);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $fileLocation = 'companies' . DIRECTORY_SEPARATOR . $companyURL . DIRECTORY_SEPARATOR . 'testimonials' . DIRECTORY_SEPARATOR . $row['testimonial_image'];

                        ?>
                                    <div class="swiper-slide">
                                        <div class="col-md-12">
                                            <!--CLIENT IMAGE-->
                                            <div class="client-img center-block">
                                                <img alt="<?php echo $row['testimonial_name']; ?>" class="center-block" src="<?php echo $fileLocation; ?>">
                                            </div>
                                            <!--CLIENT QUOTE-->
                                            <blockquote>
                                                <?php echo $row['testimonial_description']; ?>
                                                <cite><?php echo $row['testimonial_name']; ?></cite>
                                            </blockquote>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination swiper-pagination-clients"></div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--==========================================
             CLIENTS
===========================================-->
<section id="testimonials" class="section">
    <div class="container">
        <!-- SECTION TITLE -->
        <div class="section-title">
            <h4 class="text-uppercase text-center"><img src="images/icons/handshake.png" alt="demo">Clients</h4>
        </div>
        <div id="clients">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="clients-wrap">
                            <!--CLIENT LOGO'S-->
                            <ul id="clients-list" class="clearfix">
                                <?php
                                    $sql = "SELECT * FROM `company_client` WHERE company_ID = ?";
                                    $stmt = mysqli_stmt_init($conn);

                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        die('SQL Failed: ' . mysqli_error($conn));
                                    } else {
                                        mysqli_stmt_bind_param($stmt, "s", $companyID);
                                        mysqli_stmt_execute($stmt);

                                        $result = mysqli_stmt_get_result($stmt);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $fileLocation = 'companies' . DIRECTORY_SEPARATOR . $companyURL . DIRECTORY_SEPARATOR . 'clients' . DIRECTORY_SEPARATOR . $row['client_image'];

                                ?>
                                            <li><img src="<?php echo $fileLocation; ?>" alt="<?php echo $row['client_name']; ?>"></li>
                                <?php
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==========================================
                  DOWNLOADABLES
===========================================-->
<section id="skills" class="section">
    <div class="container">
        <!-- SECTION TITLE -->
        <div class="section-title">
            <h4 class="text-uppercase text-center"><img src="images/icons/folder-document.png" alt="demo">Documents</h4>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="skills-card" class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <!-- FIRST SKILL SECTION -->
                                <div class="skills-title">
                                    <h6 class="text-center">Brochures</h6>
                                </div>
                                <?php
                                    $sql = "SELECT * FROM `company_document` WHERE company_ID = ? AND document_category = 'Brochures'";
                                    $stmt = mysqli_stmt_init($conn);

                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        die('SQL Failed: ' . mysqli_error($conn));
                                    } else {
                                        mysqli_stmt_bind_param($stmt, "s", $companyID);
                                        mysqli_stmt_execute($stmt);

                                        $result = mysqli_stmt_get_result($stmt);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $fileLocation = 'companies' . DIRECTORY_SEPARATOR . $companyURL . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR . $row['document_name'];

                                ?>
                                            <!-- FIRST SKILL BAR -->
                                            <div class="text-center">
                                                <span style="color: #fff;">
                                                    <a href="companies/<?php echo $companyURL; ?>/documents/<?php echo $row['document_name']; ?>" download><?php echo $row["document_name"]; ?></a>
                                                </span>
                                            </div>
                                <?php
                                        }
                                    }
                                ?>
                            </div>


                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <!-- SECOND SKILL SECTION -->
                                <div class="skills-title">
                                    <h6 class="text-center">Business Documents</h6>
                                </div>
                                <?php
                                    $sql = "SELECT * FROM `company_document` WHERE company_ID = ? AND document_category = 'Business Documents'";
                                    $stmt = mysqli_stmt_init($conn);

                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        die('SQL Failed: ' . mysqli_error($conn));
                                    } else {
                                        mysqli_stmt_bind_param($stmt, "s", $companyID);
                                        mysqli_stmt_execute($stmt);

                                        $result = mysqli_stmt_get_result($stmt);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $fileLocation = 'companies' . DIRECTORY_SEPARATOR . $companyURL . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR . $row['document_name'];

                                ?>
                                            <!-- SECOND SKILL BAR  -->
                                            <div class="text-center">
                                                <span style="color: #fff;">
                                                    <a href="companies/<?php echo $companyURL; ?>/documents/<?php echo $row['document_name']; ?>" download><?php echo $row["document_name"]; ?></a>
                                                </span>
                                            </div>
                                <?php
                                        }
                                    }
                                ?>
                            </div>


                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <!-- THIRD SKILL SECTION -->
                                <div class="skills-title">
                                    <h6 class="text-center">Business Certificates</h6>
                                </div>
                                <?php
                                    $sql = "SELECT * FROM `company_document` WHERE company_ID = ? AND document_category = 'Business Certificates'";
                                    $stmt = mysqli_stmt_init($conn);

                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        die('SQL Failed: ' . mysqli_error($conn));
                                    } else {
                                        mysqli_stmt_bind_param($stmt, "s", $companyID);
                                        mysqli_stmt_execute($stmt);

                                        $result = mysqli_stmt_get_result($stmt);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $fileLocation = 'companies' . DIRECTORY_SEPARATOR . $companyURL . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR . $row['document_name'];

                                ?>
                                            <!-- THIRD SKILL BAR  -->
                                            <div class="text-center">
                                                <span style="color: #fff;">
                                                    <a href="companies/<?php echo $companyURL; ?>/documents/<?php echo $row['document_name']; ?>" download><?php echo $row["document_name"]; ?></a>
                                                </span>
                                            </div>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==========================================
                  CONTACT
===========================================-->


<!--==========================================
                     SCROLL TO TOP
===========================================-->
<div id="scroll-top">
    <div id="scrollup"><i class="fa fa-angle-up"></i></div>
</div>

<!--==========================================
                      FOOTER
===========================================-->

<footer>
    <div class="container">
        <!--FOOTER DETAILS-->
        <p class="text-center">
            © Copyright 2019 Arka. All right reserved
            <a href="https://arka.ph/" target="_blank">
                <strong>Arka</strong>
            </a>
        </p>
    </div>
</footer>


<!--==========================================
                  SCRIPTS
===========================================-->
<script src="javascript/vendors/jquery-2.1.3.min.js"></script>
<script src="javascript/vendors/bootstrap.min.js"></script>
<script src="javascript/vendors/materialize.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR API KEY"></script>
<script src="javascript/vendors/markerwithlabel.min.js"></script>
<script src="javascript/vendors/retina.min.js"></script>
<script src="javascript/vendors/scrollreveal.min.js"></script>
<script src="javascript/vendors/swiper.jquery.min.js"></script>
<script src="javascript/vendors/jquery.magnific-popup.min.js"></script>
<script src="javascript/custom.js"></script>

<!-- Products & Services Script -->
<script>
    $(document).ready(function () {
        var company_id = "<?php echo $companyID; ?>";
        var company_url = "<?php echo $companyURL; ?>";

        load_all();

        function load_all() {
            $.ajax({
                url:"includes/product-service/load-all.inc.php",
                method:"POST",
                data: { company_id:company_id, company_url:company_url },
                success:function(data) {
                    $('#all').html(data);
                }
            });
        }

        $(document).on('click', '#all', function(){
            load_all();
        }); 
    });
</script>
</body>
</html>