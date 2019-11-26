<?php
  session_start();

  require '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';

?>


<?php
  $userID = '';
  $fullName = '';
  $userEmail = '';
  $mentorID = '';

  if (isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['userID'];
    $fullName = $_SESSION['userName'];
    $userEmail = $_SESSION['userEmail'];
    $mentorID = $_SESSION['mentorID'];
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
            </div>  -->
            <!-- NAME & STATUS -->
             <!-- <div class="text-holder text-center">
                <h2><?php echo $fullName; ?></h2> -->
                <!-- REPLACE ME -->
                 <!-- <h6>Software Engineer & UI/UX Expert</h6>
            </div>
        </div>
    </div>
</div>  -->

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
            <a href="#education"><i class="title-icon fa fa-graduation-cap"></i>Education</a>
            <!-- <a href="#skills"><i class="title-icon fa fa-sliders"></i>Skills</a> -->
            <a href="#experience"><i class="title-icon fa fa-suitcase"></i>Experience</a>
            <!-- <a href="#portfolios"><i class="title-icon fa fa-archive"></i>Portfolios</a>
            <a href="#interest"><i class="title-icon fa fa-heart"></i>Interest</a>
            <a href="#testimonials"><i class="title-icon fa fa-users"></i>Testimonials</a>
            <a href="#pricing-table"><i class="title-icon fa fa-money"></i>Pricing</a>
            <a href="#blog"><i class="title-icon fa fa-pencil-square"></i>Blog</a>
            <a href="#contact"><i class="title-icon fa fa-envelope"></i>Contact</a> -->
            <a href="mentor.php"><i class="title-icon fa fa-save"></i>Go to Profile</a>
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
        // $sql = "SELECT * FROM mentor WHERE mentor_id = $mentorID";
        // $stmt = mysqli_stmt_init($conn);

        // if (!mysqli_stmt_prepare($stmt, $sql)) {
        //     die('SQL Failed: ' . mysqli_error($conn));
        // } else {
        //     mysqli_stmt_execute($stmt);
        //     $result = mysqli_stmt_get_result($stmt);

        //     while ($row = mysqli_fetch_assoc($result)) {
        //         $headerImage = $row['company_header_image'];

        //         if (empty($headerImage)) {
    ?>
                    <div class="header-background section" id="header_background_image" onclick="setHeader()"></div>
    <?php
                // } else {
                //     $fileLocation = 'companies' . DIRECTORY_SEPARATOR . $companyURL . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . 'company_header' . DIRECTORY_SEPARATOR . $headerImage;
    ?>
                    <!-- <div class="header-background section" id="header_background_image" onclick="setHeader()" style="background-image: url(companies/<?php echo $companyURL; ?>/profile/company_header/<?php echo $headerImage; ?>)">
                    </div> -->
    <?php
        //         }
        //     }
        // }
    ?>

</header>


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
                            // $sql = "SELECT * FROM mentor WHERE mentor_id = $mentorID";
                            // $stmt = mysqli_stmt_init($conn);

                            // if (!mysqli_stmt_prepare($stmt, $sql)) {
                            //     die('SQL Failed: ' . mysqli_error($conn));
                            // } else {
                            //     mysqli_stmt_execute($stmt);
                            //     $result = mysqli_stmt_get_result($stmt);

                            //     while ($row = mysqli_fetch_assoc($result)) {
                            //         $logoImage = $row['company_logo_image'];

                            //         if (empty($logoImage)) {
                        ?>
                                        <img alt="profile-image" class="img-responsive" id="logo_image" onclick="setLogo()" src="images/profile/profile.png">
                        <?php
                                    // } else {
                                    //     $fileLocation = 'companies' . DIRECTORY_SEPARATOR . $companyURL . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . 'company_logo' . DIRECTORY_SEPARATOR . $logoImage; 
                        ?>
                                        <!-- <img alt="profile-image" class="img-responsive" id="logo_image" onclick="setLogo()" src="companies/<?php echo $companyURL; ?>/profile/company_logo/<?php echo $logoImage; ?>"> -->
                        <?php
                            //         }
                            //     }
                            // }
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
                            $sql = "SELECT * FROM mentor WHERE mentor_id = $mentorID";
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
                                    <h4 class="text-uppercase left"><?php echo $fullName; ?></h4>
                                    <h6 class="text-capitalize left"><input type="text" id="mentor_tagline" name="mentor_tagline" placeholder="Enter Company Tagline" value="<?php echo $row['mentor_tagline']; ?>"/></h6>
                                </div>

                                    <!-- CONTACT INFO -->
                                <div class="infos">
                                    <ul class="profile-list">
                                        <li class="clearfix">
                                            <span class="title"><i class="material-icons">email</i></span>
                                            <span class="content"><input type="text" id="mentor_email" name="mentor_email" placeholder="Enter Student Email" value="<?php /** echo $row['mentor_email']; */ ?>"/></span>
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
                                            <span class="content"><input type="text" id="mentor_contact_no" name="mentor_contact_no" placeholder="Enter Student Contact Details" value="<?php echo $row['mentor_contact_no']; ?>"/></span>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title"><i class="material-icons">place</i></span>
                                            <span class="content"><input type="text" id="mentor_address" name="mentor_address" placeholder="Enter Student Address" value="<?php echo $row['mentor_address']; ?>"/></span>
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
                        $sql = "SELECT * FROM company WHERE company_ID = $mentorID";
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
                                $sql = "SELECT mentor_info FROM mentor WHERE mentor_id = $mentorID";
                                $stmt = mysqli_stmt_init($conn);
                                
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    die('SQL Failed: ' . mysqli_error($conn));
                                } else {
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <textarea name="mentor_info" id="mentor_info" placeholder="Update information about the company..." ><?php echo $row['mentor_info']; ?></textarea>
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
                   EDUCATION
===========================================-->
<section id="education" class="section">
    <div class="container">
        <!-- SECTION TITLE -->
        <div class="section-title">
            <h4 class="text-uppercase text-center"><img src="images/icons/book.png" alt="demo">Education</h4>
        </div>

        <div id="timeline-education">

            <!-- SECOND TIMELINE -->
            <div class="timeline-block">
                <!-- DOT -->
                <div class="timeline-dot"><h6>S</h6></div>
                <!-- TIMELINE CONTENT -->
                <div class="card timeline-content">
                    <div class="card-content">
                        <!-- TIMELINE TITLE -->
                        <h6 class="timeline-title">Secondary Education</h6>
                        <!-- TIMELINE TITLE INFO -->
                        <div class="timeline-info">
                            <h6>
                            <?php
                            $sql = "SELECT * FROM mentor WHERE mentor_id = $mentorID";
                            $stmt = mysqli_stmt_init($conn);
                            
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                              die('SQL Failed: ' . mysqli_error($conn));
                            } else {
                              mysqli_stmt_execute($stmt);
                              $result = mysqli_stmt_get_result($stmt);

                              while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <small><input type="text" id="secondary_name" name="secondary_name" placeholder="School Name" value="<?php echo $row['secondary_name']; ?>"/></small>
                        
                            </h6>
    
                            <h6>
                            <small>From:<input type="date" id="secondary_start" name="secondary_start" placeholder="Start Date" value="<?php echo $row['secondary_start']; ?>"/></small>
                            <small>To:<input type="date" id="secondary_finish" name="secondary_finish" placeholder="Finish Date" value="<?php echo $row['secondary_finish']; ?>"/></small>
                            <?php } } ?>
                            </h6>
                        </div>
                        <!-- TIMELINE PARAGRAPH -->
                        <p>
                        <?php
                                $sql = "SELECT secondary_info FROM mentor WHERE mentor_id = $mentorID";
                                $stmt = mysqli_stmt_init($conn);
                                
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    die('SQL Failed: ' . mysqli_error($conn));
                                } else {
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <textarea name="secondary_info" id="secondary_info" placeholder="Update information about Secondary Education..." ><?php echo $row['secondary_info']; ?></textarea>
                            <?php
                                    }
                                }
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- THIRD TIMELINE -->
            <div class="timeline-block">
                <!-- DOT -->
                <div class="timeline-dot"><h6>H</h6></div>
                <!-- TIMELINE CONTENT -->
                <div class="card timeline-content">
                    <div class="card-content">
                        <!-- TIMELINE TITLE -->
                        <h6 class="timeline-title">Higher Education</h6>
                        <!-- TIMELINE TITLE INFO -->
                        <div class="timeline-info">
                            <h6>
                            <?php
                            $sql = "SELECT * FROM mentor WHERE mentor_id = $mentorID";
                            $stmt = mysqli_stmt_init($conn);
                            
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                              die('SQL Failed: ' . mysqli_error($conn));
                            } else {
                              mysqli_stmt_execute($stmt);
                              $result = mysqli_stmt_get_result($stmt);

                              while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <small><input type="text" id="higher_name" name="higher_name" placeholder="School Name" value="<?php echo $row['higher_name']; ?>"/></small>
                           
                            </h6>
                            <h6>
                            <small>From:<input type="date" id="higher_start" name="higher_start" placeholder="Start Date" value="<?php echo $row['higher_start']; ?>"/></small>
                            <small>To:<input type="date" id="higher_finish" name="higher_finish" placeholder="Finish Date" value="<?php echo $row['higher_finish']; ?>"/></small>
                            <?php } } ?>
                            </h6>
                        </div>
                        <!-- TIMELINE PARAGRAPH -->
                        <p>
                        <?php
                                $sql = "SELECT higher_info FROM mentor WHERE mentor_id = $mentorID";
                                $stmt = mysqli_stmt_init($conn);
                                
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    die('SQL Failed: ' . mysqli_error($conn));
                                } else {
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <textarea name="higher_info" id="higher_info" placeholder="Update information about higher education..." ><?php echo $row['higher_info']; ?></textarea>
                            <?php
                                    }
                                }
                            ?>
                        </p>

                    </div>
                </div>
            </div>

            <!-- FOURTH TIMELINE -->
      
            </div>
            <!-- FIFTH TIMELINE -->

            </div>
            <!-- SIXTH TIMELINE -->
      
            </div>

        </div>
    </div>
