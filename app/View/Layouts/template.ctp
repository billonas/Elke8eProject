<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="content-language" content="en-gb" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title><?php echo $title_for_layout?></title>
		<?php 	echo $this->Html->css(array('main'), null, array('media' => 'screen', 'rel' => 'stylesheet')); 	?>
        <?php   echo $scripts_for_layout;?>
		<!--[if lt IE 10 ]>
			<?php 	echo $this->Html->css(array('hacks'), null, array('media' => 'screen')); 	?>
		 <![endif]-->
         

         
	</head>
	<body>
		<div class="wrapper">
        	
			<div class="upper_row">
				<?php echo
					$this->Html->Link( 
						$this->Html->Image("hcmr-logo.png"), 
						array('controller' => 'Index', 'action' => 'index'), 
						array('escape' => false));
			    ?>
				<ul class="upper_list" >
					<li class="active">
					      <?php 
						      if($this->Session->check('UserUsername'))
								  echo '<a href="#">'.$this->Session->read('UserFullName').'<span class="pointer"></span></a>';
							  else 
							      echo'<a href="#">Σύνδεση<span class="pointer"></span></a>';	
                          ?>
						<!--oti vriskete apo edo kai kato kai mexri ta epomena sxolia einai o kodikas toy pop up-->
						<!--xreiazontai kai ta dio div alla ta endiamesa mporoun na figoun kai na allaksoun-->
							<div class="upper_pop">
								<div class="login">
                                	<?php 
										if($this->Session->check('UserUsername')) {
											echo '<h1>Καλώς ήλθατε</h1>';
											
											echo $this->Html->link('Προβολή προσωπικού προφίλ', array('controller' => 'users', 'action'=>'profile'));
											echo '</br></br>';
											echo $this->Html->link('Αποσύνδεση', array('controller' => 'users', 'action'=>'logout'));
                           
									    }
										else{
											
											echo $this->Form->create('User', array('action' => 'login'));
											echo '<h1>Σύνδεση χρήστη</h1>';
											echo '<p>'.$this->Form->input('User.username', 
												  array('label' => array('class' => 'uname', 'text' => 'To e-mail σας </br>', 'data-icon' => 'u'), 'div' => false, 'type' => 'text',
														'required' => 'required', 'id'=> 'UserUsername', 'placeholder' => 'π.χ. mymail@mail.com')).'</p>';
												  
											echo '</br><p>'.$this->Form->input('User.password', 
												  array('label' => array('class' => 'youpasswd', 'text' => 'O κωδικός σας  </br>', 'data-icon' => 'p'), 'div' => false, 'type' => 'password', 
														'required' => 'required', 'id'=> 'UserPassword', 'placeholder' => 'π.χ. X8df!90EO')).'</p></br>';	
		
											echo '<p>'.$this->Form->end(array(
														'name' => 'data[User][login]',
														'label' => 'Σύνδεση',
														'div' => false )).'</p>';	
										    echo '<a href="#toregister" class="to_register">Δεν είστε μέλος? Εγγραφείτε! </a>';
										}
								    ?>
                                    
									
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