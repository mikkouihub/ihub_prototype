<?php
  session_start();

  require '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

  if (!isset($_SESSION['loggedIn'])) {
    header("Location: ../index.php");
    exit();
  }
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
    $companyURL = $_SESSION['url'];
    // $companyOwnerImage = $_SESSION['companyOwnerImage'];
    // $companyLogoImage = $_SESSION['companyLogoImage'];
    // $companyHeaderImage = $_SESSION['companyHeaderImage'];
    // $companyVideos = $_SESSION['companyVideos'];
    $companyTagline = $_SESSION['companyTagline'];
    $companyInfo = $_SESSION['companyInfo'];
    $companyOwnerInfo = $_SESSION['companyOwnerInfo'];
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
            <a href="#" onclick="logOut()"><i class="title-icon fa fa-sign-out"></i>Log out</a>
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
                    <div class="header-background section" id="header_background_image" onclick="setHeader()"></div>
    <?php
                } else {
                    $fileLocation = 'companies' . DIRECTORY_SEPARATOR . $companyURL . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . 'company_header' . DIRECTORY_SEPARATOR . $headerImage;
    ?>
                    <div class="header-background section" id="header_background_image" onclick="setHeader()" style="background-image: url(companies/<?php echo $companyURL; ?>/profile/company_header/<?php echo $headerImage; ?>)">
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
<form method="POST" id="company_profile_form" name="company_profile_form">
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
                                die('SQL Failed: ' . mysqli_error($conn));
                            } else {
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $logoImage = $row['company_logo_image'];

                                    if (empty($logoImage)) {
                        ?>
                                        <img alt="profile-image" class="img-responsive" id="logo_image" onclick="setLogo()" src="images/profile/profile.png">
                        <?php
                                    } else {
                                        $fileLocation = 'companies' . DIRECTORY_SEPARATOR . $companyURL . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . 'company_logo' . DIRECTORY_SEPARATOR . $logoImage; 
                        ?>
                                        <img alt="profile-image" class="img-responsive" id="logo_image" onclick="setLogo()" src="companies/<?php echo $companyURL; ?>/profile/company_logo/<?php echo $logoImage; ?>">
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
                                <i id="icon-play" onclick="setVideo()" class="material-icons">play_arrow</i>
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
                                    <h6 class="text-capitalize left"><input type="text" id="company_tagline" name="company_tagline" placeholder="Enter Company Tagline" value="<?php echo $row['company_tagline']; ?>"/></h6>
                                </div>

                                    <!-- CONTACT INFO -->
                                <div class="infos">
                                    <ul class="profile-list">
                                        <li class="clearfix">
                                            <span class="title"><i class="material-icons">email</i></span>
                                            <span class="content"><input type="text" id="company_email" name="company_email" placeholder="Enter Company Email" value="<?php echo $row['company_email']; ?>"/></span>
                                        </li>
                                        <!-- <li class="clearfix">
                                            <span class="title"><i class="material-icons">language</i></span>
                                            <span class="content"><?php echo $companyURL; ?></span>
                                        </li> -->
                                        <!-- SKYPE ---- REPLACE ME -->
                                        <!-- <li class="clearfix">
                                            <span class="title"><i class="fa fa-skype" aria-hidden="true"></i></span>
                                            <span class="content">yourusername@skype.com</span>
                                        </li> -->
                                        <li class="clearfix">
                                            <span class="title"><i class="material-icons">phone</i></span>
                                            <span class="content"><input type="text" id="company_contact_number" name="company_contact_number" placeholder="Enter Company Contact Details" value="<?php echo $row['company_contact_number']; ?>"/></span>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title"><i class="material-icons">place</i></span>
                                            <span class="content"><input type="text" id="company_address" name="company_address" placeholder="Enter Company Address" value="<?php echo $row['company_address']; ?>"/></span>
                                        </li>

                                    </ul>
                                </div>
                        <?php
                              }
                            }
                        ?>

                        <!--LINKS-->
                        <div class="links">
                            <!-- FACEBOOK-->
                            <a href="#" id="first_one"
                            class="social btn-floating indigo" onclick="setFacebook()"><i
                                    class="fa fa-facebook"></i></a>
                            <!-- TWITTER-->
                            <a href="#" class="social  btn-floating blue" onclick="setTwitter()"><i
                                    class="fa fa-twitter"></i></a>
                            <!-- INSTAGRAM+-->
                            <a href="#" class="social  btn-floating red" onclick="setInstagram()"><i
                                    class="fa fa-instagram"></i></a>
                            <!-- LINKEDIN-->
                            <a href="#" class="social  btn-floating blue darken-3" onclick="setLinkedin()"><i
                                    class="fa fa-linkedin"></i></a>
                            <!-- RSS-->
                            <!-- <a href="#" class="social  btn-floating orange darken-3" onclick="setRSS()"><i
                                    class="fa fa-rss"></i></a> -->
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
                    </video> -->

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
                                    <textarea name="company_info" id="company_info" placeholder="Update information about the company..." ><?php echo $row['company_info']; ?></textarea>
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
                                        <img alt="client-image" class="center-block" id="owner_image" onclick="setOwner()" src="images/clients/client-1.png">
                        <?php
                                    } else {
                                        $fileLocation = 'companies' . DIRECTORY_SEPARATOR . $companyURL . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . 'company_owner' . DIRECTORY_SEPARATOR . $ownerImage;
                        ?>
                                        <img alt="client-image" class="center-block" id="owner_image" onclick="setOwner()" src="companies/<?php echo $companyURL; ?>/profile/company_owner/<?php echo $ownerImage; ?>">
                        <?php
                                    }
                                }
                            }
                        ?>
                    </div>
                        <!--CLIENT QUOTE-->
                    <blockquote>
                        <?php
                            $sql = "SELECT `user_name`, `company_owner_info` FROM user, company WHERE user.`user_ID` = $userID AND company.company_ID = $companyID";
                            $stmt = mysqli_stmt_init($conn);
                            
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                die('SQL Failed: ' . mysqli_error($conn));
                            } else {
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);

                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <cite><?php echo $row['user_name']; ?></cite>

                                <textarea name="company_owner_info" id="company_owner_info" placeholder="Enter Company Owner Information" ><?php echo $row['company_owner_info']; ?></textarea>
                        <?php
                                }
                            }
                        ?>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>