</section>


<!--==========================================
                   SKILLS
===========================================-->


<!--==========================================
                   EXPERIENCE
===========================================-->
<section id="experience" class="section">
    <div class="container">
        <!-- SECTION TITLE -->
        <div class="section-title">
            <h4 class="text-uppercase text-center"><img src="images/icons/layers.png" alt="demo">Experience</h4>
        </div>

        <div id="timeline-experience">

            <!-- FIRST TIMELINE -->
            <div class="timeline-block">
                <!-- DOT -->
                <div class="timeline-dot"><h6>1</h6></div>
                <!-- TIMELINE CONTENT -->
                <div class="card timeline-content">
                    <div class="card-content">
                    <?php
                            $sql = "SELECT * FROM mentor WHERE mentor_id = $mentorID";
                            $stmt = mysqli_stmt_init($conn);
                            
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                              die('SQL Failed: ' . mysqli_error($conn));
                            } else {
                              mysqli_stmt_execute($stmt);
                              $result = mysqli_stmt_get_result($stmt);

                              while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <!-- TIMELINE TITLE -->
                        <h6 class="timeline-title"><input type="text" id="first_exp_title" name="first_exp_title" placeholder="Job Title" value="<?php echo $row['first_exp_title']; ?>"/></h6>
                        <!-- TIMELINE TITLE INFO -->
                        <div class="timeline-info">
                    
                            <h6>
                                <small><input type="text" id="first_exp_company" name="first_exp_company" placeholder="Company Name" value="<?php echo $row['first_exp_company']; ?>"/></small>
                            </h6>
                            <h6>
                            <small>From:<input type="date" id="first_exp_start" name="first_exp_start" placeholder="Start Date" value="<?php echo $row['first_exp_start']; ?>"/></small>
                            <small>To:<input type="date" id="first_exp_finish" name="first_exp_finish" placeholder="Finish Date" value="<?php echo $row['first_exp_finish']; ?>"/></small>
                            </h6>
                            <?php } } ?>
                        </div>
                        <!-- TIMELINE PARAGRAPH -->
                        <p>
                        <?php
                                $sql = "SELECT first_exp_info FROM mentor WHERE mentor_id = $mentorID";
                                $stmt = mysqli_stmt_init($conn);
                                
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    die('SQL Failed: ' . mysqli_error($conn));
                                } else {
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <textarea name="first_exp_info" id="first_exp_info" placeholder="Update information about experience" ><?php echo $row['first_exp_info']; ?></textarea>
                            <?php
                                    }
                                }
                            ?>
                        </p>
                        <!-- BUTTON TRIGGER MODAL -->
                       
                    </div>
                </div>
            </div>

            <!-- SECOND TIMELINE -->
            <div class="timeline-block">
                <!-- DOT -->
                <div class="timeline-dot"><h6>2</h6></div>
                <!-- TIMELINE CONTENT -->
                <div class="card timeline-content">
                    <div class="card-content">
                    <?php
                            $sql = "SELECT * FROM mentor WHERE mentor_id = $mentorID";
                            $stmt = mysqli_stmt_init($conn);
                            
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                              die('SQL Failed: ' . mysqli_error($conn));
                            } else {
                              mysqli_stmt_execute($stmt);
                              $result = mysqli_stmt_get_result($stmt);

                              while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <!-- TIMELINE TITLE -->
                        <h6 class="timeline-title"><input type="text" id="second_exp_title" name="second_exp_title" placeholder="Job Title" value="<?php echo $row['second_exp_title']; ?>"/></h6>
                        <!-- TIMELINE TITLE INFO -->
                        <div class="timeline-info">
                            <h6>
                                <small><input type="text" id="second_exp_company" name="second_exp_company" placeholder="Company Name" value="<?php echo $row['second_exp_company']; ?>"/></small>
                            </h6>
                            <h6>
                            <small>From:<input type="date" id="second_exp_start" name="second_exp_start" placeholder="Start Date" value="<?php echo $row['second_exp_start']; ?>"/></small>
                            <small>To:<input type="date" id="second_exp_finish" name="second_exp_finish" placeholder="Finish Date" value="<?php echo $row['second_exp_finish']; ?>"/></small>
                            </h6>
                            <?php } } ?>
                        </div>
                        <!-- TIMELINE PARAGRAPH -->
                        <p>
                        <?php
                                $sql = "SELECT second_exp_info FROM mentor WHERE mentor_id = $mentorID";
                                $stmt = mysqli_stmt_init($conn);
                                
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    die('SQL Failed: ' . mysqli_error($conn));
                                } else {
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <textarea name="second_exp_info" id="second_exp_info" placeholder="Update information about experience" ><?php echo $row['second_exp_info']; ?></textarea>
                            <?php
                                    }
                                }
                            ?>
                        </p>

                    </div>
                </div>
            </div>

            <!-- THIRD TIMELINE -->
            <div class="timeline-block">
                <!-- DOT -->
                <div class="timeline-dot"><h6>3</h6></div>
                <!-- TIMELINE CONTENT -->
                <div class="card timeline-content">
                    <div class="card-content">
                    <?php
                            $sql = "SELECT * FROM mentor WHERE mentor_id = $mentorID";
                            $stmt = mysqli_stmt_init($conn);
                            
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                              die('SQL Failed: ' . mysqli_error($conn));
                            } else {
                              mysqli_stmt_execute($stmt);
                              $result = mysqli_stmt_get_result($stmt);

                              while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <!-- TIMELINE TITLE -->
                        <h6 class="timeline-title"><input type="text" id="third_exp_title" name="third_exp_title" placeholder="Job Title" value="<?php echo $row['third_exp_title']; ?>"/></h6>
                        <!-- TIMELINE TITLE INFO -->
                        <div class="timeline-info">
                            <h6>
                                <small><input type="text" id="third_exp_company" name="third_exp_company" placeholder="Company Name" value="<?php echo $row['third_exp_company']; ?>"/></small>
                            </h6>
                            <h6>
                            <small>From:<input type="date" id="third_exp_start" name="third_exp_start" placeholder="Start Date" value="<?php echo $row['third_exp_start']; ?>"/></small>
                            <small>To:<input type="date" id="third_exp_finish" name="third_exp_finish" placeholder="Finish Date" value="<?php echo $row['third_exp_finish']; ?>"/></small>
                            </h6>
                            <?php } } ?>
                        </div>
                        <!-- TIMELINE PARAGRAPH -->
                        <p>
                        <?php
                                $sql = "SELECT third_exp_info FROM mentor WHERE mentor_id = $mentorID";
                                $stmt = mysqli_stmt_init($conn);
                                
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    die('SQL Failed: ' . mysqli_error($conn));
                                } else {
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <textarea name="third_exp_info" id="third_exp_info" placeholder="Update information about experience" ><?php echo $row['third_exp_info']; ?></textarea>
                            <?php
                                    }
                                }
                            ?>
                        </p>

                    </div>
                </div>
            </div>

            <!-- FOURTH TIMELINE -->
            
        </div>
    </div>
