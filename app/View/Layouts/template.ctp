<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="content-language" content="en-gb" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		
		<?php 	echo $this->Html->css(array('main')); 	?>
		<!--[if lt IE 10 ]>
			<link rel="stylesheet" href="hacks.css" type="text/css" media="screen" />
		 <![endif]-->
	</head>
	<body>
		<div class="wrapper">
        
			<div class="upper_row">
				<?php echo
					$this->Html->Link( 
						$this->Html->Image("hcmr-logo.png"), 
						array('action' => 'goHome'), 
						array('escape' => false));
			    ?>
				<ul class="upper_list" >
					
					<li><a href="#">Link1</a></li>
					<li><a href="#">Link2</a></li>
					<li><a href="#">Link3</a></li>
						<li class="active"><a href="#">Σύνδεση</a>
						<!--oti vriskete apo edo kai kato kai mexri ta epomena sxolia einai o kodikas toy pop up-->
						<!--xreiazontai kai ta dio div alla ta endiamesa mporoun na figoun kai na allaksoun-->
							<div class="upper_pop">
								<div class="login">
									<?php echo $this->Form->create('User', array('action' => 'login'));?>
									<form  action="/project/users/login" id="UserLoginForm" autocomplete="on" method="post">
										<h1>Σύνδεση χρήστη</h1>
										
										<p>
											<label for="username" class="uname" data-icon="u" > To e-mail σας <br /> </label>
											<input id="username" name="data[User][username]" required="required" type="text" placeholder="π.χ. mymail@mail.com"/>
										</p>
										<br />
										<p>
											<label for="password" class="youpasswd" data-icon="p"> Ο κωδικός σας <br /> </label>
											<input id="password" name="data[User][password]" required="required" type="password" placeholder="π.χ. X8df!90EO" />
										</p>
										<br />
										<p class="login button">
											<input type="submit" name="data[User][login]" value="Σύνδεση" />
										</p>
										<a href="#toregister" class="to_register">Δεν είστε μέλος? Εγγραφείτε! </a>
									</form>
								</div>
							</div>
							<!--telos pop up-->
							//else display name
					
					
					    
						
						
					</li>
				</ul>
			</div>
		</div>
		<?php echo $content_for_layout ?>
	</body>
</html>