<input type="submit" id="btn-save" name="btn-save" value="Save">
</form>

<!--==========================================
                  PRODUCTS & SERVICES
===========================================-->
<section id="portfolios" class="section">
    <div class="container">
        <!-- SECTION TITLE -->
        <div class="section-title">
            <h4 class="text-uppercase text-center"><img src="images/icons/offer.png" alt="demo">What We Offer<a href="products-services.php" style="margin-left: 20px;" target="_blank"><i class="fa fa-edit"></i></a></h4>
        </div>
        <div id="portfolios-card" class="row">

            <!--OPTIONS-->
            <ul class="nav nav-tabs">
                    <!--CATEGORIES-->
                <?php
                    $sql = "SELECT * FROM company WHERE company_ID = $companyID";
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        die('SQL Failed: ' . mysqli_error($conn));
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        $row = mysqli_fetch_assoc($result);

                        $business_type = $row['company_business_type'];

                        if ($business_type == 1) {
                ?>
                            <li class="active waves-effect list-shuffle"><a id="show-products" class="active" href="#products" data-toggle="tab">PRODUCTS</a></li>
                <?php
                        } elseif ($business_type == 2) {
                ?>
                            <li class="active waves-effect list-shuffle"><a id="show-services" class="active" href="#services" data-toggle="tab">SERVICES</a></li>
                <?php
                        } elseif ($business_type == 3) {
                ?>
                            <li class="active waves-effect list-shuffle"><a id="show-products" class="active" href="#products" data-toggle="tab">PRODUCTS</a></li>
                            <li class="waves-effect list-shuffle"><a id="show-services" class="cate" href="#services" data-toggle="tab">SERVICES</a></li>
                <?php
                        }
                    }
                ?>
            </ul>

            <!--CATEGORIES CONTENT-->
            <div class="tab-content">

                <?php
                    if ($_SESSION['businessType'] == 1) {
                ?>
                        <!--CATEGORY PRODUCTS-->
                        <div id="products"></div>
                <?php
                    } elseif ($_SESSION['businessType'] == 2) {
                ?>
                        <!--CATEGORY SERVICES-->
                        <div id="services"></div>
                <?php
                    } elseif ($_SESSION['businessType'] == 3) {
                ?>
                        <!--All CATEGORIES-->
                        <div id="products"></div>
                        <div id="services"></div>
                <?php
                    }
                ?>
            </div>
            <!--PORTFOLIOS ADD GALLERY BUTTON-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <button id="add-more" class="center-block btn-large waves-effect x hide"><i id="port-add-icon" class="fa fa-plus"></i>
                    </button>
                    <?php
                        $product = false;
                        $service = false;

                        $sql = "SELECT * FROM company_product_service WHERE product_service_type = 1 AND company_ID = $companyID";
                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            die('SQL Failed: ' . mysqli_error($conn));
                        } else {
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);

                            $resultCheck = mysqli_stmt_num_rows($stmt);

                            if ($resultCheck > 6) {
                                $product = true;
                            }
                        }

                        $sql = "SELECT * FROM company_product_service WHERE product_service_type = 2 AND company_ID = $companyID";
                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            die('SQL Failed: ' . mysqli_error($conn));
                        } else {
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);

                            $resultCheck = mysqli_stmt_num_rows($stmt);

                            if ($resultCheck > 6) {
                                $service = true;
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>


<!--==========================================
                   EDUCATION
===========================================-->


<!--==========================================
                   SKILLS
===========================================-->


<!--==========================================
                   EXPERIENCE
===========================================-->

<!--==========================================
                  MODALS
===========================================-->

<!--==========================================
                  PORTFOLIOS
===========================================-->


<!--==========================================
                   INTEREST
===========================================-->


<!--==========================================
             TESTIMONIALS
===========================================-->
<section id="testimonials" class="section">
    <div class="container">
        <!-- SECTION TITLE -->
        <div class="section-title">
            <h4 class="text-uppercase text-center"><img src="images/icons/bubbles-alt.png" alt="demo">Testimonials<a href="testimonials.php" style="margin-left: 20px;" target="_blank"><i class="fa fa-edit"></i></a></h4>
        </div>
        <div id="testimonials-card" class="row card">
            <div class="col-md-12 col-xs-12">

                <!-- SLIDER STRUCTURE -->
                <div id="clients-slider"
                     class="swiper-container swiper-container-clients">
                    <div class="swiper-wrapper">
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
            <h4 class="text-uppercase text-center"><img src="images/icons/handshake.png" alt="demo">Clients<a href="clients.php" style="margin-left: 20px;" target="_blank"><i class="fa fa-edit"></i></a></h4>
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
            <h4 class="text-uppercase text-center"><img src="images/icons/folder-document.png" alt="demo">Documents<a href="documents.php" style="margin-left: 20px;" target="_blank"><i class="fa fa-edit"></i></a></h4>
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
             PRICING TABLE
===========================================-->

<!--==========================================
             BLOG
===========================================-->

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
<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!-- Upload Header Background Script -->
<script>
    function setHeader() {
        Swal.fire({
            title: 'Select image',
            input: 'file',
            showCancelButton: true,
            confirmButtonText: 'Upload',
            onBeforeOpen: () => {
                $(".swal2-file").change(function () {
                    var reader = new FileReader();
                    reader.readAsDataURL(this.files[0]);
                });
            },
            inputAttributes: {
                'accept': 'image/*',
                'aria-label': 'Upload your header background'
            }
        }).then((file) => {
            if (file.value) {
                var formData = new FormData();
                var file = $('.swal2-file')[0].files[0];
                formData.append("file_header", file);
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    method: 'POST',
                    url: 'includes/profile/header-upload.inc.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $('#header_background_image').html("<h2 class='text-success' style='text-align: center;'>Image Uploading...</h2>");
                    },
                    success: function (resp) {
                        $('#header_background_image').html(resp);
                        Swal.fire('Uploaded', 'Your header background has been uploaded', 'success');
                    },
                    error: function() {
                        Swal({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
                    }
                })
            }
        })
    }
