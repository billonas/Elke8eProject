<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="content-language" content="en-gb" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>Σύνδεση χρήστη</title>
		<?php echo $this->Html->css(array('main','jquery-ui'));	?>
        <?php echo $this->Html->script(array('jquery.min','jquery-ui.min')); 	?>



		<!--[if lt IE 10 ]>
			<link rel="stylesheet" href="hacks.css" type="text/css" media="screen" />
		 <![endif]-->
	</head>
	<body>
    	
		<div class="middle_row">
        	<div class="middle_wrapper">
                <div class="login" align="center">  
                    				<br><h1>Σύνδεση χρήστη</h1></br>
									<?php echo $this->Form->create('User', array('action' => 'login'));?>
									
									
                                    <?php echo '</br>'.$this->Session->flash(); ?> 
                                    <?php echo '<p>'.$this->Form->input('User.username', 
									      array('label' => array('class' => 'uname', 'text' => 'To e-mail σας </br>'), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												'UserUsername', 'placeholder' => 'π.χ. mymail@mail.com')).'</p>';
										  
									      echo '</br><p>'.$this->Form->input('User.password', 
									      array('label' => array('class' => 'youpasswd', 'text' => 'O κωδικός σας </br>'), 'div' => false, 'type' => 'password', 'required' => 'required',  		 											    'id'=> 'UserPassword', 'placeholder' => 'π.χ. X8df!90EO')).'</p></br>';	

										  echo '<p>'.$this->Form->end(array(
														'name' => 'data[User][login]',
														'label' => 'Σύνδεση',
														'div' => false )).'</p>';									  
								    ?>
                                    <a href="#toregister" class="to_register">Δεν είστε μέλος? Εγγραφείτε! </a>
								
                </div> 
                

</div>

	    </div>
        <div class="comments">
            <div><br />Powered by <a href="http://cakephp.org/">Cake.php</a>, <a href="http://jquery.com/">jQuery</a> and <a href="http://modernizr.com/">Modernizr</a>.</div>
        </div>
	</body>
</html>
