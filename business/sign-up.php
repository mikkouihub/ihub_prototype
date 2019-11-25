<?php 
  session_start();
  include_once '../includes/connection/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>FilCeb - Sign Up</title>
  <script type="text/javascript" src="http://cdn.pardot.com/pd.js"></script>
  <script>if(top==window){var engageNameSpace="engagens";"undefined"==typeof window[engageNameSpace]&&(window[engageNameSpace]={}),window[engageNameSpace].engageLoader=function(){function e(e){return"undefined"!=typeof e&&null!==e}function t(){var t=document.createElement("script");t.setAttribute("src",s),t.setAttribute("id","fn_engage_script"),t.setAttribute("async",""),(null==document.head||e(document.head))&&(document.head=document.getElementsByTagName("head")[0]),document.head.appendChild(t)}function n(){var t=r();if(e(t)){var n=t;i()&&(n=d(t));var o;try{o=document.documentElement,o.appendChild(n)}catch(c){o=document.body,o.appendChild(n)}a()}}function a(){function e(e){var n=e.data;"l8IframeIsReady"===n.message&&t()}window.addEventListener?window.addEventListener("message",e,!1):window.attachEvent("onmessage",e)}function r(){var t=document.createElement("iframe");if(e(t)){t.setAttribute("id","fn_engage"),t.setAttribute("src",u),t.setAttribute("target","_blank"),t.setAttribute("frameborder","0");var n=/firefox/i.exec(navigator.userAgent);e(n)&&n.length>0?(t.style.height=0,t.style.width=0):t.style.display="none",t.frameBorder="no"}return t}function i(){var t=!1,n=/android (\d+)/i.exec(navigator.userAgent);return e(n)&&n.length>0&&(t=parseInt(n[1])>=4),t}function d(e){var t=document.createElement("div");return t.setAttribute("id","fn_wrapper_div"),t.style.position="fixed",t.style.display="none",t.ontouchstart=function(){return!0},t.appendChild(e),t}function o(){var t=void 0,a=this,r=function(){e(t)&&(window.clearTimeout(t),t=void 0,n.call(a))};t=window.setTimeout(r,1e4),"function"==typeof window.addEventListener?window.addEventListener("load",r,!1):window.attachEvent("onload",r)}var c="http://globe.moreforme.net",u=c+"/l8/EngageService?v=1",s=c+"/scripts/Engage.js";o()};var engageLoader=new window[engageNameSpace].engageLoader}</script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <meta name="robots" content="index, nofollow">
  <link rel="shortcut icon" href="https://go.amazonservices.com/rs/amazoneu/images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

  <!-- For bower components -->
  <link rel="stylesheet" type="text/css" href="../package/bower_components/select2/dist/css/select2.min.css">
  <!-- For bower components -->


  <!--
    FIRST CSS AMAZON
    link rel="stylesheet" type="text/css" href="http://go.amazonsellerservices.com/vaslandingpageformleftcss"-->
  <!--Changed css below-->
  <link rel="stylesheet" type="text/css" href="../stylesheets/Applicationform.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
  <style type="text/css" pardot-region="bannerimage">
    #headerHero {
      background-image:url('../images/groupofentrepreneur.jpg');
    }
    @media (max-width: 1024px) {
      #headerHero {
        background-image:none;p
        background-color:#303942;
      }
    }
  </style>
  <link rel="shortcut icon" href="https://go.amazonservices.com/favicon.ico" type="image/x-icon">
  <link rel="icon" href="https://go.amazonservices.com/favicon.ico" type="image/x-icon">
  <style id="mktoDesktopStyle">
.lpeCElement {
  position:absolute;
}
.imageSpan img{
  width:100%; height:auto;
}
#lpeCDiv_58442 {z-index:15; left:762px; top:249px; }

.Customclass::-webkit-scrollbar {
    -webkit-appearance: none;
}
 
.Customclass::-webkit-scrollbar:vertical {
    width: 11px;
}
 
