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
                    
									<?php echo $this->Form->create('User');?>
										<h1>Σύνδεση χρήστη</h1>
										</br>
										<p>
											<label for="username" class="uname" > Το e-mail σας <br /> </label>
											<input id="username" name="data[User][username]" required="required" type="text" placeholder="π.χ. mymail@mail.com"/>
										</p>
										<br />
										<p>
											<label for="password" class="youpasswd" > Ο κωδικός πρόσβασής σας <br /> </label>
											<input id="password" name="data[User][password]" required="required" type="password" placeholder="π.χ. X8df!90EO" />
										</p>
										<br />
										<p class="login button">
											<input type="submit" name="data[User][login]" value="Σύνδεση" />
										</p>
                                        </br>
										<a href="#toregister" class="to_register">Δεν είστε μέλος ακόμα? Κάνετε εγγραφή!</a>
									</form>
								
                </div> 
                

</div>

	    </div>
        <div class="comments">
            <div><br />Powered by <a href="http://cakephp.org/">Cake.php</a>, <a href="http://jquery.com/">jQuery</a> and <a href="http://modernizr.com/">Modernizr</a>.</div>
        </div>
	</body>
</html>
