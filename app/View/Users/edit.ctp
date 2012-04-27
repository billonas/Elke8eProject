<?php $this->set('title_for_layout', 'Επεξεργασία Προφίλ - ΕΛΚΕΘΕ');?> 
 
    <div class="middle_row">
			<div class="middle_wrapper">
				<div class="edit" align="center">
			 		<br><h1>Επεξεργασία Προφίλ χρήστη</h1></br>
					<?php echo $this->Form->create('User', array('action' => 'edit'));?>
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
					echo '</br><p>'.$this->Form->input('User.address', 
									      array('label' => array('class' => 'address', 'text' => 'Διεύθυνση:  '), 'div' => false, 'type' => 'text', 'id'=> 												 												'UserAddress')).'</p>';
					echo '</br><p>'.$this->Form->input('User.city', 
									      array('label' => array('class' => 'city', 'text' => 'Πόλη:  '), 'div' => false, 'type' => 'text', 'id'=> 												 												'UserCity')).'</p>';	
					echo '</br><p>'.$this->Form->input('User.country', 
									      array('label' => array('class' => 'country', 'text' => 'Χώρα:  '), 'div' => false, 'type' => 'text', 'id'=> 												 												'UserCountry')).'</p>';
					echo '</br><p>'.$this->Form->input('User.age', 
									      array('label' => array('class' => 'age', 'text' => 'Ηλικία:  '), 'div' => false, 'type' => 'text', 'id'=> 												 												'UserAge')).'</p>';	
					$options = array('-'=>'-','first' => 'Πρωτοβάθμια', 'second' => 'Δευτεροβάθμια','uptothird' => 'Τριτοβάθμια');  
					echo '</br><p>'.$this->Form->input('User.education', 
									      array('options' => $options, 'default' => '  -  ', 'label' => array('class' => 'education', 'text' => 'Εκπαίδευση:  '), 'div' => false, 'id'=> 												 												'UserEducation')).'</p>';										  									  									  
					$options = array('-'=>'-','fisherman' => 'Ψαράς', 'ditis' => 'Δύτης','tourist' => 'Τουρίστας','other' => 'Άλλο'); 					  
					echo '</br><p>'.$this->Form->input('User.membership', 
									      array('options'=> $options, 'label' => array('default' => '-', 'class' => 'membership', 'text' => 'Ιδιότητα:  '), 'div' => false, 'id'=> 												 												'UserMembership')).'</p>';										  	

										  echo '</br><p>'.$this->Form->end(array(
														'name' => 'data[User][edit]',
														'label' => 'Ανανέωση',
														'div' => false )).'</p>';									  
								    ?>
			    </div>
			</div>
    </div>