.Customclass::-webkit-scrollbar:horizontal {
    height: 11px;
}
 
.Customclass::-webkit-scrollbar-thumb {
    border-radius: 8px;
    border: 2px solid white; /* should match background, can't be transparent */
    background-color: #cccccc;
}
 
.Customclass::-webkit-scrollbar-track {
    background-color: #ffffff;
    border-radius: 8px;
}
 
.Customclass {
    height: 100px;
    overflow: scroll;
    width: 400px;
    background-color: #ffffff;
   border:0px;
   font-size:14px;
   color:#000000;
   border-radius:10px;
   padding-top:30px;
   padding-bottom:30px;
   padding-left:20px;
   padding-right:20px;
   width: 94%;
   margin-top: 12px;
   padding-bottom: 10px;

}
</style>

<style type="text/css">
  .error {
    font-size: 8pt;
    color: #a94442;
  }
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!--script src="http://go.amazonsellerservices.com/ahsapplicationjquery"></script-->
<link rel="stylesheet" type="text/css" href="../stylesheets/form.css">
<!--script type="text/javascript" src="http://form-cdn.pardot.com/js/piUtils.js?ver=20130530"></script-->
<!--script type="text/javascript">
piAId = '230492';
piCId = '8934';

(function() {
  function async_load(){
    var s = document.createElement('script'); s.type = 'text/javascript';
    s.src = ('https:' == document.location.protocol ? 'https://pi' : 'http://cdn') + '.pardot.com/pd.js';
    var c = document.getElementsByTagName('script')[0]; c.parentNode.insertBefore(s, c);
  }
  if(window.attachEvent) { window.attachEvent('onload', async_load); }
  else { window.addEventListener('load', async_load, false); }
})();
</script>
<script type="text/javascript" src="http://pi.pardot.com/analytics?ver=3&amp;visitor_id=&amp;pi_opt_in=&amp;campaign_id=8934&amp;account_id=230492&amp;title=&amp;url=http%3A%2F%2Fgo.amazonsellerservices.com%2Fapplytosellservicessoa1a%3Fld%3DAZUSVAS-globalfooter&amp;referrer="></script>
<script type="text/javascript" src="http://go.amazonsellerservices.com/analytics?conly=true&amp;visitor_id=54778520&amp;pi_opt_in=&amp;campaign_id=8934&amp;account_id=230492&amp;title=&amp;url=http%3A%2F%2Fgo.amazonsellerservices.com%2Fapplytosellservicessoa1a%3Fld%3DAZUSVAS-globalfooter&amp;referrer=&amp;visitor_id_sign=b5581c79929de8f73ed3538522c65da06a0322fa9ea8a791d81095568b854788e8b6cc5947d25b8acdff6c8ba71ef439aaaa38fd"></script-->
</head>

<body id="bodyId">

<div class="mktoContent">
<header id="headerHero"><div class="overlay"></div>
  <div id="headerWrapper" class="wrapper">
    <div id="headerLogo" class="logo fluid textLeft">
      <a href="../index.php">
        <img src="../images/FilcebMemberLogo.png" height="70" alt="Filceb Membership Logo"></a>
    </div>
    <div id="headerHeadline" class="fluid textCenter" pardot-region="banner" data-id="15"><h1>Filipino Cebuano Business Club, Inc.</h1>
      <div id="headerHeadline-para"><p><font color="#efeded" style="font-size:19px;">Linking you to Opportunities, Delivering Results</font></p></div></div>
  </div>
</header>

<section id="body"><div id="bodyWrapper" class="wrapper">

    


<!-- Beginning of Form -->

    <div id="bodyForm" class="fluid column-2-5 alignLeft" style="background-color: #dbdbdb; margin-top:10px;">
    <link rel="stylesheet" type="text/css" href="../stylesheets/Content_and_Applicationform.css"><h3 id="formTitle" style="text-align:center";>Apply to become a Filceb Member</h3>
      <p style="font-size:10px;text-align:center;"></p>
    <h4>

