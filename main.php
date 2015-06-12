<!DOCTYPE html>
<?php require_once('functions.php'); ?>
<html>
    <head>
		  <title>Queuing To Scale</title>
		  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.95.3/css/materialize.min.css" />
	 </head>
	 <body>
		  <div class="section blue darken-3  white-text" id="index-banner">
				<div class="container">
					 <div class="row">
						  <div class="col s12">
								<h1 class="header center-on-small-only">
									 <a href="/" class="white-text">Using Queues</a>
								</h1>
								<h4 class="light text-lighten-4 center-on-small-only">
									 Make Scaling Your App Easier: Use 
									 <strong>Message Queues</strong> to Process Tasks
								</h4>
						  </div>
					 </div>
				</div>
		  </div>
		  <div class="container">
				<p>&nbsp;</p>
				<?php
				if ($_POST):
					//Do validation here
					//... validation complete!
					$id = saveUser($_POST);
					?>

					<div class="row ">
						 <div class="col s5">
							  <div class="card-panel grey darken-1 white-text">
									<h5>Thank you for signing up!</h5> <br />
									Please check your mobile phone {<?php echo $_POST['mobile_number']; ?>} for the verification code.
							  </div>
						 </div>

						 <div class="col s5 offset-s2">
							  <div class="row">
									<div class="input-field col s12">
										 <input id="verification_code" name="verification_code" type="text" class="validate" required="">
										 <label for="verification_code">Verification Code</label>
									</div>
									<div class="input-field col s12">
										 <a class="btn waves-effect waves-light blue darken-3 right" href="/end">Continue
											  <i class="mdi-content-send right"></i>
										 </a>
									</div>
							  </div>
						 </div>
					</div>
				<?php else: ?>
					<div class="row">
						 <h4>Sign Up</h4>
						 <form class="col s12" method="POST" autocomplete="off">
							  <div class="row">
									<div class="input-field col s12">
										 <input id="full_name" name="full_name" type="text" class="validate" required="">
										 <label for="full_name">Full Name</label>
									</div>

							  </div>
							  <div class="row">
									<div class="input-field col s6">
										 <input id="email" name="email" type="email" class="validate">
										 <label for="email">Email</label>
									</div>
									<div class="input-field col s6">
										 <input id="mobile_number" name="mobile_number" type="text" class="validate">
										 <label for="mobile_number">Mobile Number</label>
									</div>
							  </div>
							  <div class="row">
									<div class="input-field col s12">
										 <button class="btn waves-effect waves-light blue darken-3" type="submit" name="action">Submit
											  <i class="mdi-content-send right"></i>
										 </button>
									</div>
							  </div>
						 </form>
					</div>
				<?php endif; ?>
		  </div>
		  <!-- Compiled and minified JavaScripts -->
		  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.95.3/js/materialize.min.js"></script>
	 </body>
</html>