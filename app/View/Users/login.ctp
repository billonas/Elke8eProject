<?php $this->set('title_for_layout', 'Σύνδεση Χρήστη - ΕΛΚΕΘΕ');?>
    	
		<div class="middle_row">
        	<div class="middle_wrapper">
                <div class="login" align="center">  
                    				<br><h1>Σύνδεση χρήστη</h1></br>
									<?php echo $this->Form->create('User', array('action' => 'login'));?>
																		
                                    <?php echo $this->Session->flash().'</br>'; ?> 
                                    <?php echo '<p>'.$this->Form->input('User.username', 
									      array('label' => array('class' => 'uname', 'text' => 'To e-mail σας </br>'), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserUsername', 'placeholder' => 'π.χ. mymail@mail.com')).'</p>';
										  
									      echo '</br><p>'.$this->Form->input('User.password', 
									      array('label' => array('class' => 'youpasswd', 'text' => 'O κωδικός σας </br>'), 'div' => false, 'type' => 'password', 'required' => 'required',  		 											    												'id'=> 'UserPassword', 'placeholder' => 'π.χ. X8df!90EO')).'</p></br>';	

										  echo '<p>'.$this->Form->end(array(
														'name' => 'data[User][login]',
														'label' => 'Σύνδεση',
														'div' => false )).'</p>';									  
								    ?>
                                    <?php echo $this->Html->link('Δεν είστε μέλος? Εγγραφείτε τώρα!', array('controller' => 'users', 'action'=>'register'),array('class' => 'to_register'));?>
                                     
								
                </div> 
                

</div>

	    </div>
        <div class="comments">
            <div><br />Powered by <a href="http://cakephp.org/">Cake.php</a>, <a href="http://jquery.com/">jQuery</a> and <a href="http://modernizr.com/">Modernizr</a>.</div>
        </div>