</h4>

<!--script type="text/javascript">(function(){ pardot.$(document).ready(function(){ (function() {
  var $ = window.pardot.$;
  window.pardot.FormDependencyMap = [{"master_field_html_id":"229492_8068pi_229492_8068","slave_field_html_id":"229492_8200pi_229492_8200","master_field_value":"Apparel and Jewelry Services"},{"master_field_html_id":"229492_8068pi_229492_8068","slave_field_html_id":"229492_8202pi_229492_8202","master_field_value":"Business Services - Facilities"},{"master_field_html_id":"229492_8068pi_229492_8068","slave_field_html_id":"229492_8198pi_229492_8198","master_field_value":"Business Services - Professional"},{"master_field_html_id":"229492_8068pi_229492_8068","slave_field_html_id":"229492_8204pi_229492_8204","master_field_value":"Consumer Electronic Services"},{"master_field_html_id":"229492_8068pi_229492_8068","slave_field_html_id":"229492_8206pi_229492_8206","master_field_value":"Education and Classes"},{"master_field_html_id":"229492_8068pi_229492_8068","slave_field_html_id":"229492_8208pi_229492_8208","master_field_value":"Event Services"},{"master_field_html_id":"229492_8068pi_229492_8068","slave_field_html_id":"229492_8212pi_229492_8212","master_field_value":"Home Maintenance Services"},{"master_field_html_id":"229492_8068pi_229492_8068","slave_field_html_id":"229492_8214pi_229492_8214","master_field_value":"Lawn Care and Landscape Services"},{"master_field_html_id":"229492_8068pi_229492_8068","slave_field_html_id":"229492_8216pi_229492_8216","master_field_value":"Performance"},{"master_field_html_id":"229492_8068pi_229492_8068","slave_field_html_id":"229492_8222pi_229492_8222","master_field_value":"Specialty Services"},{"master_field_html_id":"229492_8068pi_229492_8068","slave_field_html_id":"229492_8224pi_229492_8224","master_field_value":"Vehicle Services"},{"master_field_html_id":"229492_8068pi_229492_8068","slave_field_html_id":"229492_8210pi_229492_8210","master_field_value":"Health and Beauty Services"},{"master_field_html_id":"229492_8068pi_229492_8068","slave_field_html_id":"229492_9334pi_229492_9334","master_field_value":"Pet Products"}];

  $('.form-field-master input, .form-field-master select').each(function(index, input) {
    $(input).on('change', window.piAjax.checkForDependentField);
    window.piAjax.checkForDependentField.call(input);
  });
})(); });})();</script-->

<form accept-charset="UTF-8" action="" method="POST" enctype="multipart/form-data" class="form" id="myform">