</section>

<!--==========================================
                  MODALS
===========================================-->
<section>
    <!--MODAL ONE-->
    <div class="modal fade" id="myModal-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!--MODAL HEADER-->
                <div class="modal-header  text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h4 class="modal-title" id="myModalLabel-1">GRADUATION AT ASHTON UNI</h4>
                    <h6>
                        <small>Jan 2014 - Mar 2015</small>
                    </h6>
                </div>
                <!--MODAL BODY-->
                <div class="modal-body">
                    <img class="img-responsive" alt="graduation" src="images/timeline/demo-gra.jpg">
                    <p>
                        I have learned a great many things from participating in varsity football.
                        It has changed my entire outlook on and attitude toward life. Before my
                        freshman year at [high-school], I was shy, had low self-esteem and turned
                        away from seemingly impossible challenges. Football has altered all of these
                        qualities. On the first day of freshman practice, the team warmed up with a
                        game of touch football. The players were split up and the game began. However,
                        during the game, I noticed that I didn't run as hard as I could, nor did I try
                        to evade my defender and get open. The fact of the matter is that I really did
                        not want to be thrown the ball. I didn't want to be the one at fault if I dropped
                        the ball and the play didn't succeed. I did not want the responsibility of helping
                        the team because I was too afraid of making a mistake. That aspect of my character
                        led the first years of my high school life. All the while, I went to practice.
                    </p>
                </div>
                <!--MODAL FOOTER-->
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                </div>
            </div>
        </div>
    </div>

    <!--MODAL TWO-->
    <div class="modal fade" id="myModal-2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-2">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!--MODAL HEADER-->
                <div class="modal-header  text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h4 class="modal-title" id="myModalLabel-2">EDUCATION AT Y</h4>
                    <h6>
                        <small>Jan 2014 - Mar 2015</small>
                    </h6>
                </div>
                <!--MODAL BODY-->
                <div class="modal-body">
                    <p>
                        I have learned a great many things from participating in varsity football.
                        It has changed my entire outlook on and attitude toward life. Before my
                        freshman year at [high-school], I was shy, had low self-esteem and turned
                        away from seemingly impossible challenges. Football has altered all of these
                        qualities. On the first day of freshman practice, the team warmed up with a
                        game of touch football. The players were split up and the game began. However,
                    </p>
                </div>
                <!--MODAL FOOTER-->
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                </div>
            </div>
        </div>
    </div>

    <!--MODAL THREE-->
    <div class="modal fade" id="myModal-3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-3">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!--MODAL HEADER-->
                <div class="modal-header  text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h4 class="modal-title" id="myModalLabel-3">EDUCATION AT Z</h4>
                    <h6>
                        <small>Jan 2014 - Mar 2015</small>
                    </h6>
                </div>
                <!--MODAL BODY-->
                <div class="modal-body">
                    <img class="img-responsive" alt="graduation" src="images/timeline/demo-gra.jpg">
                    <p>
                        I have learned a great many things from participating in varsity football.
                        It has changed my entire outlook on and attitude toward life. Before my
                        freshman year at [high-school], I was shy, had low self-esteem and turned
                        away from seemingly impossible challenges. Football has altered all of these
                        qualities. On the first day of freshman practice, the team warmed up with a
                        game of touch football. The players were split up and the game began. However,
                    </p>
                </div>
                <!--MODAL FOOTER-->
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                </div>
            </div>
        </div>
    </div>

    <!--MODAL FOUR-->
    <div class="modal fade" id="myModal-4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-4">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!--MODAL HEADER-->
                <div class="modal-header  text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h4 class="modal-title" id="myModalLabel-4">EXPERIENCE AT Z</h4>
                    <h6>
                        <small>Jan 2014 - Mar 2015</small>
                    </h6>
                </div>
                <!--MODAL BODY-->
                <div class="modal-body">
                    <p>
                        I have learned a great many things from participating in varsity football.
                        It has changed my entire outlook on and attitude toward life. Before my
                        freshman year at [high-school], I was shy, had low self-esteem and turned
                        away from seemingly impossible challenges. Football has altered all of these
                        qualities. On the first day of freshman practice, the team warmed up with a
                        game of touch football. The players were split up and the game began. However,
                    </p>
                </div>
                <!--MODAL FOOTER-->
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                </div>
            </div>
        </div>
    </div>

    <!--MODAL FIVE-->
    <div class="modal fade" id="myModal-5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-5">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!--MODAL HEADER-->
                <div class="modal-header  text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h4 class="modal-title" id="myModalLabel-5">EXPERIENCE AT M</h4>
                    <h6>
                        <small>Jan 2014 - Mar 2015</small>
                    </h6>
                </div>
                <!--MODAL BODY-->
                <div class="modal-body">
                    <p>
                        I have learned a great many things from participating in varsity football.
                        It has changed my entire outlook on and attitude toward life. Before my
                        freshman year at [high-school], I was shy, had low self-esteem and turned
                        away from seemingly impossible challenges. Football has altered all of these
                        qualities. On the first day of freshman practice, the team warmed up with a
                        game of touch football. The players were split up and the game began. However,
                    </p>
                </div>
                <!--MODAL FOOTER-->
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                </div>
            </div>
        </div>
    </div>
</section>
<input type="submit" id="btn-save" name="btn-save" value="Save">
</form>
<!--==========================================
                  PORTFOLIOS
===========================================-->


<!--==========================================
                   INTEREST
===========================================-->


<!--==========================================
             TESTIMONIALS AND CLIENTS
===========================================-->


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
            © Material CV. All right reserved by
            <a href="http://trimatrixlab.com/" target="_blank">
                <strong>Trimatrixlab</strong>
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
                    url: 'includes/profile/mentor-info-update.inc.php',
                    data: formData,
                    success: function (data) {
                        alert(data);
                        swalWithBootstrapButtons.fire(
                            'Changes Saved!',
                            'Your changes has been saved.',
                            'success'
                        )
                        // window.setTimeout(function(){ 
                        //     location.reload();
                        // }, 750);
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
</body>
</html>