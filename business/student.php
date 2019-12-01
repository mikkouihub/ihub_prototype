<?php
  session_start();

  require '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'connection' . DIRECTORY_SEPARATOR . 'dbh.inc.php';
 
?>

<?php
  $userID = '';
  $fullName = '';
  $userEmail = '';
  $studentID = '';
  $student_url = '';

  if (isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['userID'];
    $fullName = $_SESSION['userName'];
    $userEmail = $_SESSION['userEmail'];
    $studentID = $_SESSION['studentID'];
    $student_url = $_SESSION['student_url'];
  }
?>

<?php
//   if (isset($_GET['company'])) {
//     $companyName = $_GET['company'];

//     $sql = "SELECT * FROM company WHERE company_url = ?";
//     $stmt = mysqli_stmt_init($conn);
  
//     if (!mysqli_stmt_prepare($stmt, $sql)) {
//       die('SQL Failed: ' . mysqli_error($conn));
//     } else {
//       mysqli_stmt_bind_param($stmt, "s", $companyName);
//       mysqli_stmt_execute($stmt);
      
//       $result = mysqli_stmt_get_result($stmt);
  
//       while ($row = mysqli_fetch_assoc($result)) {
//           $companyID = $row['company_ID'];
//           $companyName = $row['company_name'];
//           $companyEmail = $row['company_email'];
//           $companyAddress = $row['company_address'];
//           $companyContactNo = $row['company_contact_number'];
//           $companyBusinessType = $row['company_business_type'];
//           $companyURL = $row['company_url'];
//         //   $companyOwnerImage = $_SESSION['companyOwnerImage'];
//         //   $companyLogoImage = $_SESSION['companyLogoImage'];
//         //   $companyHeaderImage = $_SESSION['companyHeaderImage'];
//         //   $companyVideos = $_SESSION['companyVideos'];
//           $companyTagline = $row['company_tagline'];
//           $companyInfo = $row['company_info'];
//           $companyOwnerInfo = $row['company_owner_info'];
//       }
  
//       $sql = "SELECT * FROM user WHERE user_ID = $companyID";
//       $stmt = mysqli_stmt_init($conn);
  
//       if (!mysqli_stmt_prepare($stmt, $sql)) {
//           die('SQL Failed: ' . mysqli_error($conn));
//       } else {
//           mysqli_stmt_execute($stmt);
          
//           $result = mysqli_stmt_get_result($stmt);
  