<!-- NO OF EMPLOYEES RESTRICTION -->
<!--<style type="text/css">
form.form p label { color: #000000; }
</style><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script><script>
  $(document).ready(function(){
    $('.numofemployees > input').attr("maxlength", 8);
    $('.numofemployees').keyup(warningTooManyDigits);
    $('.thirdParty > input').attr("maxlength", 255);
    $('.thirdParty').keyup(warningThirdPartyTooLong);

    $('.primaryProfValue').hide();
    $('.priprofcheck').on('change', function(){
      var selectedProf = $('.priprofcheck').find(':selected').text();
      $('.primaryProfValue > select option:contains("' + selectedProf + '")').filter(function(i){
          return $(this).text() === selectedProf;
      }).prop('selected', true);
    });
  });
/*
  function warningTooManyDigits(){
    if($('.numofemployees > input').val().length >= 8){
      if($('.employeeWarn').length <= 0){
        var warning = document.createElement('p');
        warning.classList.add('employeeWarn');
        warning.style.color = 'red';
        warning.style.paddingLeft = '150px';
        warning.innerHTML = 'Maximum allowed digits are 8';
        $('.numofemployees').append(warning);
      }
    } else if($('.employeeWarn').length > 0){
      $('.employeeWarn').remove();
    }
  }
*/
 
  function warningThirdPartyTooLong(){
    if($('.thirdParty > input').val().length >= 255){
      if($('.thirdPartyWarn').length <= 0){
        var warning = document.createElement('p');
        warning.classList.add('thirdPartyWarn');
        warning.style.color = 'red';
        warning.style.paddingLeft = '150px';
        warning.innerHTML = 'Your input exceeds maximum length, please shorten it';
        $('.thirdParty').append(warning);
      }
    } else if($('.thirdPartyWarn').length > 0){
      $('.thirdPartyWarn').remove();
    }
  }
</script> END OF RESTRICTION ON NO OF EMPLOYEES--> 

<!-- <script type="text/javascript">
  function populate(s1,s2){
    var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);
    s2.innerHTML = "";

    if(s1.value == "Products"){
      var optionArray = ["|","Agriculture & Food|Agriculture & Food","Apparel, Textiles & Accessories|Apparel, Textiles & Accessories","Auto & Transportation|Auto & Transportation","Electronics & Electrical Equipments|Electronics & Electrical Equipments","Health & Beauty|Health & Beauty","Home, Lights & Construction|Home, Lights & Construction","Machinery, Industrial Parts & Tools|Machinery, Industrial Parts & Tools","Packaging, Advertising & Office|Packaging, Advertising & Office","Business & Commercial|Business & Commercial","Computer Electronics|Computer Electronics","House Cleaning|House Cleaning","House Improvement|House Improvement","Maintenance & Repair|Maintenance & Repair"];
    }
     else if(s1.value == "Services") {
      var optionArray = ["|","Agriculture & Food|Agriculture & Food","Apparel, Textiles & Accessories|Apparel, Textiles & Accessories","Auto & Transportation|Auto & Transportation","Electronics & Electrical Equipments|Electronics & Electrical Equipments","Health & Beauty|Health & Beauty","Home, Lights & Construction|Home, Lights & Construction","Machinery, Industrial Parts & Tools|Machinery, Industrial Parts & Tools","Packaging, Advertising & Office|Packaging, Advertising & Office","Business & Commercial|Business & Commercial","Computer Electronics|Computer Electronics","House Cleaning|House Cleaning","House Improvement|House Improvement","Maintenance & Repair|Maintenance & Repair"];
    }
    else if(s1.value == "Products and Services") {
      var optionArray = ["|","Agriculture & Food|Agriculture & Food","Apparel, Textiles & Accessories|Apparel, Textiles & Accessories","Auto & Transportation|Auto & Transportation","Electronics & Electrical Equipments|Electronics & Electrical Equipments","Health & Beauty|Health & Beauty","Home, Lights & Construction|Home, Lights & Construction","Machinery, Industrial Parts & Tools|Machinery, Industrial Parts & Tools","Packaging, Advertising & Office|Packaging, Advertising & Office","Business & Commercial|Business & Commercial","Computer Electronics|Computer Electronics","House Cleaning|House Cleaning","House Improvement|House Improvement","Maintenance & Repair|Maintenance & Repair"];
    }
    for(var option in optionArray){
       var pair = optionArray[option].split("|");
       var newOption = document.createElement("option");
       newOption.value = pair[0];
       newOption.innerHTML = pair[1];
       s2.options.add(newOption);
    }
  }
</script>  -->



<!-- FULL NAME -->
<div class="form-field  required ">  
  <label class="field-label">Full Name</label> 
    <input  type="text" name="fullName" value="<?php echo isset($_POST["firstName"]) ? htmlentities($_POST["firstName"]) : ''; ?>" class="text" size="30" maxlength="255" onchange="" placeholder="e.g., John" required autofocus></div> 

