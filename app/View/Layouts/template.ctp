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
					<li class="active"><a href="#">Σύνδεση<span class="pointer"></span></a>
						<!--oti vriskete apo edo kai kato kai mexri ta epomena sxolia einai o kodikas toy pop up-->
						<!--xreiazontai kai ta dio div alla ta endiamesa mporoun na figoun kai na allaksoun-->
							<div class="upper_pop">
								<div class="login">
									<?php echo $this->Form->create('User', array('action' => 'login'));?>
									
								    <h1>Σύνδεση χρήστη</h1>
									<?php echo '<p>'.$this->Form->input('User.username', 
									      array('label' => array('class' => 'uname', 'text' => 'To e-mail σας ', 'data-icon' => 'u'), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 															  												'UserUsername', 'placeholder' => 'π.χ. mymail@mail.com')).'</p>';
										  
									      echo '</br><p>'.$this->Form->input('User.password', 
									      array('label' => array('class' => 'youpasswd', 'text' => 'O κωδικός σας ', 'data-icon' => 'p'), 'div' => false, 'type' => 'password', 'required' => 'required',  		 											    'id'=> 'UserPassword', 'placeholder' => 'π.χ. X8df!90EO')).'</p></br>';	

										  echo '<p>'.$this->Form->end(array(
														'name' => 'data[User][login]',
														'value' => 'Σύνδεση',
														'div' => false )).'</p>';									  
								    ?>
                                    <a href="#toregister" class="to_register">Δεν είστε μέλος? Εγγραφείτε! </a>
									
								</div>
							</div>
							<!--telos pop up-->
							
					
					
					    
						
						
					</li>
					<li><a href="#">Link1</a></li>
					<li><a href="#">Link2</a></li>
					<li><a href="#">Link3</a></li>
                    
					    
						
						
						
						
				</ul>
			</div>
		</div>
		<?php echo $content_for_layout ?>
	</body>
</html>