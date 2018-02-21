<?php
session_start();
if(isset($_POST['submit'])){
	$name 		= 	trim($_POST['name']);
	$from 		= 	trim($_POST['email']);
	$subject 	= 	trim($_POST['subject']);
	$subject	=	"[Contact] ".$subject;
	$msgBody	= 	trim($_POST['message']);
	$to			=	'coupedelaconfederation2017@gmail.com';

	$headers	= 	'From: ' .$from. "\r\n" .
					'Reply-To: ' .$from. "\r\n" .
					'X-Mailer: PHP/' . phpversion();
	$send		=	mail($to, $subject, $msgBody, $headers);
	if($send){
		$_SESSION['sent_mail']	=	'<div class="alert alert-success">Nous avons reçu votre message et vous répondrons aussitôt que possible</div>';
		header('Location: '.$_SERVER['PHP_SELF']);
		exit;
	}
    else{
        $_SESSION['sent_mail']	=	'<div class="alert alert-danger">Une erreur est survenue. Veuillez réessayer plus tard</div>';
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

    <title>Contact - La Coupe de la Confédération</title>

	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/animate.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Gentium+Book+Basic:400,400i|Roboto:400,400i" rel="stylesheet">

    <link href="../css/con-cup.css" rel="stylesheet">
    <link href="../css/con-cup-nav.css" rel="stylesheet">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/easing.js"></script>
    <script src="../js/wow.min.js"></script>

    <script src="../js/con-cup-nav.js"></script>

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
	                <a class="navbar-brand page-scroll" href="index.html">
	                    <i class="fa fa-home"></i><span id="brand-txt"><span class="light">La Coupe de la Confédération</span></span>
	                </a>
	            </div>

	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
	                <ul class="nav navbar-nav">
	                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
	                    <li><a href="/#about">À Propos</a></li>
						<li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Inscription<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="invitation.html">Invitation</a></li>
                                <li><a href="instructions.html">Instructions</a></li>
                                <li><a href="formulaire-inscription.php">Formulaire d'Inscription</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">La Compétition<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="debate-structure.html">Structure du Débat</a></li>
                                <li><a href="rules.html">Règlements</a></li>
                                <li><a href="events.html">Événements</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.php">Contact</a></li>
                        <li class="divider">&nbsp;|&nbsp;</li>
                        <li><a href="../contact.php">EN</a></li>
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

				<p style="font-size:24px">Envoyez-nous un courriel à <a style="color:#921d20" href="mailto:coupedelaconfederation2017@gmail.com">coupedelaconfederation2017@gmail.com</a>, ou complétez le formulaire ci-dessous.
</p>
    			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    				<div class="form-group">
    					<label for="name">Nom:</label>
    					<input type="text" class="form-control" name="name" required>
    				</div>
    				<div class="form-group">
    					<label for="email">Courriel:</label>
    					<input type="email" class="form-control" name="email" required>
    				</div>
    				<div class="form-group">
    					<label for="subject">Sujet:</label>
    					<input type="text" class="form-control" name="subject" required>
    				</div>
    				<div class="form-group">
    					<label for="message">Message:</label>
    					<textarea class="form-control" rows="5" required></textarea>
    				</div>
    				<input type="submit" class="btn btn-default" name="submit" value="Envoyer">
    			</form>
    		</div>

    	</div>
	</div>

    <!-- Footer -->
	<footer>
        <div class="container">
            <p class="pull-left">&copy; La Coupe de la Confédération 2017</p><a id="emailindex" href="contact.php" class="pull-right">coupedelaconfederation2017@gmail.com</a>
        </div>
    </footer>


</body>

</html>