</script>
<!-- Upload Video Script -->
<script>
    function setVideo() {
        Swal.fire({
            title: 'Select video',
            html: '<iframe width="400" height="250" src="https://www.youtube-nocookie.com/embed/<?php echo $videoLink; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            input: 'url',
            inputPlaceholder: 'Enter a YouTube URL',
            showCancelButton: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'You need to write something!'
                }
            }
        }).then((url) => {
            if (url.value) {
                var formData = new FormData();
                formData.append("video-link", url.value);
                $.ajax({
                    method: 'POST',
                    url: 'includes/profile/video-upload.inc.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (resp) {
                        $('#html-video').html(resp);
                        Swal.fire('Uploaded', 'Your header background has been uploaded', 'success');
                    },
                    error: function() {
                        Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
                    }
                })
            }
        })
    }
</script>
<!-- Upload Company Logo Script -->
<script>
    function setLogo() {
        Swal.fire({
            title: 'Select image',
            input: 'file',
            showCancelButton: true,
            confirmButtonText: 'Upload',
            onBeforeOpen: () => {
                $(".swal2-file").change(function () {
                    var reader = new FileReader();
                    reader.readAsDataURL(this.files[0]);
                });
            },
            inputAttributes: {
                'accept': 'image/*',
                'aria-label': 'Upload your company logo'
            }
        }).then((file) => {
            if (file.value) {
                var formData = new FormData();
                var file = $('.swal2-file')[0].files[0];
                formData.append("file_logo", file);
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    method: 'POST',
                    url: 'includes/profile/logo-upload.inc.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $('#logo_image').html("<h2 class='text-success' style='text-align: center;'>Image Uploading...</h2>");
                    },
                    success: function (resp) {
                        $('#logo_image').html(resp);
                        Swal.fire('Uploaded', 'Your company logo has been uploaded', 'success');
                    },
                    error: function() {
                        Swal({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
                    }
                })
            }
        })
    }
