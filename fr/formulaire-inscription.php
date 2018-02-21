<?php
session_start();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST['submit'])){

	$name1 = $city1 = $grade1 = $email1 = $parent1 = $parentemail1 = $name2 = $city2 = $grade2 = $email2 = $parent2 = $parentemail2 = $supervisor = $supervisoremail = $school = $video = $box1 = $box2 = "";

	$name1Err = $city1Err = $grade1Err = $email1Err = $parent1Err = $parentemail1Err = $name2Err = $city2Err = $grade2Err = $email2Err = $parent2Err = $parentemail2Err = $supervisorErr = $supervisoremailErr = $schoolErr = $videoErr = $box1Err = $box2Err = "";

	if (empty($_POST["name1"])) {
	    $name1Err = "Obligatoire";
	} else {
	    $name1 = test_input($_POST["name1"]);
	}
	if (empty($_POST["city1"])) {
	    $city1Err = "Obligatoire";
	} else {
	    $city1 = test_input($_POST["city1"]);
	}
	if (empty($_POST["grade1"])) {
	    $grade1Err = "Obligatoire";
	} else {
	    $grade1 = test_input($_POST["grade1"]);
	}
	if (empty($_POST["email1"])) {
	    $email1Err = "Obligatoire";
	} else {
	    $email1 = test_input($_POST["email1"]);
	}
	if (empty($_POST["parent1"])) {
	    $parent1Err = "Obligatoire";
	} else {
	    $parent1 = test_input($_POST["parent1"]);
	}
	if (empty($_POST["parentemail1"])) {
	    $parentemail1Err = "Obligatoire";
	} else {
	    $parentemail1 = test_input($_POST["parentemail1"]);
	}
	if (empty($_POST["name2"])) {
	    $name2Err = "Obligatoire";
	} else {
	    $name2 = test_input($_POST["name2"]);
	}
	if (empty($_POST["city2"])) {
	    $city2Err = "Obligatoire";
	} else {
	    $city2 = test_input($_POST["city2"]);
	}
	if (empty($_POST["grade2"])) {
	    $grade2Err = "Obligatoire";
	} else {
	    $grade2 = test_input($_POST["grade2"]);
	}
	if (empty($_POST["email2"])) {
	    $email2Err = "Obligatoire";
	} else {
	    $email2 = test_input($_POST["email2"]);
	}
	if (empty($_POST["parent2"])) {
	    $parent2Err = "Obligatoire";
	} else {
	    $parent2 = test_input($_POST["parent2"]);
	}
	if (empty($_POST["parentemail2"])) {
	    $parentemail2Err = "Obligatoire";
	} else {
	    $parentemail2 = test_input($_POST["parentemail2"]);
	}
	if (empty($_POST["supervisor"])) {
	    $supervisorErr = "Obligatoire";
	} else {
	    $supervisor = test_input($_POST["supervisor"]);
	}
	if (empty($_POST["supervisoremail"])) {
	    $supervisoremailErr = "Obligatoire";
	} else {
	    $supervisoremail = test_input($_POST["supervisoremail"]);
	}
	if (empty($_POST["school"])) {
	    $schoolErr = "Obligatoire";
	} else {
	    $school = test_input($_POST["school"]);
	}
	if (empty($_POST["video"])) {
	    $videoErr = "Obligatoire";
	} else {
	    $video = test_input($_POST["video"]);
	}

	if(isset($_POST['box1']) && $_POST['box1']!=""){
	    $box1 = "checked";
	} else {
		$box1Err = "Obligatoire";
	}
	if(isset($_POST['box2']) && $_POST['box2']!=""){
	    $box2 = "checked";
	} else {
		$box2Err = "Obligatoire";
	}


	$msgBody = "Name 1: ".$name1."\r\nCity 1: ".$city1."\r\nGrade 1: ".$grade1."\r\nEmail 1: ".$email1.
	"\r\nParent 1: ".$parent1."\r\nParent Email 1: ".$parentemail1.
	"\r\nName 2: ".$name2."\r\nCity 2: ".$city2."\r\nGrade 2: ".$grade2."\r\nEmail 2: ".$email2.
	"\r\nParent 2: ".$parent2."\r\nParent Email 2: ".$parentemail2.
	"\r\nSupervisor: ".$supervisor."\r\nSupervisor Email: ".$supervisoremail.
	"\r\nSchool: ".$school."\r\nVideo: ".$video."\r\Box 1: ".$box1."\r\Box 2: ".$box2;

	$subject	=	"[Formulaire d'Inscription] de ".$name1." et ".$name2;

	$to			=	'coupedelaconfederation2017@gmail.com';

	$headers	= 	'From: ' .$to. "\r\n" .
					'Reply-To: ' .$to. "\r\n" .
                    "Importance: High\r\n".
					'X-Mailer: PHP/' . phpversion();
	mail($to, $subject, $msgBody, $headers);


	if(true){

        $headers	= 	'From: ' .$to. "\r\n" .
                        'Reply-To: ' .$to. "\r\n" .
                        "Importance: Low\r\n".
                        'X-Mailer: PHP/' . phpversion();

        mail($email1, $subject, $msgBody, $headers);
        mail($email2, $subject, $msgBody, $headers);
        mail($supervisoremail, $subject, $msgBody, $headers);

        $headers	= 	'From: ' .$to. "\r\n" .
                        'Reply-To: ' .$to. "\r\n" .
                        "Importance: High\r\n".
                        'X-Mailer: PHP/' . phpversion();

        $msgBody = "Bonjour,\r\n\r\nVous recevez ce message parce que vous avez été identifié comme étant le parent/tuteur de ".$name1." pour les rondes de qualification en français de la Coupe de la Confédération, un tournoi de débat étudiant pour souligner les 150 ans du Canada. Pour de plus ample information, veuillez consulter notre site web: confederationcup2017.ca.\r\n\r\nVotre enfant souhaite déposer sa candidature pour participer au tournoi. Toutefois, sans votre autorisation, la candidature de votre enfant ne peut pas être évaluée. Nous vous prions de répondre à ce courriel indiquant que vous permettez à votre enfant de poser sa candidature, et que, au mieux de vos connaissances, votre enfant sera disponible pour se rendre à Ottawa pour les Finales nationales de la Coupe de la Confédération à Ottawa du 28 au 30 avril prochain, s’il/elle est choisi(e) comme finaliste. Veuillez notez que les frais de voyage et d’hébergement pour les élèves seront déboursés par les organisateurs du tournoi, grâce à l’appui financier généreux de la Aurea Foundation. Cependant, un adulte (parent, enseignant, coach de débat, etc.) doit accompagner chaque équipe finaliste, mais les frais de voyage pour cet accompagnateur ne peuvent pas être déboursés par les organisateurs, et devront être déboursés par, ou partagés parmi, les élèves, les parents, l’école, etc., selon les normes dans votre communauté.\r\n\r\nSi vous autorisez la participation de votre enfant, répondez à ce courriel avec ce message complété :\r\n\r\n« J’autorise [nom de l’enfant] à participer à aux rondes de qualification en français de la Coupe de la Confédération, et, au mieux de ma connaissance, [nom de l’enfant] est disponible pour se rendre aux Finales nationales à Ottawa du 28 au 30 avril prochain, [s’il/elle] est choisie comme finaliste.\r\n\r\n[votre nom]»\r\n\r\nSi vous avez d’autres questions ou pour tout autre renseignement, contactez-nous par courriel: coupedelaconfederation2017@gmail.com.\r\n\r\nMerci,\r\n\r\nLe comité organisateur de la Coupe de la Confédération\r\n\r\n***\r\n\r\nHi,\r\n\r\nYou are receiving this email because you have been listed as a parent/guardian contact for ".$name1." for the Confederation Cup Debate French Qualifier, a debate tournament celebrating Canada’s 150th anniversary. For more information, visit confederationcup2017.ca.\r\n\r\nYour child wishes to apply to be considered for this tournament. However, without parent/guardian consent, your child’s application cannot be considered. Please respond to this email indicating that you consent to your child’s application and that to the best of your knowledge, if chosen as a finalist, your child will be able to attend the Confederation Cup Finals in Ottawa, April 28-30th. Note that the travel and accommodation for students will be covered by the tournament, thanks to the generous support of the Aurea Foundation. However, a designated chaperone (parent, coach, teacher, etc.) will need to accompany every team, and the travel costs for this chaperone will need to be covered or shared by participating debaters and/or schools, according to your debate community’s norms.\r\n\r\nIf you consent, please respond to this email the following:\r\n\r\n'I consent to [child’s full name]’s participation in the Confederation Cup Debate French Qualifier, and to the best of my knowledge [child’s name] will be able to attend the Finals in Ottawa April 28th-30th, 2017 in case of selection.\r\n\r\n[your full name]'\r\n\r\nPlease feel free to email us at coupedelaconfederation2017@gmail.com if you have further questions.\r\n\r\nThanks,\r\n\r\nConfederation Cup Organizing Committee";

        mail($parentemail1, "Formulaire D'Autorisation de la Coupe de la Confédération 2017", $msgBody, $headers);

        $msgBody = "Bonjour,\r\n\r\nVous recevez ce message parce que vous avez été identifié comme étant le parent/tuteur de ".$name2." pour les rondes de qualification en français de la Coupe de la Confédération, un tournoi de débat étudiant pour souligner les 150 ans du Canada. Pour de plus ample information, veuillez consulter notre site web: confederationcup2017.ca.\r\n\r\nVotre enfant souhaite déposer sa candidature pour participer au tournoi. Toutefois, sans votre autorisation, la candidature de votre enfant ne peut pas être évaluée. Nous vous prions de répondre à ce courriel indiquant que vous permettez à votre enfant de poser sa candidature, et que, au mieux de vos connaissances, votre enfant sera disponible pour se rendre à Ottawa pour les Finales nationales de la Coupe de la Confédération à Ottawa du 28 au 30 avril prochain, s’il/elle est choisi(e) comme finaliste. Veuillez notez que les frais de voyage et d’hébergement pour les élèves seront déboursés par les organisateurs du tournoi, grâce à l’appui financier généreux de la Aurea Foundation. Cependant, un adulte (parent, enseignant, coach de débat, etc.) doit accompagner chaque équipe finaliste, mais les frais de voyage pour cet accompagnateur ne peuvent pas être déboursés par les organisateurs, et devront être déboursés par, ou partagés parmi, les élèves, les parents, l’école, etc., selon les normes dans votre communauté.\r\n\r\nSi vous autorisez la participation de votre enfant, répondez à ce courriel avec ce message complété :\r\n\r\n« J’autorise [nom de l’enfant] à participer à aux rondes de qualification en français de la Coupe de la Confédération, et, au mieux de ma connaissance, [nom de l’enfant] est disponible pour se rendre aux Finales nationales à Ottawa du 28 au 30 avril prochain, [s’il/elle] est choisie comme finaliste.\r\n\r\n[votre nom]»\r\n\r\nSi vous avez d’autres questions ou pour tout autre renseignement, contactez-nous par courriel: coupedelaconfederation2017@gmail.com.\r\n\r\nMerci,\r\n\r\nLe comité organisateur de la Coupe de la Confédération\r\n\r\n***\r\n\r\nHi,\r\n\r\nYou are receiving this email because you have been listed as a parent/guardian contact for ".$name2." for the Confederation Cup Debate French Qualifier, a debate tournament celebrating Canada’s 150th anniversary. For more information, visit confederationcup2017.ca.\r\n\r\nYour child wishes to apply to be considered for this tournament. However, without parent/guardian consent, your child’s application cannot be considered. Please respond to this email indicating that you consent to your child’s application and that to the best of your knowledge, if chosen as a finalist, your child will be able to attend the Confederation Cup Finals in Ottawa, April 28-30th. Note that the travel and accommodation for students will be covered by the tournament, thanks to the generous support of the Aurea Foundation. However, a designated chaperone (parent, coach, teacher, etc.) will need to accompany every team, and the travel costs for this chaperone will need to be covered or shared by participating debaters and/or schools, according to your debate community’s norms.\r\n\r\nIf you consent, please respond to this email the following:\r\n\r\n'I consent to [child’s full name]’s participation in the Confederation Cup Debate French Qualifier, and to the best of my knowledge [child’s name] will be able to attend the Finals in Ottawa April 28th-30th, 2017 in case of selection.\r\n\r\n[your full name]'\r\n\r\nPlease feel free to email us at coupedelaconfederation2017@gmail.com if you have further questions.\r\n\r\nThanks,\r\n\r\nConfederation Cup Organizing Committee";


        mail($parentemail2, "Formulaire D'Autorisation de la Coupe de la Confédération 2017", $msgBody, $headers);


		$_SESSION['sent_mail']	=	'<div class="alert alert-success">Nous avons reçu votre application et vous répondrons aussitôt que possible</div>';
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

    <title>Formulaire d'Inscription - La Coupe de la Confédération</title>

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

	<style>
		.error{
			color: red;
		}
	</style>

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
                        <li><a href="../register.html">EN</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

		<div class="formulaire-bg">
			<h1>Formulaire d'Inscription</h1>
		</div>

    	<div class="content-section">
    		<div>
    			<?php
    				if(isset($_SESSION['sent_mail'])){
    					echo($_SESSION['sent_mail'].'<br>');
    					unset($_SESSION['sent_mail']);
    				}
    			?>

				<p style="font-size:24px">Formulaire de Candidature - Coupe de la Confédération 2017</p>
    			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    				<div class="form-group">
    					<label for="name">Participant(e) 1 (Prénom/Nom):</label>
    					<input type="text" class="form-control" name="name1" value="<?php echo $name1;?>" required><span class="error"><?php echo $name1Err;?></span>
    				</div>
					<div class="form-group">
    					<label for="name">Ville/Province:</label>
    					<input type="text" class="form-control" name="city1" value="<?php echo $city1;?>" required><span class="error"><?php echo $city1Err;?></span>
    				</div>
					<div class="form-group">
    					<label for="subject">Niveau scolaire:</label>
    					<input type="text" class="form-control" name="grade1" value="<?php echo $grade1;?>" required><span class="error"><?php echo $grade1Err;?></span>
    				</div>
    				<div class="form-group">
    					<label for="email">Courriel:</label>
    					<input type="email" class="form-control" name="email1" value="<?php echo $email1;?>" required><span class="error"><?php echo $email1Err;?></span>
    				</div>

					<div class="form-group">
    					<label for="subject">Parent/tuteur:</label>
    					<input type="text" class="form-control" name="parent1" value="<?php echo $parent1;?>" required><span class="error"><?php echo $parent1Err;?></span>
    				</div>
					<div class="form-group">
    					<label for="email">Courriel du parent/tuteur:</label>
    					<input type="email" class="form-control" name="parentemail1" value="<?php echo $parentemail1;?>" required><span class="error"><?php echo $parentemail1Err;?></span>
    				</div>


					<div class="form-group">
    					<label for="name">Participant(e) 2 (Prénom/Nom):</label>
    					<input type="text" class="form-control" name="name2" value="<?php echo $name2;?>" required><span class="error"><?php echo $name2Err;?></span>
    				</div>
					<div class="form-group">
    					<label for="name">Ville/Province:</label>
    					<input type="text" class="form-control" name="city2" value="<?php echo $city2;?>" required><span class="error"><?php echo $city2Err;?></span>
    				</div>
					<div class="form-group">
    					<label for="subject">Niveau scolaire:</label>
    					<input type="text" class="form-control" name="grade2" value="<?php echo $grade2;?>" required><span class="error"><?php echo $grade2Err;?></span>
    				</div>
    				<div class="form-group">
    					<label for="email">Courriel</label>
    					<input type="email" class="form-control" name="email2" value="<?php echo $email2;?>" required><span class="error"><?php echo $email2Err;?></span>
    				</div>

					<div class="form-group">
    					<label for="subject">Parent/tuteur:</label>
    					<input type="text" class="form-control" name="parent2" value="<?php echo $parent2;?>" required><span class="error"><?php echo $parent2Err;?></span>
    				</div>
					<div class="form-group">
    					<label for="email">Courriel du parent/tuteur:</label>
    					<input type="email" class="form-control" name="parentemail2" value="<?php echo $parentemail2;?>" required><span class="error"><?php echo $parentemail2Err;?></span>
    				</div>

					<div class="form-group">
    					<label for="subject">Entraineur/Entraineuse de débat/ Enseignant(e) responsable:</label>
    					<input type="text" class="form-control" name="supervisor" value="<?php echo $supervisor;?>" required><span class="error"><?php echo $supervisorErr;?></span>
    				</div>
					<div class="form-group">
    					<label for="email">Courriel:</label>
    					<input type="email" class="form-control" name="supervisoremail" value="<?php echo $supervisoremail;?>" required><span class="error"><?php echo $supervisoremailErr;?></span>
    				</div>
					<div class="form-group">
    					<label for="subject">École:</label>
    					<input type="text" class="form-control" name="school" value="<?php echo $school;?>" required><span class="error"><?php echo $schoolErr;?></span>
    				</div>

					<div class="checkbox">
						<label><input type="checkbox" value="box1">Veuillez confirmer que les deux participants sont disponibles du 28 au 30 avril 2017, pour la compétition nationale de la Coupe de la Confédération à Ottawa. (obligatoire)</label><span class="error"><?php echo $box1Err;?></span>
				    </div>
				    <div class="checkbox">
						<label><input type="checkbox" value="box2">Veuillez confirmer que cette équipe fournira à ses frais un accompagnateur pour le voyage à Ottawa. (obligatoire)</label><span class="error"><?php echo $box2Err;?></span>
				    </div>


					<div class="form-group">
    					<label for="subject">URL de la vidéo appuyant la candidature:</label>
    					<input type="url" class="form-control" name="video" value="<?php echo $video;?>" required><span class="error"><?php echo $videoErr;?></span>
    				</div>


    				<input type="submit" class="btn btn-default" name="submit" value="Envoyer">




    			</form>

				<p>Lignes directrices pour les vidéos de candidature. La vidéo doit:</p>
				<ul>
					<li>montrer un débat sur la motion suivante: <b>« Qu’il soit résolu que le gouvernement paie des réparations aux Canadiens d’origine autochtone. »  </b></li>
					<li>montrer que les candidats parlent en français en tout temps. </li>
					<li>identifier chaque candidat par nom au début de la vidéo.</li>
					<li>suivre le <a href="instructions.html">format/style de débat pour les rondes de qualification</a> en français de la Coupe de la Confédération.</li>
					<li>être filmée en une seule prise continue; ne pas couper les entractes entre les discours.</li>
					<li>être transférée en ligne sur un site internet de vidéos, et la vidéo doit être accessible à ceux qui ont le lien (mais pas nécessairement être "publique").</li>
				</ul>

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