<!-- EMAIL -->
<div class="form-field  required ">
  <label class="field-label">Email</label>
    <input type="text" id="email" name="email" value="<?php echo isset($_POST["email"]) ? htmlentities($_POST["email"]) : ''; ?>" class="text" size="30" maxlength="255" onchange="" placeholder="e.g., john@example.com" required>
  </div>

<!-- PASSWORD -->
<div class="form-field  required ">
  <label class="field-label">Password</label>
   <input type="password" id="password" name="password" value="" class="text" size="30" maxlength="255" required></div>

<!-- CONFIRM PASSWORD -->
<div class="form-field  required ">
   <label class="field-label" >Confirm Password</label>
   <input type="password" id="confirmPassword" name="confirmPassword" value="" class="text" size="30" maxlength="255" required></div>

<!-- USER TYPE -->
<div class="form-field  required ">
   <label class="field-label">User Type</label>
      <select name="userType" id="category-dropdown" class="form-control categorydropdown" required>
          <option value="">Select User Type</option>
          <option value="Student">Student</option>
          <option value="Mentor">Mentor</option>
          <option value="Company">Company</option>
      </select>
</div>
  
  
<!-- SUBMIT -->  
  <button id="submit" type="submit" name="_utf8">Sign Up</button>
  <br><br><center><div id="info"></div></center>

  <!-- forces IE5-8 to correctly submit UTF8 content  -->
  <!--input name="_utf8" type="hidden" value="?"><p class="submit">
   <input type="submit" accesskey="s" value="Submit"></p-->
 
 <!-- Bower scripts -->
<script src="../package/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../package/bower_components/select2/dist/js/select2.min.js"></script>
<script type="text/javascript">
      $(".selections").select2();
    </script>
<!--  -->

<script type="text/javascript">
//<![CDATA[

  var anchors = document.getElementsByTagName("a");
  for (var i=0; i<anchors.length; i++) {
    var anchor = anchors[i];
    if(anchor.getAttribute("href")&&!anchor.getAttribute("target")) {
      anchor.target = "_top";
    }
  }
    
//]]>
</script><input type="hidden" name="hiddenDependentFields" id="hiddenDependentFields" value=""></form></div>
<!-- end of form  -->



<!--Beginning of Main Page Content-->
    <div id="bodyContent" class="fluid column-3-5 alignLeft" pardot-region="body" data-id="17"><h2 style="margin-bottom:12px"><span style="font-size:24px;"><strong>What is <font color="#f8c91c">Filipino Cebuano Business Club Inc.</font>?</strong></span></h2>

<p>Welcome to the Philippines only peer-to-peer network exclusively for entrepreneurs. Since 2008, Filceb has been transforming the lives of the entrepreneurs who transform the world. As the global thought leader on entrepreneurship, Filceb plays an integral role in businesses, industries and the lives of leading entrepreneurs everywhere.&nbsp;</p>

<h2 style="margin-bottom:12px"><span style="font-size:24px;"><strong>Our <font color="#f8c91c">Mission</font></strong></span></h2>

<ul><li>To help one another in promoting business opportunities among  MSME's.&nbsp;</li>
  <li>To encourage new breed of entrepreneurs  who understand that the sole purpose  of wealth is not only for wealth's sake but to help other people.</li>
  <li>To provide every Cebuano entrepreneur a venue to develop, enhance, and strengthen its potential and capabilities in helping Philippine economy.</li>
  <li>To provide appropriate assistance to FilCeb members with reliable support and make exposure to local and international market.</li>
  <li>To foster strategic alliance with national and local government units, agencies to advance the cause of MSME's.</li>
</ul>

<h2 style="margin-bottom:12px"><span style="font-size:24px;"><strong><font color="#f8c91c" >Why Join</font> with Filceb?</strong></span></h2>

