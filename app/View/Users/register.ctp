<?php $this->set('title_for_layout', 'Εγγραφή Χρήστη - ΕΛΚΕΘΕ');?> 
 
    <div class="middle_row">
			<div class="middle_wrapper">
				<div class="register" align="center">
			 		<br><h1>Εγγραφή χρήστη</h1></br>
                    
					<?php echo $this->Form->create('User', array('action' => 'register'));?>
					<?php 
					echo '<p>'.$this->Form->input('User.name', 
									      array('label' => array('class' => 'name', 'text' => 'Όνομα:  '), 'div' => false, 'type' => 'text', 'id'=> 												 												'UserName')).'</p>';
										  
				    echo '</br><p>'.$this->Form->input('User.surname', 
									      array('label' => array('class' => 'surname', 'text' => 'Επώνυμο:  '), 'div' => false, 'type' => 'text', 'id'=> 												 												'UserSurame')).'</p>';
										  
				    echo '</br><p>'.$this->Form->input('User.phone', 
									      array('label' => array('class' => 'phone', 'text' => 'Τηλέφωνο:  '), 'div' => false, 'type' => 'text', 'id'=> 												 												'UserSurame')).'</p>';
					
					echo '</br><p>'.$this->Form->input('User.email', 
									      array('label' => array('class' => 'mail', 'text' => 'e-mail:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserEmail', 'placeholder' => 'π.χ. mymail@mail.com')).'</p>';
										  
				    echo '</br><p>'.$this->Form->input('User.password', 
									      array('label' => array('class' => 'youpasswd', 'text' => 'Κωδικός:  '), 'div' => false, 'type' => 'password', 'required' => 'required',  		 											    												'id'=> 'UserPassword')).'</p>';	
										  
				    echo '</br><p>'.$this->Form->input('User.passwordConfirm', 
									      array('label' => array('class' => 'youpasswdcfm', 'text' => 'Επαναλάβετε τον Κωδικό:  '), 'div' => false, 'type' => 'password', 'required' => 'required',  		 											    												'id'=> 'UserPasswordCfm')).'</p>';			  
					echo '</br><p>'.$this->Form->input('User.age', 
									      array('label' => array('class' => 'age', 'text' => 'Ημ/νία γέννησης:  '), 'div' => false, 'type' => 'text', 'id'=> 												 												'UserAge')).'</p>';	
					$options = array('-'=>'-','first' => 'Πρωτοβάθμια', 'second' => 'Δευτεροβάθμια','uptothird' => 'Τριτοβάθμια');  
					echo '</br><p>'.$this->Form->input('User.education', 
									      array('options' => $options, 'default' => '  -  ', 'label' => array('class' => 'education', 'text' => 'Εκπαίδευση:  '), 'div' => false, 'id'=> 												 												'UserEducation')).'</p>';										  									  									  
					$options = array('-'=>'-','fisherman' => 'Ψαράς', 'ditis' => 'Δύτης','tourist' => 'Τουρίστας','other' => 'Άλλο'); 					  
					echo '</br><p>'.$this->Form->input('User.membership', 
									      array('options'=> $options, 'label' => array('default' => '-', 'class' => 'membership', 'text' => 'Ιδιότητα:  '), 'div' => false, 'id'=> 												 												'UserMembership')).'</p>';	
					echo '</br>';					  
					echo $this->Html->Image($this->Html->url(array('controller'=>'users', 'action'=>'captcha'), true),array('style'=>'','vspace'=>2)); 
					echo '</br><p>'.$this->Form->input('User.captcha', 
									  array('label' => array('class' => 'captcha', 'text' => 'Γράψτε αυτά που βλέπετε στην εικόνα:  '), 'autocomplete'=>'off', 'div' => false, 'type' => 'text', 'id'=> 												 												'UserCaptcha', 'error'=>__('Failed validating code',true))).'</p>';		  	

										  echo '</br><p>'.$this->Form->end(array(
														'name' => 'data[User][register]',
														'label' => 'Εγγραφή',
														'div' => false )).'</p>';									  
								    ?>
			    </div>
			</div>
    </div>


<!-- Όνομα
• Επώνυμο
• Τηλέφωνο(Αριθμός)
• E-mail(Email Pattern)
• Διεύθυνση(Γράμματα Ελληνικά-Λατινικά, Αριθμοί)
• Πόλη(Γράμματα Ελληνικά-Λατινικά)
• Χώρα(Λίστα Χωρών OHE)

  Ηλικία(Αριθμός <= 2 ψηφία)
• Εκπαίδευση(Λίστα Πρωτοβάθμια/Δευτεροβάθμια/Τριτοβάθμια+)
• Ιδιότητα(Λίστα Ψαράς/Δύτης/Τουρίστας/Άλλο)

-->