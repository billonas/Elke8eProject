<?php

   echo "HELLO"."\n"; 
   ?>

  <?php echo $this->Html->link('Κάντε login', array('action'=>'login'));
  
  echo '</br>';
  echo $this->Session->valid();
  echo '</br>';
  if($this->Session->check('User.password') == true) 
  	echo 'password sessioned';
  else 
  	echo 'nope';
  //echo $this->Html->link($this->Session->read('User.email'), array('action'=>'/project/users/logout'));
    
?> 