<table border="0" cellpadding="5" style="width: 100%;" width="100%"><tbody><tr><td align="left" style="width: 60px;" valign="top"><img alt="Set It and Forget It" height="46" src="../images/starbenefit.png" style="width: 45px; height: 46px;" title="Set It and Forget It" width="45"></td>
      <td align="left" style="padding-bottom: 10px; width: 637px;" valign="top"><span style="font-size: 17px;"><strong>We help transform the lives of the entrepreneurs who transform the world.</strong></span><br>
      You�ve built your business from the ground up. You�ve guided an enterprise through a risky situations. You�ve already made a mark, but you need to scale-up: A bigger impact. A trusted peer group. A stronger foundation. New wisdom. Inspiration.?&nbsp;</td>
    </tr><tr><td align="left" style="width: 60px;" valign="top"><img alt="Set It and Forget It" height="46" src="../images/starbenefit.png" style="width: 45px; height: 46px;" title="Set It and Forget It" width="45"></td>
      <td align="left" style="padding-bottom: 10px; width: 637px;" valign="top"><span style="font-size: 17px;"><strong>Filceb Mentorship</strong></span><br>
      Filceb Mentorship fosters relationships aimed at high-level lead?ership and personal development within a structured time frame. Throughout the mentorship process, Mentees work toward goals and establish personal accountability, while Mentors support them through next-level education and engagement.<strong> </strong></td>
    </tr><tr><td align="left" style="width: 60px;" valign="top"><img alt="Set It and Forget It" height="46" src="../images/starbenefit.png" style="width: 45px; height: 46px;" title="Set It and Forget It" width="45"></td>
      <td align="left" style="padding-bottom: 10px; width: 637px;" valign="top"><span style="font-size: 17px;"><strong>Seminars & Trainings</strong></span><br><span style="font-size: 14px;">Filceb challenges members� assumptions, test their ways of doing business and introduces them to new ways of thinking. Most important, members return to their business with fresh ideas, new skills, a toolkit of resources and a greater capacity for addressing the challenges they and their company will face.</span></td>
    </tr><tr><td align="left" style="width: 60px;" valign="top"><img alt="Set It and Forget It" height="46" src="../images/starbenefit.png" style="width: 45px; height: 46px;" title="Set It and Forget It" width="45"></td>
      <td align="left" style="padding-bottom: 10px; width: 637px;" valign="top"><span style="font-size: 17px;"><strong>Digital Transformation</strong></span><br><span style="font-size:14px;">Profound transformation of business and organizational activities, processes, competencies and models to fully leverage the changes and opportunities of a mix of digital technologies and their accelerating impact across society in a strategic and prioritized way, with present and future.</span></td>
    </tr><tr><td align="left" style="width: 60px;" valign="top"><img alt="Set It and Forget It" height="46" src="../images/starbenefit.png" style="width: 45px; height: 46px;" title="Set It and Forget It" width="45"></td>
      <td align="left" style="padding-bottom: 10px; width: 637px;" valign="top"><span style="font-size: 17px;"><strong>Consulting</strong></span><br><span style="font-size: 14px;">With partner consultants works with members on strategy, planning and problem solving, and helps Filceb members develop business skills and knowledge.</span></td>
    </tr><tr><td align="left" style="width: 60px;" valign="top"><img alt="Set It and Forget It" height="46" src="../images/starbenefit.png" style="width: 45px; height: 46px;" title="Set It and Forget It" width="45"></td>
      <td align="left" style="padding-bottom: 10px; width: 637px;" valign="top"><span style="font-size: 17px;"><strong>Filceb Partnerships</strong></span><br><span style="font-size: 14px;">Leading entrepreneurs connecting with top-notched organizations to foster growth and create business opportunities. ?Companies that engage Filceb members on a local level, providing value through sponsorship support or in-kind value.</span></td>
    </tr><tr><td align="left" style="width: 60px;" valign="top"><img alt="Set It and Forget It" height="46" src="../images/starbenefit.png" style="width: 45px; height: 46px;" title="Set It and Forget It" width="45"></td>
      <td align="left" style="padding-bottom: 10px; width: 637px;" valign="top"><span style="font-size: 17px;"><strong>Filceb Programs</strong></span><br><span style="font-size: 14px;">A lifetime of learning is now at your fingertips through Filceb Connect an online platform designed to support your personal and professional needs through immediate member-to-member connection.</span></td>
    </tr></tbody>
  </table>

  <h2 style="margin-bottom:12px"><span style="font-size:24px;"><strong><font color="#f8c91c"> Wisdom & Inspirational thoughts from Mr. Rey E. Calooy "The Iron Entrepreneur of the South"</font></strong></span></h2>