</script>
<!-- Upload Company Owner Script -->
<script>
    function setOwner() {
        Swal.fire({
            title: 'Select image',
            input: 'file',
            showCancelButton: true,
            confirmButtonText: 'Upload',
            onBeforeOpen: () => {
                $(".swal2-file").change(function () {
                    var reader = new FileReader();
                    reader.readAsDataURL(this.files[0]);
                });
            },
            inputAttributes: {
                'accept': 'image/*',
                'aria-label': 'Upload your profile photo'
            }
        }).then((file) => {
            if (file.value) {
                var formData = new FormData();
                var file = $('.swal2-file')[0].files[0];
                formData.append("file_owner", file);
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    method: 'POST',
                    url: 'includes/profile/owner-upload.inc.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $('#owner_image').html("<h2 class='text-success' style='text-align: center;'>Image Uploading...</h2>");
                    },
                    success: function (resp) {
                        $('#owner_image').html(resp);
                        Swal.fire('Uploaded', 'Your profile photo has been uploaded', 'success');
                    },
                    error: function() {
                        Swal({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
                    }
                })
            }
        })
    }
</script>
<!-- Update Company & Owner Info Script -->
<script>
    $('#company_profile_form').on('submit', function(event) {
        event.preventDefault();
        var formData = $('#company_profile_form').serialize();

        console.log(formData);

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false,
        })

        swalWithBootstrapButtons.fire({
            title: 'Save changes?',
            text: "All changes will be saved!",
            type: 'info',
            showCancelButton: true,
            confirmButtonText: 'Save',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    method: 'POST',
                    url: 'includes/profile/company-info-update.inc.php',
                    data: formData,
                    success: function (data) {
                        console.log(data);
                        swalWithBootstrapButtons.fire(
                            'Changes Saved!',
                            'Your changes has been saved.',
                            'success'
                        )
                        window.setTimeout(function(){ 
                            location.reload();
                        }, 750);
                    },
                    error: function() {
                        swalWithBootstrapButtons.fire(
                            'Oops...',
                            'Something went wrong!',
                            'error'
                        )
                    }
                })
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'You changes didn\'t saved.',
                    'error'
                )
            }
        })
    });
    // function saveInfo() {
    //     event.preventDefault();
    //     var form1Data = $('#company_profile_form').serialize();
    //     var form2Data = $('#company_info_form').serialize();
    //     var form3Data = $('#company_info_form').serialize();
    //     var formData = form1Data + "&" + form2Data + "&" + form3Data; 

    //     const swalWithBootstrapButtons = Swal.mixin({
    //         customClass: {
    //             confirmButton: 'btn btn-success',
    //             cancelButton: 'btn btn-danger'
    //         },
    //         buttonsStyling: false,
    //     })

    //     swalWithBootstrapButtons.fire({
    //         title: 'Save changes?',
    //         text: "All changes will be saved!",
    //         type: 'info',
    //         showCancelButton: true,
    //         confirmButtonText: 'Save',
    //         cancelButtonText: 'Cancel'
    //     }).then((result) => {
    //         if (result.value) {
    //             $.ajax({
    //                 method: 'POST',
    //                 url: 'includes/profile/info-update.inc.php',
    //                 data: formData,
    //                 processData: false,
    //                 contentType: false,
    //                 success: function (formData) {
    //                     swalWithBootstrapButtons.fire(
    //                         'Changes Saved!',
    //                         'Your changes has been saved.',
    //                         'success'
    //                     )
    //                 },
    //                 error: function() {
    //                     swalWithBootstrapButtons.fire(
    //                         'Oops...',
    //                         'Something went wrong!',
    //                         'error'
    //                     )
    //                 }
    //             })
    //         } else if (result.dismiss === Swal.DismissReason.cancel) {
    //             swalWithBootstrapButtons.fire(
    //                 'Cancelled',
    //                 'You changes didn\'t saved.',
    //                 'error'
    //             )
    //         }
    //     })
    // }