//           while ($row_user = mysqli_fetch_assoc($result)) {
//               $userID = $row_user['user_ID'];
//               $fullName = $row_user['user_name'];
//           }
//       }
//     }
//   }
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
                <h2>JOHN DOE</h2>
                <h6>Software Engineer & UI/UX Expert</h6>
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
            <a href="#education"><i class="title-icon fa fa-graduation-cap"></i>Education</a>
            <!-- <a href="#skills"><i class="title-icon fa fa-sliders"></i>Skills</a> -->
            <a href="#experience"><i class="title-icon fa fa-suitcase"></i>Experience</a>
            <!-- <a href="#portfolios"><i class="title-icon fa fa-archive"></i>Portfolios</a>
            <a href="#interest"><i class="title-icon fa fa-heart"></i>Interest</a>
            <a href="#testimonials"><i class="title-icon fa fa-users"></i>Testimonials</a>
            <a href="#pricing-table"><i class="title-icon fa fa-money"></i>Pricing</a>
            <a href="#blog"><i class="title-icon fa fa-pencil-square"></i>Blog</a>
            <a href="#contact"><i class="title-icon fa fa-envelope"></i>Contact</a> -->
            <a href="edit-student.php"><i class="title-icon fa fa-edit"></i>Edit Profile</a>
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
        $sql = "SELECT * FROM student WHERE student_id = $studentID";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            die('SQL Failed: ' . mysqli_error($conn));
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result)) {
                $headerImage = $row['student_header_image'];

                if (empty($headerImage)) {
    ?>
                    <div class="header-background section" id="header_background_image"></div>
    <?php
                } else {
                    $fileLocation = 'student' . DIRECTORY_SEPARATOR . $student_url . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . 'student_header' . DIRECTORY_SEPARATOR . $headerImage;
    ?>
                    <div class="header-background section" id="header_background_image" style="background-image: url(students/<?php echo $student_url; ?>/profile/student_header/<?php echo $headerImage; ?>)">
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
                            $sql = "SELECT * FROM student WHERE student_id = $studentID";
                            $stmt = mysqli_stmt_init($conn);

                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                die('SQL Failed: ' . mysqli_error($conn));
                            } else {
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $logoImage = $row['student_owner_image'];

                                    if (empty($logoImage)) {
                        ?>
                                        <img alt="profile-image" class="img-responsive" id="logo_image" src="images/profile/profile.png">
                        <?php
                                    } else {
                                        $fileLocation = 'students' . DIRECTORY_SEPARATOR . $student_url . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . 'student_owner' . DIRECTORY_SEPARATOR . $logoImage; 
                        ?>
                                        <img alt="profile-image" class="img-responsive" id="logo_image" src="students/<?php echo $student_url; ?>/profile/student_owner/<?php echo $logoImage; ?>">
                        <?php
                                    }
                                }
                            }
                        ?>
                        <!-- <div class="slant"></div> -->

                        <!--EMPTY PLUS BUTTON-->
                        <!-- <div class="btn-floating btn-large add-btn"><i class="material-icons">add</i></div> -->

                        <!--VIDEO PLAY BUTTON-->
                        <!--<div id="button-holder" class="btn-holder">
                            <div id="play-btn" class="btn-floating btn-large btn-play">
                                <i id="icon-play" class="material-icons">play_arrow</i>
                            </div>
                        </div>-->
                    </div>
                    <!--VIDEO CLOSE BUTTON-->
                    <!--<div id="close-btn" class="btn-floating icon-close">
                        <i class="fa fa-close"></i>
                    </div>-->

                    <div class="card-content">
                        <?php
                            $sql = "SELECT * FROM user, student WHERE user.user_ID = $studentID AND student.student_id = $studentID";
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
                                    <h6 class="text-capitalize left"><?php echo $row['student_tagline']; ?></h6>
                                </div>

                                <!-- CONTACT INFO -->
                                <div class="infos">
                                    <ul class="profile-list">
                                        <li class="clearfix">
                                            <span class="title"><i class="material-icons">email</i></span>
                                            <span class="content"><?php echo $row['user_email']; ?></span>
                                        </li>
                                        <!-- <li class="clearfix">
                                            <span class="title"><i class="material-icons">language</i></span>
                                            <span class="content">yourpersonalwebsite.com</span>
                                        </li> -->
                                        <!-- <li class="clearfix">
                                            <span class="title"><i class="fa fa-skype" aria-hidden="true"></i></span>
                                            <span class="content">yourusername@skype.com</span>
                                        </li> -->
                                        <li class="clearfix">
                                            <span class="title"><i class="material-icons">phone</i></span>
                                            <span class="content"><?php echo $row['student_contact_no']; ?></span>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title"><i class="material-icons">place</i></span>
                                            <span class="content"><?php echo $row['student_address']; ?></span>
                                        </li>

                                    </ul>
                                </div>

                                <!--LINKS-->
                                <div class="links">
                                    <!-- FACEBOOK-->
                                    <a href="https://www.facebook.com/<?php echo $row['student_facebook']; ?>" target = "_blank" id="first_one"
                                    class="social btn-floating indigo"><i
                                            class="fa fa-facebook"></i></a>
                                    <!-- TWITTER-->
                                    <a href="https://twitter.com/<?php echo $row['student_twitter']; ?>" target = "_blank" class="social  btn-floating blue"><i
                                            class="fa fa-twitter"></i></a>
                                    <!-- GOOGLE+-->
                                    <a href="https://www.instagram.com/<?php echo $row['student_instagram']; ?>" target = "_blank" class="social  btn-floating red"><i
                                            class="fa fa-instagram"></i></a>
                                    <!-- LINKEDIN-->
                                    <a href="https://www.linkedin.com/in/<?php echo $row['student_linkedin']; ?>" target="_blank" class="social  btn-floating blue darken-3"><i
                                            class="fa fa-linkedin"></i></a>
                                </div>
                        <?php
                              }
                            }
                        ?>
                    </div>
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
                                $sql = "SELECT student_info FROM student WHERE student_id = $studentID";
                                $stmt = mysqli_stmt_init($conn);
                                
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    die('SQL Failed: ' . mysqli_error($conn));
                                } else {
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                    while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                        <p><?php echo $row['student_info']; ?></p>
                            <?php
                                    }
                                }
                            ?>
                        </p>
                    </div>

                    <!-- BUTTONS -->
                    <!-- <div id="about-btn" class="card-action">
                        <div class="about-btn"> -->
                            <!-- DOWNLOAD CV BUTTON -->
                            <!-- <a href="#" class="btn waves-effect">Download CV</a> -->
                            <!-- CONTACT BUTTON -->
                            <!-- <a href="#contact" class="btn waves-effect">Contact Me</a>
                        </div>
                    </div> -->
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
                <div class="timeline-dot"><h6>H</h6></div>
                <!-- TIMELINE CONTENT -->
                <div class="card timeline-content">
                    <div class="card-content">
                        <?php
                            $sql = "SELECT * FROM student WHERE student_id = $studentID";
                            $stmt = mysqli_stmt_init($conn);
                            
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                              die('SQL Failed: ' . mysqli_error($conn));
                            } else {
                              mysqli_stmt_execute($stmt);
                              $result = mysqli_stmt_get_result($stmt);

                              while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <!-- TIMELINE TITLE -->
                                <h6 class="timeline-title">High School</h6>
                                <!-- TIMELINE TITLE INFO -->
                                <div class="timeline-info">
                                    <h6>
                                        <small><?php echo $row['secondary_name']; ?></small>
                                    </h6>
                                    <h6>
                                        <small><?php echo date('F Y', strtotime($row['secondary_start'])); ?> - <?php echo date('F Y', strtotime($row['secondary_finish'])); ?></small>
                                    </h6>
                                </div>
                                <!-- TIMELINE PARAGRAPH -->
                                <p>
                                    <?php 
                                        if (empty($row['secondary_info'])) {
                                            'No Description';
                                        } else {
                                            echo $row['secondary_info'];
                                        } 
                                    ?>
                                </p>
                        <?php
                              }
                            }
                        ?>
                    </div>
                </div>
            </div>

            <!-- THIRD TIMELINE -->
            <div class="timeline-block">
                <!-- DOT -->
                <div class="timeline-dot"><h6>C</h6></div>
                <!-- TIMELINE CONTENT -->
                <div class="card timeline-content">
                    <div class="card-content">
                        <?php
                            $sql = "SELECT * FROM student WHERE student_id = $studentID";
                            $stmt = mysqli_stmt_init($conn);
                            
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                              die('SQL Failed: ' . mysqli_error($conn));
                            } else {
                              mysqli_stmt_execute($stmt);
                              $result = mysqli_stmt_get_result($stmt);

                              while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <!-- TIMELINE TITLE -->
                                <h6 class="timeline-title">College</h6>
                                <!-- TIMELINE TITLE INFO -->
                                <div class="timeline-info">
                                    <h6>
                                        <small><?php echo $row['higher_name']; ?></small>
                                    </h6>
                                    <h6>
                                        <small><?php echo date('F Y', strtotime($row['higher_start'])); ?> - <?php echo date('F Y', strtotime($row['higher_finish'])); ?></small>
                                    </h6>
                                </div>
                                <!-- TIMELINE PARAGRAPH -->
                                <p>
                                    <?php 
                                        if (empty($row['higher_info'])) {
                                            'No Description';
                                        } else {
                                            echo $row['higher_info'];
                                        } 
                                    ?>
                                </p>
                        <?php
                              }
                            }
                        ?>
                    </div>
                </div>
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
                            $sql = "SELECT * FROM student WHERE student_id = $studentID";
                            $stmt = mysqli_stmt_init($conn);
                            
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                              die('SQL Failed: ' . mysqli_error($conn));
                            } else {
                              mysqli_stmt_execute($stmt);
                              $result = mysqli_stmt_get_result($stmt);

                              while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <!-- TIMELINE TITLE -->
                                <h6 class="timeline-title"><?php echo $row['first_exp_title']; ?></h6>
                                <!-- TIMELINE TITLE INFO -->
                                <div class="timeline-info">
                                    <h6>
                                        <small><?php echo $row['first_exp_company']; ?></small>
                                    </h6>
                                    <h6>
                                        <small><?php echo date('F Y', strtotime($row['first_exp_start'])); ?> - <?php echo date('F Y', strtotime($row['first_exp_finish'])); ?></small>
                                    </h6>
                                </div>
                                <!-- TIMELINE PARAGRAPH -->
                                <p>
                                    <?php 
                                        if (empty($row['first_exp_info'])) {
                                            'No Description';
                                        } else {
                                            echo $row['first_exp_info'];
                                        } 
                                    ?>
                                </p>
                        <?php
                              }
                            }
                        ?>
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
                            $sql = "SELECT * FROM student WHERE student_id = $studentID";
                            $stmt = mysqli_stmt_init($conn);
                            
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                              die('SQL Failed: ' . mysqli_error($conn));
                            } else {
                              mysqli_stmt_execute($stmt);
                              $result = mysqli_stmt_get_result($stmt);

                              while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <!-- TIMELINE TITLE -->
                                <h6 class="timeline-title"><?php echo $row['second_exp_title']; ?></h6>
                                <!-- TIMELINE TITLE INFO -->
                                <div class="timeline-info">
                                    <h6>
                                        <small><?php echo $row['second_exp_company']; ?></small>
                                    </h6>
                                    <h6>
                                        <small><?php echo date('F Y', strtotime($row['second_exp_start'])); ?> - <?php echo date('F Y', strtotime($row['second_exp_finish'])); ?></small>
                                    </h6>
                                </div>
                                <!-- TIMELINE PARAGRAPH -->
                                <p>
                                    <?php 
                                        if (empty($row['second_exp_info'])) {
                                            'No Description';
                                        } else {
                                            echo $row['second_exp_info'];
                                        } 
                                    ?>
                                </p>
                        <?php
                              }
                            }
                        ?>
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
                            $sql = "SELECT * FROM student WHERE student_id = $studentID";
                            $stmt = mysqli_stmt_init($conn);
                            
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                              die('SQL Failed: ' . mysqli_error($conn));
                            } else {
                              mysqli_stmt_execute($stmt);
                              $result = mysqli_stmt_get_result($stmt);

                              while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <!-- TIMELINE TITLE -->
                                <h6 class="timeline-title"><?php echo $row['second_exp_title']; ?></h6>
                                <!-- TIMELINE TITLE INFO -->
                                <div class="timeline-info">
                                    <h6>
                                        <small><?php echo $row['third_exp_company']; ?></small>
                                    </h6>
                                    <h6>
                                        <small><?php echo date('F Y', strtotime($row['third_exp_start'])); ?> - <?php echo date('F Y', strtotime($row['third_exp_finish'])); ?></small>
                                    </h6>
                                </div>
                                <!-- TIMELINE PARAGRAPH -->
                                <p>
                                    <?php 
                                        if (empty($row['third_exp_info'])) {
                                            'No Description';
                                        } else {
                                            echo $row['third_exp_info'];
                                        } 
                                    ?>
                                </p>
                        <?php
                              }
                            }
                        ?>
                    </div>
                </div>
            </div>
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
<!--==========================================
                  PORTFOLIOS
===========================================-->
<section id="portfolios" class="section">
    <div class="container">
        <!-- SECTION TITLE -->
        <div class="section-title">
            <h4 class="text-uppercase text-center"><img src="images/icons/safe.png" alt="demo">Portfolios</h4>
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

                <!--CATEGORY 3-->
                <div id="all">
                </div>
            </div>
        </div>
    </div>
</section>


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

<!-- Products & Services Script -->
<script>
    $(document).ready(function () {
        var student_id = "<?php echo $userID; ?>";
        var student_url = "<?php echo $student_url; ?>";

        load_all();

        function load_all() {
            $.ajax({
                url:"includes/portfolio/load-student.inc.php",
                method:"POST",
                data: { student_id:student_id, student_url:student_url },
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