<?php $this->set('title_for_layout', 'Εγγραφή Χρήστη - ΕΛΚΕΘΕ');?> 
 
    <div class="middle_row">
			<div class="middle_wrapper">
				<div class="register" align="center">
			 		<br><h1>Εγγραφή χρήστη</h1></br>
                    
					<?php echo $this->Form->create('Reg', array('action' => 'register'));?>
					<?php 
					echo '<p>'.$this->Form->input('Reg.name', 
									      array('label' => array('class' => 'name', 'text' => 'Όνομα:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserName')).'</p>';
										  
				    echo '</br><p>'.$this->Form->input('Reg.surname', 
									      array('label' => array('class' => 'surname', 'text' => 'Επώνυμο:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserSurame')).'</p>';
										  
				    echo '</br><p>'.$this->Form->input('Reg.phone', 
									      array('label' => array('class' => 'phone', 'text' => 'Τηλέφωνο:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserSurame')).'</p>';
					
					echo '</br><p>'.$this->Form->input('Reg.username', 
									      array('label' => array('class' => 'uname', 'text' => 'e-mail:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserUsername', 'placeholder' => 'π.χ. mymail@mail.com')).'</p>';
										  
				    echo '</br><p>'.$this->Form->input('Reg.password', 
									      array('label' => array('class' => 'youpasswd', 'text' => 'Κωδικός:  '), 'div' => false, 'type' => 'password', 'required' => 'required',  		 											    												'id'=> 'UserPassword')).'</p>';	
										  
				    echo '</br><p>'.$this->Form->input('Reg.passwordConfirm', 
									      array('label' => array('class' => 'youpasswdcfm', 'text' => 'Επαναλάβετε τον Κωδικό:  '), 'div' => false, 'type' => 'password', 'required' => 'required',  		 											    												'id'=> 'UserPasswordCfm')).'</p>';			  
					echo '</br><p>'.$this->Form->input('Reg.address', 
									      array('label' => array('class' => 'address', 'text' => 'Διεύθυνση:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserAddress')).'</p>';
					echo '</br><p>'.$this->Form->input('Reg.city', 
									      array('label' => array('class' => 'city', 'text' => 'Πόλη:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserCity')).'</p>';	
					echo '</br><p>'.$this->Form->input('Reg.country', 
									      array('label' => array('class' => 'country', 'text' => 'Χώρα:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserCountry')).'</p>';
					echo '</br><p>'.$this->Form->input('Reg.age', 
									      array('label' => array('class' => 'age', 'text' => 'Ηλικία:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserAge')).'</p>';	
					$options = array('-'=>'-','first' => 'Πρωτοβάθμια', 'second' => 'Δευτεροβάθμια','uptothird' => 'Τριτοβάθμια');  
					echo '</br><p>'.$this->Form->input('Reg.education', 
									      array('options' => $options, 'default' => '  -  ', 'label' => array('class' => 'education', 'text' => 'Εκπαίδευση:  '), 'div' => false, 'required' => 'required', 'id'=> 												 												'UserEducation')).'</p>';										  									  									  
					$options = array('-'=>'-','fisherman' => 'Ψαράς', 'ditis' => 'Δύτης','tourist' => 'Τουρίστας','other' => 'Άλλο'); 					  
					echo '</br><p>'.$this->Form->input('Reg.membership', 
									      array('options'=> $options, 'label' => array('default' => '-', 'class' => 'membership', 'text' => 'Ιδιότητα:  '), 'div' => false, 'required' => 'required', 'id'=> 												 												'UserMembership')).'</p>';										  	

										  echo '</br><p>'.$this->Form->end(array(
														'name' => 'data[Reg][register]',
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