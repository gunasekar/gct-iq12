<?php
	session_start();
	if(isset($_SESSION['user_id']) && isset($_POST['submit'])){
		if(isset($_POST['subject']) && isset($_POST['content'])){
			$message = $_POST['content'];
			$subject = $_POST['subject'];
			$subject = "Queries - $subject";
			$user_name = $_SESSION['user_name'];
			$user_email = $_SESSION['user_email'];
			mail("infoquest@gct.net.in", $subject, $message, "From: \"$user_name\" <$user_email>\r\n" . "X-Mailer: PHP/" . phpversion());
			header("Location: contact.php");
			exit();
		}
	}
?>

<!DOCTYPE html>
<php lang="en">
<head>
	<title>Contact Us - IQ'12</title>
	<meta charset="utf-8">
		<meta name="description" content="InfoQuest - A National Level Technical Symposium - GCT CSITA" />
	<meta name="keywords" content="InfoQuest, IQ, GCT, CSITA, IQ'12, InfoQuest'12, National, Technical, Symposium, Alohomora, TopCoder, Govt. College of Technology, Coimbatore, Tamilnadu, SSQ, Login, CSE, IT, Computer Science & Engineering and Information Technology Association" />
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/popup.css" type="text/css" />
	
	<script type="text/javascript" src="js/popup.js"></script>
	<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
	<script type="text/javascript" src="js/cufon-yui.js"></script>
	<script type="text/javascript" src="js/Humanst521_BT_400.font.js"></script>
	<script type="text/javascript" src="js/Humanst521_Lt_BT_400.font.js"></script>
	<script type="text/javascript" src="js/cufon-replace.js"></script>
	<script type="text/javascript" src="js/roundabout.js"></script>
	<script type="text/javascript" src="js/roundabout_shapes.js"></script>
	<script type="text/javascript" src="js/gallery_init.js"></script>
	<script type="text/javascript" src="js/gen_validatorv4.js"></script>
	<!--[if lt IE 7]>
	<link rel="stylesheet" href="css/ie/ie6.css" type="text/css" media="all">
	<![endif]-->
	<!--[if lt IE 9]>
	<script type="text/javascript" src="js/php5.js"></script>
	<script type="text/javascript" src="js/IE9.js"></script>
	<![endif]-->
</head>

<body>
  <!-- header -->
  <header>
    <div class="container">
    	<h1><a href="index.php">InfoQuest'12</a></h1>
      <nav>
        <ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="events.php">Events</a></li>
			<li><a href="workshops.php">Workshops</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a href="sponsors.php">Sponsors</a></li>
			<li><a href="contact.php" class="current">Contact</a></li>
        </ul>
      </nav>
    </div>
	</header>

  <div class="main-box">
  	<?php
		if(!isset($_SESSION['user_id'])){
	?>
	<div class="container" align="right"><strong><a href="javascript:TINY.box.show({url:'popuplogin.html',width:300,height:160,openjs:'initPopupLogin',opacity:30})">Login</a> | <a href="register.php">Register</a></strong></div>
	<?}
	else
	echo "<div class='container' align='right'>Hi <span>".$_SESSION['user_name']."!</span> | <a href='logout.php'>Logout</a></div>";
	?>
    <div class="container">
      <div class="inside">
        <div class="wrapper">
        	<!-- aside -->
          <aside>
            <h2>Our <span>Contacts</span></h2>
            <!-- .contacts -->
            <?php
            include "contents/contacts.php";
            ?>
          </aside>
          <!-- content -->
          <section id="content">
            <article>
            <div align="center"><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Government+College+of+Technology,+Coimbatore,+Tamil+Nadu&amp;aq=0&amp;oq=Government+College+of+E&amp;sll=11.021522,76.938887&amp;sspn=0.005476,0.010568&amp;ie=UTF8&amp;hq=Government+College+of+Technology,&amp;hnear=Coimbatore,+Tamil+Nadu&amp;t=m&amp;cid=2646630960517072531&amp;ll=11.020901,76.936312&amp;spn=0.014743,0.018239&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Government+College+of+Technology,+Coimbatore,+Tamil+Nadu&amp;aq=0&amp;oq=Government+College+of+E&amp;sll=11.021522,76.938887&amp;sspn=0.005476,0.010568&amp;ie=UTF8&amp;hq=Government+College+of+Technology,&amp;hnear=Coimbatore,+Tamil+Nadu&amp;t=m&amp;cid=2646630960517072531&amp;ll=11.020901,76.936312&amp;spn=0.014743,0.018239&amp;z=15&amp;iwloc=A" style="color:#0000FF;text-align:left">View Larger Map</a></small>
            </div><br>
            <h2>Contact <span>Form</span></h2>
            <?php
            if(isset($_SESSION['user_id'])){
            ?>
              <form name="sendForm" id="sendForm" action="contact.php" method="post">
                <fieldset>
                  <div class="field">
                    <label>Subject</label><br>
                    <input name="subject" id="subject" type="text" value=""/>
                  </div>
                  <div class="field">
                    <label>Your Message</label><br>
                    <textarea name="content" id="content" rows="10" cols="50"></textarea>
                  </div><br>
                  <div><input type="submit" name="submit" value="Send Your Message!"></div>
                </fieldset>
              </form>
              <div id="sendForm_errorloc"></div>
			<script language="JavaScript" type="text/javascript">
				var frmvalidator  = new Validator("sendForm");
				frmvalidator.EnableOnPageErrorDisplaySingleBox();
				frmvalidator.EnableMsgsTogether();
				frmvalidator.addValidation("subject","req","Please enter the subject!");
				frmvalidator.addValidation("content","req","Please enter the content!");
			</script>
              <?
              }
              else
              echo "Please login to send us your queries!";
              ?>
            </article> 
          </section>
        </div>
      </div>
    </div>
  </div>
  <!-- footer -->
  <footer>
    <div class="container">
    	<div class="wrapper">
        <div class="fleft">Copyright &copy; <a rel="nofollow" href="http://www.infoquest.gct.net.in/" target="_blank">InfoQuest</a></div>
        <div class="fright"><a href="about.php">iVer 12.0</a></div>
        <div class="fcenter" align="center">Site designed and maintained by &nbsp;<a href="mailto:infoquest@gct.net.in">GCT CSITA - iTeam</a></div>
      </div>
    </div>
  </footer>
  <script type="text/javascript"> Cufon.now(); </script>  
</body>
</php>
