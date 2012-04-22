   <?php 

      echo "HELLO"."\n"; 
      echo $this->Html->link('Κάντε login', array('action'=>'login'));
  
      echo '</br>';
      echo $this->Session->valid();
      echo '</br>';

      if($this->Session->check('User')) 
      {
         echo $this->Session->flash(); 

         echo "Username:" .$this->Session->read('User');
         echo '</br>';
         echo "UserType:" .$this->Session->read('UserType');
         echo '</br>';

         echo $this->Html->link('Logout', 
                           array('action'=>'logout'));
      }
      else 
      	echo 'nope';
    
?> 