<p><object height="400" width="100%"><param name="movie" value="https://www.youtube.com/embed/FmfpFoEnpVk"><param name="allowFullScreen" value="true"><param name="allowscriptaccess" value="always"><embed height="400" src="https://www.youtube.com/embed/FmfpFoEnpVk" width="100%"></object></p></div>
<!--End of Main Page Content-->


  </div>
</section><section id="legal" class="light"><div id="legalWrapper" class="wrapper">
    <div id="legalText" class="tiny fluid">
        <p></p>
      </div>
    </div>
  </section></div>

<!-- F O O T E R -->  

<!--footer id="footer" class="dark"><div id="footerWrapper" class="wrapper">
    <div id="footerLogo" class="fluid column-1-5 textLeft alignLeft">
      <a href="https://services.amazon.com" target="_blank">
        <img src="https://images-na.ssl-images-amazon.com/images/G/01/vas/images/automation/selling-services-logo-wht._V526325869_.gif" height="30" alt="Amazon Services Logo"></a>
    </div>
    <div id="footerLegal" class="fluid column-3-5 textCenter alignLeft">
      <p><a href="https://services.amazon.com/content/amazon-seller-services-products.htm" target="_blank">See all Solutions</a> | <a href="https://services.amazon.com/content/Privacy_Policy.htm" target="_blank">Privacy Policy</a> | <a href="https://services.amazon.com/content/Terms_Conditions.htm" target="_blank">Terms and Conditions</a><br><span>�2017 Amazon Services LLC. All rights reserved. An Amazon Company</span></p>
    </div>
    <div id="footerSocial" class="fluid column-1-5 textRight alignLeft">
      <ul><li>
          <a class="linkedin" href="https://www.linkedin.com/company/amazon-services">
            <span>LinkedIn</span>
          </a>
        </li>
        <li>
          <a class="twitter" href="https://twitter.com/AmazonMarketPl" target="_blank">
            <span>Twitter</span>
          </a>
        </li>
        <li>
          <a class="facebook" href="https://www.facebook.com/SellonAmazon" target="_blank">
            <span>Facebook</span>
          </a>
        </li>
      </ul></div>
  </div>
</footer-->
</body>
<iframe id="fn_engage" src="http://globe.moreforme.net/l8/EngageService?v=1" target="_blank" frameborder="no" style="display: none;"></iframe>

<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>  
<script>
var geocoder;
var map;
var marker;

/*
 * Google Map with marker
 */
function initialize() {
    var initialLat = $('.search_latitude').val();
    var initialLong = $('.search_longitude').val();
    initialLat = initialLat?initialLat:36.169648;
    initialLong = initialLong?initialLong:-115.141000;

    var latlng = new google.maps.LatLng(initialLat, initialLong);
    var options = {
        zoom: 16,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("geomap"), options);

    geocoder = new google.maps.Geocoder();

    marker = new google.maps.Marker({
        map: map,
        draggable: true,
        position: latlng
    });

    google.maps.event.addListener(marker, "dragend", function () {
        var point = marker.getPosition();
        map.panTo(point);
        geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                marker.setPosition(results[0].geometry.location);
                $('.search_addr').val(results[0].formatted_address);
                $('.search_latitude').val(marker.getPosition().lat());
                $('.search_longitude').val(marker.getPosition().lng());
            }
        });
    });

}

