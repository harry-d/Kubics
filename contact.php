<?php
session_start();
if(isset($_POST['submit'])){
	$name 		= 	trim($_POST['name']);
	$from 		= 	trim($_POST['email']);
	$subject 	= 	trim($_POST['subject']);
	$subject	=	"[Contact] ".$subject;
	$msgBody	= 	trim($_POST['message']);
	$to			=	'confederationcup2017@gmail.com';

	$headers	= 	'From: ' .$from. "\r\n" .
					'Reply-To: ' .$from. "\r\n" .
					'X-Mailer: PHP/' . phpversion();
	$send		=	mail($to, $subject, $msgBody, $headers);
	if($send){
		$_SESSION['sent_mail']	=	'<div class="alert alert-success">Your message has been sent and we will get back to you as soon as possible.</div>';
		header('Location: '.$_SERVER['PHP_SELF']);
		exit;
	}
    else{
        $_SESSION['sent_mail']	=	'<div class="alert alert-danger">There was an error sending your message. Please try again later.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Harry Dong">
    <link rel="shortcut icon" href="/logo.png" type="image/x-icon">

    <title>Contact - Confederation Cup</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Gentium+Book+Basic:400,400i|Roboto:400,400i" rel="stylesheet">

    <link href="css/con-cup.css" rel="stylesheet">
    <link href="css/con-cup-nav.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/easing.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/scrolling-parallax.js"></script>

    <!--<script src="js/con-cup.js"></script>-->
    <script src="js/con-cup-nav.js"></script>

</head>

<body class="push" data-spy="scroll" data-target=".navbar-fixed-top" style="background-color:#fff">
	<div style="min-height:calc(100% - 120px)">
		<!-- Navigation -->
	    <nav id="navbar" class="navbar navbar-custom navbar-fixed-top" role="navigation">
	        <div class="container">
	            <div class="navbar-header">
	                <button id="btn-nav-toggle" onclick="toggleNav()" type="button" class="navbar-toggle">
	                    <span class="icon-bar top-bar"></span>
	                    <span class="icon-bar middle-bar"></span>
	                    <span class="icon-bar bottom-bar"></span>
	                </button>
	                <a class="navbar-brand page-scroll" href="/">
	                    <i class="fa fa-home"></i><span id="brand-txt"><span class="light">Confederation Cup</span></span>
	                </a>
	            </div>

	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
	                <ul class="nav navbar-nav">
	                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
	                    <li><a href="/#about">About</a></li>
	                    <li><a href="register.html">Register</a></li>
						<li class="dropdown">
	                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">The Competition<span class="caret"></span></a>
	                        <ul class="dropdown-menu">
	                            <li><a href="debate-structure.html">Debate Structure</a></li>
	                            <li><a href="rules.html">Rules</a></li>
	                            <li><a href="events.html">Events</a></li>
	                        </ul>
	                    </li>
	                    <li><a href="contact.php">Contact</a></li>
	                    <li class="divider">&nbsp;|&nbsp;</li><li><a href="fr/contact.php">FR</a></li>
	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container -->
	    </nav>

		<div class="contact-bg">
			<h1>Contact</h1>
		</div>

    	<div class="content-section">
    		<div>
    			<?php
    				if(isset($_SESSION['sent_mail'])){
    					echo($_SESSION['sent_mail'].'<br>');
    					unset($_SESSION['sent_mail']);
    				}
    			?>

				<p style="font-size:24px">Email us at <a style="color:#921d20" href="mailto:confederationcup2017@gmail.com">confederationcup2017@gmail.com</a> or fill out the contact form below.</p>
    			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    				<div class="form-group">
    					<label for="name">Name:</label>
    					<input type="text" class="form-control" name="name" placeholder="Your Name" required>
    				</div>
    				<div class="form-group">
    					<label for="email">Email:</label>
    					<input type="email" class="form-control" name="email" placeholder="Your Email" required>
    				</div>
    				<div class="form-group">
    					<label for="subject">Subject:</label>
    					<input type="text" class="form-control" name="subject" placeholder="Subject Line" required>
    				</div>
    				<div class="form-group">
    					<label for="message">Message:</label>
    					<textarea class="form-control" rows="5" name="message" required></textarea>
    				</div>
    				<input type="submit" class="btn btn-default" name="submit" value="Submit">
    			</form>
    		</div>

    	</div>
	</div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p class="pull-left">Copyright &copy; Confederation Cup 2016</p><a href="contact.php" class="pull-right">confederationcup2017@gmail.com</a>
        </div>
    </footer>


</body>

</html>
