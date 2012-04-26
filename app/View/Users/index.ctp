   <?php 

      echo "</br>HELLO"."\n"; 
      echo $this->Html->link('Κάντε login', array('action'=>'login'));
  
      echo '</br>';
//      echo $this->Session->valid();
      echo $this->Session->flash('auth');
      echo '</br>';

//      if($loggedIn) 
//      {
         echo $this->Session->flash(); 

         echo "Username:"  .$user['User']['email'];
         echo '</br>';
         echo "UserType:" .$this->Session->read('Auth.User.user_type');
         echo '</br>';
         echo "FullName:" .$this->Session->read('UserFullName');
         echo '</br>';

         echo $this->Html->link('Logout', 
                           array('action'=>'logout'));
//      }
//      else 
//      	echo 'nope';
    
?> 