</script>
<!-- Social Media Script -->
<!-- FACEBOOK -->
<script>
    function setFacebook() {
        Swal.fire({
            title: 'Facebook URL',
            input: 'url',
            inputPlaceholder: 'Enter your Facebook Page',
            showCancelButton: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'You need to write something!'
                }
            }
        }).then((url) => {
            if (url.value) {
                var formData = new FormData();
                formData.append("facebook-link", url.value);
                $.ajax({
                    method: 'POST',
                    url: 'includes/profile/facebook-upload.inc.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (resp) {
                        // $('#html-video').html(resp);
                        alert(resp)
                        Swal.fire('Updated', 'Your facebook page has been updated', 'success');
                    },
                    error: function() {
                        Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
                    }
                })
            }
        })
    }
</script>
<!-- TWITTER -->
<script>
    function setTwitter() {
        Swal.fire({
            title: 'Twitter URL',
            input: 'url',
            inputPlaceholder: 'Enter your Twitter Page',
            showCancelButton: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'You need to write something!'
                }
            }
        }).then((url) => {
            if (url.value) {
                var formData = new FormData();
                formData.append("twitter-link", url.value);
                $.ajax({
                    method: 'POST',
                    url: 'includes/profile/twitter-upload.inc.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (resp) {
                        // $('#html-video').html(resp);
                        alert(resp)
                        Swal.fire('Updated', 'Your twitter page has been updated', 'success');
                    },
                    error: function() {
                        Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
                    }
                })
            }
        })
    }
</script>
<!-- INSTAGRAM -->
<script>
    function setInstagram() {
        Swal.fire({
            title: 'Instagram URL',
            input: 'url',
            inputPlaceholder: 'Enter your Instagram Page',
            showCancelButton: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'You need to write something!'
                }
            }
        }).then((url) => {
            if (url.value) {
                var formData = new FormData();
                formData.append("instagram-link", url.value);
                $.ajax({
                    method: 'POST',
                    url: 'includes/profile/instagram-upload.inc.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (resp) {
                        // $('#html-video').html(resp);
                        alert(resp)
                        Swal.fire('Updated', 'Your instagram page has been updated', 'success');
                    },
                    error: function() {
                        Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
                    }
                })
            }
        })
    }
</script>
<!-- LINKEDIN -->
<script>
    function setLinkedin() {
        Swal.fire({
            title: 'LinkedIn URL',
            input: 'url',
            inputPlaceholder: 'Enter your LinkedIn Page',
            showCancelButton: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'You need to write something!'
                }
            }
        }).then((url) => {
            if (url.value) {
                var formData = new FormData();
                formData.append("linkedin-link", url.value);
                $.ajax({
                    method: 'POST',
                    url: 'includes/profile/linkedin-upload.inc.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (resp) {
                        $('#html-video').html(resp);
                        alert(resp)
                        Swal.fire('Updated', 'Your LinkedIn page has been updated', 'success');
                    },
                    error: function() {
                        Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
                    }
                })
            }
        })
    }
