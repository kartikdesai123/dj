<?php  

/**======================================================
*
*
*
*	THIS IS THE PART TO CUSTOMIZE
*	TO SEND THE EMAIL CORRECTLY
*
*
*
* 
======================================================*/


$to      = 'your_email_here@your_provider.com'; // REPLACE WITH YOUR EMAIL ADDRESS WHERE YOU WANT TO RECEIVE THE MESSAGES
$subject = 'NEW MESSAGE FROM YOUR WEBSITE'; // CUSTOMIZE THE SUBJECT OF THE EMAIL


/////////////////////////////////////////////////////////

?>
<!doctype html>
<html class="no-js" lang="en_EN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Miusk</title>
		<meta name="description" content="The Incredible Music HTML Template">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href='components/slick/slick.css' rel='stylesheet' type='text/css'>
		<link href='components/swipebox/src/css/swipebox.min.css' rel='stylesheet' type='text/css'>
		<link href='fonts/iconfont/style.css' rel='stylesheet' type='text/css'>
		<link href='fonts/qticons/qticons.css' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/qt-main.css"><!-- INCLUDES THE CSS FRAMEWORK VIA #IMPORT AND SASS -->
		<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
	</head>
	<body class="qt-debug">
	<!-- QT HEADER END ================================ -->

		<div class="section section-message parallax-container qt-fullscreen scrollspy" >
			<div class="parallax"><img src="images/galaxy-1.jpg"></div>
			<div class="qt-polydecor poly4">
				<div class="qt-valign-wrapper">
					<div class="qt-valign">
						<div class="container">
							<div class="qt-framed center-align" >
						

								<?php  
								/*======================================================
								
								DYNAMIC EMAIL SENDING CODE

								======================================================*/
								$fields = array('privacy','first_name','last_name','email','message'); // LIST OF THE FIELDS
								$errors = ''; // ERROR MESSAGE
								// FOR EVERY FIELD WE CHECK IF IT'S COMPILED, OTHERWISE DISPLAY THE ERROR
								foreach($fields as $fieldname){
									if(!array_key_exists($fieldname, $_POST)) { // FIELD NOT EXISTING
										$errors .= $fieldname.'[#]';
									} else {
										if($_POST[$fieldname] == ''){ // OR FIELD EMPTY
											$errors .= $fieldname.'[#]';
										}
									}
								}


								if($errors != '') { // IF WE HAVE ERRORS, DISPLAY THE ERROR MESSAGE
									?>
									<div class="thankyou">
										<h2 class="qt-section-title">ERROR<i class="deco"></i></h2>
										<h4>Some fields are missing,<br>please check the data and try again</h4>
										<a href="index.php" onclick="goBack()" class="btn">Go Back</a>
									</div>
									<?php  
								} else { // IF ALL FIELDS ARE COMPILED LET'S GO ON
									
									$privacy = $_POST['privacy'];
									$first_name = $_POST['first_name'];
									$last_name = $_POST['last_name'];
									$email = $_POST['email'];
									$message = str_replace("\n.", "\n..",$_POST['message']);

									$headers = 'From: ' . $email . "\r\n" .
										'Reply-To: '. $email . "\r\n" .
										'X-Mailer: PHP/' . phpversion();
									mail($to, $subject, $message, $headers);
									?>
									<div class="thankyou">
										<h2 class="qt-section-title">MESSAGE SENT<i class="deco"></i></h2>
										<h4>Thank you, we will answer as soon as possible</h4>
										<a href="index.php" class="btn">Go Back</a>
									</div>
									<?php  

								}
								?>

							</div>
						</div>
					</div>
				</div>
			</div> 
		</div>

		<!-- QT FOOTER ================================ -->
		<script src="js/modernizr-custom.js"></script>
		<script src="js/jquery.js"></script><!--  JQUERY VERSION MUST MATCH WORDPRESS ACTUAL VERSION (NOW 1.12) -->
		<script src="js/jquery-migrate.min.js"></script><!--  JQUERY VERSION MUST MATCH WORDPRESS ACTUAL VERSION (NOW 1.12) -->

		<!--  CUSTOM JS LIBRARIES: =========================================================== -->
		<script src="js/materializecss/bin/materialize.min.js"></script>
		<script src="components/sticky/jquery.sticky.js"></script>
		<script src="components/slick/slick.min.js"></script>
		<script src="components/particles/particles.min.js"></script>
		<script src="components/skrollr/skrollr.min.js"></script>
		<script src="components/swipebox/lib/ios-orientationchange-fix.js"></script>
		<script src="components/swipebox/src/js/jquery.swipebox.min.js"></script>

		<!-- MAIN JAVASCRIPT FILE ================================ -->
		<script src="js/qt-main.js"></script>
		<script>
		function goBack() {
		    window.history.back();
		}
		</script>
	</body>
</html>