$(document).ready(function () {
    //load google map
    initialize();
    
    /*
     * autocomplete location search
     */
    var PostCodeid = '#address_txt';
    $(function () {
        $(PostCodeid).autocomplete({
            source: function (request, response) {
                geocoder.geocode({
                    'address': request.term
                }, function (results, status) {
                    response($.map(results, function (item) {
                        return {
                            label: item.formatted_address,
                            value: item.formatted_address,
                            lat: item.geometry.location.lat(),
                            lon: item.geometry.location.lng()
                        };
                    }));
                });
            },
            select: function (event, ui) {
                $('.search_addr').val(ui.item.value);
                $('.search_latitude').val(ui.item.lat);
                $('.search_longitude').val(ui.item.lon);
                var latlng = new google.maps.LatLng(ui.item.lat, ui.item.lon);
                marker.setPosition(latlng);
                initialize();
            }
        });
    });
    
    /*
     * Point location on google map
     */
    $('.get_map').click(function (e) {
        var address = $(PostCodeid).val();
        geocoder.geocode({'address': address}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                marker.setPosition(results[0].geometry.location);
                $('.search_addr').val(results[0].formatted_address);
                $('.search_latitude').val(marker.getPosition().lat());
                $('.search_longitude').val(marker.getPosition().lng());
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
        e.preventDefault();
      });

    //Add listener to marker for reverse geocoding
    google.maps.event.addListener(marker, 'drag', function () {
        geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    $('.search_addr').val(results[0].formatted_address);
                    $('.search_latitude').val(marker.getPosition().lat());
                    $('.search_longitude').val(marker.getPosition().lng());

                    var Latitude = marker.getPosition().lat();
                    var Longitude = marker.getPosition().lng();
                }
            }
        });
    });

    
    

});
</script>

<script src="../javascript/js/jquery.min.js"></script> 
<script src="../javascript/js/bootstrap.min.js"></script> 
<script src="../javascript/js/validation.min.js"></script>

<script type="text/javascript">
 $(document).ready(function(){
$('#myform').validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      firstname: "required",
      lastname: "required",
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      password: {
        required: true,
        minlength: 8
      },
      //confirmPassword : "required"
      confirmPassword : {
        required: true,
        equalTo: password
      },
      contactNo : {
        required: true,
        number:true,
        minlength: 11

      },
      noEmployees : {
        required: true,
        number:true,
      },
      
    },
    // Specify validation error messages
    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long"
      },
      contactNo: {
        minlength: " Your contact number must be atleast 11 digits long"
      }
      //confirmPassword : "Please confirm your password",
      //email: "Please enter a valid email address"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
     submitHandler: subform
     // submitHandler: function(form) {
     //  form.submit();
    //}
  });
  function subform(){
            //var data = $("#myform").serialize();
            var form_data = new FormData($('#myform')[0]);
            $.ajax({
                type: 'POST',
                url: '../includes/user-management/sign-up.inc.php',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $("#info").fadeOut();
                    $("#submit").html("Signing-up...");
                },
                success: function(resp){
                    if(resp=="success"){
                        $("#submit").html("<img src='../images/ajax-loader.gif' width='15'/> &nbsp; Signing-up");
                        setTimeout('window.location.href = "../index.php";',4000);
                    }
                    else{
                        $("#info").fadeIn(1000, function(){
                            $("#info").html("<div class='text-danger'>"+resp+"</div>");
                            $("#submit").html('Sign Up');
                        })
                    }
                    
                }
            })
        } 
  });

</script>

<style type="text/css">
    #geomap{
    width: 0px;
    height: 0px;
}
#data, #all_data{
      display: none;
    }
</style>
<!-- display google map -->
<div id="geomap"></div>

<!-- display selected location information -->
<script     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAORgBJH27gNoxWYQZkkBsnvk2ry2sVjk">
    </script>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAORgBJH27gNoxWYQZkkBsnvk2ry2sVjk&callback=loadMap "
    async defer></script>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</html>