</script>
<!-- RSS -->
<!-- <script>
    function setRSS() {
        Swal.fire({
            title: 'RSS URL',
            input: 'url',
            inputPlaceholder: 'Enter your RSS Page',
            showCancelButton: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'You need to write something!'
                }
            }
        }).then((url) => {
            if (url.value) {
                var formData = new FormData();
                formData.append("rss-link", url.value);
                $.ajax({
                    method: 'POST',
                    url: 'includes/profile/rss-upload.inc.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (resp) {
                        $('#html-video').html(resp);
                        Swal.fire('Updated', 'Your rss page has been updated', 'success');
                    },
                    error: function() {
                        Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
                    }
                })
            }
        })
    }
</script> -->
<!-- Products & Services Script -->
<script>
    $(document).ready(function () {
        var business_type = "<?php echo $_SESSION['businessType']; ?>";
        var product = "<?php echo $product; ?>";
        var service = "<?php echo $service; ?>";

        if (product == "1") {
            document.querySelector('#add-more').classList.remove("hide");
        }

        if (business_type == 1) {
            load_all();

            function load_all() {
                $.ajax({
                    url:"includes/product-service/load-all.inc.php",
                    method:"POST",
                    data: { business_type:business_type },
                    success:function(data) {
                        $('#products').html(data);
                    }
                });
            }

            $(document).on('click', '#show-products', function(){
                load_all();
            }); 
        } else if (business_type == 2) {
            load_all();

            function load_all() {
                $.ajax({
                    url:"includes/product-service/load-all.inc.php",
                    method:"POST",
                    data: { business_type:business_type },
                    success:function(data) {
                        $('#services').html(data);
                    }
                });
            }

            $(document).on('click', '#show-services', function(){
                load_all();
            }); 
        } else if (business_type == 3) {
            load_product();

            function load_product() {
                $.ajax({
                    url:"includes/product-service/load-product.inc.php",
                    method:"POST",
                    data: { business_type:business_type },
                    success:function(data) {
                        $('#products').html(data);
                    }
                });
            }

            function load_service() {
                $.ajax({
                    url:"includes/product-service/load-service.inc.php",
                    method:"POST",
                    data: { business_type:business_type },
                    success:function(data) {
                        $('#services').html(data);
                    }
                });
            }

            $(document).on('click', '#show-products', function(){
                document.querySelector('#products').setAttribute("class", "active");
                document.querySelector('#services').removeAttribute("class");
                document.querySelector('#products').removeAttribute("style");
                document.querySelector('#services').style.display = 'none';
                if (product == "1") {
                    document.querySelector('#add-more').classList.remove("hide");
                } else {
                    document.querySelector('#add-more').classList.add("hide");
                }
                load_product();
            }); 
            $(document).on('click', '#show-services', function(){
                document.querySelector('#products').removeAttribute("class");
                document.querySelector('#services').removeAttribute("style");
                document.querySelector('#products').style.display = 'none';
                if (service == "1") {
                    document.querySelector('#add-more').classList.remove("hide");
                } else {
                    document.querySelector('#add-more').classList.add("hide");
                }
                load_service();
            }); 
        }
    });
</script>
<!-- Log out Script -->
<script>
    function logOut() {
        $.ajax({
            method: 'POST',
            url: '../includes/user-management/logout.inc.php',
            data: { logout:'logout' }
            success: function(data){
                alert(data);
                location.reload();
                // Swal.fire({
                //     title: 'Logging out',
                //     timer: 1000,
                //     timerProgressBar: true,
                //     onBeforeOpen: () => {
                //         Swal.showLoading()
                //         timerInterval = setInterval(() => {
                //         Swal.getContent().querySelector('b')
                //             .textContent = Swal.getTimerLeft()
                //         }, 100)
                //     },
                //     onClose: () => {
                //         window.location.href = data;
                //     }
                // })
            }
        });
    }
</script>
</body>
</html>