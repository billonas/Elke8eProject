<?php $this->set('title_for_layout', 'Επεξεργασία Προφίλ - ΕΛΚΕΘΕ');?> 
 
    <div class="middle_row">
			<div class="middle_wrapper">
				<div class="register" align="center">
			 		<br><h1>Επεξεργασία Προφίλ χρήστη</h1></br>
					<?php echo $this->Form->create('Up', array('action' => 'edit'));?>
					<?php 
					echo '<p>'.$this->Form->input('Up.name', 
									      array('label' => array('class' => 'name', 'text' => 'Όνομα:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserName')).'</p>';
										  
				    echo '</br><p>'.$this->Form->input('Up.surname', 
									      array('label' => array('class' => 'surname', 'text' => 'Επώνυμο:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserSurame')).'</p>';
										  
				    echo '</br><p>'.$this->Form->input('Up.phone', 
									      array('label' => array('class' => 'phone', 'text' => 'Τηλέφωνο:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserSurame')).'</p>';
					
					echo '</br><p>'.$this->Form->input('Up.username', 
									      array('label' => array('class' => 'uname', 'text' => 'e-mail:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserUsername', 'placeholder' => 'π.χ. mymail@mail.com')).'</p>';
										  
				    echo '</br><p>'.$this->Form->input('Up.password', 
									      array('label' => array('class' => 'youpasswd', 'text' => 'Κωδικός:  '), 'div' => false, 'type' => 'password', 'required' => 'required',  		 											    												'id'=> 'UserPassword')).'</p>';	
										  
				    echo '</br><p>'.$this->Form->input('Up.passwordConfirm', 
									      array('label' => array('class' => 'youpasswdcfm', 'text' => 'Επαναλάβετε τον Κωδικό:  '), 'div' => false, 'type' => 'password', 'required' => 'required',  		 											    												'id'=> 'UserPasswordCfm')).'</p>';			  
					echo '</br><p>'.$this->Form->input('Up.address', 
									      array('label' => array('class' => 'address', 'text' => 'Διεύθυνση:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserAddress')).'</p>';
					echo '</br><p>'.$this->Form->input('Up.city', 
									      array('label' => array('class' => 'city', 'text' => 'Πόλη:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserCity')).'</p>';	
					echo '</br><p>'.$this->Form->input('Up.country', 
									      array('label' => array('class' => 'country', 'text' => 'Χώρα:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserCountry')).'</p>';
					echo '</br><p>'.$this->Form->input('Up.age', 
									      array('label' => array('class' => 'age', 'text' => 'Ηλικία:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserAge')).'</p>';	
					echo '</br><p>'.$this->Form->input('Up.education', 
									      array('label' => array('class' => 'education', 'text' => 'Εκπαίδευση:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserEducation')).'</p>';										  									  									  
										  
					echo '</br><p>'.$this->Form->input('Up.membership', 
									      array('label' => array('class' => 'membership', 'text' => 'Ιδιότητα:  '), 'div' => false, 'type' => 'text', 'required' => 'required', 'id'=> 												 												'UserMembership')).'</p>';										  	

										  echo '</br><p>'.$this->Form->end(array(
														'name' => 'data[Up][edit]',
														'label' => 'Ανανέωση',
														'div' => false )).'</p>';									  
								    ?>
			    </div>
			</div>
    </div>
